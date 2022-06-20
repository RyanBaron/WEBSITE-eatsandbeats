// Get helper functions from global scope
( function( blocks, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'gutenberg-layout/tabs', {
    title: 'Tabs', // Block name visible to user
    icon: 'lightbulb', // Toolbar icon can be either using WP Dashicons or custom SVG
    category: 'layout', // Under which category the block would appear
    attributes: { // The data this block will be storing
      adline: { type: 'string', default: '' },
      headline: { type: 'string', default: '' },
      subheadline: { type: 'string', default: '' },
      padding: { type: 'string', default: 'py-5' },
      background: { type: 'string', default: '' },
      tabsHeaderAlign: { type: 'string', default: 'text-center' },
      tabsNavAlign: { type: 'string', default: 'tabsnav-center' },
      tabsNavColor: { type: 'string', default: '' },
      tabsHighlightColor: { type: 'string', default: '' },
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

        function updateTabsHeaderAlign( event ) {
          props.setAttributes( { tabsHeaderAlign: event.target.value } );
        }

        function updateTabsNavColor( event ) {
          props.setAttributes( { tabsNavColor: event.target.value } );
        }

        function updateTabsHighlightColor( event ) {
          props.setAttributes( { tabsHighlightColor: event.target.value } );
        }

        function updateTabsNavAlign( event ) {
          props.setAttributes( { tabsNavAlign: event.target.value } );
        }

        return el( 'div',
          {
             className: 'tabs tab-content py-1 px-2 px-lg-3 ' + props.attributes.background,
          },
          el(
            'h4',
            {
              className: 'title',
            },
            'Content Tabs'
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
             el('option', {value: 'bg-primary' }, 'bg-primary'),
             el('option', {value: 'bg-green' }, 'bg-green'),
             el('option', {value: 'bg-orange' }, 'bg-orange'),
             el('option', {value: 'bg-purple' }, 'bg-purple'),
             el('option', {value: 'bg-light' }, 'bg-light'),
             el('option', {value: 'bg-lighter' }, 'bg-lighter'),
             el('option', {value: 'bg-white-to-lighter' }, 'bg-white-to-lighter'),
             el('option', {value: 'bg-lighter-to-white' }, 'bg-lighter-to-white'),
             el('option', {value: 'bg-light-to-lighter' }, 'bg-light-to-lighter'),
             el('option', {value: 'bg-light-to-white' }, 'bg-light-to-white'),
             el('option', {value: 'bg-lighter-to-white' }, 'bg-lighter-to-white'),
             el('option', {value: 'bg-dark' }, 'bg-dark'),
             el('option', {value: 'bg-darker' }, 'bg-darker')
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
              'Tabs Nav Highlight Color'
            ),
            el(
               'select',
               {
                  onChange: updateTabsHighlightColor,
                  value: props.attributes.tabsHighlightColor,
                  style: { width: '100%' },
               },
               el('option', {value: '' }, 'Default'),
               el('option', {value: 'highlight-primary' }, 'Primary'),
               el('option', {value: 'highlight-dark' }, 'Dark'),
               el('option', {value: 'highlight-darker' }, 'Darker'),
               el('option', {value: 'highlight-light' }, 'Light'),
               el('option', {value: 'highlight-lighter' }, 'Lighter'),
               el('option', {value: 'highlight-secondary' }, 'Secondary'),
               el('option', {value: 'highlight-green' }, 'Green'),
               el('option', {value: 'highlight-pruple' }, 'Purple'),
               el('option', {value: 'highlight-orange' }, 'Orange'),
               el('option', {value: 'highlight-primary-btn' }, 'Btn Primary')
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
              'Tabs Nav Color'
            ),
            el(
               'select',
               {
                  onChange: updateTabsNavColor,
                  value: props.attributes.tabsNavColor,
                  style: { width: '100%' },
               },
               el('option', {value: ''}, 'Default'),
               el('option', {value: 'tabs-primary'}, 'Primary'),
               el('option', {value: 'tabs-dark'}, 'Dark'),
               el('option', {value: 'tabs-darker'}, 'Darker'),
               el('option', {value: 'tabs-light'}, 'Light'),
               el('option', {value: 'tabs-lighter'}, 'Lighter'),
               el('option', {value: 'tabs-secondary'}, 'Secondary'),
               el('option', {value: 'tabs-green'}, 'Green'),
               el('option', {value: 'tabs-pruple'}, 'Purple'),
               el('option', {value: 'tabs-orange'}, 'Orange')
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
              'Tabs Nav Align'
            ),
            el(
               'select',
               {
                  onChange: updateTabsNavAlign,
                  value: props.attributes.tabsNavAlign,
                  style: { width: '100%' },
               },
               el('option', {value: 'tabs-nav-left' }, 'Left'),
               el('option', {value: 'tabs-nav-center' }, 'Center'),
               el('option', {value: 'tabs-nav-right' }, 'Right')
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
                  onChange: updateTabsHeaderAlign,
                  value: props.attributes.tabsHeaderAlign,
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
              },
              'Superheadline'
            ),
            el(
              'input',
              {
              type: 'text',
              placeholder: 'Enter the tab section super headline...',
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
              placeholder: 'Enter the tab section headline...',
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
              placeholder: 'Enter the tab section sub headline...',
              value: props.attributes.subheadline,
              onChange: updateSubheadline,
              style: { width: '100%' },
              }
            )
          ),
          el(
            'div',
            {
              className: 'text-center add-tabs-label pt-4 pb-2',
            },
            '---- Add Tabs Below ----'
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
            className: 'tabs tab-content ' + props.attributes.padding + ' ' + props.attributes.background + ' ' + props.attributes.tabsHighlightColor,
            'data-tabs-container': 'true',
            'data-nav-mobile-slider': 'true',
            'id': 'tabs-' +  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15),
          },
          el(
            'header',
            {
              className: 'container header-content pb-0 ' + generalClass(props.attributes.tabsHeaderAlign),
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
            ),
            el(
              'div',
              {
                className: 'nav-wrapper ' + generalClass(props.attributes.tabsNavAlign) + ' ' + generalClass(props.attributes.tabsNavColor),
              },
              el(
                'ul',
                {
                  className: 'nav nav-pills nav-mobile-slider',
                  'data-nav-tabs': '',
                  'data-nav-slider-mobile': '',
                }
              )
            )
          ),
          el( wp.blockEditor.InnerBlocks.Content, {
            tagName: 'div',
          } )
        ); // End return
      }, // End save()
  } );
}(
  window.wp.blocks,
  window.wp.element
) );
