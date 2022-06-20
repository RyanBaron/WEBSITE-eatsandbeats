<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

  $options = new FieldsBuilder('nav_options', [
    //'style' => 'seamless'
  ]);

  $options
    ->setLocation('post_type', '==', 'page')
      ->or('post_type', '==', 'post')
      ->or('post_type', '==', 'resource')
      ->or('post_type', '==', 'customer');

  $options
    ->addSelect('primary_nav_style')
      ->addChoices(array(
        '' => 'Default',
        'trans-on-dark' => 'Transparent on Dark',
        'trans-on-light trans-on-light-always' => 'Light Nav (On page load)',
        //'trans-on-light' => 'Transparent on Light',
      ));

add_action('acf/init', function () use ($options) {
  acf_add_local_field_group($options->build());
});
