@php
$col_order       = get_field('col_gated_order') ?: array();
$col_size        = get_field('col_gated_col_class') ?: array();
$col_text_align  = get_field('col_gated_text_align') ?: array();
$class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
$class           = \App\sanatize_class_depth( $class );
$gated_form_id   = get_field('col_gated_mkto_form_id') ?: '';

$default_col_padding = get_field('default_col_padding', 'options') ?: array();
$default_col_margin  = get_field('default_col_margin', 'options') ?: array();
$col_padding         = get_field('col_gated_padding') ?: $default_col_padding;
$col_margin          = get_field('col_gated_margin') ?: $default_col_margin;
$col_spacing_class   = array_merge($col_padding, $col_margin);
$col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);

$analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
$context           = isset($context) && ! empty($context) ? $context : 'gated';
$context_buttons   = array_merge($context, array('footer'));

// Headline content
$htag         = get_field('col_gated_headline_tag') ?: 'h2';
$style        = get_field('col_gated_headline_style');
$sup_headline = get_field('col_gated_superheadline');
$headline     = get_field('col_gated_headline');
$sub_headline = get_field('col_gated_subheadline');

// Text content
$text         = get_field('col_gated_text');

// Footer content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-gated', $style));
$class_text     = \App\sanatize_class_depth(array('text', 'text-col', 'gated-col', 'order-first'));

$args_headline = array(
  'superheadline' => $sup_headline,
  'headline'      => $headline,
  'subheadline'   => $sub_headline,
  'tag'           => $htag,
  'class'         => $class_headline
);

$args_text = array(
  'text'  => $text,
  'class' => $class_text
);

$pre_headline_figure = isset($pre_headline_figure) && is_array($pre_headline_figure) ? $pre_headline_figure : array();
$pre_headline_figure['class'][] = get_field('col_gated_pre_headline_image_width') ?: 'w-100';
$pre_headline_figure['class'][] = 'headline-figure';
$pre_headline_figure['class'][] = 'pre-headline-figure';

$default_style = array('image', 'img-fluid', 'figure-img', 'headline-img');
$img_classes = array_merge($default_style, array());

$pre_headline_image = array(
  'id' => get_field('col_gated_pre_headline_image') ?: '',
  'size' => get_field('col_gated_pre_headline_image_size') ?: 'full',
  'class' => $img_classes,
);

$post_headline_figure = isset($post_headline_figure) && is_array($post_headline_figure) ? $post_headline_figure : array();
$post_headline_figure['class'][] = get_field('col_gated_post_headline_image_width') ?: 'w-100';
$post_headline_figure['class'][] = 'headline-figure';
$post_headline_figure['class'][] = 'post-headline-figure';
$post_headline_image = array(
  'id' => get_field('col_gated_post_headline_image') ?: '',
  'size' => get_field('col_gated_post_headline_image_size') ?: 'full',
  'class' => $img_classes,
);

$default_style   = array('image', 'img-fluid', 'figure-img');
$image_style     = get_field('col_gated_image_style') ?: array();
$img_classes     = array_merge($default_style, $image_style);
$image_overflow  = get_field('col_gated_image_overflow') ?: array();
$figure_classes  = array_merge($image_overflow, array('w-100'));

$gated_form_display_reveal = get_field('col_gated_mkto_form_display_reveal') ?: '';

$image = array(
  'id' => get_field('col_gated_image') ?: '',
  'size' => get_field('col_gated_image_size') ?: 'full',
  'lazy_load' => get_field('col_gated_image_load') ?: 'placeholder',
  'class' => $img_classes,
);
$figure['class'] = $figure_classes;

@endphp

<div class="{!! App::context_class('col', $context) !!} {!! App::sanatize_attrs($class) !!} {!! $col_spacing_class !!}">
  <div class="{!! App::context_class('col-inside', $context) !!} w-100">
    @if( in_array('reveal-form-image-preview', $gated_form_display_reveal) )
      <a href="#show-{{$gated_form_id}}">
    @endif
    @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
    @if( in_array('reveal-form-image-preview', $gated_form_display_reveal) )
      </a>
    @endif
    @if (! empty( $headline ) || ! empty( $text ) || have_rows('col_gated_list_items') || have_rows('col_gated_quote_items') || have_rows('col_gated_link_items'))
      <div class="image-details-wrapper image-details">
        <div class="image-details-inside">
          @includeIf('elements.figure', array('context' => $context, 'figure' => $pre_headline_figure, 'image' => $pre_headline_image))

          @if( ! empty( $headline ) )
            @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
          @endif

          @includeIf('elements.figure', array('context' => $context, 'figure' => $post_headline_figure, 'image' => $post_headline_image))

          @if( ! empty( $text ) || have_rows('col_gated_list_items') || have_rows('col_gated_quote_items') || have_rows('col_gated_link_items') )
            <div class="d-flex flex-column flex-column-wrap">

              @if( ! empty( $text ) )
                @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
              @endif

              @includeIf('sections.quote.col-gated-quote', array('context' => $context, 'args' => array()))

              @includeIf('sections.cols.links.col-gated-links', array('context' => $context))

            </div>
          @endif
        </div>
      </div>
    @endif
  </div>
</div>
