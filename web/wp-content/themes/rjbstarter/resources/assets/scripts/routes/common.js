import LazyLoad from 'vanilla-lazyload';
import {tns} from 'tiny-slider/src/tiny-slider.js';
import { library, dom } from '@fortawesome/fontawesome-svg-core';

// Improt base icons
import { faArrowRight, faArrowLeft, faLongArrowRight, faLongArrowLeft, faChevronRight,
  faChevronLeft, faCaretRight, faCaretLeft, faAngleDoubleRight, faDesktop, faMobile,
  faTabletAndroid, faComment, faComments, faRoad, faRocket, faPlug, faHeart, faUser,
  faUsers, faUserCircle, faChartPie, faBars, faPlus, faExternalLink, faCheckSquare,
  faCheckCircle, faCheck, faCoffee, faGlassMartini, faBuilding, faMapSigns, faMap,
  faBrowser, faBarcode, faBullhorn, faBullseye, faChartArea, faChartBar, faChartLine,
  faCodeMerge, faLockAlt, faLockOpenAlt, faMicrophoneAlt,faTachometer, faInfoCircle,
  faImages, faWatch, faArrowToBottom, faList, faGift, faUtensils, faPaperPlane, faCog,
  faMobileAndroid, faClock, faFolder, faBeer, faGamepad, faLifeRing, faQuestionCircle,
  faPlayCircle, faAudioDescription, faBell, faCalendar, faDatabase, faBraille, faCube,
  faCode, faPaperclip, faTag, faTags, faTicket, faToggleOn, faToggleOff, faDollarSign,
  faEuroSign, faPoundSign, faHashtag, faCreditCard, faCreditCardFront, faUsdSquare,
  faNewspaper, faRss, faFile, faBookmark, faRedo, faInbox, faClipboard, faSearch,
  faHandshake, faSitemap, faLeaf, faTimes, faPhone, faEnvelope, faGlobe } from '@fortawesome/fontawesome-pro-light'

library.add( faArrowRight, faArrowLeft, faLongArrowRight, faLongArrowLeft, faChevronRight,
  faChevronLeft, faCaretRight, faCaretLeft, faAngleDoubleRight, faDesktop, faMobile,
  faTabletAndroid, faComment, faComments, faRoad, faRocket, faPlug, faHeart, faUser,
  faUsers, faUserCircle, faChartPie, faBars, faPlus, faExternalLink, faCheckSquare,
  faCheckCircle, faCheck, faCoffee, faGlassMartini, faBuilding, faMapSigns, faMap,
  faBrowser, faBarcode, faBullhorn, faBullseye, faChartArea, faChartBar, faChartLine,
  faCodeMerge, faLockAlt, faLockOpenAlt, faMicrophoneAlt,faTachometer, faInfoCircle,
  faImages, faWatch, faArrowToBottom, faList, faGift, faUtensils, faPaperPlane, faCog,
  faMobileAndroid, faClock, faFolder, faBeer, faGamepad, faLifeRing, faQuestionCircle,
  faPlayCircle, faAudioDescription, faBell, faCalendar, faDatabase, faBraille, faCube,
  faCode, faPaperclip, faTag, faTags, faTicket, faToggleOn, faToggleOff, faDollarSign,
  faEuroSign, faPoundSign, faHashtag, faCreditCard, faCreditCardFront, faUsdSquare,
  faNewspaper, faRss, faFile, faBookmark, faRedo, faInbox, faClipboard, faSearch,
  faHandshake, faSitemap, faLeaf, faTimes, faPhone, faEnvelope, faGlobe );

// Import social icons
import { faFacebook, faTwitter, faLinkedin, faPinterest, faInstagram, faFacebookSquare,
  faTwitterSquare, faPinterestSquare, faInstagramSquare } from '@fortawesome/free-brands-svg-icons'; // class fab fa-[name-with-dashes]

library.add( faFacebook, faTwitter, faLinkedin, faPinterest, faInstagram, faFacebookSquare,
  faTwitterSquare, faPinterestSquare, faInstagramSquare );


