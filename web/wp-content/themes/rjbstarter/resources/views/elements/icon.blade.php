@php
$icon_class       = isset($icon['class']) ? $icon['class'] : '';
$icon_color       = isset( $icon['color'] ) && ! empty( $icon['color'] ) ? $icon['color'] : '';
$icon_color_class = ! empty( $icon_color ) ? 'icon-wrap-' . $icon_color : '';
$icon_bg_style   = isset( $icon['bg_style'] ) && ! empty( $icon['bg_style'] ) ? $icon['bg_style'] : '';
$icon_bg_style_class = ! empty( $icon_bg_style  ) ? $icon_bg_style  : '';
$icon_bg_shadow   = isset( $icon['bg_shadow'] ) && ! empty( $icon['bg_shadow'] ) ? $icon['bg_shadow'] : '';
$icon_bg_shadow_class = ! empty( $icon_bg_shadow  ) ? $icon_bg_shadow  : '';
$icon_bg_color    = isset( $icon['bg_color'] ) && ! empty( $icon['bg_color'] ) ? $icon['bg_color'] : '';
$icon_bg_color_class = ! empty( $icon_bg_color ) ? $icon_bg_color : '';
$icon_pos         = isset( $icon['position'] ) && ! empty( $icon['position'] ) ? $icon['position'] : '';
$icon_pos_class   = ! empty( $icon_pos ) ? 'icon-wrap-' . $icon_pos : '';
$icon_size        = isset( $icon['size'] ) && ! empty( $icon['size'] ) ? $icon['size'] : '';
$icon_size_class  = ! empty( $icon_size ) ? 'icon-wrap-' . $icon_size : '';
$icon_wrapper_height  = ! empty( $icon['wrapper_height'] ) ? $icon['wrapper_height'] : '';
@endphp

@if( $icon_class )
  <div class="icon-wrapper {{ $icon_pos_class }} {{ $icon_size_class }} {{ $icon_color_class }}">
    <div class="icon-wrapper-inside {{ $icon_bg_color_class }} {{ $icon_bg_shadow_class }} {{ $icon_bg_style_class }} {{ $icon_wrapper_height }}">
      <i class="{{ $icon_class }} {{ $icon_size }} {{ $icon_color }}"></i>
    </div>
  </div>
@endif
