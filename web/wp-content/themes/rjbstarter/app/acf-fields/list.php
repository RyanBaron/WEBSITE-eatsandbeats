<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$list = new FieldsBuilder('list');
$list
  ->addSelect('list_style')
    //->conditional('section_columns', '==', 'text')
    ->addChoices(array(
      ''   => 'Default',
      'list-pricing'   => 'Pricing List',
    ))
  ->addFields(get_field_partial('list-items'));

return $list;
