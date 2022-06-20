<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$column_cards = new FieldsBuilder('column_cards');
$column_cards
  ->addFields(get_field_partial('cards-universal'));

return $column_cards;
