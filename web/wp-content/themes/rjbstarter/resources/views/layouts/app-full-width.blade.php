<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>

    <!-- ADD: GTM No Script Tag -->
    @includeIf('partials.gtm-noscript')
    <!-- END ADD: GTM No Script Tag -->

    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap container-fluid" role="document">
      <div class="row">
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
