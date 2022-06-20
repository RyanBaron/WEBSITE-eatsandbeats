<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$text_align_options  = \App\get_text_align_options();
$mkto_button_options = \App\get_button_options();

$column_gated = new FieldsBuilder('column_gated');
$column_gated
  ->addAccordion('Gated Form')
    ->addText('col_gated_mkto_form_id')
      ->setInstructions('Upcoming webinar: 2476; On-demand video: 2476; Gated PDF: 3529;')
    ->addFields(get_field_partial('headline-gated-form'))
    ->addFields(get_field_partial('text-gated-form'))
    ->addCheckbox('gated_form_header_align')
      ->addChoices($text_align_options)
    ->addCheckbox('gated_form_button_style')
      ->addChoices($mkto_button_options)
    ->addTrueFalse('col_gated_disable_column')
      ->setInstructions('Disable (hide) the gated column (bottom form only). The bottom gated form will remain.')
    ->addCheckbox('col_gated_mkto_form_display_initial')
      ->addChoices(array(
        'd-none' => 'Hidden',
      ))
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
    ->addCheckbox('col_gated_mkto_form_display_reveal')
      ->setLabel('Reveal the gated form on')
      ->addChoices(array(
        'reveal-form-image-preview' => 'Image preview click',
      ))
      ->setInstructions('Use "#show-[form-id]" as the href value to reveal the form if hidden on page load.')
  ->addAccordion('Gated Form - End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Gated Content')
    ->addSelect('col_gated_resource_type')
      ->addChoices(array(
        'vimeo' => 'Video (Vimeo)',
        'pdf' => 'PDF',
        'upcoming-event' => 'Upcoming event',
      ))
    ->addText('col_gated_resource_name')
      ->setInstructions('This value should be a short version of the title in all lowercase and SHOULD BE UNIQUIE per asset as this value is used to set a cookie, giving the user access to the pdf if they come back to the page later.')
    ->addText('col_gated_resource_vimeo_id')
      ->conditional('col_gated_resource_type', '==', 'vimeo')
    ->addText('col_gated_resource_pdf_url')
      ->conditional('col_gated_resource_type', '==', 'pdf')
    ->addText('col_gated_resource_ty_superheadline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addText('col_gated_resource_ty_headline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addText('col_gated_resource_ty_subheadline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addTextarea('col_gated_resource_ty_text')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addImage('col_gated_resource_ty_resource_image')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addText('col_gated_resource_ty_resource_superheadline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addText('col_gated_resource_ty_resource_headline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addText('col_gated_resource_ty_resource_subheadline')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addTextarea('col_gated_resource_ty_resource_text')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
    ->addLink('col_gated_resource_ty_resource_link')
      ->conditional('col_gated_resource_type', '==', 'upcoming-event')
  ->addAccordion('Gated Content - End')
    ->setConfig('endpoint', 1)

  ->addAccordion('Gated Video Preview')
    ->conditional('col_gated_resource_type', '==', 'vimeo')
    ->or('col_gated_resource_type', '==', 'upcoming-event')
    ->addFields(get_field_partial('headline-col-gated'))
    ->addFields(get_field_partial('text-col-gated'))
    ->addFields(get_field_partial('image-gated-preview'))
    ->addFields(get_field_partial('links-col-gated'))
  ->addAccordion('Gated Video Preview - End')
    ->setConfig('endpoint', 1);

return $column_gated;
