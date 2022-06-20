<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$forms = \App\get_gravity_form_options();
$form_display = \App\get_gravity_display_style_options();

$form = new FieldsBuilder('form');
/*
$form
  ->addImage('col_image_one_image', $args_image)
  ->addSelect('col_image_one_image_size')
    ->setLabel('Image Size')
    ->addChoices($image_size)
  ->addCheckbox('col_image_one_image_style')
    ->setLabel('Image Style')
    ->addChoices($image_style)
  ->addCheckbox('col_image_one_image_overflow')
    ->setLabel('Image Overflow')
    ->addChoices($image_overflow);
*/
return $form;
