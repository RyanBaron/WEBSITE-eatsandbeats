@php
  $form_id = isset($form['form_id']) ? $form['form_id'] : '';
  $form_layout = isset($form['layout']) ? $form['layout'] : array();
  $form_layout = \App\sanatize_class_depth( $form_layout );

  $header_align = isset($form['header_align']) ? $form['header_align'] : array();
  $header_align = \App\sanatize_class_depth( $header_align );
  $button_style = isset($form['button_style']) ? $form['button_style'] : array();
  $button_style = \App\sanatize_class_depth( $button_style );
  $display = isset($form['display']) ? $form['display'] : '';
  $display = \App\sanatize_class_depth( $display );
  $pre_headline_figure = isset( $pre_headline_img['pre_headline_figure'] ) ? $pre_headline_img['pre_headline_figure'] : array();
  $pre_headline_image = isset( $pre_headline_img['pre_headline_image'] ) ? $pre_headline_img['pre_headline_image'] : array();
  $post_headline_figure = isset( $post_headline_img['post_headline_figure'] ) ? $post_headline_img['post_headline_figure'] : array();
  $post_headline_image = isset( $post_headline_img['post_headline_image'] ) ? $post_headline_img['post_headline_image'] : array();
  $headline = isset( $headline['headline'] ) ? $headline['headline'] : array();
  $headline_args = isset( $headline['headline_args'] ) ? $headline['headline_args'] : array();
  $form_data_ty = isset( $form_data_ty ) ? $form_data_ty : '';
  $form_ty_resource_layout = isset( $form_ty_resource_layout ) ? $form_ty_resource_layout : '';
  $resource_ty_img_col_class = '';
  $resource_ty_text_col_class = '';
  $form_data_ty_layout = '';
  $resource_ty_text_only_col_class = '';
  $randId      = \App\getRandId();

  /**
   * ToDo: Move this into a controller or helper function.
   */
  switch( $form_ty_resource_layout ) {
    case 'horz-md':
      $form_data_ty_layout .= ' data-ty-img-col-class="col col-12 col-md-6 col-resource-text py-2 order-first"';
      $form_data_ty_layout .= ' data-ty-text-col-class="col col-12 col-md-6 col-resource-text py-2 order-last"';
      $form_data_ty_layout .= ' data-ty-text-only-col-class="col col-12 col-md-10 col-resource-text py-2 order-last"';
    break;
    case 'horz-lg':
      $form_data_ty_layout .= ' data-ty-img-col-class="col col-12 col-lg-6 col-resource-text py-2 order-first"';
      $form_data_ty_layout .= ' data-ty-text-col-class="col col-12 col-lg-6 col-resource-text py-2 order-last"';
      $form_data_ty_layout .= ' data-ty-text-only-col-class="col col-12 col-lg-10 col-resource-text py-2 order-last"';
    break;
    case 'horz-xl':
      $form_data_ty_layout .= ' data-ty-img-col-class="col col-12 col-xl-6 col-resource-text py-2 order-first"';
      $form_data_ty_layout .= ' data-ty-text-col-class="col col-12 col-xl-6 col-resource-text py-2 order-last"';
      $form_data_ty_layout .= ' data-ty-text-only-col-class="col col-12 col-xl-10 col-resource-text py-2 order-last"';
    break;
    case 'horz-xxl':
      $form_data_ty_layout .= ' data-ty-img-col-class="col col-12 col-xxl-6 col-resource-text py-2 order-first"';
      $form_data_ty_layout .= ' data-ty-text-col-class="col col-12 col-xxl-6 col-resource-text py-2 order-last"';
      $form_data_ty_layout .= ' data-ty-text-only-col-class="col col-12 col-xxl-10 col-resource-text py-2 order-last"';
    break;
    default:
      $form_data_ty_layout .= ' data-ty-img-col-class="col col-12 col-resource-text py-2 order-first"';
      $form_data_ty_layout .= ' data-ty-text-col-class="col col-12 col-resource-text py-2 order-last"';
      $form_data_ty_layout .= ' data-ty-text-only-col-class="col col-12 col-resource-text py-2 order-last"';
   }
@endphp
@if( $form_id )
  <div class="form-wrapper {{ $display }}" data-mkto-col-form data-form-col-id="{{$randId}}">
    <div class="form-inside">

      <div class="col-inside-col-form  p-1 p-lg-2">
        <header class="form-header pb-3 {{ $header_align }}">
          @includeIf('elements.figure', array('context' => $context, 'figure' => $pre_headline_figure, 'image' => $pre_headline_image))

          @if( ! empty( $headline ) )
            @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
          @endif

          @includeIf('elements.figure', array('context' => $context, 'figure' => $post_headline_figure, 'image' => $post_headline_image))

          @if( ! empty( $text ) || have_rows('col_copy_one_list_items') || have_rows('col_copy_one_quote_items') || have_rows('col_copy_one_link_items') )
            <div class="d-flex flex-column flex-column-wrap">

              @if( ! empty( $text ) )
                @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
              @endif

            </div>
          @endif
        </header>

        <div class="mkto-form-wrapper">
          <form id="mktoForm_{{$form_id}}" data-mkto-form="{{$form_id}}" data-startttttttttttttttttt {!! $form_data_ty !!} {!! $form_data_ty_layout !!} class="{{ $form_layout }} {!! $button_style !!}"></form>
        </div>
      </div>

    </div>
  </div>
@endif
