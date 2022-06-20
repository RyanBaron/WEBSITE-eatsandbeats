<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify       = \App\get_row_justify_options();
$row_align         = \App\get_row_align_options();
$column_classes    = \App\get_column_class_options();
$text_align        = \App\get_text_align_options();
$order_options     = \App\get_column_order_options();
$customization_lvl = \App\get_section_customization_lvl_options();

$col_image_config = new FieldsBuilder('col_image_config');
$col_image_config
  // Section Customization
  ->addSelect('col_image_one_customization_lvl')
    ->conditional('sections', '==', 'image-one')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)

  // Order
  ->addAccordion('col_image_one_order_start')
    ->setLabel('Order - Column Image')
    ->addCheckbox('col_image_one_order')
      ->setLabel('Image Column Order')
      ->conditional('sections', '==', 'image-one')
      ->addChoices($order_options)
  ->addAccordion('col_image_one_order_end')
    ->conditional('sections', '==', 'image-one')
    ->setConfig('endpoint', 1)

  // Size
  ->addAccordion('col_image_one_size_start')
    ->setLabel('Size - Column Image')
    ->conditional('sections', '==', 'image-one')
    ->addCheckbox('col_image_one_col_class')
      ->setLabel('Image Column Size')
      ->conditional('sections', '==', 'image-one')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('col_image_one_size_end')
    ->conditional('sections', '==', 'image-one')
    ->setConfig('endpoint', 1)

  // Alignment
  ->addAccordion('col_image_one_alignment_start')
    ->setLabel('Alignment - Column Image')
    ->conditional('sections', '==', 'image-one')
    ->addCheckbox('col_image_one_text_align')
      ->setLabel('Image Column Text Align')
      ->conditional('sections', '==', 'image-one')
      ->setDefaultValue(array(''))
      ->addChoices($text_align)
  ->addAccordion('col_image_one_alignment_end')
    ->conditional('sections', '==', 'image-one')
    ->setConfig('endpoint', 1)

  // Spacing
  ->addAccordion('col_image_one_spacing_start')
    ->setLabel('Spacing - Column Image')
    ->conditional('col_image_one_customization_lvl', '==', 'full')
      ->and('sections', '==', 'image-one')
    ->addFields(get_field_partial('spacing-col-image-one'))
  ->addAccordion('col_image_one_spacing_end')
    ->conditional('col_image_one_customization_lvl', '==', 'full')
      ->and('sections', '==', 'image-one')
    ->setConfig('endpoint', 1);


return $col_image_config;
