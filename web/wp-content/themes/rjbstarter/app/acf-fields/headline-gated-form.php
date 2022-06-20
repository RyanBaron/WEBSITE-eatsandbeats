<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_superheadline       = \App\get_args_field_superheadline();
$args_headline            = \App\get_args_field_headline();
$args_subheadline         = \App\get_args_field_subheadline();
$headline_style_options   = \App\get_headline_style_options();
$headline_tag_options     = \App\get_headline_tag_options();
$image_width_options      = \App\get_image_width_options();

$args_image = array(
  'instructions'  => __('Upload an image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 2400,
  'max_heigh'     => 2400,
  'max_size'      => 6,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$headline = new FieldsBuilder('headline');
$headline
  ->addCheckbox('gated_form_headline_options')
    ->setLabel('Headline Options')
    ->addChoices(array(
      'pre-headline-image' => 'Pre Headline Image',
      'superheadline' => 'Superheadline',
      'headline'      => 'Headline',
      'subheadline'   => 'Subheadline',
      'post-headline-image' => 'Post Headline Image',
    ))
  ->addSelect('gated_form_headline_tag')
    ->setLabel('Headline Tag')
    ->conditional('gated_form_headline_options', '==', 'headline')
      ->or('gated_form_headline_options', '==', 'superheadline')
      ->or('gated_form_headline_options', '==', 'subheadline')
    ->addChoices($headline_tag_options)
  ->addSelect('gated_form_headline_style')
    ->setLabel('Headline Style')
    ->conditional('gated_form_headline_options', '==', 'headline')
      ->or('gated_form_headline_options', '==', 'superheadline')
      ->or('gated_form_headline_options', '==', 'subheadline')
    ->addChoices($headline_style_options)
  ->addImage('gated_form_pre_headline_image', $args_image)
    ->setLabel('Pre Headline Image')
    ->conditional('gated_form_headline_options', '==', 'pre-headline-image')
  ->addSelect('gated_form_pre_headline_image_width')
    ->setLabel('Pre Headline Image Width')
    ->conditional('gated_form_headline_options', '==', 'pre-headline-image')
    ->addChoices($image_width_options)
  ->addSelect('gated_form_pre_headline_image_size')
    ->setLabel('Pre Headline Image Size')
    ->conditional('gated_form_headline_options', '==', 'pre-headline-image')
    ->addChoices(array('small', 'medium', 'large', 'full'))
  ->addText('gated_form_superheadline', $args_superheadline)
    ->setLabel('Superheadline')
    ->conditional('gated_form_headline_options', '==', 'superheadline')
  ->addText('gated_form_headline', $args_headline)
    ->setLabel('Headline')
    ->conditional('gated_form_headline_options', '==', 'headline')
  ->addText('gated_form_subheadline', $args_subheadline)
    ->setLabel('Subheadline')
    ->conditional('gated_form_headline_options', '==', 'subheadline')
  ->addImage('gated_form_post_headline_image', $args_image)
    ->setLabel('Post Headline Image')
    ->conditional('gated_form_headline_options', '==', 'post-headline-image')
  ->addSelect('gated_form_post_headline_image_width')
    ->setLabel('Post Headline Image Width')
    ->conditional('gated_form_headline_options', '==', 'post-headline-image')
    ->addChoices($image_width_options)
  ->addSelect('gated_form_post_headline_image_size')
    ->setLabel('Post Headline Image Size')
    ->addChoices(array('small', 'medium', 'large', 'full'))
    ->conditional('gated_form_headline_options', '==', 'post-headline-image');
return $headline;
