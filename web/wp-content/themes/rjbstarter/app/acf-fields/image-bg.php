<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_image = array(
  'instructions'  => __('Upload and image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 8000,
  'max_heigh'     => 8000,
  'max_size'      => 10,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image_bg');
$image
  ->addImage('image', $args_image)
    ->conditional('section_bg', '==', 'image')
  ->addSelect('image_bg_size')
    ->conditional('section_bg', '==', 'image')
    ->addChoices(array(
      'landscape_lg' => "Landscape (lg)",
      'landscape_xl' => "Landscape (xl)",
      'landscape_2x' => "Landscape (2x)",
      'square_lg'    => "Square (lg)",
      'square_xl'    => "Square (xl)",
      'square_2x'    => "Square (2x)",
      'portrait_lg'  => "Portrait (lg)",
      'portrait_xl'  => "Portrait (xl)",
      'portrait_2x'  => "Portrait (2x)",
      'panoramic_lg' => "Panoramic (lg)",
      'panoramic_xl' => "Panoramic (xl)",
      'panoramic_2x' => "Panoramic (2x)",
      'screen_lg'    => "Screen (lg)",
      'screen_xl'    => "Screen (xl)",
      'screen_2x'    => "Screen (2x)",
    ));
  /*->addSelect('image_bg_overlay')
    ->conditional('section_bg', '==', 'image')
    ->addChoices(array(
      'overlay-50-primary'   => "Primary 50%",
      'overlay-75-primary'   => "Primary 75%",
      'overlay-50-secondary' => "Secondary 50%",
      'overlay-75-secondary' => "Secondary 75%",
    ));*/

return $image;
