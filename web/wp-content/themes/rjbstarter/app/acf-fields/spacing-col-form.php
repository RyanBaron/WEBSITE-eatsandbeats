<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$padding_options = \App\get_padding_class_options();
$margin_options  = \App\get_margin_class_options();

$spacing = new FieldsBuilder('col_form_spacing');
$spacing
  // Col Form Padding
  ->addCheckbox('col_form_padding')
    ->setLabel('Column Padding')
    ->setDefaultValue(array('py-3'))
    ->addChoices($padding_options)
  // Col Form Margin
  ->addCheckbox('col_form_margin')
    ->setLabel('Column Margin')
    ->setDefaultValue(array('my-1'))
    ->addChoices($margin_options);

return $spacing;
