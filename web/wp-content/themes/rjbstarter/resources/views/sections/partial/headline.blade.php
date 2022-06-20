@php
$source = isset($args['source']) ? $args['source'] : 'fields';
$headline_tag  = isset($args['tag']) && preg_match('/^h[1-5]$/', $args['tag']) ? $args['tag'] : 'h2';

switch( $source ) {
  case 'direct':
    $headline = $args['headline']['main'] ? $args['headline']['main'] : '';
    $superheadline = $args['headline']['super'] ? $args['headline']['super'] : '';
    $subheadline = $args['headline']['subheadline'] ? $args['headline']['subheadline'] : '';
    $subheadline = $args['headline']['headline_style'] ? $args['headline']['headline_style'] : '';
  break;
  case 'section-header':
    $superheadline  = get_field('section_superheadline');
    $headline       = get_field('section_headline');
    $subheadline    = get_field('section_subheadline');
    $headline_style = get_field('section_headline_style');
  break;
  default:
    $superheadline  = get_field('superheadline');
    $headline       = get_field('headline');
    $subheadline    = get_field('subheadline');
    $headline_style = get_field('headline_style');
  break;
}
@endphp

@if ($superheadline || $headline || $subheadline)
  <{{ $headline_tag }} class="{!! App::context_class('headline', $context) !!} {!! App::sanatize_attrs($headline_style) !!}">

    @if ( $superheadline )
      <span class="superheadline">{!! $superheadline !!}</span>
    @endif

    @if ( $headline )
      @if( "line-behind" === $headline_style )
        <span class="headline-span-wrapper"><span class="headline-span">{!! $headline !!}</span></span>
      @else
        {!! $headline !!}
      @endif
    @endif

    @if ( $subheadline )
      <span class="subheadline">{!! $subheadline !!}</span>
    @endif

  </{{ $headline_tag }}>
@endif
