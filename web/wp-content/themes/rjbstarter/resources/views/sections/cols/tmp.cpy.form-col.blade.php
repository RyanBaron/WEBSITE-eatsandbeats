@php
  $col_order       = get_field('col_form_order') ?: array();
  $col_size        = get_field('col_form_col_class') ?: array();
  $col_text_align  = get_field('col_form_text_align') ?: array();
  $class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
  $class           = \App\sanatize_class_depth( $class );

  $default_col_padding = get_field('default_col_padding', 'options') ?: array();
  $default_col_margin  = get_field('default_col_margin', 'options') ?: array();
  $col_padding         = get_field('col_form_padding') ?: $default_col_padding;
  $col_margin          = get_field('col_form_margin') ?: $default_col_margin;
  $col_spacing_class   = array_merge($col_padding, $col_margin);
  $col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);

  $analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
  $context           = isset($context) && ! empty($context) ? $context : array();
  $context_col       = array_merge($context, array('form'));

  $form_button_style       = get_field('col_form_button_style') ?: array();
  $form_header_align       = get_field('col_form_header_align') ?: array();
  $form_display_class = get_field('col_form_display_style') ?: '';
  $form_display_class = \App\sanatize_class_depth($form_display_class);
  $form_layout_class = get_field('col_form_layout') ?: '';
  $mkto_form_id = get_field('col_form_mkto_id') ?: '';
  $form = array(
    'form_id' => $mkto_form_id,
    'display' => array(
      $form_display_class
    ),
    'button_style' => $form_button_style,
    'header_align' => $form_header_align,
    'layout' => $form_layout_class,
  );

  // Headline content
  $htag         = get_field('col_form_headline_tag') ?: 'h3';
  $style        = get_field('col_form_headline_style');
  $sup_headline = get_field('col_form_superheadline');
  $headline     = get_field('col_form_headline');
  $sub_headline = get_field('col_form_subheadline');

  // Text content
  $text         = get_field('col_form_text');

  // Footer content classes
  $class_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-form', 'headline-col-copy', $style));
  $class_text     = \App\sanatize_class_depth(array('text', 'text-col', 'text-col-copy', 'order-first'));

  $args_headline = array(
    'superheadline' => $sup_headline,
    'headline'      => $headline,
    'subheadline'   => $sub_headline,
    'tag'           => $htag,
    'class'         => $class_headline
  );

  $args_text = array(
    'text'  => $text,
    'class' => $class_text
  );

  $pre_headline_figure = isset($pre_headline_figure) && is_array($pre_headline_figure) ? $pre_headline_figure : array();
  $pre_headline_figure['class'][] = get_field('col_form_pre_headline_image_width') ?: 'w-100';
  $pre_headline_figure['class'][] = 'headline-figure';
  $pre_headline_figure['class'][] = 'pre-headline-figure';

  $default_style = array('image', 'img-fluid', 'figure-img', 'headline-img');
  $img_classes = array_merge($default_style, array());

  $pre_headline_image = array(
    'id' => get_field('col_form_pre_headline_image') ?: '',
    'size' => get_field('col_form_pre_headline_image_size') ?: 'full',
    'class' => $img_classes,
  );

  $post_headline_figure = isset($post_headline_figure) && is_array($post_headline_figure) ? $post_headline_figure : array();
  $post_headline_figure['class'][] = get_field('col_form_post_headline_image_width') ?: 'w-100';
  $post_headline_figure['class'][] = 'headline-figure';
  $post_headline_figure['class'][] = 'post-headline-figure';
  $post_headline_image = array(
    'id' => get_field('col_form_post_headline_image') ?: '',
    'size' => get_field('col_form_post_headline_image_size') ?: 'full',
    'class' => $img_classes,
  );













  /**
   * ToDo: Temprarily putting all thank you text in the dom for js access on success.  Find a better solution, maybe
   *       an additional ajax call on success to the wp api or a custom wp ajax function (using a blade.php template)
   */
  $form_ty_superheadline = get_field('col_form_resource_ty_superheadline') ?: '';
  $form_ty_superheadline = ! empty($form_ty_superheadline) ? 'data-resource-ty-super="'. esc_html($form_ty_superheadline) .'"' : '';
  $form_ty_headline = get_field('col_form_resource_ty_headline') ?: '';
  $form_ty_headline = ! empty($form_ty_headline) ? 'data-resource-ty-headline="'. esc_html($form_ty_headline) .'"' : '';
  $form_ty_subheadline = get_field('col_form_resource_ty_subheadline') ?: '';
  $form_ty_subheadline = ! empty($form_ty_subheadline) ? 'data-resource-ty-sub="'. esc_html($form_ty_subheadline).'"' : '';
  $form_ty_text = get_field('col_form_resource_ty_text') ?: '';
  $form_ty_text = ! empty($form_ty_text) ? 'data-resource-ty-text="'. esc_html($form_ty_text) .'"' : '';

  $form_ty_resource_layout = get_field('col_form_resource_ty_layout') ?: '';
  $form_ty_resource_image = get_field('col_form_resource_ty_resource_image') ?: array();
  $form_ty_resource_image_url  = isset($form_ty_resource_image['url']) ? $form_ty_resource_image['url'] : '';
  $form_ty_resource_image_data = ! empty($form_ty_resource_image_url) ? 'data-resource-ty-resource-img="'. esc_html($form_ty_resource_image_url) .'"' : '';

  $form_ty_resource_superheadline = get_field('col_form_resource_ty_resource_superheadline') ?: '';
  $form_ty_resource_superheadline = ! empty($form_ty_resource_superheadline) ? 'data-resource-ty-resource-super="'. esc_html($form_ty_resource_superheadline) .'"' : '';
  $form_ty_resource_headline = get_field('col_form_resource_ty_resource_headline') ?: '';
  $form_ty_resource_headline = ! empty($form_ty_resource_headline) ? 'data-resource-ty-resource-headline="'. esc_html($form_ty_resource_headline) .'"' : '';
  $form_ty_resource_subheadline = get_field('col_form_resource_ty_resource_subheadline') ?: '';
  $form_ty_resource_subheadline = ! empty($form_ty_resource_subheadline) ? 'data-resource-ty-resource-sub="'. esc_html($form_ty_resource_subheadline) .'"' : '';
  $form_ty_resource_text = get_field('col_form_resource_ty_resource_text') ?: '';
  $form_ty_resource_text = ! empty($form_ty_resource_text) ? 'data-resource-ty-resource-text="'. esc_html($form_ty_resource_text) .'"' : '';
  $form_ty_resource_link = get_field('col_form_resource_ty_resource_link') ?: array();
  $form_ty_resource_link_title = isset($form_ty_resource_link['title']) ? $form_ty_resource_link['title'] : '';
  $form_ty_resource_link_title = ! empty($form_ty_resource_link_title) ? 'data-resource-ty-resource-link-title="'. esc_html($form_ty_resource_link_title) .'"' : '';
  $form_ty_resource_link_url = isset($form_ty_resource_link['url']) ? $form_ty_resource_link['url'] : '';
  $form_ty_resource_link_url = ! empty($form_ty_resource_link_url) ? 'data-resource-ty-resource-link-url="'. esc_html($form_ty_resource_link_url) .'"' : '';
  $form_ty_resource_link_target = isset($form_ty_resource_link['target']) ? $form_ty_resource_link['target'] : '';
  $form_ty_resource_link_target = ! empty($form_ty_resource_link_target) ? 'data-resource-ty-resource-link-target="'. esc_html($form_ty_resource_link_target) .'"' : '';

  $form_data_ty = '';
  $form_data_ty .= ! empty( $form_ty_superheadline ) ? ' ' . $form_ty_superheadline : '';
  $form_data_ty .= ! empty( $form_ty_headline ) ? ' ' . $form_ty_headline : '';
  $form_data_ty .= ! empty( $form_ty_subheadline ) ? ' ' . $form_ty_subheadline : '';
  $form_data_ty .= ! empty( $form_ty_text ) ? ' ' . $form_ty_text : '';
  $form_data_ty .= ! empty( $form_ty_resource_image_data ) ? ' ' . $form_ty_resource_image_data : '';
  $form_data_ty .= ! empty( $form_ty_resource_superheadline ) ? ' ' . $form_ty_resource_superheadline : '';
  $form_data_ty .= ! empty( $form_ty_resource_headline ) ? ' ' . $form_ty_resource_headline : '';
  $form_data_ty .= ! empty( $form_ty_resource_subheadline ) ? ' ' . $form_ty_resource_subheadline : '';
  $form_data_ty .= ! empty( $form_ty_resource_text ) ? ' ' . $form_ty_resource_text : '';
  $form_data_ty .= ! empty( $form_ty_resource_link_target ) ? ' ' . $form_ty_resource_link_target : '';
  $form_data_ty .= ! empty( $form_ty_resource_link_title ) ? ' ' . $form_ty_resource_link_title : '';
  $form_data_ty .= ! empty( $form_ty_resource_link_url ) ? ' ' . $form_ty_resource_link_url : '';


  /*
  $ty = array(
    'header' => array(
      'superheadline' => $form_ty_superheadline,
      'headline' => $form_ty_headline,
      'subheadline' => $form_ty_subheadline,
    ),
    'content' => array(
      'text' => $form_ty_text,
    )
    'cta' => array(
      'image' => array(
        'url' => $form_ty_resource_image_url,
        'data' => $form_ty_resource_image_data,
      ),
      'header' => array(
        'superheadline' => $form_ty_superheadline,
        'headline' => $form_ty_headline,
        'subheadline' => $form_ty_subheadline,
      ),
      'content' => array(
        'text' => $form_ty_text,
      ),
    )
    'form_data_ty' => $form_data_ty,
  );
  */









@endphp

@if( $mkto_form_id )
  <div class="{!! App::context_class('col', $context_col) !!} {!! App::sanatize_attrs($class) !!} {!! $col_spacing_class !!}">
    <div class="{!! App::context_class('col-inside', $context_col) !!} w-100">
      @includeIf('elements.mkto-form', array(
        'context' => $context,
        'pre_headline_img' => array( 'pre_headline_figure' => $pre_headline_figure, 'pre_headline_image' => $pre_headline_image),
        'post_headline_img' => array( 'post_headline_figure' => $post_headline_figure, 'post_headline_image' => $post_headline_image),
        'headline' => array('headline' => $headline, 'arg_headline', $args_headline),
        'text' => array('text' => $text, 'arg_text', $args_text),
        'form' => $form,
        'form_data_ty' => $form_data_ty
        ))
    </div>
  </div>
@endif
