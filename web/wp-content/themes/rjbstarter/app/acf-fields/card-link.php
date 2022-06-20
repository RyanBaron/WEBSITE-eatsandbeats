<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link_type_options    = \App\get_link_type_class_options(); // Initial button setting
$button_options       = \App\get_button_class_options(); // button classess
$link_text_options    = \App\get_link_text_style_options(); // text link classes
$link_icon_options    = \App\get_link_text_icon_options(); // text link classes
$link_context_options = \App\get_link_context_options();
$fa_icons             = \App\get_fa_icon_options();

$link = new FieldsBuilder('link');
$link
  // Link
  ->addLink('card_link')
    ->setLabel('Link')
    ->setRequired()
    ->addSelect('card_link_icon')
      ->addChoices($fa_icons)
      ->setLabel('Link Icon')
  ->addText('card_data_g_action')
  ->addText('card_data_g_label');

return $link;
