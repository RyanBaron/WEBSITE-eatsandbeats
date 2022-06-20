<?php
$context     = '';

// Size
$hl_size     = get_field('headline_size_section_header');
$hl_size     = \App\sanatize_class_depth($hl_size);
$col_class   = get_field('col_class_section_header') ?: 'col-12';
$col_class   = \App\sanatize_class_depth($col_class);

// Align
$text_align  = get_field('text_align_section_header');
$text_align  = \App\sanatize_class_depth($text_align);

// Row
$row_align   = get_field('row_align_section_header') ?: array();
$row_justify = get_field('row_justify_section_header') ?: array();
$row_classes = array_merge($row_justify, $row_align);
$row_classes = \App\sanatize_class_depth($row_classes);

// Spacing
$padding     = get_field('header_padding') ?: array('pb-2');
$margin      = get_field('header_margin') ?: array();
$spacing     = array_merge($margin,$padding);
$spacing     = \App\sanatize_class_depth($spacing);

// Header content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-header'));
$class_text     = \App\sanatize_class_depth(array('text','text-header'));

// Headline content
$htag         = get_field('header_headline_tag') ?: 'h2';
$style        = get_field('header_headline_style');
$sup_headline = get_field('header_superheadline');
$headline     = get_field('header_headline');
$sub_headline = get_field('header_subheadline');
$text         = get_field('header_text');

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


<?php if( ! empty( $headline ) || ! empty( $text ) || ! empty( $sub_headline ) || ! empty( $sup_headline ) ): ?>
  <header class="header-content <?php echo e($style); ?> <?php echo $spacing; ?> <?php echo $text_align; ?> <?php echo $hl_size; ?>">
    <div class="container">
      <div class="row <?php echo $row_classes; ?>">
        <div class="<?php echo $col_class; ?>">

          <?php if( ! empty( $headline ) ): ?>
            <?php if ($__env->exists('elements.headline', array('context' => $context, 'args' => $args_headline))) echo $__env->make('elements.headline', array('context' => $context, 'args' => $args_headline), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endif; ?>

          <?php if( ! empty( $text ) ): ?>
            <?php if ($__env->exists('elements.text', array('context' => $context, 'args' => $args_text))) echo $__env->make('elements.text', array('context' => $context, 'args' => $args_text), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </header>
<?php endif; ?>
