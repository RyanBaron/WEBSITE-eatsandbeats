<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$quote = new FieldsBuilder('quote');
$quote
  ->addCheckbox('quote_options')
    ->addChoices(array(
      'quote-text'  => "Quote Text",
      'quote-image' => "Quote Image",
      'quote-logo'  => "Quote Logo",
      'quote-cite'  => "Quote Cite",
      'quote-link'  => "Quote Link",
    ))
    ->addAccordion('Quote Item Image')
      ->conditional('quote_options', '==', 'quote-image')
      ->addFields(get_field_partial('quote-image'))
    ->addAccordion('Quote Item Image End')
      ->setConfig('endpoint', 1)
    ->addTextarea('quote')
      ->conditional('quote_options', '==', 'quote-text')
    ->addText('name')
      ->conditional('quote_options', '==', 'quote-cite')
    ->addText('position')
      ->conditional('quote_options', '==', 'quote-cite')
    ->addText('company')
      ->conditional('quote_options', '==', 'quote-cite')
    ->addAccordion('Quote Item Logo')
      ->conditional('quote_options', '==', 'quote-logo')
      ->addFields(get_field_partial('quote-logo'))
    ->addAccordion('Quote Item Logo End')
      ->setConfig('endpoint', 1);
    //->addAccordion('Quote Item Link')
    //  ->conditional('quote_options', '==', 'quote-link')
    //  ->addFields(get_field_partial('quote-links'))
    //->addAccordion('Quote Item Link End')
    //  ->setConfig('endpoint', 1);
return $quote;
