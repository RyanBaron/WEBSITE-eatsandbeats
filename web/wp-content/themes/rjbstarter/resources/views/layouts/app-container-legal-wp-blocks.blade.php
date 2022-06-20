<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('legal') @endphp>

    <!-- ADD: GTM No Script Tag -->
    @includeIf('partials.gtm-noscript')
    <!-- END ADD: GTM No Script Tag -->

    @php do_action('get_header') @endphp
    @include('partials.header')

    @includeIf('partials.page-header-legal')

    <div class="wrap wrap-container" role="document">
      <div class="wrap-inside wrap-container-inside">
        <div class="content w-100 py-4 pb-md-5">
          <div class="container">
            <div class="row flex-row justify-content-center gutter-xl">
              <aside class="col col-12 col-md-3 order-last order-md-first">
                <div class="sidebar-inside py-3 py-md-4 sidebar-sticky">
                  @php dynamic_sidebar('sidebar-legal') @endphp
                </div>
              </aside>
              <div class="col col-12 col-md-8 col-lg-7 order-first order-md-last">
                <main class="main py-3 py-md-4">
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
