<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$image_size   = \App\get_image_size_options();
$image_style  = \App\get_image_style_options();

$args_image = array(
  'instructions'  => __('Upload an image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 3000,
  'max_heigh'     => 3000,
  'max_size'      => 10,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image');
$image
  ->addImage('col_gated_image', $args_image)
  ->addSelect('col_gated_image_size')
    ->addChoices($image_size)
  ->addCheckbox('col_gated_image_style')
    ->addChoices($image_style);

return $image;
