<?php
$class         = isset($args['class']) ? $args['class'] : '';
$class         = \App\sanatize_class_depth($class);
$superheadline = isset($args['superheadline']) ? $args['superheadline'] : '';
$headline      = isset($args['headline']) ? $args['headline'] : '';
$subheadline   = isset($args['subheadline']) ? $args['subheadline'] : '';
$headline_tag  = isset($args['tag']) && preg_match('/^h[1-5]$/', $args['tag']) ? $args['tag'] : 'h2';
?>

<?php if($superheadline || $headline || $subheadline): ?>
  <<?php echo e($headline_tag); ?> class="<?php echo e($class); ?>">

    <?php if( $superheadline ): ?>
      <span class="superheadline"><?php echo $superheadline; ?></span>
    <?php endif; ?>

    <?php echo $headline; ?>


    <?php if( $subheadline ): ?>
      <span class="subheadline"><?php echo $subheadline; ?></span>
    <?php endif; ?>

  </<?php echo e($headline_tag); ?>>
<?php endif; ?>
