// Get helper functions from global scope
( function( blocks, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'gutenberg-widgets/tab-item', {
    title: 'Tab Item', // Block name visible to user
    icon: 'lightbulb', // Toolbar icon can be either using WP Dashicons or custom SVG
    category: 'widgets', // Under which category the block would appear
    attributes: { // The data this block will be storing
      title: { type: 'string' }, // Notice box title in h4 tag
      primary: { type: 'string', default: 'secondary' },
      container: { type: 'string', default: '' },
    },
      edit: function(props) {
        // How our block renders in the editor in edit mode

        function updateTitle( event ) {
          props.setAttributes( { title: event.target.value } );
        }

        function updatePrimary( event ) {
          props.setAttributes( { primary: event.target.value } );
        }

        function updateContainer( event ) {
          props.setAttributes( { container: event.target.value } );
        }

        return el( 'div',
          {
          className: 'tab-pane-item',
          },
          el(
            'h5',
            {
              className: 'title title-tab',
            },
            'Tab Item'
          ),
          el(
            'input',
              {
              type: 'text',
              placeholder: 'Enter tab title...',
              value: props.attributes.title,
              onChange: updateTitle,
              style: { width: '100%' },
              }
          ),
          el(
             'select',
             {
                onChange: updateContainer,
                value: props.attributes.container,
             },
             el('option', {value: '' }, 'Default'),
             el('option', {value: 'container' }, 'Container'),
             el('option', {value: 'container-fluid' }, 'Container Fluid')
          ),
          el(
             'select',
             {
                onChange: updatePrimary,
                value: props.attributes.primary,
             },
             el('option', {value: '' }, 'Secondary Tab'),
             el('option', {value: 'primary' }, 'Primary Tab')
          ),
          el(
            wp.blockEditor.InnerBlocks
          )
        ); // End return
      },  // End edit()
      save: function(props) {
        // How our block renders on the frontend

        function containerClass( data ) {
          if( 'container' == data || 'container-fluid' == data )
            return data;

          return '';
        }

        return el( 'div',
          {
          id: props.attributes.title.replace(/\s/g , '-').replace(/[^0-9a-z-]/gi, '').toLowerCase(),
          className: 'tab-pane-item',
          'data-tab-pane': props.attributes.primary,
          'data-tab-pane-title': props.attributes.title,
          },
          el(
            'div',
            {
              className: 'tab-item-wrapper ' + containerClass(props.attributes.container),
            },
            el( wp.blockEditor.InnerBlocks.Content, {
              tagName: 'div',
            } )
          )
        ); // End return
      }, // End save()
  } );
}(
  window.wp.blocks,
  window.wp.element
) );
