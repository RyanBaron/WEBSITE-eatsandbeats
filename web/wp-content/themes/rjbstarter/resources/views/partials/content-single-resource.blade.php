<article @php post_class('resource-article') @endphp>
  <div class="entry-content resource-body">
    @php the_content() @endphp
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
