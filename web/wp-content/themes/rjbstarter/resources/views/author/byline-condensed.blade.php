@php
$size = 'thumbnail';
$default = '';
$alt = get_the_author();
$args = array( 'class' => array( 'rounded-circle' ) );
@endphp

<div class="byline byline-condensed">
  <figure>
    {!! get_avatar( get_the_author_meta('ID'), $size, $default, $alt, $args ) !!}
  </figure>
  <div class="name">
    {{ __('by', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
      {{ get_the_author() }}
    </a>
  </div>
</div>
