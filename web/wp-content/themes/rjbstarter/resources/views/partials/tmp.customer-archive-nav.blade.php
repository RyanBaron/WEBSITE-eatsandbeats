<div id="subNavRow" class="row flex-row subnav-row justify-content-start mt-0 mt-lg-1 d-none d-lg-flex">
  <div class="col">
    @if (has_nav_menu('customer_category_navigation'))
      <nav class="navbar navbar-expand-lg justify-content-between d-flex w-100 p-0">
        <div class="navbar-category-customer" id="customerCategoryNavigation">
          <div class="ml-auto">
            @if (has_nav_menu('customer_category_navigation'))
              {!! wp_nav_menu($customercategorymenu) !!}
            @endif
          </div>
        </div>
      </nav>
    @endif
  </div>
</div>
