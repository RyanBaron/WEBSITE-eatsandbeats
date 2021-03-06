/*
import $ from 'jquery';
//import Cookie from 'cookie.js';

MktoForms2.loadForm('//info.rjbstarter.com', '516-DGM-318', 3328, function(form) {

  //////
  // TODO: Find a universal way to pull a value, maybe url param and set a form value dynamically.
  // var url_string = "http://www.example.com/t.html?a=1&b=3&c=m2-m3-m4-m5"; //window.location.href
  // var url = new URL(url_string);
  // var c = url.searchParams.get("c");
  // form.vals({ "product":"Advertise"});
  //////

  // Get all of the form elements.
  var form2 = form.getFormElem();
  if( form2.length ) {

    // Loop through all radio items and add classes to marketo partent items for styling.
    var radios = form2.find('input[type="radio"]');
    if ( radios.length ) {
      radios.each(function() {
        //var id = $(this).attr('id');

        var attr_name  = $(this).attr('name') || '';
        attr_name = attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

        var attr_value = $(this).attr('value') || '';
        attr_value = attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

        if( attr_value ) {
          $(this).addClass(attr_value);
        }

        if( attr_name ) {
          $(this).addClass(attr_name);

          //var parents       = $(this).parents();
          var field_wrapper = $(this).parents('.mktoFieldWrap');
          var row_wrapper   = $(this).parents('.mktoFormRow');

          var wrapper_class = attr_name + '_radio_wrapper';
          var row_class     = attr_name + '_radio_row';

          field_wrapper.addClass(wrapper_class);
          row_wrapper.addClass(row_class);
        }
      });
    }

    // Loop through all checkbox items and add classes to marketo partent items for styling.
    var checkboxes = form2.find('input[type="checkbox"]');
    if ( checkboxes.length ) {
      checkboxes.each(function() {
        //var id = $(this).attr('id');

        var attr_name  = $(this).attr('name') || '';
        attr_name = attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

        var attr_value = $(this).attr('value') || '';
        attr_value = attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

        if( attr_value ) {
          $(this).addClass(attr_value);
        }

        if( attr_name ) {
          $(this).addClass(attr_name);

          //var parents       = $(this).parents();
          var field_wrapper = $(this).parents('.mktoFieldWrap');
          var row_wrapper   = $(this).parents('.mktoFormRow');

          var wrapper_class = attr_name + '_checkbox_wrapper';
          var row_class     = attr_name + '_checkbox_row';

          field_wrapper.addClass(wrapper_class);
          row_wrapper.addClass(row_class);
        }
      });
    }

    // Loop through all select items and add classes to marketo partent items for styling.
    var selects = form2.find('select');
    if ( selects.length ) {
      selects.each(function() {
        //var id = $(this).attr('id');

        var attr_name  = $(this).attr('name') || '';
        attr_name = attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

        var attr_value = $(this).attr('value') || '';
        attr_value = attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

        if( attr_value ) {
          $(this).addClass(attr_value);
        }

        if( attr_name ) {
          $(this).addClass(attr_name);

          //var parents       = $(this).parents();
          var field_wrapper = $(this).parents('.mktoFieldWrap');
          var row_wrapper   = $(this).parents('.mktoFormRow');

          var wrapper_class = attr_name + '_select_wrapper';
          var row_class     = attr_name + '_select_row';

          field_wrapper.addClass(wrapper_class);
          row_wrapper.addClass(row_class);
        }
      });
    }

    // Loop through all textarea items and add classes to marketo partent items for styling.
    var textareas = form2.find('textarea');
    if ( textareas.length ) {
      textareas.each(function() {
        //var ta_id = $(this).attr('id');

        var ta_attr_name  = $(this).attr('name') || '';
        ta_attr_name = ta_attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

        var ta_attr_value = $(this).attr('value') || '';
        ta_attr_value = ta_attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

        if( ta_attr_value ) {
          $(this).addClass(ta_attr_value);
        }

        if( ta_attr_name ) {
          $(this).addClass(ta_attr_name);

          //var parents       = $(this).parents();
          var field_wrapper = $(this).parents('.mktoFieldWrap');
          var row_wrapper   = $(this).parents('.mktoFormRow');

          var wrapper_class = ta_attr_name + '_textarea_wrapper';
          var row_class     = ta_attr_name + '_textarea_row';

          field_wrapper.addClass(wrapper_class);
          row_wrapper.addClass(row_class);
        }

      });
    }
  }
});

MktoForms2.loadForm('//info.rjbstarter.com', '516-DGM-318', 3462, function(form) {
  // Get all of the form elements.
  var form2 = form.getFormElem();
  if( form2.length ) {
    // doing nothing
  }
});

MktoForms2.whenReady(
  function(form) {
    var process_form = false;
    var form_name    = 'Contact';
    var form_id      = form.getId() || '';

    if (! form_id ) {
      return;
    }

    switch (form_id) {
      case 3328:
        process_form = true;
        form_name    = 'Contact Sales'
        break;
      case 3462:
        process_form = true;
        form_name    = 'Contact General'
        break;
      default:
    }

    if( ! process_form ) {
      return;
    }

    var $form        = $( '#mktoForm_' + form.getId() );
    var $submit      = $form.find( 'button[type=submit]' );
    var $submit_text = $submit.html();

    form.onSubmit(
      function( form ) {
        if( $submit ) {
          $submit
            .html('Please Wait')
            .attr('disabled', 'disabled');
        }

        var evt = {
          event:       'formSubmit',
          eventPage:   window.location.href || 'unknown page',
          eventPath:   window.location.pathname || 'unknown path',
          eventHost:   window.location.hostname || 'unknown host',
          eventStatus: 'initiate',
          eventForm: {
            id:   form.getId() || '',
            name: form_name,
          },
        };

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(evt);
      }
    );

    form.onSuccess(
      //function( values, follow_url ) {
      function( values ) {
        if( $submit ) {
          // Remove disabled text and set the text back to the original.
          $submit
            .html($submit_text)
            .removeAttr('disabled');
        }

        var qcrand = (Math.random() * 100000000000000000).toString();
        var evt = {
          event:      'formSubmit',
          eventPage:   values._mktoReferrer || 'unknow page',
          eventPath:   window.location.pathname || 'unknown path',
          eventHost:   window.location.hostname || 'unknown host',
          eventStatus: 'success',
          eventForm: {
            id:     values.formid,
            name:   form_name,
            detail: values.product || 'unknown product',
          },
          rjbstarter: {
            //qacct:'p-fdPOEe5CwS0oM',
            labels:  '_fp.event.' + form_name + ' Submit',
            setid:   '1',
            id:      qcrand,
            orderid: qcrand,
          },
        };

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(evt);

        $form.html(`
          <div class="thank-you-msg text-center">
            <h5 class="headline">Thanks for Reaching out</h5>
            <div class="text-center">
              <p class="text-center">We will take a look at your question and reach back out to you.</p>
            </div>
          </div>
        `);

        return false; // prevents redirecting page to follow_url arg.
      }
    );
  }
);

$.gatedForms = function (element) {
   //renamed arg for readability
  //Store the passed element as a property of the created instance.
  this.element = (element instanceof $) ? element : $(element);
  this.formId = this.element.attr('data-mkto-gated-section');
  this.formWrapper = this.element.find('.gated-form-wrapper');
  this.form = this.element.find('form');
  this.submitButton = this.element.find('.mktoButton[type="submit"]');
  this.vid = this.form.attr('data-resource-vid');
  this.pdfUrl = this.form.attr('data-resource-pdf-url');
  this.requestType = this.form.attr('data-resource-request-type');
  //this.successReplace = this.form.attr('data-mkto-gated-success-replace');
  this.resourceName = this.form.attr('data-resource-name');
  this.resourceNameStripped = this.resourceName.replace(/\W/g, '');

  this.paramSrc = '';
  this.paramPass = '';
  this.headlineColGated = this.element.find('.headline-col-gated') || {};
  this.superheadlineColGated = this.headlineColGated.find('.superheadline') || {};
  this.subheadlineColGated = this.headlineColGated.find('.subheadline') || {};
  this.textColGated = this.element.find('.text-col.gated-col') || {};

  // Get resoruce thank you messaing added to the dom via wrapper.blade.php
  this.resourceTySuper = this.formWrapper.attr('data-resource-ty-super') || '';
  this.resourceTyHeadline = this.formWrapper.attr('data-resource-ty-headline') || '';
  this.resourceTySub = this.formWrapper.attr('data-resource-ty-sub') || '';
  this.resourceTyText = this.formWrapper.attr('data-resource-ty-text') || '';
  this.resourceTyResourceImageUrl = this.formWrapper.attr('data-resource-ty-resource-img') || '';
  this.resourceTyResourceSuper = this.formWrapper.attr('data-resource-ty-resource-super') || '';
  this.resourceTyResourceHeadline = this.formWrapper.attr('data-resource-ty-resource-headline') || '';
  this.resourceTyResourceSub = this.formWrapper.attr('data-resource-ty-resource-sub') || '';
  this.resourceTyResourceText = this.formWrapper.attr('data-resource-ty-resource-text') || '';
  this.resourceTyResourceLinkTarget = this.formWrapper.attr('data-resource-ty-resource-target') || '';
  this.resourceTyResourceLinkTitle = this.formWrapper.attr('data-resource-ty-resource-link-title') || '';
  this.resourceTyResourceLinkUrl = this.formWrapper.attr('data-resource-ty-resource-link-url') || '';

  this.secId = this.element.attr('data-section-id');
  this.secMainRow = this.element.find('[data-section-row-main]');
  this.secGatedForm = this.element.find('[data-section-gated-form-main]');

  this.mainSections = $(document).find('[data-section="main"]');
  //this.hideMainSections = $(document).find('.hide-if-asset[data-section="main"]');
  //this.minimizeMainSections = $(document).find('.minimize-if-asset[data-section="main"]');
};

$.gatedForms.prototype = {
  ///
   // init()
   //
   // Initialize the program
  ///
  init: function () {
    var that = this;
    that.mktoInit();
    that.setParamSrc();
    that.setParamPass();

    var assetRequestType = that.getDataRequestType();

    if(that.hasAssetAccess()) {

      switch (assetRequestType) {
        case 'upcoming-event':
          that.showThankyou();
          break;
        default:
          that.showAsset(that.getPdfUrl(), that.getVid());
      }
    }
  },
  hasAssetAccess: function() {
    var that = this;
    var name = that.getResourceNameStripped();
    var cookieName = 'qc_gated_asset_'+ name;
    var paramPass =  that.getParamPass();
    var paramSrc = that.getParamSrc();

    if( name && ('unset' != name || 'unknown' != name ) ) {
      if( 'access' == that.getCookie(cookieName) ) {
        return true;
      }
    }

    if( ( typeof paramPass !== 'undefined' && paramPass !== null ) && ( typeof paramSrc !== 'undefined' && paramSrc !== null ) ) {
      var pathArray = window.location.pathname.split('/');

      if( pathArray.length >= 2 ) {
        var slug = pathArray[pathArray.length - 2];
      }

      if ( ( paramPass.length >= 8 ) && ( paramSrc.length >= 2 ) && ( slug && slug.length >= 2 ) ) {
        var srcFirstChar = paramSrc.charAt(0);
        var srcLastChar = paramSrc.charAt( ( paramSrc.length - 1) );
        var passFirstChar = paramPass.charAt(0);
        var passLastChar = paramPass.charAt( ( paramPass.length  - 1) );
        var passSecondChar = paramPass.charAt(1);
        var slugSecondChar = slug.charAt(1);

        if( ( srcFirstChar === passFirstChar ) && ( srcLastChar === passLastChar ) &&  ( passSecondChar === slugSecondChar ) ) {
          return true;
        }
      }
    }

    return false;
  },

  setParamSrc: function() {
    this.paramSrc = this.getParamValue('qsrc');
  },

  setParamPass: function() {
    this.paramPass = this.getParamValue('qpass');
  },
  getParamSrc: function() {
    return this.paramSrc;
  },
  getParamPass: function() {
    return this.paramPass;
  },
  getParamValue: function (paramName) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var paramValue = url.searchParams.get(paramName);
    return paramValue;
  },
  setSubmitButtonText:function(btnText) {
    var formContainer = $(document).find('[data-section-gated-form-main="'+this.getSecId()+'"]');
    var formButton = formContainer.find('[type="submit"]');
    formButton.text(btnText);
  },
  getResourceNameStripped: function() {
    return this.resourceNameStripped;
  },
  getVid: function() {
    return this.vid;
  },
  getSecId: function() {
    return this.secId;
  },
  getPdfUrl: function() {
    return this.pdfUrl;
  },
  showGatedForm: function() {
    this.secGatedForm.removeClass('d-none');
  },
  hideGatedForm: function() {
    this.secGatedForm.addClass('d-none');
  },
  enableGatedForm: function() {
    this.secGatedForm.removeClass('gated-form-disabled');
  },
  disableGatedForm: function() {
    this.secGatedForm.addClass('gated-form-disabled');
  },
  removeGatedForm: function() {
    this.secGatedForm.remove();
  },
  getFormId: function() {
    return this.formId;
  },
  getDataVid: function() {
    return this.vid;
  },
  getDataPdfUrl: function() {
    return this.pdfUrl;
  },
  getDataResourceName: function() {
    return this.resourceName;
  },
  getDataRequestType: function() {
    return this.requestType;
  },
  getDataResourceTySuper: function() {
    return this.resourceTySuper;
  },
  getDataResourceTyHeadline: function() {
    return this.resourceTyHeadline;
  },
  getDataResourceTySub: function() {
    return this.resourceTySub;
  },
  getDataResourceTyText: function() {
    return this.resourceTyText;
  },
  getDataResourceTyResourceImageUrl: function() {
    return this.resourceTyResourceImageUrl;
  },
  getDataResourceTyResourceSuper: function() {
    return this.resourceTyResourceSuper;
  },
  getDataResourceTyResourceHeadline: function() {
    return this.resourceTyResourceHeadline;
  },
  getDataResourceTyResourceSub: function() {
    return this.resourceTyResourceSub;
  },
  getDataResourceTyResourceText: function() {
    return this.resourceTyResourceText;
  },
  getDataResourceTyResourceLinkTarget: function() {
    return this.resourceTyResourceLinkTarget;
  },
  getDataResourceTyResourceLinkTitle: function() {
    return this.resourceTyResourceLinkTitle;
  },
  getDataResourceTyResourceLinkUrl: function() {
    return this.resourceTyResourceLinkUrl;
  },

  setCookie: function(name, value, daysToLive) {
    // Encode value in order to escape semicolons, commas, and whitespace
    var cookie = name + '=' + encodeURIComponent(value);
    if(typeof daysToLive === 'number') {
      // Sets the max-age attribute so that the cookie expires
      // after the specified number of days
      cookie += '; max-age=' + (daysToLive*24*60*60) + ';path=/';
      document.cookie = cookie;
    }
  },
  getCookie: function(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length == 2) return parts.pop().split(';').shift();
  },

  showThankyou: function() {
    var that = this;
    var tyHeadline = '';
    var tyResourceImg = '';
    var tyResourceHeadline = '';
    var tyResourceText = '';
    var tyResourceLink = '';
    var tyResourceLinkTarget = '';
    var tyResourceMain = '';
    //var tyFinal = '';

    // that.disableGatedForm(); // dont disable the form, as it will be replaced by
    // the thank you message using js so we want the section visible
    //that.hideSections();
    // Add the display asset to all the main sections.
    // - Using css to hide/shrink some content when asset is being displayed.
    that.mainSections.addClass('display-asset');

    //var assetRequestType = that.getDataRequestType();
    var resourceTySuper = that.getDataResourceTySuper();
    var resourceTyHeadline = that.getDataResourceTyHeadline();
    var resourceTySub = that.getDataResourceTySub();
    var resourceTyText = that.getDataResourceTyText();
    var resourceTyResourceImageUrl = that.getDataResourceTyResourceImageUrl();
    var resourceTyResourceSuper = that.getDataResourceTyResourceSuper();
    var resourceTyResourceHeadline = that.getDataResourceTyResourceHeadline();
    var resourceTyResourceSub = that.getDataResourceTyResourceSub();
    var resourceTyResourceText = that.getDataResourceTyResourceText();
    var resourceTyResourceLinkTarget = that.getDataResourceTyResourceLinkTarget();
    var resourceTyResourceLinkTitle = that.getDataResourceTyResourceLinkTitle();
    var resourceTyResourceLinkUrl = that.getDataResourceTyResourceLinkUrl();

    // Form top headline replace
    if( resourceTySuper || resourceTyHeadline || resourceTySub ) {
      if( resourceTySuper ) {
        tyHeadline = tyHeadline + '<span class="superheadline">' + resourceTySuper + '</span>';
      }
      if( resourceTyHeadline ) {
        tyHeadline = tyHeadline + resourceTyHeadline ;
      }
      if( resourceTySub ) {
        tyHeadline = tyHeadline + '<span class="subheadline">' + resourceTySub + '</span>';
      }

      if( that.superheadlineColGated.length >= 1 && tyHeadline ) {
        that.headlineColGated.html(tyHeadline);
      }
    }

    // Form top text replace
    if( that.textColGated.length >= 1 && resourceTyText ) {
      that.textColGated.html(resourceTyText);
    }

    // Build the thank you resource headline, tyResourceHeadline.
    if( resourceTyResourceSuper || resourceTyResourceHeadline || resourceTyResourceSub ) {
      if( resourceTyResourceSuper ) {
        tyResourceHeadline = tyResourceHeadline + '<span class="superheadline">' + resourceTyResourceSuper + '</span>';
      }
      if( resourceTyResourceHeadline ) {
        tyResourceHeadline = tyResourceHeadline + resourceTyResourceHeadline ;
      }
      if( resourceTyResourceSub ) {
        tyResourceHeadline = tyResourceHeadline + '<span class="subheadline">' + resourceTyResourceSub + '</span>';
      }

      tyResourceHeadline = '<h5 class="headline hedline-thankyou">' + tyResourceHeadline + '</h3>';
    }

    // Build the thank you resource image, tyResourceImg.
    if( resourceTyResourceImageUrl ) {
      tyResourceImg = `
        <div class="col col-12 col-resource-text col-md-5 py-2"><div class="thankyou-resource-image text-left"><figure class="figure figure-image w-100">
          <img class="lazy image img-fluid figure-img" alt="Rjbstarter resource image" src="${resourceTyResourceImageUrl}" data-src="${resourceTyResourceImageUrl}">
        </figure></div></div>
      `;
    }

    // Build the thank you resource link, tyResourceLink.
    if( resourceTyResourceLinkTitle && resourceTyResourceLinkUrl ) {
      if( resourceTyResourceLinkTarget ) {
        tyResourceLinkTarget = 'target="'+ resourceTyResourceLinkTarget +'"';
      }
      tyResourceLink = `
        <div class="buttons buttons-section buttons-footer">
          <a class="btn btn-outline-primary btn-sm" href="${resourceTyResourceLinkUrl}" data-g-action="click: ${resourceTyResourceLinkUrl}" data-g-label="gated thankyou resouce" ${tyResourceLinkTarget}>${resourceTyResourceLinkTitle}&nbsp;<i class="fal fa-arrow-right fa-sm"></i></a>
        </div>
      `;
    }

    // Build the thank you resource text, tyResourceText.
    if( resourceTyResourceText || tyResourceLink ) {
      tyResourceText = '<div class="text text-resource text-thankyou">' + resourceTyResourceText + '</div>';

      if ( tyResourceLink ) {
        tyResourceText = tyResourceText + tyResourceLink;
      }
    }

    if ( tyResourceHeadline || tyResourceText ) {
      if( resourceTyResourceImageUrl ) {
        tyResourceMain = `
          <div class="col col-12 col-resource-text col-md-6 py-2"><div class="thankyou-resource-text text-left">
            ${tyResourceHeadline}
            ${tyResourceText}
          </div></div>
        `;
      }
      else {
        tyResourceMain = `
          <div class="col col-12 col-resource-text col-md-9 col-lg-10 py-2"><div class="thankyou-resource-text text-left">
            ${tyResourceHeadline}
            ${tyResourceText}
          </div></div>
        `;
      }
    }

    if ( tyResourceMain && tyResourceImg ) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center justify-content-md-around py-1">
          ${tyResourceMain}
          ${tyResourceImg}
        </div>
      `;
    }
    else if (tyResourceMain && ! tyResourceImg) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center py-1">
          ${tyResourceMain}
        </div>
      `;
    }
    else if ( ! tyResourceMain && tyResourceImg) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center py-1">
          ${tyResourceImg}
        </div>
      `;
    }

    that.formWrapper.html(tyResourceMain);
  },

  showAsset: function(assetPdfUrl, assetVimeoId) {
    var that = this;
    var retHtml;

    that.disableGatedForm();
    //that.hideSections();
    // Add the display asset to all the main sections.
    // - Using css to hide/shrink some content when asset is being displayed.
    that.mainSections.addClass('display-asset');

    if( assetVimeoId && assetVimeoId != 'unset' ) {
      retHtml = `
        <div class="col col-12">
          <div class="py-5 py-md-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/${assetVimeoId}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      `;
    }
    else if ( assetPdfUrl && assetPdfUrl != 'unset' ) {
      // <embed class="embed-responsive-pdf" src="${assetPdfUrl}#page=1&amp;view=fit&amp;navpanes=1" width="100%"></embed>
      retHtml = `
      <div class="col col-12">
        <div class="py-5 py-md-6">
          <div class="embed-responsive embed-responsive-pdf">
            <iframe class="embed-responsive-item" src="${assetPdfUrl}#page=1&amp;view=fit&amp;navpanes=1" width="100%"></iframe>
          </div>
        </div>
      </div>
      `;
    }
    else {
      //////
      // Add some error handling here, maybe send an error event to GA to track and notify.
      //////
      retHtml = `
      <div class="col col-12">
        <div class="py-5 py-md-6">
          <div class="text-center">
            <h5>Error: Resource not found.</h5>
            <div>Please refresh the page to try a again.  If you continue to see this message, please <a href="#contact">lets us know</a>.</div>
          </div>
        </div>
      </div>
      `;
    }

    that.secMainRow.html(retHtml);

    var evt = {
      event:       'gatedAssetView',
      eventPage:   window.location.href || 'unknown page',
      eventPath:   window.location.pathname || 'unknown path',
      eventHost:   window.location.hostname || 'unknown host',
      eventStatus: 'success',
      eventGatedResource: {
        name: that.getDataResourceName(),
        type: that.getDataRequestType(),
      },
    };

    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(evt);
  },

  mktoInit: function() {
    var that = this;
    MktoForms2.loadForm('//info.rjbstarter.com', '516-DGM-318', that.getFormId(), function(form) {
      if(that.getDataVid())
        form.setValues({'assetVimeoId': that.getDataVid()});

      if(that.getDataPdfUrl())
        form.setValues({'assetUrl': that.getDataPdfUrl()});

      if(that.getDataResourceName())
        form.setValues({'assetName': that.getDataResourceName()});

      if(that.getDataRequestType())
        form.setValues({'assetRequestType': that.getDataRequestType()});

      var form2 = form.getFormElem();
      if( form2.length ) {
        // Loop through all checkbox items and add classes to marketo partent items for styling.
        var checkboxes = form2.find('input[type="checkbox"]');

        if ( checkboxes.length ) {
          checkboxes.each(function() {
            var attr_name  = $(this).attr('name') || '';
            attr_name = attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

            var attr_value = $(this).attr('value') || '';
            attr_value = attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

            if( attr_value ) {
              $(this).addClass(attr_value);
            }

            if( attr_name ) {
              $(this).addClass(attr_name);
              var field_wrapper = $(this).parents('.mktoFieldWrap');
              var row_wrapper   = $(this).parents('.mktoFormRow');

              var wrapper_class = attr_name + '_checkbox_wrapper';
              field_wrapper.addClass(wrapper_class);
              wrapper_class = 'checkbox_wrapper';
              field_wrapper.addClass(wrapper_class);
              var row_class     = attr_name + '_checkbox_row';
              row_wrapper.addClass(row_class);
              row_class     = 'checkbox_row';
              row_wrapper.addClass(row_class);
            }
          });
        }
      }

      form.onSubmit(
        function( form ) {
          var evt = {
            event:       'formSubmit',
            eventPage:   window.location.href || 'unknown page',
            eventPath:   window.location.pathname || 'unknown path',
            eventHost:   window.location.hostname || 'unknown host',
            eventStatus: 'initiate',
            eventForm: {
              id:   form.getId() || '',
              name: 'gated_form_' + that.getFormId(),
            },
          };

          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push(evt);
        }
      );

      form.onSuccess(function (resForm) {
        var assetName = resForm.assetName || that.getDataResourceName();
        var assetNameStripped = assetName.replace(/\W/g, '');
        var assetVimeoId = resForm.assetVimeoId || that.getDataVid();
        var assetPdfUrl = resForm.assetUrl || that.getDataPdfUrl();
        var assetRequestType = resForm.assetRequestType || that.getDataRequestType();

        var qcrand = (Math.random() * 100000000000000000).toString();
        var evt = {
          event:      'formSubmit',
          eventPage:   resForm._mktoReferrer || 'unknow page',
          eventPath:   window.location.pathname || 'unknown path',
          eventHost:   window.location.hostname || 'unknown host',
          eventStatus: 'success',
          eventForm: {
            id:     resForm.formid,
            type: 'gated asset',
            name:  'gated form ' + that.getFormId(),
            detail: resForm.assetName || 'unknown details',
            assetRequestType: resForm.assetName || 'unknown type',
            assetName: resForm.assetName || 'unknown name',
            assetUrl: resForm.assetPdfUrl || 'unknown url',
            assetVid: resForm.assetVimeoId || 'unknown vid',
          },
          rjbstarter: {
            //qacct:'p-fdPOEe5CwS0oM',
            labels:  '_fp.event.Gated Form Success ' + resForm.assetName,
            setid:   '1',
            id:      qcrand,
            orderid: qcrand,
          },
        };

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(evt);

        switch (assetRequestType) {
          case 'upcoming-event':
            that.showThankyou();
            break;
          default:
            that.showAsset(assetPdfUrl, assetVimeoId);
        }
        that.setCookie('qc_gated_asset_'+assetNameStripped, 'access', 14);

        // return false to keep the user on the same page.
        return false;
      });
    });
  },
};

////////////////////
// Initialize the js if the page has a [data-mkto-gated-section] dom item.
////////////////////
$(function () {
  if ($('[data-mkto-gated-section]').length) {
    var gated = new $.gatedForms($('[data-mkto-gated-section]'));
    gated.init();
  }
});

////////////////////
// Start: Marketo form column functionality
////////////////////
$.colForms = function (element) { //renamed arg for readability
  //Store the passed element as a property of the created instance.
  this.element = (element instanceof $) ? element : $(element);
  this.formWrapper = this.element.find('.mkto-form-wrapper');
  this.form = this.element.find('form');
  this.formId = this.form.attr('data-mkto-form');
  this.submitButton = this.element.find('.mktoButton[type="submit"]');
  this.resourceName = this.form.attr('data-resource-name') || '';
  this.resourceNameStripped = this.resourceName.replace(/\W/g, '');

  this.paramSrc = '';
  this.paramPass = '';
  this.colFormHeader = this.element.find('.form-header') || {};
  this.colFormHeaderFigures = this.colFormHeader.find('figure') || {};
  this.headlineColForm = this.element.find('.headline-col-form') || {};
  this.superheadlineColForm = this.headlineColForm.find('.superheadline') || {};
  this.subheadlineColForm = this.headlineColForm.find('.subheadline') || {};
  this.textColGated = this.element.find('.text-col.gated-col') || {};

  // Get resoruce thank you messaing added to the dom via wrapper.blade.php
  this.resourceTySuper = this.form.attr('data-resource-ty-super') || '';
  this.resourceTyHeadline = this.form.attr('data-resource-ty-headline') || '';
  this.resourceTySub = this.form.attr('data-resource-ty-sub') || '';
  this.resourceTyText = this.form.attr('data-resource-ty-text') || '';
  this.resourceTyResourceImageUrl = this.form.attr('data-resource-ty-resource-img') || '';
  this.resourceTyResourceSuper = this.form.attr('data-resource-ty-resource-super') || '';
  this.resourceTyResourceHeadline = this.form.attr('data-resource-ty-resource-headline') || '';
  this.resourceTyResourceSub = this.form.attr('data-resource-ty-resource-sub') || '';
  this.resourceTyResourceText = this.form.attr('data-resource-ty-resource-text') || '';
  this.resourceTyResourceLinkTarget = this.form.attr('data-resource-ty-resource-target') || '';
  this.resourceTyResourceLinkTitle = this.form.attr('data-resource-ty-resource-link-title') || '';
  this.resourceTyResourceLinkUrl = this.form.attr('data-resource-ty-resource-link-url') || '';

  this.resourceTyImgColClass = this.form.attr('data-ty-img-col-class') || 'col col-12 col-resource-text py-2 order-first';
  this.resourceTyTextColClass = this.form.attr('data-ty-text-col-class') || 'col col-12 col-resource-text py-2 order-last';
  this.resourceTyTextOnlyColClass = this.form.attr('data-ty-text-only-col-class') || 'col col-12 col-resource-text py-2 order-last';

  this.secId = this.element.attr('data-form-col-id');
  this.secMainRow = this.element.find('[data-section-row-main]');
  this.secGatedForm = this.element.find('[data-section-gated-form-main]');

  this.mainSections = $(document).find('[data-section="main"]');
  //this.hideMainSections = $(document).find('.hide-if-asset[data-section="main"]');
  //this.minimizeMainSections = $(document).find('.minimize-if-asset[data-section="main"]');
};

$.colForms.prototype = {
  ///
   // init()
   //
   // Initialize the program
   ///
  init: function () {
    var that = this;
    that.mktoInit();
    that.setParamSrc();
    that.setParamPass();
  },
  setParamSrc: function() {
    this.paramSrc = this.getParamValue('qsrc');
  },
  setParamPass: function() {
    this.paramPass = this.getParamValue('qpass');
  },
  getParamSrc: function() {
    return this.paramSrc;
  },
  getParamPass: function() {
    return this.paramPass;
  },
  getParamValue: function (paramName) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var paramValue = url.searchParams.get(paramName);
    return paramValue;
  },
  setSubmitButtonText:function(btnText) {
    var formContainer = $(document).find('[data-section-gated-form-main="'+this.getSecId()+'"]');
    var formButton = formContainer.find('[type="submit"]');
    formButton.text(btnText);
  },
  getResourceNameStripped: function() {
    return this.resourceNameStripped;
  },
  getVid: function() {
    return this.vid;
  },
  getSecId: function() {
    return this.secId;
  },
  getPdfUrl: function() {
    return this.pdfUrl;
  },
  enableForm: function() {
    this.secGatedForm.removeClass('form-disabled');
  },
  disableForm: function() {
    this.secGatedForm.addClass('form-disabled');
  },
  getFormId: function() {
    return this.formId;
  },
  getDataVid: function() {
    return this.vid;
  },
  getDataPdfUrl: function() {
    return this.pdfUrl;
  },
  getDataResourceName: function() {
    return this.resourceName;
  },
  getDataRequestType: function() {
    return this.requestType;
  },
  getDataResourceTySuper: function() {
    return this.resourceTySuper;
  },
  getDataResourceTyHeadline: function() {
    return this.resourceTyHeadline;
  },
  getDataResourceTySub: function() {
    return this.resourceTySub;
  },
  getDataResourceTyText: function() {
    return this.resourceTyText;
  },
  getDataResourceTyResourceImageUrl: function() {
    return this.resourceTyResourceImageUrl;
  },
  getDataResourceTyResourceSuper: function() {
    return this.resourceTyResourceSuper;
  },
  getDataResourceTyResourceHeadline: function() {
    return this.resourceTyResourceHeadline;
  },
  getDataResourceTyResourceSub: function() {
    return this.resourceTyResourceSub;
  },
  getDataResourceTyResourceText: function() {
    return this.resourceTyResourceText;
  },
  getDataResourceTyResourceLinkTarget: function() {
    return this.resourceTyResourceLinkTarget;
  },
  getDataResourceTyResourceLinkTitle: function() {
    return this.resourceTyResourceLinkTitle;
  },
  getDataResourceTyResourceLinkUrl: function() {
    return this.resourceTyResourceLinkUrl;
  },
  getResourceTyImgColClass: function() {
    return this.resourceTyImgColClass;
  },
  getResourceTyTextColClass: function() {
    return this.resourceTyTextColClass;
  },
  getResourceTyTextOnlyColClass: function() {
    return this.resourceTyTextOnlyColClass;
  },
  showThankyou: function() {
    var that = this;
    var tyHeadline = '';
    var tyResourceImg = '';
    var tyResourceHeadline = '';
    var tyResourceText = '';
    var tyResourceLink = '';
    var tyResourceLinkTarget = '';
    var tyResourceMain = '';
    //var tyFinal = '';

    // that.disableGatedForm(); // dont disable the form, as it will be replaced by
    // the thank you message using js so we want the section visible
    // that.hideSections();
    // Add the display asset to all the main sections.
    // - Using css to hide/shrink some content when asset is being displayed.
    // that.mainSections.addClass('display-asset');

    //var assetRequestType = that.getDataRequestType();
    var resourceTySuper = that.getDataResourceTySuper();
    var resourceTyHeadline = that.getDataResourceTyHeadline();
    var resourceTySub = that.getDataResourceTySub();
    var resourceTyText = that.getDataResourceTyText();
    var resourceTyResourceImageUrl = that.getDataResourceTyResourceImageUrl();
    var resourceTyResourceSuper = that.getDataResourceTyResourceSuper();
    var resourceTyResourceHeadline = that.getDataResourceTyResourceHeadline();
    var resourceTyResourceSub = that.getDataResourceTyResourceSub();
    var resourceTyResourceText = that.getDataResourceTyResourceText();
    var resourceTyResourceLinkTarget = that.getDataResourceTyResourceLinkTarget();
    var resourceTyResourceLinkTitle = that.getDataResourceTyResourceLinkTitle();
    var resourceTyResourceLinkUrl = that.getDataResourceTyResourceLinkUrl();

    var resourceTyImgColClass = that.getResourceTyImgColClass();
    var resourceTyTextColClass = that.getResourceTyTextColClass();
    var resourceTyTextOnlyColClass = that.getResourceTyTextOnlyColClass();

    if( that.colFormHeaderFigures ) {
      that.colFormHeaderFigures.remove()
    }

    // Form top headline replace
    if( resourceTySuper || resourceTyHeadline || resourceTySub ) {
      if( resourceTySuper ) {
        tyHeadline = tyHeadline + '<span class="superheadline">' + resourceTySuper + '</span>';
      }
      if( resourceTyHeadline ) {
        tyHeadline = tyHeadline + resourceTyHeadline ;
      }
      if( resourceTySub ) {
        tyHeadline = tyHeadline + '<span class="subheadline">' + resourceTySub + '</span>';
      }

      if( that.superheadlineColForm.length >= 1 && tyHeadline ) {
        that.headlineColForm.html(tyHeadline);
      }
    }

    // Form top text replace
    if( that.textColGated.length >= 1 && resourceTyText ) {
      that.textColGated.html(resourceTyText);
    }

    // Build the thank you resource headline, tyResourceHeadline.
    if( resourceTyResourceSuper || resourceTyResourceHeadline || resourceTyResourceSub ) {
      if( resourceTyResourceSuper ) {
        tyResourceHeadline = tyResourceHeadline + '<span class="superheadline">' + resourceTyResourceSuper + '</span>';
      }
      if( resourceTyResourceHeadline ) {
        tyResourceHeadline = tyResourceHeadline + resourceTyResourceHeadline ;
      }
      if( resourceTyResourceSub ) {
        tyResourceHeadline = tyResourceHeadline + '<span class="subheadline">' + resourceTyResourceSub + '</span>';
      }

      tyResourceHeadline = '<h5 class="headline hedline-thankyou">' + tyResourceHeadline + '</h3>';
    }

    // Build the thank you resource image, tyResourceImg.
    if( resourceTyResourceImageUrl ) {
      tyResourceImg = `
        <div class="${resourceTyImgColClass}"><div class="thankyou-resource-image text-left"><figure class="figure figure-image w-100">
          <img class="lazy image img-fluid figure-img" alt="Rjbstarter resource image" src="${resourceTyResourceImageUrl}" data-src="${resourceTyResourceImageUrl}">
        </figure></div></div>
      `;
    }

    // Build the thank you resource link, tyResourceLink.
    if( resourceTyResourceLinkTitle && resourceTyResourceLinkUrl ) {
      if( resourceTyResourceLinkTarget ) {
        tyResourceLinkTarget = 'target="'+ resourceTyResourceLinkTarget +'"';
      }
      tyResourceLink = `
        <div class="buttons buttons-section buttons-footer">
          <a class="btn btn-outline-primary btn-sm" href="${resourceTyResourceLinkUrl}" data-g-action="click: ${resourceTyResourceLinkUrl}" data-g-label="gated thankyou resouce" ${tyResourceLinkTarget}>${resourceTyResourceLinkTitle}&nbsp;<i class="fal fa-arrow-right fa-sm"></i></a>
        </div>
      `;
    }

    // Build the thank you resource text, tyResourceText.
    if( resourceTyResourceText || tyResourceLink ) {
      tyResourceText = '<div class="text text-resource text-thankyou">' + resourceTyResourceText + '</div>';

      if ( tyResourceLink ) {
        tyResourceText = tyResourceText + tyResourceLink;
      }
    }

    if ( tyResourceHeadline || tyResourceText ) {
      if( resourceTyResourceImageUrl ) {
        tyResourceMain = `
          <div class="${resourceTyTextColClass}"><div class="thankyou-resource-text text-left">
            ${tyResourceHeadline}
            ${tyResourceText}
          </div></div>
        `;
      }
      else {
        tyResourceMain = `
          <div class="${resourceTyTextOnlyColClass}"><div class="thankyou-resource-text text-left">
            ${tyResourceHeadline}
            ${tyResourceText}
          </div></div>
        `;
      }
    }

    if ( tyResourceMain && tyResourceImg ) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center justify-content-lg-between py-1">
          ${tyResourceMain}
          ${tyResourceImg}
        </div>
      `;
    }
    else if (tyResourceMain && ! tyResourceImg) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center py-1">
          ${tyResourceMain}
        </div>
      `;
    }
    else if ( ! tyResourceMain && tyResourceImg) {
      tyResourceMain = `
        <div class="row flex-row justify-content-center py-1">
          ${tyResourceImg}
        </div>
      `;
    }

    that.formWrapper.html(tyResourceMain);
  },

  mktoInit: function() {
    var that = this;
    var formId = that.getFormId();

    if (typeof formId !== 'undefined') {
      MktoForms2.loadForm('//info.rjbstarter.com', '516-DGM-318', that.getFormId(), function(form) {
        if(that.getDataVid())
          form.setValues({'assetVimeoId': that.getDataVid()});

        if(that.getDataPdfUrl())
          form.setValues({'assetUrl': that.getDataPdfUrl()});

        if(that.getDataResourceName())
          form.setValues({'assetName': that.getDataResourceName()});

        if(that.getDataRequestType())
          form.setValues({'assetRequestType': that.getDataRequestType()});

        var form2 = form.getFormElem();
        if( form2.length ) {
          // Loop through all checkbox items and add classes to marketo partent items for styling.
          var checkboxes = form2.find('input[type="checkbox"]');

          if ( checkboxes.length ) {
            checkboxes.each(function() {
              var attr_name  = $(this).attr('name') || '';
              attr_name = attr_name.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '_');

              var attr_value = $(this).attr('value') || '';
              attr_value = attr_value.toLowerCase().replace(/[^0-9a-zA-Z-]+/gi, '-');

              if( attr_value ) {
                $(this).addClass(attr_value);
              }

              if( attr_name ) {
                $(this).addClass(attr_name);
                var field_wrapper = $(this).parents('.mktoFieldWrap');
                var row_wrapper   = $(this).parents('.mktoFormRow');

                var wrapper_class = attr_name + '_checkbox_wrapper';
                field_wrapper.addClass(wrapper_class);
                wrapper_class = 'checkbox_wrapper';
                field_wrapper.addClass(wrapper_class);
                var row_class     = attr_name + '_checkbox_row';
                row_wrapper.addClass(row_class);
                row_class     = 'checkbox_row';
                row_wrapper.addClass(row_class);
              }
            });
          }
        }

        form.onSubmit(
          function( form ) {
            var evt = {
              event:       'formSubmit',
              eventPage:   window.location.href || 'unknown page',
              eventPath:   window.location.pathname || 'unknown path',
              eventHost:   window.location.hostname || 'unknown host',
              eventStatus: 'initiate',
              eventForm: {
                id:   form.getId() || '',
                name: 'gated_form_' + that.getFormId(),
              },
            };

            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push(evt);
          }
        );

        form.onSuccess(function (resForm) {
          var qcrand = (Math.random() * 100000000000000000).toString();
          var evt = {
            event:      'formSubmit',
            eventPage:   resForm._mktoReferrer || 'unknow page',
            eventPath:   window.location.pathname || 'unknown path',
            eventHost:   window.location.hostname || 'unknown host',
            eventStatus: 'success',
            eventForm: {
              id:     resForm.formid,
              type: 'form',
              name:  'form ' + that.getFormId(),
              detail: resForm.assetName || 'unknown details',
              assetRequestType: resForm.assetName || 'unknown type',
              assetName: resForm.assetName || 'unknown name',
              assetUrl: resForm.assetPdfUrl || 'unknown url',
              assetVid: resForm.assetVimeoId || 'unknown vid',
            },
            rjbstarter: {
              //qacct:'p-fdPOEe5CwS0oM',
              labels:  '_fp.event.Gated Form Success ' + resForm.assetName,
              setid:   '1',
              id:      qcrand,
              orderid: qcrand,
            },
          };

          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push(evt);

          that.showThankyou();

          // return false to keep the user on the same page.
          return false;
        });
      });
    }
  },
};

////////////////////
// Initialize the js if the page has a [data-mkto-col-form] dom item.
////////////////////
$(function () {
  if ($('[data-mkto-col-form]').length) {
    var colForms = new $.colForms($('[data-mkto-col-form]'));
    colForms.init();
  }
});

*/
