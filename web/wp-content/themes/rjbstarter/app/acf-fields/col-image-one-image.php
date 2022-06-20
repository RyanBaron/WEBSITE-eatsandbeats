<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$image_laod  = \App\get_image_load_options();
$image_size  = \App\get_image_size_options();
$image_style = \App\get_image_style_options();
$figure_style = \App\get_figure_style_options();
$image_overflow = \App\get_image_overflow_options();

$args_image = array(
  'instructions'  => __('Upload and image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 8000,
  'max_heigh'     => 8000,
  'max_size'      => 20,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image');
$image
  ->addImage('col_image_one_image', $args_image)
  ->addSelect('col_image_one_image_load')
    ->setLabel('Image Load')
    ->addChoices($image_laod)
  ->addSelect('col_image_one_image_size')
    ->setLabel('Image Size')
    ->addChoices($image_size)
  ->addCheckbox('col_image_one_figure_style')
    ->setLabel('Figure Style')
    ->addChoices($figure_style)
  ->addCheckbox('col_image_one_image_style')
    ->setLabel('Image Style')
    ->addChoices($image_style)
  ->addCheckbox('col_image_one_image_overflow')
    ->setLabel('Image Overflow')
    ->addChoices($image_overflow);

return $image;
