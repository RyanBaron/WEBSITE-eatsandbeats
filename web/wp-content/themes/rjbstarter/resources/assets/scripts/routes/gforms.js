export default {
  init() {
    // $(document).bind('gform_post_render', function(event, formID){
      // console.log('event', event);
      // console.log('formID', formID);
    // });

    $(document).bind('gform_confirmation_loaded', function(event, formID) {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: 'custom.event.form.success',
        gFormID: formID,
      });
    });
  },
  finalize() {

  },
};
