@php
$source = isset($args['source']) ? $args['source'] : 'field';

switch( $source ) {
  case 'direct':
    $text = $args['content']['main'] ? $args['content']['main'] : '';
  break;
  case 'section-header':
    $text = get_field('section_text');
  break;
  case 'field':
  default:
    $text = get_field('text');
  break;
}
@endphp

@if ($text)
  <div class="{!! App::context_class('text', $context) !!}">
    {!! $text !!}
  </div>
@endif
