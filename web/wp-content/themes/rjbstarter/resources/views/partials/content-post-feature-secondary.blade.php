@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'blog';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feature secondary';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $post_id = isset($post_id) && ! empty($post_id) ? $post_id : '';
  $g_data = \App\get_post_data_attributes($post_id, $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
  $read_more = \App\read_more_link('text-no-link', $post_id);

  $image = array(
    'id' => get_post_thumbnail_id($post_id) ?: '',
    'size' => false ?: 'landscape_sm',
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
  <a href="{{ get_permalink($post_id) }}" class="wrapper-link h-100" {!! $g_data !!}>
    <article @php post_class('article-feature article-feature-secondary hl-xs py-3 py-lg-4 h-100') @endphp>
      <!-- <div class="row flex-row justify-content-between h-100"> -->
      <div class="h-100 d-flex flex-column justify-content-start">
        @if( ! empty( $image['id'] ) )
          <div class="col-image">
            <div class="col-inside col-image-inside w-100">
              @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
            </div>
          </div>
        @endif

        <div class="col-text d-flex justify-content-between flex-column" style="flex: 1 1 100%;">
          <div class="col-inside col-text-inside w-100 h-100 justify-content-between flex-column d-flex">
            <div class="col-blog-top d-flex flex-column justify-content-start">
              <header class="entry-col">
                <div class="pretails d-flex flex-row py-2 pb-lg-4">
                  <div class="post-date w-100">
                    @php echo get_the_date('', $post_id); @endphp
                  </div>
                  <div class="pretail-item pretail-categories">{!! $post_categories !!}</div>
                  <div class="pretail-item pretail-read-time">{{ $read_time }}</div>
                </div>
                <h3 class="entry-title pb-2">{!! get_the_title($post_id) !!}</h3>
                @php /* @ include('partials/entry-meta') */ @endphp
              </header>
              <div class="entry-col entry-summary">
                {!! get_the_excerpt($post_id) !!}
              </div>
            </div>

            <div class="entry-col entry-author">
              @includeIf('author/byline-condensed-small-no-link')
            </div>
          </div>
        </div>
      </div>
    </article>
  </a>
@endif
