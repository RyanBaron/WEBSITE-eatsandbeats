<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$padding_options = \App\get_padding_class_options();
$margin_options  = \App\get_margin_class_options();

$spacing = new FieldsBuilder('spacing');
$spacing
  ->addCheckbox('footer_padding')
    ->setLabel('Footer Padding')
    ->addChoices($padding_options)
    ->setDefaultValue(array())
  ->addCheckbox('footer_margin')
    ->setLabel('Footer Margin')
    ->addChoices($margin_options)
    ->setDefaultValue(array());
return $spacing;
