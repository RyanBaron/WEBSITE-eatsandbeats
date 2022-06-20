<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$form_layout = \App\get_form_layout_options();
$form_display = \App\get_form_display_style_options();
$text_align_options  = \App\get_text_align_options();
$mkto_button_options = \App\get_mkto_button_options();
$text_align        = \App\get_text_align_options();


$column_form = new FieldsBuilder('column_form');
$column_form
  ->addText('col_form_mkto_id')
    ->setLabel('Marketo form id')
    ->setInstructions('Enter the market form embed id. (Upcoming webinar: 2476;)')
  ->addSelect('col_form_display_style')
    ->setLabel('Select form style')
    ->addChoices(array(
      '' => 'Default',
      'form-col-dropshadow' => 'Form col dropshadow',
      'form-col-flat-white' => 'Form col flat white',
      'form-col-flat-none' => 'Form col flat none',
      'form-col-white-b-light-p-1' => 'Form col white b-light p-1',
      'form-col-white-b-light-p-2' => 'Form col white b-light p-2',
    ))
  //  ->addChoices($form_display)
  ->addSelect('col_form_layout')
    ->setLabel('Select form layout')
    ->addChoices($form_layout)

    ->addFields(get_field_partial('headline-col-form'))
    ->addFields(get_field_partial('text-col-form'))
    ->addCheckbox('col_form_header_align')
      ->addChoices($text_align_options)
    ->addCheckbox('col_form_button_style')
      ->addChoices($mkto_button_options)
    //->addTrueFalse('col_form_disable_column')
    //  ->setInstructions('Disable (hide) the gated column (bottom form only). The bottom gated form will remain.')
    //->addCheckbox('col_form_mkto_form_display_initial')
    //  ->addChoices(array(
    //    'd-none' => 'Hidden',
    //  ))
    /*
    ->addSelect('gated_form_success_replace')
      ->addChoices(array(
        '' => 'Default (current)',
        'all' => 'Replace All',
        'all-minus-top' => 'Replace All (minus #top)',
        'current-plus-prev' => 'Current + Prev',
        'current-plus-next' => 'Current + Next',
      ))
      ->setInstructions('Upon gated access success, what content should be replaced by the gated asset (video or iframe).')
      */
    /*
    ->addCheckbox('col_form_mkto_form_display_reveal')
      ->setLabel('Reveal the gated form on')
      ->addChoices(array(
        'reveal-form-image-preview' => 'Image preview click',
      ))
      ->setInstructions('Use "#show-[form-id]" as the href value to reveal the form if hidden on page load.')
    ->addAccordion('Gated Form - End')
    ->setConfig('endpoint', 1)
    */
    ->addAccordion('Form Thank You')
    ->addSelect('col_form_resource_type')
      ->addChoices(array(
        '' => 'Default',
        //'ty-msg' => 'Thank you message',
        'ty-msg-cta' => 'Thank you message + cta',
        //'ty-replace-vimeo' => 'Replace with Vimeo Video',
        //'ty-replace-pdf' => 'Replace with PDF',
    ))

      ->addCheckbox('col_form_resource_text_align')
        ->setDefaultValue(array(''))
        ->addChoices($text_align)

    //->addText('col_form_resource_name')
    //  ->setInstructions('This value should be a short version of the title in all lowercase and SHOULD BE UNIQUIE per asset as this value is used to set a cookie value, indicating that this specific form (not marketo form id) has been filled out.')
    //->addText('col_form_resource_vimeo_id')
    //  ->conditional('col_form_resource_type', '==', 'vimeo')
    //->addText('col_form_resource_pdf_url')
    //  ->conditional('col_form_resource_type', '==', 'pdf')
    ->addText('col_form_resource_ty_superheadline')
    ->addText('col_form_resource_ty_headline')
    ->addText('col_form_resource_ty_subheadline')
    ->addTextarea('col_form_resource_ty_text')
    ->addSelect('col_form_resource_ty_layout')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
      ->addChoices(array(
        'horz-md' => 'Horizontal (md & up)',
        'horz-lg' => 'Horizontal (lg & up)',
        'horz-xl' => 'Horizontal (xl & up)',
        'horz-xxl' => 'Horizontal (xxl & up)',
    ))

    ->addImage('col_form_resource_ty_resource_image')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addText('col_form_resource_ty_resource_superheadline')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addText('col_form_resource_ty_resource_headline')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addText('col_form_resource_ty_resource_subheadline')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addTextarea('col_form_resource_ty_resource_text')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addLink('col_form_resource_ty_resource_link')
      ->conditional('col_form_resource_type', '==', 'ty-msg-cta')
    ->addAccordion('Form Content - End')
    ->setConfig('endpoint', 1);

    //->addAccordion('Gated Video Preview')
    //->conditional('col_form_resource_type', '==', 'vimeo')
    //->or('col_form_resource_type', '==', 'upcoming-event')
    //->addFields(get_field_partial('headline-col-gated'))
    //->addFields(get_field_partial('text-col-gated'))
    //->addFields(get_field_partial('image-gated-preview'))
    //->addFields(get_field_partial('links-col-gated'))
    //->addAccordion('Form Video Preview - End')
    //->setConfig('endpoint', 1);

return $column_form;
