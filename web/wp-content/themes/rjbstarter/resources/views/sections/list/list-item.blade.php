@php
$fa_ul = isset( $fa_ul ) ? $fa_ul : '';
$context = isset( $context ) ? $context : '';
$icon = isset( $icon ) ? $icon : '';
$headline = isset( $headline ) ? $headline : '';
$text = isset( $text ) ? $text : '';
$icon_html = ( 'fa-ul' == $fa_ul ) && ! empty( $icon ) ? '<i class="' . $icon . ' fa-li"></i>' : '';
@endphp

@if( $headline || $text )
  <li class="list-item">
    {!! $icon_html !!}
    @if( $headline )
      <h5 class="headline headline-list-item">
        {!! $headline !!}
      </h5>
    @endif
    @if( $text )
      <div class="text">
        {!! $text !!}
      </div>
    @endif
  </li>
@endif
