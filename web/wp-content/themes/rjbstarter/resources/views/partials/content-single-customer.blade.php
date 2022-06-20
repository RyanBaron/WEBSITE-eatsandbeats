<article @php post_class('case-study-article') @endphp>

    <div class="entry-content customer-body">
      @php the_content() @endphp
    </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
