@php
  $col_order       = get_field('col_form_order') ?: array();
  $col_size        = get_field('col_form_col_class') ?: array();
  $col_text_align  = get_field('col_form_text_align') ?: array();
  $class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
  $class           = \App\sanatize_class_depth( $class );
  $default_col_padding = get_field('default_col_padding', 'options') ?: array();
  $default_col_margin  = get_field('default_col_margin', 'options') ?: array();
  $col_padding         = get_field('col_copy_one_padding') ?: $default_col_padding;
  $col_margin          = get_field('col_copy_one_margin') ?: $default_col_margin;
  $col_spacing_class   = array_merge($col_padding, $col_margin);
  $col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);
  $analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
  $context           = isset($context) && ! empty($context) ? $context : array();
  $context_col       = array_merge($context, array('form'));
  $gform_id           = get_field('col_form_gform_id') ?: '';
  $form_display_class = get_field('col_form_display_style') ?: '';
  $form_display_class = \App\sanatize_class_depth(array($form_display_class));
  $form_button_class = get_field('col_form_button_style') ?: '';
  $form_button_class = \App\sanatize_class_depth(array($form_button_class));

  $form = array(
    'gform_id' => $gform_id,
    'display' => array(
      $form_display_class,
      $form_button_class
    )
  );


// Cards Col Headline content
$htag_col_form         = get_field('col_form_headline_tag') ?: 'h4';
//$style_col_form        = get_field('col_form_headline_style');
$sup_headline_col_form = get_field('col_form_superheadline');
$headline_col_form    = get_field('col_form_headline');
$sub_headline_col_form = get_field('col_form_subheadline');

$class_col_form_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-form'));
$form_headline_style = get_field('col_form_headline_style');
$form_headline_size = get_field('col_form_headline_size');

$args_col_form_headline = array(
  'superheadline' => $sup_headline_col_form,
  'headline'      => $headline_col_form,
  'subheadline'   => $sub_headline_col_form,
  'tag'           => $htag_col_form,
  'class'         => $class_col_form_headline,
  'headline_style'=> array($form_headline_style, $form_headline_size)
);

$pre_headline_figure = array();
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

$args_col_form_headline['pre_headline_figure'] = $pre_headline_figure;
$args_col_form_headline['pre_headline_image'] = $pre_headline_image;

$post_headline_figure = array();
$post_headline_figure['class'][] = get_field('col_form_post_headline_image_width') ?: 'w-100';
$post_headline_figure['class'][] = 'headline-figure';
$post_headline_figure['class'][] = 'post-headline-figure';
$post_headline_image = array(
  'id' => get_field('col_form_post_headline_image') ?: '',
  'size' => get_field('col_form_post_headline_image_size') ?: 'full',
  'class' => $img_classes,
);
$args_col_form_headline['post_headline_figure'] = $post_headline_figure;
$args_col_form_headline['post_headline_image'] = $post_headline_image;

// Col form text
$col_form_text   = get_field('col_form_text') ?: '';
$args_col_form_text = array(
  'text'  => $col_form_text,
);
@endphp

@if( $gform_id )
  <div class="{!! App::context_class('col', $context_col) !!} {!! App::sanatize_attrs($class) !!} {!! $col_spacing_class !!}">
    <div class="{!! App::context_class('col-inside', $context_col) !!} {!! $form_display_class !!} {!! $form_button_class !!} w-100">
      @includeIf('elements.gform', array('context' => $context, 'form' => $form, 'form_headline' => $args_col_form_headline, 'args_text' => $args_col_form_text ))
    </div>
  </div>
@endif
