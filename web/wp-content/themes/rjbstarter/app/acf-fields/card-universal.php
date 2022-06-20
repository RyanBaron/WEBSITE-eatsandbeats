<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_card_class = \App\get_args_field_card_class();

$card = new FieldsBuilder('card');
$card
  ->addCheckbox('card_options')
    ->addChoices(array(
      'video' => "Video",
      'icon'  => "Icon",
      'image' => "Image",
      'copy'  => "Copy",
      //'quote' => "Quote",
      //'list'  => "List",
      'link'  => "Link",
      'custom'=> "Custom",
    ))

  ->addAccordion('Card Video')
    ->conditional('card_options', '==', 'video')
    ->addFields(get_field_partial('video'))
  ->addAccordion('Card Video End')
    ->conditional('card_options', '==', 'video')
    ->setConfig('endpoint', 1)

  ->addAccordion('Card Image')
    ->conditional('card_options', '==', 'image')
    ->addFields(get_field_partial('card-image'))
  ->addAccordion('Card Image End')
    ->conditional('card_options', '==', 'image')
    ->setConfig('endpoint', 1)

  ->addAccordion('Card Icon')
    ->conditional('card_options', '==', 'icon')
    ->addFields(get_field_partial('card-icon'))
  ->addAccordion('Card Icon End')
    ->conditional('card_options', '==', 'icon')
    ->setConfig('endpoint', 1)

  ->addAccordion('Card Copy')
    ->conditional('card_options', '==', 'copy')
    ->addFields(get_field_partial('headline'))
    ->addFields(get_field_partial('text'))
  ->addAccordion('Card Copy End')
    ->conditional('card_options', '==', 'copy')
    ->setConfig('endpoint', 1)

  /*
  ->addAccordion('Quote')
    ->conditional('card_options', '==', 'quote')
    ->addFields(get_field_partial('quote'))
  ->addAccordion('Card Quote End')
    ->conditional('card_options', '==', 'quote')
    ->setConfig('endpoint', 1)
  */

  ->addAccordion('Card Links')
    ->conditional('card_options', '==', 'link')
    ->addFields(get_field_partial('card-links'))
  ->addAccordion('Card Link End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Card Custom')
    ->conditional('card_options', '==', 'custom')
    ->addText('card_class_custom', $args_card_class)
  ->addAccordion('Card Custom End')
    ->setConfig('endpoint', 1);

return $card;
