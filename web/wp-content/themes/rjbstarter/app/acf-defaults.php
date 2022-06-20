<?php

namespace App;

use GFAPI;

/**
 * Return an array of StoutLogic/ACF args for the textarea/copy field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_textarea() {
  return array(
    'maxlength'   => 15000,
    'placeholder' => "Enter text...",
    'label'       => "Text",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the section_id field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_section_id() {
  return array(
    'maxlength'   => 30,
    'placeholder' => "Enter a section ID",
    'label'       => "Section ID",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the section_class field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_section_class() {
  return array(
    'maxlength'   => 150,
    'placeholder' => "Enter a section class",
    'label'       => "Section Class",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the section_class field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_card_class() {
  return array(
    'maxlength'   => 100,
    'placeholder' => "Enter custom classes to be added to this card.",
    'label'       => "Card Class",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the headline field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_headline() {
  return array(
    'maxlength'   => 150,
    'placeholder' => "Enter a headline...",
    'label'       => "Headline",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the subheadline field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_subheadline() {
  return array(
    'maxlength' => 300,
    'placeholder' => "Enter a subheadline...",
    'label'       => "Sub Headline",
  );
}

/**
 * Return an array of StoutLogic/ACF args for the superheadline field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_args_field_superheadline() {
  return array(
    'maxlength' => 80,
    'placeholder' => "Enter a superheadline...",
    'label'       => "Super Headline",
  );
}

/**
 * Return an array of StoutLogic/ACF options with bootstrap order classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_column_order_options() {
  return array(
    'order-1' => 'order-1',
    'order-2' => 'order-2',
    'order-3' => 'order-3',
    'order-4' => 'order-4',
    'order-5' => 'order-5',
    'order-sm-1' => 'order-sm-1',
    'order-sm-2' => 'order-sm-2',
    'order-sm-3' => 'order-sm-3',
    'order-sm-4' => 'order-sm-4',
    'order-sm-5' => 'order-sm-5',
    'order-md-1' => 'order-md-1',
    'order-md-2' => 'order-md-2',
    'order-md-3' => 'order-md-3',
    'order-md-4' => 'order-md-4',
    'order-md-5' => 'order-md-5',
    'order-lg-1' => 'order-lg-1',
    'order-lg-2' => 'order-lg-2',
    'order-lg-3' => 'order-lg-3',
    'order-lg-4' => 'order-lg-4',
    'order-lg-5' => 'order-lg-5',
    'order-xl-1' => 'order-xl-1',
    'order-xl-2' => 'order-xl-2',
    'order-xl-3' => 'order-xl-3',
    'order-xl-4' => 'order-xl-4',
    'order-xl-5' => 'order-xl-5',
  );
}

/**
 * Return an array of StoutLogic/ACF options for flex row justify classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_row_justify_options() {
  return array(
    'justify-content-start'      => 'justify-content-start',
    'justify-content-center'     => 'justify-content-center',
    'justify-content-end'        => 'justify-content-end',
    'justify-content-between'    => 'justify-content-between',
    'justify-content-around'     => 'justify-content-around',
    'justify-content-md-start'   => 'justify-content-md-start',
    'justify-content-md-center'  => 'justify-content-md-center',
    'justify-content-md-end'     => 'justify-content-md-end',
    'justify-content-md-between' => 'justify-content-md-between',
    'justify-content-md-around'  => 'justify-content-md-around',
    'justify-content-lg-start'   => 'justify-content-lg-start',
    'justify-content-lg-center'  => 'justify-content-lg-center',
    'justify-content-lg-end'     => 'justify-content-lg-end',
    'justify-content-lg-between' => 'justify-content-lg-between',
    'justify-content-lg-around'  => 'justify-content-lg-around'
  );
}

/**
 * Return an array of StoutLogic/ACF options for justify classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_justify_options() {
  return array(
    'justify-content-start'      => 'justify-content-start',
    'justify-content-center'     => 'justify-content-center',
    'justify-content-end'        => 'justify-content-end',
    'justify-content-between'    => 'justify-content-between',
    'justify-content-around'     => 'justify-content-around',
    'justify-content-md-start'   => 'justify-content-md-start',
    'justify-content-md-center'  => 'justify-content-md-center',
    'justify-content-md-end'     => 'justify-content-md-end',
    'justify-content-md-between' => 'justify-content-md-between',
    'justify-content-md-around'  => 'justify-content-md-around',
    'justify-content-lg-start'   => 'justify-content-lg-start',
    'justify-content-lg-center'  => 'justify-content-lg-center',
    'justify-content-lg-end'     => 'justify-content-lg-end',
    'justify-content-lg-between' => 'justify-content-lg-between',
    'justify-content-lg-around'  => 'justify-content-lg-around'
  );
}

/**
 * Return an array of StoutLogic/ACF options for flex row justify classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_text_align_options() {
  return array(
    'text-left'        => 'text-left',
    'text-center'      => 'text-center',
    'text-right'       => 'text-right',
    'text-sm-left'     => 'text-sm-left',
    'text-sm-center'   => 'text-sm-center',
    'text-sm-right'    => 'text-sm-right',
    'text-md-left'     => 'text-md-left',
    'text-md-center'   => 'text-md-center',
    'text-md-right'    => 'text-md-right',
    'text-lg-left'     => 'text-lg-left',
    'text-lg-center'   => 'text-lg-center',
    'text-lg-right'    => 'text-lg-right',
    'text-xl-left'     => 'text-xl-left',
    'text-xl-center'   => 'text-xl-center',
    'text-xl-right'    => 'text-xl-right',
    'text-xxxl-left'   => 'text-xxxl-left',
    'text-xxxl-center' => 'text-xxxl-center',
    'text-xxxl-right'  => 'text-xxxl-right',
  );
}

/**
 * Return an array of StoutLogic/ACF options for flex row align classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_row_align_options() {
  return array(
    'align-items-start'     => 'align-items-start',
    'align-items-center'    => 'align-items-center',
    'align-items-end'       => 'align-items-end',
    'align-items-md-start'  => 'align-items-md-start',
    'align-items-md-center' => 'align-items-md-center',
    'align-items-md-end'    => 'align-items-md-end',
    'align-items-lg-start'  => 'align-items-lg-start',
    'align-items-lg-center' => 'align-items-lg-center',
    'align-items-lg-end'    => 'align-items-lg-end',
  );
}

/**
 * Return an array of StoutLogic/ACF options for headline size classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_headline_size_options() {
  return array(
    ''      => 'Default',
    'hl-xxs' => "Headline xxs",
    'hl-xs' => "Headline xs",
    'hl-sm' => "Headline sm",
    'hl-md' => "Headline md",
    'hl-lg' => "Headline lg (hero)",
    'hl-xl' => "Headline xl"
  );
}

/**
 * Return an array of StoutLogic/ACF options for headline size classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_form_headline_size_options() {
  return array(
    ''      => 'Default',
    'hl-sm' => "Headline sm",
    'hl-md' => "Headline md",
    'hl-lg' => "Headline lg (hero)",
  );
}

/**
 * Return an array of StoutLogic/ACF options for image style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_hide_content_options() {
  return array(
    ''               => 'Default',
    'hidden-xs-down' => "hidden-xs-down",
    'hidden-sm-down' => "hidden-sm-down",
    'hidden-md-down' => "hidden-md-down",
    'hidden-lg-down' => "hidden-lg-down",
    'hidden-xl-down' => "hidden-xl-down",
    'hidden-xs-up'   => "hidden-xs-up",
    'hidden-sm-up'   => "hidden-sm-up",
    'hidden-md-up'   => "hidden-md-up",
    'hidden-lg-up'   => "hidden-lg-up",
    'hidden-xl-up'   => "hidden-xl-up",
  );
}

/**
 * Return an array of StoutLogic/ACF options for column button order classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_col_link_order_options() {
  return array(
    ''            => "Default",
    'order-first' => 'First',
    'order-last'  => 'Last',
  );
}

/**
 * Return an array of StoutLogic/ACF options for link sizes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_link_size_options() {
  return array(
    ''   => "Default",
    'lg' => 'Large',
    'xl' => 'XLarge',
  );
}

/**
 * Return an array of StoutLogic/ACF options for image icon classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_icon_options() {
  return array(
    'icon-image-top'        => 'Icon Image (top)',
    'icon-image-lg-top'     => 'Icon Image Lg (top)',
    'icon-image-xl-top'     => 'Icon Image Xl (top)',
    'icon-image-xxl-top'    => 'Icon Image XXl (top)',
    'icon-image-xxxl-top'   => 'Icon Image XXXl (top)',
    'icon-image-xxxxl-top'  => 'Icon Image XXXXl (top)',
    'icon-image-xxxxxl-top' => 'Icon Image XXXXXl (top)',
    'icon-image-left'       => 'Icon Image (left)',
    'icon-image-lg-left'    => 'Icon Image Lg (left)',
    'icon-image-xl-left'    => 'Icon Image Xl (left)',
    'icon-image-xxl-left'   => 'Icon Image Xxl (left)',
    'icon-image-xxxl-left'  => 'Icon Image Xxxl (left)',
    'icon-image-xxxxl-left' => 'Icon Image Xxxxl (left)',
    'icon-image-xxxxxl-left'=> 'Icon Image Xxxxxl (left)',
    'icon-image-right'      => 'Icon Image (right)',
    'icon-image-lg-right'   => 'Icon Image Lg (right)',
    'icon-image-xl-right'   => 'Icon Image Xl (right)',
    'icon-image-xxl-right'  => 'Icon Image Xxl (right)',
    'icon-image-xxxl-right' => 'Icon Image Xxxl (right)',
    'logo-image-top'        => 'Logo Image (top)',
    'logo-image-sm-top'     => 'Logo Image Sm (top)',
    'logo-image-md-top'     => 'Logo Image Md (top)',
    'logo-image-lg-top'     => 'Logo Image Lg (top)',
    'logo-image-xl-top'     => 'Logo Image Xl (top)',
    'logo-image-xxl-top'    => 'Logo Image Xxl (top)',
    'logo-image-xxxl-top'   => 'Logo Image Xxxl (top)',
    'logo-image-xxxxl-top'  => 'Logo Image Xxxxl (top)',
    'logo-image-xxxxxl-top'  => 'Logo Image Xxxxxl (top)',
    'logo-image-xxxxxxl-top'  => 'Logo Image Xxxxxxl (top)',
    'image-straddle-top'        => 'Straddle Image (top)',
    'image-straddle-sm-top'     => 'Straddle Image Sm (top)',
    'image-straddle-md-top'     => 'Straddle Image Md (top)',
    'image-straddle-lg-top'     => 'Straddle Image Lg (top)',
    'image-straddle-xl-top'     => 'Straddle Image Xl (top)',
    'image-straddle-xxl-top'    => 'Straddle Image Xxl (top)',
    'image-straddle-xxxl-top'   => 'Straddle Image Xxxl (top)',
    'image-straddle-xxxxl-top'  => 'Straddle Image Xxxxl (top)',
    'image-straddle-xxxxxl-top'  => 'Straddle Image Xxxxxl (top)',
    'image-straddle-xxxxxxl-top'  => 'Straddle Image Xxxxxxl (top)',
  );
}

/**
 * Return an array of StoutLogic/ACF options for image style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_style_options() {
  return array(
    'card-img-full'   => "Full Width (Cards Only)",
    'icon-image'      => 'Icon Image',
    'grayscale'       => 'Grayscale',
    'grayscale-light' => 'Grayscale (light)',
    'rounded-circle'  => 'Circlar Image',
    'rounded'         => 'Rounded Image',
    'video-preview'   => 'Video Preview (play icon)',
    'video-preview-darken' => 'Video Preview Darken (play icon)',
    'shadow-sm'       => 'Shadow (sm)',
    'shadow'          => 'Shadow',
    'shadow-lg'       => 'Shadow (lg)',
  );
}

/**
 * Return an array of StoutLogic/ACF options for image figure style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_figure_style_options() {
  return array(
    'bg-offset-dots' => 'BG Offset Dots',
    'bg-offset-fade-primary' => 'Primary bg offset fade',
    'bg-offset-fade-secondary' => 'Secondary bg offset fade',
    'bg-offset-fade-rounded' => '- Fade Offset Rounded',
  );
}

/**
 * Return an array of StoutLogic/ACF options for image overflow classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_overflow_options() {
  return array(
    'no-overflow-image-left'   => "No overflow left",
    'overflow-image-left'   => "Overflow left",
    'overflow-large-image-left'   => "Overflow left (large)",
    'overflow-xlarge-image-left'   => "Overflow left (xlarge)",
    'overflow-xxlarge-image-left'   => "Overflow left (xxlarge)",
    'overflow-xxxlarge-image-left'   => "Overflow left (xxxlarge)",
    'no-overflow-image-left-md'   => "md - No overflow left",
    'overflow-image-left-md'   => "md - Overflow left",
    'overflow-large-image-left-md'   => "md - Overflow left (large)",
    'overflow-xlarge-image-left-md'   => "md - Overflow left (xlarge)",
    'overflow-xxlarge-image-left-md'   => "md - Overflow left (xxlarge)",
    'overflow-xxxlarge-image-left-md'   => "md - Overflow left (xxxlarge)",
    'no-overflow-image-left-lg'   => "lg - No overflow left",
    'overflow-large-left-lg'   => "lg - Overflow left",
    'overflow-large-image-left-lg'   => "lg - Overflow left (large)",
    'overflow-xlarge-image-left-lg'   => "lg - Overflow left (xlarge)",
    'overflow-xxlarge-image-left-lg'   => "lg - Overflow left (xxlarge)",
    'overflow-xxxlarge-image-left-lg'   => "lg - Overflow left (xxxlarge)",
    'no-overflow-image-left-xxl'   => "xxl - No overflow left",
    'overflow-large-left-xxl'   => "xxl - Overflow left",
    'overflow-large-image-left-xxl'   => "xxl - Overflow left (large)",
    'overflow-xlarge-image-left-xxl'   => "xxl - Overflow left (xlarge)",
    'overflow-xxlarge-image-left-xxl'   => "xxl - Overflow left (xxlarge)",
    'overflow-xxxlarge-image-left-xxl'   => "xxl - Overflow left (xxxlarge)",
    'no-overflow-image-right'   => "No overflow right",
    'overflow-image-right'   => "Overflow right",
    'overflow-large-image-right'   => "Overflow right (large)",
    'overflow-xlarge-image-right'   => "Overflow right (xlarge)",
    'overflow-xxlarge-image-right'   => "Overflow right (xxlarge)",
    'overflow-xxxlarge-image-right'   => "Overflow right (xxxlarge)",
    'no-overflow-image-right-md'   => "md - No overflow right",
    'overflow-image-right-md'   => "md - Overflow right",
    'overflow-large-image-right-md'   => "md - Overflow right (large)",
    'overflow-xlarge-image-right-md'   => "md - Overflow right (xlarge)",
    'overflow-xxlarge-image-right-md'   => "md - Overflow right (xxlarge)",
    'overflow-xxxlarge-image-right-md'   => "md - Overflow right (xxxlarge)",
    'no-overflow-image-right-lg'   => "lg - No overflow right",
    'overflow-image-right-lg'   => "lg - Overflow right",
    'overflow-large-image-right-lg'   => "lg - Overflow right (large)",
    'overflow-xlarge-image-right-lg'   => "lg - Overflow right (xlarge)",
    'overflow-xxlarge-image-right-lg'   => "lg - Overflow right (xxlarge)",
    'overflow-xxxlarge-image-right-lg'   => "lg - Overflow right (xxxlarge)",
    'no-overflow-image-right-xxl'   => "xxl - No overflow right",
    'overflow-image-right-xxl'   => "xxl - Overflow right",
    'overflow-large-image-right-xxl'   => "xxl - Overflow right (large)",
    'overflow-xlarge-image-right-xxl'   => "xxl - Overflow right (xlarge)",
    'overflow-xxlarge-image-right-xxl'   => "xxl - Overflow right (xxlarge)",
    'overflow-xxxlarge-image-right-xxl'   => "xxl - Overflow right (xxxlarge)",
  );
}
/**
 * Return an array of StoutLogic/ACF options for video style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_video_style_options() {
  return array(
    ''                => 'Default',
    'card-video-full' => "Card (full width)",
  );
}

/**
 * Return an array of StoutLogic/ACF options for card style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_card_style_options() {
  return array(
    'flat'            => "Flat",
    'transparent'     => "Transparent",
    'dropshadow'      => "Shadow",
    'square-card'     => "Square Cards",
    'no-border'       => "No Border",
    'dark-border'     => "Dark Border",
    'light-border'    => "Light Border",
    'lighter-border'  => "Lighter Border",
    'no-x-padding'    => "No Pad X (card body)",
    'no-y-padding'    => "No Pad Y (card body)",
    'no-figure-padding' => "No Pad X&Y (card figrue)",
    'stat-headline'   => "Stat Headline Style",
    'staggered-logos' => "Staggered logos",
    'bottom-highlight'=> "Bottom highlight (gradient line)",
    'logo-sq-box'     => "Logo square box",
    'padding-wrap-1'  => "Padding wrap 1",
    'padding-wrap-2'  => "Padding wrap 2",
    'rounded-lg'      => "Rounded Large",
    'rounded-xl'      => "Rounded xLarge",
    'rounded-xxl'     => "Rounded xxLarge",
    'content-white'   => "Content White (hl & text)",
    'content-light'   => "Content light (hl & text)",
  );
}

/**
 * Return an array of StoutLogic/ACF options for card style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_accordion_style_options() {
  return array(
    'flat'            => "Flat",
    //'transparent'     => "Transparent",
    //'dropshadow'      => "Shadow",
    //'square-card'     => "Square Cards",
    //'no-border'       => "No Border",
    //'dark-border'     => "Dark Border",
    //'light-border'    => "Light Border",
    //'lighter-border'  => "Lighter Border",
    //'no-x-padding'    => "No Pad X (card body)",
    //'no-y-padding'    => "No Pad Y (card body)",
    //'stat-headline'   => "Stat Headline Style",
    //'staggered-logos' => "Staggered logos",
    //'bottom-highlight'=> "Bottom highlight (gradient line)",
    //'logo-sq-box'     => "Logo square box",
    //'padding-wrap-1'  => "Padding wrap 1",
    //'padding-wrap-2'  => "Padding wrap 2"
  );
}

/**
 * Return an array of StoutLogic/ACF options for card style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_card_inside_padding_options() {
  return array(
    'py-0'    => 'py-0',
    'py-1'    => 'py-1',
    'py-2'    => 'py-2',
    'py-3'    => 'py-3',
    'py-4'    => 'py-4',
    'py-5'    => 'py-5',
    'py-6'    => 'py-6',
    'py-8'    => 'py-8',
    'pt-0'    => 'pt-0',
    'pt-1'    => 'pt-1',
    'pt-2'    => 'pt-2',
    'pt-3'    => 'pt-3',
    'pt-4'    => 'pt-4',
    'pt-5'    => 'pt-5',
    'pt-6'    => 'pt-6',
    'pt-8'    => 'pt-8',
    'pb-0'    => 'pb-0',
    'pb-1'    => 'pb-1',
    'pb-2'    => 'pb-2',
    'pb-3'    => 'pb-3',
    'pb-4'    => 'pb-4',
    'pb-5'    => 'pb-5',
    'pb-6'    => 'pb-6',
    'pb-8'    => 'pb-8',
    'py-md-0' => 'py-md-0',
    'py-md-1' => 'py-md-1',
    'py-md-2' => 'py-md-2',
    'py-md-3' => 'py-md-3',
    'py-md-4' => 'py-md-4',
    'py-md-5' => 'py-md-5',
    'py-md-6' => 'py-md-6',
    'py-md-8' => 'py-md-8',
    'pt-md-0' => 'pt-md-0',
    'pt-md-1' => 'pt-md-1',
    'pt-md-2' => 'pt-md-2',
    'pt-md-3' => 'pt-md-3',
    'pt-md-4' => 'pt-md-4',
    'pt-md-5' => 'pt-md-5',
    'pt-md-6' => 'pt-md-6',
    'pt-md-8' => 'pt-md-8',
    'pb-md-0' => 'pb-md-0',
    'pb-md-1' => 'pb-md-1',
    'pb-md-2' => 'pb-md-2',
    'pb-md-3' => 'pb-md-3',
    'pb-md-4' => 'pb-md-4',
    'pb-md-5' => 'pb-md-5',
    'pb-md-6' => 'pb-md-6',
    'pb-md-8' => 'pb-md-8',
    'py-lg-0' => 'py-lg-0',
    'py-lg-1' => 'py-lg-1',
    'py-lg-2' => 'py-lg-2',
    'py-lg-3' => 'py-lg-3',
    'py-lg-4' => 'py-lg-4',
    'py-lg-5' => 'py-lg-5',
    'py-lg-6' => 'py-lg-6',
    'py-lg-8' => 'py-lg-8',
    'pt-lg-0' => 'pt-lg-0',
    'pt-lg-1' => 'pt-lg-1',
    'pt-lg-2' => 'pt-lg-2',
    'pt-lg-3' => 'pt-lg-3',
    'pt-lg-4' => 'pt-lg-4',
    'pt-lg-5' => 'pt-lg-5',
    'pt-lg-7' => 'pt-lg-6',
    'pt-lg-8' => 'pt-lg-8',
    'pb-lg-0' => 'pb-lg-0',
    'pb-lg-1' => 'pb-lg-1',
    'pb-lg-2' => 'pb-lg-2',
    'pb-lg-3' => 'pb-lg-3',
    'pb-lg-4' => 'pb-lg-4',
    'pb-lg-5' => 'pb-lg-5',
    'pb-lg-6' => 'pb-lg-6',
    'pb-lg-8' => 'pb-lg-8',
  );
}

/**
 * Return an array of StoutLogic/ACF options for headline style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_headline_style_options() {
  return array(
    ''                 => 'Default',
    'top-seperator'    => 'Seperator - Top',
    'bottom-seperator' => 'Seperator - Bottom',
    'bottom-seperator-primary' => 'Seperator - Bottom Primary',
    'bottom-seperator-primary-thick' => 'Seperator - Bottom Primary (thick)',
    'bottom-seperator-secondary' => 'Seperator - Bottom Secondary',
    'bottom-seperator-secondary-thick' => 'Seperator - Bottom Secondary (thick)',
    //'primary-box-one' => "Box - Primary 1",
    //'primary-box-two' => "Box - Primary 2",
    //'primary-box-one' => "Box - Secondary 1",
    //'primary-box-two' => "Box - Secondary 2",
    'primary-dots-one' => "Box - Primary Dots",
    'secondary-dots-one' => "Box - Secondary Dots",
  );
}

/**
 * Return an array of StoutLogic/ACF options for headline style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_headline_top_bar_options() {
  return array(
    'primary' => "Primary Bar Top",
    'gray' => "Gray Bar Top",
    'gray-light' => "Gray (light) Bar Top",
    'black' => "Black Bar Top",
    'white' => "White Bar Top",
  );
}

/**
 * Return an array of StoutLogic/ACF options for headline tag options.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_headline_tag_options() {
  return array(
    ''   => 'Default',
    'h1' => "H1 (use with caution)",
    'h2' => "H2",
    'h3' => "H3",
    'h4' => "H4",
    'h5' => "H5",
    'strong' => "Strong",
    'div' => "Div",
  );
}

/**
 * Return an array of StoutLogic/ACF options for image size options.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_width_options() {
  return array(
    ''   => 'Default',
    'mw-30px' => "Width 30px",
    'mw-45px' => "Width 45px",
    'mw-60px' => "Width 60px",
    'mw-75px' => "Width 75px",
    'mw-100px' => "Width 100px",
    'mw-150px' => "Width 150px",
    'mw-200px' => "Width 200px",
    'mw-250px' => "Width 250px",
    'mw-300px' => "Width 300px",
    'mw-350px' => "Width 350px",
    'mw-400px' => "Width 400px",
    'w-25' => "Width 25%",
    'w-50' => "Width 50%",
    'w-75' => "Width 75%",
    'w-100' => "Width 100%",
  );
}

/**
 * Return an array of StoutLogic/ACF options for card link types.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_card_link_type_options() {
  return array(
    '' => 'Default',
    'card-link' => 'Whole Card (Show Link)',
    'card-link-hidden' => 'Whole Card (Hide Link)',
    'footer-link' => 'Card Footer Link',
    'post-card-link' => 'Below Card Link',
  );
}

/**
 * Return an array of StoutLogic/ACF options for text link style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_link_text_style_options() {
  return array(
    'link-primary'          => 'Primary',
    'link-secondary'        => 'Secondary',
    'link-secondary-orange' => 'Orange',
    'link-secondary-green'  => 'Green',
    'link-secondary-purple' => 'Purple',
    'link-gray'             => 'Gray',
    'link-light'            => 'Light',
    'link-dark'             => 'Dark',
  );
}

/**
 * Return an array of StoutLogic/ACF options for text link style classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_link_text_icon_options() {
  return array(
    ''            => "None",
    'qcicons icon-chevron-right' => "Chevron right",
    'qcicons icon-arrow-right'   => "Arrow right",
  );
}

/**
 * Return an array of StoutLogic/ACF options for background.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_background_options() {
  return array(
    ''             => 'None',
    'bg-white'     => 'White',
    'bg-gray'      => 'Gray',
    'bg-light'     => 'Light',
    'bg-lighter'   => 'Lighter',
    'bg-primary'   => 'Primary',
    'bg-secondary' => 'Secondary',
    'bg-dark-blue' => 'Dark Blue',
    'bg-geek-blue' => 'Geek Blue',
    'bg-dark'      => 'Dark',
    'bg-darker'    => 'Darker',
    'bg-sec-orange'=> 'Orange',
    'bg-sec-green' => 'Green',
    'bg-sec-purple'=> 'Purple',
    'bg-sec-yellow'=> 'Yellow',
    'bg-sec-gold'=> 'Gold',
    'bg-sec-cyan'=> 'Cyan',
    'bg-sec-lime'=> 'Lime',
    'bg-sec-red'=> 'Red',
    'bg-sec-volcano'=> 'Volcano',
    'bg-sec-magenta'=> 'Magenta',
    'bg-lighter-to-white' => 'Lighter to white',
    'bg-white-to-lighter' => 'White to lighter',
    'bg-light-to-white'   => 'Light to white',
    'bg-white-to-light'   => 'White to light',
    'bg-light-to-lighter' => 'Light to lighter',
    'bg-lighter-to-light' => 'Lighter to light',
    'bg-dark-to-darker'   => 'Dark to darker',
    'bg-darker-to-dark'   => 'Darker to dark',
    'custom'              => 'Custom Color',
  );
}
/**
 * Return an array of StoutLogic/ACF options for background.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_card_background_options() {
  return array(
    ''             => 'None',
    'bg-white'     => 'White',
    'bg-gray'      => 'Gray',
    'bg-light'     => 'Light',
    'bg-lighter'   => 'Lighter',
    'bg-primary'   => 'Primary',
    'bg-secondary' => 'Secondary',
    'bg-dark-blue' => 'Dark Blue',
    'bg-geek-blue' => 'Geek Blue',
    'bg-dark'      => 'Dark',
    'bg-darker'    => 'Darker',
    'bg-orange'=> 'Orange',
    'bg-green' => 'Green',
    'bg-purple'=> 'Purple',
    'bg-yellow'=> 'Yellow',
    'bg-gold'=> 'Gold',
    'bg-cyan'=> 'Cyan',
    'bg-lime'=> 'Lime',
    'bg-red'=> 'Red',
    'bg-volcano'=> 'Volcano',
    'bg-magenta'=> 'Magenta',
    'bg-lighter-to-white' => 'Lighter to white',
    'bg-white-to-lighter' => 'White to lighter',
    'bg-light-to-white'   => 'Light to white',
    'bg-white-to-light'   => 'White to light',
    'bg-light-to-lighter' => 'Light to lighter',
    'bg-lighter-to-light' => 'Lighter to light',
    'bg-dark-to-darker'   => 'Dark to darker',
    'bg-darker-to-dark'   => 'Darker to dark',
  );
}

/**
 * Return an array of StoutLogic/ACF options for top fade background.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_bg_top_fade() {
  return array(
    '' => 'Default (none)',
    'bg-top-fade-to-white-25' => 'Top fade to white (25%)',
    'bg-top-fade-to-white-50' => 'Top fade to white (50%)',
    'bg-top-fade-to-white-75' => 'Top fade to white (75%)',
    'bg-top-fade-to-light-25' => 'Top fade to light (25%)',
    'bg-top-fade-to-light-50' => 'Top fade to light (50%)',
    'bg-top-fade-to-light-75' => 'Top fade to light (75%)',
    'bg-top-fade-to-lighter-25' => 'Top fade to lighter (25%)',
    'bg-top-fade-to-lighter-50' => 'Top fade to lighter (50%)',
    'bg-top-fade-to-lighter-75' => 'Top fade to lighter (75%)',
    'bg-top-fade-to-dark-25' => 'Top fade to dark (25%)',
    'bg-top-fade-to-dark-50' => 'Top fade to dark (50%)',
    'bg-top-fade-to-dark-75' => 'Top fade to dark (75%)',
    'bg-top-fade-to-darker-25' => 'Top fade to darker (25%)',
    'bg-top-fade-to-darker-50' => 'Top fade to darker (50%)',
    'bg-top-fade-to-darker-75' => 'Top fade to darker (75%)',
    'bg-top-fade-to-primary-25' => 'Top fade to primary (25%)',
    'bg-top-fade-to-primary-50' => 'Top fade to primary (50%)',
    'bg-top-fade-to-primary-75' => 'Top fade to primary (75%)',
    'bg-top-fade-to-secondary-25' => 'Top fade to secondary (25%)',
    'bg-top-fade-to-secondary-50' => 'Top fade to secondary (50%)',
    'bg-top-fade-to-secondary-75' => 'Top fade to secondary (75%)',
  );
}

/**
 * Return an array of StoutLogic/ACF options for bottom fade background.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_bg_bottom_fade() {
  return array(
    '' => 'Default (none)',
    'bg-bottom-fade-to-white-25' => 'Bottom fade to white (25%)',
    'bg-bottom-fade-to-white-50' => 'Bottom fade to white (50%)',
    'bg-bottom-fade-to-white-75' => 'Bottom fade to white (75%)',
    'bg-bottom-fade-to-light-25' => 'Bottom fade to light (25%)',
    'bg-bottom-fade-to-light-50' => 'Bottom fade to light (50%)',
    'bg-bottom-fade-to-light-75' => 'Bottom fade to light (75%)',
    'bg-bottom-fade-to-lighter-25' => 'Bottom fade to lighter (25%)',
    'bg-bottom-fade-to-lighter-50' => 'Bottom fade to lighter (50%)',
    'bg-bottom-fade-to-lighter-75' => 'Bottom fade to lighter (75%)',
    'bg-bottom-fade-to-dark-25' => 'Bottom fade to dark (25%)',
    'bg-bottom-fade-to-dark-50' => 'Bottom fade to dark (50%)',
    'bg-bottom-fade-to-dark-75' => 'Bottom fade to dark (75%)',
    'bg-bottom-fade-to-darker-25' => 'Bottom fade to darker (25%)',
    'bg-bottom-fade-to-darker-50' => 'Bottom fade to darker (50%)',
    'bg-bottom-fade-to-darker-75' => 'Bottom fade to darker (75%)',
    'bg-bottom-fade-to-primary-25' => 'Bottom fade to primary (25%)',
    'bg-bottom-fade-to-primary-50' => 'Bottom fade to primary (50%)',
    'bg-bottom-fade-to-primary-75' => 'Bottom fade to primary (75%)',
    'bg-bottom-fade-to-secondary-25' => 'Bottom fade to secondary (25%)',
    'bg-bottom-fade-to-secondary-50' => 'Bottom fade to secondary (50%)',
    'bg-bottom-fade-to-secondary-75' => 'Bottom fade to secondary (75%)',
  );
}

/**
 * Return an array of StoutLogic/ACF options for background patterns.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_background_pattern_options() {
  return array(
    ''                           => 'None',
    'bg-plus-bg-thin-lightest-xs' => 'bg-plus-bg-thin-lightest-xs',
    'bg-plus-bg-thin-lightest-sm' => 'bg-plus-bg-thin-lightest-sm',
    'bg-plus-bg-thin-lightest-md' => 'bg-plus-bg-thin-lightest-md',
    'bg-plus-bg-thin-lightest-lg' => 'bg-plus-bg-thin-lightest-lg',
    'bg-plus-bg-thin-lighter-xs' => 'bg-plus-bg-thin-lighter-xs',
    'bg-plus-bg-thin-lighter-sm' => 'bg-plus-bg-thin-lighter-sm',
    'bg-plus-bg-thin-lighter-md' => 'bg-plus-bg-thin-lighter-md',
    'bg-plus-bg-thin-lighter-lg' => 'bg-plus-bg-thin-lighter-lg',
    'bg-plus-bg-thin-light-xs'   => 'bg-plus-bg-thin-light-xs',
    'bg-plus-bg-thin-light-sm'   => 'bg-plus-bg-thin-light-sm',
    'bg-plus-bg-thin-light-md'   => 'bg-plus-bg-thin-light-md',
    'bg-plus-bg-thin-light-lg'   => 'bg-plus-bg-thin-light-lg',
    'bg-plus-bg-thin-gray-xs'    => 'bg-plus-bg-thin-gray-xs',
    'bg-plus-bg-thin-gray-sm'    => 'bg-plus-bg-thin-gray-sm',
    'bg-plus-bg-thin-gray-md'    => 'bg-plus-bg-thin-gray-md',
    'bg-plus-bg-thin-gray-lg'    => 'bg-plus-bg-thin-gray-lg',
    'bg-plus-bg-thin-dark-xs'    => 'bg-plus-bg-thin-dark-xs',
    'bg-plus-bg-thin-dark-sm'    => 'bg-plus-bg-thin-dark-sm',
    'bg-plus-bg-thin-dark-md'    => 'bg-plus-bg-thin-dark-md',
    'bg-plus-bg-thin-dark-lg'    => 'bg-plus-bg-thin-dark-lg',
  );
}

/**
 * Return an array of StoutLogic/ACF options for background.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_takeover_background_options() {
  return array(
    ''             => 'None',
    'bg-white'     => 'White',
    'bg-gray'      => 'Gray',
    'bg-light'     => 'Light',
    'bg-lighter'   => 'Lighter',
    'bg-primary'   => 'Primary',
    'bg-secondary' => 'Secondary',
    'bg-geek-blue' => 'Dark Blue',
    'bg-dark-blue' => 'Dark Blue',
    'bg-dark'      => 'Dark',
    'bg-darker'    => 'Darker',
    'bg-sec-orange'=> 'Orange',
    'bg-sec-green' => 'Green',
    'bg-sec-purple'=> 'Purple',
    'bg-sec-yellow'=> 'Yellow',
    'bg-sec-gold'=> 'Gold',
    'bg-sec-cyan'=> 'Cyan',
    'bg-sec-lime'=> 'Lime',
    'bg-sec-red'=> 'Red',
    'bg-sec-volcano'=> 'Volcano',
    'bg-sec-magenta'=> 'Magenta',
    'bg-lighter-to-white' => 'Lighter to white',
    'bg-white-to-lighter' => 'White to lighter',
    'bg-light-to-white'   => 'Light to white',
    'bg-white-to-light'   => 'White to light',
  );
}

/**
 * Return an array of StoutLogic/ACF options for section display.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_display_options() {
  return array(
    ''         => 'Enabled',
    'hidden'   => 'Hidden',
    'preview'  => 'Preview',
    'disabled' => 'Disabled',
  );
}

/**
 * Return an array of StoutLogic/ACF options for section links.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_link_type_class_options() {
  return array(
    'btn'  => 'Button',
    'link' => 'Text Link'
  );
}

/**
 * Return an array of StoutLogic/ACF options for section buttons.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_button_class_options() {
  return array(
    '' => 'Tertiary',
    'btn-primary'   => 'Primary',
    'btn-outline-primary'   => 'Primary outline',
    'btn-secondary' => 'Secondary',
    'btn-outline-secondary' => 'Secondary outline',
    'btn-light'     => 'Light',
    'btn-outline-light'     => 'Light outline',
    'btn-white'     => 'White',
    'btn-outline-white'     => 'White outline',
    'btn-dark'      => 'Dark',
    'btn-outline-dark'      => 'Dark outline',
    'btn-green'      => 'Green',
    'btn-outline-green'      => 'Green outline',
    'btn-purple'      => 'Purple',
    'btn-outline-purple'      => 'Purple outline',
    'btn-orange'      => 'Orange',
    'btn-outline-orange'      => 'Orange outline',
    //'btn-success'   => 'Success',
    //'btn-warning'   => 'Warning',
    //'btn-info'      => 'Info',
  );
}

/**
 * Return an array of StoutLogic/ACF options for section text links.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_text_link_class_options() {
  return array(
    'text-primary'   => 'Primary',
    'text-secondary' => 'Secondary',
    'text-purple'    => 'Purple',
    'text-orange'    => 'Orange',
    'text-green'     => 'Green',
    'text-success'   => 'Success',
    'text-warning'   => 'Warning',
    'text-info'      => 'Info',
    'text-light'     => 'Light',
    'text-lighter'   => 'Lighter',
    'text-dark'      => 'Dark',
    'text-darker'    => 'Darker',
    'text-white'     => 'White',
  );
}

/**
 * Return an array of StoutLogic/ACF options for column gutter size.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_column_gutters() {
  return array(
    '' => 'Default',
    'gutter-none' => 'Gutters none',
    'gutter-xs'   => 'Gutters xs',
    'gutter-sm'   => 'Gutters sm',
    'gutter-md'   => 'Gutters md',
    'gutter-lg'   => 'Gutters lg',
    'gutter-xl'   => 'Gutters xl',
    'gutter-xxl'  => 'Gutters xxl',
  );
}

/**
 * Return an array of StoutLogic/ACF options for section column classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_column_class_options() {
  return array(
    'col'     => 'col',
    'col-1'     => 'col-1',
    'col-2'     => 'col-2',
    'col-3'     => 'col-3',
    'col-4'     => 'col-4',
    'col-5'     => 'col-5',
    'col-6'     => 'col-6',
    'col-7'     => 'col-7',
    'col-8'     => 'col-8',
    'col-9'     => 'col-9',
    'col-10'    => 'col-10',
    'col-11'    => 'col-11',
    'col-12'    => 'col-12',
    'col-sm'    => 'col-sm',
    'col-sm-1'  => 'col-sm-1',
    'col-sm-2'  => 'col-sm-2',
    'col-sm-3'  => 'col-sm-3',
    'col-sm-4'  => 'col-sm-4',
    'col-sm-5'  => 'col-sm-5',
    'col-sm-6'  => 'col-sm-6',
    'col-sm-7'  => 'col-sm-7',
    'col-sm-8'  => 'col-sm-8',
    'col-sm-9'  => 'col-sm-9',
    'col-sm-10' => 'col-sm-10',
    'col-sm-11' => 'col-sm-11',
    'col-sm-12' => 'col-sm-12',
    'col-md'    => 'col-md',
    'col-md-1'  => 'col-md-1',
    'col-md-2'  => 'col-md-2',
    'col-md-3'  => 'col-md-3',
    'col-md-4'  => 'col-md-4',
    'col-md-5'  => 'col-md-5',
    'col-md-6'  => 'col-md-6',
    'col-md-7'  => 'col-md-7',
    'col-md-8'  => 'col-md-8',
    'col-md-9'  => 'col-md-9',
    'col-md-10' => 'col-md-10',
    'col-md-11' => 'col-md-11',
    'col-md-12' => 'col-md-12',
    'col-lg'    => 'col-lg',
    'col-lg-1'  => 'col-lg-1',
    'col-lg-2'  => 'col-lg-2',
    'col-lg-3'  => 'col-lg-3',
    'col-lg-4'  => 'col-lg-4',
    'col-lg-5'  => 'col-lg-5',
    'col-lg-6'  => 'col-lg-6',
    'col-lg-7'  => 'col-lg-7',
    'col-lg-8'  => 'col-lg-8',
    'col-lg-9'  => 'col-lg-9',
    'col-lg-10' => 'col-lg-10',
    'col-lg-11' => 'col-lg-11',
    'col-lg-12' => 'col-lg-12',
    'col-xl'    => 'col-xl',
    'col-xl-1'  => 'col-xl-1',
    'col-xl-2'  => 'col-xl-2',
    'col-xl-3'  => 'col-xl-3',
    'col-xl-4'  => 'col-xl-4',
    'col-xl-5'  => 'col-xl-5',
    'col-xl-6'  => 'col-xl-6',
    'col-xl-7'  => 'col-xl-7',
    'col-xl-8'  => 'col-xl-8',
    'col-xl-9'  => 'col-xl-9',
    'col-xl-10' => 'col-xl-10',
    'col-xl-11' => 'col-xl-11',
    'col-xl-12' => 'col-xl-12'
  );
}

/**
 * Return an array of StoutLogic/ACF options for padding classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_padding_class_options() {
  return array(
    'p-0'     => 'p-0',
    'p-1'     => 'p-1',
    'p-2'     => 'p-2',
    'p-3'     => 'p-3',
    'p-4'     => 'p-4',
    'p-5'     => 'p-5',
    'p-6'     => 'p-6',
    'p-7'     => 'p-7',
    'p-8'     => 'p-8',
    'p-9'     => 'p-9',
    'p-10'    => 'p-10',
    'p-11'    => 'p-11',
    'p-12'    => 'p-12',

    'px-0'    => 'px-0',
    'px-1'    => 'px-1',
    'px-2'    => 'px-2',
    'px-3'    => 'px-3',
    'px-4'    => 'px-4',
    'px-5'    => 'px-5',
    'px-6'    => 'px-6',
    'px-7'    => 'px-7',
    'px-8'    => 'px-8',
    'px-9'    => 'px-9',
    'px-10'   => 'px-10',
    'px-11'   => 'px-11',
    'px-12'   => 'px-12',

    'py-0'    => 'py-0',
    'py-1'    => 'py-1',
    'py-2'    => 'py-2',
    'py-3'    => 'py-3',
    'py-4'    => 'py-4',
    'py-5'    => 'py-5',
    'py-6'    => 'py-6',
    'py-7'    => 'py-7',
    'py-8'    => 'py-8',
    'py-9'    => 'py-9',
    'py-10'   => 'py-10',
    'py-11'   => 'py-11',
    'py-12'   => 'py-12',

    'pt-0'    => 'pt-0',
    'pt-1'    => 'pt-1',
    'pt-2'    => 'pt-2',
    'pt-3'    => 'pt-3',
    'pt-4'    => 'pt-4',
    'pt-5'    => 'pt-5',
    'pt-6'    => 'pt-6',
    'pt-7'    => 'pt-7',
    'pt-8'    => 'pt-8',
    'pt-9'    => 'pt-9',
    'pt-10'   => 'pt-10',
    'pt-11'   => 'pt-11',
    'pt-12'   => 'pt-12',
    'pt-14'   => 'pt-14',

    'pb-0'    => 'pb-0',
    'pb-1'    => 'pb-1',
    'pb-2'    => 'pb-2',
    'pb-3'    => 'pb-3',
    'pb-4'    => 'pb-4',
    'pb-5'    => 'pb-5',
    'pb-6'    => 'pb-6',
    'pb-7'    => 'pb-7',
    'pb-8'    => 'pb-8',
    'pb-9'    => 'pb-9',
    'pb-10'   => 'pb-10',
    'pb-11'   => 'pb-11',
    'pb-12'   => 'pb-12',
    'pb-14'   => 'pb-14',

    'p-md-0'  => 'p-md-0',
    'p-md-1'  => 'p-md-1',
    'p-md-2'  => 'p-md-2',
    'p-md-3'  => 'p-md-3',
    'p-md-4'  => 'p-md-4',
    'p-md-5'  => 'p-md-5',
    'p-md-6'  => 'p-md-6',
    'p-md-7'  => 'p-md-7',
    'p-md-8'  => 'p-md-8',
    'p-md-9'  => 'p-md-9',
    'p-md-10'  => 'p-md-10',
    'p-md-11'  => 'p-md-11',
    'p-md-12'  => 'p-md-12',
    'p-md-14'  => 'p-md-14',
    'p-md-16'  => 'p-md-16',

    'px-md-0' => 'px-md-0',
    'px-md-1' => 'px-md-1',
    'px-md-2' => 'px-md-2',
    'px-md-3' => 'px-md-3',
    'px-md-4' => 'px-md-4',
    'px-md-5' => 'px-md-5',
    'px-md-6' => 'px-md-6',
    'px-md-7' => 'px-md-7',
    'px-md-8' => 'px-md-8',
    'px-md-9' => 'px-md-9',
    'px-md-10' => 'px-md-10',
    'px-md-11' => 'px-md-11',
    'px-md-12' => 'px-md-12',
    'px-md-14' => 'px-md-14',

    'py-md-0' => 'py-md-0',
    'py-md-1' => 'py-md-1',
    'py-md-2' => 'py-md-2',
    'py-md-3' => 'py-md-3',
    'py-md-4' => 'py-md-4',
    'py-md-5' => 'py-md-5',
    'py-md-6' => 'py-md-6',
    'py-md-7' => 'py-md-7',
    'py-md-8' => 'py-md-8',
    'py-md-9' => 'py-md-9',
    'py-md-10' => 'py-md-10',
    'py-md-11' => 'py-md-11',
    'py-md-12' => 'py-md-12',
    'py-md-14' => 'py-md-14',
    'py-md-16' => 'py-md-16',

    'pt-md-0' => 'pt-md-0',
    'pt-md-1' => 'pt-md-1',
    'pt-md-2' => 'pt-md-2',
    'pt-md-3' => 'pt-md-3',
    'pt-md-4' => 'pt-md-4',
    'pt-md-5' => 'pt-md-5',
    'pt-md-6' => 'pt-md-6',
    'pt-md-7' => 'pt-md-7',
    'pt-md-8' => 'pt-md-8',
    'pt-md-9' => 'pt-md-9',
    'pt-md-10' => 'pt-md-10',
    'pt-md-11' => 'pt-md-11',
    'pt-md-12' => 'pt-md-12',
    'pt-md-14' => 'pt-md-14',
    'pt-md-16' => 'pt-md-16',

    'pb-md-0' => 'pb-md-0',
    'pb-md-1' => 'pb-md-1',
    'pb-md-2' => 'pb-md-2',
    'pb-md-3' => 'pb-md-3',
    'pb-md-4' => 'pb-md-4',
    'pb-md-5' => 'pb-md-5',
    'pb-md-6' => 'pb-md-6',
    'pb-md-7' => 'pb-md-7',
    'pb-md-8' => 'pb-md-8',
    'pb-md-9' => 'pb-md-9',
    'pb-md-10' => 'pb-md-10',
    'pb-md-11' => 'pb-md-11',
    'pb-md-12' => 'pb-md-12',
    'pb-md-14' => 'pb-md-14',
    'pb-md-16' => 'pb-md-16',

    'p-lg-0'  => 'p-lg-0',
    'p-lg-1'  => 'p-lg-1',
    'p-lg-2'  => 'p-lg-2',
    'p-lg-3'  => 'p-lg-3',
    'p-lg-4'  => 'p-lg-4',
    'p-lg-5'  => 'p-lg-5',
    'p-lg-6'  => 'p-lg-6',
    'p-lg-7'  => 'p-lg-7',
    'p-lg-8'  => 'p-lg-8',
    'p-lg-9'  => 'p-lg-9',
    'p-lg-10'  => 'p-lg-10',
    'p-lg-11'  => 'p-lg-11',
    'p-lg-12'  => 'p-lg-12',
    'p-lg-14'  => 'p-lg-14',
    'p-lg-16'  => 'p-lg-16',

    'px-lg-0' => 'px-lg-0',
    'px-lg-1' => 'px-lg-1',
    'px-lg-2' => 'px-lg-2',
    'px-lg-3' => 'px-lg-3',
    'px-lg-4' => 'px-lg-4',
    'px-lg-5' => 'px-lg-5',
    'px-lg-6' => 'px-lg-6',
    'px-lg-7' => 'px-lg-7',
    'px-lg-8' => 'px-lg-8',
    'px-lg-9' => 'px-lg-9',
    'px-lg-10' => 'px-lg-10',
    'px-lg-11' => 'px-lg-11',
    'px-lg-12' => 'px-lg-12',
    'px-lg-14' => 'px-lg-14',
    'px-lg-16' => 'px-lg-16',

    'py-lg-0' => 'py-lg-0',
    'py-lg-1' => 'py-lg-1',
    'py-lg-2' => 'py-lg-2',
    'py-lg-3' => 'py-lg-3',
    'py-lg-4' => 'py-lg-4',
    'py-lg-5' => 'py-lg-5',
    'py-lg-6' => 'py-lg-6',
    'py-lg-7' => 'py-lg-7',
    'py-lg-8' => 'py-lg-8',
    'py-lg-9' => 'py-lg-9',
    'py-lg-10' => 'py-lg-10',
    'py-lg-11' => 'py-lg-11',
    'py-lg-12' => 'py-lg-12',
    'py-lg-14' => 'py-lg-14',
    'py-lg-16' => 'py-lg-16',

    'pt-lg-0' => 'pt-lg-0',
    'pt-lg-1' => 'pt-lg-1',
    'pt-lg-2' => 'pt-lg-2',
    'pt-lg-3' => 'pt-lg-3',
    'pt-lg-4' => 'pt-lg-4',
    'pt-lg-5' => 'pt-lg-5',
    'pt-lg-6' => 'pt-lg-6',
    'pt-lg-7' => 'pt-lg-7',
    'pt-lg-8' => 'pt-lg-8',
    'pt-lg-9' => 'pt-lg-9',
    'pt-lg-10' => 'pt-lg-10',
    'pt-lg-11' => 'pt-lg-11',
    'pt-lg-12' => 'pt-lg-12',
    'pt-lg-14' => 'pt-lg-14',
    'pt-lg-16' => 'pt-lg-16',

    'pb-lg-0' => 'pb-lg-0',
    'pb-lg-1' => 'pb-lg-1',
    'pb-lg-2' => 'pb-lg-2',
    'pb-lg-3' => 'pb-lg-3',
    'pb-lg-4' => 'pb-lg-4',
    'pb-lg-5' => 'pb-lg-5',
    'pb-lg-6' => 'pb-lg-6',
    'pb-lg-7' => 'pb-lg-7',
    'pb-lg-8' => 'pb-lg-8',
    'pb-lg-9' => 'pb-lg-9',
    'pb-lg-10' => 'pb-lg-10',
    'pb-lg-11' => 'pb-lg-11',
    'pb-lg-12' => 'pb-lg-12',
    'pb-lg-14' => 'pb-lg-14',
    'pb-lg-16' => 'pb-lg-16',
  );
}
/**
 * Return an array of StoutLogic/ACF options for vertical padding classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_vertical_padding_class_options() {
  return array(
    'py-0'    => 'py-0',
    'py-1'    => 'py-1',
    'py-2'    => 'py-2',
    'py-3'    => 'py-3',
    'py-4'    => 'py-4',
    'py-5'    => 'py-5',
    'py-6'    => 'py-6',
    'py-7'    => 'py-7',
    'py-8'    => 'py-8',
    'py-9'    => 'py-9',
    'py-10'   => 'py-10',
    'py-11'   => 'py-11',
    'py-12'   => 'py-12',
    'pt-0'    => 'pt-0',
    'pt-1'    => 'pt-1',
    'pt-2'    => 'pt-2',
    'pt-3'    => 'pt-3',
    'pt-4'    => 'pt-4',
    'pt-5'    => 'pt-5',
    'pt-6'    => 'pt-6',
    'pt-7'    => 'pt-7',
    'pt-8'    => 'pt-8',
    'pt-9'    => 'pt-9',
    'pt-10'   => 'pt-10',
    'pt-11'   => 'pt-11',
    'pt-12'   => 'pt-12',
    'pb-0'    => 'pb-0',
    'pb-1'    => 'pb-1',
    'pb-2'    => 'pb-2',
    'pb-3'    => 'pb-3',
    'pb-4'    => 'pb-4',
    'pb-5'    => 'pb-5',
    'pb-6'    => 'pb-6',
    'pb-7'    => 'pb-7',
    'pb-8'    => 'pb-8',
    'pb-9'    => 'pb-9',
    'pb-10'   => 'pb-10',
    'pb-11'   => 'pb-11',
    'pb-12'   => 'pb-12',
    'py-md-0' => 'py-md-0',
    'py-md-1' => 'py-md-1',
    'py-md-2' => 'py-md-2',
    'py-md-3' => 'py-md-3',
    'py-md-4' => 'py-md-4',
    'py-md-5' => 'py-md-5',
    'py-md-6' => 'py-md-6',
    'py-md-7' => 'py-md-7',
    'py-md-8' => 'py-md-8',
    'py-md-9' => 'py-md-9',
    'py-md-10' => 'py-md-10',
    'py-md-11' => 'py-md-11',
    'py-md-12' => 'py-md-12',
    'pt-md-0' => 'pt-md-0',
    'pt-md-1' => 'pt-md-1',
    'pt-md-2' => 'pt-md-2',
    'pt-md-3' => 'pt-md-3',
    'pt-md-4' => 'pt-md-4',
    'pt-md-5' => 'pt-md-5',
    'pt-md-6' => 'pt-md-6',
    'pt-md-7' => 'pt-md-7',
    'pt-md-8' => 'pt-md-8',
    'pt-md-9' => 'pt-md-9',
    'pt-md-10' => 'pt-md-10',
    'pt-md-11' => 'pt-md-11',
    'pt-md-12' => 'pt-md-12',
    'pb-md-0' => 'pb-md-0',
    'pb-md-1' => 'pb-md-1',
    'pb-md-2' => 'pb-md-2',
    'pb-md-3' => 'pb-md-3',
    'pb-md-4' => 'pb-md-4',
    'pb-md-5' => 'pb-md-5',
    'pb-md-6' => 'pb-md-6',
    'pb-md-7' => 'pb-md-7',
    'pb-md-8' => 'pb-md-8',
    'pb-md-9' => 'pb-md-9',
    'pb-md-10' => 'pb-md-10',
    'pb-md-11' => 'pb-md-11',
    'pb-md-12' => 'pb-md-12',
    'py-lg-0' => 'py-lg-0',
    'py-lg-1' => 'py-lg-1',
    'py-lg-2' => 'py-lg-2',
    'py-lg-3' => 'py-lg-3',
    'py-lg-4' => 'py-lg-4',
    'py-lg-5' => 'py-lg-5',
    'py-lg-6' => 'py-lg-6',
    'py-lg-7' => 'py-lg-7',
    'py-lg-8' => 'py-lg-8',
    'py-lg-9' => 'py-lg-9',
    'py-lg-10' => 'py-lg-10',
    'py-lg-11' => 'py-lg-11',
    'py-lg-12' => 'py-lg-12',
    'pt-lg-0' => 'pt-lg-0',
    'pt-lg-1' => 'pt-lg-1',
    'pt-lg-2' => 'pt-lg-2',
    'pt-lg-3' => 'pt-lg-3',
    'pt-lg-4' => 'pt-lg-4',
    'pt-lg-5' => 'pt-lg-5',
    'pt-lg-6' => 'pt-lg-6',
    'pt-lg-7' => 'pt-lg-7',
    'pt-lg-8' => 'pt-lg-8',
    'pt-lg-9' => 'pt-lg-9',
    'pt-lg-10' => 'pt-lg-10',
    'pt-lg-11' => 'pt-lg-11',
    'pt-lg-12' => 'pt-lg-12',
    'pb-lg-0' => 'pb-lg-0',
    'pb-lg-1' => 'pb-lg-1',
    'pb-lg-2' => 'pb-lg-2',
    'pb-lg-3' => 'pb-lg-3',
    'pb-lg-4' => 'pb-lg-4',
    'pb-lg-5' => 'pb-lg-5',
    'pb-lg-6' => 'pb-lg-6',
    'pb-lg-7' => 'pb-lg-7',
    'pb-lg-8' => 'pb-lg-8',
    'pb-lg-9' => 'pb-lg-9',
    'pb-lg-10' => 'pb-lg-10',
    'pb-lg-11' => 'pb-lg-11',
    'pb-lg-12' => 'pb-lg-12',
  );
}
/**
 * Return an array of StoutLogic/ACF options for vertical margin classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_vertical_margin_class_options() {
  return array(
    'my-0'    => 'my-0',
    'my-1'    => 'my-1',
    'my-2'    => 'my-2',
    'my-3'    => 'my-3',
    'my-4'    => 'my-4',
    'my-5'    => 'my-5',
    'my-6'    => 'my-6',
    'my-8'    => 'my-8',
    'my-9'    => 'my-9',
    'my-10'   => 'my-10',
    'my-11'   => 'my-11',
    'my-12'   => 'my-12',
    'mt-0'    => 'mt-0',
    'mt-1'    => 'mt-1',
    'mt-2'    => 'mt-2',
    'mt-3'    => 'mt-3',
    'mt-4'    => 'mt-4',
    'mt-5'    => 'mt-5',
    'mt-6'    => 'mt-6',
    'mt-8'    => 'mt-8',
    'mt-9'    => 'mt-9',
    'mt-10'   => 'mt-10',
    'mt-11'   => 'mt-11',
    'mt-12'   => 'mt-12',
    'mb-0'    => 'mb-0',
    'mb-1'    => 'mb-1',
    'mb-2'    => 'mb-2',
    'mb-3'    => 'mb-3',
    'mb-4'    => 'mb-4',
    'mb-5'    => 'mb-5',
    'mb-6'    => 'mb-6',
    'mb-8'    => 'mb-8',
    'mb-9'    => 'mb-9',
    'mb-10'    => 'mb-10',
    'mb-11'    => 'mb-11',
    'mb-12'    => 'mb-12',
    'my-md-0' => 'my-md-0',
    'my-md-1' => 'my-md-1',
    'my-md-2' => 'my-md-2',
    'my-md-3' => 'my-md-3',
    'my-md-4' => 'my-md-4',
    'my-md-5' => 'my-md-5',
    'my-md-6' => 'my-md-6',
    'my-md-8' => 'my-md-8',
    'my-md-9' => 'my-md-9',
    'my-md-10' => 'my-md-10',
    'my-md-11' => 'my-md-11',
    'my-md-12' => 'my-md-12',
    'mt-md-0' => 'mt-md-0',
    'mt-md-1' => 'mt-md-1',
    'mt-md-2' => 'mt-md-2',
    'mt-md-3' => 'mt-md-3',
    'mt-md-4' => 'mt-md-4',
    'mt-md-5' => 'mt-md-5',
    'mt-md-6' => 'mt-md-6',
    'mt-md-8' => 'mt-md-8',
    'mt-md-9' => 'mt-md-9',
    'mt-md-10' => 'mt-md-10',
    'mt-md-11' => 'mt-md-11',
    'mt-md-12' => 'mt-md-12',
    'mb-md-0' => 'mb-md-0',
    'mb-md-1' => 'mb-md-1',
    'mb-md-2' => 'mb-md-2',
    'mb-md-3' => 'mb-md-3',
    'mb-md-4' => 'mb-md-4',
    'mb-md-5' => 'mb-md-5',
    'mb-md-6' => 'mb-md-6',
    'mb-md-8' => 'mb-md-8',
    'mb-md-9' => 'mb-md-9',
    'mb-md-10' => 'mb-md-10',
    'mb-md-11' => 'mb-md-11',
    'mb-md-12' => 'mb-md-12',
    'my-lg-0' => 'my-lg-0',
    'my-lg-1' => 'my-lg-1',
    'my-lg-2' => 'my-lg-2',
    'my-lg-3' => 'my-lg-3',
    'my-lg-4' => 'my-lg-4',
    'my-lg-5' => 'my-lg-5',
    'my-lg-6' => 'my-lg-6',
    'my-lg-8' => 'my-lg-8',
    'my-lg-9' => 'my-lg-9',
    'my-lg-10' => 'my-lg-10',
    'my-lg-11' => 'my-lg-11',
    'my-lg-12' => 'my-lg-12',
    'mt-lg-0' => 'mt-lg-0',
    'mt-lg-1' => 'mt-lg-1',
    'mt-lg-2' => 'mt-lg-2',
    'mt-lg-3' => 'mt-lg-3',
    'mt-lg-4' => 'mt-lg-4',
    'mt-lg-5' => 'mt-lg-5',
    'mt-lg-6' => 'mt-lg-6',
    'mt-lg-8' => 'mt-lg-8',
    'mt-lg-9' => 'mt-lg-9',
    'mt-lg-10' => 'mt-lg-10',
    'mt-lg-11' => 'mt-lg-11',
    'mt-lg-12' => 'mt-lg-12',
    'mb-lg-0' => 'mb-lg-0',
    'mb-lg-1' => 'mb-lg-1',
    'mb-lg-2' => 'mb-lg-2',
    'mb-lg-3' => 'mb-lg-3',
    'mb-lg-4' => 'mb-lg-4',
    'mb-lg-5' => 'mb-lg-5',
    'mb-lg-6' => 'mb-lg-6',
    'mb-lg-8' => 'mb-lg-8',
    'mb-lg-9' => 'mb-lg-9',
    'mb-lg-10' => 'mb-lg-10',
    'mb-lg-11' => 'mb-lg-11',
    'mb-lg-12' => 'mb-lg-12',
  );
}

/**
 * Return an array of StoutLogic/ACF options for margin classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_margin_class_options() {
  return array(

    'm-0' => 'm-0',
    'm-1' => 'm-1',
    'm-2' => 'm-2',
    'm-3' => 'm-3',
    'm-4' => 'm-4',
    'm-5' => 'm-5',
    'm-6' => 'm-6',
    'm-7' => 'm-7',
    'm-8' => 'm-8',
    'm-9' => 'm-9',
    'm-10' => 'm-10',
    'm-11' => 'm-11',
    'm-12' => 'm-12',

    'mx-0' => 'mx-0',
    'mx-1' => 'mx-1',
    'mx-2' => 'mx-2',
    'mx-3' => 'mx-3',
    'mx-4' => 'mx-4',
    'mx-5' => 'mx-5',
    'mx-6' => 'mx-6',
    'mx-7' => 'mx-7',
    'mx-8' => 'mx-8',
    'mx-9' => 'mx-9',
    'mx-10' => 'mx-10',
    'mx-11' => 'mx-11',
    'mx-12' => 'mx-12',

    'my-0' => 'my-0',
    'my-1' => 'my-1',
    'my-2' => 'my-2',
    'my-3' => 'my-3',
    'my-4' => 'my-4',
    'my-5' => 'my-5',
    'my-6' => 'my-6',
    'my-7' => 'my-7',
    'my-8' => 'my-8',
    'my-9' => 'my-9',
    'my-10' => 'my-10',
    'my-11' => 'my-11',
    'my-12' => 'my-12',

    'mt-0' => 'mt-0',
    'mt-1' => 'mt-1',
    'mt-2' => 'mt-2',
    'mt-3' => 'mt-3',
    'mt-4' => 'mt-4',
    'mt-5' => 'mt-5',
    'mt-6' => 'mt-6',
    'mt-7' => 'mt-7',
    'mt-8' => 'mt-8',
    'mt-9' => 'mt-9',
    'mt-10' => 'mt-10',
    'mt-11' => 'mt-11',
    'mt-12' => 'mt-12',

    'mb-0' => 'mb-0',
    'mb-1' => 'mb-1',
    'mb-2' => 'mb-2',
    'mb-3' => 'mb-3',
    'mb-4' => 'mb-4',
    'mb-5' => 'mb-5',
    'mb-6' => 'mb-6',
    'mb-7' => 'mb-7',
    'mb-8' => 'mb-8',
    'mb-9' => 'mb-9',
    'mb-10' => 'mb-10',
    'mb-11' => 'mb-11',
    'mb-12' => 'mb-12',

    'm-md-0' => 'm-md-0',
    'm-md-1' => 'm-md-1',
    'm-md-2' => 'm-md-2',
    'm-md-3' => 'm-md-3',
    'm-md-4' => 'm-md-4',
    'm-md-5' => 'm-md-5',
    'm-md-6' => 'm-md-6',
    'm-md-7' => 'm-md-7',
    'm-md-8' => 'm-md-8',
    'm-md-9' => 'm-md-9',
    'm-md-10' => 'm-md-10',
    'm-md-11' => 'm-md-11',
    'm-md-12' => 'm-md-12',

    'mx-md-0' => 'mx-md-0',
    'mx-md-1' => 'mx-md-1',
    'mx-md-2' => 'mx-md-2',
    'mx-md-3' => 'mx-md-3',
    'mx-md-4' => 'mx-md-4',
    'mx-md-5' => 'mx-md-5',
    'mx-md-6' => 'mx-md-6',
    'mx-md-7' => 'mx-md-7',
    'mx-md-8' => 'mx-md-8',
    'mx-md-9' => 'mx-md-9',
    'mx-md-10' => 'mx-md-10',
    'mx-md-11' => 'mx-md-11',
    'mx-md-12' => 'mx-md-12',

    'my-md-0' => 'my-md-0',
    'my-md-1' => 'my-md-1',
    'my-md-2' => 'my-md-2',
    'my-md-3' => 'my-md-3',
    'my-md-4' => 'my-md-4',
    'my-md-5' => 'my-md-5',
    'my-md-6' => 'my-md-6',
    'my-md-7' => 'my-md-7',
    'my-md-8' => 'my-md-8',
    'my-md-9' => 'my-md-9',
    'my-md-10' => 'my-md-10',
    'my-md-11' => 'my-md-11',
    'my-md-12' => 'my-md-12',

    'mt-md-0' => 'mt-md-0',
    'mt-md-1' => 'mt-md-1',
    'mt-md-2' => 'mt-md-2',
    'mt-md-3' => 'mt-md-3',
    'mt-md-4' => 'mt-md-4',
    'mt-md-5' => 'mt-md-5',
    'mt-md-6' => 'mt-md-6',
    'mt-md-7' => 'mt-md-7',
    'mt-md-8' => 'mt-md-8',
    'mt-md-9' => 'mt-md-9',
    'mt-md-10' => 'mt-md-10',
    'mt-md-11' => 'mt-md-11',
    'mt-md-12' => 'mt-md-12',

    'mb-md-0' => 'mb-md-0',
    'mb-md-1' => 'mb-md-1',
    'mb-md-2' => 'mb-md-2',
    'mb-md-3' => 'mb-md-3',
    'mb-md-4' => 'mb-md-4',
    'mb-md-5' => 'mb-md-5',
    'mb-md-6' => 'mb-md-6',
    'mb-md-7' => 'mb-md-7',
    'mb-md-8' => 'mb-md-8',
    'mb-md-9' => 'mb-md-9',
    'mb-md-10' => 'mb-md-10',
    'mb-md-11' => 'mb-md-11',
    'mb-md-12' => 'mb-md-12',

    'm-lg-0' => 'm-lg-0',
    'm-lg-1' => 'm-lg-1',
    'm-lg-2' => 'm-lg-2',
    'm-lg-3' => 'm-lg-3',
    'm-lg-4' => 'm-lg-4',
    'm-lg-5' => 'm-lg-5',
    'm-lg-6' => 'm-lg-6',
    'm-lg-7' => 'm-lg-7',
    'm-lg-8' => 'm-lg-8',
    'm-lg-9' => 'm-lg-9',
    'm-lg-10' => 'm-lg-10',
    'm-lg-11' => 'm-lg-11',
    'm-lg-12' => 'm-lg-12',

    'mx-lg-0' => 'mx-lg-0',
    'mx-lg-1' => 'mx-lg-1',
    'mx-lg-2' => 'mx-lg-2',
    'mx-lg-3' => 'mx-lg-3',
    'mx-lg-4' => 'mx-lg-4',
    'mx-lg-5' => 'mx-lg-5',
    'mx-lg-6' => 'mx-lg-6',
    'mx-lg-7' => 'mx-lg-7',
    'mx-lg-8' => 'mx-lg-8',
    'mx-lg-9' => 'mx-lg-9',
    'mx-lg-10' => 'mx-lg-10',
    'mx-lg-11' => 'mx-lg-11',
    'mx-lg-12' => 'mx-lg-12',

    'my-lg-0' => 'my-lg-0',
    'my-lg-1' => 'my-lg-1',
    'my-lg-2' => 'my-lg-2',
    'my-lg-3' => 'my-lg-3',
    'my-lg-4' => 'my-lg-4',
    'my-lg-5' => 'my-lg-5',
    'my-lg-6' => 'my-lg-6',
    'my-lg-7' => 'my-lg-7',
    'my-lg-8' => 'my-lg-8',
    'my-lg-9' => 'my-lg-9',
    'my-lg-10' => 'my-lg-10',
    'my-lg-11' => 'my-lg-11',
    'my-lg-12' => 'my-lg-12',

    'mt-lg-0' => 'mt-lg-0',
    'mt-lg-1' => 'mt-lg-1',
    'mt-lg-2' => 'mt-lg-2',
    'mt-lg-3' => 'mt-lg-3',
    'mt-lg-4' => 'mt-lg-4',
    'mt-lg-5' => 'mt-lg-5',
    'mt-lg-6' => 'mt-lg-6',
    'mt-lg-7' => 'mt-lg-7',
    'mt-lg-8' => 'mt-lg-8',
    'mt-lg-9' => 'mt-lg-9',
    'mt-lg-10' => 'mt-lg-10',
    'mt-lg-11' => 'mt-lg-11',
    'mt-lg-12' => 'mt-lg-12',

    'mb-lg-0' => 'mb-lg-0',
    'mb-lg-1' => 'mb-lg-1',
    'mb-lg-2' => 'mb-lg-2',
    'mb-lg-3' => 'mb-lg-3',
    'mb-lg-4' => 'mb-lg-4',
    'mb-lg-5' => 'mb-lg-5',
    'mb-lg-6' => 'mb-lg-6',
    'mb-lg-7' => 'mb-lg-7',
    'mb-lg-8' => 'mb-lg-8',
    'mb-lg-9' => 'mb-lg-9',
    'mb-lg-10' => 'mb-lg-10',
    'mb-lg-11' => 'mb-lg-11',
    'mb-lg-12' => 'mb-lg-12',
  );
}

/**
 * Return an array of StoutLogic/ACF options for bootstrap image shape classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_shape_options() {
   return array(
     '' => "Default",
     'squre'          => "Square",
     'rounded'        => "Rounded",
     'rounded-circle' => "Circle",
   );
 }

/**
 * Return an array of StoutLogic/ACF options for margin classes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_size_options() {
   return array(
     'full'         => "Original (Full)",
     'landscape_lg' => "Landscape",
     'landscape_sm' => "Landscape (sm)",
     'square_lg'    => "Square",
     'square_sm'    => "Square (sm)",
     'portrait_lg'  => "Portrait",
     'portrait_sm'  => "Portrait (sm)",
     'panoramic_lg' => "Panoramic",
     'panoramic_sm' => "Panoramic (sm)",
     'screen_lg'    => "Screen",
     'screen_sm'    => "Screen (sm)",
     'logo_sm'      => "Logo (sm)",
     'thumbnail'    => "Thumbnail",
     'small'        => "Small",
     'medium'       => "Medium",
     'large'        => "Large",
   );
 }

/**
 * Return an array of StoutLogic/ACF options for lazy load image options.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_image_load_options() {
   return array(
     ''             => "Lazy load",
     'placeholder'  => "Lazy load with placeholder",
     'no-lazy'      => "No lazy load (worst for page load speed)",
   );
 }

/**
 * Return an array of StoutLogic/ACF options for image sizes.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_all_image_size_options() {
   return array(
     'landscape_sm' => "Landscape (sm)",
     'landscape_md' => "Landscape (md)",
     'landscape_lg' => "Landscape (lg)",
     'landscape_xl' => "Landscape (xl)",
     'landscape_2x' => "Landscape (2x)",
     'square_sm'    => "Square (sm)",
     'square_md'    => "Square (md)",
     'square_lg'    => "Square (lg)",
     'square_xl'    => "Square (xl)",
     'square_2x'    => "Square (2x)",
     'portrait_sm'  => "Portrait (sm)",
     'portrait_md'  => "Portrait (md)",
     'portrait_lg'  => "Portrait (lg)",
     'portrait_xl'  => "Portrait (xl)",
     'portrait_2x'  => "Portrait (2x)",
     'panoramic_sm' => "Panoramic (sm)",
     'panoramic_md' => "Panoramic (md)",
     'panoramic_lg' => "Panoramic (lg)",
     'panoramic_xl' => "Panoramic (xl)",
     'panoramic_2x' => "Panoramic (2x)",
     'screen_sm'    => "Screen (sm)",
     'screen_md'    => "Screen (md)",
     'screen_lg'    => "Screen (lg)",
     'screen_xl'    => "Screen (xl)",
     'screen_2x'    => "Screen (2x)",
     'logo_sm'      => "Logo (sm)",
     'logo_lg'      => "Logo (lg)",
     'logo_xl'      => "Logo (xl)",
   );
 }

/**
 * Return an array of StoutLogic/ACF options for link contexts.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_link_context_options() {
  return array(
    'contact'       => '--- Contact Sales ---',
    'product-name-1'=> 'Product One',
    'product-name-2'=> 'Product Two',
  );
}

/**
 * Return an array of StoutLogic/ACF options for section contexts.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_context_options() {
  return array(
    ''               => 'Select...',
    'hero'           => 'Hero',
    'stats'          => 'Stats',
    'logos'          => 'Logos',
    'cta'            => 'CTA',
    'contact'        => 'Contact',
    'help'           => 'Help',
    'cards'          => 'Cards',
    'products'       => 'Products',
    'features'       => 'Features',
    'demo'           => 'Demo',
    'newsletter'     => 'Signup',
    'case study'     => 'Case study',
    'customers'      => 'Customers',
    'resources'      => 'Resources',
    'blog'           => 'Blog',
    'video'          => 'Video',
    'webinar'        => 'Webinar',
    'press'          => 'Press',
    'value prop'     => 'Value prop',
    'tabs'           => 'Tabs',
    'platform'       => 'Platform',

  );
}

/**
 * Return an array of StoutLogic/ACF options for section analytics contexts.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_analytics_context_options() {
  return array(
    ''               => 'Select...',
    'hero'           => 'Hero',
    'stats'          => 'Stats',
    'customers'      => '--- Customers ---',
    'customer logos' => 'Customer Logos',
    'case study'     => 'Case Study',
    'quote' => 'Quote',
    'cta'            => '--- CTA ---',
    'cta contact'    => 'Contact (CTA)',
    'cta demo'       => 'Demo (CTA)',
    'cta newsletter' => 'Newsletter (CTA)',
    'cards'          => '--- Cards ---',
    'resource cards' => 'Resource Cards',
    'blog cards'     => 'Blog Cards',
    'resource cards' => 'Resource Cards',
    'info cards'     => 'Info Cards',
    'image cards'    => 'Image Cards',
    'video cards'    => 'Video Cards',
    'case study cards' => 'Case Study Cards',
    'other'          => '--- Other ---',
    'products'       => 'Products',
    'features'       => 'Features',
    'platform'       => 'Platform'
    //'custom'         => 'Custom',
  );
}

function get_fa_icon_options() {
  return array(
    ''  => 'None',

    '----- rjbstarter -----'         => '----- Rjbstarter -----',
    'fac fa-window-question'        => 'Window Quesion',
    'fac fa-computer-idea'          => 'Computer Idea',
    'fac fa-iab'                    => 'IAB',

    '----- devices -----'           => '----- Devices -----',
    'fal fa-desktop'                => 'Desktop',
    'fal fa-tablet-android'         => 'Tablet',
    'fal fa-mobile'                 => 'Mobile',
    'fal fa-mobile-android'         => 'Mobile',
    'fal fa-browser'                => 'Browser',
    'fal fa-watch'                  => 'Watch',
    'fal fa-bullhorn'               => 'Bullhorn',
    'fal fa-microphone-alt'         => 'Microphone',
    'fal fa-laptop-code'            => 'Laptop with code',
    'fal fa-lock-alt'               => 'Lock closed',
    'fal fa-lock-open-alt'          => 'Lock open',

    '----- charts -----'            => '----- CHARTS -----',
    'fal fa-chart-line'             => 'Chart - Line Up',
    'fal fa-chart-pie'              => 'Chart - Pie: three',
    'fal fa-chart-bar'              => 'Chart - Bar',
    'fal fa-chart-area'             => 'Chart - area',
    'fal fa-code-merge'             => 'Code merge',
    'fal fa-sitemap'                => 'Sitemap',
    'fal fa-list'                   => 'List',

    '----- help -----'              => '----- HELP -----',
    'fal fa-life-ring'              => 'Float Ring',
    'fal fa-question-circle'        => 'Question circle',
    'fal fa-info-circle'            => 'Info circle',

    '----- measure -----'           => '----- MEASURE -----',
    'fal fa-tachometer-alt'         => 'Tachometer',

    '----- check -----'             => '----- CHECK -----',
    'fal fa-check'                  => 'Check',
    'fal fa-check-circle'           => 'Check Circle',
    'fal fa-check-square'           => 'Check Square',

    '----- chat -----'              => '----- Chat -----',
    'fal fa-comment'                => 'Comment',
    'fal fa-comments'               => 'Comments',

    '----- location -----'          => '----- Location -----',
    'fal fa-map'                    => 'Map',
    'fal fa-map-signs'              => 'Map signs',
    'fal fa-building'               => 'Building',

    '----- events -----'            => '----- Events -----',
    'fal fa-coffee'                 => 'Coffee',
    'fal fa-beer'                   => 'Beer',
    'fal fa-glass-martini'          => 'Glass Martini',

    '----- money -----'             => '----- MONEY -----',
    'fal fa-dollar-sign'            => 'Dollar sign ($)',
    'fal fa-usd-square'             => 'Dollar sign in square',
    'fal fa-euro-sign'              => 'Euro sign',
    'fal fa-pound-sign'             => 'Pound sign',
    'fal fa-credit-card'            => 'Credit card',
    'fal fa-credit-card-front'      => 'Credit card (front)',

    '----- capture -----'           => '----- CAPTURE -----',
    'fal fa-barcode'                => 'Barcode',
    'fal fa-bullseye'               => 'Bullseye',
    'fal fa-hashtag'                => 'Hashtag',
    'fal fa-handshake'              => 'Handshake',
    'fal fa-hands-helping'          => 'Helping hands',

    '----- users -----'             => '----- USERS -----',
    'fal fa-user'                   => 'User',
    'fal fa-users'                  => 'Users',
    'fal fa-user-circle'            => 'User Circle',

    '----- other -----'             => '----- OTHER -----',
    'fal fa-hand-wash'              => 'Hand wash',
    'fal fa-road'                   => 'Road',
    'fal fa-rocket'                 => 'Rocket',
    'fal fa-plug'                   => 'Plug',
    'fal fa-heart'                  => 'Heart (line)',
    'fal fa-images'                 => 'Images',
    'fal fa-gift'                   => 'Gift',
    'fal fa-clock'                  => 'Clock',
    'fal fa-utensils'               => 'Utensils',
    'fal fa-paper-plane'            => 'Paper Plane',
    'fal fa-gamepad'                => 'Gamepad',
    'fal fa-audio-description'      => 'AD',
    'fal fa-bell'                   => 'Bell',
    'fal fa-calendar'               => 'Calendar',
    'fal fa-database'               => 'Database',
    'fal fa-braille'                => 'Braille (dots)',
    'fal fa-cube'                   => 'Cube',
    'fal fa-code'                   => 'Code',
    'fal fa-tag'                    => 'Tag',
    'fal fa-tags'                   => 'Tags',
    'fal fa-ticket'                 => 'Ticket',
    'fal fa-toggle-on'              => 'Toggle on',
    'fal fa-toggle-off'             => 'Toggle off',
    'fal fa-paper-clip'             => 'Paper clip',
    'fal fa-newspaper'              => 'Newspaper',
    'fal fa-rss'                    => 'RSS',
    'fal fa-bookmark'               => 'Bookmark',
    'fal fa-clipboard'              => 'Clipboard',
    'fal fa-leaf'                   => 'Leaf',

    '----- System -----'            => '----- SYSTEM/CONTROLS -----',
    'fal fa-cog'                    => 'Cog',
    'fal fa-folders'                => 'Folders',
    'fal fa-file'                   => 'File',
    'fal fa-play-circle'            => 'Play circle',
    'fal fa-search'                 => 'Search',
    'fal fa-inbox'                  => 'Inbox',

    '----- Arrows -----'            => '----- ARROWS -----',
    'fal fa-arrow-right'            => 'Arrow Right',
    'fal fa-arrow-left'             => 'Arrow Left',
    'fal fa-chevron-right'          => 'Chevron Right',
    'fal fa-chevron-left'           => 'Chevron Left',
    'fal fa-caret-right'            => 'Caret Right',
    'fal fa-caret-left'             => 'Caret Left',
    'fal fa-redo'                   => 'Redo',

    '----- links -----'             => '----- LINKS -----',
    'fal fa-external-link'          => 'External Link',
    'fal fa-plus'                   => 'Plus',
    'fal fa-bars'                   => 'Bars',
    'fal fa-arrow-to-bottom'        => 'Download',

    '----- Social -----'            => '----- SOCIAL -----',
    'fab fa-twitter'                => 'Twitter',
    'fal fa-facebook'               => 'Facebook',
    'fal linkedin'                  => 'Linkedin',
    'fac fa-glassdoor'              => 'Glassdoor',
  );
}

function get_flex_order_options() {
  return array(
    'order-1'      => 'order-1',
    'order-2'      => 'order-2',
    'order-3'      => 'order-3',
    'order-4'      => 'order-4',
    'order-sm-1'   => 'order-sm-1',
    'order-sm-2'   => 'order-sm-2',
    'order-sm-3'   => 'order-sm-3',
    'order-sm-4'   => 'order-sm-4',
    'order-md-1'   => 'order-md-1',
    'order-md-2'   => 'order-md-2',
    'order-md-3'   => 'order-md-3',
    'order-md-4'   => 'order-md-4',
    'order-lg-1'   => 'order-lg-1',
    'order-lg-2'   => 'order-lg-2',
    'order-lg-3'   => 'order-lg-3',
    'order-lg-4'   => 'order-lg-4',
    'order-xl-1'   => 'order-xl-1',
    'order-xl-2'   => 'order-xl-2',
    'order-xl-3'   => 'order-xl-3',
    'order-xl-4'   => 'order-xl-4',
    'order-xxxl-1' => 'order-xxxl-1',
    'order-xxxl-2' => 'order-xxxl-2',
    'order-xxxl-3' => 'order-xxxl-3',
    'order-xxxl-4' => 'order-xxxl-4',
    'custom'       => 'custom'
  );
}

function get_row_flex_options() {
  return array(
    'flex-row'       => 'flex-row',
    'flex-column'    => 'flex-column',
    'flex-nowrap'    => 'flex-nowrap',
    'flex-wrap'      => 'flex-wrap',
    'flex-sm-nowrap' => 'flex-sm-nowrap',
    'flex-sm-wrap'   => 'flex-sm-wrap',
    'flex-md-nowrap' => 'flex-md-nowrap',
    'flex-md-wrap'   => 'flex-md-wrap',
    'flex-lg-nowrap' => 'flex-lg-nowrap',
    'flex-lg-wrap'   => 'flex-lg-wrap',
    'flex-xl-nowrap' => 'flex-xl-nowrap',
    'flex-xl-wrap'   => 'flex-xl-wrap',
  );
}

function get_section_image_style_options() {
  return array(
    'images-grayscale'       => 'images-grayscale',
    'images-grayscale-light' => 'images-grayscale-light',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the theme superadmin css select field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_superadmin_css_options() {
  return array(
    ''          => 'Default',
    'main'      => 'Main',
    'wireframe' => 'Wireframe',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the section customization level field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_section_customization_lvl_options() {
  return array(
    ''         => 'Default',
    'advanced' => 'Advanced',
    'full'     => 'Full',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon color field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_color_options() {
  return array(
    ''               => 'Default',
    'icon-primary'   => 'Icon primary',
    'icon-secondary' => 'Icon secondary',
    'icon-dark'      => 'Icon dark',
    'icon-darker'    => 'Icon darker',
    'icon-gray'      => 'Icon gray',
    'icon-white'     => 'Icon white',
    'icon-light'     => 'Icon light',
    'icon-lighter'   => 'Icon lighter',
    'icon-green'     => 'Icon green',
    'icon-purple'    => 'Icon purple',
    'icon-orange'    => 'Icon orange',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon bg style field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_bg_style_options() {
  return array(
    ''               => 'Default',
    'icon-circle-bg' => 'Icon circle bg',
    'icon-square-bg' => 'Icon square bg',
    'icon-rounded-bg' => 'Icon rounded bg',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon bg color field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_bg_color_options() {
  return array(
    ''             => 'Default',
    'bg-primary'   => 'Icon BG primary',
    'bg-secondary' => 'Icon BG secondary',
    'bg-dark-blue' => 'Icon BG Dark Blue',
    'bg-dark'      => 'Icon BG dark',
    'bg-darker'    => 'Icon BG darker',
    'bg-gray'      => 'Icon BG gray',
    'bg-white'     => 'Icon BG white',
    'bg-light'     => 'Icon BG light',
    'bg-lighter'   => 'Icon BG lighter',
    'bg-sec-green'     => 'Icon BG green',
    'bg-sec-purple'    => 'Icon BG purple',
    'bg-sec-orange'    => 'Icon BG orange',
  );
}

/**
 * Return an array of StoutLogic/ACF args for shadow fields.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_shadow_options() {
  return array(
    'shadow-none' => 'Default',
    'shadow-sm'   => 'Icon BG shadow sm',
    'shadow'      => 'Icon BG shadow',
    'shadow-lg'   => 'Icon BG shadow lg',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon size field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_size_options() {
  return array(
    ''          => 'Default',
    'fa-2x'     => 'Small',
    'fa-3x'     => 'Medium',
    'fa-4x'     => 'Large',
    'fa-5x'     => 'XLarge',
    'icon-18px' => '18px',
    'icon-20px' => '20px',
    'icon-24px' => '24px',
    'icon-28px' => '28px',
    'icon-32px' => '32px',
    'icon-36px' => '36px',
    'icon-40px' => '40px',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon wrapper height field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_wrapper_height_options() {
  return array(
    ''         => 'Default',
    'h-auto'   => 'Auto height (Icon wrapper inside)',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the icon position field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_icon_position_options() {
  return array(
    ''                      => 'Default',
    'icon-pos-top'          => 'Top',
    'icon-pos-top-straddle' => 'Top (Card Straddle)',
    'icon-pos-left'         => 'Left',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the form button options field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_button_options() {
  return array(
    'form-btn-left'  => 'Button Left',
    'form-btn-center' => 'Button Center',
    'form-btn-right' => 'Button Right',
    'form-btn-lg' => 'Button Large',
  );
}

/**
 * Return an array of StoutLogic/ACF args for the min view height field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_min_vh_options() {
  return array(
    ''        => 'None',
    'mvh-5'   => 'Min View Height - 5',
    'mvh-10'  => 'Min View Height - 10',
    'mvh-15'  => 'Min View Height - 15',
    'mvh-20'  => 'Min View Height - 20',
    'mvh-25'  => 'Min View Height - 25',
    'mvh-30'  => 'Min View Height - 30',
    'mvh-35'  => 'Min View Height - 35',
    'mvh-40'  => 'Min View Height - 40',
    'mvh-45'  => 'Min View Height - 45',
    'mvh-50'  => 'Min View Height - 50',
    'mvh-55'  => 'Min View Height - 55',
    'mvh-60'  => 'Min View Height - 60',
    'mvh-65'  => 'Min View Height - 65',
    'mvh-70'  => 'Min View Height - 70',
    'mvh-75'  => 'Min View Height - 75',
    'mvh-80'  => 'Min View Height - 80',
    'mvh-85'  => 'Min View Height - 85',
    'mvh-90'  => 'Min View Height - 90',
    'mvh-95'  => 'Min View Height - 95',
    'mvh-100' => 'Min View Height - 100',
  );
}


/**
 * Return an array of StoutLogic/ACF args for gravity form selection field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_gravity_form_options() {
  $forms = '';
  $ret = array(0 => 'None');

  // if( class_exists( GFAPI ) ) {
  if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
    $forms = GFAPI::get_forms();

  }

  if( is_array( $forms ) ) {
    foreach( $forms as $key => $form ) {
      $id = isset( $form['id'] ) ? $form['id'] : '';
      $title = isset( $form['title'] ) ? $form['title'] : '';

      if( $id && $title ) {
        $ret[$id] = $title;
      }
    }
  }

  return $ret;
}


/**
 * Return an array of StoutLogic/ACF args for the form display style field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_form_display_style_options() {
  return array(
    '' => 'Default',
    'email-only' => 'Email only'
  );
}


/**
 * Return an array of StoutLogic/ACF args for the gravity form display style field.
 *
 * @return array StoutLogic/ACF field selaect options.
 */
