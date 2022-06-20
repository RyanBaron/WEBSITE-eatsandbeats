<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$column_image = new FieldsBuilder('column_image');
$column_image
  ->addFields(get_field_partial('col-image-one-image'));

return $column_image;
