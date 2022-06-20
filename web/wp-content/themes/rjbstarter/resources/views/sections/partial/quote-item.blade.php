@php
$quote = get_field('quote') ?: '';
@endphp

@if( $quote )
  @php
  $font_weight = get_field('font_weight');
  $link = get_field('link');
  $name = get_field('name');
  $position = get_field('position');

  $figure['class'] = 'w-100';

  $image = array(
    'id' => get_field('image_quote') ?: '',
    'size' => get_field('image_quote_size') ?: 'square_md',
    'class' => array(
      'image',
      'img-fluid',
      'figure-img'
    ),
  );
  @endphp

  <div class="row flex-row">
    <div class="{!! App::context_class('col', $context_col) !!} col-12">
      <blockquote>{!! $quote !!}</blockquote>
    </div>
    <div class="{!! App::context_class('col', $context_col) !!} col-12">
      <div class="d-flex justify-content-center align-items-center">
        @if( get_field('image_quote') )
          <div class="quote-image">
            @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
          </div>
        @endif
        <div class="quote-cite">
          <div class="name">{{ $name }}</div>
          <div class="position"> {{ $position }}</div>
        </div>
      </div>
    </div>
  </div>

@endif
