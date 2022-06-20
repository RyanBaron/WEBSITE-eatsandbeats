<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$text_align      = \App\get_text_align_options();
$hide_content    = \App\get_hide_content_options();

$links = new FieldsBuilder('col_copy_links');
$links
  ->addRepeater('quote_link_items', array(
    'min'    => 0,
    'max'    => 2,
    'layout' => 'block'
  ))
    ->setLabel('Links')
    ->addFields(get_field_partial('quote-link'))
  ->endRepeater()

  ->addCheckbox('quote_link_align')
    ->setLabel('Links - Alignment')
    ->addChoices($text_align)

  ->addCheckbox('quote_link_hide')
    ->setLabel('Links - Hide')
    ->addChoices($hide_content);

return $links;
