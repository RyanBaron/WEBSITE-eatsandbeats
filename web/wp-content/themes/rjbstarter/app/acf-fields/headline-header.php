<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_image = array(
  'instructions'  => __('Upload a card image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 2500,
  'max_heigh'     => 2500,
  'max_size'      => 5,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$args_superheadline       = \App\get_args_field_superheadline();
$args_headline            = \App\get_args_field_headline();
$args_subheadline         = \App\get_args_field_subheadline();
$headline_style_options   = \App\get_headline_style_options();
$headline_tag_options     = \App\get_headline_tag_options();
$image_width_options      = \App\get_image_width_options();

$headline = new FieldsBuilder('headline');
$headline
  ->addCheckbox('header_headline_options')
    ->setLabel('Headline Options')
    ->addChoices(array(
      'pre-headline-image' => 'Pre Headline Image',
      'superheadline' => 'Superheadline',
      'headline'      => 'Headline',
      'subheadline'   => 'Subheadline',
    ))
  ->addSelect('header_headline_tag')
    ->setLabel('Headline Tag')
    ->conditional('header_headline_options', '==', 'headline')
      ->or('header_headline_options', '==', 'superheadline')
      ->or('header_headline_options', '==', 'subheadline')
    ->addChoices($headline_tag_options)
  ->addSelect('header_headline_style')
    ->setLabel('Headline Style')
    ->conditional('header_headline_options', '==', 'headline')
      ->or('header_headline_options', '==', 'superheadline')
      ->or('header_headline_options', '==', 'subheadline')
    ->addChoices($headline_style_options)
  ->addImage('header_headline_pre_headline_image', $args_image)
    ->setLabel('Pre Headline Image')
    ->conditional('header_headline_options', '==', 'pre-headline-image')
  ->addSelect('header_headline_pre_headline_image_width')
    ->setLabel('Pre Headline Image Width')
    ->conditional('header_headline_options', '==', 'pre-headline-image')
    ->addChoices($image_width_options)
  ->addSelect('header_headline_pre_headline_image_size')
    ->setLabel('Pre Headline Image Size')
    ->conditional('header_headline_options', '==', 'pre-headline-image')
    ->addChoices(array('small', 'medium', 'large', 'full'))
  ->addCheckbox('header_headline_pre_headline_image_padding')
    ->setLabel('Pre Headline Image Size')
    ->conditional('header_headline_options', '==', 'pre-headline-image')
    ->addChoices(array('pt-2', 'pt-4', 'pt-6', 'pt-md-0', 'pt-md-2', 'pt-md-4', 'pt-md-6', 'pb-2', 'pb-4', 'pb-6', 'pb-md-0', 'pb-md-2', 'pb-md-4', 'pb-md-6'))
  ->addText('header_superheadline', $args_superheadline)
    ->setLabel('Superheadline')
    ->conditional('header_headline_options', '==', 'superheadline')
  ->addText('header_headline', $args_headline)
    ->setLabel('Headline')
    ->conditional('header_headline_options', '==', 'headline')
  ->addText('header_subheadline', $args_subheadline)
    ->setLabel('Subheadline')
    ->conditional('header_headline_options', '==', 'subheadline');

return $headline;
