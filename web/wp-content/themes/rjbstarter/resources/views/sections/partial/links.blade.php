@if( have_rows('link_items') )

@php
//$flex_align = get_field('link_items_justify');
$link_align = get_field('link_items_align');
$link_align = \App\sanatize_class_depth($link_align);

@endphp
  <div class="{!! App::context_class('buttons', $context) !!} {{ $link_align }}">
    @while ( have_rows('link_items') ) @php the_row(); @endphp
      @php
      $link               = get_sub_field('link');
      $link_modal         = get_sub_field('link_modal');
      $link_options       = get_sub_field('link_options');
      $link_style         = get_sub_field('link_style');
      $link_button_style  = get_sub_field('button_style');
      $link_button_size   = get_sub_field('button_size');
      $link_text_style    = get_sub_field('text_style');
      $link_font_weight   = get_sub_field('font_weight');
      $link_icon          = get_sub_field('icon');
      $link_icon_position = get_sub_field('icon_position');
      $link_data_g_action = get_sub_field('data_g_action');
      $link_data_g_label  = get_sub_field('data_g_label');
      @endphp

      @if( $link )
        @includeIf('elements.link', array(
          'link' => $link,
          'link_options' => $link_options,
          'link_style' => $link_style,
          'font_weight' => $link_font_weight,
          'button' => array(
            'style' => $link_button_style,
            'size' => $link_button_size,
          ),
          'text' => array(
            'style' => $link_text_style,
          ),
          'data' => array(
            'g_action' => $link_data_g_action,
            'g_label' => $link_data_g_label,
          ),
          'icon' => array(
            'class' => $link_icon,
            'position' => $link_icon_position
          )
        ) )
      @endif
    @endwhile
  </div>
@endif
