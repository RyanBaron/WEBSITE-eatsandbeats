<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify       = \App\get_row_justify_options();
$row_align         = \App\get_row_align_options();
$column_classes    = \App\get_column_class_options();
$text_align        = \App\get_text_align_options();
$order_options     = \App\get_column_order_options();
$customization_lvl = \App\get_section_customization_lvl_options();

$col_cards_config = new FieldsBuilder('col_cards_config');
$col_cards_config
  // Section Customization
  ->addSelect('col_cards_col_customization_lvl')
    ->conditional('sections', '==', 'cards')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)
  // Order
  ->addAccordion('Order Column Cards')
    ->setLabel('Order - Column Cards')
    ->addCheckbox('col_cards_col_order')
      ->conditional('sections', '==', 'cards')
      ->addChoices($order_options)
  ->addAccordion('Order Column Cards End')
    ->conditional('sections', '==', 'cards')
    ->setConfig('endpoint', 1)
  // Size
  ->addAccordion('Size Column Cards')
    ->setLabel('Size - Column Cards')
    ->conditional('sections', '==', 'cards')
    ->addCheckbox('col_cards_col_class')
      ->conditional('sections', '==', 'cards')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('Size Column Cards End')
    ->conditional('sections', '==', 'cards')
    ->setConfig('endpoint', 1)
  // Alignment
  ->addAccordion('Alignment Column Cards')
    ->setLabel('Alignment - Column Cards')
    ->conditional('sections', '==', 'cards')
    ->addCheckbox('col_cards_text_align')
      ->conditional('sections', '==', 'cards')
      ->setDefaultValue(array('text-center'))
      ->addChoices($text_align)
    // Cards Row Flex Align
    ->addCheckbox('col_cards_row_align')
      ->setLabel('Card Row Align Content')
      ->conditional('sections', '==', 'cards')
        ->or('sections', '==', 'text')
      ->setDefaultValue(array('align-items-start'))
      ->addChoices($row_align)
    // Cards Row Flex Justify
    ->addCheckbox('col_cards_row_justify')
      ->setLabel('Row Justify Content')
      ->conditional('sections', '==', 'cards')
        ->or('sections', '==', 'text')
      ->setDefaultValue(array('justify-content-start'))
      ->addChoices($row_justify)
  ->addAccordion('Alignment Column Cards End')
    ->conditional('sections', '==', 'cards')
    ->setConfig('endpoint', 1)
  // Spacing
  ->addAccordion('Spacing Column Cards')
    ->setLabel('Spacing - Column Cards')
    ->conditional('col_cards_col_customization_lvl', '==', 'full')
      ->and('sections', '==', 'cards')
    ->addFields(get_field_partial('spacing-col-cards'))
  ->addAccordion('Spacing Column Cards End')
    ->conditional('col_cards_col_customization_lvl', '==', 'full')
      ->and('sections', '==', 'cards')
    ->setConfig('endpoint', 1);

return $col_cards_config;
