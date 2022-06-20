<section id="" data-section-id="ywavkq" data-section="main" class="pt-10 pt-md-10 text-left hl-xs bg-dark">

  @if( ! is_single() )
    <div class="container" data-section-container-main="ywavkq">
      <div data-section-row-main="ywavkq" class="row flex-row justify-content-start taxonomy-header-row">
        <!-- start: text column content -->
        <div class="col col-copy col-12 col-md-8 py-2">
          <div class="col-inside col-inside-copy w-100">
            <h1 class="headline headline-col headline-col-copy">
              {!! __("Insights, Ideas, and Inspiration", "sage") !!}
            </h1>

            @php /*
            <div class="d-flex flex-column flex-column-wrap">
              <div class="text text-col text-col-copy order-first">
                <p class="text-medium">{ !! __("Ideas, inspiration, & thoughts for growing&nbsp;nonprofits.", "sage") !! }</p>
              </div>
            </div>
            */ @endphp
          </div>
        </div>
        <!-- end: text column content -->
      </div>
    </div>
  @endif

  @includeIf('partials.taxonomy-nav')
</section>
