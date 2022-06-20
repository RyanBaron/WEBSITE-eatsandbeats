<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_image = array(
  'instructions'  => __('Upload an image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all', // uploadedTo
  'max_width'     => 3840,
  'max_heigh'     => 3840,
  'max_size'      => 10,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('quote_image');
$image
  ->addImage('quote_image', $args_image);

return $image;
