<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$list_items = new FieldsBuilder('list_items');
$list_items
  ->addRepeater('list_items', array(
    'min'    => 0,
    'max'    => 10,
    'layout' => 'block'
  ))
    ->addText('list_item_headline')
    ->addTextarea('list_item_text')
  ->endRepeater();

return $list_items;
