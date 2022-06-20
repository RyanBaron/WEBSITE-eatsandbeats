<?php
$col_order       = get_field('col_copy_one_order') ?: array();
$col_size        = get_field('col_copy_one_col_class') ?: array();
$col_text_align  = get_field('col_copy_one_text_align') ?: array();
$class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
$class           = \App\sanatize_class_depth( $class );

$default_col_padding = get_field('default_col_padding', 'options') ?: array();
$default_col_margin  = get_field('default_col_margin', 'options') ?: array();
$col_padding         = get_field('col_copy_one_padding') ?: $default_col_padding;
$col_margin          = get_field('col_copy_one_margin') ?: $default_col_margin;
$col_spacing_class   = array_merge($col_padding, $col_margin);
$col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);

// Spacing
//$padding         = get_field('col_copy_one_padding') ?: array();
//$margin          = get_field('col_copy_one_margin') ?: array();
//$spacing         = array_merge($margin,$padding);
//$spacing         = \App\sanatize_class_depth($spacing);

$analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
$context           = isset($context) && ! empty($context) ? $context : 'copy';
$context_buttons   = array_merge($context, array('footer'));

// Headline content
$htag         = get_field('col_copy_one_headline_tag') ?: 'h2';
$style        = get_field('col_copy_one_headline_style');
$sup_headline = get_field('col_copy_one_superheadline');
$headline     = get_field('col_copy_one_headline');
$sub_headline = get_field('col_copy_one_subheadline');

// Text content
$text         = get_field('col_copy_one_text');

// Footer content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-copy'));
$class_text     = \App\sanatize_class_depth(array('text', 'text-col', 'text-col-copy', 'order-first'));

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

?>

<div class="<?php echo App::context_class('col', $context); ?> <?php echo App::sanatize_attrs($class); ?> <?php echo $col_spacing_class; ?>">
  <div class="<?php echo App::context_class('col-inside', $context); ?> w-100">

    <?php if( ! empty( $headline ) ): ?>
      <?php if ($__env->exists('elements.headline', array('context' => $context, 'args' => $args_headline))) echo $__env->make('elements.headline', array('context' => $context, 'args' => $args_headline), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if( ! empty( $text ) || have_rows('col_copy_one_list_items') || have_rows('col_copy_one_quote_items') || have_rows('col_copy_one_link_items') ): ?>
      <div class="d-flex flex-column flex-column-wrap">

        <?php if( ! empty( $text ) ): ?>
          <?php if ($__env->exists('elements.text', array('context' => $context, 'args' => $args_text))) echo $__env->make('elements.text', array('context' => $context, 'args' => $args_text), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <?php if ($__env->exists('sections.list.col-copy-one-list', array('context' => $context, 'args' => array()))) echo $__env->make('sections.list.col-copy-one-list', array('context' => $context, 'args' => array()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if ($__env->exists('sections.quote.col-copy-one-quote', array('context' => $context, 'args' => array()))) echo $__env->make('sections.quote.col-copy-one-quote', array('context' => $context, 'args' => array()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if ($__env->exists('sections.cols.links.col-copy-links', array('context' => $context))) echo $__env->make('sections.cols.links.col-copy-links', array('context' => $context), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      </div>
    <?php endif; ?>

  </div>
</div>
