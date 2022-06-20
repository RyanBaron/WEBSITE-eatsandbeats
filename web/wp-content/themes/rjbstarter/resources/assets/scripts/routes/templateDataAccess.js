export default {
  init() {
    if ( $( '[data-iframe="data-access"]' ).length ) {
      var $element = $( '[data-iframe="data-access"]' );
      var $spinner = $element.find( '.spinner' );
      // Run this in an interval (every 0.1s) just in case we are still waiting for consent
      var cnt = 0;
      var consentSetInterval = setInterval(function(){
        cnt += 1;
        // Bail if we have not gotten a consent response after 30 seconds.
        if( cnt >= 140 )
          clearInterval(consentSetInterval);

        if( typeof window.__tcfapi !== 'undefined' ) { // Check if window.__tcfapi has been set
          clearInterval( consentSetInterval );

          window.__uspapi( 'uspPing', 1, function( obj, status ) {
            if (status && obj.mode.includes('USP') && obj.jurisdiction.includes(obj.location.toUpperCase()) && $element !== null) {
              $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                  action: 'privacy_data_access_ccpa',
                  security: ajax_object.ajax_nonce,
                },
                error: function (errorThrown) {
                  console.log(errorThrown);
                },
                success: function( res ) {
                  var retObj = JSON.parse(res);
                  if( retObj.success ) {
                    // on success, display the returned html in the data access dom element.
                    $spinner.remove();
                    $($element).html(retObj.html);
                  }
                  else {
                    $($element).html('There was an error determining your jurisdiction, please refresh the page to try again.');
                  }
                },
              });
            }

            else {
              $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                  action: 'privacy_data_access_gdpr',
                  security: ajax_object.ajax_nonce,
                },
                error: function (errorThrown) {
                  console.log(errorThrown);
                },
                success: function( res ) {
                  var retObj = JSON.parse(res);
                  if( retObj.success ) {
                    // on success, display the returned html in the data access dom element.
                    $spinner.remove();
                    $($element).html(retObj.html);
                  }
                  else {
                    $($element).html('There was an error determining your jurisdiction, please refresh the page to try again.');
                  }
                },
              });
            }
          });
        }
        cnt++;
      }, 100);
    }
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
