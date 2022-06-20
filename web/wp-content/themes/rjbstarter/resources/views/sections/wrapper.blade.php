@php
$default_section_padding = \App\get_global_option('default_section_padding') ?: array();
$default_section_margin  = \App\get_global_option('default_section_margin') ?: array();
$sections = get_field('sections') ?: array();

$style       = '';
$randId      = \App\getRandId(6);
$id          = get_field('section_id') ?: '';
$class       = get_field('section_class') ?: array();
$class       = \App\sanatize_class_depth($class);
$hl_size     = get_field('headline_size') ?: array();
$hl_size     = \App\sanatize_class_depth($hl_size);
$hl_color    = get_field('section_headline_color') ?: '';
$hl_color     = \App\sanatize_class_depth($hl_color);

$gutters     = get_field('section_col_gutters') ?: array();
$gutters     = \App\sanatize_class_depth($gutters);

$min_height  = get_field('min_height') ?: array();
$min_height  = \App\sanatize_class_depth($min_height);
$padding     = get_field('padding') ?: $default_section_padding;
$padding     = \App\sanatize_class_depth($padding);
$margin      = get_field('margin') ?: $default_section_margin;
$margin      = \App\sanatize_class_depth($margin);
$text_align  = get_field('section_text_align') ?: array();
$text_align  = \App\sanatize_class_depth($text_align);
$row_justify = get_field('row_justify_section') ?: array();
$row_justify = \App\sanatize_class_depth($row_justify);
$row_align   = get_field('row_align_section') ?: array();
$row_align   = \App\sanatize_class_depth($row_align);
$context     = get_field('section_context', '');
$context     = \App\sanatize_class_depth($context);

// Section Background
// ToDo: Move this functionality to a helper function.
$bg_fade            = array();
$bg_fade[]          = get_field('bg_fade_top');
$bg_fade[]          = get_field('bg_fade_bottom');
$bg_fade_class      = \App\sanatize_class_depth($bg_fade);
$bg_pattern  = get_field('background_pattern') ?: '';
$bg_pattern  = ! empty($bg_pattern) ? \App\sanatize_class_depth($bg_pattern) : '';
$bg_img      = get_field('section_bg_image') ?: '';
$bg_img_url  = isset($bg_img['url']) ? $bg_img['url'] : '';
$bg_img_opts = get_field('section_bg_image_options') ?: '';
$bg_img_opts = ! empty($bg_img_opts) ? \App\sanatize_class_depth($bg_img_opts) : '';
$sec_bg      = get_field('section_bg') ?: '';
$bg_cust     = ('custom' == $sec_bg) ? get_field('section_bg_custom') : '';
$bg_video    = get_field('section_bg_video') ?: '';
$bg_video    = isset($bg_video['url']) ? $bg_video['url'] : '';
$sec_bg      = ! empty($sec_bg) ? \App\sanatize_class_depth($sec_bg) : '';
$vid_opts    = get_field('section_bg_video_options') ?: '';
$vid_opts    = ! empty($sec_bg) ? \App\sanatize_class_depth($vid_opts) : '';

// Section Row Background
$section_row_bg = get_field('section_row_bg') ?: '';
$section_row_bg = ! empty($section_row_bg) ? \App\sanatize_class_depth($section_row_bg) : '';

////
// Gated Content
////
$gated_resource_name = get_field('col_gated_resource_name') ?: '';
//$gated_resource_name_stripped = preg_replace("/[\W_]+/u", '', $gated_resource_name);
//$gated_resource_name_stripped = preg_replace("/[^a-z]/",'',$gated_resource_name);

$gated_resource_name = ! empty($gated_resource_name) ? 'data-resource-name="'.$gated_resource_name.'"' : '';
$gated_vimeo_video_id = get_field('col_gated_resource_vimeo_id') ?: '';
$gated_vimeo_video_id = ! empty($gated_vimeo_video_id) ? 'data-resource-vid="'.$gated_vimeo_video_id.'"' : '';
$gated_pdf_url = get_field('col_gated_resource_pdf_url') ?: '';
$gated_pdf_url = ! empty($gated_pdf_url) ? 'data-resource-pdf-url="'.$gated_pdf_url.'"' : '';
$gated_resource_type = get_field('col_gated_resource_type') ?: '';
$gated_resource_type = ! empty($gated_resource_type) ? 'data-resource-request-type="'.$gated_resource_type.'"' : '';

