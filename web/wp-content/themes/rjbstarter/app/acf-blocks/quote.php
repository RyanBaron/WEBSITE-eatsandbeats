<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

add_filter('mmirus/register-acf-gutenberg-block', function( $blocks, $block_defaults) {

  $g = array(
    'action' => 'click',
    'label'  => 'quote'
  );

  $config = new FieldsBuilder('quote_config');
  $config
    ->addFields(get_field_partial('section-config-quote'));

  $quote = new FieldsBuilder('quote');
  $quote
    ->addFields(get_field_partial('quote'));

  $quote = (new FieldsBuilder('quote'))
    ->addTab('Config')
      ->addFields($config)
    ->addTab('Quote')
      ->addFields($quote)
    ->setLocation('block', '==', 'acf/quote')
    ->getRootContext()
    ->build();

  array_push( $blocks, [
    'name' => 'quote',
    'title' => 'Quote',
    'description' => 'Quote display',
    'keywords' => ['quote'],
    'render_template' => get_theme_file_path().'/resources/views/sections/quote/quote.blade.php',
    'fields' => $quote
  ]);

  return $blocks;
}, 10, 2);
