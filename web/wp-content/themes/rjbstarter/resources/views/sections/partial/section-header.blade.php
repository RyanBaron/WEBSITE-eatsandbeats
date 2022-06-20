@php
$display       = get_field('section_header_display');
$sec_header_row_align       = get_field('section_header_row_align');
$section_header_width       = get_field('section_header_width') ?: 'col-12 col-md-8 col-lg-6';
$headline_font_weight      = get_field('section_headline_font_weight');
$section_header_align       = get_field('section_header_align');
$headline_size      = get_field('headline_size');
$args_headline   = isset($args['section_headline']) && is_array($args['section_headline']) ? $args['headline'] : array('headline' => array('tag' => 'h2',));

$headline_size = !empty( $headline_size ) ? \App\sanatize_class( $headline_size ) : '';
$section_header_width = !empty( $section_header_width ) ? \App\sanatize_class( $section_header_width ) : '';
$source = isset( $source ) ? $source : 'default';

$args_headline['source'] = $source;
$args_text = array(
  'source' => $source,
);
@endphp

@if( 'disabled' !== $display )
  <header class="header header-section {{ $display }}">
    <div class="row flex-row {!! App::sanatize_attrs($sec_header_row_align) !!} {{ $headline_font_weight }} {{ $section_header_align }} {!! $headline_size !!}">
      <div class="{!! App::context_class('col', $context) !!} {!! $section_header_width !!}">
        @includeIf('sections.partial.headline', array('context' => $context, 'args' => $args_headline))
        @includeIf('sections.partial.text', array('context' => $context, 'args' => $args_text))
      </div>
    </div>
  </header>
@endif
