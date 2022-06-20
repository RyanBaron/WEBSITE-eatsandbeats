<?php
  $img_id = isset($image['id']) ? $image['id'] : null;
  $context = isset($context) ? $context : '';
?>

<?php if( $img_id ): ?>
  <?php
    $fig_class = isset( $figure['class'] ) ? \App\sanatize_class( $figure['class'] ) : 'figure-'.$img_id;
  ?>

  <figure class="<?php echo App::context_class('figure', $context); ?> <?php echo e($fig_class); ?>">
    <?php if ($__env->exists('elements.image', array('img_id' => $img_id, 'image' => $image))) echo $__env->make('elements.image', array('img_id' => $img_id, 'image' => $image), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </figure>
<?php endif; ?>
