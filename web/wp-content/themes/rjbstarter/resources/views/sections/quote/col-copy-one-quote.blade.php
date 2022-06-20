@php
$context = '';
$quote_display       = get_field('col_copy_one_quote_display');
$image_size_default  = get_field('quote_inline_default_quote_image_size', 'options') ?: '';
$image_shape_default = get_field('quote_inline_default_quote_image_shape', 'options') ?: '';
$logo_size_default   = get_field('quote_inline_default_quote_logo_size', 'options') ?: '';
$image_size          = get_field('quote_image_size') ?: $image_size_default;
$image_shape         = get_field('quote_image_shape') ?: $image_shape_default;
$logo_size           = get_field('quote_logo_size') ?: $logo_size_default;

$quote_display_class =  \App\sanatize_class_depth($quote_display);
$quote_display_class = ! empty( $quote_display_class ) ? 'quote-'.$quote_display_class : '';
@endphp

@if( $quote_display && have_rows('col_copy_one_quote_items') )
  <div class="quotes-wrapper quotes-wrapper-inline {!! $quote_display_class !!}">
    @while ( have_rows('col_copy_one_quote_items') ) @php the_row(); @endphp

      @php
        $args_quote = array(
          'context'           => $context,
          'quote'             => get_sub_field('quote') ?: '',
          'name'              => get_sub_field('name') ?: '',
          'company'           => get_sub_field('company') ?: '',
          'position'          => get_sub_field('position') ?: '',
          'quote_logo_id'     => get_sub_field('quote_logo') ?: '',
          'quote_image_id'    => get_sub_field('quote_image') ?: '',
          'quote_image_shape' => $image_shape,
          'quote_image_size'  => $image_size,
          'quote_logo_size'   => $logo_size,
        );
      @endphp

      @includeIf('sections.quote.quote-col-inline', $args_quote)

    @endwhile
  </div>
@endif
