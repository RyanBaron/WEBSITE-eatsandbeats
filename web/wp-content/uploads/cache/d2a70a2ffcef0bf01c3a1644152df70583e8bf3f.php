<?php
$class = isset($args['class']) ? $args['class'] : '';
$text  = isset($args['text']) ? $args['text'] : '';
?>

<?php if( $text ): ?>
  <div class="<?php echo e($class); ?>">
    <?php echo $text; ?>

  </div>
<?php endif; ?>
