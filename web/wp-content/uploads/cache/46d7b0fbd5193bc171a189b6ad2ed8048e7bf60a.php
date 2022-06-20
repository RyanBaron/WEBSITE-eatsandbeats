<header class="banner banner-blog">
  <div class="wrap wrap-container">
    <div class="wrap-inside wrap-container-inside fixed-top navbar-dark">
      <div class="container">
        <div class="row mt-lg-2 mb-lg-3">
          <nav class="navbar navbar-expand-lg justify-content-between d-flex w-100">
            <a class="brand" href="<?php echo e(home_url('/blog/')); ?>" data-g-label="nav: primary" data-g-action="click: logo"><img src="<?= App\asset_path('images/arezoupourmir-logo.png'); ?>" alt="Arezou Blog"></a>
            <?php if(has_nav_menu('blog_primary_navigation')): ?>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavigation" aria-controls="primaryNavigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                  <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="4" width="28" height="3" fill="#C4C4C4"/>
                  <rect y="22" width="28" height="3" fill="#C4C4C4"/>
                  <rect y="13" width="28" height="3" fill="#C4C4C4"/>
                  </svg>
                </span>
              </button>

              <div class="collapse navbar-collapse navbar-primary-blog" id="primaryNavigation">
                <div class="ml-auto">
                  <?php if(has_nav_menu('blog_primary_navigation')): ?>
                    <?php echo wp_nav_menu($blogprimarymenu); ?>

                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </nav>
        </div>

        <div class="row flex-row justify-content-start mt-0 mt-lg-1 d-none d-lg-flex">
          <div class="col">
            <?php if(has_nav_menu('blog_category_navigation')): ?>
              <nav class="navbar navbar-expand-lg justify-content-between d-flex w-100 p-0">
                <div class="navbar-category-blog" id="blogCategoryNavigation">
                  <div class="ml-auto">
                    <?php if(has_nav_menu('blog_category_navigation')): ?>
                      <?php echo wp_nav_menu($blogcategorymenu); ?>

                    <?php endif; ?>
                  </div>
                </div>
              </nav>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
