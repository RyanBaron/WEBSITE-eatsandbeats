<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_image = array(
  'instructions'  => __('Upload a card image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all',
  'max_width'     => 4000,
  'max_heigh'     => 4000,
  'max_size'      => 6,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$image = new FieldsBuilder('image');
$image
  ->addImage('image', $args_image);

return $image;
