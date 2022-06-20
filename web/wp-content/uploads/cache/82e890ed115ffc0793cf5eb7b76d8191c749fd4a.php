<?php
 $primary_nav_style = get_field('primary_nav_style');
 $primary_nav_style = \App\sanatize_class_depth($primary_nav_style);
?>

<header class="banner <?php echo e($primary_nav_style); ?>">
  <div class="wrap wrap-container">
    <div class="wrap-inside wrap-container-inside fixed-top">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg justify-content-between align-items-start align-items-md-center d-flex w-100">
            <div class="nav-left">
              <a class="brand" href="<?php echo e(home_url('/')); ?>" data-g-label="nav: primary" data-g-action="click: logo">
                <img class="logo" src="<?= App\asset_path('images/arezoupourmir-logo.png'); ?>" alt="Arezou">
                <img class="logo-dark d-none" src="<?= App\asset_path('images/arezoupourmir-logo.png'); ?>" alt="Arezou">
                <img class="logo-light d-none" src="<?= App\asset_path('images/arezoupourmir-logo-white.png'); ?>" alt="Arezou">
              </a>
            </div>
            <div class="nav-center mr-auto">
              <?php if(has_nav_menu('primary_navigation')): ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavigation" aria-controls="primaryNavigation" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                    <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="4" width="28" height="3" fill="#C4C4C4"/>
                    <rect y="22" width="28" height="3" fill="#C4C4C4"/>
                    <rect y="13" width="28" height="3" fill="#C4C4C4"/>
                    </svg>
                  </span>
                </button>
                <div class="nav-center-nav-wrap">
                  <div class="ml-auto">
                    <?php if(has_nav_menu('primary_navigation')): ?>
                      <?php echo wp_nav_menu($primarymenu); ?>

                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="nav-right">
              <?php if(has_nav_menu('secondary_navigation')): ?>
                <?php echo wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-banner nav-banner-secondary nav-banner-right']); ?>

              <?php endif; ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
