<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options = new FieldsBuilder('feed_options', [
  //'style' => 'seamless'
]);

$options
  ->setLocation('post_type', '==', 'customer');

$options
  // Stat settings
  ->addAccordion('Stats')
    ->addRepeater('feed_stats', array(
      'min'    => 0,
      'max'    => 2,
      'layout' => 'block'
    ))
      ->addText('feed_stat_number')
      ->addTextarea('feed_stat_text')
    ->endRepeater()
  ->addAccordion('Stats End')
    ->setConfig('endpoint', 1);

add_action('acf/init', function () use ($options) {
  acf_add_local_field_group($options->build());
});
