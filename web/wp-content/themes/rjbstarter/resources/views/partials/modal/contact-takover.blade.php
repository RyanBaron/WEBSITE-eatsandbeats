@php
// ToDo: Move this functionality to a helper function.
//       Similar to section background functionality.
$headline = get_field('contact_takeover_content_headline', 'options') ?: '';
$subheadline = get_field('contact_takeover_content_subheadline', 'options') ?: '';
$copy = get_field('contact_takeover_content_copy', 'options') ?: '';
$bg_img_class = get_field('contact_takeover_bg_class', 'options') ?: '';
$bg_img_class = ! empty($bg_img_class) ? \App\sanatize_class_depth($bg_img_class) : '';
$bg_img       = get_field('contact_takeover_bg_image', 'options') ?: array();
$bg_img_opts  = get_field('contact_takeover_bg_image_options', 'options') ?: array();
$bg_img_url   = isset($bg_img['url']) ? $bg_img['url'] : '';
$bg_img_opts  = ! empty($bg_img_opts) ? \App\sanatize_class_depth($bg_img_opts) : '';
$style = '';
if( ! empty($bg_img_url) ) {
$style = 'background-image:url(' . $bg_img_url . ');';
}
if( !empty( $style ) ) {
$style = 'style="'.$style.'"';
}
$title_footer_address = get_field('title_footer_address', 'options') ?: '';
$san_fran_title = get_field('san_francisco_title', 'options') ?: '';
$emea_title = get_field('emea_title', 'options') ?: '';
$apac_title = get_field('apac_title', 'options') ?: '';
$san_fran_address = get_field('san_francisco_address', 'options') ?: '';
$apac_address = get_field('apac_address', 'options') ?: '';
$emea_address = get_field('emea_address', 'options') ?: '';
$san_fran_phone = get_field('san_francisco_phone', 'options') ?: '';
$apac_phone = get_field('apac_phone', 'options') ?: '';
$emea_phone = get_field('emea_phone', 'options') ?: '';
$san_fran_email = get_field('san_francisco_email', 'options') ?: '';
$apac_email = get_field('apac_email', 'options') ?: '';
$emea_email = get_field('emea_email', 'options') ?: '';
@endphp
<section id="contact-rjbstarter" class="bg-lighter contact-takeover page-takeover {!! $bg_img_class !!} {!! $bg_img_opts !!}" tabindex="-1" role="dialog" aria-labelledby="contact-takeover-headline" aria-hidden="true" {!! $style !!}>
  <div class="contact-takover-inside page-takeover-inside h-100 d-flex align-items-center flex-wrap">
    <div class="container container-main-content pt-3 pb-2">
      <div class="row flex-row justify-content-center justify-content-md-between gutter-xl mb-2 mb-md-4">
        <div class="col col-12 col-lg-12 col-xl-12">
          <a class="close takeover-close" href="#contact">
            <i class="fal fa-times">
            </i>
          </a>
        </div>
      </div>
      <div class="row flex-row gutter-xxl align-items-start my-4 justify-content-center justify-content-lg-between">
        <div class="col col-copy col-12 col-md-5 col-lg-5 col-xl-4 mt-3">
          @if( $headline || $subheadline )
          <h3 id="contact-takeover-headline" class="headline">
            @if( $headline ){!! $headline !!} @endif
            @if( $subheadline )
            <span class="subheadline">{!! $subheadline !!}
            </span>
            @endif
          </h3>
          @endif
          @if ( $copy )
          <div class="copy takeover-copy contact-takeover-copy">
            {!! $copy !!}
          </div>
          @endif
        </div>
        <div class="col col-form col-12 col-md-7 col-lg-7">
          <div id="accordion-xmqrzl" class="accordion accrodion-faq">
            <div class="card">
              <div class="card-header card-header-accordion hl-xxs bg-white ">
                <a class="accordion-link" data-toggle="collapse" href="#i-need-to-speak-with-someone-in-sales" data-g-action="accordion: i need to speak with" data-g-label="accordion item">
                  <h5 class="headline">
                    <span class="accordion-leading-icon">
                      <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z">
                        </path>
                      </svg>
                      <!-- <i class="fal fa-chevron-down"></i> -->
                    </span> {!! __("I need to speak with someone in sales.", "sage") !!}
                  </h5>
                </a>
              </div>
              <div id="i-need-to-speak-with-someone-in-sales" class="collapse show bg-lightest top-inset-shadow">
                <div class="card-body accordion-card-body hl-xs">
                  <div class="d-flex flex-column h-100">
                    <div class="">
                      <?php /* The necessary js is loaded via app/setup.php */ ?>
                      <form id="mktoForm_3328" class="contact-sales qc-mkto-form">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-accordion hl-xxs bg-white ">
                <a class="accordion-link collapsed" data-toggle="collapse" href="#i-need-product-support" data-g-action="accordion: i need product suppo" data-g-label="accordion item" aria-expanded="true">
                  <h5 class="headline">
                    <span class="accordion-leading-icon">
                      <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z">
                        </path>
                      </svg>
                      <!-- <i class="fal fa-chevron-down"></i> -->
                    </span> {!! __("I need product support.", "sage") !!}
                  </h5>
                </a>
              </div>
              <div id="i-need-product-support" class="bg-lightest top-inset-shadow collapse" style="">
                <div class="card-body accordion-card-body hl-xs">
                  <div class="d-flex flex-column h-100">
                    <div class="">
                      <p>{!! __("Our help center has the most up to date information on our products, along with a support ticketing system for customers.", "sage") !!}
                      </p>
                      <div class="buttons">
                        <a class="btn btn-primary" href="https://help.rjbstarter.com/hc/en-us" target="_blank" data-g-action="help center" data-g-label="contact accordion support">{!! __("Go to Help Center", "sage") !!}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-accordion hl-xxs bg-white ">
                <a class="accordion-link collapsed" data-toggle="collapse" href="#i-would-like-to-contact-your-press-team" data-g-action="accordion: i would like to cont" data-g-label="accordion item" aria-expanded="true">
                  <h5 class="headline">
                    <span class="accordion-leading-icon">
                      <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z">
                        </path>
                      </svg>
                      <!-- <i class="fal fa-chevron-down"></i> -->
                    </span> {!! __("I would like to contact your press team.", "sage") !!}
                  </h5>
                </a>
              </div>
              <div id="i-would-like-to-contact-your-press-team" class="bg-lightest top-inset-shadow collapse" style="">
                <div class="card-body accordion-card-body hl-xs">
                  <div class="d-flex flex-column h-100">
                    <div class="">
                      <p>{!! __("For press inquiries please email", "sage") !!}
                        <a href="mailto:press@rjbstarter.com?subject=Rjbstarter.com%20Press%20Inquiry" data-g-action="press contact" data-g-label="contact accordion press">press@rjbstarter.com
                        </a>.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-accordion hl-xxs bg-white ">
                <a class="accordion-link collapsed" data-toggle="collapse" href="#i-have-a-question-about-data-privacy" data-g-action="accordion: i have a question ab" data-g-label="accordion item" aria-expanded="true">
                  <h5 class="headline">
                    <span class="accordion-leading-icon">
                      <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z">
                        </path>
                      </svg>
                      <!-- <i class="fal fa-chevron-down"></i> -->
                    </span> {!! __("I have a question about data privacy.", "sage") !!}
                  </h5>
                </a>
              </div>
              <div id="i-have-a-question-about-data-privacy" class="bg-lightest top-inset-shadow collapse" style="">
                <div class="card-body accordion-card-body hl-xs">
                  <div class="d-flex flex-column h-100">
                    <div class="">
                      <strong>{!! __("Data Access &amp; Deletion", "sage") !!}</strong>
                      <p>{!! __("We respect your privacy and data rights; please select the best option for you below.", "sage") !!}
                      </p>
                      <ol>
                        <li>{!! __("I would like to request access to or deletion of my personal data, ", "sage") !!}
                          <a href="/privacy/data-subject-rights/">{!! "click here", "sage" !!}
                          </a>.
                        </li>
                        <li>{!! __("I would like to delete my Rjbstarter.com account data. Please email", "sage") !!}
                          <a href="mailto:support@rjbstarter.com?subject=Rjbstarter.com%20Account%20Data%20Access" data-g-action="get account data" data-g-label="contact accordion data">support@rjbstarter.com
                          </a>.
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-accordion hl-xxs bg-white ">
                <a class="accordion-link collapsed" data-toggle="collapse" href="#i-have-a-general-question" data-g-action="accordion: i have a general que" data-g-label="accordion item" aria-expanded="true">
                  <h5 class="headline">
                    <span class="accordion-leading-icon">
                      <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z">
                        </path>
                      </svg>
                      <!-- <i class="fal fa-chevron-down"></i> -->
                    </span> {!! __("I have a general question.", "sage") !!}
                  </h5>
                </a>
              </div>
              <div id="i-have-a-general-question" class="bg-lightest top-inset-shadow collapse " style="">
                <div class="card-body accordion-card-body hl-xs">
                  <div class="d-flex flex-column h-100">
                    <div class="">
                      <?php /* The necessary js is loaded via app/setup.php */ ?>
                      <form id="mktoForm_3462" class="contact-general qc-mkto-form">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-takover footer-contact-takeover w-100">
      <div class="container py-2">
        <div class="row flex-row text-left justify-content-center gutter-xxl my-2">
          <div class="col col-12 col-md-8 col-lg-7">
            <div class="footer-address-wrapper">
              <div class="row">
                <div class="col col-12">
                  @if ($title_footer_address)
                    <div class="pb-1 pb-md-2" class="footer-title">{!! $title_footer_address !!}</div>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col col-4">
                  @if ($san_fran_title)
                  <div>{!! $san_fran_title !!}
                  </div>
                  @endif
                  @if ($san_fran_address)
                  <div>{!! $san_fran_address !!}
                  </div>
                  @endif
                  @if ($san_fran_phone)
                  <div>{!! $san_fran_phone !!}
                  </div>
                  @endif
                  @if ($san_fran_email)
                  <div>{!! $san_fran_email !!}
                  </div>
                  @endif
                </div>
                <div class="col col-4">
                  @if ($emea_title)
                  <div>{!! $emea_title !!}
                  </div>
                  @endif
                  @if ($emea_address)
                  <div>{!! $emea_address !!}
                  </div>
                  @endif
                  @if ($emea_phone)
                  <div>{!! $emea_phone !!}
                  </div>
                  @endif
                  @if ($emea_email)
                  <div>{!! $emea_email !!}
                  </div>
                  @endif
                </div>
                <div class="col col-4">
                  @if ($apac_title)
                  <div>{!! $apac_title !!}
                  </div>
                  @endif
                  @if ($apac_address)
                  <div>{!! $apac_address !!}
                  </div>
                  @endif
                  @if ($apac_phone)
                  <div>{!! $apac_phone !!}
                  </div>
                  @endif
                  @if ($apac_email)
                  <div>{!! $apac_email !!}
                  </div>
                  @endif
                </div>
                @php /*
                  <div class="col col-6">
                    <!--  TODO: maybe check tcfapi(), get location and put closest local office here. -->
                  </div>
                */ @endphp
              </div>
            </div>
          </div>
          <div class="col col-12 col-md-4 col-lg-5 text-center text-md-right d-flex justify-content-end align-items-center">
            <div class="nav nav-social text-md-right">
              {!! App::socialLink('twitter') !!}
              {!! App::socialLink('linkedin') !!}
              {!! App::socialLink('facebook') !!}
              {!! App::socialLink('pinterest') !!}
              {!! App::socialLink('instagram') !!}
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</section>
