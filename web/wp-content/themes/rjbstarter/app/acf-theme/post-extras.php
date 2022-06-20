<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options = new FieldsBuilder('post_extras', [
  //'style' => 'seamless'
]);

$args_image = array(
  'instructions'  => __('Upload an image.'),
  'required'      => 0,
  'return_format' => 'id',
  'preview_size'  => 'full',
  'library'       => 'all', // uploadedTo
  'max_width'     => 2400,
  'max_heigh'     => 2400,
  'max_size'      => 5,
  'mime_types'    => 'jpg,jpeg,png,svg,gif',
);

$options
  ->setLocation('post_type', '==', 'customer')
    ->or('post_type', '==', 'page')
    ->or('post_type', '==', 'post')
    ->or('post_type', '==', 'resource');

$options
  // Headline extra settings
  ->addAccordion('Headline Extras')
    ->addText('universal_superheadline')
      ->setInstructions('(Optional) Add a superheadline to be used where the page title is displayed. For example, category feed pages or other sections that automatically feature the page content')
    ->addText('universal_subheadline')
      ->setInstructions('(Optional) Add a subheadline to be used where the page title is displayed. For example, category feed pages or other sections that automatically feature the page content')
  ->addAccordion('Headline Extras - End')
    ->setConfig('endpoint', 1)
  ->addTab('Single Display')
    ->addAccordion('Feature Image - Start')
      ->addTrueFalse('disable_feature_image_display')
    ->addAccordion('Feature Image - End')
      ->setConfig('endpoint', 1);

add_action('acf/init', function () use ($options) {
  acf_add_local_field_group($options->build());
});
