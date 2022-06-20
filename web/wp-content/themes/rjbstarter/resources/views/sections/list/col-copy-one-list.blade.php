@php
$context      = '';
$list_display = get_field('col_copy_one_list_display');
$list_icon_color = get_field('col_copy_one_list_icon_color') ?: '';
$list_icon_color = \App\sanatize_class_depth($list_icon_color);
$list_style   = get_field('col_copy_one_list_style') ?: 'default';
$list_style   = \App\sanatize_class_depth($list_style);
$fa_ul        = substr( $list_style, 0, 3 ) === "fa-" ? "fa-ul" : '';
$list_tag     = ( 'ordered-indent' == $list_style ) || ( 'ordered' == $list_style ) ? 'ol' : 'ul';
@endphp
@if( 'show' == $list_display && have_rows('col_copy_one_list_items') )
  <div class="list-wrapper list-wrapper-inline list-wrapper-{!! $list_style !!}">
    <{{$list_tag}} class="list list-{!! $list_style !!} {!! $fa_ul !!} {!! $list_icon_color !!}">
      @while ( have_rows('col_copy_one_list_items') ) @php the_row(); @endphp

        @php
          $args_list = array(
            'context'          => $context,
            'fa_ul'            => $fa_ul,
            'icon'             => get_sub_field('list_item_icon') ?: '',
            'headline'         => get_sub_field('list_item_headline') ?: '',
            'text'             => get_sub_field('list_item_text') ?: '',
          );
        @endphp

        @includeIf('sections.list.list-item', $args_list)

      @endwhile
    </{{$list_tag}}>
  </div>
@endif
