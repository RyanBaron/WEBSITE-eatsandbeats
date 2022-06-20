<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$image_size  = \App\get_image_size_options();
$image_shape = \App\get_image_shape_options();

$quote_config = new FieldsBuilder('quote_config');
$quote_config
  ->addCheckbox('quote_image_size')
    ->addChoices($image_size)
  ->addCheckbox('quote_image_shape')
    ->addChoices($image_shape)
  ->addCheckbox('quote_logo_size')
    ->addChoices($image_size);

return $quote_config;
