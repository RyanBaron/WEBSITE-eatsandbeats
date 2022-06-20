@if( have_rows('footer_link_items') )

  @php
  $link_size  = get_field('footer_link_size');
  $link_hide  = get_field('footer_link_hide');
  $link_hide  = \App\sanatize_class_depth($link_hide);
  $link_align = get_field('footer_link_align');
  $link_align = \App\sanatize_class_depth($link_align);
  @endphp

  <div class="{!! App::context_class('buttons', $context) !!} {{ $link_align }} {{ $link_hide }}">
    @while ( have_rows('footer_link_items') ) @php the_row(); @endphp
      @php
      $link               = get_sub_field('footer_link') ?: array();
      $link_options       = get_sub_field('link_options') ?: '';
      $link_style         = get_sub_field('footer_link_style') ?: '';
      $link_data_context  = get_sub_field('footer_link_data_context') ?: '';
      $link_button_style  = get_sub_field('footer_button_style') ?: '';
      $link_text_style    = get_sub_field('footer_text_style') ?: '';
      $link_font_weight   = get_sub_field('font_weight') ?: '';
      $link_icon          = get_sub_field('footer_link_icon') ?: '';
      $link_icon_position = get_sub_field('footer_link_icon_position') ?: '';
      $link_data_g_action = get_sub_field('data_g_action') ?: '';
      $link_data_g_label  = get_sub_field('data_g_label') ?: '';
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
            'size' => $link_size,
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
