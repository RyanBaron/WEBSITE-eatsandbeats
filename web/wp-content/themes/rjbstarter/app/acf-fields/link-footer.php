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
  ->addLink('footer_link')
    ->setLabel('Link')
    ->setRequired()

  ->addCheckbox('footer_link_options')
    ->addChoices(array(
      'icon' => "Icon",
    ))

  ->addAccordion('Link Icon Settings')
    ->conditional('footer_link_options', '==', 'icon')
    //->addFields(get_field_partial('icon'))
    ->addRadio('footer_link_icon_position')
      ->addChoices(array(
        'icon-after'  => "After text",
        'icon-before' => "Before text",
      ))
    ->addSelect('footer_link_icon')
      ->addChoices($fa_icons)
      ->setLabel('Link Icon')
  ->addAccordion('Link Icon Settings End')
    ->setConfig('endpoint', 1)

  // Link Style
  ->addSelect('footer_link_style')
    ->setLabel('Link Style')
    ->addChoices($link_type_options)
  // Link Context
  ->addSelect('footer_link_data_context')
    ->addChoices($link_context_options)

  // Link Button
  ->addAccordion('Link Button Settings')
    ->setLabel('Link Settings')
    ->conditional('footer_link_style', '==', 'btn')
    ->addSelect('footer_button_style')
      ->setLabel('Link Style')
      ->addChoices($button_options)
  ->addAccordion('Link Button Settings End')
    ->setConfig('endpoint', 1)

  // Link Text
  ->addAccordion('Link Text Settings')
    ->setLabel('Text Settings')
    ->conditional('footer_link_style', '==', 'link')
    ->addSelect('footer_text_style')
      ->addChoices($link_text_options)
  ->addAccordion('Link Text Settings End')
    ->setConfig('endpoint', 1)

  // Link Tracking
  ->addAccordion('Link Tracking Settings')
    ->setLabel('Tracking')
    ->addText('footer_data_g_action')
    ->addText('footer_data_g_label')
  ->addAccordion('Link Tracking Settings End')
    ->setConfig('endpoint', 1);
return $link;
