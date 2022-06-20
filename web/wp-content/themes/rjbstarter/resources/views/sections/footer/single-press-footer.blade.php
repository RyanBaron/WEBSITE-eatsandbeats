@php
  $headline = get_field('press_article_footer_title', 'options') ?: '';
  $text = get_field('press_article_footer_text', 'options') ?: '';
@endphp

@if( $headline || $text )
  <footer class="footer-article footer-press pt-2">
    @if( $headline )
      <h5 class="headline">{!! $headline !!}</h5>
    @endif
    @if( $text )
      <div class="text">{!! $text !!}</h5>
    @endif
  </footer>
@endif