var faCustomWindowQuestionIcon = {
  prefix: 'fac',
  iconName: 'window-question',
  icon: [
    24,
    24,
    [],
    'e001',
    'M10.5 16H.5c-.3 0-.5-.2-.5-.5V.5C0 .2.2 0 .5 0h19c.3 0 .5.2.5.5v8c0 .3-.2.5-.5.5s-.5-.2-.5-.5V1H1v14h9.5c.3 0 .5.2.5.5s-.2.5-.5.5z M19.5 5H.5C.2 5 0 4.8 0 4.5S.2 4 .5 4h19c.3 0 .5.2.5.5s-.2.5-.5.5zM3.5 3h-1c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h1c.3 0 .5.2.5.5s-.2.5-.5.5zM6.5 3h-1c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h1c.3 0 .5.2.5.5s-.2.5-.5.5zM9.5 3h-1c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h1c.3 0 .5.2.5.5s-.2.5-.5.5z M18.5 20.5c-.3 0-.5-.2-.5-.5v-.5c0-.3.2-.5.5-.5s.5.2.5.5v.5c0 .3-.2.5-.5.5z M18.5 22.5c-.1 0-.2 0-.2-.1l-5-2.7c-.2-.1-.3-.3-.3-.4v-5.7c0-.2.1-.4.3-.4l5-2.7c.1-.1.3-.1.5 0l5 2.7c.2.1.3.3.3.4v5.7c0 .2-.1.4-.3.4l-5 2.7c-.1.1-.2.1-.3.1zM14 19l4.5 2.4L23 19v-5l-4.5-2.4L14 14v5z M18.5 18.5c-.3 0-.5-.2-.5-.5v-.5c0-.2.1-.4.3-.4l1.7-.9v-1.4l-1.5-.8-1.5.8v.7c0 .3-.2.5-.5.5s-.5-.2-.5-.5v-1c0-.2.1-.4.3-.4l2-1c.1-.1.3-.1.4 0l2 1c.2.1.3.3.3.4v2c0 .2-.1.4-.3.4l-1.7.9v.2c0 .3-.2.5-.5.5z',
  ],
};

var faCustomComputerIdeaIcon = {
  prefix: 'fac',
  iconName: 'computer-idea',
  icon: [
    24,
    24,
    [],
    'e002',
    'M18.5 2c.1 0 .2 0 .3-.1l1.5-1c.2-.2.3-.5.1-.7-.2-.2-.5-.3-.7-.1l-1.5 1c-.2.2-.3.5-.1.7.1.1.2.2.4.2zM19 4.5c0 .3.2.5.5.5h2c.3 0 .5-.2.5-.5s-.2-.5-.5-.5h-2c-.3 0-.5.2-.5.5zM3.5 5h2c.3 0 .5-.2.5-.5S5.8 4 5.5 4h-2c-.3 0-.5.2-.5.5s.2.5.5.5zM10 7.8v1.7c0 .3.2.5.5.5H12v.5c0 .3.2.5.5.5s.5-.2.5-.5V10h1.5c.3 0 .5-.2.5-.5V7.8l1.8-1.1c.1-.1.2-.3.2-.5V2.5c0-.2-.1-.4-.3-.4l-4-2c-.1-.1-.3-.1-.4 0l-4 2c-.2 0-.3.2-.3.4v3.8c0 .2.1.3.2.4L10 7.8zM11 9V8h3v1h-3zM9 2.8l3.5-1.7L16 2.8V6l-1.6 1H13V5.7l1.4-1.4c.2-.2.2-.5 0-.7s-.5-.2-.7 0l-1.1 1.1-1.1-1.1c-.2-.2-.5-.2-.7 0s-.2.5 0 .7L12 5.7V7h-1.4L9 6V2.8z M23.5 23.4l-1.5-5V9.5c0-.3-.2-.5-.5-.5h-5c-.3 0-.5.2-.5.5s.2.5.5.5H21v8H4v-8h4.5c.3 0 .5-.2.5-.5S8.8 9 8.5 9h-5c-.3 0-.5.2-.5.5v8.9l-1.5 5c0 .2 0 .3.1.4.1.1.2.2.4.2h21c.2 0 .3-.1.4-.2.1-.1.1-.3.1-.4zM2.7 23l1.2-4h17.3l1.2 4H2.7z M13.5 21h-2c-.3 0-.5.2-.5.5s.2.5.5.5h2c.3 0 .5-.2.5-.5s-.2-.5-.5-.5zM6.2 1.9c.1.1.2.1.3.1.2 0 .3-.1.4-.2.2-.3.1-.6-.1-.7L5.3.1C5-.1 4.7 0 4.6.2c-.2.3-.1.6.1.7l1.5 1z',
  ],
};

