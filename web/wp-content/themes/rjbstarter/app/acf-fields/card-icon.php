<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$fa_icons  = \App\get_fa_icon_options();

$icon = new FieldsBuilder('icon');
$icon
->addSelect('icon')
  ->addChoices($fa_icons);

return $icon;
