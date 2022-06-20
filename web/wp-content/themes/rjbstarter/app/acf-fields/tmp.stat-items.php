<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$stat_items = new FieldsBuilder('stat_items');
$stat_items
  ->addRepeater('stat_items', array(
    'min'    => 0,
    'max'    => 4,
    'layout' => 'block'
  ))
    ->addText('stat_item_number')
    ->addText('stat_item_headline')
    ->addTextarea('stat_item_text')
  ->endRepeater();

return $stat_items;
