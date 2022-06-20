<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$text_align      = \App\get_text_align_options();

$links = new FieldsBuilder('card_links');
$links
  ->addRepeater('card_link_items', array(
    'min'    => 0,
    'max'    => 2,
    'layout' => 'block'
  ))
    ->setLabel('Links')
    ->addFields(get_field_partial('card-link'))
  ->endRepeater();

return $links;