$gated_form_id = get_field('col_gated_mkto_form_id') ?: '';
$sec_data_gated_form_id = '';
if($gated_form_id) $sec_data_gated_form_id = 'data-mkto-gated-section="'.$gated_form_id.'"';

$gated_form_success_replace = get_field('gated_form_success_replace') ?: '';
$gated_form_header_align = get_field('gated_form_header_align') ?: array();
$gated_form_header_align = ! empty($gated_form_header_align) ? \App\sanatize_class_depth($gated_form_header_align) : '';
$gated_form_button_style = get_field('gated_form_button_style') ?: array();
$gated_form_button_style = ! empty($gated_form_button_style) ? \App\sanatize_class_depth($gated_form_button_style) : '';

$gated_form_display_initial = get_field('col_gated_mkto_form_display_initial') ?: '';
$gated_form_display_class = ! empty($gated_form_display_initial) ? \App\sanatize_class_depth($gated_form_display_initial) : '';


// Headline content
$htag         = get_field('gated_form_headline_tag') ?: 'h2';
$style        = get_field('gated_form_headline_style');
$sup_headline = get_field('gated_form_superheadline');
$headline     = get_field('gated_form_headline');
$sub_headline = get_field('gated_form_subheadline');

// Text content
$text         = get_field('gated_form_text');

// Footer content classes
$class_headline = \App\sanatize_class_depth(array('headline','headline-col', 'headline-col-gated', $style));
$class_text     = \App\sanatize_class_depth(array('text', 'text-col', 'gated-col', 'order-first'));

$args_headline = array(
  'superheadline' => $sup_headline,
  'headline'      => $headline,
  'subheadline'   => $sub_headline,
  'tag'           => $htag,
  'class'         => $class_headline
);

$args_text = array(
  'text'  => $text,
  'class' => $class_text
);

$pre_headline_figure = isset($pre_headline_figure) && is_array($pre_headline_figure) ? $pre_headline_figure : array();
$pre_headline_figure['class'][] = get_field('gated_form_pre_headline_image_width') ?: 'w-100';
$pre_headline_figure['class'][] = 'headline-figure';
$pre_headline_figure['class'][] = 'pre-headline-figure';

$default_style = array('image', 'img-fluid', 'figure-img', 'headline-img');
$img_classes = array_merge($default_style, array());

$pre_headline_image = array(
  'id' => get_field('gated_form_pre_headline_image') ?: '',
  'size' => get_field('gated_form_pre_headline_image_size') ?: 'full',
  'class' => $img_classes,
);

$post_headline_figure = isset($post_headline_figure) && is_array($post_headline_figure) ? $post_headline_figure : array();
$post_headline_figure['class'][] = get_field('gated_form_post_headline_image_width') ?: 'w-100';
$post_headline_figure['class'][] = 'headline-figure';
$post_headline_figure['class'][] = 'post-headline-figure';
$post_headline_image = array(
  'id' => get_field('gated_form_post_headline_image') ?: '',
  'size' => get_field('gated_form_post_headline_image_size') ?: 'full',
  'class' => $img_classes,
);

if( ! empty($bg_cust) ) {
  $style = 'background-color: ' . $bg_cust . ';';
}

if( ! empty($bg_img_url) ) {
  $style = 'background-image:url(' . $bg_img_url . ');';
}

if( !empty( $style ) ) {
  $style = 'style="'.$style.'"';
}

