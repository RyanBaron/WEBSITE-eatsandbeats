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

<section id="get-started-rjbstarter-v2" class="bg-lighter get-started-takeover get-started-takeover-v2 page-takeover {!! $bg_img_class !!} {!! $bg_img_opts !!}" tabindex="-1" role="dialog" aria-labelledby="actionPlanModal" aria-hidden="true" {!! $style !!}>
  <div class="get-started-takover-inside page-takeover-inside h-100 d-flex align-items-center flex-wrap">
    <div class="container container-main-content py-2">
      <div class="row flex-row text-right justify-content-center gutter-xxl mb-4">
        <div class="col col-12 col-lg-12"><a class="close takeover-close" href="#get-started-v2"><i class="fal fa-times"></i></a></div>
      </div>

          <div data-section-row-main="mmpwzq" class="row flex-row justify-content-center justify-content-md-around align-items-start  ">
            <!-- start: text column content -->
            <div class="col col-copy col-12 col-md-5 col-lg-4 text-center text-md-left py-2 py-md-4">
              <div class="col-inside col-inside-copy w-100">
                <h3 class="headline headline-col headline-col-copy">
                  {!! __('How Can Rjbstarter Help You Grow?','sage') !!}
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
                  <div class="col col-card col-12 py-0">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-xs ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-1">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-gray">
                                <i class="fal fa-toggle-on fa-2x icon-gray"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Rjbstarter Choice','sage') !!}
                                  <span class="subheadline">
                                    {!! __('For Publishers &&nbsp;Marketers','sage') !!}
                                  </span>
                                </h5>
                                <div class="content">
                                  <p class="text-sm">
                                    {!! __('Easily manage consent across your web properties with support for consumer privacy preferences under GDPR, ePrivacy Directive and&nbsp;CCPA.','sage') !!}
                                  </p>
                                </div>
                                <div class="buttons buttons-cards text-right pt-1">
                                  <a class="btn btn-primary btn-sm" href="https://www.rjbstarter.com/signin/register?qcRefer=/protect/sites/newUser" data-g-action="choice sign up" data-g-label="get started takeover v2">{!! __('Sign up for free','sage') !!}</a>
                                  <a class="link link-primary icon-after" href="{!! __('/products/chocie-consent-management-platform/','sage') !!}" data-g-action="choice learn more" data-g-label="get started takeover v2">{!! __('Learn more','sage') !!}<i class="fal fa-arrow-right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col col-card col-12 py-0">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-xs ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-1">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-gray">
                                <i class="fal fa-chart-line fa-2x icon-gray"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards">
                                  {!! __('Rjbstarter Measure','sage') !!}
                                  <span class="subheadline">
                                    {!! __('For Site Owners','sage') !!}
                                  </span>
                                </h5>
                                <div class="content">
                                  <p class="text-sm">{!! __('Gain real-time insights about who your audience is, what motivates them, and how they spend time across your&nbsp;properties.','sage') !!}</p>
                                </div>
                                <div class="buttons buttons-cards text-right pt-1">
                                  <a class="btn btn-primary btn-sm" href="https://www.rjbstarter.com/signin/register" data-g-action="measure sign up" data-g-label="get started takeover v2">{!! __('Sign up for free','sage') !!}</a>
                                  <a class="link link-primary icon-after" href="{!! __('/products/measure-audience-insights/','sage') !!}" data-g-action="measure learn more" data-g-label="get started takeover v2">{!! __('Learn more','sage') !!}<i class="fal fa-arrow-right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col col-card col-12 py-0">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-xs ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-1">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-gray">
                                <i class="fal fa-audio-description fa-2x icon-gray"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Rjbstarter Advertise','sage') !!}
                                  <span class="subheadline">
                                    {!! __('For Marketers, Agencies, &&nbsp;Consultancies','sage') !!}
                                  </span>
                                </h5>
                                <div class="content">
                                  <p class="text-sm">
                                    {!! __('Find new customers and drive better outcomes with our suite of AI-driven audience insights, targeting, and measurement&nbsp;solutions.','sage') !!}
                                  </p>
                                </div>
                                <div class="buttons buttons-cards text-right pt-1">
                                  <a class="link link-primary icon-after" href="{!! __('/products/advertise/','sage') !!}" data-g-action="advertise learn more" data-g-label="get started takeover v2">{!! __('Learn more','sage') !!}<i class="fal fa-arrow-right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col col-card col-12 py-0">
                    <div class="col-inside col-inside-card h-100 py-1 col-inside-fa-2x col-inside-icon-pos-left">
                        <div class="card h-100 d-flex flex-column justify-content-md-between  flat dropshadow no-border light-border padding-wrap-1 text-left hl-xs ">
                          <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                            <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between p-1">
                              <div class="icon-wrapper icon-wrap-icon-pos-left icon-wrap-fa-2x icon-wrap-icon-gray">
                                <i class="fal fa-newspaper fa-2x icon-gray"></i>
                              </div>
                              <div class="d-flex flex-column h-100 justify-content-md-start">
                                <h5 class="headline headline-col headline-col-cards ">
                                  {!! __('Q for Publishers','sage') !!}
                                  <span class="subheadline">
                                    {!! __('For Publishers','sage') !!}
                                  </span>
                                </h5>
                                <div class="content">
                                  <p class="text-sm">
                                    {!! __('Grow your business by better monetizing your digital audiences, through insights and&nbsp;measurement.','sage') !!}
                                  </p>
                                </div>
                                <div class="buttons buttons-cards text-right pt-1">
                                  <a class="link link-primary icon-after" href="{!! __('/products/q-for-publishers/','sage') !!}" data-g-action="q for publishers learn more" data-g-label="get started takeover v2">{!! __('Learn more','sage') !!}<i class="fal fa-arrow-right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
