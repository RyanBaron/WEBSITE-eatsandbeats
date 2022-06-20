<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link_size       = \App\get_link_size_options();
$text_align      = \App\get_text_align_options();
$hide_content    = \App\get_hide_content_options();

$links = new FieldsBuilder('footer_links');
$links
  ->addRepeater('footer_link_items', array(
    'min'    => 0,
    'max'    => 4,
    'layout' => 'block'
  ))
    ->setLabel('Links')
    ->addFields(get_field_partial('link-footer'))
  ->endRepeater()

  ->addCheckbox('footer_link_align')
    ->setLabel('Links - Alignment')
    ->addChoices($text_align)

  ->addSelect('footer_link_size')
    ->setLabel('Links - Size')
    ->addChoices($link_size)

  ->addCheckbox('footer_link_hide')
    ->setLabel('Links - Hide')
    ->addChoices($hide_content);

return $links;
