@php
$context = isset( $context ) && ! empty( $context ) ? $context : 'accordion';
$analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';

$default_col_padding = get_field('default_col_padding', 'options') ?: array();
$default_col_margin  = get_field('default_col_margin', 'options') ?: array();
$col_padding        = get_field('col_accordion_padding') ?: $default_col_padding;
$col_margin         = get_field('col_accordion_margin') ?: $default_col_margin;
$col_spacing_class  = array_merge($col_padding, $col_margin);
$col_spacing_class  = \App\sanatize_class_depth($col_spacing_class);

// Card column sizing and order settings
$col_order          = get_field('col_accordion_col_order') ?: array();
$col_class          = get_field('col_accordion_col_class') ?: array('col-12', 'col-lg-6');
$col_class          = array_merge($col_order, $col_class);
$col_class          = \App\sanatize_class_depth($col_class);

// Card column headline
$accordion_col_headline = get_field('headline_col_accordion') ?: '';
$col_headline_align = get_field('headline_col_accordion_align') ?: array();
$col_headline_align = \App\sanatize_class_depth($col_headline_align);

$accordion_style = get_field('accordion_style') ?: array();
$accordion_style = \App\sanatize_class_depth($accordion_style);

// Cards Col Headline content
$htag_accordion_col         = get_field('accordion_col_headline_tag') ?: 'h2';
$style_accordion_col        = get_field('accordion_col_headline_style');
$sup_headline_accordion_col = get_field('accordion_col_superheadline');
$headline_accordion_col     = get_field('accordion_col_headline');
$sub_headline_accordion_col = get_field('accordion_col_subheadline');
$accordion_bg_title = get_field('accordion_bg_title');
$accordion_bg_content = get_field('accordion_bg_content');
$accordion_content_styles = get_field('accordion_content_styles');
$accordion_content_styles = \App\sanatize_class_depth($accordion_content_styles);
$accordion_title_styles = get_field('accordion_title_styles');
$accordion_title_styles = \App\sanatize_class_depth($accordion_title_styles);

$accordion_id = 'accordion-' . \App\getRandId(6);

$class_card_col_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-accordion'));

$args_accordion_col_headline = array(
  'superheadline' => $sup_headline_accordion_col,
  'headline'      => $headline_accordion_col,
  'subheadline'   => $sub_headline_accordion_col,
  'tag'           => $htag_accordion_col,
  'class'         => $class_card_col_headline
);

$data_parent = '';

$enable_multi_open       = get_field('accordion_enable_multi_open') ?: false;
$accordion_title_leading_chevron = get_field('accordion_title_leading_chevron') ? '<span class="accordion-leading-icon"><i class="fal fa-chevron-down"></i></span>': '';

if ( ! $enable_multi_open ) :
  $data_parent = 'data-parent="#'.$accordion_id.'"';
endif;

$htag_title = empty( $accordion_style ) ? 'strong' : 'h5';
$htag_title = ('accordion-faq-lg' == $accordion_style) ? 'h4' : $htag_title;
$title_hl_size = empty( $accordion_style ) ? 'hl-xxs' : 'hl-xxs';
$title_hl_size = ('accordion-faq-lg' == $accordion_style) ? 'hl-xs' : $title_hl_size;

$htag_content = empty( $accordion_style ) ? 'h5' : 'h5';
$htag_content = ('accordion-faq-lg' == $accordion_style) ? 'h4' : $htag_content;
$content_hl_size = empty( $accordion_style ) ? 'hl-xs' : 'hl-xs';
$content_hl_size = ('accordion-faq-lg' == $accordion_style) ? 'hl-xs' : $content_hl_size;
@endphp

@if( have_rows('accordion_items') )
  <div class="col col-accordion {!! $col_class !!} {!! $col_spacing_class !!}">
    <div class="col-inside col-inside-accordion">
      @if( $sup_headline_accordion_col || $headline_accordion_col || $sub_headline_accordion_col )
        <div class="col-header col-accordion-header w-100 {!! $col_headline_align !!}">
          @includeIf('elements.headline', array('context' => $context, 'args' => $args_accordion_col_headline))
        </div>
      @endif

      <div id="{{ $accordion_id }}" class="accordion {!! $accordion_style !!}">

        @while ( have_rows('accordion_items') ) @php the_row(); @endphp
          @php
            $title      = get_sub_field('title') ?: '';
            $text       = get_sub_field('text') ?: '';
            $initial_state = get_sub_field('accordion_initial_state') ?: '';
            $initial_title_state = 'show' == $initial_state ? '' : 'collapsed';

            $superheadline = get_sub_field('superheadline') ?: '';
            $headline      = get_sub_field('headline') ?: '';
            $subheadline   = get_sub_field('subheadline') ?: '';

            $args_headline = array(
              'superheadline' => $superheadline,
              'headline'      => $headline,
              'subheadline'   => $subheadline,
              'tag'           => $htag_content,
              'class'         => array('headline', 'headline-col', 'headline-col-accordion')
            );
            $args_text = array(
              'text'  => $text,
            );
            $title_id  = sanitize_html_class(str_replace(' ', '-', strtolower(trim($title))));
            $data_action  = 'accordion: ' . substr(\App\sanatize_class_depth(strtolower(trim($title))), 0, 20);
          @endphp

          @if( ! empty( $title ) && ( ! empty( $headline ) || ! empty( $text ) ) )
            <div class="card">
              <div class="card-header card-header-accordion {!! $title_hl_size !!} {{ $accordion_bg_title }} {!! $accordion_title_styles !!}">
                <a class="accordion-link {{ $initial_title_state }}" data-toggle="collapse" href="#{{$title_id}}" data-g-action="{{$data_action}}" data-g-label="accordion item">
                  <{{$htag_title}} class="headline">{!! $accordion_title_leading_chevron !!} {!!  $title !!}</{{$htag_title}}>
                </a>
              </div>
              <div id="{{$title_id}}" class="collapse {{ $initial_state }} {{ $accordion_bg_content }} {!! $accordion_content_styles !!}" {!! $data_parent !!}>
                <div class="card-body accordion-card-body {!! $content_hl_size !!}">
                  <div class="d-flex flex-column h-100">
                    @if( ! empty( $headline ) )
                      @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
                    @endif

                    @if( ! empty( $text ) )
                      @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endwhile
      </div>

    </div>
  </div>
@endif
