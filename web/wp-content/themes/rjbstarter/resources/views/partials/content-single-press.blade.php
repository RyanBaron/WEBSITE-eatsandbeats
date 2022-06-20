
<article @php post_class('pt-10 pb-6 pt-md-12 pb-md-8 hl-sm') @endphp>

  @includeIf('partials.page-header-single-press')

  <div class="container">
    <div class="row flex-row justify-content-center">
      <div class="col col-articles col-12 col-md-9 col-lg-8 col-xxl-7">

        <div class="entry-content article-body">
          @php the_content() @endphp

          @includeIf('sections.footer.single-press-footer')

        </div>

      </div>
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
