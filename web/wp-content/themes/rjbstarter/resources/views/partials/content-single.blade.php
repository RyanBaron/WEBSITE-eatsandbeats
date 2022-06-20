<article @php post_class('pt-12 pb-6 pt-md-14 pt-lg-16') @endphp>

  @include('partials.page-header-single')

  <div class="container">
    <div class="row flex-row justify-content-center">
      <div class="col col-articles col-12 col-md-9 col-lg-8">

        <div class="entry-content article-body hl-sm">
          @php the_content() @endphp
        </div>

      </div>
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>

<section id="" data-section-id="gmvybl" data-section="main" class="pt-4 pb-14 pb-lg-16 hl-lg text-center btn-primary-highlight-bottom-right-roi">
  <div class="container" data-section-container-main="gmvybl">
    <div data-section-row-main="gmvybl" class="row flex-row justify-content-center">
      <!-- start: text column content -->
      <div class="col col-copy col-12 col-md-10 col-lg-9 col-xl-8 py-2">
        <div class="col-inside col-inside-copy w-100">
          <div class="d-flex flex-column flex-column-wrap">
            <div class="buttons">

              <a class="btn btn-secondary btn-xl" href="/book-discovery-call/" data-g-action="" data-g-label="">Book a discovery call and get started</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
