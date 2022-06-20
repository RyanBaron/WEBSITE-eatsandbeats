<header class="banner banner-resource banner trans-on-dark ">
  <div class="wrap wrap-container">
    <div class="wrap-inside wrap-container-inside fixed-top">
      <div class="container">
        <div id="siteNavRow" class="row">
          <nav class="navbar navbar-expand-lg justify-content-between d-flex w-100">
            <div class="nav-left">
              <a class="brand" href="{{ home_url('/') }}" data-g-label="nav: primary" data-g-action="click: logo">
                <img class="logo logo-default" src="@asset('images/logo.png')" alt="Elevate Demand B2B SaaS">
                <img class="logo-dark d-none" src="@asset('images/logo.png')" alt="Elevate Demand B2B SaaS">
                <img class="logo-light d-none" src="@asset('images/logo.png')" alt="Elevate Demand B2B SaaS">
              </a>
            </div>
            <div class="nav-center mr-auto">
              @if (has_nav_menu('primary_navigation'))
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#primaryNavigation" aria-controls="primaryNavigation" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                    <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect class="bar-1" y="3" width="32" height="2" fill="#747985"/>
                      <rect class="bar-2" y="15" width="32" height="2" fill="#747985"/>
                      <rect class="bar-3" y="27" width="32" height="2" fill="#747985"/>
                    </svg>
                  </span>
                </button>

                <div class="nav-center-nav-wrap">
                  <div class="ml-auto">
                    @if (has_nav_menu('primary_navigation'))
                      {!! wp_nav_menu($primarymenu) !!}
                    @endif
                  </div>
                </div>
              @endif
            </div>
            <div class="nav-right">
              @if (has_nav_menu('secondary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-banner nav-banner-secondary nav-banner-right']) !!}
              @endif
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>

  @includeIf('partials.taxonomy-header')

</header>
