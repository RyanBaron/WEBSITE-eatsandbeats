<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$column_accordion = new FieldsBuilder('column_accordion');
$column_accordion
  ->addFields(get_field_partial('accordion-universal'));

return $column_accordion;
