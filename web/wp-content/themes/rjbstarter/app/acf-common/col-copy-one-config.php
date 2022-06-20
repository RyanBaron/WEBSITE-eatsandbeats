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
  ->addSelect('col_copy_one_customization_lvl')
    ->conditional('sections', '==', 'copy-one')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)

  // Order
  ->addAccordion('col_copy_one_order_start')
    ->setLabel('Order - Column Copy')
    ->conditional('col_copy_one_customization_lvl', '==', 'full')
      ->or('col_copy_one_customization_lvl', '==', 'advanced')
      ->and('sections', '==', 'copy-one')
    ->addCheckbox('col_copy_one_order')
      ->setLabel('Display Order')
      ->addChoices($order_options)
  ->addAccordion('col_copy_one_order_end')
    ->conditional('col_copy_one_customization_lvl', '==', 'full')
      ->or('col_copy_one_customization_lvl', '==', 'advanced')
      ->and('sections', '==', 'copy-one')
    ->setConfig('endpoint', 1)

  // Size
  ->addAccordion('col_copy_one_size_start')
    ->setLabel('Size - Column Copy')
    ->conditional('sections', '==', 'copy-one')
    ->addCheckbox('col_copy_one_col_class')
      ->setLabel('Colum Class (bootstrap)')
      ->conditional('sections', '==', 'copy-one')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('col_copy_one_size_end')
    ->conditional('sections', '==', 'copy-one')
    ->setConfig('endpoint', 1)

  // Alignment
  ->addAccordion('col_copy_one_alignment_start')
    ->setLabel('Alignment - Column Copy')
    ->conditional('sections', '==', 'copy-one')
    ->addCheckbox('col_copy_one_text_align')
      ->setLabel('Text Align')
      ->conditional('sections', '==', 'copy-one')
      ->setDefaultValue(array(''))
      ->addChoices($text_align)
  ->addAccordion('col_copy_one_alignment_end')
    ->conditional('sections', '==', '')
    ->setConfig('endpoint', 1)

  // Spacing
  ->addAccordion('col_copy_one_spacing_start')
    ->setLabel('Spacing - Column Copy')
    ->conditional('col_copy_one_customization_lvl', '==', 'full')
      ->and('sections', '==', 'copy-one')
    ->addFields(get_field_partial('spacing-col-copy-one'))
  ->addAccordion('col_copy_one_spacing_end')
    ->conditional('col_copy_one_customization_lvl', '==', 'full')
      ->and('sections', '==', 'copy-one')
    ->setConfig('endpoint', 1);

return $col_copy_config;
