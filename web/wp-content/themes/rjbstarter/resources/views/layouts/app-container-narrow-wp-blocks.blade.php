<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>

    <!-- ADD: GTM No Script Tag -->
    @includeIf('partials.gtm-noscript')
    <!-- END ADD: GTM No Script Tag -->

    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap wrap-container" role="document">
      <div class="wrap-inside wrap-container-inside">
        <div class="content w-100">
          <div class="container">
            <div class="row flex-row justify-content-center">
              <div class="col col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7">
                <main class="main pt-10 pt-md-12 pt-lg-14 pb-4 pb-md-5 hl-md">
                  @yield('content')
                </main>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @includeIf('partials.modal.action-plan')
    @includeIf('partials.modal.contact-takover')
    @php wp_footer() @endphp
  </body>
</html>
