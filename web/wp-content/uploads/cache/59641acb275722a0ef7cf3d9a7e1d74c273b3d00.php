<?php
$context = isset( $context ) && ! empty( $context ) ? $context : 'cards';
$analytics_context = isset( $analytics_context ) && ! empty( $analytics_context ) ? $analytics_context : 'section';

$default_col_padding = get_field('default_col_padding', 'options') ?: array();
$default_col_margin  = get_field('default_col_margin', 'options') ?: array();
$col_padding        = get_field('col_cards_padding') ?: $default_col_padding;
$col_margin         = get_field('col_cards_margin') ?: $default_col_margin;
$col_spacing_class  = array_merge($col_padding, $col_margin);
$col_spacing_class  = \App\sanatize_class_depth($col_spacing_class);

// Card column sizing and order settings
$col_order          = get_field('col_cards_col_order') ?: array();
$col_class          = get_field('col_cards_col_class') ?: array('col-12', 'col-lg-6');
$col_class          = array_merge($col_order, $col_class);
$col_class          = \App\sanatize_class_depth($col_class);

// Card column headline
$cards_col_headline = get_field('headline_col_cards') ?: '';
$col_headline_align = get_field('headline_col_cards_align') ?: array();
$col_headline_align = \App\sanatize_class_depth($col_headline_align);

// Card items row settings
$row_align          = get_field('col_cards_row_align') ?: array();
$row_justify        = get_field('col_cards_row_justify') ?: array();
$row_align_class    = array_merge($row_align, $row_justify);
$row_align_class    = \App\sanatize_class_depth($row_align_class);

// Card column padding and alignment settings
$text_align_default = get_field('section_text_align') ?: array();
$text_align         = get_field('col_cards_text_align') ?: array();
$text_align         = ! empty( $text_align ) ? $text_align : $text_align_default;
$col_inside_class   = \App\sanatize_class_depth($text_align);

$card_col_padding   = get_field('card_col_padding') ?: array('');
$card_col_margin    = get_field('col_cards_col_margin') ?: array();
$col_card_class     = array_merge($card_col_padding, $card_col_margin);
$col_card_class     = \App\sanatize_class_depth($col_card_class);

// Card headline size
$card_headline_size  = get_field('card_headline_size');
$card_headline_class = \App\sanatize_class_depth($card_headline_size);

// Card col padding
$card_col_inside_padding = get_field('card_col_inside_padding') ?: array('py-2');
$card_col_inside_padding = \App\sanatize_class_depth($card_col_inside_padding);

// Card vertical alignment/justify
$card_body_justify = get_field('card_body_justify') ?: 'justify-content-between';
$card_body_justify = \App\sanatize_class_depth($card_body_justify);
$card_body_header_justify = get_field('card_body_header_justify') ?: 'justify-content-md-start';
$card_body_header_justify = \App\sanatize_class_depth($card_body_header_justify);

// Card image settings
$default_card_img_style = array('image', 'img-fluid', 'figure-img');
$card_img_array         = get_field('card_image_style') ?: array();
$card_img_classes       = array_merge($default_card_img_style, $card_img_array, array('card-img-top'));
$card_image_class       = \App\sanatize_class_depth($card_img_classes);
$card_image_size        = get_field('card_image_size') ?: 'full';
$figure['class']        = 'w-100';

$card_img_icon_array    = get_field('card_image_icon') ?: array();
$card_img_icon_class    = \App\sanatize_class_depth($card_img_icon_array);
$card_flex_class        = ('icon-image-left' == $card_img_icon_class)
                          || ('icon-image-lg-left' == $card_img_icon_class)
                          || ('icon-image-xl-left' == $card_img_icon_class)
                          || ('icon-image-xxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxxl-left' == $card_img_icon_class)
                          || ('icon-image-xxxxxl-left' == $card_img_icon_class)
                          ? 'flex-row' : 'flex-column';

$card_flex_class        = ('icon-image-right' == $card_img_icon_class)
                          || ('icon-image-lg-right' == $card_img_icon_class)
                          || ('icon-image-xl-right' == $card_img_icon_class)
                          || ('icon-image-xxl-right' == $card_img_icon_class)
                          || ('icon-image-xxxl-right' == $card_img_icon_class)
                          ? 'flex-row flex-row-reverse' : $card_flex_class;

