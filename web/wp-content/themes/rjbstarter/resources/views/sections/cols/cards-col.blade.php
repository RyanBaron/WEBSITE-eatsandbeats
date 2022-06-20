@php
$context = isset( $context ) && ! empty( $context ) ? $context : 'cards';
$analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';

$default_col_padding = get_field('default_col_padding', 'options') ?: array();
$default_col_margin  = get_field('default_col_margin', 'options') ?: array();
$col_padding        = get_field('col_cards_padding') ?: $default_col_padding;
$col_margin         = get_field('col_cards_margin') ?: $default_col_margin;
$col_spacing_class  = array_merge($col_padding, $col_margin);
$col_spacing_class  = \App\sanatize_class_depth($col_spacing_class);

// Card column sizing and order settings
$col_order          = get_field('col_cards_col_order') ?: array();
$col_class          = get_field('col_cards_col_class') ?: array('col-12', 'col-lg-6');
$col_class          = array_merge($col_order, $col_class);
$col_class          = \App\sanatize_class_depth($col_class);

// Card column headline
$cards_col_headline = get_field('headline_col_cards') ?: '';
$col_headline_align = get_field('headline_col_cards_align') ?: array();
$col_headline_align = \App\sanatize_class_depth($col_headline_align);

// Card items row settings
$row_align          = get_field('col_cards_row_align') ?: array();
$row_justify        = get_field('col_cards_row_justify') ?: array();
$row_align_class    = array_merge($row_align, $row_justify);
$row_align_class    = \App\sanatize_class_depth($row_align_class);

// Card column padding and alignment settings
$text_align_default = get_field('section_text_align') ?: array();
$text_align         = get_field('col_cards_text_align') ?: array();
$text_align         = ! empty( $text_align ) ? $text_align : $text_align_default;
$col_inside_class   = \App\sanatize_class_depth($text_align);

$card_col_padding   = get_field('card_col_padding') ?: array('');
$card_col_margin    = get_field('col_cards_col_margin') ?: array();
$col_card_class     = array_merge($card_col_padding, $card_col_margin);
$col_card_class     = \App\sanatize_class_depth($col_card_class);

// Card headline size
$card_headline_size  = get_field('card_headline_size');
$card_headline_class = \App\sanatize_class_depth($card_headline_size);

// Card col padding
$card_col_inside_padding = get_field('card_col_inside_padding') ?: array('py-2');
$card_col_inside_padding = \App\sanatize_class_depth($card_col_inside_padding);

// Card vertical alignment/justify
$card_body_justify = get_field('card_body_justify') ?: 'justify-content-between';
$card_body_justify = \App\sanatize_class_depth($card_body_justify);
$card_body_header_justify = get_field('card_body_header_justify') ?: 'justify-content-md-start';
$card_body_header_justify = \App\sanatize_class_depth($card_body_header_justify);

// Card image settings
$default_card_img_style = array('image', 'img-fluid', 'figure-img');
$card_img_array         = get_field('card_image_style') ?: array();
$card_figure_array      = get_field('card_figure_style') ?: array();
$card_img_classes       = array_merge($default_card_img_style, $card_img_array, array('card-img-top'));
$card_image_class       = \App\sanatize_class_depth($card_img_classes);
$card_image_size        = get_field('card_image_size') ?: 'full';
$figure['class']        = is_array( $card_figure_array ) ? \App\sanatize_class_depth(array_merge( array('w-100'), $card_figure_array)) : 'w-100';

$card_img_icon_array    = get_field('card_image_icon') ?: array();
$card_img_icon_class    = \App\sanatize_class_depth($card_img_icon_array);
$card_flex_class        = ('icon-image-left' == $card_img_icon_class)
                          || ('icon-image-lg-left' == $card_img_icon_class)
                          || ('icon-image-xl-left' == $card_img_icon_class)
                          || ('icon-image-xxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxxxl-left' == $card_img_icon_class)
                          ? 'flex-row' : 'flex-column';

$card_flex_class        = ('icon-image-right' == $card_img_icon_class)
                          || ('icon-image-lg-right' == $card_img_icon_class)
                          || ('icon-image-xl-right' == $card_img_icon_class)
                          || ('icon-image-xxl-right' == $card_img_icon_class)
                          || ('icon-image-xxxl-right' == $card_img_icon_class)
                          ? 'flex-row flex-row-reverse' : $card_flex_class;

