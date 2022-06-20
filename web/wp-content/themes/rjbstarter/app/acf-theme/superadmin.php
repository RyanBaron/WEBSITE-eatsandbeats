<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$css_options = \App\get_superadmin_css_options();
$sec_padding = \App\get_vertical_padding_class_options();
$sec_margin  = \App\get_vertical_margin_class_options();
$image_size  = \App\get_image_size_options();
$image_shape = \App\get_image_shape_options();
$background  = \App\get_takeover_background_options();

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page([
    'page_title' => 'Superadmin options',
    'menu_title' => 'Superadmin options',
    'menu_slug'  => 'superadmin-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
  ]);

  $options = new FieldsBuilder('superadmin_options', [
    'style' => 'seamless'
  ]);

  $options
    ->setLocation('options_page', '==', 'superadmin-options');

  $options
    ->addTab('Quotes')
      ->addGroup('quote_inline')
        ->addSelect('default_quote_image_size')
          ->addChoices($image_size)
        ->addSelect('default_quote_image_shape')
          ->addChoices($image_shape)
        ->addSelect('default_quote_logo_size')
          ->addChoices($image_size)
      ->endGroup()
    ->addTab('Styles')
      ->addSelect('theme_style_css')
        ->addChoices($css_options)
      ->addCheckbox('default_section_padding')
        ->addChoices($sec_padding)
      //->addCheckbox('default_section_margin')
      //  ->addChoices($sec_margin)
      ->addCheckbox('default_col_padding')
        ->addChoices($sec_padding)
      //->addCheckbox('default_col_margin')
      //  ->addChoices($sec_margin);
    ->addTab('Social')
      ->addText('twitter_url')
      ->addText('facebook_url')
      ->addText('linkedin_url')
      ->addText('instagram_url')
      ->addText('pinterest_url')
      ->addText('glassdoor_url')
    ->addTab('Press')
      ->addGroup('press_article')
        ->addText('footer_title')
        ->addTextArea('footer_text')
      ->endGroup()
    ->addTab('Contact')
      ->addText('title_footer_address')
      ->addGroup('san_francisco')
        ->addText('title')
        ->addTextArea('address')
        ->addText('phone')
        ->addText('email')
      ->endGroup()
      ->addGroup('emea')
        ->addText('title')
        ->addTextArea('address')
        ->addText('phone')
        ->addText('email')
      ->endGroup()
      ->addGroup('apac')
        ->addText('title')
        ->addTextArea('address')
        ->addText('phone')
        ->addText('email')
      ->endGroup()
    ->addTab('Contact Takeover')
      ->addGroup('contact_takeover_content')
        ->addText('headline')
        ->addText('subheadline')
        ->addTextarea('copy')
      ->endGroup()
      ->addGroup('contact_takeover_bg')
        ->addSelect('class')
          ->setLabel('Background')
          ->setDefaultValue(array(''))
          ->addChoices($background)
        ->addImage('image')
        ->addCheckbox('image_options')
          ->addChoices(array(
            'bg-repeat',
            'bg-no-repeat',
            'bg-cover',
            'bg-contain',
            'bg-cover-lg-up',
            'bg-contain-lg-up',
            'bg-left',
            'bg-center',
            'bg-right',
            'bg-left-lg-up',
            'bg-center-lg-up',
            'bg-right-lg-up',
            'bg-offset-left',
            'bg-offset-right',
            'bg-offset-left-lg-up',
            'bg-offset-right-lg-up',
          ))
        ->endGroup()
      ->addTab('Footer')
        ->addGroup('footer')
          ->addTextarea('phone')
          ->addTextarea('location')
          ->addTextarea('bottom')
        ->endGroup()
      ->addTab('Banner')
        ->addGroup('banner')
          ->addTextarea('text')
          ->addCheckbox('bg')
            ->addChoices(array(
              'bg-white'     => 'White',
              'bg-gray'      => 'Gray',
              'bg-light'     => 'Light',
              'bg-lighter'   => 'Lighter',
              'bg-primary'   => 'Primary',
              'bg-secondary' => 'Secondary',
              'bg-geek-blue' => 'Dark Blue',
              'bg-dark-blue' => 'Dark Blue',
              'bg-dark'      => 'Dark',
              'bg-darker'    => 'Darker',
              'bg-sec-orange'=> 'Orange',
              'bg-sec-green' => 'Green',
              'bg-sec-purple'=> 'Purple',
              'bg-sec-yellow'=> 'Yellow',
              'bg-sec-gold'  => 'Gold',
              'bg-sec-cyan'  => 'Cyan',
              'bg-sec-lime'  => 'Lime',
              'bg-sec-red'   => 'Red',
              'bg-sec-volcano'=> 'Volcano',
              'bg-sec-magenta'=> 'Magenta',
            ))
        ->endGroup();

  add_action('acf/init', function () use ($options) {
    acf_add_local_field_group($options->build());
  });

}
