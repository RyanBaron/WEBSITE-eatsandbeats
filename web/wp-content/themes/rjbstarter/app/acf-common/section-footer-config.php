<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_justify     = \App\get_row_justify_options();
$row_align       = \App\get_row_align_options();
$column_classes  = \App\get_column_class_options();
$text_align      = \App\get_text_align_options();

$section_footer_config = new FieldsBuilder('section_footer_config');
$section_footer_config
  ->addAccordion('Size Footer')
    ->conditional('sections', '==', 'footer')
    ->addCheckbox('col_class_section_footer')
      ->setLabel('Column Class Footer')
      ->conditional('sections', '==', 'footer')
      ->setDefaultValue(array('col-12'))
      ->addChoices($column_classes)
  ->addAccordion('Size Footer End')
    ->conditional('sections', '==', 'footer')
    ->setConfig('endpoint', 1)

  ->addAccordion('Alignment Footer')
    ->conditional('sections', '==', 'footer')
    ->addCheckbox('text_align_section_footer')
      ->setLabel('Text Align Footer')
      ->conditional('sections', '==', 'footer')
      ->addChoices($text_align)
    ->addCheckbox('row_align_section_footer')
      ->setLabel('Row Align Footer')
      ->conditional('sections', '==', 'footer')
      ->addChoices($row_align)
    ->addCheckbox('row_justify_section_footer')
      ->setLabel('Row Justify Footer')
      ->conditional('sections', '==', 'footer')
      ->addChoices($row_justify)
  ->addAccordion('Alignment Footer End')
    ->conditional('sections', '==', 'footer')
    ->setConfig('endpoint', 1)

  ->addAccordion('Spacing Footer')
    ->conditional('sections', '==', 'footer')
    ->addFields(get_field_partial('spacing-footer'))
  ->addAccordion('Spacing Footer End')
    ->conditional('sections', '==', 'footer')
    ->setConfig('endpoint', 1);

return $section_footer_config;
