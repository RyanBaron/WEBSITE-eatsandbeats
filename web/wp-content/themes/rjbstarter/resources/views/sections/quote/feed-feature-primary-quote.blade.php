@php
$context             = isset($context) && ! empty($context) ? $context : 'feed';
$post_id             = isset($post_id) && ! empty($post_id) ? $post_id : '';
// $quote_display       = get_field('quote_feed_display');
$image_size_default  = get_field('quote_inline_default_quote_image_size', 'options') ?: '';
$image_shape_default = get_field('quote_inline_default_quote_image_shape', 'options') ?: '';
$logo_size_default   = get_field('quote_inline_default_quote_logo_size', 'options') ?: '';
$image_size          = get_field('quote_feed_image_size') ?: $image_size_default;
$image_shape         = get_field('quote_feed_image_shape') ?: $image_shape_default;
$logo_size           = get_field('quote_feed_logo_size') ?: $logo_size_default;
@endphp

<div class="quotes-wrapper quotes-wrapper-inline">
  @php
    $args_quote = array(
      'context'           => $context,
      'quote'             => get_field('quote_feed_text', $post_id) ?: '',
      'name'              => get_field('quote_feed_name', $post_id) ?: '',
      'company'           => get_field('quote_feed_company', $post_id) ?: '',
      'position'          => get_field('quote_feed_position', $post_id) ?: '',
      'quote_logo_id'     => get_field('quote_feed_logo', $post_id) ?: '',
      'quote_image_id'    => get_field('quote_feed_image', $post_id) ?: '',
      'quote_image_shape' => $image_shape,
      'quote_image_size'  => $image_size,
      'quote_logo_size'   => $logo_size,
    );
  @endphp

  @includeIf('sections.quote.quote-col-inline', $args_quote)
</div>