$gated_data_ty = '';
$gated_section_class = '';
if( in_array('gated', $sections ) ) {
  $gated_section_class = 'gated-section';

  /**
   * ToDo: Temprarily putting all thank you text in the dom for js access on success.  Find a better solution, maybe
   *       an additional ajax call on success to the wp api or a custom wp ajax function (using a blade.php template)
   */
  $gated_resource_ty_superheadline = get_field('col_gated_resource_ty_superheadline') ?: '';
  $gated_resource_ty_superheadline = ! empty($gated_resource_ty_superheadline) ? 'data-resource-ty-super="'. esc_html($gated_resource_ty_superheadline) .'"' : '';
  $gated_resource_ty_headline = get_field('col_gated_resource_ty_headline') ?: '';
  $gated_resource_ty_headline = ! empty($gated_resource_ty_headline) ? 'data-resource-ty-headline="'. esc_html($gated_resource_ty_headline) .'"' : '';
  $gated_resource_ty_subheadline = get_field('col_gated_resource_ty_subheadline') ?: '';
  $gated_resource_ty_subheadline = ! empty($gated_resource_ty_subheadline) ? 'data-resource-ty-sub="'. esc_html($gated_resource_ty_subheadline).'"' : '';
  $gated_resource_ty_text = get_field('col_gated_resource_ty_text') ?: '';
  $gated_resource_ty_text = ! empty($gated_resource_ty_text) ? 'data-resource-ty-text="'. esc_html($gated_resource_ty_text) .'"' : '';

  $gated_resource_ty_resource_image = get_field('col_gated_resource_ty_resource_image') ?: array();
  $gated_resource_ty_resource_image_url  = isset($gated_resource_ty_resource_image['url']) ? $gated_resource_ty_resource_image['url'] : '';
  $gated_resource_ty_resource_image_data = ! empty($gated_resource_ty_resource_image_url) ? 'data-resource-ty-resource-img="'. esc_html($gated_resource_ty_resource_image_url) .'"' : '';

  $gated_resource_ty_resource_superheadline = get_field('col_gated_resource_ty_resource_superheadline') ?: '';
  $gated_resource_ty_resource_superheadline = ! empty($gated_resource_ty_resource_superheadline) ? 'data-resource-ty-resource-super="'. esc_html($gated_resource_ty_resource_superheadline) .'"' : '';
  $gated_resource_ty_resource_headline = get_field('col_gated_resource_ty_resource_headline') ?: '';
  $gated_resource_ty_resource_headline = ! empty($gated_resource_ty_resource_headline) ? 'data-resource-ty-resource-headline="'. esc_html($gated_resource_ty_resource_headline) .'"' : '';
  $gated_resource_ty_resource_subheadline = get_field('col_gated_resource_ty_resource_subheadline') ?: '';
  $gated_resource_ty_resource_subheadline = ! empty($gated_resource_ty_resource_subheadline) ? 'data-resource-ty-resource-sub="'. esc_html($gated_resource_ty_resource_subheadline) .'"' : '';
  $gated_resource_ty_resource_text = get_field('col_gated_resource_ty_resource_text') ?: '';
  $gated_resource_ty_resource_text = ! empty($gated_resource_ty_resource_text) ? 'data-resource-ty-resource-text="'. esc_html($gated_resource_ty_resource_text) .'"' : '';
  $gated_resource_ty_resource_link = get_field('col_gated_resource_ty_resource_link') ?: array();
  $gated_resource_ty_resource_link_title = isset($gated_resource_ty_resource_link['title']) ? $gated_resource_ty_resource_link['title'] : '';
  $gated_resource_ty_resource_link_title = ! empty($gated_resource_ty_resource_link_title) ? 'data-resource-ty-resource-link-title="'. esc_html($gated_resource_ty_resource_link_title) .'"' : '';
  $gated_resource_ty_resource_link_url = isset($gated_resource_ty_resource_link['url']) ? $gated_resource_ty_resource_link['url'] : '';
  $gated_resource_ty_resource_link_url = ! empty($gated_resource_ty_resource_link_url) ? 'data-resource-ty-resource-link-url="'. esc_html($gated_resource_ty_resource_link_url) .'"' : '';
  $gated_resource_ty_resource_link_target = isset($gated_resource_ty_resource_link['target']) ? $gated_resource_ty_resource_link['target'] : '';
  $gated_resource_ty_resource_link_target = ! empty($gated_resource_ty_resource_link_target) ? 'data-resource-ty-resource-link-target="'. esc_html($gated_resource_ty_resource_link_target) .'"' : '';

  $gated_data_ty .= ! empty( $gated_resource_ty_superheadline ) ? ' ' . $gated_resource_ty_superheadline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_headline ) ? ' ' . $gated_resource_ty_headline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_subheadline ) ? ' ' . $gated_resource_ty_subheadline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_text ) ? ' ' . $gated_resource_ty_text : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_image_data ) ? ' ' . $gated_resource_ty_resource_image_data : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_superheadline ) ? ' ' . $gated_resource_ty_resource_superheadline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_headline ) ? ' ' . $gated_resource_ty_resource_headline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_subheadline ) ? ' ' . $gated_resource_ty_resource_subheadline : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_text ) ? ' ' . $gated_resource_ty_resource_text : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_link_target ) ? ' ' . $gated_resource_ty_resource_link_target : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_link_title ) ? ' ' . $gated_resource_ty_resource_link_title : '';
  $gated_data_ty .= ! empty( $gated_resource_ty_resource_link_url ) ? ' ' . $gated_resource_ty_resource_link_url : '';
}
@endphp