// Card video settings
$card_video_array      = get_field('card_video_style');
$card_video_class      = \App\sanatize_class_depth($card_video_array);

// Card algin settings
$card_text_align_array = get_field('card_text_align');
$card_text_align_class = \App\sanatize_class_depth($card_text_align_array);

$card_link_type        = get_field('card_link_type') ?: '';

$card_type             = get_field('card_type') ?: '';
$card_style_array      = get_field('card_style') ?: array();
$card_style_class      = \App\sanatize_class_depth($card_style_array);

$card_list_style_array = get_field('card_list_style') ?: array();
$card_list_style_class = \App\sanatize_class_depth($card_list_style_array);

$card_bg_array         = get_field('card_bg') ?: array();
$card_bg_class         = \App\sanatize_class_depth($card_bg_array);

$card_col_class        = get_field('card_col_class');
$card_col_class        = \App\sanatize_class_depth($card_col_class);

$card_col_gutter       = get_field('card_column_gutters');
$card_col_gutter       = \App\sanatize_class_depth($card_col_gutter);

$htag_card              = get_field('card_headline_tag') ?: 'h4';

// Cards Col Headline content
$htag_cards_col         = get_field('cards_col_headline_tag') ?: 'h2';
$style_cards_col        = get_field('cards_col_headline_style');
$sup_headline_cards_col = get_field('cards_col_superheadline');
$headline_cards_col     = get_field('cards_col_headline');
$sub_headline_cards_col = get_field('cards_col_subheadline');

$class_card_col_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-cards'));

$args_cards_col_headline = array(
  'superheadline' => $sup_headline_cards_col,
  'headline'      => $headline_cards_col,
  'subheadline'   => $sub_headline_cards_col,
  'tag'           => $htag_cards_col,
  'class'         => $class_card_col_headline
);

$card_headline_style = get_field('card_headline_style');

@endphp

