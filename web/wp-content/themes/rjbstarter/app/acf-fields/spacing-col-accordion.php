<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$padding_options = \App\get_padding_class_options();
$margin_options  = \App\get_margin_class_options();

$spacing = new FieldsBuilder('col_accordion_spacing');
$spacing
  // Col Cards Padding
  ->addCheckbox('col_accordion_padding')
    ->setLabel('Accordion Padding')
    ->setDefaultValue(array('py-2'))
    ->addChoices($padding_options)
  // Col Cards Padding
  ->addCheckbox('col_accordion_margin')
    ->setLabel('Accordion Margin')
    ->setDefaultValue(array('my-2', 'my-md-3'))
    ->addChoices($margin_options);

return $spacing;
