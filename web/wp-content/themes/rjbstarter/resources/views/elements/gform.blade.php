@php
  $context = isset($context) ? $context : '';
  $args_text = isset($args_text) ? $args_text : array();
  $text = isset($args_text['text']) ? $args_text['text'] : '';
  $form_id = isset($form['gform_id']) ? $form['gform_id'] : '';
  $display = isset($form['display']) ? $form['display'] : '';
  $display = \App\sanatize_class_depth( $display );

  $header_align = isset($form['header_align']) ? $form['header_align'] : array();
  $header_align = \App\sanatize_class_depth( $header_align );

  $header_headline_style = isset($form_headline['headline_style']) ? $form_headline['headline_style'] : '';
  $header_headline_style = \App\sanatize_class_depth( $header_headline_style );

  $headline = isset( $form_headline['headline'] ) ? $form_headline['headline'] : array();
  $pre_headline_figure = isset( $form_headline['pre_headline_figure'] ) ? $form_headline['pre_headline_figure'] : array();
  $pre_headline_image = isset( $form_headline['pre_headline_image'] ) ? $form_headline['pre_headline_image'] : array();
  $post_headline_figure = isset( $form_headline['post_headline_figure'] ) ? $form_headline['post_headline_figure'] : array();
  $post_headline_image = isset( $form_headline['post_headline_image'] ) ? $form_headline['post_headline_image'] : array();

  //$post_headline_figure = isset( $post_headline_img['post_headline_figure'] ) ? $post_headline_img['post_headline_figure'] : array();
  //$post_headline_image = isset( $post_headline_img['post_headline_image'] ) ? $post_headline_img['post_headline_image'] : array();
  //$headline = isset( $headline['headline'] ) ? $headline['headline'] : array();
  //$headline_args = isset( $headline['headline_args'] ) ? $headline['headline_args'] : array();
@endphp
@if( $form_id )
  <div class="form-wrapper form-wrapper-{{ $display }} {{ $header_headline_style }}">
    <div class="form-inside">

      <header class="form-header pb-2 {{ $header_align }}">
        @includeIf('elements.figure', array('context' => $context, 'figure' => $pre_headline_figure, 'image' => $pre_headline_image))

        @if( ! empty( $headline ) )
          @includeIf('elements.headline', array('context' => $context, 'args' => $form_headline))
        @endif

        @includeIf('elements.figure', array('context' => $context, 'figure' => $post_headline_figure, 'image' => $post_headline_image))

        @if( ! empty( $text ) )
          <div class="d-flex flex-column flex-column-wrap">

            @if( ! empty( $text ) )
              @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
            @endif

          </div>
        @endif
      </header>

      @php
        // gravity_form(id or title, display title, display desc, display inactive, field values, ajax, tab index, echo)
        // https://docs.gravityforms.com/adding-a-form-to-the-theme-file/
        // gravity_form( $form_id, false, false, false, '', true, 100, true );
      @endphp
    </div>
  </div>
@endif
