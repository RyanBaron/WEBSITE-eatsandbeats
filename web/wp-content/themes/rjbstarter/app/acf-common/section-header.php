<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_header = new FieldsBuilder('section_header');
$section_header
  ->addFields(get_field_partial('headline-header'))
  ->addFields(get_field_partial('text-header'));

return $section_header;
