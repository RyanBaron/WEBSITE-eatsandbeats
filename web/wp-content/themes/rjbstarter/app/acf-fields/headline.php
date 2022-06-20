<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_superheadline = array(
  'maxlength' => 200,
  'placeholder' => "Enter a superheadline..."
);

$args_headline = array(
  'maxlength' => 150,
  'placeholder' => "Enter a headline..."
);

$args_subheadline = array(
  'maxlength' => 200,
  'placeholder' => "Enter a subheadline..."
);

$headline = new FieldsBuilder('headline');
$headline
  //->addSelect('headline_style')
  //  ->addChoices(array(
  //    ''            => 'Default',
  //    'line-behind' => 'Line behind'
  //  ))
  ->addText('superheadline', $args_superheadline)
  ->addText('headline', $args_headline)
  ->addText('subheadline', $args_subheadline);
  //->addSelect('weight')
  //  ->addChoices(array(
  //    ''             => "Default",
  //    'text-light'   => "Light",
  //    'text-lighter' => "Lighter",
  //    'text-normal'  => "Normal",
  //    'text-bolder'  => "Bolder",
  //    'text-bold'    => "Bold",
  //    'text-black'   => "Black",
  //  ));

return $headline;
