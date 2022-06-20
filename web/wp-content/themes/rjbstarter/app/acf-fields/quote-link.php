<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link_type_options    = \App\get_link_type_class_options(); // Initial button setting
$button_options       = \App\get_button_class_options(); // button classess
$link_text_options    = \App\get_text_link_class_options(); // text link classes
$link_context_options = \App\get_link_context_options();

$link = new FieldsBuilder('link');
$link
  // Link
  ->addLink('quote_link')
    ->setLabel('Link')
    ->setRequired()
  // Link Style
  ->addSelect('quote_link_style')
    ->setLabel('Link Style')
    ->addChoices($link_type_options)
  // Link Context
  ->addSelect('quote_link_data_context')
    ->addChoices($link_context_options)

  // Link Button
  ->addAccordion('Link Button Settings')
    ->setLabel('Link Settings')
    ->conditional('quote_link_style', '==', 'btn')
    ->addSelect('quote_button_style')
      ->setLabel('Link Style')
      ->addChoices($button_options)
  ->addAccordion('Link Button Settings End')
    ->setConfig('endpoint', 1)

  // Link Text
  ->addAccordion('Link Text Settings')
    ->setLabel('Text Settings')
    ->conditional('quote_link_style', '==', 'link')
    ->addSelect('quote_text_style')
      ->addChoices($link_text_options)
  ->addAccordion('Link Text Settings End')
    ->setConfig('endpoint', 1)

  // Link Tracking
  ->addAccordion('Link Tracking Settings')
    ->setLabel('Tracking')
    ->addText('quote_data_g_action')
    ->addText('quote_data_g_label')
  ->addAccordion('Link Tracking Settings End')
    ->setConfig('endpoint', 1);
return $link;
