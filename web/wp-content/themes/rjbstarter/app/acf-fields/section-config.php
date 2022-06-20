<?php

namespace App;

$flex_row  = \App\get_row_flex_options();

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_align_options  = \App\get_row_align_options();
$col_class_options  = \App\get_col_class_options();
$flex_order_options = \App\get_flex_order_options();
$text_align_options = \App\get_text_align_options();

$args_section_id = array(
  'maxlength' => 20,
  'placeholder' => "Enter a section html id."
);

$general = new FieldsBuilder('section_config');
$general
  ->addCheckbox('section_columns')
    ->setRequired()
    ->addChoices(array(
      //'header' => 'Section Header',
      'text'   => 'Text Column',
      'image'  => 'Image Column',
      'cards'  => 'Card Column',
      'table'  => 'Table Column',
      'grid'   => 'Grid',
      //'header' => 'Section Header',
    ))
  ->addSelect('section_display')
    ->setRequired()
    ->addChoices(array(
      ''         => 'Enabled',
      'd-none'   => 'Hidden',
      'disabled' => 'Disabled',
    ))

  ->addSelect('section_bg_color')
    ->addChoices(array(
      ''             => 'None',
      'bg-primary'   => 'Primary',
      'bg-secondary' => 'Secondary',
      'bg-light'     => 'Light',
      'bg-dark'      => 'Dark',
    ))
    ->conditional('section_columns', '!=', '')
  ->addText('section_id', $args_section_id)
    ->conditional('section_columns', '!=', '')
  ->addSelect('headline_size')
    ->addChoices(array(
      ''      => 'Default',
      'hl-sm' => "Healine sm",
      'hl-md' => "Healine md",
      'hl-lg' => "Healine lg",
      'hl-xl' => "Headline xxl"
    ))
  // Column align settings
  ->addAccordion('Section Spacing')
    ->addFields(get_field_partial('spacing'))
  ->addAccordion('Section Spacing End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Column Align Settings')
    ->conditional('section_columns', '!=', '')
    ->addCheckbox('section_flex_row')
      ->conditional('section_columns', '!=', '')
      ->addChoices($flex_row)
    ->addCheckbox('section_row_align')
      ->conditional('section_columns', '!=', '')
      ->addChoices($row_align_options)
  ->addAccordion('Column Align Settings End')
    ->setConfig('endpoint', 1)

  // Text column settings
  ->addAccordion('Text Column Settings')
    ->conditional('section_columns', '==', 'text')
    ->addCheckbox('col_class_text')
      ->conditional('section_columns', '==', 'text')
      ->addChoices($col_class_options)
    ->addText('col_class_text_custom')
      ->conditional('col_class_text', '==', 'custom')
    ->addCheckbox('col_class_text_order')
      ->conditional('section_columns', '==', 'text')
        ->addChoices($flex_order_options)
    ->addText('col_class_text_order_custom')
      ->conditional('col_class_text_order', '==', 'custom')
      ->addCheckbox('col_text_align')
        ->conditional('section_columns', '==', 'text')
        ->setDefaultValue('text-left')
        ->addChoices($text_align_options)
  ->addAccordion('Text Column Settings End')
    ->setConfig('endpoint', 1)

  // Grid column settings
  ->addAccordion('Grid Column Settings')
    ->conditional('section_columns', '==', 'grid')
    ->addCheckbox('col_class_grid')
      ->conditional('section_columns', '==', 'grid')
      ->addChoices($col_class_options)
    ->addText('col_class_grid_custom')
      ->conditional('col_class_grid', '==', 'custom')
    ->addCheckbox('col_class_grid_order')
      ->conditional('section_columns', '==', 'text')
        ->addChoices($flex_order_options)
    ->addText('col_class_grid_order_custom')
      ->conditional('col_class_grid_order', '==', 'custom')
  ->addAccordion('Grid Column Settings End')
    ->setConfig('endpoint', 1)

  // Image column settings
  ->addAccordion('Image Column Settings')
    ->conditional('section_columns', '==', 'image')
    ->addCheckbox('col_class_image')
      ->addChoices($col_class_options)
      ->conditional('section_columns', '==', 'image')
    ->addText('col_class_image_custom')
      ->conditional('col_class_image', '==', 'custom')
    ->addCheckbox('col_class_image_order')
      ->conditional('section_columns', '==', 'image')
      ->addChoices($flex_order_options)
    ->addText('col_class_image_order_custom')
      ->conditional('col_class_image_order', '==', 'custom')
  ->addAccordion('Image Column Settings End')
    ->setConfig('endpoint', 1)

  // Card column settings
  ->addAccordion('Card Column Settings')
    ->conditional('section_columns', '==', 'cards')
    ->addCheckbox('col_class_cards')
      ->addChoices($col_class_options)
      ->conditional('section_columns', '==', 'cards')
    ->addText('col_class_card_custom')
      ->conditional('col_class_cards', '==', 'custom')
    ->addCheckbox('col_class_cards_order')
      ->conditional('section_columns', '==', 'cards')
      ->addChoices($flex_order_options)
    ->addText('col_class_cards_order_custom')
      ->conditional('col_class_cards_order', '==', 'custom')
  ->addAccordion('Cards Column Settings End')
    ->setConfig('endpoint', 1)

  // Table column settings
  ->addAccordion('Table Column Settings')
    ->conditional('section_columns', '==', 'table')
    ->addCheckbox('col_class_table')
      ->conditional('section_columns', '==', 'table')
      ->addChoices($col_class_options)
    ->addCheckbox('col_class_table_order')
      ->conditional('section_columns', '==', 'table')
      ->addChoices($flex_order_options)
  ->addAccordion('Table Column Settings End')
    ->setConfig('endpoint', 1);

return $general;
