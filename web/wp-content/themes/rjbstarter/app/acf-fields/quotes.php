<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$quotes = new FieldsBuilder('quotes');
$quotes
  ->addSelect('quote_display_style')
    ->addChoices(array(
      ''  => "Default",
    ))
  ->addRepeater('quote_items', array(
    'min'    => 0,
    'max'    => 10,
    'layout' => 'block'
  ))
    ->addFields(get_field_partial('quote'))
  ->endRepeater();

return $quotes;
