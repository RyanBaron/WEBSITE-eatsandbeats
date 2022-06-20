<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$list = new FieldsBuilder('list');
$list
  ->addAccordion('List')
    ->addSelect('col_copy_one_list_display')
      ->addChoices(array(
        ''     => 'Hide',
        'show' => 'Show',
      ))
    ->addRepeater('col_copy_one_list_items', array(
      'min'    => 0,
      'max'    => 20,
      'layout' => 'block'
    ))
      ->conditional('col_copy_one_list_display', '==', 'show')
      ->addFields(get_field_partial('list-item'))
    ->endRepeater()

    ->addSelect('col_copy_one_list_style')
      ->conditional('col_copy_one_list_display', '==', 'show')
      ->addChoices(array(
        ''     => 'Default',
        'default-indent' => 'Default (indent)',
        'ordered' => 'Ordered',
        'ordered-indent' => 'Ordered (indent)',
        'bullets' => 'Bullets',
        'bullets-indent' => 'Bullets (indent)',
        'fa-list-icon' => 'Icon',
        'fa-list-icon-lg' => 'Icon large',
        'fa-list-icon-indent' => 'Icon (indent)',
        'fa-list-icon-lg-indent' => 'Icon large (indent)',
        'horiz-2x-md' => 'Horizontal (2x-md)',
        'horiz-2x-lg' => 'Horizontal (2x-lg)',
        'fa-horiz-2x-md' => 'Icon Horizontal (2x-md)',
        'fa-horiz-2x-lg' => 'Icon Horizontal (2x-lg)',
        'stats-vert' => 'Stats - Vertical',
        'stats-horiz' => 'Stats - Horizontal',
        'stats-horiz-2x-md' => 'Stats - Horizontal (2x-md)',
        'stats-horiz-2x-lg' => 'Stats - Horizontal (2x-lg)',
      ))

    ->addSelect('col_copy_one_list_icon_color')
      ->conditional('col_copy_one_list_style', '==', 'fa-list-icon-indent')
        ->or('col_copy_one_list_style', '==', 'fa-list-icon-lg-indent')
        ->or('col_copy_one_list_style', '==', 'fa-list-icon')
        ->or('col_copy_one_list_style', '==', 'fa-list-icon-lg')
      ->addChoices(array(
        ''     => 'Default',
        'icon-primary'   => 'Icon primary',
        'icon-secondary' => 'Icon secondary',
        'icon-dark'      => 'Icon dark',
        'icon-darker'    => 'Icon darker',
        'icon-gray'      => 'Icon gray',
        'icon-light'     => 'Icon light',
        'icon-lighter'   => 'Icon lighter',
        'icon-green'     => 'Icon green',
        'icon-purple'    => 'Icon purple',
        'icon-orange'    => 'Icon orange',
      ))

  ->addAccordion('List - Col Copy One End')
  ->setConfig('endpoint', 1);

return $list;
