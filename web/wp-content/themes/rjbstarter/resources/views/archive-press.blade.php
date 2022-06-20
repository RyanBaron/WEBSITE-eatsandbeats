@extends('layouts.app-press')

@section('content')

  @includeIf('between.section-press-about', array('cnt' => 1))

  @if ( have_posts() )
    <div class="bg-lighter post-feed-content post-feed-content-press press-feed-content pt-2 pb-6">
      <div class="container">
        <header class="header-content pt-4 pb-6">
          <div class="row flex-row justify-content-center">
            <div class="col-12 col-md-6 text-center">
              <h3 class="headline headline-header">{{ __('Rjbstarter Press Releases', 'sage') }}</h3>
            </div>
          </div>
        </header>

        <div class="row flex-row justify-content-center">
          <div class="col col-articles col-12 col-xxl-12">
            <div class="row flex-row justify-content-center justify-content-md-around gutter-xl">
              @while (have_posts())
                <div class="col col-12 col-sm-10 col-md-6">
                  @php the_post(); @endphp
                  @include('partials.content-post-feed-press-condensed', array('cnt' => 1))
                </div>
              @endwhile
            </div>
            <div id="more-press" data-load-more="press-taxonomy">
              <div id="ajax-press"></div>
              <div id="more-empty" class="d-none text-center text-lg pt-6 pb-2"><strong>{!! __('Sorry, there are no more press releases to show.', 'sage') !!}</strong></div>
              <div id="more-load" class="text-center pt-10 pb-4">
                <a href="javascript:void(0)" data-load="press" class="btn btn-outline-dark icon-after">{{ __('Show more press releases', 'sage') }} <i class="fal fa-arrow-right fa-rotate-90"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@overwrite
