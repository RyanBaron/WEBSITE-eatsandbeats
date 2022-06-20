<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_superheadline       = \App\get_args_field_superheadline();
$args_headline            = \App\get_args_field_headline();
$args_subheadline         = \App\get_args_field_subheadline();
$headline_style_options   = \App\get_headline_style_options();
$headline_tag_options     = \App\get_headline_tag_options();

$headline = new FieldsBuilder('headline');
$headline
  ->addCheckbox('footer_headline_options')
    ->setLabel('Headline Options')
    ->addChoices(array(
      'superheadline' => 'Superheadline',
      'headline'      => 'Headline',
      'subheadline'   => 'Subheadline',
    ))
  ->addSelect('footer_headline_tag')
    ->setLabel('Headline Tag')
    ->conditional('footer_headline_options', '==', 'headline')
      ->or('footer_headline_options', '==', 'superheadline')
      ->or('footer_headline_options', '==', 'subheadline')
    ->addChoices($headline_tag_options)
  ->addSelect('footer_headline_style')
    ->setLabel('Headline Style')
    ->conditional('footer_headline_options', '==', 'headline')
      ->or('footer_headline_options', '==', 'superheadline')
      ->or('footer_headline_options', '==', 'subheadline')
    ->addChoices($headline_style_options)
  ->addText('footer_superheadline', $args_superheadline)
    ->setLabel('Superheadline')
    ->conditional('footer_headline_options', '==', 'superheadline')
  ->addText('footer_headline', $args_headline)
    ->setLabel('Headline')
    ->conditional('footer_headline_options', '==', 'headline')
  ->addText('footer_subheadline', $args_subheadline)
    ->setLabel('Subheadline')
    ->conditional('footer_headline_options', '==', 'subheadline');

return $headline;
