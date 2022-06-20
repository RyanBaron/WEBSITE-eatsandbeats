<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

add_filter('mmirus/register-acf-gutenberg-block', function( $blocks, $block_defaults) {


  // Section header
  $section_header_config = new FieldsBuilder('section_header_config');
  $section_header_config
    ->addFields(get_common_section('section-header-config'));

  $section_header = new FieldsBuilder('section_header');
  $section_header
    ->addFields(get_common_section('section-header'));

  // General section config
  $config = new FieldsBuilder('config_universal');
  $config
    ->addFields(get_common_section('config-universal'));

  // Copy column 1
  $col_copy_one_config = new FieldsBuilder('col_copy_one_config');
  $col_copy_one_config
    ->addFields(get_common_section('col-copy-one-config'));

  $col_copy_one = new FieldsBuilder('col_copy_one');
  $col_copy_one
    ->addFields(get_common_section('col-copy-one'));

  // Image column 1
  $col_image_one_config = new FieldsBuilder('col_image_one_config');
  $col_image_one_config
    ->addFields(get_common_section('col-image-one-config'));

  $col_image_one = new FieldsBuilder('col_image_one');
  $col_image_one
    ->addFields(get_common_section('col-image-one'));

  // Section footer
  $section_footer_config = new FieldsBuilder('section_footer_config');
  $section_footer_config
    ->addFields(get_common_section('section-footer-config'));

  $section_footer = new FieldsBuilder('section_footer');
  $section_footer
    ->addFields(get_common_section('section-footer'));

  $section_col_form = new FieldsBuilder('section_col_form');
  $section_col_form
    ->addFields(get_common_section('col-form'));

  $section_col_form_config = new FieldsBuilder('section_col_form_config');
  $section_col_form_config
    ->addFields(get_common_section('col-form-config'));

  $section_col_gated = new FieldsBuilder('section_col_gated');
  $section_col_gated
    ->addFields(get_common_section('col-gated'));

  $section_col_gated_config = new FieldsBuilder('section_col_gated_config');
  $section_col_gated_config
    ->addFields(get_common_section('col-gated-config'));

  $section_col_cards = new FieldsBuilder('section_col_cards');
  $section_col_cards
    ->addFields(get_common_section('col-cards'));

  $section_col_cards_config = new FieldsBuilder('section_col_cards_config');
  $section_col_cards_config
    ->addFields(get_common_section('col-cards-config'));

  $section_col_accordion = new FieldsBuilder('section_col_accordion');
  $section_col_accordion
    ->addFields(get_common_section('col-accordion'));

  $section_col_accordion_config = new FieldsBuilder('section_col_accordion_config');
  $section_col_accordion_config
    ->addFields(get_common_section('col-accordion-config'));

  $universal = (new FieldsBuilder('universal'))
    ->addCheckbox('sections')
      ->setRequired()
      ->addChoices(array(
        'header'    => 'Section Header',
        'copy-one'  => 'Copy Column',
        //'copy-two'  => 'Copy Column Two',
        'image-one' => 'Image Column',
        //'image-two' => 'Image Column Two',
        'accordion'     => 'Accordion Column',
        'cards'     => 'Card Column',
        'form'      => 'Form Column',
        'gated'      => 'Gated Column',
        'footer'    => 'Section Footer',
      ))

    ->addTab('Config')
      ->addFields($config)

    ->addTab('Header')
      ->conditional('sections', '==', 'header')
      ->addFields($section_header)
      ->addFields($section_header_config)

    ->addTab('Copy')
      ->conditional('sections', '==', 'copy-one')
      ->addFields($col_copy_one)
      ->addFields($col_copy_one_config)

    ->addTab('Image')
      ->conditional('sections', '==', 'image-one')
      ->addFields($col_image_one)
      ->addFields($col_image_one_config)

    ->addTab('Cards')
      ->conditional('sections', '==', 'cards')
      ->addFields($section_col_cards)
      ->addFields($section_col_cards_config)

    ->addTab('Accordion')
      ->conditional('sections', '==', 'accordion')
      ->addFields($section_col_accordion)
      ->addFields($section_col_accordion_config)

    ->addTab('Form')
      ->conditional('sections', '==', 'form')
      ->addFields($section_col_form)
      ->addFields($section_col_form_config)

    ->addTab('Gated')
      ->conditional('sections', '==', 'gated')
      ->addFields($section_col_gated)
      ->addFields($section_col_gated_config)

    ->addTab('Footer')
      ->conditional('sections', '==', 'footer')
      ->addFields($section_footer)
      ->addFields($section_footer_config)

    ->setLocation('block', '==', 'acf/universal')
    ->getRootContext()
    ->build();

  array_push( $blocks, [
    'name'            => 'universal',
    'title'           => 'Universal',
    'description'     => 'Universal display block',
    'className'       => 'universal-block',
    'keywords'        => ['universal', 'resources', 'case studies'],
    'render_template' => get_theme_file_path().'/resources/views/sections/universal.blade.php',
    'fields'          => $universal
  ]);

  return $blocks;
}, 10, 2);
