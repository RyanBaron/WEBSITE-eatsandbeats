<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$image_size   = \App\get_image_size_options();
$image_style  = \App\get_image_style_options();
$figure_style = \App\get_figure_style_options();

$args_image = array(
  'instructions'  => __('Upload an image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 8000,
  'max_heigh'     => 8000,
  'max_size'      => 10,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image');
$image
  ->addImage('image', $args_image)
  ->addSelect('image_size')
    ->addChoices($image_size)
  ->addCheckbox('image_style')
    ->addChoices($image_style)
  ->addCheckbox('figure_style')
    ->addChoices($figure_style);

return $image;