function get_gravity_display_style_options() {
  return array(
    '' => 'Default',
    'email-only' => 'Email only'
  );
}


/**
 * Return an array of StoutLogic/ACF args for the form layout field.
 *
 * @return array StoutLogic/ACF field select options.
 */
function get_form_layout_options() {
  return array(
    '' => 'Default',
    'form-md-two-col' => 'Form medium two column'
  );
}










































































































































































































































































































































/************
* Marked for removal
*
* ALL ITEMS BELOW THIS COMMENT ARE INTENED TO BE REMOVED ONCE NO LONGER USED.
************/

function get_col_class_options() {
  return array(
    'col'  => 'col',
    'col-1'  => 'col-1',
    'col-2'  => 'col-2',
    'col-3'  => 'col-3',
    'col-4'  => 'col-4',
    'col-5'  => 'col-5',
    'col-6'  => 'col-6',
    'col-7'  => 'col-7',
    'col-8'  => 'col-8',
    'col-9'  => 'col-9',
    'col-10' => 'col-10',
    'col-11' => 'col-11',
    'col-12' => 'col-12',
    'col-sm' => 'col-sm',
    'col-sm-1'  => 'col-sm-1',
    'col-sm-2'  => 'col-sm-2',
    'col-sm-3'  => 'col-sm-3',
    'col-sm-4'  => 'col-sm-4',
    'col-sm-5'  => 'col-sm-5',
    'col-sm-6'  => 'col-sm-6',
    'col-sm-7'  => 'col-sm-7',
    'col-sm-8'  => 'col-sm-8',
    'col-sm-10' => 'col-sm-10',
    'col-sm-12' => 'col-sm-12',
    'col-md'    => 'col-md',
    'col-md-2'  => 'col-md-2',
    'col-md-3'  => 'col-md-3',
    'col-md-4'  => 'col-md-4',
    'col-md-5'  => 'col-md-5',
    'col-md-6'  => 'col-md-6',
    'col-md-7'  => 'col-md-7',
    'col-md-8'  => 'col-md-8',
    'col-md-9'  => 'col-md-9',
    'col-md-10' => 'col-md-10',
    'col-md-11' => 'col-md-11',
    'col-md-12' => 'col-md-12',
    'col-lg'    => 'col-lg',
    'col-lg-1'  => 'col-lg-1',
    'col-lg-2'  => 'col-lg-2',
    'col-lg-3'  => 'col-lg-3',
    'col-lg-4'  => 'col-lg-4',
    'col-lg-5'  => 'col-lg-5',
    'col-lg-6'  => 'col-lg-6',
    'col-lg-7'  => 'col-lg-7',
    'col-lg-8'  => 'col-lg-8',
    'col-lg-9'  => 'col-lg-9',
    'col-lg-10' => 'col-lg-10',
    'col-lg-11' => 'col-lg-11',
    'col-lg-12' => 'col-lg-12',
    'col-xl'    => 'col-xl',
    'col-xl-1'  => 'col-xl-1',
    'col-xl-2'  => 'col-xl-2',
    'col-xl-3'  => 'col-xl-3',
    'col-xl-4'  => 'col-xl-4',
    'col-xl-5'  => 'col-xl-5',
    'col-xl-6'  => 'col-xl-6',
    'col-xl-7'  => 'col-xl-7',
    'col-xl-8'  => 'col-xl-8',
    'col-xl-9'  => 'col-xl-9',
    'col-xl-10' => 'col-xl-10',
    'col-xl-11' => 'col-xl-11',
    'col-xl-12' => 'col-xl-12',
    'col-xxl'    => 'col-xxl',
    'col-xxl-1'  => 'col-xxl-1',
    'col-xxl-2'  => 'col-xxl-2',
    'col-xxl-3'  => 'col-xxl-3',
    'col-xxl-4'  => 'col-xxl-4',
    'col-xxl-5'  => 'col-xxl-5',
    'col-xxl-6'  => 'col-xxl-6',
    'col-xxl-7'  => 'col-xxl-7',
    'col-xxl-8'  => 'col-xxl-8',
    'col-xxl-9'  => 'col-xxl-9',
    'col-xxl-10' => 'col-xxl-10',
    'col-xxl-11' => 'col-xxl-11',
    'col-xxl-12' => 'col-xxl-12',
    'col-xxxl'    => 'col-xxxl',
    'col-xxxl-1'  => 'col-xxxl-1',
    'col-xxxl-2'  => 'col-xxxl-2',
    'col-xxxl-3'  => 'col-xxxl-3',
    'col-xxxl-4'  => 'col-xxxl-4',
    'col-xxxl-5'  => 'col-xxxl-5',
    'col-xxxl-6'  => 'col-xxxl-6',
    'col-xxxl-7'  => 'col-xxxl-7',
    'col-xxxl-8'  => 'col-xxxl-8',
    'col-xxxl-9'  => 'col-xxxl-9',
    'col-xxxl-10' => 'col-xxxl-10',
    'col-xxxl-11' => 'col-xxxl-11',
    'col-xxxl-12' => 'col-xxxl-12',
    'col-xxxxl'   => 'col-xxxxl',
    'col-xxxxl-1'  => 'col-xxxxl-1',
    'col-xxxxl-2'  => 'col-xxxxl-2',
    'col-xxxxl-3'  => 'col-xxxxl-3',
    'col-xxxxl-4'  => 'col-xxxxl-4',
    'col-xxxxl-5'  => 'col-xxxxl-5',
    'col-xxxxl-6'  => 'col-xxxxl-6',
    'col-xxxxl-7'  => 'col-xxxxl-7',
    'col-xxxxl-8'  => 'col-xxxxl-8',
    'col-xxxxl-9'  => 'col-xxxxl-9',
    'col-xxxxl-10' => 'col-xxxxl-10',
    'col-xxxxl-11' => 'col-xxxxl-11',
    'col-xxxxl-12' => 'col-xxxxl-12',
    'custom'
  );
}
