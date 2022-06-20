@php
  $img_id = isset($image['id']) ? $image['id'] : null;
  $context = isset($context) ? $context : '';
@endphp

@if( $img_id )
  @php
    $fig_class = isset( $figure['class'] ) ? \App\sanatize_class( $figure['class'] ) : 'figure-'.$img_id;
  @endphp

  <figure class="{!! App::context_class('figure', $context) !!} {{ $fig_class }}">
    @includeIf('elements.image', array('img_id' => $img_id, 'image' => $image))
  </figure>
@endif
