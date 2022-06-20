<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$icon = new FieldsBuilder('icon');
$icon
->addSelect('icon')
  ->addChoices(array(
    ''   => 'None',
    'far fa-star'   => 'Star (Regular)',
    'far fa-list-alt'   => 'List (Regular)',
    'far fa-check-circle'   => 'Check Circle (Regular)',
    'fas fa-file-medical-alt'   => 'File Medical (Solid)',
    'fas fa-angle-right'   => 'Angle Right (Solid)',
    'fas fa-angle-left'   => 'Angle Left (Solid)',
    'fas fa-box-open'   => 'Box Open (Solid)',
    'fab fa-twitter'   => 'Twitter (Brand)',
    'fab fa-facebook'   => 'Facebook (Brand)',
    'fab fa-linkedin'   => 'Linkedin (Brand)',
  ));

return $icon;
