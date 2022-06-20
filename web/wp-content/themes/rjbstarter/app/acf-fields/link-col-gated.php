<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link_type_options    = \App\get_link_type_class_options(); // Initial button setting
$button_options       = \App\get_button_class_options(); // button classess
$link_text_options    = \App\get_text_link_class_options(); // text link classes
$link_context_options = \App\get_link_context_options();
$fa_icons             = \App\get_fa_icon_options();

$link = new FieldsBuilder('link');
$link
  // Link
  ->addLink('col_gated_link')
    ->setLabel('Link')
    ->setRequired()

  ->addCheckbox('col_gated_link_options')
    ->addChoices(array(
      'icon' => "Icon",
    ))

  ->addAccordion('Link Icon Settings')
    ->conditional('col_gated_link_options', '==', 'icon')
    ->addRadio('col_gated_link_icon_position')
      ->addChoices(array(
        'icon-after'  => "After text",
        'icon-before' => "Before text",
      ))
    ->addSelect('col_gated_link_icon')
      ->addChoices($fa_icons)
      ->setLabel('Link Icon')
  ->addAccordion('Link Icon Settings End')
    ->setConfig('endpoint', 1)

  // Link Style
  ->addSelect('col_gated_link_style')
    ->setLabel('Link Style')
    ->addChoices($link_type_options)

  // Link Button
  ->addAccordion('Link Button Settings')
    ->setLabel('Link Settings')
    ->conditional('col_gated_link_style', '==', 'btn')
    ->addSelect('col_gated_button_style')
      ->setLabel('Link Style')
      ->addChoices($button_options)
  ->addAccordion('Link Button Settings End')
    ->setConfig('endpoint', 1)

  // Link Text
  ->addAccordion('Link Text Settings')
    ->setLabel('Text Settings')
    ->conditional('col_gated_link_style', '==', 'link')
    ->addSelect('col_gated_text_style')
      ->addChoices($link_text_options)
  ->addAccordion('Link Text Settings End')
    ->setConfig('endpoint', 1)

  // Link Tracking
  ->addAccordion('Link Tracking Settings')
    ->setLabel('Tracking')
    ->addText('col_gated_data_g_action')
    ->addText('col_gated_data_g_label')
  ->addAccordion('Link Tracking Settings End')
    ->setConfig('endpoint', 1);
return $link;
