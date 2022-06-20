@php
$context = isset( $context ) ? $context : '';
$quote = isset( $quote ) ? $quote : '';
@endphp

@if( $quote )
  @php
    $image_shape = isset( $quote_image_shape ) ? $quote_image_shape : '';
    $image_shape = is_array($image_shape) && isset($image_shape[0]) ? $image_shape[0] : $image_shape;
    $image_size = isset( $quote_image_size ) ? $quote_image_size : 'square_md';
    $image_size = is_array($image_size) && isset($image_size[0]) ? $image_size[0] : $image_size;
    $logo_size = isset( $quote_logo_size ) ? $quote_logo_size : 'logo_sm';
    $logo_size = is_array($logo_size) && isset($logo_size[0]) ? $logo_size[0] : $logo_size;
    $name = isset( $name ) ? $name : '';
    $position = isset( $position ) ? $position : '';
    $company = isset( $company ) ? $company : '';
    $context_col = isset( $context_col ) ? $context_col : '';
    $quote_logo_id = isset( $quote_logo_id ) ? $quote_logo_id : '';
    $quote_image_id = isset( $quote_image_id ) ? $quote_image_id : '';

    $figure['class'] = 'w-100';

    $quote_image = array(
      'id' => $quote_image_id,
      'size' => $image_size,
      'class' => array(
        'image',
        'img-fluid',
        'figure-img',
        $image_shape,
      ),
    );

    $quote_logo = array(
      'id' => $quote_logo_id,
      'size' => $logo_size,
      'class' => array(
        'image',
        'img-fluid',
        'figure-img',
      ),
    );
  @endphp

  <div class="row flex-row">
    <div class="{!! App::context_class('col', $context_col) !!} col-12">
      <blockquote>{!! $quote !!}</blockquote>
    </div>
    <div class="{!! App::context_class('col', $context_col) !!} col-12">
      <div class="quote-details-wrapper d-flex justify-content-start align-items-center">
        @if( $quote_image_id )
          <div class="quote-image">
            @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $quote_image))
          </div>
        @endif
        <div class="quote-cite">
          <div class="name">{{ $name }}</div>
          <div class="details">
            <div class="position"> {{ $position }}</div>
            <div class="company"> {{ $company }}</div>
          </div>
          <div class="quote-logo">
            @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $quote_logo))
          </div>
        </div>
      </div>
    </div>
  </div>

@endif
