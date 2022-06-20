<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('blog') @endphp>

    <!-- ADD: GTM No Script Tag -->
    @includeIf('partials.gtm-noscript')
    <!-- END ADD: GTM No Script Tag -->

    @include('partials.header-blog')

    <div class="wrap wrap-container" role="document">
      <div class="wrap-inside wrap-container-inside">
        <div class="content w-100">
          <main class="main">
            @yield('content')
          </main>
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
