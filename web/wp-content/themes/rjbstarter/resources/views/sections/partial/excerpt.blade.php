@php
$source = isset($args['source']) ? $args['source'] : 'fields';
switch( $source ) {
  case 'direct':
    $excerpt = isset($args['body']['excerpt']) ? $args['body']['excerpt'] : '';
  break;
  default:
    $excerpt = get_field('excerpt');
  break;
}
@endphp

@if ($excerpt)
  <div class="{!! App::context_class('excerpt', $context) !!}">
    {{ $excerpt }}
  </div>
@endif
