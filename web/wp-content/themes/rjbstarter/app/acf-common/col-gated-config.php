<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify       = \App\get_row_justify_options();
$row_align         = \App\get_row_align_options();
$column_classes    = \App\get_column_class_options();
$text_align        = \App\get_text_align_options();
$order_options     = \App\get_column_order_options();
$customization_lvl = \App\get_section_customization_lvl_options();

$col_copy_config = new FieldsBuilder('col_copy_config');
$col_copy_config
  // Section Customization
  ->addSelect('col_gated_customization_lvl')
    ->conditional('sections', '==', 'gated')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)

  // Order
  ->addAccordion('col_gated_order_start')
    ->setLabel('Order - Column Copy')
    ->conditional('col_gated_customization_lvl', '==', 'full')
      ->or('col_gated_customization_lvl', '==', 'advanced')
      ->and('sections', '==', 'gated')
    ->addCheckbox('col_gated_order')
      ->setLabel('Display Order')
      ->addChoices($order_options)
  ->addAccordion('col_gated_order_end')
    ->conditional('col_gated_customization_lvl', '==', 'full')
      ->or('col_gated_customization_lvl', '==', 'advanced')
      ->and('sections', '==', 'gated')
    ->setConfig('endpoint', 1)

  // Size
  ->addAccordion('col_gated_size_start')
    ->setLabel('Size - Column Copy')
    ->conditional('sections', '==', 'gated')
    ->addCheckbox('col_gated_col_class')
      ->setLabel('Colum Class (bootstrap)')
      ->conditional('sections', '==', 'gated')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('col_gated_size_end')
    ->conditional('sections', '==', 'gated')
    ->setConfig('endpoint', 1)

  // Alignment
  ->addAccordion('col_gated_alignment_start')
    ->setLabel('Alignment - Column Copy')
    ->conditional('sections', '==', 'gated')
    ->addCheckbox('col_gated_text_align')
      ->setLabel('Text Align')
      ->conditional('sections', '==', 'gated')
      ->setDefaultValue(array(''))
      ->addChoices($text_align)
  ->addAccordion('col_gated_alignment_end')
    ->conditional('sections', '==', '')
    ->setConfig('endpoint', 1)

  // Spacing
  ->addAccordion('col_gated_spacing_start')
    ->setLabel('Spacing - Column Copy')
    ->conditional('col_gated_customization_lvl', '==', 'full')
      ->and('sections', '==', 'gated')
    ->addFields(get_field_partial('spacing-col-gated'))
  ->addAccordion('col_gated_spacing_end')
    ->conditional('col_gated_customization_lvl', '==', 'full')
      ->and('sections', '==', 'gated')
    ->setConfig('endpoint', 1);

return $col_copy_config;
