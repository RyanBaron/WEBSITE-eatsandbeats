<?php
$context = '';
$quote_display       = get_field('col_copy_one_quote_display');
$image_size_default  = get_field('quote_inline_default_quote_image_size', 'options') ?: '';
$image_shape_default = get_field('quote_inline_default_quote_image_shape', 'options') ?: '';
$logo_size_default   = get_field('quote_inline_default_quote_logo_size', 'options') ?: '';
$image_size          = get_field('quote_image_size') ?: $image_size_default;
$image_shape         = get_field('quote_image_shape') ?: $image_shape_default;
$logo_size           = get_field('quote_logo_size') ?: $logo_size_default;
?>

<?php if( $quote_display && have_rows('col_copy_one_quote_items') ): ?>
  <div class="quotes-wrapper quotes-wrapper-inline">
    <?php while( have_rows('col_copy_one_quote_items') ): ?> <?php the_row(); ?>

      <?php
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
      ?>

      <?php if ($__env->exists('sections.quote.quote-col-inline', $args_quote)) echo $__env->make('sections.quote.quote-col-inline', $args_quote, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php endwhile; ?>
  </div>
<?php endif; ?>
