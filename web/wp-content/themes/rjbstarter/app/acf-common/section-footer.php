<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_footer = new FieldsBuilder('section_footer');
$section_footer
  ->addFields(get_field_partial('headline-footer'))
  ->addFields(get_field_partial('text-footer'))
  ->addFields(get_field_partial('links-footer'));

return $section_footer;
