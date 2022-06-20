<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$customization_lvl  = \App\get_section_customization_lvl_options();
$section_display    = \App\get_section_display_options();
$section_context    = \App\get_section_context_options();
$analytics_context  = \App\get_section_analytics_context_options();
$background         = \App\get_section_background_options();
$bg_fade_top        = \App\get_bg_top_fade();
$bg_fade_bottom     = \App\get_bg_bottom_fade();
$background_pattern = \App\get_section_background_pattern_options();
$headline_size      = \App\get_headline_size_options();
$min_vh             = \App\get_min_vh_options();
$row_align          = \App\get_row_align_options();
$row_justify        = \App\get_row_justify_options();
$args_section_id    = \App\get_args_field_section_id();
$text_align         = \App\get_text_align_options();
$args_section_class = \App\get_args_field_section_class();
$column_gutters     = \App\get_column_gutters();

$config = new FieldsBuilder('config');
$config
  // Section Customization
  ->addSelect('section_customization_lvl')
    ->conditional('sections', '!=', '')
    ->setLabel('Customization Level')
    ->setDefaultValue(array(''))
    ->addChoices($customization_lvl)
  // Section Display
  ->addSelect('section_display')
    ->conditional('sections', '!=', '')
    ->setLabel('Display')
    ->setRequired()
    ->setDefaultValue(array(''))
    ->addChoices($section_display)
  // Section context
  ->addSelect('section_context')
    ->conditional('sections', '!=', '')
    ->setLabel('Display Context')
    ->setDefaultValue(array(''))
    ->addChoices($section_context)
  // Section context
  ->addSelect('analytics_context')
    ->conditional('sections', '!=', '')
    ->setLabel('Analytics Context')
    ->addChoices($analytics_context)
  // Section Id
  ->addText('section_id', $args_section_id)
    ->conditional('sections', '!=', '')
  // Section Class
  ->addText('section_class', $args_section_class)
    ->conditional('sections', '!=', '')
  // Section Background
  ->addSelect('section_bg')
    ->conditional('sections', '!=', '')
    ->setLabel('Background')
    ->setDefaultValue(array(''))
    ->addChoices($background)
  // Section Background
  ->addSelect('section_row_bg')
    ->conditional('sections', '!=', '')
    ->setLabel('Row Background')
    ->setDefaultValue(array(''))
    ->addChoices($background)
  ->addSelect('background_pattern')
    ->conditional('sections', '!=', '')
    ->setLabel('Background Pattern')
    ->setDefaultValue(array(''))
    ->addChoices($background_pattern)
  ->addSelect('bg_fade_top')
    ->conditional('sections', '!=', '')
    ->setLabel('Background top fade')
    ->setDefaultValue(array(''))
    ->addChoices($bg_fade_top)
  ->addSelect('bg_fade_bottom')
    ->conditional('sections', '!=', '')
    ->setLabel('Background bottom fade')
    ->setDefaultValue(array(''))
    ->addChoices($bg_fade_bottom)
  // Section custom bg color
  ->addColorPicker('section_bg_custom')
    ->conditional('section_bg', '==', 'custom')
      ->or('section_bg', '==', 'video')
    ->setLabel('Custom section background color')
  ->addAccordion('section_image_bg')
    ->setLabel('Image Background')
    ->conditional('sections', '!=', '')

    ->addImage('section_bg_image')
    ->addCheckbox('section_bg_image_options')
      ->addChoices(array(
        'bg-repeat',
        'bg-no-repeat',
        'bg-cover',
        'bg-contain',
        'bg-cover-lg-up',
        'bg-contain-lg-up',
        'bg-top',
        'bg-bottom',
        'bg-left',
        'bg-center',
        'bg-right',
        'bg-left-lg-up',
        'bg-center-lg-up',
        'bg-right-lg-up',
        'bg-top-lg-up',
        'bg-bottom-lg-up',
        'bg-offset-left',
        'bg-offset-right',
        'bg-offset-left-lg-up',
        'bg-overlay-dark',
        'bg-overlay-darker',
        'bg-overlay-darkest',
        'bg-overlay-light',
        'bg-overlay-lighter',
        'bg-overlay-lightest',
      ))
  ->addAccordion('section_image_bg_end')
    ->conditional('sections', '!=', '')
    ->setConfig('endpoint', 1)
  ->addAccordion('section_video_bg')
    ->setLabel('Video Background')
    ->conditional('sections', '!=', '')
  ->addFile('section_bg_video')
  ->addCheckbox('section_bg_video_options')
    ->addChoices(array('loop'))
  ->addAccordion('section_video_bg_end')
    ->setLabel('Video Background')
    ->conditional('sections', '!=', '')
    ->setConfig('endpoint', 1)
  ->addAccordion('section_headlines')
    ->setLabel('Section Headlines')
    ->conditional('sections', '!=', '')
    ->addSelect('section_headline_color')
    ->addChoices(array(
      '' => 'Default',
      'headlines-white' => 'Headlines white',
      'headlines-light' => 'Headlines light',
      'headlines-dark' => 'Headlines dark',
    ))
  ->addAccordion('section_headlines_end')
    ->conditional('sections', '!=', '')
    ->setConfig('endpoint', 1)
  // Section Sizing
  ->addAccordion('section_sizing_start')
    ->setLabel('Section Sizing')
    ->conditional('sections', '!=', '')
    // Headline size
    ->addSelect('headline_size')
      ->setLabel('Headline Size')
      ->conditional('sections', '!=', '')
      ->setDefaultValue(array(''))
      ->addChoices($headline_size)
    // Section min height
    ->addSelect('min_height')
      ->setLabel('Minimum Height')
      ->conditional('sections', '!=', '')
      ->setDefaultValue(array(''))
      ->addChoices($min_vh)
  ->addAccordion('section_sizing_end')
    ->conditional('sections', '!=', '')
    ->setConfig('endpoint', 1)

  // Section Spacing
  ->addAccordion('spacing')
    ->setLabel('Section - Spacing')
    ->conditional('section_customization_lvl', '==', 'full')
      ->and('sections', '!=', '')
    ->addFields(get_field_partial('spacing'))
    ->addSelect('section_col_gutters')
      ->setLabel('Section - Column Gutter')
      ->addChoices($column_gutters)
  ->addAccordion('Spacing Section End')
    ->conditional('section_customization_lvl', '==', 'full')
      ->and('sections', '!=', '')
    ->setConfig('endpoint', 1)

  // Section Alignment
  ->addAccordion('alignment')
    ->setLabel('Section - Alignment')
    ->conditional('sections', '!=', '')
    // Text align
    ->addCheckbox('section_text_align')
      ->setDefaultValue(array('text-left'))
      ->addChoices($text_align)
    // Row Flex Align
    ->addCheckbox('row_align_section')
      ->setLabel('Row Align Content')
      ->conditional('sections', '!=', '')
      ->setDefaultValue(array(''))
      ->addChoices($row_align)
    // Row Flex Justify
    ->addCheckbox('row_justify_section')
      ->setLabel('Row Justify Content')
      ->conditional('sections', '!=', '')
      ->setDefaultValue(array('justify-content-center'))
      ->addChoices($row_justify)
  ->addAccordion('Section Alignment End')
    ->conditional('sections', '!=', '')
    ->setConfig('endpoint', 1);

return $config;
