{{--
  Template Name: Careers - Single
--}}

@php
  function build_social_shares($permalink, $id_prefix, $title, $summary) {
    $url = urlencode($permalink);
    echo '<ul class="single__social">';
    echo gen_facebook($url, $id_prefix);
    echo gen_twitter($title . ' - ' . $url, $id_prefix);
    echo gen_linkedin($url, $id_prefix, urlencode($title), urlencode($summary));
    //if (ICL_LANGUAGE_CODE == 'de') {
    //  echo gen_xing($url, $id_prefix);
    //}
    echo '</ul>';
  }
  function gen_facebook($url, $id_prefix) {
    return "<li><a href='https://www.facebook.com/sharer/sharer.php?u={$url}' id={$id_prefix}_Social_Facebook
                     class='single__social-facebook' target='_blank' data-evt='click' data-cat='Social' data-act='share - https://www.facebook.com/sharer/sharer.php?u={$url}' data-lbl='Facebook - Icon'>Facebook</a></li>";
  }
  function gen_twitter($url, $id_prefix) {
    return "<li><a href='https://twitter.com/home?status={$url}' id={$id_prefix}_Social_Twitter
                     class='single__social-twitter' target='_blank' data-evt='click' data-cat='Social' data-act='share - https://twitter.com/home?status={$url}' data-lbl='Twitter - Icon'>Twitter</a></li>";
  }
  function gen_linkedin($url, $id_prefix, $title, $summary) {
    return "<li><a href='http://www.linkedin.com/shareArticle?mini=true&url={$url}&title={$title}&summary={$summary}&source=Rjbstarter'
                     id={$id_prefix}_Social_LinkedIn class='single__social-linkedin' target='_blank' data-evt='click' data-cat='Social' data-act='share - http://www.linkedin.com/shareArticle?mini=true&url={$url}&title={$title}&summary={$summary}&source=Rjbstarter' data-lbl='Linkedin - Icon'>LinkedIn</a></li>";
  }
  function gen_xing($url, $id_prefix) {
    return "<li><a href='https://www.xing.com/spi/shares/new?url={$url}'
                     id='{$id_prefix}_Social_Xing' class='single__social-xing' target='_blank' data-evt='click' data-cat='Social' data-act='click - https://www.xing.com/spi/shares/new?url={$url}' data-lbl='Xing - Icon'>Xing</a></li>";
  }

  $job_id = get_query_var('job_id');
@endphp

@extends('layouts.app-full-width')

@section('content')

<div class="page-template-career-single">
<article id="post-@php echo $job_id; @endphp" @php post_class("job-article"); @endphp>
  <header class="job-article-header pt-10 pb-4 pt-md-12 pb-lg-5 pb-xl-6 mb-4 text-center bg-lighter hl-sm">
    <div class="container">
      <div class="job-loading-error hidden" aria-hidden="true">
        <!-- Job Loading error -->
        <h4>
          There was an error loading the job
        </h4>
        <br />
        <a href="/careers/openings" id="Careers_JumpBtn" class="btn--fill-black" data-g-action='back to career openings' data-g-category="careers" data-g-label='job single'>
          Return to Careers
        </a>
      </div>
      <div class="single__meta__wrap job-header-wrap" data-jobid="@php echo $job_id; @endphp">
        <!-- Job Header Content -->
      </div>
    </div>
  </header>
  <div class="container" data-behavior="single_job">
    <div class="grid-row">
      <div class="row flex-row justify-content-center">
        <div class="col col-12 col-md-19 col-lg-8 col-xl-7">
          <div class="single__body pt-1">
            <div class="single__content hidden">
              <!-- Job Description Content -->
              <div class="text-center py-4">
                <a id="Job_Apply_Button" class="btn--fill-black single__btn-spaced" dasta-g-action='apply {{ $job_id }}' data-g-category='careers' data-g-label='job single'>
                Apply
              </a>
              </div>
            </div>
            <div class="social-shares-wrap hidden">
              @php build_social_shares("https://jobs.lever.co/rjbstarter/{$job_id}", 'Job', "", false); @endphp
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>

@php get_template_part('partials/panel', 'perks'); @endphp
</div>







@endsection
