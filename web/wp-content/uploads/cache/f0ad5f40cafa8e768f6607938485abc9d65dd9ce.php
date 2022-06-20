<?php
  // ToDo: Move this functionality to a helper function.
  //       Similar to section background functionality.

  $headline = get_field('contact_takeover_content_headline', 'options') ?: '';
  $sub_headline = get_field('contact_takeover_content_subheadline', 'options') ?: '';
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
  $san_fran_address = get_field('san_francisco_address', 'options') ?: '';
  $san_fran_phone = get_field('san_francisco_phone', 'options') ?: '';
  $san_fran_email = get_field('san_francisco_email', 'options') ?: '';

?>

<section id="contact-arezoupourmir" class="bg-lighter contact-takeover page-takeover <?php echo $bg_img_class; ?> <?php echo $bg_img_opts; ?>" tabindex="-1" role="dialog" aria-labelledby="contact-takeover-headline" aria-hidden="true" <?php echo $style; ?>>
  <div class="contact-takover-inside h-100 d-flex align-items-center flex-wrap">
    <div class="container container-main-content py-2">
      <div class="row flex-row text-right justify-content-center gutter-xxl mb-4 mb-md-6 mb-lg-8">
        <div class="col col-12 col-lg-10 col-xl-9"><a class="close takeover-close" href="#contact"><i class="fal fa-times"></i></a></div>
      </div>
      <div class="row flex-row gutter-xxl justify-content-center align-items-start my-4">
        <div class="col col-copy col-12 col-md-6 col-lg-5 col-xl-4 mt-3">

          <?php if( $headline || $sub_headline ): ?>
            <h3 id="contact-takeover-headline" class="headline">
              <?php if( $headline ): ?><?php echo $headline; ?> <?php endif; ?>
              <?php if( $subheadline ): ?>
                <span class="subheadline"><?php echo $subheadline; ?></span>
              <?php endif; ?>
            </h3>
          <?php endif; ?>

          <?php if( $copy ): ?>
            <div class="copy takeover-copy contact-takeover-copy">
              <?php echo $copy; ?>

            </div>
          <?php endif; ?>
        </div>
        <div class="col col-form col-12 col-md-6 col-lg-5">

          <?php /* The necessary js is loaded via app/setup.php */ ?>
          <form id="mktoForm_3328" class="contact-sales"></form>

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
                  <?php if($title_footer_address): ?>
                    <div class="pb-1 pb-md-2" class="footer-title"><?php echo $title_footer_address; ?></div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col col-6">
                  <?php if($san_fran_title): ?>
                    <div><?php echo $san_fran_title; ?></div>
                  <?php endif; ?>
                  <?php if($san_fran_address): ?>
                    <div><?php echo $san_fran_address; ?></div>
                  <?php endif; ?>
                  <?php if($san_fran_phone): ?>
                    <div><?php echo $san_fran_phone; ?></div>
                  <?php endif; ?>
                  <?php if($san_fran_email): ?>
                    <div><?php echo $san_fran_email; ?></div>
                  <?php endif; ?>
                </div>

                <div class="col col-6">
                  <?php // TODO: maybe check tcfapi(), get location and put closest local office here. ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col col-12 col-md-4 col-lg-5 text-center text-md-right d-flex justify-content-end align-items-center">
            <div class="nav nav-social text-md-right">
              <?php echo App::socialLink('twitter'); ?>

              <?php echo App::socialLink('linkedin'); ?>

              <?php echo App::socialLink('facebook'); ?>

              <?php echo App::socialLink('pinterest'); ?>

              <?php echo App::socialLink('instagram'); ?>

            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</section>
