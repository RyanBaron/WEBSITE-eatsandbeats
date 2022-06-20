@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'customer';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feature primary';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $post_id = isset($post_id) && ! empty($post_id) ? $post_id : '';
  $g_data = \App\get_post_data_attributes($post_id, $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));

  $image = array(
    'id' => get_post_thumbnail_id($post_id) ?: '',
    'size' => false ?: 'landscape_md',
    'class' => array(
      'image',
      'img-fluid',
      'figure-img',
      'rounded',
    ),
    'alt_overwrite' => get_the_title($post_id),
  );

  $figure = array(
    'class' => array('w-100'),
    'image' => $image,
  );

  $feed_display = get_field('feed_display', $post_id) ?: array();
  $universal_superheadline = get_field('universal_superheadline', $post_id);
  $universal_subheadline = get_field('universal_subheadline', $post_id);

  $feed_link_padding = get_field('feed_link_padding', $post_id) ?: array();
  $feed_link_pos = get_field('feed_link_pos', $post_id) ?: array();
  $button_class_array = array_merge($feed_link_pos, $feed_link_padding);
  $button_class         = \App\sanatize_class_depth($button_class_array);

  $feed_link_class[] = get_field('feed_link_size', $post_id);
  $feed_link_class[] = get_field('feed_link_text_style', $post_id);
  $feed_link_text_style = \App\sanatize_class_depth($feed_link_class);

  $feed_link_text = get_field('feed_link_text', $post_id);
  $read_more = \App\read_more_link('text-no-link-arrow', $post_id, array('link_text' => $feed_link_text, 'class' => $feed_link_text_style));

@endphp

@if ( $post_id )
  <a href="{{ get_permalink($post_id) }}" class="wrapper-link" {!! $g_data !!}>
    <article @php post_class('article-feature article-feature-primary hl-md py-4 py-lg-5 py-xl-6') @endphp>
      <div class="row flex-row justify-content-center justify-content-lg-between gutter-xl">

        <div class="col col-text col-12 col-lg-5 col-xl-5 align-items-center d-flex order-last order-md-first pb-2 pb-lg-0">
          <div class="col-inside col-text-inside w-100">
            <header class="entry-col">
              @if( ! in_array( 'disable-headline', $feed_display )  )
                <h2 class="headline entry-title pb-2">
                  @if( in_array( 'enable-superheadline', $feed_display ) && ! empty( $universal_superheadline ) )
                    <span class="superheadline">{!! $universal_superheadline !!}</span>
                  @endif

                  {!! get_the_title($post_id) !!}

                  @if( in_array( 'enable-subheadline', $feed_display ) && ! empty( $universal_subheadline ) )
                    <span class="subheadline">{!! $universal_subheadline !!}</span>
                  @endif
                </h2>
              @endif
            </header>

            @if( ! in_array( 'disable-excerpt', $feed_display )  )
              <div class="col-text d-flex justify-content-between flex-column" style="flex: 1 1 100%;">
                <div class="col-inside col-text-inside w-100 h-100 justify-content-between flex-column d-flex">
                  <div class="col-customer-bottom d-flex flex-column justify-content-end">
                    <div class="entry-col entry-summary">
                      {!! get_the_excerpt($post_id) !!}
                    </div>
                  </div>
                </div>
              </div>
            @endif

            @if( in_array( 'enable-list', $feed_display ) && have_rows('feed_list', $post_id) )
              @includeIf('sections.list.feed-feature-primary-list', array('context' => $context, 'post_id' => $post_id))
            @endif

            @if( in_array( 'enable-quote', $feed_display ) )
              @includeIf('sections.quote.feed-feature-primary-quote', array('context' => $context, 'post_id' => $post_id))
            @endif

            @if( in_array( 'enable-button', $feed_display ) )
              <div class="col-buttons buttons {!! $button_class !!}">
                {!! $read_more !!}
              </div>
            @endif

          </div>
        </div>

        @if( ! empty( $image['id'] ) )
          <div class="col col-image col-12 col-lg-7 order-first order-md-last py-2 py-lg-0">
            <div class="col-inside col-image-inside w-100">
              @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
            </div>
          </div>
        @endif

      </div>
    </article>
  </a>
@endif
