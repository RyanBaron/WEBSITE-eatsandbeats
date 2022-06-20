<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$row_align = \App\get_row_align_options();
$text_align = \App\get_text_align_options();

$links = new FieldsBuilder('links');
$links
->addSelect('link_items_align')
  ->addChoices($text_align)
->addCheckbox('link_items_justify')
  ->addChoices($row_align)
  ->addRepeater('link_items', array(
    'min'    => 0,
    'max'    => 4,
    'layout' => 'block'
  ))
    ->addFields(get_field_partial('link'))
  ->endRepeater();

return $links;
