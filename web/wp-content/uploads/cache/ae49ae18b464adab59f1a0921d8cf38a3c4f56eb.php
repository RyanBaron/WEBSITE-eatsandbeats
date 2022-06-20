<footer class="footer footer-site wrap-site-footer bg-darker">
  <div class="wrap-site-footer-inside">
    <div class="footer-top">
      <div class="container">
        <div class="row flex-row row-footer-nav">
          <div class="col col-12 col-md-4 col-lg-2">
            <div class="organization py-2 py-md-1 py-lg-0" itemscope itemtype="http://schema.org/Organization">
              <meta itemprop="name" content="Arezou">
              <figure class="logo">
                <a class="brand" href="<?php echo e(home_url('/')); ?>"><img src="<?= App\asset_path('images/arezoupourmir-logo.png'); ?>" alt="Arezou"></a>
              </figure>
            </div>
          </div>
          <?php if(has_nav_menu('footer_marketer_navigation')): ?>
            <div class="col col-6 col-md-4 col-lg-2">
              <div class="footer-nav-wrapper py-2 py-md-1 py-lg-0" id="footer_marketer_navigation">
                <div class="nav-header">
                  Marketers
                </div>
                <?php echo wp_nav_menu(['theme_location' => 'footer_marketer_navigation', 'menu_class' => 'nav d-flex flex-column']); ?>

              </div>
            </div>
          <?php endif; ?>
          <?php if(has_nav_menu('footer_publisher_navigation')): ?>
            <div class="col col-6 col-md-4 col-lg-2">
              <div class="footer-nav-wrapper py-2 py-md-1 py-lg-0" id="footer_publisher_navigation">
                <div class="nav-header">
                  Publishers
                </div>
                <?php echo wp_nav_menu(['theme_location' => 'footer_publisher_navigation', 'menu_class' => 'nav d-flex flex-column']); ?>

              </div>
            </div>
          <?php endif; ?>
          <?php if(has_nav_menu('footer_resources_navigation')): ?>
            <div class="col col-6 col-md-4 col-lg-2">
              <div class="footer-nav-wrapper py-2 py-md-1 py-lg-0" id="footer_resources_navigation">
                <div class="nav-header">
                  Resources
                </div>
                <?php echo wp_nav_menu(['theme_location' => 'footer_resources_navigation', 'menu_class' => 'nav d-flex flex-column']); ?>

              </div>
            </div>
          <?php endif; ?>
          <?php if(has_nav_menu('footer_company_navigation')): ?>
            <div class="col col-6 col-md-4 col-lg-2">
              <div class="footer-nav-wrapper py-2 py-md-1 py-lg-0" id="footer_company_navigation">
                <div class="nav-header">
                  Company
                </div>
                <?php echo wp_nav_menu(['theme_location' => 'footer_company_navigation', 'menu_class' => 'nav d-flex flex-column']); ?>

              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row flex-row">
          <div class="col col-12 col-lg-4 text-center text-md-left d-flex align-items-center justify-content-center justify-content-md-start">
            <?php if(has_nav_menu('footer_legal_navigation')): ?>
              <div class="nav nav-legal py-1 py-lg-0">
                <div class="footer-nav-wrapper" id="footer_legal_navigation">
                  <?php echo wp_nav_menu(['theme_location' => 'footer_legal_navigation', 'menu_class' => 'nav d-flex flex-row']); ?>

                </div>
              </div>
            <?php endif; ?>
          </div>

          <div class="col col-12 col-md-6 col-lg-4 text-left text-md-right align-items-center justify-content-center d-flex justify-content-md-start justify-content-lg-center">
            <div class="legal text-center text-md-left text-lg-center py-1 py-lg-0">
              &copy; <?php echo date("Y"); ?> Arezou. All Rights Reserved.
            </div>
          </div>

          <div class="col col-12 col-md-6 col-lg-4 text-center text-md-right">
            <div class="nav nav-social text-md-right py-1 py-lg-0">
              <?php echo App::socialLink('twitter'); ?>

              <?php echo App::socialLink('linkedin'); ?>

              <?php echo App::socialLink('facebook'); ?>

              <?php echo App::socialLink('pinterest'); ?>

              <?php echo App::socialLink('instagram'); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
