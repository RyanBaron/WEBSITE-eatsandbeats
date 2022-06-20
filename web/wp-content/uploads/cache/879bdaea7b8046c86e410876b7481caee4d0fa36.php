<?php
$icon_class       = isset($icon['class']) ? $icon['class'] : '';
$icon_color       = isset( $icon['color'] ) && ! empty( $icon['color'] ) ? $icon['color'] : '';
$icon_color_class = ! empty( $icon_color ) ? 'icon-wrap-' . $icon_color : '';
$icon_pos         = isset( $icon['position'] ) && ! empty( $icon['position'] ) ? $icon['position'] : '';
$icon_pos_class   = ! empty( $icon_pos ) ? 'icon-wrap-' . $icon_pos : '';
$icon_size        = isset( $icon['size'] ) && ! empty( $icon['size'] ) ? $icon['size'] : '';
$icon_size_class  = ! empty( $icon_size ) ? 'icon-wrap-' . $icon_size : '';
?>

<?php if( $icon_class ): ?>
  <div class="icon-wrapper <?php echo e($icon_pos_class); ?> <?php echo e($icon_size_class); ?> <?php echo e($icon_color_class); ?>">
    <i class="<?php echo e($icon_class); ?> <?php echo e($icon_size); ?> <?php echo e($icon_color); ?>"></i>
  </div>
<?php endif; ?>
