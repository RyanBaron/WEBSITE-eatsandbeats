@extends('layouts.app')

@section('content')

  @php
  $page_category_id = get_query_var('cat');
  @endphp

  <div class="bg blog-feed-content pt-12 pt-md-14 pt-lg-16">
    <div class="container">
      <header class="header-content py-6">
        <div class="row">
          <div class="col-12 col-md-6">
            <h3 class="headline headline-header">All Posts</h3>
          </div>
        </div>
      </header>

      <div class="row flex-row justify-content-center">
        <div class="col col-articles col-12 col-xxl-12">
          @while (have_posts())
            @php the_post(); @endphp
            @include('partials.content-post-feed-condensed', array('cnt' => 1))
          @endwhile
          <div id="more-posts">
            <div id="ajax-posts"></div>
            <div id="more-empty" class="d-none">Sorry, there are no more posts.</div>
            <div id="more-load" class="text-center pt-10 pb-4">
              <a href="javascript:void(0)" data-load-posts="all" class="btn btn-outline-dark icon-after">Show more posts <i class="fal fa-arrow-right fa-rotate-90"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@overwrite
