@php
$context     = '';

// Size
$hl_size     = get_field('headline_size_section_header');
$hl_size     = \App\sanatize_class_depth($hl_size);
$col_class   = get_field('col_class_section_header') ?: 'col-12';
$col_class   = \App\sanatize_class_depth($col_class);

// Align
$text_align  = get_field('text_align_section_header');
$text_align  = \App\sanatize_class_depth($text_align);

// Row
$row_align   = get_field('row_align_section_header') ?: array();
$row_justify = get_field('row_justify_section_header') ?: array();
$row_classes = array_merge($row_justify, $row_align);
$row_classes = \App\sanatize_class_depth($row_classes);

// Spacing
$padding     = get_field('header_padding') ?: array('pb-2');
$margin      = get_field('header_margin') ?: array();
$spacing     = array_merge($margin,$padding);
$spacing     = \App\sanatize_class_depth($spacing);

// Header content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-header'));
$class_text     = \App\sanatize_class_depth(array('text','text-header'));

// Headline content
$htag         = get_field('header_headline_tag') ?: 'h2';
$style        = get_field('header_headline_style');
$sup_headline = get_field('header_superheadline');
$headline     = get_field('header_headline');
$sub_headline = get_field('header_subheadline');
$text         = get_field('header_text');

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

$pre_header_headline_figure = isset($pre_header_headline_figure) && is_array($pre_header_headline_figure) ? $pre_header_headline_figure : array();
$pre_header_headline_figure['class'][] = get_field('header_headline_pre_headline_image_width') ?: 'w-100';
$pre_header_headline_figure['class'][] = get_field('header_headline_pre_headline_image_padding') ?: '';
$pre_header_headline_figure['class'][] = 'headline-figure';
$pre_header_headline_figure['class'][] = 'pre-headline-figure';

$default_style = array('image', 'img-fluid', 'figure-img', 'headline-img');
$img_classes = array_merge($default_style, array());

$pre_header_headline_image = array(
  'id' => get_field('header_headline_pre_headline_image') ?: '',
  'size' => get_field('header_headline_pre_headline_image_size') ?: 'full',
  'class' => $img_classes,
);
@endphp

@if( ! empty( $headline ) || ! empty( $text ) || ! empty( $sub_headline ) || ! empty( $sup_headline ) || ! empty( get_field('header_headline_pre_headline_image') ) )
  <header class="header-content {{ $style }} {!! $spacing !!} {!! $text_align !!} {!! $hl_size !!}">
    <div class="container">
      <div class="row flex-row {!! $row_classes !!}">
        <div class="col col-header {!! $col_class !!}">
          <div class="col-inside col-inside-header">

            @includeIf('elements.figure', array('context' => $context, 'figure' => $pre_header_headline_figure, 'image' => $pre_header_headline_image))


            @if( ! empty( $headline ) || ! empty( $sub_headline ) || ! empty( $sup_headline ) )
              @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
            @endif

            @if( ! empty( $text ) )
              @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
            @endif

          </div>
        </div>
      </div>
    </div>
  </header>
@endif