@if( have_rows('card_items') )
  <div class="col col-cards {!! $col_class !!} {!! $col_spacing_class !!} {!! $card_list_style_class !!}">
    <div class="col-inside col-inside-cards {!! $col_inside_class !!} list-{!! $card_type !!}">
      @if( $sup_headline_cards_col || $headline_cards_col || $sub_headline_cards_col )
        <div class="col-header col-cards-header w-100 mb-2 {!! $col_headline_align !!}">
          @includeIf('elements.headline', array('context' => $context, 'args' => $args_cards_col_headline))
        </div>
      @endif

      <div class="row flex-row row-cards {!! $row_align_class !!} {!! $card_col_gutter !!}">
        @while ( have_rows('card_items') ) @php the_row(); @endphp
          @php
            $icon_bg_style = get_field('icon_bg_style');
            $icon_bg_wrapper_style = isset( $icon_bg_style ) && ! empty( $icon_bg_style ) ? 'col-inside-' . $icon_bg_style : '';
            $icon_bg_shadow = get_field('icon_bg_shadow');
            $icon_wrapper_inner_height = get_field('icon_wrapper_inner_height');
            $icon_bg_color = get_field('icon_bg_color');
            $icon_color = get_field('icon_color');
            $icon_position = get_field('icon_position');
            $icon_position_class = ! empty( $icon_position ) ? 'col-inside-'.$icon_position : '';
            $icon_size = get_field('icon_size');
            $icon_size_class = ! empty( $icon_size ) ? 'col-inside-'.$icon_size : '';
            $icons_class = get_sub_field('icon');

            $image = array(
              'id' => get_sub_field('image') ?: '',
              'size' => $card_image_size,
              'class' => $card_image_class,
            );

            $icon = array(
              'position'  => $icon_position,
              'size'      => $icon_size,
              'color'     => $icon_color,
              'bg_color'  => $icon_bg_color,
              'bg_shadow' => $icon_bg_shadow,
              'bg_style'  => $icon_bg_style,
              'class'     => $icons_class,
              'wrapper_height' => $icon_wrapper_inner_height,
            );

            $links        = get_sub_field('card_link_items') ?: array();
            $wrapper_link = false; // Set this to true if the entire card is clickable
            $wrapper_link_hide_btn = false; // Set this to true if the entire card is clickable and the button/link should be hidden
            $display_post_card_link = false; // Set this to true if the entire card is clickable and the button/link should be hidden

            $text       = get_sub_field('text') ?: '';
            $quote      = get_sub_field('quote') ?: '';

            $superheadline = get_sub_field('superheadline') ?: '';
            $headline      = get_sub_field('headline') ?: '';
            $subheadline   = get_sub_field('subheadline') ?: '';

            $video_type = get_sub_field('video_type') ?: '';
            $video_id   = get_sub_field('video_id') ?: '';
            $embed      = '';

            $args_headline = array(
              'superheadline' => $superheadline,
              'headline'      => $headline,
              'subheadline'   => $subheadline,
              'tag'           => $htag_card,
              'class'         => array('headline', 'headline-col', 'headline-col-cards', $card_headline_style)
            );
            $args_text = array(
              'text'  => $text,
              'class' => 'card-text',
            );
            $args_video = array(
              'video_type'  => $video_type,
              'video_id'    => $video_id,
              'video_class' => $card_video_class,
            );

            $card_image_icon_class = ! empty( $card_img_icon_class ) ? 'card-' . $card_img_icon_class : '';

            $card_class_custom = get_sub_field('card_class_custom');
            $card_class_custom  = \App\sanatize_class_depth($card_class_custom);
          @endphp

          @if ( 'card-link' === $card_link_type || 'card-link-hidden' === $card_link_type )
            @php $wrapper_link = true; @endphp
          @endif

          @if ( 'card-link-hidden' === $card_link_type || 'post-card-link' === $card_link_type )
            @php $wrapper_link_hide_btn = true; @endphp
          @endif

          @if ( 'post-card-link' === $card_link_type )
            @php $display_post_card_link = true; @endphp
          @endif

          <div class="col col-card {!! $card_col_class !!} {{ $col_card_class }} {!! $card_class_custom !!}">
            <div class="col-inside col-inside-card h-100 {!! $card_col_inside_padding !!} {!! $icon_size_class !!} {!! $icon_position_class !!} {!! $icon_bg_wrapper_style !!}">
              @if( $wrapper_link )
                @includeIf('sections.cols.links.card-wrapper-link-open')
              @endif
              <div class="card h-100 d-flex flex-column justify-content-md-between {{ $card_type }} {!! $card_style_class !!} {!! $card_text_align_class !!} {!! $card_headline_class !!} {{ $card_image_icon_class }} {{ $card_bg_class }}">
                @if( ! empty( $image ) || ! empty( $headline ) || ! empty( $subheadline ) || !empty( $subheadline ) || ! empty( $quote ) || ! empty( $text ) )
                  <div class="wrapper-card-content d-flex justify-content-md-between h-100 {{ $card_flex_class }}">

                    @if( ! empty( $image['id'] ) )
                      @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
                    @endif

                    @if( isset($args_video['video_type']) && ! empty( $args_video['video_type'] ) )
                      @includeIf('elements.video', array('context' => $context, 'args' => $args_video))
                    @endif

                    @if( ! empty( $headline ) || ! empty( $text ) || ! empty( $icon['class'] ) || ( $links && ! $wrapper_link_hide_btn ) )
                      <div class="card-body d-flex flex-column h-100 {!! $card_body_justify !!}">

                        @if( ! empty( $icon['class'] ) )
                          @includeIf('elements.icon', array('context' => $context, 'icon' => $icon))
                        @endif

                        @if( ! empty( $headline ) || ! empty( $text ) )
                          <div class="d-flex flex-column h-100 {!! $card_body_header_justify !!}">
                            @if( ! empty( $headline ) )
                              @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
                            @endif

                            @if( ! empty( $text ) )
                              @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
                            @endif
                          </div>
                        @endif

                        @if( ! $wrapper_link_hide_btn )
                          @includeIf('sections.cols.links.card-links', array('context' => $context, 'wrapper_link' => $wrapper_link))
                        @endif

                      </div>
                    @endif
                  </div>
                @endif
              </div>

              @if( $display_post_card_link )
                @includeIf('sections.cols.links.card-links', array('context' => $context, 'wrapper_link' => $wrapper_link))
              @endif

              @if( $wrapper_link )
                @includeIf('sections.cols.links.card-wrapper-link-close')
              @endif
            </div>
          </div>
        @endwhile
      </div>

    </div>
  </div>
@endif
