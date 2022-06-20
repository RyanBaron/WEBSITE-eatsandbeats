@php
  $col_order       = get_field('col_image_one_order') ?: array();
  $col_size        = get_field('col_image_one_col_class') ?: array();
  $col_text_align  = get_field('col_image_one_text_align') ?: array();
  $class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
  $class           = \App\sanatize_class_depth( $class );

  $default_col_padding = get_field('default_col_padding', 'options') ?: array();
  $default_col_margin  = get_field('default_col_margin', 'options') ?: array();
  $col_padding         = get_field('col_image_one_padding') ?: $default_col_padding;
  $col_margin          = get_field('col_image_one_margin') ?: $default_col_margin;
  $col_spacing_class   = array_merge($col_padding, $col_margin);
  $col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);

  // Spacing
  //$padding         = get_field('col_image_one_padding') ?: array();
  //$margin          = get_field('col_image_one_margin') ?: array();
  //$spacing         = array_merge($margin,$padding);
  //$spacing         = \App\sanatize_class_depth($spacing);

  $analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
  $context           = isset($context) && ! empty($context) ? $context : array();
  $context_col       = array_merge($context, array('image'));

  $default_style   = array('image', 'img-fluid', 'figure-img');
  $figure_style    = get_field('col_image_one_figure_style') ?: array();
  $image_style     = get_field('col_image_one_image_style') ?: array();
  $img_classes     = array_merge($default_style, $image_style);
  $image_overflow  = get_field('col_image_one_image_overflow') ?: array();
  $figure_classes  = array_merge($image_overflow, $figure_style, array('w-100'));

  $image = array(
    'id' => get_field('col_image_one_image') ?: '',
    'size' => get_field('col_image_one_image_size') ?: 'full',
    'lazy_load' => get_field('col_image_one_image_load') ?: 'placeholder',
    'class' => $img_classes,
  );
  $figure['class'] = $figure_classes;

@endphp

<div class="{!! App::context_class('col', $context_col) !!} {!! App::sanatize_attrs($class) !!} {!! $col_spacing_class !!}">
  <div class="{!! App::context_class('col-inside', $context_col) !!} w-100">
    @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
  </div>
</div>