var faCustomGlassDoorIcon = {
  prefix: 'fac',
  iconName: 'glassdoor',
  icon: [
    24,
    24,
    [],
    'e003',
    'M17.144 20.572H3.43A3.427 3.427 0 0 0 6.856 24h10.286a3.428 3.428 0 0 0 3.428-3.428V6.492a.123.123 0 0 0-.124-.125h-3.18a.125.125 0 0 0-.123.126v14.08zm0-20.572a3.429 3.429 0 0 1 3.427 3.43H6.858v14.078a.126.126 0 0 1-.125.125H3.554a.125.125 0 0 1-.125-.125V3.428A3.429 3.429 0 0 1 6.856 0h10.287',
  ],
};

var faCustomIabIcon = {
  prefix: 'fac',
  iconName: 'iab',
  icon: [
    601,
    302,
    [],
    'e004',
    'M561.6 224.1c-21.2 0-38.5 17.2-38.5 38.5s17.2 38.5 38.5 38.5c21.2 0 38.5-17.2 38.5-38.5s-17.3-38.5-38.5-38.5zM38.5 5.2C17.3 5.2 0 22.4 0 43.7s17.2 38.5 38.5 38.5S77 65 77 43.7 59.8 5.2 38.5 5.2zM68 108.7H9v190.9h59V108.7zM399.9 242.2c-21.2 0-38.5-17.2-38.5-38.5 0-21.2 17.2-38.5 38.5-38.5s38.5 17.2 38.5 38.5-17.2 38.5-38.5 38.5zm75.2-105.6c-16.1-17.2-38.7-27.9-63.4-27.9-18.5 0-35.8 6-50.1 16.3V0h-59v299.7h59v-16.6c14.3 10.3 31.6 16.3 50.1 16.3 24.7 0 47.3-10.7 63.4-27.9 16.2-17.2 26.3-41.2 26.3-67.4 0-26.3-10.1-50.4-26.3-67.5zM185.6 242.2c-21.2 0-38.5-17.2-38.5-38.5 0-21.2 17.2-38.5 38.5-38.5s38.5 17.2 38.5 38.5-17.2 38.5-38.5 38.5zm38.6-133.5v16.4c-14.3-10.4-31.7-16.5-50.3-16.5-24.7 0-47.2 10.7-63.3 27.9-16.2 17.2-26.3 41.2-26.2 67.4 0 26.2 10.1 50.3 26.2 67.4 16.1 17.2 38.7 28 63.3 27.9 18.6 0 35.9-6.1 50.2-16.4v16.7h59V108.7h-58.9z',
  ],
};

