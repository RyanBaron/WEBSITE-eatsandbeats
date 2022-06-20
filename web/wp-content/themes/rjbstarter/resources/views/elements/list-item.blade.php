@php
  $args['headline'] = isset( $headline ) ? $headline : '';
  $args['text'] = isset( $text ) ? $text : '';
  $args['icon'] = isset( $icon ) ? $icon : '';
  $style = isset( $style ) ? $style : '';
@endphp

{!! App::list_item(
  $style,
  $args
) !!}
