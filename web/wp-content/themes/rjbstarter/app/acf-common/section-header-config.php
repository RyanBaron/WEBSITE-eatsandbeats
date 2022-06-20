<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify    = \App\get_row_justify_options();
$row_align      = \App\get_row_align_options();
$column_classes = \App\get_column_class_options();
$text_align     = \App\get_text_align_options();
$headline_size  = \App\get_headline_size_options();


$section_header_config = new FieldsBuilder('section_header_config');
$section_header_config

  // Header Sizing
  ->addAccordion('Size Header')
    ->setLabel('Size - Header')
    ->conditional('sections', '==', 'header')
    // Header Column Class
    ->addCheckbox('col_class_section_header')
      ->setLabel('Column Class - Header')
      ->conditional('sections', '==', 'header')
      ->setDefaultValue(array('col-12'))
      ->addChoices($column_classes)
    // Headline size
    ->addSelect('headline_size_section_header')
      ->setLabel('Headline Size')
      ->conditional('sections', '!=', '')
      ->setDefaultValue(array(''))
      ->addChoices($headline_size)
  ->addAccordion('Size Header End')
    ->conditional('sections', '==', 'header')
    ->setConfig('endpoint', 1)

  // Header Alignment
  ->addAccordion('Alignment Header')
    ->setLabel('Alignment - Header')
    ->conditional('sections', '==', 'header')
    // Header Text Align
    ->addCheckbox('text_align_section_header')
      ->setLabel('Text Align - Header')
      ->conditional('sections', '==', 'header')
      ->addChoices($text_align)
    // Header Row Align
    ->addCheckbox('row_align_section_header')
      ->setLabel('Row Align - Header')
      ->conditional('sections', '==', 'header')
      ->addChoices($row_align)
    // Header Row Justify
    ->addCheckbox('row_justify_section_header')
      ->setLabel('Row Justify - Header')
      ->conditional('sections', '==', 'header')
      ->addChoices($row_justify)
  ->addAccordion('Alignment Header End')
    ->conditional('sections', '==', 'header')
    ->setConfig('endpoint', 1)

  // Header Spacing
  ->addAccordion('Spacing Header')
    ->setLabel('Spacing - Header')
    ->conditional('sections', '==', 'header')
    ->addFields(get_field_partial('spacing-header'))
  ->addAccordion('Spacing Header End')
    ->conditional('sections', '==', 'header')
    ->setConfig('endpoint', 1);

return $section_header_config;
