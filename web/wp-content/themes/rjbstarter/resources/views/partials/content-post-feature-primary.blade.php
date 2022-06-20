@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'blog';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feature primary';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $post_id = isset($post_id) && ! empty($post_id) ? $post_id : '';
  $g_data = \App\get_post_data_attributes($post_id, $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
  $read_more = \App\read_more_link('text-no-link', $post_id);

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
@endphp

@if ( $post_id )

  @php
  $post_categories = \App\post_category_list( $post_id );
  $read_time = \App\read_time( $post_id );
  @endphp
  <a href="{{ get_permalink($post_id) }}" class="wrapper-link" {!! $g_data !!}>
    <article @php post_class('article-feature article-feature-primary hl-md py-4 py-lg-5 py-xl-6') @endphp>
      <div class="row flex-row justify-content-center justify-content-lg-between gutter-xl">
        @if( ! empty( $image['id'] ) )
          <div class="col col-image col-12 col-lg-7 order-first order-md-last py-2 py-lg-0">
            <div class="col-inside col-image-inside w-100">
              @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
            </div>
          </div>
        @endif

        <div class="col col-text col-12 col-lg-5 col-xl-5 align-items-center d-flex order-last order-md-first pb-2 pb-lg-0">
          <div class="col-inside col-text-inside w-100">
            <header class="entry-col">
              <div class="pretails d-flex flex-row pt-2 pt-md-0 pb-2">
                <div class="post-date w-100">
                  @php echo get_the_date('', $post_id); @endphp
                </div>
                <div class="pretail-item pretail-categories">{!! $post_categories !!}</div>
                <div class="pretail-item pretail-read-time">{{ $read_time }}</div>
              </div>
              <h2 class="entry-title pb-2">{!! get_the_title($post_id) !!}</h2>
            </header>
            <div class="entry-col entry-summary">
              {!! get_the_excerpt($post_id) !!}
            </div>
            @php /*
            <div class="entry-col entry-read-more">
              {!! $read_more !!}
            </div>
            */ @endphp

            <div class="entry-col entry-author pt-2 pt-lg-4">
              @includeIf('author/byline-condensed-small-no-link', array($post_id))
            </div>

          </div>
        </div>
      </div>
    </article>
  </a>
@endif
