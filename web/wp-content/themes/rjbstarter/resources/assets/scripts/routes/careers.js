/**
 * Job listing specific js.  This js relies on the lever api routes proxied to
 * rjbstarter.com routes such as https://www.rjbstarter.com/careers/lever/proxy/filter
 * via haproxy https://github.corp.qc/qc/haproxy-docker/blob/5ab9f6519299cac19028d6d87089fdfbf9ee3b5b/qc/haproxy15/etc/haproxy.cfg
 */
export default {
  init() {

    var qc = {};
    qc.behavior = {};
    qc.helper = {};

    /**
     * ---
     *
     * helper_jobs.js
     *
     * Notes:
     * Helper functions shared between job javascripts [filter_jobs.js, single_job.js]
     */

    /*
     * Generates onclick '_qevents' js
     * Used in job anchor link clicks
     */
    qc.helper.onclick_job = function(job_title, is_applying) {

      window._qevents = window._qevents || []; // object might be ad-blocked.

      return '_qevents.push({qacct:"p-9fYuixa7g_Hm2",labels:"' +
        qc.helper.parse_job_title( job_title, is_applying ) +
        '", event:"click"})';
    }

    /*
     * Parses the job title to an acceptable label format
     * e.g., Modeling Scientist, Performance Targeting --> Performance_Targeting.Modeling_Scientist
     */
    qc.helper.parse_job_title = function(job, is_applying) {

      var raw_pos = job.substring( 0, job.indexOf( ',' ) ).trim();
      var raw_team = job.substring( job.indexOf( ',' ) + 1 ).trim();
      var pos = raw_pos.replace( ' ', '_' );
      var team = raw_team.replace( ' ', '_' );

      if (team.length == 0) {
        team = 'NO_TEAM';
      }

      var description = team + '.' + pos;

      if (is_applying) {
        description = 'Career.APPLY.' + description;
      } else {
        description = 'Career.VIEW.' + description;
      }

      return description;
    }

    //////
    // Careers Job Listing Page Filters.
    // - Having these filters present kicks off the entire build of the career job listings.
    //////
    if ( $( '[data-behavior="filter_jobs"]' ).length ) {

      var $this = $( '[data-behavior="filter_jobs"]' );
      var SIDEBAR_FILTERS = ['department', 'location', 'commitment']; // ordered sidebar listing
      var LIMIT = 30; // number of jobs per page

      var $filters = $( '.filter-listing__sidebar', $this ),
      $container = $( '.filter-listing__list', $this ),
      $load_more = $( '.filter-listing__load-more', $this ),
      form_data = {
        page: 1,
      },
      $no_results = $( '.filter-listing__error.no-results', $this ),
      $loading_error = $( '.job-loading-error', $this ),
      $current_openings = $( 'a[name="current_openings"]' ),
      $jobCache = $( '#jobCache', $this );
      //$accordion_inner = $( '.accordion__inner', $this ),

      var jobs = [],
      max_num_pages = 0,
      jContent = {};

      /*
      * Entry point
      * if jobCache is blank, first-time visit, so load initial
      * otherwise visitor has returned from the back button, so regenerate state from jobCache
      */
      if ($jobCache.val() === '') {
        init_jobs();
      } else {
        jContent = JSON.parse( $jobCache.val() );
        jobs = jContent.jobs;

        build_sidebar( jobs );

        // set checked sidebar elements.
        $( jContent.checked_sidebar ).each(
          function(i, e) {
            $( '[id="' + e + '"]' ).prop( 'checked', true );
          }
        );

        // overwrite with cached job data.
        form_data = {
          page: jContent.page || 1,
          filters: set_filters(),
        };

        get_posts( form_data, false );

        jContent.load_more ? $load_more.addClass( 'hidden' ) : $load_more.removeClass( 'hidden' );

        $( 'html,body' ).scrollTop( jContent.scrollTop );

        init_listeners();
      }
    }

    // initial Lever API job request.
    function init_jobs() {
      // careers/lever/proxy is haproxy'd, passes request to api.lever.co [WEBCORE-847].
      $.ajax({
        type: 'GET',
        url: 'https://www.rjbstarter.com/careers/lever/proxy/filter',
        dataType: 'json',
        success: function(data) {

          jobs = data;

          build_sidebar( jobs );

          var hash = hash_to_checkbox();

          var form_data = {
            filters: set_filters(),
            page: 1,
          };

          get_posts( form_data, false );

          init_listeners();

          // jump to position of loaded jobs.
          if (hash) {
            $( 'html, body' ).animate(
              {
                scrollTop: $current_openings.offset().top,
              }
            );
          }
        },
        error: function() {
          load_off();
          $load_more.addClass( 'hidden' );
          $loading_error.removeClass( 'hidden' ).attr( 'aria-hidden', false );
        },
      });
    }

    // initialize click handlers.
    function init_listeners() {

      // job listing click: save job data and scroll position.
      $( document ).on(
        'click', '.filter-listing__item, .filter-listing__item-inner', function() {
          update_jobCache( form_data.page );
        }
      );

      // 'load more' jobs button click.
      $load_more.on(
        'click', function(e) {

          form_data.filters = set_filters();
          form_data.page++;

          $load_more.addClass( 'btn--loading' );

          get_posts( form_data, true );

          e.preventDefault();

        }
      );

      // on hash change url (e.g. back button, checkbox click).
      $( window ).on(
        'hashchange', function() {

          var hash = hash_to_checkbox(),
          form_data = {
            filters: set_filters(),
            page: 1,
          };

          get_posts( form_data, false );

          if (hash) {
            $( 'html, body' )
            .animate(
              {
                scrollTop: $current_openings.offset().top,
              }
            );
          }

        }
      );

      // sidebar click.
      $( ':input', $filters ).on(
        'change', function(e) {

          var $input = $( this ),
          $team_all = $( 'ul.team .check-all' );

          // On 'Department' checkbox click, make sure to reset 'Team' checkboxes.
          if ($input.attr( 'name' ) === 'department') {
            $( $team_all, $( ':checked' ).parent() ).prop( 'checked', true );
          }

          // update hash w/ filters: 'department=filter1__team=filter2__...' pattern.
          var checked_filters = $( ':checked' ).map(
            function(i, e) {
              return e.getAttribute( 'name' ) + '=' + e.getAttribute( 'value' );
            }
          );

          // triggers get_posts() via hashchange listener.
          window.location.hash = encodeURIComponent( $.makeArray( checked_filters ).join( '__' ) );

          e.preventDefault();
        }
      );

    }

    /*
     * Get (filtered) job posts from internal list ('var jobs'), and append (or not) to DOM accordingly
     * If appending: clicked 'load-more' button, get jobs from defined filter, page by page
     * Otherwise: clicked sidebar click, fresh page visit -> it's a new result set, and page is 1
     * Lastly, generating from back button (cache) -> generates a range (page 1 to page n)
     */

    function get_posts(filter_data, append) {

      // filter by selected sidebar filters.
      var filtered_jobs = filter_jobs( jobs, filter_data );

      // sort by most recent date.
      filtered_jobs = filtered_jobs.sort(
        function(a, b) {
          return b.createdAt - a.createdAt;
        }
      );

      var html = '';

      if (append) {
        html = build_job_list_html( filtered_jobs, filter_data );
      } else {
        for (var i = 1; i <= filter_data.page; i++) {
          html += build_job_list_html(
            filtered_jobs, {
              page: i,
            }
          );
        }
      }

      update_view( html, filter_data.page, append, filtered_jobs.length );

      update_jobCache( filter_data.page );

      load_off();
    }

    // Get a page of job results (e.g. 10 jobs a page, and page = 2 -> returns jobs 20-30 in 'all jobs' list).
    function build_job_list_html(data, filter_data) {

      // paginate counted (num && position in jobs array)
      var html = '';
      var page = filter_data.page;

      for (var i = 0; i < LIMIT && (LIMIT * (page - 1) + i) < data.length; i++) {
        html += job_list_tmpl( data[LIMIT * (page - 1) + i], i );
      }
      return html;
    }

    /*
     * Filters all jobs according to filtered checkbox criteria
     * for every job, for each filter group...
     * if the selected filter neither matches that job's categorization, nor 'ALL' is not checked for that category ->
     * do not add this job to the filtered list
     */

    function filter_jobs(data, filter_data) {
      var filtered_jobs = [];

      for (var i = 0; i < data.length; i++) {

        var add = true;
        for (var key in filter_data.filters) {
          if ( ! ((filter_data.filters[key][0] === data[i].categories[key]) ||
              (filter_data.filters[key][0] === ''))) {
            add = false;
          }
        }

        if (add) {
          filtered_jobs.push( data[i] );
        }
      }

      return filtered_jobs;
    }

    // appends filtered content to DOM, calculates pagination and toggles buttons accordingly.
    function update_view(html, page, append, num_jobs) {

      max_num_pages = Math.ceil( num_jobs / LIMIT );

      if (html) {
        $load_more.removeClass( 'hidden' );
        $no_results.addClass( 'hidden' );

        if (append === true) {
          $container.append( html );
        } else {
          $container.html( html );
        }

      } else {
        $load_more.addClass( 'hidden' );
        $container.empty();
        $no_results.removeClass( 'hidden' );
      }

      if (page < max_num_pages) {
        $load_more.removeClass( 'hidden' );
      } else {
        $load_more.addClass( 'hidden' );
      }

      // show selected teams, hide the rest.
      var $selected_team = $( '[name="department"]:checked' ).siblings( '.team' );

      $( '.team' ).not( $selected_team ).hide( 'fast' );

      if ( ! $( 'input', $selected_team ).is( ':checked' )) {
        $( '.check-all', $selected_team ).prop( 'checked', true );
      }

      $selected_team.show( 'fast' );
    }

    /*
     * appends filtered job 'state' to #jobCache hidden input field to return to same
     * state when clicking back button
     */
    function update_jobCache(page) {

      // save only needed fields to DOM for filtering jobs.
      var trimmed_jobs = $.map(
        jobs, function(job) {
          return {
            categories: job.categories,
            createdAt: job.createdAt,
            id: job.id,
            text: job.text,
          };
        }
      );

      // append 'state' of filters to #jobCache.
      $jobCache.val(
        JSON.stringify(
          {
            'page': page,
            'load_more': $load_more.hasClass( 'hidden' ),
            'jobs': trimmed_jobs,
            'checked_sidebar': $( ':checked' ).map(
              function(i, e) {
                return e.id;
              }
            ).toArray(),
          'scrollTop': $( 'html,body' ).scrollTop(),
          }
        )
      );
    }

    // Job listing template.
    function job_list_tmpl(job, i) {

      // localized career path, or default to eng 'careers'.
      var careers_path = 'careers';

      var job_html =
        '<article id="post-' + (job.id || '') + '" class="filter-listing__item">' +
        '  <a href="/' + careers_path + '/' + (job.id || '') + '/" id="Careers_CurrentOpeningModule_JobListing_' + (i + 1) + '"' +
        '     onclick="' + qc.helper.onclick_job( job.text, false ) + '"' +
        '     target="_blank">' +
        '    <div class="filter-listing__item-inner">' +
        '      <h2 class="filter-listing__item-title">' + (job.text || '') + '</h2> ' +
        '      <span class="filter-listing__item-locations">' + (job.categories.location || '') + '</span>' +
        '    </div>' +
        '  </a>' +
        '</article>';
      return job_html;
    }

    // toggle 'loading' indicators off.
    function load_off() {
      $( '.filter-listing__main', $this ).removeClass( 'filter-listing--loading' );
      $load_more.removeClass( 'btn--loading' );
    }

    /*
     * converts url hash fragment indentifier to appropriate checkmarked checkboxes
     * example: '#department=Engineering' marks the tag
     * <input name='department' value='Engineering'> as checked
     * blank values are considered 'All'
     */
    function hash_to_checkbox() {

      var hash = decodeURIComponent( window.location.hash ).match( /[^#].*/ );

      if ( ! hash) {
        $( '.check-all' ).prop( 'checked', true );
        return false;
      }

      var hash_filters = hash[0].split( '__' );

      for (var i = 0; i < hash_filters.length; i++) {

        var category_value = hash_filters[i].split( '=' ),
          category = category_value[0], //e.g.:location.
          value = category_value[1], //e.g: new york.

          $checkbox = $( '.' + category )
          .find( '[name="' + category + '"][value="' + value + '"]' );

        // edge case where same team exists across departments.
        // makes sure to select the team w/ the checked department.
        if ($checkbox.length > 1) {
          $checkbox = $( '[value="' + value + '"]', $( ':checked' ).parent() );
        }

        $checkbox.prop( 'checked', true );
      }

      return hash;
    }

    /**
     * ===  Sidebar functions: filtering, rendering  ===
     */

    function build_sidebar(data) {
      var jobs = $.extend( true, [], data );

      for (var i = 0; i < SIDEBAR_FILTERS.length; i++) {
        var categories = get_unique_categories( jobs, SIDEBAR_FILTERS[i] );
        render_sidebar( SIDEBAR_FILTERS[i], categories, sidebar_tmpl, $( '.accordion__inner ul' )[i] );
      }

      render_nested_teams();
    }

    /*
     * builds, renders, appends nested team checkboxes under the appropriate department
     */
    function render_nested_teams() {

      // build department-team uniques hash list.
      var dept_teams = {};

      for (var i = 0; i < jobs.length; i++) {
        var dept = jobs[i].categories['department'],
          team = jobs[i].categories['team'];

        dept_teams[dept] = dept_teams[dept] || [];
        dept_teams[dept].push( team );
      }

      // build a list of unique teams per dept.
      for (dept in dept_teams) {

        var teams = $.unique( dept_teams[dept].sort() ),
          $dept = $( '[value="' + dept + '"]' ).parent();

        // create team list.
        $dept.append( '<ul class="team"></ul>' );
        var $team_list = $( 'ul.team', $dept );

        // add 'All' checkbox translations.
        var all_txt = 'All';
        teams.unshift( all_txt );

        // populate list elements and append.
        var team_li = '';
        for (var j = 0; j < teams.length; j++) {
          team_li += team_templ( dept, teams[j], j === 0 );
        }

        $team_list.append( team_li );
      }
    }

    /*
     * Template for nested sidebar checkbox
     */
    function team_templ(dept, team, is_all) {
      var input_value = is_all ? '' : team,
        input_class = is_all ? 'class="check-all"' : '';

      var html =
        '<li>' +
        '  <label class="custom-checkbox">' +
        '    <input type="radio" id="team[' + dept + '][' + team + ']" ' +
        '           name="team" value="' + input_value + '" ' + input_class + '>' +
        '    <span class="custom-checkbox__indicator"></span>' + team +
        '  </label>' +
        '</li>';

      return html;
    }

    // get sorted uniques (all unique locations: e.g all unique teams, locations, commitments) to list in sidebar.
    function get_unique_categories(jobs, field) {

      // filter out jobs without empty filteres.
      var filtered_jobs = [];
      for (var i = 0; i < jobs.length; i++) {
        if (jobs[i].categories[field] !== undefined &&
          jobs[i].categories[field] !== '') {
          filtered_jobs.push( jobs[i] );
        }
      }

      // sort.
      var sorted_jobs = filtered_jobs.sort(
        function(a, b) {
          a = a.categories[field];
          b = b.categories[field];

          if (a < b) {
            return -1;
          }
          if (a > b) {
            return 1;
          }
          return 0;
        }
      );

      // pluck unique categories - if job not the same as before (assumes sorted list above).
      var fields = [];
      fields.push( sorted_jobs[0].categories[field] );

      for (i = 1; i < sorted_jobs.length; i++) {
        if (sorted_jobs[i - 1].categories[field] !== sorted_jobs[i].categories[field]) {
          fields.push( sorted_jobs[i].categories[field] );
        }
      }

      return fields;
    }

    // add generated sidebar html to DOM.
    function render_sidebar(type, content, template_fn, div) {
      var html = '';
      for (var i = 0; i < content.length; i++) {
        html += template_fn( type, content[i] );
      }
      $( div ).addClass( type ).append( html );
    }

    // individual sidebar checkbox template.
    function sidebar_tmpl(type, content) {
      type = type || '';
      content = content || '';

      var html =
        '<li>' +
        '  <label class="custom-checkbox"> ' +
        '    <input type="radio" id="' + type + '[' + content + ']" name="' + type + '" value="' + content + '">' +
        '    <span class="custom-checkbox__indicator"></span>' + content +
        '  </label>' +
        '</li>';
      return html;
    }

    // returns checked sidebar filters.
    function set_filters() {
      var data = {};

      $( ':checked', $this ).each(
        function(i, d) {
          var name = $( d ).prop( 'name' );

          if ( ! data[name]) {
            data[name] = [];
          }

          data[name].push( $( d ).val() );
        }
      );

      return data;
    }



    //////
    // Careers Job Single Page.
    // - Having these filters present kicks off the entire build of the career job listings.
    //////

    // Loads job from lever.
    function load_job() {
      var id = $header_wrap.attr( 'data-jobid' );

      // careers/lever/proxy is haproxy'd, passes request to api.lever.co [WEBCORE-847].
      $.ajax(
        {
          type: 'GET',
          url: 'https://www.rjbstarter.com/careers/lever/proxy/' + encodeURIComponent( id ),
          dataType: 'json',
          success: function(data) {

            build_job( data );
            console.log( data );

            $content.removeClass( 'hidden' ).attr( 'aria-hidden', false );
            $social_shares.removeClass( 'hidden' ).attr( 'aria-hidden', false );
          },
          error: function() {
            console.log( 'error' );
            $loading_error.removeClass( 'hidden' ).attr( 'aria-hidden', false );
          },
        }
      );
    }

    // Populate page with job data.
    function build_job(job) {

      // Html page title.
      $( 'title' ).text( (job.text || '') + ' - ' + (job.categories.location || '') + ' | Rjbstarter' );

      // main header: title, location, commitment.
      $header_wrap.append( render_job_header( job ) );

      // description & list content (requirements, responsibilties).
      $content.prepend( render_job_lists( job ) );

      // update apply button attributes with lever job data.
      apply_job_link( job );

      // update social share links w/ lever job data.
      replace_social_shares( job );
    }

    // renders job header template.
    function render_job_header(job) {
      var html = '';
      html += '<h1 class="single__title job-title">' + (job.text || '') + '</h1>';

      if (job.categories) {
        html += '<div class="single__meta job-commitment">' + (job.categories.commitment || '') + '</div>';
        html += '<div class="single__meta job-location">' + (job.categories.location || '') + '</div>';
        html += '<div class="single__meta job-team">' + (job.categories.team || '') + '</div>';
      }

      return html;
    }

    // render job content html.
    function render_job_lists(job) {

      var html = '<div class="job-description">' + (job.description || '') + '</div>';

      $( job.lists ).each(
        function(i, job_list) {
          html += '<div class="job-listing single__listing">';
          html += '<div class="job-listing-header single__listing__header">' + (job_list.text || '') + '</div>';
          html += '<ul class="job-listing-list">' + (job_list.content || '') + '</ul>';
          html += '</div>';
        }
      );

      html += '<div class="job-additional">' + (job.additional || '') + '</div>';

      return html;
    }

    // augment apply job link with url and analytics onclick behavior.
    function apply_job_link(job) {
      $apply_link.attr( 'href', job.applyUrl );
      $apply_link.attr( 'onclick', qc.helper.onclick_job( job.text, true ) );
    }

    // social share updates for ajax: twitter, linkedin: add title content in share url.
    function replace_social_shares(job) {
      replace_attr_text( $social_twitter, 'href', '?status=', job.text );
      replace_attr_text( $social_linkedin, 'href', '&title=', job.text );
    }

    function replace_attr_text($div, attr, url_param, text) {
      var uri = $div.attr( attr ).replace( url_param, url_param + text );
      $div.attr( attr, uri );
    }

    if ( $( '[data-behavior="single_job"]' ).length ) {
      /**
       * ---
       *
       * single_job.js
       *
       * Notes:
       *
       *
       * Renders a single job view from Lever: /careers/{job-id}
       * ---
       */
      //var $this = $( '[data-behavior="single_job"]' );
      var $header_wrap = $( '.job-header-wrap' ),
          $content = $( '.single__content' ),
          $apply_link = $( '#Job_Apply_Button' ),
          $social_shares = $( '.social-shares-wrap' ),
          $social_twitter = $( '.single__social-twitter' ),
          $social_linkedin = $( '.single__social-linkedin' );
      $loading_error = $( '.job-loading-error' )

      // Entry point.
      load_job();
    }
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
