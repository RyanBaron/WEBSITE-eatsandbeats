<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$column_copy = new FieldsBuilder('column_copy');
$column_copy
  ->addFields(get_field_partial('headline-col-copy-one'))
  ->addFields(get_field_partial('text-col-copy-one'))
  ->addFields(get_field_partial('list-items-col-copy-one'))
  ->addFields(get_field_partial('quotes-col-copy-one'))

  ->addAccordion('Links - Column Copy')
    ->addFields(get_field_partial('links-col-copy-one'))
  ->addAccordion('Links - Column Copy End')
    ->setConfig('endpoint', 1);

return $column_copy;