<section id="{{ $id }}" data-section-id="{{$randId}}" {!!$sec_data_gated_form_id!!} data-section="main" class="{!! $class !!} {!! $bg_pattern !!} {{$gated_section_class}} {!! $padding !!} {!! $margin !!} {{ $hl_size }} {!! $sec_bg !!} {!! $text_align !!} {!! $bg_img_opts !!} {!! $hl_color !!} {!! $bg_fade_class !!}" {!! $style !!}>

  @if($bg_video)
    <div class="section-bg-video">
      <video autoplay muted {!! $vid_opts !!}>
        <source src="{{ $bg_video }}" type="video/mp4">
      </video>
    </div>
  @endif
  @includeIf('sections.header.section-header', array('context' => $context, 'source' => 'section-header'))

  <div class="container" data-section-container-main="{{$randId}}">
    <div data-section-row-main="{{$randId}}" class="row flex-row {!! $row_justify !!} {!! $row_align !!} {!! $min_height !!} {!! $gutters !!} {!! $section_row_bg !!}">
      @yield('content_cols')
    </div>
  </div>

  @includeIf('sections.footer.section-footer', array('context' => $context, 'source' => 'section-footer'))

  @if (in_array('gated', $sections ))
    <div data-section-gated-form-main="{{$randId}}" id="show-{{$gated_form_id}}" class="gated-asset-form-wrapper {{ $gated_form_display_class }}" data-gated-asset-form-wrapper>
      <div class="gated-asset-form-inside">
        <div class="container">
          <div class="row flex-row justify-content-center align-items-center gated-form-row">
            <div class="col-11 col-md-10 col-lg-9 col-xl-8 col-xxxl-7">
              <div class="col-inside-gated-form bg-lighter p-3 p-md-4">
                <header class="form-header form-header-gated pb-3 {!! $gated_form_header_align !!}">
                  @includeIf('elements.figure', array('context' => $context, 'figure' => $pre_headline_figure, 'image' => $pre_headline_image))

                  @if( ! empty( $headline ) )
                    @includeIf('elements.headline', array('context' => $context, 'args' => $args_headline))
                  @endif

                  @includeIf('elements.figure', array('context' => $context, 'figure' => $post_headline_figure, 'image' => $post_headline_image))

                  @if( ! empty( $text ) || have_rows('col_copy_one_list_items') || have_rows('col_copy_one_quote_items') || have_rows('col_copy_one_link_items') )
                    <div class="d-flex flex-column flex-column-wrap">

                      @if( ! empty( $text ) )
                        @includeIf('elements.text', array('context' => $context, 'args' => $args_text))
                      @endif

                    </div>
                  @endif

                </header>
                <div class="gated-form-wrapper" {!! $gated_data_ty !!}>
                  <form id="mktoForm_{{$gated_form_id}}" data-mkto-gated-form="{{$gated_form_id}}" data-mkto-gated-success-replace="{{$gated_form_success_replace}}" class="gated-asset form-md-two-col {!! $gated_form_button_style !!}" {!! $gated_resource_name !!} {!! $gated_vimeo_video_id !!} {!! $gated_pdf_url !!} {!! $gated_resource_type !!}></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

</section>