var faCustomPermisioIcon = {
  prefix: 'fac',
  iconName: 'permisio',
  icon: [
    1400,
    278,
    [],
    'e005',
    'M.404 2.77h87.01c41.893 0 92.648 19.319 92.648 84.517 0 61.175-45.922 84.115-88.218 84.115H53.98v97.396H.404V2.77zm82.981 123.556c35.045 0 43.102-21.33 43.102-39.038 0-18.111-12.488-39.442-42.699-39.442H53.577v78.078h29.808v.402zm164.351 66.004c2.014 21.331 15.307 42.662 42.698 42.662 15.71 0 29.406-7.245 36.657-21.733l49.547 4.024c-12.488 37.027-45.922 56.747-88.62 56.747-54.784 0-93.052-37.429-93.052-95.786 0-58.759 38.268-96.189 93.052-96.189 54.783 0 93.051 37.43 93.051 96.189v14.086H247.736zm82.175-32.599c-1.612-17.708-15.307-39.039-39.879-39.039-26.586 0-39.88 18.513-42.699 39.039h82.578zm82.981-72.846h48.741V121.9h.805c9.668-25.757 28.198-39.844 52.367-39.844h7.251v49.503h-11.279c-26.183 0-46.727 16.099-46.727 48.296v88.944h-51.158V86.885zm344.813 64.797c0-14.087-7.653-28.575-27.391-28.575-19.739 0-29.003 18.111-29.003 32.599v113.092h-51.159V156.511c0-19.318-6.445-33.807-27.794-33.807-20.947 0-28.6 17.709-28.6 35.417v110.677H542.6V86.885h48.741v23.745h.805c16.113-24.147 33.837-28.575 54.784-28.575 12.084 0 36.254 3.22 48.741 28.173 18.127-24.148 38.268-28.172 53.575-28.172 31.017 0 58.812 18.11 58.812 56.344v130.398H756.9V151.682h.805zM874.523.355c15.307 0 29.809 13.282 29.809 29.38 0 15.696-13.293 30.185-29.809 30.185-16.918 0-29.809-15.294-29.809-29.38 0-14.89 12.891-30.185 29.809-30.185zm-25.378 86.53h51.158v181.913h-51.158V86.885zm192.145 56.345c-.81-15.294-11.68-24.55-31.02-24.55-13.29 0-26.986 5.232-26.986 16.098 0 32.6 113.596 4.427 113.596 78.078 0 14.086-7.65 60.772-82.98 60.772-25.379 0-76.537-7.647-80.968-61.577h51.158c.806 17.709 16.11 24.953 31.42 24.953 13.29 0 30.21-4.025 30.21-18.916 0-30.587-109.163-2.817-109.163-78.078 0-28.172 21.752-58.357 75.323-58.357 46.73 0 77.75 20.526 80.57 60.37l-51.16 1.207zM1154.48.355c15.31 0 29.81 13.282 29.81 29.38 0 15.696-13.29 30.185-29.81 30.185-16.92 0-29.81-15.294-29.81-29.38.41-14.89 12.89-30.185 29.81-30.185zm-25.37 86.53h51.15v181.913h-51.15V86.885zM1298.69 277.652c-55.59 0-100.7-45.076-100.7-100.616 0-55.539 45.11-100.615 100.7-100.615s100.71 45.076 100.71 100.615c0 55.54-45.12 100.616-100.71 100.616zm0-152.936c-28.6 0-52.36 23.343-52.36 51.918s23.36 52.32 52.36 52.32c28.6 0 51.97-23.343 51.97-52.32.4-28.575-22.96-51.918-51.97-51.918z',
  ],
};

library.add(faCustomWindowQuestionIcon, faCustomComputerIdeaIcon, faCustomGlassDoorIcon, faCustomIabIcon, faCustomPermisioIcon);

