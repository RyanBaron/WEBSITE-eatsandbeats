@php
$title = $desc = get_field('resource_archive_title', 'options');
$desc = get_field('resource_archive_desc', 'options');
@endphp

<section id="" data-section-id="gsshye" data-section="main" class="pt-10 pb-4 pt-md-12 text-left">
  <div class="container pt-4" data-section-container-main="gsshye">
    <div data-section-row-main="gsshye" class="row flex-row justify-content-start taxonomy-header-row">
      <!-- start: text column content -->
      <div class="col col-copy col-12 col-md-8 py-2">
        <div class="col-inside col-inside-copy w-100">
          <h1 class="headline headline-col headline-col-copy">
            {!! $title !!}
          </h1>
          <div class="d-flex flex-column flex-column-wrap">
            <div class="text text-col text-col-copy order-first">
              {!! $desc !!}
            </div>
          </div>
        </div>
      </div>
      <!-- end: text column content -->
    </div>
  </div>

  @includeIf('partials.resource-taxonomy-nav')
</section>
