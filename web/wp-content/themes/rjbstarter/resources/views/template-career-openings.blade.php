{{--
  Template Name: Careers - Job Listing
--}}

@php
  $en_title = 'Careers | Rjbstarter'
@endphp

@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="container">
    <div class="careers-inside py-6 py-md-8">
      <div class="row flex-row justify-content-center">
        <div class="col col-12 ">
          @while (have_posts()) @php the_post() @endphp

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <a name="current_openings"></a>
              <section class="filter-listing" data-behavior="filter_jobs">
                <div class="container-jobs">
                  <header class="filter-listing__header">
                    <h3 class="filter-listing__title pb-5">Current Rjbstarter Job Openings:</h3>
                  </header>

                  <div class="grid-row">
                    <input type="hidden" id="jobCache" value="">
                    <aside class="filter-listing__sidebar">
                          <form action="#">
                            <div class="accordion" data-behavior="accordion">

                              <?php
                              /* build translated accordion Header and "All" filter components */
                              echo \App\build_accordion_header("Department",
                                                          "By Department",
                                                          $en_title);
                              echo \App\build_accordion_all_checkbox("department");
                              echo \App\build_accordion_header("Location",
                                                          "By Location",
                                                          $en_title);
                              echo \App\build_accordion_all_checkbox("location");
                              echo \App\build_accordion_header("Commitment",
                                                          "By Commitment",
                                                          $en_title);
                              echo \App\build_accordion_all_checkbox("commitment");
                              ?>

                            </div>
                          </form>
                        </aside>

                    <div class="filter-listing__main">
                          <div class="filter-listing__item filter-listing__error no-results hidden" aria-hidden="true">
                            <div class="filter-listing__item-inner">
                              <h2 class="filter-listing__item-title">
                                No results
                              </h2>
                            </div>
                          </div>

                          <div class="filter-listing__item filter-listing__error job-loading-error hidden" aria-hidden="true">
                            <div class="filter-listing__item-inner">
                              <h2 class="filter-listing__item-title">
                                There was an error loading the job listings
                              </h2>
                            </div>
                          </div>

                          <div class="filter-listing__list">
                              <!--Job Listings via AJAX-->
                          </div>

                          <a href="#" id="<?php echo $en_title .'_CurrentOpeningModule_LoadMore'; ?>" class="filter-listing__load-more">
                              Load more
                          </a>

                        </div>
                  </div>
                </div>
              </section>
            </article>
          @endwhile
        </div>
      </div>
    </div>
  </div>
@overwrite
