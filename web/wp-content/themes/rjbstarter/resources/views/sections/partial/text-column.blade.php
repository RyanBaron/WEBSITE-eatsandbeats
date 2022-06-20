@php
$section_columns  = get_field('section_columns');
$class            = array();
$context          = isset($context) && ! empty($context) ? $context : array();
$context_buttons  = array_merge($context, array('footer'));
$args_headline    = isset($args['headline']) && is_array($args['headline']) ? $args['headline'] : array();
$class_col        = get_field('col_class_text') ?: array('col', 'col-md-6');
$class_col_order  = get_field('col_class_text_order') ?: array();
$text_align       = get_field('text_align');
$class            = array_unique(array_merge($class_col, $class_col_order));
$class_flex_align = 'd-flex';
$class_vert_align = 'align-items-center';
$cta_icon         = get_field('cta_icon');
$col_text_align   = get_field('col_text_align');

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
/**
 * Add column class vertical alignment.
 */
if( $class_vert_align ) {
  $class[] = $class_vert_align;
}
/**
 * Add column class vertical alignment.
 */
if( $class_flex_align ) {
  $class[] = $class_flex_align;
}
/**
 * Add column class vertical alignment.
 */
if( $col_text_align ) {
  $class[] = $col_text_align;
}
if( $text_align ) {
  $class[] = $text_align;
}
@endphp

@if (in_array('text', $section_columns ))
  <div class="{!! App::context_class('col', $context) !!} {!! App::sanatize_attrs($class) !!}">
    <div class="{!! App::context_class('col-inside', $context) !!} w-100">

      @if( 'brand-icon-top' === $cta_icon )
        <div class="brand-icon-top d-flex align-items-center justify-content-center"><img alt="Rjbstarter Icon" src="@asset('images/rjbstarter-q.svg')"></div>
      @endif

      @includeIf('sections.partial.headline', array('context' => $context, 'args' => $args_headline))

      @includeIf('sections.partial.text', array('context' => $context, 'args' => array()))

      @includeIf('sections.partial.links', array( 'context' => $context_buttons, 'args' => array()))
    </div>
  </div>
@endif
