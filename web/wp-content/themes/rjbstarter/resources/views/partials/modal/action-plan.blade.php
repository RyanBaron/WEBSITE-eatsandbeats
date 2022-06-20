@php
$headline = get_field('contact_takeover_content_headline', 'options') ?: '';
$subheadline = get_field('contact_takeover_content_subheadline', 'options') ?: '';
$copy = get_field('contact_takeover_content_copy', 'options') ?: '';
$bg_img_class = get_field('contact_takeover_bg_class', 'options') ?: '';
$bg_img_class = ! empty($bg_img_class) ? \App\sanatize_class_depth($bg_img_class) : '';
$bg_img       = get_field('contact_takeover_bg_image', 'options') ?: array();
$bg_img_opts  = get_field('contact_takeover_bg_image_options', 'options') ?: array();
$bg_img_url   = isset($bg_img['url']) ? $bg_img['url'] : '';
$bg_img_opts  = ! empty($bg_img_opts) ? \App\sanatize_class_depth($bg_img_opts) : '';
$style = '';
if( ! empty($bg_img_url) ) {
$style = 'background-image:url(' . $bg_img_url . ');';
}
if( !empty( $style ) ) {
$style = 'style="'.$style.'"';
}
@endphp

<section id="action-plan-takeover" class="bg-lighter get-started-takeover action-plan-takeover page-takeover d-flex flex-column justify-content-center align-items-center {!! $bg_img_class !!} {!! $bg_img_opts !!}" tabindex="-1" role="dialog" aria-labelledby="actionPlanModal" aria-hidden="true" {!! $style !!}>
  <div class="get-started-takover-inside page-takeover-inside h-100 d-flex align-items-center flex-wrap">
    <div class="container container-main-content py-2">
      <div class="row flex-row text-right justify-content-center gutter-xxl mb-4">
        <div class="col col-12 col-lg-12"><a class="close takeover-close" href="#get-started"><i class="fal fa-times"></i></a></div>
      </div>

      <div data-section-row-main="mmpwzq" class="row flex-row justify-content-center align-items-start py-4 bg-white">
        <div class="col col-12 col-md-10 col-lg-8 col-xxl-7">
          @php gravity_form( 3, true, true, false, '', true, 200 ); @endphp
        </div>
      </div>

    </div>
  </div>
</section>
