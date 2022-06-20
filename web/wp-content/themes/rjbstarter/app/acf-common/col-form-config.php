<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify     = \App\get_row_justify_options();
$row_align       = \App\get_row_align_options();
$column_classes  = \App\get_column_class_options();
$text_align      = \App\get_text_align_options();
$order_options   = \App\get_column_order_options();

$col_form_config = new FieldsBuilder('col_form_config');
$col_form_config
  // Order
  ->addAccordion('Order Column Form')
    ->setLabel('Order - Column Form')
    ->addCheckbox('col_form_col_order')
      ->conditional('sections', '==', 'form')
      ->addChoices($order_options)
  ->addAccordion('Order Column Form End')
    ->conditional('sections', '==', 'form')
    ->setConfig('endpoint', 1)
  // Size
  ->addAccordion('Size Column Form')
    ->setLabel('Size - Column Form')
    ->conditional('sections', '==', 'form')
    ->addCheckbox('col_form_col_class')
      ->conditional('sections', '==', 'form')
      ->setDefaultValue(array('col-12', 'col-md-6'))
      ->addChoices($column_classes)
  ->addAccordion('Size Column Form End')
    ->conditional('sections', '==', 'form')
    ->setConfig('endpoint', 1)
  // Alignment
  ->addAccordion('Alignment Column Form')
    ->setLabel('Alignment - Column Form')
    ->conditional('sections', '==', 'form')
    ->addCheckbox('col_form_text_align')
      ->conditional('sections', '==', 'form')
      ->setDefaultValue(array('text-center'))
      ->addChoices($text_align)
  ->addAccordion('Alignment Column Form End')
    ->conditional('sections', '==', 'form')
    ->setConfig('endpoint', 1)
  // Spacing
  ->addAccordion('Spacing Column Form')
    ->setLabel('Spacing - Column Form')
    ->conditional('sections', '==', 'form')
    ->addFields(get_field_partial('spacing-col-form'))
  ->addAccordion('Spacing Column Form End')
    ->conditional('sections', '==', 'form')
    ->setConfig('endpoint', 1);

return $col_form_config;
