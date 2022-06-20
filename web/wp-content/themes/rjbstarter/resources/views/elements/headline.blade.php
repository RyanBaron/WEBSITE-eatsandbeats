@php
$class         = isset($args['class']) ? $args['class'] : '';
$class         = \App\sanatize_class_depth($class);
$superheadline = isset($args['superheadline']) ? $args['superheadline'] : '';
$headline      = isset($args['headline']) ? $args['headline'] : '';
$subheadline   = isset($args['subheadline']) ? $args['subheadline'] : '';
$headline_strong  = isset($args['tag']) && preg_match('/^strong$/', $args['tag']) ? $args['tag'] : 'h2';
$headline_tag  = isset($args['tag']) && preg_match('/^(h[1-5]|div|strong)$/', $args['tag']) ? $args['tag'] : $headline_strong;
@endphp

@if($superheadline || $headline || $subheadline)
  <{{ $headline_tag }} class="{{ $class }}">

    @if( $superheadline )
      <span class="superheadline">{!! $superheadline !!}</span>
    @endif

    {!! $headline !!}

    @if( $subheadline )
      <span class="subheadline">{!! $subheadline !!}</span>
    @endif

  </{{ $headline_tag }}>
@endif
