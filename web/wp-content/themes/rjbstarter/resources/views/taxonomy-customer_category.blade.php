@extends('layouts.app-customer')

@section('content')
  <div class="container pb-5 customer-feature-content feature-content">
    @php
      $taxonomy = get_query_var('taxonomy'); // get the taxonomy slug from the page path
      $page_term_slug = get_query_var('term');
      $term = get_term_by('slug', $page_term_slug, 'customer_category');
      $page_term_id = isset($term->term_id) ? $term->term_id : 0;
      // $page_term_name = isset($term->name) ? $term->name : '';
      $customer_primary_feature = \App\get_featured_primary_cpt('customer', $taxonomy, $page_term_slug);
      $customer_primary_feature_id = isset($customer_primary_feature[0]) ? $customer_primary_feature[0] : 0;
    @endphp
    @if( $customer_primary_feature_id )
      <div class="row flex-row justify-content-center">
        <div class="col col-feature-primary col-12">
          @include('partials.content-customer-feature-primary', array('post_id' => $customer_primary_feature_id))
        </div>
      </div>
    @endif

    @php
      $customer_secondary_feature_ids = \App\get_featured_secondary_cpt('customer', $taxonomy, $page_term_slug);
    @endphp

    @if( (count($customer_secondary_feature_ids) >= 1 ) )
      <div class="row flex-row justify-content-start">
        @foreach ($customer_secondary_feature_ids as $post_id)
          <div class="col col-feature-secondary col-12 col-sm-12 col-md-4">
            @include('partials.content-customer-feature-secondary', array('post_id' => $post_id) )
          </div>
        @endforeach
      </div>
    @endif
  </div>

  @if ( have_posts() )
    <div class="bg-lighter post-feed-content post-feed-content-customer customer-feed-content py-6">
      <div class="container">
        <header class="header-content py-6">
          <div class="row flex-row justify-content-center">
            <div class="col-12 col-md-6 text-center">
              <h3 class="headline headline-header">{{ __('All Case Studies', 'sage') }}</h3>
            </div>
          </div>
        </header>

        <div class="row flex-row justify-content-center">
          <div class="col col-articles col-12 col-xxl-12">
            <div class="row flex-row justify-content-center justify-content-md-start gutter-xl">
              @while (have_posts())
                <div class="col col-12 col-sm-10 col-md-6">
                  @php the_post(); @endphp
                  @include('partials.content-post-feed-customer-condensed', array('cnt' => 1))
                </div>
              @endwhile
            </div>
            <div id="more-customers" data-load-more="customer-taxonomy">
              <div id="ajax-customers"></div>
              <div id="more-empty" class="d-none text-center text-lg pt-6 pb-2"><strong>{!! __("Sorry, there are no more case studies to show.", "sage") !!}</strong></div>
              <div id="more-load" class="text-center pt-10 pb-4">
                <a href="javascript:void(0)" data-load="customers" data-taxonomy-term="{{ $page_term_slug }}" data-taxonomy-term-id="{{ $page_term_id }}" class="btn btn-outline-dark icon-after">{{ __('Show more case studies', 'sage') }} <i class="fal fa-arrow-right fa-rotate-90"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@overwrite
