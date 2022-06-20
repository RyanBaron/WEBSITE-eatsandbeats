@php
  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : 'click';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'customer';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
  $cnt = isset($cnt) && ! empty( $cnt ) ? $cnt : 0;
  $context = isset($context) && ! empty( $context ) ? $context : '';

  $g_data = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
  $read_more = \App\read_more_link('text-no-link', get_the_id());

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

  $post_categories = \App\resource_type_list('', 'text', array('filter' => array('webinar', 'video', 'whitepaper', 'podcast', 'resource', 'article')));

@endphp

<a href="{{ get_permalink() }}" class="wrapper-link h-100" {!! $g_data !!}>
  <article @php post_class('card hl-sm shadow border-0 h-100') @endphp>
    @if( ! empty( $image['id'] ) )
      <div class="card-img-top">
        @includeIf('elements.figure', array('context' => $context, 'figure' => $figure, 'image' => $image))
      </div>
    @endif

    <div class="card-body d-flex flex-column justify-content-between">
      <div>
        <div class="pretails d-flex flex-row pb-1">
          <div class="pretail-item pretail-categories">{!! $post_categories !!}</div>
        </div>
        <h5 class="card-title">{!! get_the_title() !!}</h5>
        <div class="entry-col entry-summary">
          @php the_excerpt() @endphp
        </div>
      </div>
      <div class="footer footer-buttons text-right">
        <div class="link link-text link-primary">{!! $read_more !!} <i class="fal fa-angle-double-right"></i></div>
      </div>
    </div>
  </article>
</a>
