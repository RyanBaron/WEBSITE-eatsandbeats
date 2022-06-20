<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$args_headline   = \App\get_args_field_headline();
$justify_classes = \App\get_justify_options();
$text_align      = \App\get_text_align_options();
$column_classes  = \App\get_column_class_options();
$column_gutters  = \App\get_column_gutters();
$headline_size   = \App\get_headline_size_options();
$card_style      = \App\get_card_style_options();
$card_col_padding = \App\get_card_inside_padding_options();
$card_col_inside_padding = \App\get_card_inside_padding_options();
$image_style     = \App\get_image_style_options();
$figure_style     = \App\get_figure_style_options();
$image_icon_opts = \App\get_image_icon_options();
$image_size      = \App\get_image_size_options();
$video_style     = \App\get_video_style_options();
$card_link_type  = \App\get_card_link_type_options();
$card_icon_color = \App\get_icon_color_options();
$card_icon_bg_style = \App\get_icon_bg_style_options();
$card_icon_size  = \App\get_icon_size_options();
$card_icon_wrapper_height = \App\get_icon_wrapper_height_options();
$card_icon_bg_shadow = \App\get_shadow_options();
$card_icon_bg_color  = \App\get_icon_bg_color_options();
$card_icon_pos   = \App\get_icon_position_options();
$card_icon_default = \App\get_fa_icon_options();
$card_bg_color = \App\get_card_background_options();

$link_type_options = \App\get_link_type_class_options(); // Initial button setting
$button_options    = \App\get_button_class_options(); // button classess
$link_text_options = \App\get_link_text_style_options(); // text link classes
$link_icon_options = \App\get_fa_icon_options(); // text link classes
$headline_tag_options = \App\get_headline_tag_options();
$headline_style_options = \App\get_headline_style_options();

