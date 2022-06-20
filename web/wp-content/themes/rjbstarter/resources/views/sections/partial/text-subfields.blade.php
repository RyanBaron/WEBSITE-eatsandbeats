@php
$text = get_sub_field('text');
@endphp

@if ($text)
  <div class="{!! App::context_class('text', $context) !!}">
    {!! $text !!}
  </div>
@endif
