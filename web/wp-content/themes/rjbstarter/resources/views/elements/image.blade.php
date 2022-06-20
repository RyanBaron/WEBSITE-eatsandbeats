@if( $img_id )
  @php
    $img_class     = isset( $image['class'] ) ? $image['class'] : 'image';
    $img_size      = isset( $image['size'] ) ? $image['size'] : 'full';
    $img_lazy      = isset( $image['lazy_load'] ) ? $image['lazy_load'] : 'placeholder';
    $alt_overwrite = isset( $image['alt_overwrite'] ) ? $image['alt_overwrite'] : true;
    $low_res       = \App\low_res_image_size($img_size);
  @endphp

  {!! App::image(
    $img_id,
    $img_size,
    array(
      'class'         => $img_class,
      'low_res'       => $low_res,
      'lazy_load'     => $img_lazy,
      'alt_overwrite' => $alt_overwrite,
    )
  ) !!}

@endif
