<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify       = \App\get_row_justify_options();
$row_align         = \App\get_row_align_options();
$column_classes    = \App\get_column_class_options();
$text_align        = \App\get_text_align_options();
$order_options     = \App\get_column_order_options();
$customization_lvl = \App\get_section_customization_lvl_options();

$col_accordion_config = new FieldsBuilder('col_accordion_config');
$col_accordion_config
  // Section Customization
  ->addSelect('col_accordion_col_customization_lvl')
    ->conditional('sections', '==', 'accordion')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)
  // Order
  ->addAccordion('Order Column Accordion')
    ->setLabel('Order - Column Accordion')
    ->addCheckbox('col_accordion_col_order')
      ->conditional('sections', '==', 'accordion')
      ->addChoices($order_options)
  ->addAccordion('Order Column Accordion End')
    ->conditional('sections', '==', 'accordion')
    ->setConfig('endpoint', 1)
  // Size
  ->addAccordion('Size Column Accordion')
    ->setLabel('Size - Column Accordion')
    ->conditional('sections', '==', 'accordion')
    ->addCheckbox('col_accordion_col_class')
      ->conditional('sections', '==', 'accordion')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('Size Column Accordion End')
    ->conditional('sections', '==', 'accordion')
    ->setConfig('endpoint', 1)
  // Alignment
  ->addAccordion('Alignment Column Accordion')
    ->setLabel('Alignment - Column Accordion')
    ->conditional('sections', '==', 'accordion')
    ->addCheckbox('col_accordion_text_align')
      ->conditional('sections', '==', 'accordion')
      ->setDefaultValue(array('text-center'))
      ->addChoices($text_align)
    // Accordion Row Flex Align
    ->addCheckbox('col_accordion_row_align')
      ->setLabel('Card Row Align Content')
      ->conditional('sections', '==', 'accordion')
        ->or('sections', '==', 'text')
      ->setDefaultValue(array('align-items-start'))
      ->addChoices($row_align)
    // Accordion Row Flex Justify
    ->addCheckbox('col_accordion_row_justify')
      ->setLabel('Row Justify Content')
      ->conditional('sections', '==', 'accordion')
        ->or('sections', '==', 'text')
      ->setDefaultValue(array('justify-content-start'))
      ->addChoices($row_justify)
  ->addAccordion('Alignment Column Accordion End')
    ->conditional('sections', '==', 'accordion')
    ->setConfig('endpoint', 1)
  // Spacing
  ->addAccordion('Spacing Column Accordion')
    ->setLabel('Spacing - Column Accordion')
    ->conditional('col_accordion_col_customization_lvl', '==', 'full')
      ->and('sections', '==', 'accordion')
    ->addFields(get_field_partial('spacing-col-accordion'))
  ->addAccordion('Spacing Column Accordion End')
    ->conditional('col_accordion_col_customization_lvl', '==', 'full')
      ->and('sections', '==', 'accordion')
    ->setConfig('endpoint', 1);

return $col_accordion_config;
