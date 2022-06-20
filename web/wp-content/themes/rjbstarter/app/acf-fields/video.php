<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$video = new FieldsBuilder('video');
$video
  ->addText('video_id')
  ->addSelect('video_type')
    ->addChoices(array(
      'youtube' => "YouTube",
      'vimeo'   => "Vimeo",
    ));

return $video;
