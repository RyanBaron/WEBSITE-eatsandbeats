@php
$size = 'thumbnail';
$default = '';
$alt = get_the_author();
$args = array( 'class' => array( 'rounded-circle' ) );
$post_id = isset($post_id) && ! empty($post_id) ? $post_id : '';
$author_id = get_post_field ('post_author', $post_id);

@endphp
<div class="byline byline-condensed byline-condensed-small byline-condensed-no-link d-flex flex-row align-items-center">
  <figure>
    {!! get_avatar( $author_id, $size, $default, $alt, $args ) !!}
  </figure>
  <div class="name pl-2">
    {{ get_the_author_meta( "display_name", $author_id) }}
  </div>
</div>
