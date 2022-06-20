@php
$context             = isset($context) && ! empty($context) ? $context : 'feed';
$post_id             = isset($post_id) && ! empty($post_id) ? $post_id : '';
$list_icon_color = get_field('feed_list_icon_color', $post_id) ?: ''; // feed_list_icon_color not yet created.
$list_icon_color = \App\sanatize_class_depth($list_icon_color);
$list_style   = get_field('feed_list_style', $post_id) ?: 'default';
$list_style   = \App\sanatize_class_depth($list_style);
$fa_ul        = substr( $list_style, 0, 3 ) === "fa-" ? "fa-ul" : '';
@endphp

@if( have_rows('feed_list', $post_id) )
  <div class="list-wrapper list-wrapper-inline list-wrapper-{!! $list_style !!}">
    <ul class="list list-{!! $list_style !!} {!! $fa_ul !!} {!! $list_icon_color !!}">
      @while ( have_rows('feed_list', $post_id) ) @php the_row(); @endphp

        @php
          $args_list = array(
            'context'          => $context,
            'fa_ul'            => $fa_ul,
            'icon'             => get_sub_field('feed_list_icon', $post_id) ?: '', // not yet set.
            'headline'         => get_sub_field('feed_list_headline', $post_id) ?: '',
            'text'             => get_sub_field('feed_list_text', $post_id) ?: '',
          );
        @endphp

        @includeIf('sections.list.list-item', $args_list)

      @endwhile
    </ul>
  </div>
@endif
