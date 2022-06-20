@php
$display      = get_field('section_display') ?: '';
$id           = get_field('section_id') ?: '';
$flex         = get_field('section_flex_row');
$flex         = \App\sanatize_class_depth($flex);
$hl_size      = get_field('headline_size') ?: '';
$gutters      = get_field('gutters') ?: '';
$sec_padding  = get_field('section_padding') ?: '';
$sec_bg_color = get_field('section_bg_color') ?: '';
$bg_image     = get_field('image') ?: '';
$args['size'] = get_field('bg_image_size') ?: '';
$align        = get_field('section_row_align') ?: array();

$sec_padding = !empty( $sec_padding ) ? \App\sanatize_class( $sec_padding ) : '';
$sec_bg_color = !empty( $sec_padding ) ? \App\sanatize_class( $sec_bg_color ) : '';

$bg_style = \App\get_background_image_style($bg_image, $args);
$bg_image = isset( $bg_style ) && ! empty( $bg_style ) ? 'bg-image' : '';
@endphp

<section id="{{ $id }}" class="quote {{ $display }} {{ $hl_size }} {{ $bg_image }}" style="{{ $bg_style }}">
  <div class="container {{ $gutters }} {!! $sec_padding !!} {!! $sec_bg_color !!}">
    <div class="row {!! App::sanatize_attrs($flex) !!} {!! App::sanatize_attrs($align) !!}">
      @yield('quote_cols')
    </div>
  </div>
</section>