// Card video settings
$card_video_array      = get_field('card_video_style');
$card_video_class      = \App\sanatize_class_depth($card_video_array);

// Card algin settings
$card_text_align_array = get_field('card_text_align');
$card_text_align_class = \App\sanatize_class_depth($card_text_align_array);

$card_link_type        = get_field('card_link_type') ?: '';

$card_type             = get_field('card_type') ?: '';
$card_style_array      = get_field('card_style') ?: array();
$card_style_class      = \App\sanatize_class_depth($card_style_array);

$card_list_style_array = get_field('card_list_style') ?: array();
$card_list_style_class = \App\sanatize_class_depth($card_list_style_array);

$card_col_class        = get_field('card_col_class');
$card_col_class        = \App\sanatize_class_depth($card_col_class);

$card_col_gutter       = get_field('card_column_gutters');
$card_col_gutter       = \App\sanatize_class_depth($card_col_gutter);

$htag_card              = get_field('card_headline_tag') ?: 'h4';

// Cards Col Headline content
$htag_cards_col         = get_field('cards_col_headline_tag') ?: 'h2';
$style_cards_col        = get_field('cards_col_headline_style');
$sup_headline_cards_col = get_field('cards_col_superheadline');
$headline_cards_col     = get_field('cards_col_headline');
$sub_headline_cards_col = get_field('cards_col_subheadline');

$class_card_col_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-cards', 'pb-2', 'pb-md-3'));

$args_cards_col_headline = array(
  'superheadline' => $sup_headline_cards_col,
  'headline'      => $headline_cards_col,
  'subheadline'   => $sub_headline_cards_col,
  'tag'           => $htag_cards_col,
  'class'         => $class_card_col_headline
);
?>

