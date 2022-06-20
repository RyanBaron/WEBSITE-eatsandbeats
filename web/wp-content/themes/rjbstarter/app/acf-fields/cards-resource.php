<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$cards = new FieldsBuilder('cards');
$cards
  //->addSelect('card_grid_style')
    //->addChoices(array(
    //  'three-col-grid'  => "3 Column Grid",
    //))
    ->addCheckbox('col_class_cards')
      ->addChoices(
        'col-5',
        'col-6',
        'col-7',
        'col-12',
        'col-xs-5',
        'col-xs-6',
        'col-xs-7',
        'col-xs-12',
        'col-sm-5',
        'col-sm-6',
        'col-sm-7',
        'col-sm-12',
        'col-md-4',
        'col-md-5',
        'col-md-6',
        'col-md-7',
        'col-md-8',
        'col-lg-4',
        'col-lg-5',
        'col-lg-6',
        'col-lg-7',
        'col-lg-8',
        'col-xl-3',
        'col-xl-4',
        'col-xl-5',
        'col-xl-6',
        'col-xl-7',
        'col-xl-8',
        'col-xl-9',
        'col-xxl-3',
        'col-xxl-4',
        'col-xxl-5',
        'col-xxl-6',
        'col-xxl-7',
        'col-xxl-8',
        'col-xxl-9',
        'custom'
      )
  ->addRepeater('resource_items', array(
    'min'    => 0,
    'max'    => 24,
    'layout' => 'block'
  ))
    ->addFields(get_field_partial('card-resource'))
  ->endRepeater();

return $cards;
