@php
  // ToDo: Move this functionality to a helper function.
  //       Similar to section background functionality.

  $headline = get_field('get_started_content_headline', 'options') ?: '';
  $sub_headline = get_field('get_started_content_subheadline', 'options') ?: '';
  $copy = get_field('get_started_content_copy', 'options') ?: '';

  $bg_img_class = get_field('get_started_bg_class', 'options') ?: '';
  $bg_img_class = ! empty($bg_img_class) ? \App\sanatize_class_depth($bg_img_class) : '';

  $bg_img       = get_field('get_started_bg_image', 'options') ?: array();
  $bg_img_opts  = get_field('get_started_bg_image_options', 'options') ?: array();
  $bg_img_url   = isset($bg_img['url']) ? $bg_img['url'] : '';
  $bg_img_opts  = ! empty($bg_img_opts) ? \App\sanatize_class_depth($bg_img_opts) : '';

  $style = '';
  if( ! empty($bg_img_url) ) {
    $style = 'background-image:url(' . $bg_img_url . ');';
  }

  if( !empty( $style ) ) {
    $style = 'style="'.$style.'"';
  }
@endphp

<section id="get-started-rjbstarter-v4" class="bg-lighter get-started-takeover get-started-takeover-v4 page-takeover w-100 {!! $bg_img_class !!} {!! $bg_img_opts !!}" tabindex="-1" role="dialog" aria-labelledby="actionPlanModal" aria-hidden="true" {!! $style !!}>
  <div class="get-started-takover-inside h-100 d-flex align-items-center flex-wrap page-takeover-inside">
    <div class="container container-main-content py-2">
      <div class="row flex-row text-right justify-content-center gutter-xxl mb-4">
        <div class="col col-12 col-lg-12"><a class="close takeover-close" href="#get-started-v4"><i class="fal fa-times"></i></a></div>
      </div>

          <div data-section-row-main="mmpwzq" class="row flex-row justify-content-center justify-content-md-between align-items-center  ">
            <!-- start: text column content -->
            <div class="col col-copy col-12 col-md-5 col-lg-4 text-center text-md-left py-2 py-md-4">
              <div class="col-inside col-inside-copy w-100">
                <h3 class="headline headline-col headline-col-copy">
                  {!! __('Our Products','sage') !!}
                </h3>
                <div class="d-flex flex-column flex-column-wrap">
                  <div class="text text-col text-col-copy order-first">
                    <p>{!! __('Marketers, publishers, agencies and consultancies use the Rjbstarter Intelligence Cloud, powered by Q, to discover new customers, drive incremental growth and deliver business&nbsp;outcomes.','sage') !!}</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end: text column content -->
            <!-- start: cards column content -->
            <div class="col col-cards col-12 col-md-7 py-0 my-0 my-md-3 ">
              <div class="col-inside col-inside-cards text-center list-">
                <div class="row flex-row row-cards align-items-start justify-content-start ">
                  <div class="col col-card col-12 col-md-6 py-1">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                      <a class="wrapper-link card-wrapper-link" href="/products/measure-audience-insights/" data-g-action="measure" data-g-label="get started takeover">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-sm ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-2">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-primary icon-green">
                                <i class="fal fa-chart-line fa-2x icon-primary"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards">
                                  {!! __('Measure','sage') !!}
                                </h5>
                                <div class="">
                                  <p>{!! __('A <strong>free</strong> way to know your audience accurately on any site or&nbsp;app.','sage') !!}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col col-card col-12 col-md-6 py-1">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                      <a class="wrapper-link card-wrapper-link" href="/products/q-for-publishers/" data-g-action="q for publishers" data-g-label="get started takeover">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-sm ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-2">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-primary icon-green">
                                <i class="fal fa-newspaper fa-2x icon-primary"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Q for Publishers','sage') !!}
                                </h5>
                                <div class="">
                                  <p>
                                    {!! __('Plan your content, grow your audience and get more from ad&nbsp;sales.','sage') !!}
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col col-card col-12 col-md-6 py-1">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                      <a class="wrapper-link card-wrapper-link" href="/products/advertise/" data-g-action="advertise" data-g-label="get started takeover">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-sm ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-2">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-primary icon-orange">
                                <i class="fal fa-audio-description fa-2x icon-primary"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Advertise','sage') !!}
                                </h5>
                                <div class="">
                                  <p>
                                    {!! __('Reach your audience when it counts with brand and DR&nbsp;advertising.','sage') !!}
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col col-card col-12 col-md-6 py-1">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                      <a class="wrapper-link card-wrapper-link" href="/products/choice-consent-management-platform/" data-g-action="choice" data-g-label="get started takeover">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-sm ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-2">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-primary icon-purple">
                                <i class="fal fa-toggle-on fa-2x icon-primary"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Choice','sage') !!}
                                </h5>
                                <div class="">
                                  <p>
                                    {!! __('Consent Management Platform for GDPR, CCPA &amp; ePrivacy&nbsp;Directive.','sage') !!}
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end: cards column content -->
          </div>









    </div>
    <footer class="footer-takover footer-contact-takeover w-100">
      <div class="container py-2">
        <div class="row flex-row text-left justify-content-center gutter-xxl my-2">
          <!-- Nothing. -->
        </div>
      </div>
    </footer>
  </div>
</section>