<?php if( have_rows('card_items') ): ?>
  <div class="col col-cards <?php echo $col_class; ?> <?php echo $col_spacing_class; ?> <?php echo $card_list_style_class; ?>">
    <div class="col-inside col-inside-cards <?php echo $col_inside_class; ?> list-<?php echo $card_type; ?>">
      <?php if( $sup_headline_cards_col || $headline_cards_col || $sub_headline_cards_col ): ?>
        <div class="col-header col-cards-header w-100 <?php echo $col_headline_align; ?>">
          <?php if ($__env->exists('elements.headline', array('context' => $context, 'args' => $args_cards_col_headline))) echo $__env->make('elements.headline', array('context' => $context, 'args' => $args_cards_col_headline), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      <?php endif; ?>

      <div class="row flex-row row-cards <?php echo $row_align_class; ?> <?php echo $card_col_gutter; ?>">
        <?php while( have_rows('card_items') ): ?> <?php the_row(); ?>
          <?php
            $icon_color = get_field('icon_color');
            $icon_position = get_field('icon_position');
            $icon_position_class = ! empty( $icon_position ) ? 'col-inside-'.$icon_position : '';
            $icon_size = get_field('icon_size');
            $icon_size_class = ! empty( $icon_size ) ? 'col-inside-'.$icon_size : '';
            $icons_class = get_sub_field('icon');

            $image = array(
              'id' => get_sub_field('image') ?: '',
              'size' => $card_image_size,
              'class' => $card_image_class,
            );

            $icon = array(
              'position' => $icon_position,
              'size'     => $icon_size,
              'color'    => $icon_color,
              'class'    => $icons_class,
            );

            $links        = get_sub_field('card_link_items') ?: array();
            $wrapper_link = false; // Set this to true if the entire card is clickable
            $wrapper_link_hide_btn = false; // Set this to true if the entire card is clickable and the button/link should be hidden

            $text       = get_sub_field('text') ?: '';
            $quote      = get_sub_field('quote') ?: '';

            $superheadline = get_sub_field('superheadline') ?: '';
            $headline      = get_sub_field('headline') ?: '';
            $subheadline   = get_sub_field('subheadline') ?: '';

            $video_type = get_sub_field('video_type') ?: '';
            $video_id   = get_sub_field('video_id') ?: '';
            $embed      = '';

            $args_headline = array(
              'superheadline' => $superheadline,
              'headline'      => $headline,
              'subheadline'   => $subheadline,
              'tag'           => $htag_card,
              'class'         => array('headline', 'headline-col', 'headline-col-cards')
            );
            $args_text = array(
              'text'  => $text,
            );
            $args_video = array(
              'video_type'  => $video_type,
              'video_id'    => $video_id,
              'video_class' => $card_video_class,
            );

            $card_image_icon_class = ! empty( $card_img_icon_class ) ? 'card-' . $card_img_icon_class : '';

          ?>

          <?php if( 'card-link' === $card_link_type || 'card-link-hidden' === $card_link_type ): ?>
            <?php $wrapper_link = true; ?>
          <?php endif; ?>

          <?php if( 'card-link-hidden' === $card_link_type ): ?>
            <?php $wrapper_link_hide_btn = true; ?>
          <?php endif; ?>

          <div class="col col-card <?php echo $card_col_class; ?> <?php echo e($col_card_class); ?>">
            <div class="col-inside col-inside-card h-100 <?php echo $card_col_inside_padding; ?> <?php echo $icon_size_class; ?> <?php echo $icon_position_class; ?>">
              <?php if( $wrapper_link ): ?>
                <?php if ($__env->exists('sections.cols.links.card-wrapper-link-open')) echo $__env->make('sections.cols.links.card-wrapper-link-open', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>
              <div class="card h-100 d-flex flex-column justify-content-md-between <?php echo e($card_type); ?> <?php echo $card_style_class; ?> <?php echo $card_text_align_class; ?> <?php echo $card_headline_class; ?> <?php echo e($card_image_icon_class); ?>">
                <?php if( ! empty( $image ) || ! empty( $headline ) || ! empty( $quote ) || ! empty( $text ) ): ?>
                  <div class="wrapper-card-content d-flex justify-content-md-between h-100 <?php echo e($card_flex_class); ?>">

                    <?php if( ! empty( $image['id'] ) ): ?>
                      <?php if ($__env->exists('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))) echo $__env->make('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>

                    <?php if( isset($args_video['video_type']) && ! empty( $args_video['video_type'] ) ): ?>
                      <?php if ($__env->exists('elements.video', array('context' => $context, 'args' => $args_video))) echo $__env->make('elements.video', array('context' => $context, 'args' => $args_video), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>

                    <?php if( ! empty( $headline ) || ! empty( $text ) || ! empty( $icon['class'] ) || ( $links && ! $wrapper_link_hide_btn ) ): ?>
                      <div class="card-body d-flex flex-column justify-content-md-between h-100 <?php echo $card_body_justify; ?>">

                        <?php if( ! empty( $icon['class'] ) ): ?>
                          <?php if ($__env->exists('elements.icon', array('context' => $context, 'icon' => $icon))) echo $__env->make('elements.icon', array('context' => $context, 'icon' => $icon), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                        <?php if( ! empty( $headline ) || ! empty( $text ) ): ?>
                          <div class="d-flex flex-column h-100 <?php echo $card_body_header_justify; ?>">
                            <?php if( ! empty( $headline ) ): ?>
                              <?php if ($__env->exists('elements.headline', array('context' => $context, 'args' => $args_headline))) echo $__env->make('elements.headline', array('context' => $context, 'args' => $args_headline), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                              <?php endif; ?>

                            <?php if( ! empty( $text ) ): ?>
                              <?php if ($__env->exists('elements.text', array('context' => $context, 'args' => $args_text))) echo $__env->make('elements.text', array('context' => $context, 'args' => $args_text), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                          </div>
                        <?php endif; ?>

                        <?php if( ! $wrapper_link_hide_btn ): ?>
                          <?php if ($__env->exists('sections.cols.links.card-links', array('context' => $context, 'wrapper_link' => $wrapper_link))) echo $__env->make('sections.cols.links.card-links', array('context' => $context, 'wrapper_link' => $wrapper_link), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
              <?php if( $wrapper_link ): ?>
                <?php if ($__env->exists('sections.cols.links.card-wrapper-link-close')) echo $__env->make('sections.cols.links.card-wrapper-link-close', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>

    </div>
  </div>
<?php endif; ?>
