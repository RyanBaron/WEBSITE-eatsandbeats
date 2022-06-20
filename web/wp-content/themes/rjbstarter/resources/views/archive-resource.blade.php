@extends('layouts.app-resource')

@section('content')
  <div class="container pb-2 resource-feature-content feature-content">

    @php
      $taxonomy = '';
      $page_term_slug = '';
      $page_term_id = isset($term->term_id) ? $term->term_id : 0;

      // $taxonomy = get_query_var('taxonomy');
      // $page_term_slug = get_query_var('term');
      // $term = get_term_by('slug', $page_term_slug, 'customer_category');
      // $page_term_name = isset($term->name) ? $term->name : '';
      $customer_primary_feature = \App\get_featured_primary_cpt('resource', $taxonomy, $page_term_slug);
      $customer_primary_feature_id = isset($customer_primary_feature[0]) ? $customer_primary_feature[0] : 0;

      $card_v_padding = \App\sanatize_class_depth(get_field('resource_feed_card_v_padding', 'options')) ?: '';
    @endphp
    @if( $customer_primary_feature_id )
      <div class="row flex-row justify-content-center">
        <div class="col col-feature-primary col-12">
          @includeIf('partials.content-resource-feature-primary', array('post_id' => $customer_primary_feature_id))
        </div>
      </div>
    @endif
  </div>

  @if ( have_posts() )
    <div class="post-feed-content post-feed-content-resource resource-feed-content">
      <div class="container">
        <div class="row flex-row justify-content-center">
          <div class="col col-articles col-12 col-xxl-12">
            <div class="row flex-row justify-content-center justify-content-md-start">
              @while (have_posts())
                <div class="col col-card col-12 col-sm-10 col-md-4 col-xl-3 {!! $card_v_padding !!}">
                  @php the_post(); @endphp
                  @includeIf('partials.content-post-feed-resource-condensed', array('cnt' => 1))
                </div>
              @endwhile
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@overwrite
