@if( have_rows('col_copy_one_link_items') )
  @php
  $link_size  = get_field('col_copy_one_link_size');
  $link_hide  = get_field('col_copy_one_link_hide');
  $link_hide  = \App\sanatize_class_depth($link_hide);
  $link_align = get_field('col_copy_one_link_align');
  $link_align = \App\sanatize_class_depth($link_align);
  $link_order = get_field('col_copy_one_link_order');
  $link_order = \App\sanatize_class_depth($link_order);
  @endphp

  <div class="{!! App::context_class('buttons', $context) !!} {{ $link_align }} {{ $link_hide }} {!! $link_order !!}">
    @while ( have_rows('col_copy_one_link_items') ) @php the_row(); @endphp
      @php
      $link               = get_sub_field('col_copy_one_link') ?: array();
      $link_options       = get_sub_field('col_copy_one_link_options') ?: ''; // check on this item
      $link_style         = get_sub_field('col_copy_one_link_style') ?: '';
      $link_button_style  = get_sub_field('col_copy_one_button_style') ?: '';
      $link_text_style    = get_sub_field('col_copy_one_text_style') ?: '';
      $link_font_weight   = get_sub_field('col_copy_one_link_font_weight') ?: ''; // check on this item
      $link_icon          = get_sub_field('col_copy_one_link_icon') ?: ''; // check on this item
      $link_icon_position = get_sub_field('col_copy_one_link_icon_position') ?: ''; // check on this item
      $link_data_g_action = get_sub_field('col_copy_one_data_g_action') ?: '';
      $link_data_g_label  = get_sub_field('col_copy_one_data_g_label') ?: '';
      @endphp

      @if( $link )
        @includeIf('elements.link', array(
          'link'         => $link,
          'link_options' => $link_options,
          'link_style'   => $link_style,
          'font_weight'  => $link_font_weight,
          'button' => array(
            'style' => $link_button_style,
            'size'  => $link_size,
          ),
          'text' => array(
            'style' => $link_text_style,
            'size'  => $link_size,
          ),
          'data' => array(
            'g_action' => $link_data_g_action,
            'g_label'  => $link_data_g_label,
          ),
          'icon' => array(
            'class'    => $link_icon,
            'position' => $link_icon_position
          )
        ) )
      @endif
    @endwhile
  </div>

@endif
