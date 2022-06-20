<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$image_size  = \App\get_image_size_options();

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page([
    'page_title' => 'Resource options',
    'menu_title' => 'Resource options',
    'menu_slug'  => 'resource-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
  ]);

  $options = new FieldsBuilder('resource_options', [
    'style' => 'seamless'
  ]);

  $options
    ->setLocation('options_page', '==', 'resource-options');

  $options
    ->addTab('Resource Feed')
      ->addGroup('resource')
        ->addText('archive_title')
        ->addTextarea('archive_desc')
        //->addSelect('default_quote_image_size')
        //  ->addChoices($image_size);
        ->addCheckbox('feed_card_v_padding')
          ->addChoices(array(
            'py-0' => 'py-0',
            'py-1' => 'py-1',
            'py-2' => 'py-2',
            'py-3' => 'py-3',
            'py-4' => 'py-4',
            'py-5' => 'py-5',
            'pt-0' => 'pt-0',
            'pt-1' => 'pt-1',
            'pt-2' => 'pt-2',
            'pt-3' => 'pt-3',
            'pt-4' => 'pt-4',
            'pt-5' => 'pt-5',
            'pb-0' => 'pb-0',
            'pb-1' => 'pb-1',
            'pb-2' => 'pb-2',
            'pb-3' => 'pb-3',
            'pb-4' => 'pb-4',
            'pb-5' => 'pb-5',
          ));

  add_action('acf/init', function () use ($options) {
    acf_add_local_field_group($options->build());
  });

}
