// Get helper functions from global scope
( function( blocks, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'gutenberg-layout/slider', {
    title: 'Slider', // Block name visible to user
    icon: 'lightbulb', // Toolbar icon can be either using WP Dashicons or custom SVG
    category: 'layout', // Under which category the block would appear
    attributes: { // The data this block will be storing
      adline: { type: 'string', default: '' },
      headline: { type: 'string', default: '' },
      subheadline: { type: 'string', default: '' },
      padding: { type: 'string', default: 'py-5' },
      background: { type: 'string', default: '' },
      sliderHeaderAlign: { type: 'string', default: 'text-center' },
      sliderType: { type: 'string', default: '' },
      sliderNavigationDisplay: { type: 'string', default: 'tns-nav-hidden' },
      sliderControlDisplay: { type: 'string', default: '' },
      sliderControlPosition: { type: 'string', default: '' },
    },
      edit: function(props) {

        function updateSuperheadline( event ) {
          props.setAttributes( { adline: event.target.value } );
        }

        function updateHeadline( event ) {
          props.setAttributes( { headline: event.target.value } );
        }

        function updateSubheadline( event ) {
          props.setAttributes( { subheadline: event.target.value } );
        }

        function updatePadding( event ) {
          props.setAttributes( { padding: event.target.value } );
        }

        function updateBackground( event ) {
          props.setAttributes( { background: event.target.value } );
        }

        function updateSliderHeaderAlign( event ) {
          props.setAttributes( { sliderHeaderAlign: event.target.value } );
        }

        function updateSliderType( event ) {
          props.setAttributes( { sliderType: event.target.value } );
        }

        function updateSliderNavigationDisplay( event ) {
          props.setAttributes( { sliderNavigationDisplay: event.target.value } );
        }

        function updateSliderControlDisplay( event ) {
          props.setAttributes( { sliderControlDisplay: event.target.value } );
        }

        function updateSliderControlPosition( event ) {
          props.setAttributes( { sliderControlPosition: event.target.value } );
        }

        return el( 'div',
          {
             className: 'slider slider-content py-1 px-2 px-lg-3 ' + props.attributes.background,
          },
          el(
            'h4',
            {
              className: 'title',
            },
            'Content Slider'
          ),
          el(
             'select',
             {
                onChange: updatePadding,
                value: props.attributes.padding,
             },
             el('option', {value: '' }, 'Default'),
             el('option', {value: 'py-0' }, 'py-0'),
             el('option', {value: 'py-1' }, 'py-1'),
             el('option', {value: 'py-2' }, 'py-2'),
             el('option', {value: 'py-3' }, 'py-3'),
             el('option', {value: 'py-4' }, 'py-4'),
             el('option', {value: 'py-5' }, 'py-5'),
             el('option', {value: 'py-6' }, 'py-6'),
             el('option', {value: 'py-7' }, 'py-7'),
             el('option', {value: 'py-8' }, 'py-8'),
             el('option', {value: 'py-9' }, 'py-9'),
             el('option', {value: 'py-10' }, 'py-10'),
             el('option', {value: 'py-11' }, 'py-11'),
             el('option', {value: 'py-12' }, 'py-12')
          ),
          el(
             'select',
             {
                onChange: updateBackground,
                value: props.attributes.background,
             },
             el('option', {value: '' }, 'Default'),
             el('option', {value: 'bg-white' }, 'bg-white'),
             el('option', {value: 'bg-light' }, 'bg-light'),
             el('option', {value: 'bg-lighter' }, 'bg-lighter'),
             el('option', {value: 'bg-dark' }, 'bg-dark')
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
                style: { width: '100%' },
              },
              'Slider Navigation Display'
            ),
            el(
               'select',
               {
                  onChange: updateSliderNavigationDisplay,
                  value: props.attributes.sliderNavigationDisplay,
                  style: { width: '100%' },
               },
               el('option', {value: '' }, 'Default (show)'),
               el('option', {value: 'tns-navigation-hidden' }, 'Hide Slider Navigation')
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
                style: { width: '100%' },
              },
              'Slider Control Display'
            ),
            el(
               'select',
               {
                  onChange: updateSliderControlDisplay,
                  value: props.attributes.sliderControlDisplay,
                  style: { width: '100%' },
               },
               el('option', {value: '' }, 'Default (show)'),
               el('option', {value: 'tns-controls-hidden' }, 'Controls (hidden)'),
               el('option', {value: 'tns-controls-primary' }, 'Controls (primary)'),
               el('option', {value: 'tns-controls-green' }, 'Controls (Green)'),
               el('option', {value: 'tns-controls-orange' }, 'Controls (Orange)'),
               el('option', {value: 'tns-controls-purple' }, 'Controls (purple)'),
               el('option', {value: 'tns-controls-light' }, 'Controls (light)'),
               el('option', {value: 'tns-controls-lighter' }, 'Controls (lighter)'),
               el('option', {value: 'tns-controls-dark' }, 'Controls (dark)'),
               el('option', {value: 'tns-controls-darker' }, 'Controls (darker)')
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
                style: { width: '100%' },
              },
              'Slider Control Position'
            ),
            el(
               'select',
               {
                  onChange: updateSliderControlPosition,
                  value: props.attributes.sliderControlPosition,
                  style: { width: '100%' },
               },
               el('option', {value: '' }, 'Default (bottom)'),
               el('option', {value: 'tns-controls-vertical-center' }, 'Center (vertical)')
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
                style: { width: '100%' },
              },
              'Slider Header Align'
            ),
            el(
               'select',
               {
                  onChange: updateSliderHeaderAlign,
                  value: props.attributes.sliderHeaderAlign,
                  style: { width: '100%' },
               },
               el('option', {value: 'text-left' }, 'Left'),
               el('option', {value: 'text-center' }, 'Center'),
               el('option', {value: 'text-right' }, 'Right')
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
                style: { width: '100%' },
              },
              'Header Align'
            ),
            el(
               'select',
               {
                  onChange: updateSliderType,
                  value: props.attributes.sliderType,
                  style: { width: '100%' },
               },
               el('option', {value: '' }, 'Default'),
               el('option', {value: 'full-width-bleed-right' }, 'Full Width - Bleed Right'),
               el('option', {value: 'full-width-bleed-large-right' }, 'Full Width - Bleed Large Right')
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
              },
              'Superheadline'
            ),
            el(
              'input',
              {
              type: 'text',
              placeholder: 'Enter the slider section super headline...',
              value: props.attributes.adline,
              onChange: updateSuperheadline,
              style: { width: '100%' },
              }
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
              },
              'Headline'
            ),
            el(
              'input',
              {
              type: 'text',
              placeholder: 'Enter the slider section headline...',
              value: props.attributes.headline,
              onChange: updateHeadline,
              style: { width: '100%' },
              }
            )
          ),
          el(
            'div',
            {
              className: 'custom-block-field',
            },
            el(
              'label',
              {
                className: 'custom-block-field-label',
              },
              'Subheadline'
            ),
            el(
              'input',
              {
              type: 'text',
              placeholder: 'Enter the slider section sub headline...',
              value: props.attributes.subheadline,
              onChange: updateSubheadline,
              style: { width: '100%' },
              }
            )
          ),
          el(
            'div',
            {
              className: 'text-center add-slider-label pt-4 pb-2',
            },
            '---- Add Slider Below ----'
          ),
          el(
            wp.blockEditor.InnerBlocks
          )
        ); // End return
      }, // End edit()
      save: function(props) {
        // How our block renders on the frontend

        function superheadlineClass( data ) {
          if( ! data )
            return 'd-none';

          return 'superheadline';
        }

        function headlineClass( data, padding ) {
          var ret = 'd-none';

          if( ! data )
            return ret;

          switch( padding ) {
            case 'py-2':
            case 'py-3':
              ret = 'headline headline-header pb-3';
            break;
            case 'py-4':
            case 'py-5':
              ret = 'headline headline-header pb-3';
            break;
            case 'py-6':
            case 'py-7':
              ret = 'headline headline-header pb-4';
            break;
            case 'py-8':
            case 'py-9':
              ret = 'headline headline-header pb-5';
            break;
            case 'py-10':
            case 'py-11':
              ret = 'headline headline-header pb-6';
            break;
            case 'py-12':
              ret = 'headline headline-header pb-7';
            break;
            default:
              ret = 'headline headline-header pb-3';
          }

          return ret + ' mb-0';
        }

        function subheadlineClass( data ) {
          if( ! data )
            return 'd-none';

          return 'subheadline';
        }

        function generalClass( data ) {
          if( ! data )
            return '';

          return data;
        }

        return el( 'div',
          {
            className: 'slider slider-content ' + props.attributes.padding + ' ' + props.attributes.background + ' ' + generalClass(props.attributes.sliderType) + '' + generalClass(props.attributes.sliderNavigationDisplay) + ' ' + generalClass(props.attributes.sliderControlDisplay) + ' ' + generalClass(props.attributes.sliderControlPosition),
            'data-slider-container': 'true',
          },
          el(
            'header',
            {
              className: 'container header-content pb-0 ' + generalClass(props.attributes.sliderHeaderAlign),
            },
            el(
              'h3',
              {
                className: headlineClass(props.attributes.headline, props.attributes.padding),
              },
              el(
                'span', {
                  className: superheadlineClass(props.attributes.adline),
                },
                props.attributes.adline
              ),
              props.attributes.headline,
              el(
                'span', {
                  className: subheadlineClass(props.attributes.subheadline),
                },
                props.attributes.subheadline
              )
            )
          ),
          el(
            'div',
            {
              className: 'container',
            },
            el(
              'div',
              {
                className: 'slide-items',
              },
              el( wp.blockEditor.InnerBlocks.Content, {
                tagName: 'div',
              } )
            )
          )
        ); // End return
      }, // End save()
  } );
}(
  window.wp.blocks,
  window.wp.element
) );
