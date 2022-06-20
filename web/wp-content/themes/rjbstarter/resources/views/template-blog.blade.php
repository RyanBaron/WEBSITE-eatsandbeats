{{--
  Template Name: Blog Listing
--}}

@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="container">
    <div class="row flex-row justify-content-center">
      <div class="col col-12 col-md-10 col-lg-8">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-post-feed')
        @endwhile
      </div>
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@overwrite
