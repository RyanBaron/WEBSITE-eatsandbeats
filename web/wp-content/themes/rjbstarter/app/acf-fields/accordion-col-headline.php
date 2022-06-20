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
  ->addCheckbox('accordion_col_headline_options')
    ->setLabel('Headline Options')
    ->addChoices(array(
      'superheadline' => 'Superheadline',
      'headline'      => 'Headline',
      'subheadline'   => 'Subheadline',
    ))
  ->addSelect('accordion_col_headline_tag')
    ->setLabel('Headline Tag')
    ->conditional('accordion_col_headline_options', '==', 'headline')
      ->or('accordion_col_headline_options', '==', 'superheadline')
      ->or('accordion_col_headline_options', '==', 'subheadline')
    ->addChoices($headline_tag_options)
  ->addSelect('accordion_col_headline_style')
    ->setLabel('Headline Style')
    ->conditional('accordion_col_headline_options', '==', 'headline')
      ->or('accordion_col_headline_options', '==', 'superheadline')
      ->or('accordion_col_headline_options', '==', 'subheadline')
    ->addChoices($headline_style_options)
  ->addText('accordion_col_superheadline', $args_superheadline)
    ->setLabel('Superheadline')
    ->conditional('accordion_col_headline_options', '==', 'superheadline')
  ->addText('accordion_col_headline', $args_headline)
    ->setLabel('Headline')
    ->conditional('accordion_col_headline_options', '==', 'headline')
  ->addText('accordion_col_subheadline', $args_subheadline)
    ->setLabel('Subheadline')
    ->conditional('accordion_col_headline_options', '==', 'subheadline');

return $headline;
