<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_text = array(
  'maxlength' => 20000,
  'placeholder' => "Enter text..."
);

$text = new FieldsBuilder('text');
$text
  ->addTextarea('text', $args_text);

return $text;
