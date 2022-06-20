@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'blog';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $g_data = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
  $read_more = \App\read_more_link('text-no-link');

  $image = array(
    'id' => get_post_thumbnail_id() ?: '',
    'size' => false ?: 'screen_md',
    'class' => array(
      'image',
      'img-fluid',
      'figure-img',
      'rounded',
    ),
    'alt_overwrite' => get_the_title(),
  );

  $figure = array(
    'class' => array('figure', 'figure-sidebar', 'w-100', 'bg-offset-fade-primary', 'bg-offset-fade-rounded'),
    'image' => $image,
  );

  $post_categories = \App\post_category_list();
  $read_time = \App\read_time();
@endphp

<a href="{{ get_permalink() }}" class="wrapper-link" {!! $g_data !!}>
  <article @php post_class('article-feed-item hl-xs pt-3 pb-3 pt-lg-4 pb-lg-4 pt-xl-5 pb-xl-5') @endphp>
    <div class="row flex-row justify-content-center">
      @if( ! empty( $image['id'] ) )
        <div class="col col-image col-4 col-md-3 col-xxl-2 order-last">
          <div class="col-inside col-image-inside w-100">
            <!-- @ includeIf('author/byline-condensed') -->
            @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
          </div>
        </div>
      @endif

      <div class="col col-text col-10 col-md-9 col-xxl-10 order-first">
        <div class="col-inside col-text-inside w-100">
          <header class="entry-col">
            <div class="pretails d-flex flex-row pb-2 pb-lg-3">
              <div class="pretail-item pretail-categories">{!! $post_categories !!}</div>
              <div class="pretail-item pretail-read-time">{{ $read_time }}</div>
            </div>
            <h3 class="entry-title">{!! get_the_title() !!}</h3>
            @php /* @ include('partials/entry-meta') */ @endphp
          </header>
          <div class="entry-col entry-summary">
            @php the_excerpt() @endphp
          </div>
          @php /*
          <div class="entry-col entry-read-more">
            {!! $read_more !!}
          </div>
          */ @endphp
        </div>
      </div>
    </div>
  </article>
</a>
