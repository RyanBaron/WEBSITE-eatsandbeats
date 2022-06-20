@extends('layouts.app-customer')

@section('content')
  @php
  $page_category_id = get_query_var('cat');
  @endphp
  <br>testing in the category customer template<br>
  <br>testing in the category customer template<br>
  <br>testing in the category customer template<br>
  <br>testing in the category customer template<br>
  <div class="container pb-5 blog-feature-content">
    @php
    $post_primary_feature_id = \App\get_category_primary_sticky_post_id($page_category_id);
    @endphp
    @if( $post_primary_feature_id )
      <div class="row flex-row justify-content-center">
        <div class="col col-feature-primary col-12">
          @include('partials.content-post-feature-primary', array('post_id' => $post_primary_feature_id))
        </div>
      </div>
    @endif

    @php
    $post_secondary_feature_ids = \App\get_category_secondary_sticky_post_ids($page_category_id);
    @endphp
    @if(3 == (count($post_secondary_feature_ids)))
      <header class="header-content pt-4 pb-2">
        <div class="row">
          <div class="col-12 col-md-6">
            <h3 class="headline headline-header">Popular Posts</h3>
          </div>
        </div>
      </header>
      <div class="row flex-row justify-content-center">
        @foreach ($post_secondary_feature_ids as $post_id)
          <div class="col col-feature-secondary col-12 col-sm-12 col-md-4">
            @include('partials.content-post-feature-secondary', array('post_id' => $post_id) )
          </div>
        @endforeach
      </div>
    @endif

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
  </div>

  <div class="bg-lighter blog-feed-content py-6">
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
              <a href="javascript:void(0)" data-load-posts="all" class="btn btn-outline-dark icon-after">See More Posts <i class="fal fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@overwrite
