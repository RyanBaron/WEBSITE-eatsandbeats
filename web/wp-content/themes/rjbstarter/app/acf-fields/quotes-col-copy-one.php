<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$quotes = new FieldsBuilder('quotes');
$quotes
  // Link Button
  ->addAccordion('Quotes')
    //->conditional('col_copy_one_quote_display', '!=', '')
    ->addSelect('col_copy_one_quote_display')
      ->setLabel('Quote Display')
      ->addChoices(array(
        '' => "None",
        'default'  => "Default",
        //'advanced' => "Center",
        //'full' => "Full",
      ))
    ->addRepeater('col_copy_one_quote_items', array(
      'min'    => 0,
      'max'    => 6,
      'layout' => 'block'
    ))
      ->setLabel('Quotes')
      ->conditional('col_copy_one_quote_display', '!=', '')
      ->addFields(get_field_partial('quote'))
    ->endRepeater()
  ->addAccordion('Quote Items End')
    ->conditional('col_copy_one_quote_display', '!=', '')
    ->setConfig('endpoint', 1)

    // Link Button
    ->addAccordion('Quote Config')
      ->conditional('col_copy_one_quote_display', '==', 'advanced')
        ->or('col_copy_one_quote_display', '==', 'full')
      ->addFields(get_field_partial('quote-items-config'))
    ->addAccordion('Quote Config End')
      ->setConfig('endpoint', 1);

return $quotes;
