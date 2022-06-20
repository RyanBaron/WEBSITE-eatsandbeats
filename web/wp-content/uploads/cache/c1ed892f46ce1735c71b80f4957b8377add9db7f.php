<?php
$context      = '';
$list_display = get_field('col_copy_one_list_display');
$list_icon_color = get_field('col_copy_one_list_icon_color') ?: '';
$list_icon_color = \App\sanatize_class_depth($list_icon_color);
$list_style   = get_field('col_copy_one_list_style') ?: 'default';
$list_style   = \App\sanatize_class_depth($list_style);
$fa_ul        = substr( $list_style, 0, 3 ) === "fa-" ? "fa-ul" : '';
?>

<?php if( 'show' == $list_display && have_rows('col_copy_one_list_items') ): ?>
  <div class="list-wrapper list-wrapper-inline list-wrapper-<?php echo $list_style; ?>">
    <ul class="list list-<?php echo $list_style; ?> <?php echo $fa_ul; ?> <?php echo $list_icon_color; ?>">
      <?php while( have_rows('col_copy_one_list_items') ): ?> <?php the_row(); ?>

        <?php
          $args_list = array(
            'context'          => $context,
            'fa_ul'            => $fa_ul,
            'icon'             => get_sub_field('list_item_icon') ?: '',
            'headline'         => get_sub_field('list_item_headline') ?: '',
            'text'             => get_sub_field('list_item_text') ?: '',
          );
        ?>

        <?php if ($__env->exists('sections.list.list-item', $args_list)) echo $__env->make('sections.list.list-item', $args_list, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>
