@if( have_rows('card_items') )
  @php
  $section_columns = get_field('section_columns');
  $class           = array();
  $context         = isset($context) && ! empty($context) ? $context : array();
  $context_buttons = array_merge($context, array('footer'));
  $args_headline   = isset($args['headline']) && is_array($args['headline']) ? $args['headline'] : array();
  $class_col       = get_field('col_class_cards') ?: array('col', 'col-md-6');
  $class_col_order = get_field('col_class_cards_order') ?: array();
  $card_grid_style = get_field('card_grid_style') ?: '';
  $class           = array_unique(array_merge($class_col, $class_col_order));
  $class_flex_align = 'd-flex';
  $class_vert_align = 'align-items-center';

  /**
   * If custom class present in the $class_col array
   * add the custom class field it to the class array.
   */
  if( in_array('custom', $class_col) ) {
    $class_custom = get_field('col_class_text_custom');
    if( $class_custom && is_array( $class ) ) {
      $class[] = $class_custom;
    }
  }
  /**
   * If custom class present in the $class_col_order array
   * add the custom class field it to the class array.
   */
  if( in_array('custom', $class_col_order) ) {
    $class_custom = get_field('col_class_text_order_custom');
    if( $class_custom && is_array( $class ) ) {
      $class[] = $class_custom;
    }
  }
  /**
   * If custom class present in the $class_col_order array
   * add the custom class field it to the class array.
   */
  if( $card_grid_style ) {
    $class[] = $card_grid_style;
  }

  /**
   * Add column class vertical alignment.
   */
  if( $class_vert_align ) {
    $class[] = $class_vert_align;
  }
  /**
   * Add column class vertical alignment.
   */
  if( $class_flex_align ) {
    $class[] = $class_flex_align;
  }

  switch( $card_grid_style ) {
    case 'offset-cards':
      $even_col_class = 'col-10 offset-2 col-sm-8 offset-sm-4 col-md-6 offset-md-6';
      $odd_col_class = 'col-10 col-sm-8 offset-sm-1 col-md-6 offset-md-1';
    break;

    case 'offset-cards-lg':
      $even_col_class = 'col-11 offset-2 col-sm-9 offset-sm-2 col-md-8 offset-md-3 col-lg-7 offset-lg-4';
      $odd_col_class = 'col-11 col-sm-9 offset-sm-1 col-md-8 offset-md-1 col-lg-7 offset-lg-1';
    break;

    case 'two-col-grid':
      $even_col_class = 'col-8 col-md-6';
      $odd_col_class = 'col-8 col-md-6';

    default:
      $even_col_class = 'col-8 col-md-6';
      $odd_col_class = 'col-8 col-md-6';
    break;

  }
  @endphp

  @if (in_array('cards', $section_columns ))
    <div class="{!! App::context_class('col', $context) !!} {!! App::sanatize_attrs($class) !!}">
      <div class="{!! App::context_class('col-inside', $context) !!} w-100">

        <div class="row flex-row">
          @while ( have_rows('card_items') ) @php the_row(); @endphp
            @php
            $col_class = (get_row_index() % 2 == 0) ? $even_col_class : $odd_col_class;
            $card_link = get_sub_field('link');
            $pt      = get_sub_field('padding_top');
            $pb      = get_sub_field('padding_bottom');
            $mt      = get_sub_field('margin_top');
            $mb      = get_sub_field('margin_bottom');
            $spacing = array();
            if( $pt ) {
              $spacing[] = $pt;
            }
            if( $pb ) {
              $spacing[] = $pb;
            }
            if( $mt ) {
              $spacing[] = $mt;
            }
            if( $mb ) {
              $spacing[] = $mb;
            }
            $spacing = \App\sanatize_class_depth($spacing);


            $icon_class           = get_sub_field('card_icon');
            $link_icon_position = get_sub_field('card_icon_position');
            $link_icon_size     = get_sub_field('card_icon_size');

            @endphp
            <div class="{{ $col_class }}">
              <div class="card {!! $spacing !!} {{ $link_icon_position }} {{ $link_icon_size }} dropshadow">

                <div class="card-body">
                  @if( $icon_class )
                    <div class="card-icon">
                      {!! App::icon(
                        $icon_class
                      ) !!}
                    </div>
                  @endif

                  @includeIf('sections.partial.headline-subfields', array('context' => $context, 'args' => $args_headline))
                  @includeIf('sections.partial.text-subfields', array('context' => $context, 'args' => array()))
                </div>

                @if($link)
                  <div class="card-footer">
                    @includeIf('sections.partial.link-subfields', array( 'context' => $context_buttons, 'args' => array()))
                  </div>
                @endif
              </div>
            </div>
          @endwhile
        </div>
      </div>
    </div>
  @endif
@endif
