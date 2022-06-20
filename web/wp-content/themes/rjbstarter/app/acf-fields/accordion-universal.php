<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$text_align      = \App\get_text_align_options();

$accordion = new FieldsBuilder('accordion');
$accordion
// Column Headline
->addAccordion('Accordion Column Header')
  ->setLabel("Column Header")
  ->addFields(get_field_partial('accordion-col-headline'))
  ->addCheckbox('headline_col_accordion_align')
  ->addChoices($text_align)
->addAccordion('Accordion Column Header End')
  ->setConfig('endpoint', 1)

  // Accordion Items
  ->addRepeater('accordion_items', array(
    'min'    => 0,
    'max'    => 50,
    'layout' => 'block'
  ))
    ->setLabel('Accordion Items')
    ->addFields(get_field_partial('accordion-item-universal'))
  ->endRepeater()
  // Accordion Style/Configuration
  ->addAccordion('accordion_styles')
    ->setLabel('Accordion - General Styles')
    ->addSelect('accordion_style')
      ->addChoices(array(
        '' => 'Default',
        'accrodion-faq' => 'FAQ',
        'accordion-faq-lg' => 'FAQ (lg)',
      ))
    ->addSelect('accordion_bg_title')
      ->addChoices(array(
        '' => 'Default',
        'bg-white' => 'White',
        'bg-lightest' => 'Lightest',
        'bg-lighter' => 'Lighter',
        'bg-light' => 'Light',
        'bg-gray' => 'Gray',
        'bg-dark' => 'Dark',
        'bg-darker' => 'Darker',
        'bg-primary' => 'Primary',
        'bg-secondary' => 'Secondary',
      ))
    ->addTrueFalse('accordion_title_leading_chevron')
    ->addCheckbox('accordion_title_styles')
      ->addChoices(array(
        'thin-title' => 'Thin title',
      ))
    ->addSelect('accordion_bg_content')
      ->addChoices(array(
        '' => 'Default',
        'bg-white' => 'White',
        'bg-lightest' => 'Lightest',
        'bg-lighter' => 'Lighter',
        'bg-light' => 'Light',
        'bg-gray' => 'Gray',
        'bg-dark' => 'Dark',
        'bg-darker' => 'Darker',
        'bg-primary' => 'Primary',
        'bg-secondary' => 'Secondary',
      ))
    ->addCheckbox('accordion_content_styles')
      ->addChoices(array(
        'top-inset-shadow' => 'Top inset shadow',
      ))
    ->addTrueFalse('accordion_enable_multi_open')
  ->addAccordion('Accordion Styles End')
    ->setConfig('endpoint', 1);
return $accordion;
