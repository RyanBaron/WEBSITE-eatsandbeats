<?php
$default_section_padding = get_field('default_section_padding', 'options') ?: array();
$default_section_margin  = get_field('default_section_margin', 'options') ?: array();

$style       = '';
$id          = get_field('section_id') ?: '';
$class       = get_field('section_class') ?: array();
$class       = \App\sanatize_class_depth($class);
$hl_size     = get_field('headline_size') ?: array();
$hl_size     = \App\sanatize_class_depth($hl_size);
$hl_color    = get_field('section_headline_color') ?: '';
$hl_color     = \App\sanatize_class_depth($hl_color);


$gutters     = get_field('section_col_gutters') ?: array();
$gutters     = \App\sanatize_class_depth($gutters);

$min_height  = get_field('min_height') ?: array();
$min_height  = \App\sanatize_class_depth($min_height);
$padding     = get_field('padding') ?: $default_section_padding;
$padding     = \App\sanatize_class_depth($padding);
$margin      = get_field('margin') ?: $default_section_margin;
$margin      = \App\sanatize_class_depth($margin);
$text_align  = get_field('section_text_align') ?: array();
$text_align  = \App\sanatize_class_depth($text_align);
$row_justify = get_field('row_justify_section') ?: array();
$row_justify = \App\sanatize_class_depth($row_justify);
$row_align   = get_field('row_align_section') ?: array();
$row_align   = \App\sanatize_class_depth($row_align);
$context     = get_field('section_context', '');
$context     = \App\sanatize_class_depth($context);

// Section Background
// ToDo: Move this functionality to a helper function.
$bg_img      = get_field('section_bg_image') ?: '';
$bg_img_url  = isset($bg_img['url']) ? $bg_img['url'] : '';
$bg_img_opts = get_field('section_bg_image_options') ?: '';
$bg_img_opts = ! empty($bg_img_opts) ? \App\sanatize_class_depth($bg_img_opts) : '';
$sec_bg      = get_field('section_bg') ?: '';
$bg_cust     = ('custom' == $sec_bg) ? get_field('section_bg_custom') : '';
$bg_video    = get_field('section_bg_video') ?: '';
$bg_video    = isset($bg_video['url']) ? $bg_video['url'] : '';
$sec_bg      = ! empty($sec_bg) ? \App\sanatize_class_depth($sec_bg) : '';
$vid_opts    = get_field('section_bg_video_options') ?: '';
$vid_opts    = ! empty($sec_bg) ? \App\sanatize_class_depth($vid_opts) : '';

if( ! empty($bg_cust) ) {
  $style = 'background-color: ' . $bg_cust . ';';
}

if( ! empty($bg_img_url) ) {
  $style = 'background-image:url(' . $bg_img_url . ');';
}

if( !empty( $style ) ) {
  $style = 'style="'.$style.'"';
}
?>

<section id="<?php echo e($id); ?>" class="<?php echo $class; ?> <?php echo $padding; ?> <?php echo $margin; ?> <?php echo e($hl_size); ?> <?php echo $sec_bg; ?> <?php echo $text_align; ?> <?php echo $bg_img_opts; ?> <?php echo $hl_color; ?>" <?php echo $style; ?>>

  <?php if($bg_video): ?>
    <div class="section-bg-video">
      <video autoplay muted <?php echo $vid_opts; ?>>
        <source src="<?php echo e($bg_video); ?>" type="video/mp4">
      </video>
    </div>
  <?php endif; ?>
  <?php if ($__env->exists('sections.header.section-header', array('context' => $context, 'source' => 'section-header'))) echo $__env->make('sections.header.section-header', array('context' => $context, 'source' => 'section-header'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container">
    <div class="row flex-row <?php echo $row_justify; ?> <?php echo $row_align; ?> <?php echo $min_height; ?> <?php echo $gutters; ?>">
      <?php echo $__env->yieldContent('content_cols'); ?>
    </div>
  </div>

  <?php if ($__env->exists('sections.footer.section-footer', array('context' => $context, 'source' => 'section-footer'))) echo $__env->make('sections.footer.section-footer', array('context' => $context, 'source' => 'section-footer'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</section>
