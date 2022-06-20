<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$link = new FieldsBuilder('link');
$link
  ->addLink('link')
    ->setRequired()
  //->addSelect('link_modal')
  //  ->addChoices(array(
  //    ''                  => "Use Selected Link (no modal)",
      //'action-plan-modal' => "Action Plan Modal",
  //  ))
  ->addCheckbox('link_options')
    ->addChoices(array(
      'icon' => "Icon",
    ))
  ->addSelect('link_style')
    ->addChoices(array(
      'btn'  => "Button",
      'text' => "Text"
    ))
  ->addSelect('font_weight')
    ->addChoices(array(
      ''  => "Default",
      'text-light' => "200",
      'text-lighter' => "400",
      'text-bolder' => "600",
      'text-bold' => "700",
      'text-black' => "900",
    ))
  ->addAccordion('Link Icon Settings')
    ->conditional('link_options', '==', 'icon')
    ->addFields(get_field_partial('icon'))
    ->addRadio('icon_position')
      ->addChoices(array(
        'icon-after'  => "After text",
        'icon-before' => "Before text",
      ))
  ->addAccordion('Link Icon Settings End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Link Button Settings')
    ->conditional('link_style', '==', 'btn')
    ->addSelect('button_style')
      ->addChoices(array(
        'btn-primary'           => "Primary",
        'btn-secondary'         => "Secondary",
        'btn-dark'              => "Dark",
        'btn-light'             => "Light",
        'btn-success'           => "Success",
        'btn-outline-primary'   => "Primary Outline",
        'btn-outline-secondary' => "Secondary Outline",
        'btn-outline-dark'      => "Dark Outline",
        'btn-outline-light'     => "Light Outline",
        'btn-outline-success'   => "Success Outline",
      ))
    ->addSelect('button_size')
      ->addChoices(array(
        ''       => "Default",
        'btn-lg' => "Large",
        'btn-sm' => "Small",
      ))
  ->addAccordion('Link Button Settings End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Link Text Settings')
    ->conditional('link_style', '==', 'text')
    ->addSelect('text_style')
      ->addChoices(array(
        'text-default'   => "Default",
        'text-primary'   => "Primary",
        'text-secondary' => "Secondary"
      ))
  ->addAccordion('Link Text Settings End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Link Tracking Settings')
    ->addText('data_g_action')
    ->addText('data_g_label')
  ->addAccordion('Link Tracking Settings End')
    ->setConfig('endpoint', 1);
return $link;
