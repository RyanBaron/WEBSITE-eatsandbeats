@php
$links      = get_sub_field('card_link_items') ?: array();
@endphp

@if($links)
  @php
  $wrapper_link = isset($wrapper_link) ? $wrapper_link : false;
  $card_link_style = get_field('card_link_style') ?: array();
  $card_button_style = get_field('card_button_style') ?: '';
  $card_link_text_style = get_field('card_link_text_style') ?: '';
  $card_link_options   = get_sub_field('card_link_options') ?: ''; // **Doing Nothing? Revisit.
  $card_link_button_size = get_sub_field('card_button_size') ?: ''; // **Doing Nothing? Revisit.
  $card_link_font_weight = get_sub_field('card_link_font_weight') ?: ''; // **Doing Nothing? Revisit.

  $card_link_icon_default = get_field('card_link_icon_default') ?: '';
  $card_link_icon_pos = get_field('card_link_icon_position') ?: '';
  $card_link_icon_style = get_field('card_link_icon_style') ?: '';

  $card_additional_link_style = get_field('card_additional_link_style') ?: array();
  $card_additional_link_text_style = get_field('card_additional_link_text_style') ?: '';
  $card_additional_button_style = get_field('card_additional_button_style') ?: '';

  // Card link settings
  $card_link_align = get_field('card_link_align') ?: array();
  $card_link_align = \App\sanatize_class_depth($card_link_align);

  $cnt_link = 0;
  @endphp

  <div class="{!! App::context_class('buttons', $context) !!} {{ $card_link_align }}">
    @while ( have_rows('card_link_items') ) @php the_row(); @endphp
      @php
      $link               = get_sub_field('card_link') ?: array();
      $card_link_icon  = get_sub_field('card_link_icon') ?: $card_link_icon_default;

      $link_data_context  = get_sub_field('card_link_data_context') ?: '';
      $link_data_g_action = get_sub_field('card_data_g_action') ?: '';
      $link_data_g_label  = get_sub_field('card_data_g_label') ?: '';
      @endphp

      @if( $cnt_link > 0 )
        @php
          $card_link_style = ! empty( $card_additional_link_style ) ? $card_additional_link_style : $card_link_style;
          $card_link_text_style = ! empty( $card_additional_link_text_style ) ? $card_additional_link_text_style : $card_link_text_style;
          $card_button_style = ! empty( $card_additional_button_style ) ? $card_additional_button_style : $card_button_style;
        @endphp
      @endif

      @if( $link )
        @includeIf('elements.link', array(
          'link'         => $link,
          'link_options' => $card_link_options,
          'link_style'   => $card_link_style,
          'font_weight'  => $card_link_font_weight,
          'wrapper_link' => $wrapper_link,
          'button' => array(
            'style' => $card_button_style,
            'size'  => $card_link_button_size,
          ),
          'text' => array(
            'style' => $card_link_text_style,
          ),
          'data' => array(
            'g_action' => $link_data_g_action,
            'g_label'  => $link_data_g_label,
          ),
          'icon' => array(
            'class'    => $card_link_icon,
            'position' => $card_link_icon_pos,
            'style'    => $card_link_icon_style,
          )
        ) )
      @endif

      @php $cnt_link++; @endphp
    @endwhile
  </div>
@endif
