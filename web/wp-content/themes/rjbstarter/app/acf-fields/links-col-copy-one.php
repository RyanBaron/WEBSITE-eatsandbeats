<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link_size       = \App\get_link_size_options();
$text_align      = \App\get_text_align_options();
$hide_content    = \App\get_hide_content_options();
$link_order      = \App\get_col_link_order_options();

$links = new FieldsBuilder('col_copy_one_links');
$links
  ->addSelect('col_copy_one_link_order')
    ->setLabel('Link order')
    ->addChoices($link_order)
  ->addRepeater('col_copy_one_link_items', array(
    'min'    => 0,
    'max'    => 4,
    'layout' => 'block'
  ))
    ->setLabel('Links')
    ->addFields(get_field_partial('link-col-copy-one'))
  ->endRepeater()

  ->addCheckbox('col_copy_one_link_align')
    ->setLabel('Links - Alignment')
    ->addChoices($text_align)

  ->addSelect('col_copy_one_link_size')
    ->setLabel('Links - Size')
    ->addChoices($link_size)

  ->addCheckbox('col_copy_one_link_hide')
    ->setLabel('Links - Hide')
    ->addChoices($hide_content);

return $links;
