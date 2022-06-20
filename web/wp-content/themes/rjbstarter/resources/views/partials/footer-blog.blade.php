@php
$footer_phone              = get_field('footer_phone', 'options') ?: '';
$footer_location           = get_field('footer_location', 'options') ?: '';
$footer_bottom             = get_field('footer_bottom', 'options') ?: '';
@endphp

<footer class="footer footer-site wrap-site-footer">
  <div class="wrap-site-footer-inside">

    <div class="footer-top">
      <div class="container">
        <div class="row flex-row row-footer-nav justify-content-center headline-post-line">
          <div class="col col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 col-xxxl-3">
            <div class="organization py-2 py-md-1 py-lg-0" itemscope itemtype="http://schema.org/Organization">
              <meta itemprop="name" content="Elevate Demand">
              <figure class="logo mx-auto">
                <a class="brand-footer" href="{{ home_url('/') }}" data-g-label="nav: footer" data-g-action="click: logo">
                  <img class="logo logo-default d-block img-fluid" src="@asset('images/logo-footer.png')" alt="Elevate Demand B2B SaaS">
                  <img class="logo-dark d-none" src="@asset('images/logo-footer.png')" alt="Elevate Demand B2B SaaS">
                </a>
              </figure>

              @if($footer_location)
                <div class="address mt-2 mb-0" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                  {!! $footer_location !!}
                </div>
              @endif

              @if($footer_location)
                <div class="mt-0">{!! $footer_phone !!}</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row flex-row justify-content-center">
          <div class="col col-12 col-lg-4 text-center text-md-left d-flex align-items-center justify-content-center">
            @if (has_nav_menu('footer_legal_navigation'))
              <div class="nav nav-legal py-1">
                <div class="footer-nav-wrapper" id="footer_legal_navigation">
                  {!! wp_nav_menu(['theme_location' => 'footer_legal_navigation', 'menu_class' => 'nav d-flex flex-row']) !!}
                </div>
              </div>
            @endif
          </div>
        </div>
        <div class="row flex-row justify-content-center">
          <div class="col col-12 col-md-8 col-lg-6 text-center align-items-center justify-content-center d-flex">
            <div class="legal text-center py-1 text-dark">
              &copy; @php echo date("Y"); @endphp Elevate Demand. {!! __('All Rights Reserved.', 'sage') !!}
            </div>
          </div>
          <div class="col col-12">
            <div>{!! $footer_bottom !!}</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</footer>
