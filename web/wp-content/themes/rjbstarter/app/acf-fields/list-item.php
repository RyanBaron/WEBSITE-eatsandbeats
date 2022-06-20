<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$fa_icons  = \App\get_fa_icon_options();

$list_items = new FieldsBuilder('list_item');
$list_items
  ->addSelect('list_item_icon')
    ->addChoices($fa_icons)
  ->addText('list_item_headline')
  ->addTextarea('list_item_text');

return $list_items;
