@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @else
    <div class="wrapper-404 mvh-65 pt-8 pb-4 pt-md-12 d-flex align-items-center justify-content-center hl-xl">
      <div class="container">
        <div class="row flex-row align-items-center justify-content-center text-center">
          <div class="col-12 col-md-9 col-lg-8">
            <h1 class="headline">
              Oops!
              <span class="subheadline">The page you are looking for can't be found.</span>
            </h1>
            <div><p>Error Code: 404</p></div>
            <div class="py-4">
              <div>Here are some helpful links:</div>
              <hr>
              <ul class="d-flex flex-row nav-404-list">
                <li><a href="/">Homepage</a></li>
                <li><a href="/blog/">Blog</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection
