<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$accordion = new FieldsBuilder('accordion');
$accordion
  ->addAccordion('Accordion Title')
    ->addSelect('accordion_initial_state')
      ->addChoices(array(
        ''     => 'Default (collapsed)',
        'show' => 'Show (expanded)', // show is a specific bs class
      ))
    ->addText('title')
  ->addAccordion('Accordion Title End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Accordion Content')
    ->addFields(get_field_partial('headline'))
    ->addFields(get_field_partial('text'))
  ->addAccordion('Accordion Content End')
    ->setConfig('endpoint', 1);
return $accordion;
