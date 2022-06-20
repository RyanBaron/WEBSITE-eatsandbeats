<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$card = new FieldsBuilder('card');
$card
  ->addPostObject('resource_post')
    ->setConfig('post_type', 'post')
    //->setConfig('type' 'post_object')
  ->addCheckbox('card_options')
    ->addChoices(array(
      'headline' => "Custom Headline",
      'text'     => "Custom Text",
      'link'     => "Custom Link",
    ))

  // Spacing settings
  ->addAccordion('Card Spacing')
    ->addFields(get_field_partial('spacing'))
  ->addAccordion('Card Spacing End')
    ->setConfig('endpoint', 1)

  // Link Settings
  ->addAccordion('Card Headline')
    ->conditional('card_options', '==', 'headline')
    ->addFields(get_field_partial('headline'))
  ->addAccordion('Card Headline End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Card Text')
    ->conditional('card_options', '==', 'text')
    ->addFields(get_field_partial('text'))
  ->addAccordion('Card Text End')
    ->setConfig('endpoint', 1)

  // Link Settings
  ->addAccordion('Card Link')
    ->conditional('card_options', '==', 'link')
    ->addFields(get_field_partial('link-card'))
  ->addAccordion('Card Link End')
    ->setConfig('endpoint', 1);

return $card;
