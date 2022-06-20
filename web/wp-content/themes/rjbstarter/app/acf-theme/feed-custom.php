<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options = new FieldsBuilder('feed_options', [
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
    //->or('post_type', '==', 'post')
    ->or('post_type', '==', 'resource');

$options
  // List settings
  ->addCheckbox('feed_display')
    ->addChoices(array(
      'disable-headline'     => 'Disable headline',
      'disable-excerpt'      => 'Disable excerpt',
      'enable-superheadline' => 'Enable superheadline',
      'enable-subheadline'   => 'Enable subheadline',
      'enable-list'          => 'Enable list',
      'enable-quote'         => 'Enable quote',
      'enable-button'        => 'Enable button',
    ))
  ->addAccordion('Feed - List')

  ->addSelect('feed_list_style')
    ->addChoices(array(
      ''     => 'Default',
      'default-indent' => 'Default (indent)',
      'bullets' => 'Bullets',
      'bullets-indent' => 'Bullets (indent)',
      'horiz-2x-md' => 'Horizontal (2x-md)',
      'horiz-2x-lg' => 'Horizontal (2x-lg)',
      'stats-vert' => 'Stats - Vertical',
      'stats-horiz' => 'Stats - Horizontal',
      'stats-horiz-2x-md' => 'Stats - Horizontal (2x-md)',
      'stats-horiz-2x-lg' => 'Stats - Horizontal (2x-lg)',
      //'fa-list-icon' => 'Icon',
      //'fa-list-icon-lg' => 'Icon large',
      //'fa-list-icon-indent' => 'Icon (indent)',
      //'fa-list-icon-lg-indent' => 'Icon large (indent)',
      //'fa-horiz-2x-md' => 'Icon Horizontal (2x-md)',
      //'fa-horiz-2x-lg' => 'Icon Horizontal (2x-lg)',
    ))

    ->addRepeater('feed_list', array(
      'min'    => 0,
      'max'    => 6,
      'layout' => 'block'
    ))
      ->addText('feed_list_headline')
      ->addTextarea('feed_list_text')
    ->endRepeater()
  ->addAccordion('Feed - List End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Feed - Quote')
    ->addImage('quote_feed_image', $args_image)
    ->addTextarea('quote_feed_text')
    ->addText('quote_feed_name')
    ->addText('quote_feed_company')
    ->addText('quote_feed_position')
    ->addImage('quote_feed_logo', $args_image)
  ->addAccordion('Feed - Quote End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Feed - Link')
    ->addText('feed_link_text')
      ->setDefaultValue("Read more")
      //->addSelect('quote_feed_link_options')
      //  ->addChoices(array(
      //    ''                   => "None",
      //    'fal fa-arrow-right' => "Arrow Icon",
      //  ))
      //  ->setDefaultValue("fal fa-arrow-right")
      //->addSelect('quote_feed_link_style')
      //  ->addChoices(array(
      //    ''     => "Default",
      //    'text' => "Text",
      //    'btn'  => "Button",
      //  ))
      //  ->setDefaultValue("text")

    ->addSelect('feed_link_text_style')
      //->conditional('quote_feed_link_style', '==', 'text')
      ->setDefaultValue("text-secondary")
      ->addChoices(array(
        'text-default'   => "Default",
        'text-primary'   => "Primary",
        'text-secondary' => "Secondary"
      ))
  ->addCheckbox('feed_link_pos')
    ->setDefaultValue(array("text-left"))
    ->addChoices(array(
      'text-left'      => "Left",
      'text-center'    => "Center",
      'text-right'     => "Right",
      'text-md-left'   => "Left (md & up)",
      'text-md-center' => "Center (md & up)",
      'text-md-right'  => "Right (md & up)",
      'text-lg-left'   => "Left (lg & up)",
      'text-lg-center' => "Center (lg & up)",
      'text-lg-right'  => "Right (lg & up)",
    ))
  ->addCheckbox('feed_link_size')
    ->setDefaultValue(array(""))
    ->addChoices(array(
      'text-xs'     => "text-xs",
      'text-sm'     => "text-sm",
      'text-md'     => "text-md (default)",
      'text-lg'     => "text-lg",
      'text-xl'     => "text-xl",
    ))
  ->addCheckbox('feed_link_padding')
    ->setDefaultValue(array("text-left"))
    ->addChoices(array(
      'pt-0'      => "pt-0",
      'pt-1'      => "pt-1",
      'pt-2'      => "pt-2",
      'pt-3'      => "pt-3",
      'pt-md-0'      => "pt-md-0",
      'pt-md-1'      => "pt-md-1",
      'pt-md-2'      => "pt-md-2",
      'pt-md-3'      => "pt-md-3",
      'pb-0'      => "pb-0",
      'pb-1'      => "pb-1",
      'pb-2'      => "pb-2",
      'pb-3'      => "pb-3",
      'pb-md-0'      => "pb-md-0",
      'pb-md-1'      => "pb-md-1",
      'pb-md-2'      => "pb-md-2",
      'pb-md-3'      => "pb-md-3",
    ));

add_action('acf/init', function () use ($options) {
  acf_add_local_field_group($options->build());
});