export default {
  init() {
    // JavaScript to be fired on all pages

    /**
     * Image Lazy Load.
     */
    var imgLazyLoad = new LazyLoad();
    // After your content has changed...
    imgLazyLoad.update();

    /**
     * Website scroll detection.
     */
    function toggleScrollClass(){
      if ($(window).scrollTop() > 0) {
        $('body').addClass('scroll');
      } else {
        $('body').removeClass('scroll');
      }
    }

    $(window).on({
      load:function(){
        toggleScrollClass();
      },
      resize:function(){
        toggleScrollClass();
      },
      scroll:function(){
        toggleScrollClass();
      },
    });

    //////
    // Start - Load posts: main blog page
    //////
    /*
    var $ajaxBlogMorePosts = $('#more-posts') || {};
    var $ajaxBlogMorePostsDisplay = $ajaxBlogMorePosts.find('#ajax-posts') || {};
    var $ajaxBlogMoreEmpty = $ajaxBlogMorePosts.find('#more-empty') || {};
    var $ajaxBlogMoreLoad = $ajaxBlogMorePosts.find('#more-load') || {};

    function load_posts(blog_page){
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_posts',
          page: blog_page,
          security: ajax_object.ajax_nonce,
        },

        success: function(res){

          var resObj = JSON.parse(res);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              blog_page++;
              $ajaxBlogMorePostsDisplay.append(resObj.data);
              $ajaxBlogMoreLoad.removeClass('d-none');
              $ajaxBlogMoreEmpty.addClass('d-none');
              $('[data-load-posts="category"]').attr('disabled',false);
            }
            else {
              $ajaxBlogMoreLoad.addClass('d-none');
              $ajaxBlogMoreEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxBlogMorePostsDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxBlogMorePostsDisplay.length ) {
      var blog_page = 2;
      $(document).on('click', '[data-load-posts="all"]', function(){ // When btn is pressed.
        $('[data-load-posts="all"]').attr('disabled',true); // Disable the button, temp.
        load_posts(blog_page);
        blog_page++;
      });
    }
    */
    //////
    // End - Load posts: main blog page
    //////

    //////
    // Start - Load posts: category blog page
    //////
    /*
    var $ajaxMorePosts = $('#more-posts') || {};
    var $ajaxMorePostsDisplay = $ajaxMorePosts.find('#ajax-posts') || {};
    var $ajaxMoreEmpty = $ajaxMorePosts.find('#more-empty') || {};
    var $ajaxMoreLoad = $ajaxMorePosts.find('#more-load') || {};

    function load_category_posts(blog_page, category_id){
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_category_posts',
          page: blog_page,
          category_id: category_id,
          security: ajax_object.ajax_nonce,
        },
        success: function(res){
          var resObj = JSON.parse(res);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              blog_page++;
              $ajaxMorePostsDisplay.append(resObj.data);
              $ajaxMoreLoad.removeClass('d-none');
              $ajaxMoreEmpty.addClass('d-none');
              $('[data-load-posts="category"]').attr('disabled',false);
            }
            else {
              $ajaxMoreLoad.addClass('d-none');
              $ajaxMoreEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxMorePostsDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxMorePosts.length ) {
      var category_blog_page = 2; // Start this at 2 b/c page 1 loaded on initial page load.

      // Listen for clicks on [data-load-posts="category"]
      $(document).on('click', '[data-load-posts="category"]', function(){ // When data-load-posts="category" item is pressed.
        $('[data-load-posts="category"]').attr('disabled',true); // Disable the button, temp.
        var category_id = $(this).attr('data-load-posts-category') || '';
        load_category_posts(category_blog_page, category_id);
        category_blog_page++;
      });
    }
    */
    //////
    // End - Load posts: category blog page
    //////

    //////
    // Start - Load resources: taxonomy resource page
    //////
    var $ajaxMorePosts = $('[data-load-more="post-category"]') || {};
    var $ajaxMorePostsDisplay = $ajaxMorePosts.find('#ajax-posts') || {};
    var $ajaxMorePostsEmpty = $ajaxMorePosts.find('#more-empty') || {};
    var $ajaxMorePostsLoad = $ajaxMorePosts.find('#more-load') || {};

    function load_category_posts(posts_page, category_id) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_posts',
          page: posts_page,
          category_id: category_id,
          security: ajax_object.ajax_nonce,
        },
        beforeSend: function() {
          //console.log('about to ajax call to get more posts');
        },
        success: function(res){
          var resObj = JSON.parse(res);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              posts_page++;
              $ajaxMorePostsDisplay.append(resObj.data);
              $ajaxMorePostsLoad.removeClass('d-none');
              $ajaxMorePostsEmpty.addClass('d-none');
              $('[data-load="posts"]').attr('disabled',false);
            }
            else {
              $ajaxMorePostsLoad.addClass('d-none');
              $ajaxMorePostsEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxMorePostsDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxMorePosts.length ) {
      var category_posts_page = 2; // Start this at 2 b/c page 1 loaded on initial page load.

      // Listen for clicks on [data-load="resources"]
      $(document).on('click', '[data-load="posts"]', function(){ // When data-load-resources="taxonomy" item is pressed.
        $('[data-load="posts"]').attr('disabled',true); // Disable the button, temp.
        var category_id = $(this).attr('data-category-id') || '';
        load_category_posts(category_posts_page, category_id);
        category_posts_page++;
      });
    }
    //////
    // End - Load resources: taxonomy resource page
    //////


    $.tabsContainer = function (element) { //renamed arg for readability
      //store the passed element as a property of the created instance.
      this.element = (element instanceof $) ? element : $(element);
      this.elementId = this.element.attr('id');
      this.navUl = this.element.find('[data-nav-tabs]');
      this.navWrapper = this.navUl.parent();
      this.navWidth = this.navWrapper.outerWidth();
      this.menuPage = Math.ceil(this.navUl.scrollWidth / this.navWidth);
      this.currentPage = 1;
      this.navList;
      this.tabNavItems = $(document).find('.tns-item');
      this.tabItems = this.element.find('[data-tab-pane]');
    };
    $.tabsContainer.prototype = {
      init: function () {
        //`this` references the instance object inside of an instace's method,
        //however `this` is set to reference a DOM element inside jQuery event
        //handler functions' scope. So we take advantage of JS's lexical scope
        //and assign the `this` reference to another variable that we can access
        //inside the jQuery handlers

        var that = this;
        var primary_found = 0;
        this.tabItems.each(function() {
          var primary = $(this).attr('data-tab-pane') || '';
          var title = $(this).attr('data-tab-pane-title') || '';
          var url = $(this).attr('data-tab-pane-url') || '';
          var id = $(this).attr('id') || '';

          if( title && id && that.navUl.length && ! url ) {
            if( ! primary_found && 'primary' == primary ) {
              that.navUl.append('<li class="nav-item d-flex"><a class="tab-nav-link active" data-toggle="pill" href="#' + id + '">'+ title +'</a></li>');
              $(this).addClass('tab-pane fade');
              primary_found = 1;
              $(this).addClass('active').addClass('in').addClass('show');
            }
            else {
              that.navUl.append('<li class="nav-item d-flex"><a class="tab-nav-link" data-toggle="pill" href="#' + id + '">'+ title +'</a></li>');
              $(this).addClass('tab-pane fade');
            }
          }
          else {
            that.navUl.append('<li class="nav-item d-flex"><a class="tab-nav-link" href="' + url + '">'+ title +'</a></li>');
            $(this).addClass('tab-pane fade');
          }
        });

        that.navMobileSlider();
      },

      getNavItems: function() {
        var container = $(document).find('#' + this.elementId);
        this.tabNavItems = container.find('.nav-item.tns-item');

        return this.tabNavItems
      },
      showNavTabItem: function(index) {
        var container = $(document).find('#' + this.elementId);
        var activateItem = container.find('#tns1-item'+index.toString());
        activateItem.find('a').tab('show');

        return this.tabNavItems;
      },

      navMobileSlider: function() {
        var that = this;

        // https://github.com/ganlanyuan/tiny-slider
        if ( $( '.nav-wrapper .nav-mobile-slider' ).length ) {

          var navSlider = tns({
            container: '.nav-mobile-slider',
            items: 1,
            slideBy: 'page',
            nav: true,
            navPosition: 'bottom',
            arrowKeys: true,
            controls: true,
            controlsPosition: 'bottom',
            controlsText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
            lazyload: false,
            startIndex: 0,
            autoplay: false,
            freezable: false,
            autoplayButtonOutput: false,
            autoHeight: false,
            responsive: {
              768: {
                disable: true,
              },
            },
          });

          //navSlider.events.on('indexChanged', function (info, eventName) {
          navSlider.events.on('indexChanged', function (info) {
            var showId = info.displayIndex - 1;
            // that.getNavItems();
            that.showNavTabItem(showId);
          });
        }
      },
    };

    // Check if the data-tabs-container exists
    if ( $( 'main.main [data-tabs-container]' ).length ) {
      var tabContainer = new $.tabsContainer($('main.main [data-tabs-container]'));
      // initialize the tab containers
      tabContainer.init();
    }

    /**
     * Navigation
     **/
    $('#primaryNavigation').on('hide.bs.collapse', function () {
      $('body').removeClass('expanded-nav');
    });
    $('#primaryNavigation').on('hidden.bs.collapse', function () {
      $('body').removeClass('expanded-nav');
    });
    $('#primaryNavigation').on('show.bs.collapse', function () {
      $('body').addClass('expanded-nav');
    });
    $('#primaryNavigation').on('shown.bs.collapse', function () {
      $('body').addClass('expanded-nav');
    });

    /**
     * Contact Takeover
     **/
     $(document).on('click', '[data-contact-takeover], [href="#contact"]', function(e){
       e.preventDefault();
       $( 'body' ).toggleClass('contact-show');
     });

    /**
     * Contact Takeover - Advertise Selected
     **/
    $(document).on('click', '[data-contact-takeover-choice], [href="#contact-choice"], [href="#contact-choice-premium"], [href="#contact-idenity"], [href="#contact-privacy"], [href="#contact-gdpr"], [href="#contact-ccpa"]', function(e){
      e.preventDefault();

      MktoForms2.whenReady(function (form) {
        var process_form = false;
        var form_id      = form.getId() || '';

        if (! form_id ) {
          return;
        }

        switch (form_id) {
          case 3328:
            process_form = true;
            break;
          default:
        }

        // Returning if not our mkto form 3328
        if( ! process_form ) {
          return;
        }

        // Set the product field value to Choice Premium
        form.vals({ 'product':'Choice Premium'});
      });

      // Toggle the body class to show/hide the takeover
      $( 'body' ).toggleClass('contact-show');
    });

    /**
     * Contact Takeover - Advertise Selected
     **/
    $(document).on('click', '[data-contact-takeover-publishers], [href="#contact-publishers"], [href="#contact-publisher"], [href="#contact-q-for-publishers"], [href="#contact-q-for-publisher"]', function(e){
      e.preventDefault();

      MktoForms2.whenReady(function (form) {
        var process_form = false;
        var form_id      = form.getId() || '';

        if (! form_id ) {
          return;
        }

        switch (form_id) {
          case 3328:
            process_form = true;
            break;
          default:
        }

        // Returning if not our mkto form 3328
        if( ! process_form ) {
          return;
        }

        // Set the product field value to Q for Publishers
        form.vals({ 'product':'Q for Publishers'});
      });

      // Toggle the body class to show/hide the takeover
      $( 'body' ).toggleClass('contact-show');
    });

    /**
     * Contact Takeover - Advertise Selected
     **/
    $(document).on('click', '[data-contact-takeover-advertise], [href="#contact-advertise"], [href="#contact-advertiser"], [href="#contact-advertisers"]', function(e){
      e.preventDefault();

      MktoForms2.whenReady(function (form) {
        var process_form = false;
        var form_id      = form.getId() || '';

        if (! form_id ) {
          return;
        }

        switch (form_id) {
          case 3328:
            process_form = true;
            break;
          default:
        }

        // Returning if not our mkto form 3328
        if( ! process_form ) {
          return;
        }

        // Set the product field value to Advertise
        form.vals({ 'product':'Advertise'});
      });

      // Toggle the body class to show/hide the takeover
      $( 'body' ).toggleClass('contact-show');
    });

    /**
     * Get Started Takeovers
     **/
     // Version 1
     $(document).on('click', '[data-get-started-takeover], [href="#get-started"],  [href="#action-plan"]', function(e){
       e.preventDefault();
       //$( 'body' ).toggleClass('get-started-show');
       $( 'body' ).toggleClass('get-started-takeover');
     });

     //////
     // On Hash Link Click - Helper Function
     //////
    function revealGatedForm(formId) {
      var $gatedSection = $(document).find('[data-mkto-gated-section="'+formId+'"]');
      if( $gatedSection.length ) {
        var $gatedSectionForm = $gatedSection.find('[data-gated-asset-form-wrapper]');
        if( $gatedSectionForm.length ) {
          $gatedSectionForm.removeClass('d-none');
        }
      }
    }

    //////
    // On Hash Link Click
    // Anchor links and #show- anchor links (to reveal gated form).
    // https://stackoverflow.com/questions/10732690/offsetting-an-html-anchor-to-adjust-for-fixed-header/21707103#21707103
    //////
    $(document).on('click', 'a[href]', function() {
      if( this.hash && this.hash.length > 1 ) {
        if( this.hash.startsWith('#show-') && this.hash.length > 6 ) {
          var showFormId = this.hash.substring(this.hash.indexOf('#show-') + 6);
          if( showFormId ){
            revealGatedForm(showFormId)
          }
        }

        var target = $(this.hash);
        var dataToggle = $(this).attr('data-toggle');
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length && ! dataToggle) {
          $('html,body').animate({
            scrollTop: target.offset().top - 100, //offsets for fixed header
          }, 400);
          return false;
        }

      }
    });

    //////
    // On Page Load
    // Anchor links and #show- anchor links (to reveal gated form).
    // https://stackoverflow.com/questions/10732690/offsetting-an-html-anchor-to-adjust-for-fixed-header/21707103#21707103
    //////
    $(window).on('load', function() {
      if( window.location.hash && window.location.hash.length > 1 ) {
        if( window.location.hash.startsWith('#show-') && window.location.hash.length > 6 ) {
          var showFormId = window.location.hash.substring(window.location.hash.indexOf('#show-') + 6);
          if( showFormId ){
            revealGatedForm(showFormId)
          }
        }

        var target = $(window.location.hash);
        target = target.length ? target : $('[name=' + window.location.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 100, //offsets for fixed header
          }, 400);
          return false;
        }

      }
    });


    /**
     * Send message directly to the appropriate privacy inbox privacy@rjbstarter.com or privacy.qli@rjbstarter.com.
     */
    $('body').on( 'submit', '#contact_legal', function( e ){
      var form = $('#contact_legal');
      var formParent = form.parent();

      // Prevent the form from submitting and do an ajax submit below.
      e.preventDefault();

      $.ajax({
        url:form.attr('action'),
        data:form.serialize(), // form data
        type:form.attr('method'), // POST
        beforeSend:function(){
          // Remove any previous validation messages
          form.find('.invalid-feedback').remove();

          form
            .addClass('sending') // Add the 'sending' class to the form to disable it with css.
            .find('button')
              .text('Sending...'); // Update the button text to say Sending...
        },
        error: function (data) {
          console.log('data in success', data);
          var topMsg = formParent.find('.top-msg');
          topMsg.html('<div class="invalid-feedback">Sorry, there was an error sending your message. Please refresh the page and try again.</div>');
        },
        success:function(data) {
          console.log('data in success', data);
          var retObj = JSON.parse(data);
          var topMsg = formParent.find('.top-msg');

          // Push an event to GTM via the data layer, used as a trigger to send GA data
          window.dataLayer = window.dataLayer || [];

          if( retObj.status == 'success') {
            form.remove();

            // Push an event to the data layer for GTM/GA measurement.
            window.dataLayer.push({
              'event': 'contactLegalFormSubmit',
              'status': 'success',
              'emailTo': retObj.emailSentToAddress,
            });
          }
          else if ( retObj.status == 'error') {
            var errors = retObj.errors;
            $(errors).each(function(i,v) {
              var err_container = '.' + v.container;
              var err_message = v.msg;
              $(form).find(err_container).append('<div class="invalid-feedback d-block text-center">'+err_message+'</div>');
            });

            form
              .removeClass('sending')
              .find('button').text('Send');

              // Push an event to the data layer for GTM/GA measurement.
              window.dataLayer.push({
                'event': 'contactLegalFormSubmit',
                'status': 'fail',
                'emailTo': retObj.emailSentToAddress,
              });
          }

          if( topMsg.length ) {
            topMsg.html( retObj.msg );
          }
        },
      });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
    dom.watch();

    // https://github.com/ganlanyuan/tiny-slider

    if ( $( '.slider .slide-items' ).length ) {
      tns({
        container: '.slide-items',
        items: 1,
        slideBy: 'page',
        nav: true,
        navPosition: 'bottom',
        arrowKeys: true,
        controls: true,
        controlsPosition: 'bottom',
        controlsText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
        lazyload: false,
        startIndex: 0,
        autoplay: true,
        autoplayPosition: 'bottom',
        autoplayTimeout: 6000,
        autoplayHoverPause: true,
        freezable: false,
        autoplayButtonOutput: false,
      });
    }

    if( $('[data-share-fb]').length ) {
      $('[data-share-fb]').click(function(e) {
        e.preventDefault();
        var share_href = $(this).attr('data-share-fb') || '';
        if( share_href ) {
          share_href= 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURI(share_href);
          window.open(share_href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
          return false;
        }
      });
    }




    if( $('[data-share-li]').length ) {
      $('[data-share-li]').click(function(e) {
        e.preventDefault();
        var share_href = $(this).attr('data-share-li') || '';
        if( share_href ) {
          /* 'https://www.linkedin.com/shareArticle?mini=true&url='+ encodeURI(share_href) +'&title=Adding some title here&summary=This is some text to go along with the social share&source=rjbstarter.com'*/
          /* share_href= 'https://www.linkedin.com/shareArticle?mini=true&url='+ encodeURI(share_href) +'&source=rjbstarter.com'; */

          share_href= 'https://www.linkedin.com/sharing/share-offsite/?url='+ encodeURI(share_href);

          window.open(share_href, 'liShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
          return false;
        }
      });
    }
  },
};
