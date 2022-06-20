// Get helper functions from global scope
( function( blocks, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'gutenberg-widgets/tab-link', {
    title: 'Tab Link', // Block name visible to user
    icon: 'lightbulb', // Toolbar icon can be either using WP Dashicons or custom SVG
    category: 'widgets', // Under which category the block would appear
    attributes: { // The data this block will be storing
      title: { type: 'string' }, // Tab item title text
      titleUrl: { type: 'string' }, // Tab item title text url
    },
      edit: function(props) {
        // How our block renders in the editor in edit mode

        function updateTitle( event ) {
          props.setAttributes( { title: event.target.value } );
        }

        function updateTitleUrl( event ) {
          props.setAttributes( { titleUrl: event.target.value } );
        }

        return el( 'div',
          {
          className: 'tab-pane-link',
          },
          el(
            'h5',
            {
              className: 'title title-tab',
            },
            'Tab Link'
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
            'input',
              {
              type: 'text',
              placeholder: 'Enter tab title link url...',
              value: props.attributes.titleUrl,
              onChange: updateTitleUrl,
              style: { width: '100%' },
              }
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
          className: 'tab-pane-link',
          'data-tab-pane': 'hidden',
          'data-tab-pane-title': props.attributes.title,
          'data-tab-pane-url': props.attributes.titleUrl,
          },
          el(
            'div',
            {
              className: 'tab-link-wrapper ' + containerClass(props.attributes.container),
            }
          )
        ); // End return
      }, // End save()
  } );
}(
  window.wp.blocks,
  window.wp.element
) );
