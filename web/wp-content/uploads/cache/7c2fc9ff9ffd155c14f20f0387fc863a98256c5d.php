<?php
  $sections = get_field('sections') ?: array();
  $display  = get_field('section_display') ?: '';
  //$context  = get_field('section_context') ?: 'section';
  $analytics_context  = get_field('analytics_context') ?: 'section';
  $wrapper  = ! empty($display) ? '-' . $display : '';
?>



<?php $__env->startSection('content_cols'); ?>

  <?php if(in_array('copy-one', $sections )): ?>
    <!-- start: text column content -->
    <?php if ($__env->exists('sections.cols.copy-col', array('context' => array('copy'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one', 'headline' => array())))) echo $__env->make('sections.cols.copy-col', array('context' => array('copy'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one', 'headline' => array())), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end: text column content -->
  <?php endif; ?>

  <?php if(in_array('image-one', $sections )): ?>
    <!-- start: image column content -->
    <?php if ($__env->exists('sections.cols.image-col', array('context' => array('image'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one')))) echo $__env->make('sections.cols.image-col', array('context' => array('image'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one')), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end: image column content -->
  <?php endif; ?>

  <?php if(in_array('cards', $sections )): ?>
    <!-- start: cards column content -->
    <?php if ($__env->exists('sections.cols.cards-col', array('context' => array('cards'), 'analytics_context' => $analytics_context, 'args' => array()))) echo $__env->make('sections.cols.cards-col', array('context' => array('cards'), 'analytics_context' => $analytics_context, 'args' => array()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end: cards column content -->
  <?php endif; ?>

  <?php if(in_array('form', $sections )): ?>
    <!-- start: cards column content -->
    <?php if ($__env->exists('sections.cols.form-col', array('context' => array('form'), 'analytics_context' => $analytics_context, 'args' => array()))) echo $__env->make('sections.cols.form-col', array('context' => array('form'), 'analytics_context' => $analytics_context, 'args' => array()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end: cards column content -->
  <?php endif; ?>

<?php $__env->stopSection(true); ?>

<?php echo $__env->make('sections.wrapper' . $wrapper, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>