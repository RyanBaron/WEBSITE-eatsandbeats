<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_section_id = array(
  'maxlength' => 20,
  'placeholder' => "Enter a section html id."
);

$general = new FieldsBuilder('section_header');
$general
  ->addSelect('section_header_display')
    ->setRequired()
    ->setDefaultValue('disabled')
    ->addChoices(array(
      'enabled'  => 'Enabled',
      'disabled' => 'Disabled',
      'd-none'   => 'Hidden',
    ))
  ->addAccordion('Header Settings')
    ->addSelect('section_header_style')
      ->addChoices(array(
        ''            => 'Default',
      ))
    ->addSelect('section_header_width')
      ->addChoices(array(
        'col-12 col-md-10 col-xl-8' => 'default',
      ))
    ->addSelect('section_header_align')
      ->addChoices(array(
        '' => 'default',
        'text-left' => 'Text Left',
        'text-center' => 'Text Center',
        'text-right' => 'Text Right',
      ))
    ->addSelect('section_headline_font_weight')
      ->addChoices(array(
        ''  => "Default",
        'headline-light' => "200",
        'headline-lighter' => "400",
        'headline-bolder' => "600",
        'headline-bold' => "700",
        'headline-black' => "900",
      ))
    ->addCheckbox('section_header_row_align')
      ->addChoices(array(
        ''                       => 'Default',
        'align-items-center'     => "Algin items center",
        'justify-content-center' => "Justify content center"
      ))
  ->addAccordion('Header Settings End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Header Contnet')
  ->addText('section_superheadline')
  ->addText('section_headline')
  ->addText('section_subheadline')
  ->addTextarea('section_text')
  ->addAccordion('Header Content End')
    ->setConfig('endpoint', 1);

return $general;
