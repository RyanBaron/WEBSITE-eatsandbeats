<?php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'blog';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $g_data = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
  $read_more = \App\read_more_link('text-no-link');

  $image = array(
    'id' => get_post_thumbnail_id() ?: '',
    'size' => false ?: 'screen_md',
    'class' => array(
      'image',
      'img-fluid',
      'figure-img',
      'rounded',
    ),
    'alt_overwrite' => get_the_title(),
  );

  $figure = array(
    'class' => array('w-100'),
    'image' => $image,
  );

  $post_categories = \App\post_category_list();
  $read_time = \App\read_time();
?>

<a href="<?php echo e(get_permalink()); ?>" class="wrapper-link" <?php echo $g_data; ?>>
  <article <?php post_class('article-feed-item hl-sm py-3 py-xl-4') ?>>
    <div class="row flex-row justify-content-center justify-content-md-between">
      <?php if( ! empty( $image['id'] ) ): ?>
        <div class="col col-image col-3 col-md-3 col-xxl-2 order-last">
          <div class="col-inside col-image-inside w-100">
            <?php if ($__env->exists('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))) echo $__env->make('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="col col-text col-9 col-md-7 col-xxl-6 order-first">
        <div class="col-inside col-text-inside w-100">
          <header class="entry-col">
            <div class="pretails d-flex flex-row pb-2">
              <div class="pretail-item pretail-categories"><?php echo $post_categories; ?></div>
              <div class="pretail-item pretail-read-time"><?php echo e($read_time); ?></div>
            </div>
            <h3 class="entry-title"><?php echo get_the_title(); ?></h3>
          </header>
        </div>
      </div>
    </div>
  </article>
</a>
