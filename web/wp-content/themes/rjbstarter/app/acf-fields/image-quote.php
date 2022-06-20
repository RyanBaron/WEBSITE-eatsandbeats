<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_image = array(
  'instructions'  => __('Upload and image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all', // uploadedTo
  'max_width'     => 3840,
  'max_heigh'     => 3840,
  'max_size'      => 8,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image_quote');
$image
  ->addImage('image_quote', $args_image)
  ->addSelect('image_quote_size')
    ->addChoices(array(
      'square_sm' => "Square (sm)",
      'square_md' => "Square (md)",
      'square_lg' => "Square (lg)",
      'square_xl' => "Square (xl)",
    ));

return $image;
