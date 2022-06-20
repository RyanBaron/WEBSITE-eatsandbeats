<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$flex_row  = \App\get_row_flex_options();

$args_section_id = array(
  'maxlength' => 20,
  'placeholder' => "Enter a section html id."
);

$image_bg_content = new FieldsBuilder('image_content');
$image_bg_content
  ->addFields(get_field_partial('image-bg'));

$general = new FieldsBuilder('section_config');
$general
  /*
  ->addRadio('section_display')
    ->setRequired()
    ->addChoices(array(
      ''         => 'Enabled',
      'd-none'   => 'Hidden',
      'disabled' => 'Disabled',
    ))
  */

  ->addText('section_id', $args_section_id)
  ->addSelect('section_padding')
    ->addChoices(array(
      ''          => 'Default',
      'pt-3 pb-3' => 'Small Padding',
      'pt-4 pb-4' => 'Medium Padding',
      'pt-5 pb-5' => 'Large Padding',
    ))
  ->addSelect('section_bg')
    ->addChoices(array(
      ''             => 'None',
      'color'   => 'Color',
      'image' => 'Image',
    ))
  ->addSelect('section_bg_color')
    ->conditional('section_bg', '==', 'color')
    ->addChoices(array(
      ''             => 'None',
      'bg-primary'   => 'Primary',
      'bg-secondary' => 'Secondary',
      'bg-light'     => 'Light',
      'bg-dark'      => 'Dark',

    ))
  ->addFields($image_bg_content)
  ->addSelect('headline_size')
    ->addChoices(array(
      ''      => 'Default',
      'hl-sm' => "Healine sm",
      'hl-md' => "Healine md",
      'hl-lg' => "Healine lg",
      'hl-xl' => "Headline xxl"
    ))
  ->addAccordion('Column Align Settings')
    ->addCheckbox('section_flex_row')
      ->addChoices($flex_row)
    ->addCheckbox('section_row_align')
      ->addChoices(array(
        ''                       => 'Default',
        'align-items-center'     => "Algin items center",
        'justify-content-center' => "Justify content center"
      ))
  ->addAccordion('Column Align Settings End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Grid Items')
    ->addSelect('gutters')
      ->addChoices(array(
        ''           => 'Default',
        'lg-gutters' => "Large Gutters",
        'xl-gutters' => "Xlarge Gutters"
      ))
    ->addCheckbox('col_class')
      ->addChoices(
        'col-6',
        'col-8',
        'col-10',
        'col-12',
        'col-xs-6',
        'col-xs-8',
        'col-xs-10',
        'col-xs-12',
        'col-sm-6',
        'col-sm-8',
        'col-sm-10',
        'col-sm-12',
        'col-md-6',
        'col-md-8',
        'col-md-10',
        'col-md-12',
        'col-lg-6',
        'col-lg-8',
        'col-lg-10',
        'col-lg-12',
        'col-xl-6',
        'col-xl-7',
        'col-xl-8',
        'col-xl-9',
        'col-xl-10',
        'col-xl-12',
        'col-xxl-5',
        'col-xxl-6',
        'col-xxl-7',
        'col-xxl-8',
        'col-xxl-9',
        'col-xxl-10',
        'col-xxl-12'
      )
  ->addAccordion('Grid Items End')
    ->setConfig('endpoint', 1);

return $general;
