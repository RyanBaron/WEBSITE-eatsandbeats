<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

//$form_layout = \App\get_form_layout_options();
$form_display = \App\get_form_display_style_options();
$text_align_options  = \App\get_text_align_options();
$form_button_options = \App\get_button_options();
$text_align        = \App\get_text_align_options();

$forms = \App\get_gravity_form_options();
//$form_display = \App\get_gravity_display_style_options();

$column_form = new FieldsBuilder('column_form');
$column_form
->addSelect('col_form_gform_id')
  ->setLabel('Select form')
  ->addChoices($forms)
//->addSelect('col_form_display_style')
  //->setLabel('Select form style')
  //->addChoices($form_display)


  ->addSelect('col_form_display_style')
    ->setLabel('Select form style')
    ->addChoices(array(
      '' => 'Default',
      'form-col-dropshadow-p-1' => 'Form col dropshadow p-1',
      'form-col-dropshadow-p-2' => 'Form col dropshadow p-2',
      'form-col-flat-white-p-1' => 'Form col flat white p-1',
      'form-col-flat-white-p-2' => 'Form col flat white p-2',
      'form-col-flat-none' => 'Form col flat none p-0',
      'form-col-flat-none-p-1' => 'Form col flat none p-1',
      'form-col-flat-none-p-2' => 'Form col flat none p-2',
      'form-col-dark-trans-p-1' => 'Form col dark trans p-1',
      'form-col-dark-trans-p-2' => 'Form col dark trans p-2',
      'form-col-flat-dark-trans-p-1' => 'Form col dark trans p-1 (flat)',
      'form-col-flat-dark-trans-p-2' => 'Form col dark trans p-2 (flat)',
      'form-col-white-b-light-p-1' => 'Form col white b-light p-1',
      'form-col-white-b-light-p-2' => 'Form col white b-light p-2',
      'form-col-lighter-p-1' => 'Form col lighter p-1',
      'form-col-lighter-p-2' => 'Form col lighter p-2',
    ))
  //->addSelect('col_form_layout')
  //  ->setLabel('Select form layout')
  //  ->addChoices($form_layout)
  ->addFields(get_field_partial('headline-col-form'))
  ->addFields(get_field_partial('text-col-form'))
  ->addCheckbox('col_form_header_align')
    ->addChoices($text_align_options)
  ->addCheckbox('col_form_button_style')
    ->addChoices($form_button_options);

  /*
  ->addAccordion('Form Thank You')
  ->addSelect('col_form_resource_type')
    ->addChoices(array(
      '' => 'Default',
      'ty-msg-cta' => 'Thank you message + cta',
    ))
  ->addCheckbox('col_form_resource_text_align')
    ->setDefaultValue(array(''))
    ->addChoices($text_align)
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
  */
return $column_form;
