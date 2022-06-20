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
  ->addCheckbox('cards_col_headline_options')
    ->setLabel('Headline Options')
    ->addChoices(array(
      'superheadline' => 'Superheadline',
      'headline'      => 'Headline',
      'subheadline'   => 'Subheadline',
    ))
  ->addSelect('cards_col_headline_tag')
    ->setLabel('Headline Tag')
    ->conditional('cards_col_headline_options', '==', 'headline')
      ->or('cards_col_headline_options', '==', 'superheadline')
      ->or('cards_col_headline_options', '==', 'subheadline')
    ->addChoices($headline_tag_options)
  ->addSelect('cards_col_headline_style')
    ->setLabel('Headline Style')
    ->conditional('cards_col_headline_options', '==', 'headline')
      ->or('cards_col_headline_options', '==', 'superheadline')
      ->or('cards_col_headline_options', '==', 'subheadline')
    ->addChoices($headline_style_options)
  ->addText('cards_col_superheadline', $args_superheadline)
    ->setLabel('Superheadline')
    ->conditional('cards_col_headline_options', '==', 'superheadline')
  ->addText('cards_col_headline', $args_headline)
    ->setLabel('Headline')
    ->conditional('cards_col_headline_options', '==', 'headline')
  ->addText('cards_col_subheadline', $args_subheadline)
    ->setLabel('Subheadline')
    ->conditional('cards_col_headline_options', '==', 'subheadline');

return $headline;
