@php
$context     = 'section footer';

// Size
//$hl_size     = get_field('headline_size_section_footer');
//$hl_size     = \App\sanatize_class_depth($hl_size);
$col_class   = get_field('col_class_section_footer') ?: 'col-12';
$col_class   = \App\sanatize_class_depth($col_class);

// Align
$text_align  = get_field('text_align_section_footer');
$text_align  = \App\sanatize_class_depth($text_align);

// Row
$row_align   = get_field('row_align_section_footer') ?: array();
$row_justify = get_field('row_justify_section_footer') ?: array();
$row_classes = array_merge($row_justify, $row_align);
$row_classes = \App\sanatize_class_depth($row_classes);

// Spacing
$padding     = get_field('footer_padding') ?: array('pt-2');
$margin      = get_field('footer_margin') ?: array();
$spacing     = array_merge($margin,$padding);
$spacing     = \App\sanatize_class_depth($spacing);

// Footer content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-footer'));
$class_text     = \App\sanatize_class_depth(array('text-footer','text'));

// Headline content
$htag         = get_field('footer_headline_tag') ?: 'h2';
$style        = get_field('footer_headline_style');
$sup_headline = get_field('footer_superheadline');
$headline     = get_field('footer_headline');
$sub_headline = get_field('footer_subheadline');
$text         = get_field('footer_text');

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
@endphp

@if( ! empty( $headline ) || ! empty( $text ) || have_rows('footer_link_items') )
  <footer class="footer-content {{ $style }} {!! $spacing !!} {!! $text_align !!}">
    <div class="container">
      <div class="row {!! $row_classes !!}">
        <div class="col col-footer {!! $col_class !!}">

          @if( ! empty( $headline ) )
            @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
          @endif

          @if( ! empty( $text ) )
            @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
          @endif

          @includeIf('sections.footer.section-footer-links', array('context' => $context))

        </div>
      </div>
    </div>
  </footer>
@endif
