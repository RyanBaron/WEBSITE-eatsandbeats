@extends('layouts.app')

@section('content')
  @if ( have_posts() )
    <div class="post-feed-content blog-feed-content post-feed-content-blog blog-feed-content py-6 pt-12 pt-md-14 pt-lg-16">
      <div class="container">
        <div class="row flex-row justify-content-center">
          <div class="col col-articles col-12 col-xxl-12">
            <div class="row flex-row justify-content-center justify-content-md-around gutter-xl">
              @while (have_posts())
                <div class="col col-12 col-md-10">
                  @php the_post(); @endphp
                  @include('partials.content-post-feed-condensed', array('cnt' => 1))
                </div>
              @endwhile
            </div>
            <div id="more-posts" data-load-more="post-category">
              <div id="ajax-posts"></div>
              <div id="more-empty" class="d-none text-center text-lg pt-6 pb-2"><strong>{!! __('Sorry, there are no more blog posts to show.', 'sage') !!}</strong></div>
              <div id="more-load" class="text-center pt-10 pb-4">
                <a href="javascript:void(0)" data-load="posts" class="btn btn-outline-dark icon-after">{{ __('Show more blog posts', 'sage') }} <i class="fal fa-arrow-right fa-rotate-90"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

@overwrite
