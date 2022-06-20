@php
$list_style = get_sub_field('list_style');
$list_style_class = \App\sanatize_class_depth($list_style);
$icon = '';

switch( $list_style_class ) {
  case 'list-pricing':
    $icon = 'fas fa-check-circle';
    break;
}
@endphp

@if( have_rows('list_items') )
  <div class="{!! App::context_class('list', $context) !!}">
    <ul class="list list-{{ $list_style_class }}">
      @while ( have_rows('list_items') ) @php the_row(); @endphp

        @php
        $args = array(
          'headline' => get_sub_field('list_item_headline'),
          'text'     => get_sub_field('list_item_text'),
          'icon'     => $icon,
          'style'    => $list_style,
        );
        @endphp

        @includeIf('elements.list-item', $args)

      @endwhile
    </ul>
  </div>
@endif
