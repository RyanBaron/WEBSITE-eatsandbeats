@php
$class = isset($args['class']) ? $args['class'] : '';
$text  = isset($args['text']) ? $args['text'] : '';
@endphp

@if( $text )
  <div class="{{ $class }}">
    {!! $text !!}
  </div>
@endif
