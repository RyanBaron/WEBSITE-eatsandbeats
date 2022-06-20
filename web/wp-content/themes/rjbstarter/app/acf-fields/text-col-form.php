<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_textarea  = \App\get_args_field_textarea();

$text = new FieldsBuilder('text');
$text
  ->addTextarea('col_form_text', $args_textarea);

return $text;
