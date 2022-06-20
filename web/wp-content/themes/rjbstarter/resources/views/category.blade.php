@extends('layouts.app')

@section('content')

  @php
  $page_category_id = get_query_var('cat');
  $category = get_category($page_category_id);
  $slug = isset( $category->slug ) ? $category->slug : '';
  @endphp

  @if ( have_posts() )
    <div class="bg-lighter post-feed-content blog-feed-content post-feed-content-blog blog-feed-content py-6">
      <div class="container">
        <header class="header-content py-6">
          <div class="row flex-row justify-content-center">
            <div class="col-12 col-md-6 text-center">
              <h3 class="headline headline-header">{{ __('All Category Posts', 'sage') }}</h3>
            </div>
          </div>
        </header>

        <div class="row flex-row justify-content-center">
          <div class="col col-articles col-12 col-xxl-12">
            <div class="row flex-row justify-content-center justify-content-md-around gutter-xl">
              @while (have_posts())
                <div class="col col-12 col-sm-10 col-md-6">
                  @php the_post(); @endphp
                  @include('partials.content-post-feed-condensed', array('cnt' => 1))
                </div>
              @endwhile
            </div>
            <div id="more-posts" data-load-more="post-category">
              <div id="ajax-posts"></div>
              <div id="more-empty" class="d-none text-center text-lg pt-6 pb-2"><strong>{!! __('Sorry, there are no more blog posts for this category.', 'sage') !!}</strong></div>
              <div id="more-load" class="text-center pt-10 pb-4">
                <a href="javascript:void(0)" data-load="posts" data-category-term="{{ $slug }}" data-category-id="{{ $page_category_id }}"  class="btn btn-outline-dark icon-after">{{ __('Show more blog posts', 'sage') }} <i class="fal fa-arrow-right fa-rotate-90"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

@overwrite
