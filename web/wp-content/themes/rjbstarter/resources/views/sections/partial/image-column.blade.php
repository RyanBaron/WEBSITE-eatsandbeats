@php
  $section_columns = get_field('section_columns') ?: array();
  $class           = array();
  $context         = isset($context) && ! empty($context) ? $context : array();
  $context_col     = array_merge($context, array('image'));
  $class_col       = get_field('col_class_image') ?: array('col-md-6');
  $class_col_order = get_field('col_class_image_order') ?: array('order-1', 'empty');
  $default_style   = array('image', 'img-fluid', 'figure-img');
  $figure_style    = get_field('figure_style') ?: array();
  $figure_style     = array_merge($figure_style, array('w-100'));
  $image_style     = get_field('image_style') ?: array();

  $img_classes     = array_merge($default_style, $image_style);
  $figure          = isset($figure) && is_array($figure) ? $figure : array();

  $image = array(
    'id' => get_field('image') ?: '',
    'size' => get_field('image_size') ?: 'full',
    'class' => $img_classes,
  );
  $figure['class'] = \App\sanatize_class_depth($figure_style);
  $class           = array_unique(array_merge($class_col, $class_col_order));

  /**
   * If custom class present in the $class_col array
   * add the custom class field it to the class array.
   */
  if( in_array('custom', $class_col) ) {
    $class_custom = get_field('col_class_text_custom');
    if( $class_custom && is_array( $class ) ) {
      $class[] = $class_custom;
    }
  }
  /**
   * If custom class present in the $class_col_order array
   * add the custom class field it to the class array.
   */
  if( in_array('custom', $class_col_order) ) {
    $class_custom = get_field('col_class_text_order_custom');
    if( $class_custom && is_array( $class ) ) {
      $class[] = $class_custom;
    }
  }
@endphp

@if (in_array('image', $section_columns ))
  <div class="{!! App::context_class('col', $context_col) !!} {!! App::sanatize_attrs($class) !!}">
    <div class="{!! App::context_class('col-inside', $context_col) !!} w-100">
      @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
    </div>
  </div>
@endif
