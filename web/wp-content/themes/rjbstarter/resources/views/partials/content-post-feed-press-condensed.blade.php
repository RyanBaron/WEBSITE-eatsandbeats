@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'press';
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
    'class' => array('w-100'),
    'image' => $image,
  );

  $post_categories = \App\post_category_list();
  $read_time = \App\read_time();

  $col_content = 'col col-text col-12 order-first';
@endphp

<a href="{{ get_permalink() }}" class="wrapper-link" {!! $g_data !!}>
  <article @php post_class('article-feed-item hl-sm py-3 py-xl-4') @endphp>
    <div class="row flex-row justify-content-center justify-content-md-between">
      @if( ! empty( $image['id'] ) )
        <div class="col col-image col-3 col-md-4 order-last">
          <div class="col-inside col-image-inside w-100">
            @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
          </div>
        </div>
        @php $col_content = 'col col-text col-9 col-md-8 col-xl-7 order-first'; @endphp
      @endif

      <div class="{{ $col_content }}">
        <div class="col-inside col-text-inside w-100">
          <header class="entry-col">
            <div class="pretails d-flex flex-row pb-1">
              <div class="post-date w-100">
                @php echo get_the_date(); @endphp
              </div>
            </div>
            <h5 class="entry-title">{!! get_the_title() !!}</h5>
          </header>
          <div class="entry-col entry-summary">
            {!! get_the_excerpt() !!}
          </div>
        </div>
      </div>
    </div>
  </article>
</a>