$cards = new FieldsBuilder('cards');
$cards
  // Column Headline
  ->addAccordion('Card Column Header')
    ->setLabel("Column Header")
    ->addFields(get_field_partial('cards-col-headline'))
    ->addCheckbox('headline_col_cards_align')
    ->addChoices($text_align)
  ->addAccordion('Card Column Header End')
    ->setConfig('endpoint', 1)

  // Card Items
  ->addRepeater('card_items', array(
    'min'    => 0,
    'max'    => 48,
    'layout' => 'block'
  ))
    ->setLabel('Cards')
    ->addFields(get_field_partial('card-universal'))
  ->endRepeater()

  // Card Style/Configuration
  ->addAccordion('card_styles')
    ->setLabel('Card - General Styles')
    ->addCheckbox('card_text_align')
      ->setLabel('Card - Text Align')
      ->addChoices($text_align)
    ->addSelect('card_headline_tag')
      ->setLabel('Headline Tag')
      ->addChoices($headline_tag_options)
    ->addSelect('card_headline_size')
      ->setLabel('Card - Headline Size')
      ->addChoices($headline_size)
    ->addSelect('card_headline_style')
      ->setLabel('Card - Headline Style')
      ->addChoices($headline_style_options)
    ->addCheckbox('card_body_justify')
      ->setLabel('Card - Body Vertical Align')
      ->addChoices($justify_classes)
    ->addCheckbox('card_body_header_justify')
      ->setLabel('Card - Body Header Vertical Align')
      ->addChoices($justify_classes)
    ->addCheckbox('card_col_padding')
      ->setLabel('Card - Col Padding')
      ->addChoices($card_col_padding)
    ->addCheckbox('card_col_inside_padding')
      ->setLabel('Card - Col Inside Padding')
      ->addChoices($card_col_inside_padding)
    ->addCheckbox('card_style')
      ->setLabel('Card - Style')
      ->addChoices($card_style)
    ->addCheckbox('card_bg')
      ->setLabel('Card - Background')
      ->addChoices($card_bg_color)
    ->addSelect('card_list_style')
      ->setLabel('Card - List Style')
      ->addChoices(array(
        '' => 'Default',
        'stacked-divider' => "Stacked single col w/divider)",
        'stacked-divider stacked-divider-light' => "Stacked (light) single col w/divider)",
        'stacked-divider stacked-divider-lighter' => "Stacked (lighter) single col w/divider)",
        'stacked-divider stacked-divider-dark' => "Stacked (dark) single col w/divider)",
        'stacked-divider stacked-divider-darker' => "Stacked (darker) single col w/divider)",
        'stacked-divider stacked-divider-primary' => "Stacked (primary) single col w/divider)",
        'stacked-divider stacked-divider-gray' => "Stacked (gray) single col w/divider)",
        'stacked-divider stacked-divider-secondary-green' => "Stacked (green) single col w/divider)",
        'stacked-divider stacked-divider-secondary-orange' => "Stacked (orange) single col w/divider)",
        'stacked-divider stacked-divider-secondary-purple' => "Stacked (purple) single col w/divider)",
      ))
  ->addAccordion('Card Styles End')
    ->setConfig('endpoint', 1)
  ->addAccordion('Card - Media and Icon')
    ->addMessage('Card Icons', 'Icon settings for cards')
    ->addSelect('icon_default')
      ->addChoices($card_icon_default)
    ->addSelect('icon_bg_style')
      ->addChoices($card_icon_bg_style)
    ->addSelect('icon_size')
      ->addChoices($card_icon_size)
    ->addSelect('icon_wrapper_inner_height')
      ->addChoices($card_icon_wrapper_height)
    ->addSelect('icon_position')
      ->addChoices($card_icon_pos)
    ->addSelect('icon_color')
      ->addChoices($card_icon_color)
    ->addSelect('icon_bg_color')
      ->addChoices($card_icon_bg_color)
    ->addSelect('icon_bg_shadow')
      ->addChoices($card_icon_bg_shadow)
    ->addMessage('Card Images', 'Image settings for cards')
    ->addCheckbox('card_image_style')
      ->setLabel('Cards - Image Style')
      ->addChoices($image_style)
    ->addCheckbox('card_figure_style')
      ->setLabel('Cards - figure Style')
      ->addChoices($figure_style)
    ->addCheckbox('card_image_icon')
      ->setLabel('Cards - Image Icon')
      ->conditional('card_image_style', '==', 'icon-image')
      ->addChoices($image_icon_opts)
    ->addSelect('card_image_size')
      ->setLabel('Cards - Image Size')
      ->addChoices($image_size)
    ->addMessage('Card Videos', 'Video settings for cards')
    ->addCheckbox('card_video_style')
      ->setLabel('Card - Video Style')
      ->addChoices($video_style)
  ->addAccordion('Card Image and Icon End')
    ->setConfig('endpoint', 1)

  ->addAccordion('card_link_styles')
    ->setLabel('Card - Link Styles')
    ->addSelect('card_link_type')
      ->addChoices($card_link_type)
    ->addCheckbox('card_link_align')
      ->addChoices($text_align)
    ->addSelect('card_link_style')
      ->setLabel('Link Style')
      ->addChoices($link_type_options)
    ->addSelect('card_button_style')
      ->conditional('card_link_style', '==', 'btn')
      ->setLabel('Link Button Style')
      ->addChoices($button_options)
    ->addSelect('card_link_text_style')
      ->conditional('card_link_style', '==', 'link')
      ->setLabel('Link Text Style')
      ->addChoices($link_text_options)

    ->addSelect('card_link_icon_default')
      ->conditional('card_link_style', '==', 'link')
        ->or('card_link_style', '==', 'btn')
      ->setLabel('Card Link Icon Default')
      ->addChoices($link_icon_options)
    ->addRadio('card_link_icon_position')
      ->addChoices(array(
        'icon-after'  => "After text",
        'icon-before' => "Before text",
      ))
    ->addRadio('card_link_icon_style')
      ->addChoices(array(
        ''  => "Default",
        'circle-outline circle-outline-dark'  => "Circle outline dark",
        'circle-outline circle-outline-light'  => "Circle outline light",
        'circle-outline circle-outline-primary'  => "Circle outline primary",
      ))

      ->addSelect('card_additional_link_style')
        ->setLabel('Additional Link Style')
        ->addChoices($link_type_options)
      ->addSelect('card_additional_button_style')
        ->conditional('card_additional_link_style', '==', 'btn')
        ->setLabel('Additional Link Button Style')
        ->addChoices($button_options)
      ->addSelect('card_additional_link_text_style')
        ->conditional('card_additional_link_style', '==', 'link')
        ->setLabel('Additional Link Text Style')
        ->addChoices($link_text_options)

  ->addAccordion('Card Link Styles End')
    ->setConfig('endpoint', 1)

  ->addAccordion('card_column_styles')
    ->setLabel('Card - Column Styles')
    ->addCheckbox('card_col_class')
      ->setLabel('Card - Column Size')
      ->addChoices($column_classes)
    ->addSelect('card_column_gutters')
      ->setLabel('Card - Column Gutter')
      ->addChoices($column_gutters)
  ->addAccordion('Card Column Styles End')
    ->setConfig('endpoint', 1)
    ;

return $cards;
