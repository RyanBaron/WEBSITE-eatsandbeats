export default {
  init() {
    if ( $( '#opt_in_out_iframe' ).length ) {

      var $this = $( '#opt_in_out_iframe' );

      // Start - Insert the quantserve iframe.
      var optOutIframeSrc = '//pixel.quantserve.com/optout?token=qc.com\u0026participant_id=1\u0026rd=' + location.protocol + '//' + location.hostname + '\u0026action_id=2',
          $iframe = $( '<iframe id="opt-out-status-iframe" width="100%" height="200" frameborder="0" scrolling="no" src="' + optOutIframeSrc + '"></iframe>' );

      $this.prepend( $iframe );

      // Listen for opt in/opt out clicks
      var $toggle = $( '.opt-strip__switch-toggle', $this ),
          $label = $( 'a.opt-strip__switch-label', $this );

      $toggle.on(
        'click', function(e) {
          $this.toggleClass( 'active' );

          e.preventDefault();
        }
      );

      $label.on( 'click', function(e) {
        if ($( this ).is( ':first-child' )) {
          $this.removeClass( 'active' );
        } else {
          $this.addClass( 'active' );
        }

        e.preventDefault();
      });
    }
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
