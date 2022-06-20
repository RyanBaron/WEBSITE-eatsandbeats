@php
$image = array(
  'id' => get_post_thumbnail_id() ?: '',
  'size' => false ?: 'landscape_md',
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

$context = isset($context) ? $context : '';
$post_subheadline = get_field('post_subheadline');
@endphp

<header class="post-header">
  <div class="container">
    <div class="row flex-row align-items-center justify-content-center">

      <div class="col col-post-header col-12 col-md-9 col-lg-8 align-items-center d-flex text-left ">
        <div class="col-inside col-inside-post-header w-100">
          <div class="d-flex justify-content-start post-details">
            <div class="post-date">
              @php echo get_the_date(); @endphp
            </div>
          </div>

          <div class="post-social-placement">
            <div class="post-social">
              {!! App::post_social() !!}
            </div>
          </div>

          <h1 class="headline headline-post-header healine-post my-2 my-md-3 my-lg-4">
            {!! App::title() !!}
            <span class="subheadline">{!! $post_subheadline !!}</span>
          </h1>

          <div class="entry-col my-2 my-md-3 my-lg-4">
            <hr />
          </div>

        </div>
      </div>

    </div>
  </div>
</header>
