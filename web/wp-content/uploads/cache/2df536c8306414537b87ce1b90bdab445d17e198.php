<?php
  $col_order       = get_field('col_image_one_order') ?: array();
  $col_size        = get_field('col_image_one_col_class') ?: array();
  $col_text_align  = get_field('col_image_one_text_align') ?: array();
  $class           = array_unique(array_merge($col_order, $col_size, $col_text_align));
  $class           = \App\sanatize_class_depth( $class );

  $default_col_padding = get_field('default_col_padding', 'options') ?: array();
  $default_col_margin  = get_field('default_col_margin', 'options') ?: array();
  $col_padding         = get_field('col_image_one_padding') ?: $default_col_padding;
  $col_margin          = get_field('col_image_one_margin') ?: $default_col_margin;
  $col_spacing_class   = array_merge($col_padding, $col_margin);
  $col_spacing_class   = \App\sanatize_class_depth($col_spacing_class);

  // Spacing
  //$padding         = get_field('col_image_one_padding') ?: array();
  //$margin          = get_field('col_image_one_margin') ?: array();
  //$spacing         = array_merge($margin,$padding);
  //$spacing         = \App\sanatize_class_depth($spacing);

  $analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';
  $context           = isset($context) && ! empty($context) ? $context : array();
  $context_col       = array_merge($context, array('image'));

  $default_style   = array('image', 'img-fluid', 'figure-img');
  $image_style     = get_field('col_image_one_image_style') ?: array();
  $img_classes     = array_merge($default_style, $image_style);
  $image_overflow  = get_field('col_image_one_image_overflow') ?: array();
  $figure_classes  = array_merge($image_overflow, array('w-100'));

  $image = array(
    'id' => get_field('col_image_one_image') ?: '',
    'size' => get_field('col_image_one_image_size') ?: 'full',
    'lazy_load' => get_field('col_image_one_image_load') ?: '',
    'class' => $img_classes,
  );
  $figure['class'] = $figure_classes;

?>

<div class="<?php echo App::context_class('col', $context_col); ?> <?php echo App::sanatize_attrs($class); ?> <?php echo $col_spacing_class; ?>">
  <div class="<?php echo App::context_class('col-inside', $context_col); ?> w-100">
    <?php if ($__env->exists('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))) echo $__env->make('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>
