@php
$class           = array();
$context         = isset($context) && ! empty($context) ? $context : array();
$context_buttons = array_merge($context, array('footer'));
$col_class = get_field('col_class_cards');
$col_class = \App\sanatize_class_depth($col_class);

@endphp

<div class="{!! App::context_class('col', $context) !!} {!! App::sanatize_attrs($class) !!}">
  <div class="{!! App::context_class('col-inside', $context) !!} w-100">

    <div class="row flex-row">
      @while ( have_rows('resource_items') ) @php the_row(); @endphp
        @php
        $args = array();
        $card_link = get_sub_field('link');
        $pt      = get_sub_field('padding_top');
        $pb      = get_sub_field('padding_bottom');
        $mt      = get_sub_field('margin_top');
        $mb      = get_sub_field('margin_bottom');
        $wrapper_top = '';
        $wrapper_bottom = '';
        $footer_btn = '';

        $post = get_sub_field('resource_post');
        $args['g_label'] = 'resource cards';
        $args['g_action_prefix'] = 'read more';
        $args['post'] = $post;
        $args['display_type'] = \App\display_type($post->ID);
        $card_content = \App\card_display( $post->ID, $args);

        if( isset($card_content['link']['wrapper']['top'])
            && ! empty( $card_content['link']['wrapper']['top'] )
            && isset($card_content['link']['wrapper']['bottom'])
            && ! empty( $card_content['link']['wrapper']['bottom'] )) {

          $wrapper_top = $card_content['link']['wrapper']['top'];
          $wrapper_bottom = $card_content['link']['wrapper']['bottom'];
        }

        if( isset($card_content['link']['footer']['button']) ) {
          $footer_button = $card_content['link']['footer']['button'];
        }

        $args_headline = array(
          'source' => 'direct',
          'tag' => 'h4',
          'headline' => array(
            'main' => isset( $card_content['header']['headline'] ) ? $card_content['header']['headline'] : '',
            'super' => isset( $card_content['header']['superheadline'] ) ? $card_content['header']['superheadline'] : '',
            'sub' => isset( $card_content['header']['subheadline'] ) ? $card_content['header']['subheadline'] : '',
          )
        );
        $args_excerpt = array(
          'source' => 'direct',
          'body' => array(
            'excerpt' => isset( $card_content['body']['excerpt'] ) ? $card_content['body']['excerpt'] : '',
          )
        );

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

        $icon_class         = get_sub_field('card_icon');
        $link_icon_position = get_sub_field('card_icon_position');
        $link_icon_size     = get_sub_field('card_icon_size');
        @endphp
        <div class="{{ $col_class }} mb-4 mb-lg-0">
          @php echo $wrapper_top; @endphp
          <div class="card {!! $spacing !!} {{ $link_icon_position }} {{ $link_icon_size }} dropshadow h-100">

            <div class="card-image">
              @includeIf('elements.figure', array('context' => $context, 'figure' => $card_content['figure'], 'image' => $card_content['figure']['image']))
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              @includeIf('sections.partial.headline', array('context' => $context, 'args' => $args_headline))
              @includeIf('sections.partial.excerpt', array('context' => $context, 'args' => $args_excerpt))
            </div>

            @if($footer_button)
              <div class="card-footer">
                @php echo $footer_button; @endphp
              </div>
            @endif
          </div>
          @php echo $wrapper_bottom; @endphp
        </div>
      @endwhile
    </div>
  </div>
</div>
