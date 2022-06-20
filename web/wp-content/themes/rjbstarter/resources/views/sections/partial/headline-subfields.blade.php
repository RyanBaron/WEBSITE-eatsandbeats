@php
$superheadline = get_sub_field('superheadline');
$headline = get_sub_field('headline');
$subheadline = get_sub_field('subheadline');
$style = isset($args['style']) ? $args['style'] : '';
$class = '';
$span_wrapper_open  = '';
$span_wrapper_close = '';

$headline_tag = isset($args['tag']) && preg_match('/^h[1-5]$/', $args['tag']) ? $args['tag'] : 'h2';

switch( $style ) {
  case 'line-behind':
    $class = esc_attr($style);
    $span_wrapper_open  = '<span class="headline-span-wrapper"><span class="headline-span">';
    $span_wrapper_close = '</span></span>';
  break;
}

@endphp

@if ($superheadline || $headline || $subheadline)
  <{{ $headline_tag }} class="{!! App::context_class('headline', $context) !!} {!! $class !!}">

    @if ( $superheadline )
      <span class="superheadline">{!! $superheadline !!}</span>
    @endif

    {!! $span_wrapper_open !!}
    {!! $headline !!}
    {!! $span_wrapper_close !!}

    @if ( $subheadline )
      <span class="subheadline">{!! $subheadline !!}</span>
    @endif

  </{{ $headline_tag }}>
@endif
