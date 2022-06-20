export default {
  init() {
    //////
    // Start - Load customers: taxonomy customer page
    //////
    var $ajaxMoreCustomers = $('[data-load-more="customer-taxonomy"]') || {};
    var $ajaxMoreCustomersDisplay = $ajaxMoreCustomers.find('#ajax-customers') || {};
    var $ajaxMoreEmpty = $ajaxMoreCustomers.find('#more-empty') || {};
    var $ajaxMoreLoad = $ajaxMoreCustomers.find('#more-load') || {};

    function load_taxonomy_customers(customer_page, taxonomy_id){
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_customers',
          page: customer_page,
          taxonomy_id: taxonomy_id,
          security: ajax_object.ajax_nonce,
        },
        beforeSend: function() {
          $ajaxMoreLoad.parent().addClass('spinner');
        },
        complete: function() {
          $ajaxMoreLoad.parent().removeClass('spinner');
        },
        success: function(res){
          var resObj = JSON.parse(res);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              customer_page++;
              $ajaxMoreCustomersDisplay.append(resObj.data);
              $ajaxMoreLoad.removeClass('d-none');
              $ajaxMoreEmpty.addClass('d-none');
              $('[data-load-customers="taxonomy"]').attr('disabled',false);
            }
            else {
              $ajaxMoreLoad.addClass('d-none');
              $ajaxMoreEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxMoreCustomersDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxMoreCustomers.length ) {
      var taxonomy_customer_page = 2; // Start this at 2 b/c page 1 loaded on initial page load.

      // Listen for clicks on [data-load="customers"]
      $(document).on('click', '[data-load="customers"]', function(){ // When data-load-customers="taxonomy" item is pressed.
        $('[data-load="customers"]').attr('disabled',true); // Disable the button, temp.
        var taxonomy_id = $(this).attr('data-taxonomy-term-id') || '';
        load_taxonomy_customers(taxonomy_customer_page, taxonomy_id);
        taxonomy_customer_page++;
      });
    }
    //////
    // End - Load customers: taxonomy customer page
    //////

    //////
    // Start - Load resources: taxonomy resource page
    //////
    var $ajaxMoreResources = $('[data-load-more="resource-taxonomy"]') || {};
    var $ajaxMoreResourcesDisplay = $ajaxMoreResources.find('#ajax-resources') || {};
    var $ajaxMoreResourcesEmpty = $ajaxMoreResources.find('#more-empty') || {};
    var $ajaxMoreResourcesLoad = $ajaxMoreResources.find('#more-load') || {};

    function load_taxonomy_resources(resource_page, taxonomy_id) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_resources',
          page: resource_page,
          taxonomy_id: taxonomy_id,
          security: ajax_object.ajax_nonce,
        },
        beforeSend: function() {
          $ajaxMoreResourcesLoad.parent().addClass('spinner');
        },
        complete: function() {
          $ajaxMoreResourcesLoad.parent().removeClass('spinner');
        },
        success: function(res){
          var resObj = JSON.parse(res);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              resource_page++;
              $ajaxMoreResourcesDisplay.append(resObj.data);
              $ajaxMoreResourcesLoad.removeClass('d-none');
              $ajaxMoreResourcesEmpty.addClass('d-none');
              $('[data-load-resources="taxonomy"]').attr('disabled',false);
            }
            else {
              $ajaxMoreResourcesLoad.addClass('d-none');
              $ajaxMoreResourcesEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxMoreResourcesDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxMoreResources.length ) {
      var taxonomy_resource_page = 2; // Start this at 2 b/c page 1 loaded on initial page load.

      // Listen for clicks on [data-load="resources"]
      $(document).on('click', '[data-load="resources"]', function(){ // When data-load-resources="taxonomy" item is pressed.
        $('[data-load="resources"]').attr('disabled',true); // Disable the button, temp.
        var taxonomy_id = $(this).attr('data-taxonomy-term-id') || '';
        load_taxonomy_resources(taxonomy_resource_page, taxonomy_id);
        taxonomy_resource_page++;
      });
    }
    //////
    // End - Load resources: taxonomy resource page
    //////

    //////
    // Start - Load Press: archive/taxonomy press page
    //////
    var $ajaxMorePress = $('[data-load-more="press-taxonomy"]') || {};
    var $ajaxMorePressDisplay = $ajaxMorePress.find('#ajax-press') || {};
    var $ajaxMorePressEmpty = $ajaxMorePress.find('#more-empty') || {};
    var $ajaxMorePressLoad = $ajaxMorePress.find('#more-load') || {};

    function load_taxonomy_press(press_page, taxonomy_id) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajax_object.ajax_url,
        data : {
          action: 'get_more_press',
          page: press_page,
          taxonomy_id: taxonomy_id,
          security: ajax_object.ajax_nonce,
        },
        beforeSend: function() {
          $ajaxMorePressLoad.parent().addClass('spinner');
        },
        complete: function() {
          $ajaxMorePressLoad.parent().removeClass('spinner');
        },
        success: function(res){
          var resObj = JSON.parse(res);
          console.log('resObj', resObj);
          if( resObj.success ) {
            if( resObj.data.trim() ) {
              press_page++;
              $ajaxMorePressDisplay.append(resObj.data);
              $ajaxMorePressLoad.removeClass('d-none');
              $ajaxMorePressEmpty.addClass('d-none');
              $('[data-load="press"]').attr('disabled',false);
            }
            else {
              $ajaxMorePressLoad.addClass('d-none');
              $ajaxMorePressEmpty.removeClass('d-none');
            }
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          $ajaxMorePressDisplay.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        },
      });

      return false;
    }

    if( $ajaxMorePress.length ) {
      var taxonomy_press_page = 2; // Start this at 2 b/c page 1 loaded on initial page load.
      // Listen for clicks on [data-load="press"]
      $(document).on('click', '[data-load="press"]', function(){ // When data-load-press="taxonomy" item is pressed.
        $('[data-load="press"]').attr('disabled',true); // Disable the button, temp.
        var taxonomy_id = $(this).attr('data-taxonomy-term-id') || '';
        load_taxonomy_press(taxonomy_press_page, taxonomy_id);
        taxonomy_press_page++;
      });
    }
    //////
    // End - Load press: taxonomy press page
    //////
  },
  finalize() {

  },
};
