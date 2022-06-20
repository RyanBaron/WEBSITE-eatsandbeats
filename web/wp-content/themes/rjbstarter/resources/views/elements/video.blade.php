@php
  $embed       = '';
  $video_type  = isset($video_type) ? $video_type : '';
  $video_id    = isset($video_id) ? $video_id : '';
  $video_class = isset($video_class) ? $video_class : 'default-video';

  switch( $video_type ) {
    case 'vimeo':
      $embed = '<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$video_id.'?title=0&byline=0" allowfullscreen></iframe>';
    break;
    case 'youtube':
      $embed = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$video_id.'?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    break;
  }
@endphp
@if( !empty( $video_id ) && ! empty( $embed ) )
  <div class="video-wrapper {{ $video_class }}">
    <div class="video-inside {{ $video_class }}">
      <div class="embed-responsive embed-responsive-16by9">
        {!! $embed !!}
      </div>
    </div>
  </div>
@endif
