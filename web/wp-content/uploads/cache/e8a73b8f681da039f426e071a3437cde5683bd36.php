<?php
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
?>

<section id="get-started-arezoupourmir" class="bg-lighter get-started-takeover page-takeover <?php echo $bg_img_class; ?> <?php echo $bg_img_opts; ?>" tabindex="-1" role="dialog" aria-labelledby="actionPlanModal" aria-hidden="true" <?php echo $style; ?>>
  <div class="get-started-takover-inside h-100 d-flex align-items-center flex-wrap">
    <div class="container container-main-content py-2">
      <div class="row flex-row text-right justify-content-center gutter-xxl mb-4 mb-md-6 mb-lg-8">
        <div class="col col-12 col-lg-10 col-xl-9"><a class="close takeover-close" href="#get-started"><i class="fal fa-times"></i></a></div>
      </div>
      <div class="row flex-row row-cards justify-content-center  text-center">
        <div class="col col-card">
          <div class="col-inside col-inside-card h-100 py-2">
            <a class="wrapper-link card-wrapper-link" href="https://arezoupourmir.lndo.site/products/advertise/" data-g-action="" data-g-label="">
              <div class="card h-100 d-flex flex-column justify-content-md-between     ">
                <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                  <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between">
                    <div class="d-flex flex-column h-100 justify-content-md-start">
                      <h4 class="headline headline-col headline-col-cards">
                        <span class="superheadline">Marketers</span>
                        Sell to my audiences
                      </h4>
                    </div>
                    <div class="buttons buttons-cards text-center">
                      <div class="btn btn-primary icon-after wrapped-link">Start advertising</div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col col-card">
          <div class="col-inside col-inside-card h-100 py-2  ">
            <a class="wrapper-link card-wrapper-link" href="https://arezoupourmir.lndo.site/products/choice-consent-management-platform-alt/" data-g-action="" data-g-label="">
              <div class="card h-100 d-flex flex-column justify-content-md-between     ">
                <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                  <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between">
                    <div class="d-flex flex-column h-100 justify-content-md-start">
                      <h4 class="headline headline-col headline-col-cards">
                        <span class="superheadline">Privacy</span>
                        Become data compliant
                        <span class="subheadline">Transition to TCF v2.0 now</span>
                      </h4>
                    </div>
                    <div class="buttons buttons-cards text-center">
                      <div class="btn btn-primary icon-after wrapped-link">Get the CMP</div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col col-card">
        <div class="col-inside col-inside-card h-100 py-2  ">
          <a class="wrapper-link card-wrapper-link" href="#" data-g-action="" data-g-label="">
            <div class="card h-100 d-flex flex-column justify-content-md-between     ">
              <div class="wrapper-card-content d-flex justify-content-md-between h-100 flex-column">
                <div class="card-body d-flex flex-column justify-content-md-between h-100 justify-content-between">
                  <div class="d-flex flex-column h-100 justify-content-md-start">
                    <h4 class="headline headline-col headline-col-cards">
                      <span class="superheadline">Publisher</span>
                      Understand my audiences
                    </h4>
                  </div>
                  <div class="buttons buttons-cards text-center">
                    <div class="btn btn-primary icon-after wrapped-link">Get insights</div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
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
