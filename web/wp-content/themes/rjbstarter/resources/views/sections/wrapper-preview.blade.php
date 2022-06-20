@php
$style       = '';
$id          = get_field('section_id') ?: '';
$class       = get_field('section_class') ?: '';
$class       = \App\sanatize_class_depth($class);
$hl_size     = get_field('headline_size') ?: '';
$hl_size     = \App\sanatize_class_depth($hl_size);
$padding     = get_field('padding') ?: '';
$padding     = \App\sanatize_class_depth($padding);
$margin      = get_field('margin') ?: '';
$margin      = \App\sanatize_class_depth($margin);
$text_align  = get_field('section_text_align') ?: '';
$text_align  = \App\sanatize_class_depth($text_align);
$row_justify = get_field('row_justify_section') ?: '';
$row_justify = \App\sanatize_class_depth($row_justify);
$row_align   = get_field('row_align_section') ?: '';
$row_align   = \App\sanatize_class_depth($row_align);
$context     = get_field('section_context', '');
$context     = \App\sanatize_class_depth($context);

// Section Background
// ToDo: Move this functionality to a helper function.
$sec_bg  = get_field('section_bg') ?: '';
$bg_cust = ('custom' == $sec_bg) ? get_field('section_bg_custom') : '';
$sec_bg  = ! empty($sec_bg) ? \App\sanatize_class_depth($sec_bg) : '';
if( ! empty($bg_cust) ) {
  $style = 'background-color: ' . $bg_cust . ';';
}
@endphp

@if(is_user_logged_in())
  <!-- Section Preview: Only visible to logged in users -->
    <section id="{{ $id }}" class="{!! $class !!} {!! $padding !!} {!! $margin !!} {{ $hl_size }} {!! $sec_bg !!} {!! $text_align !!}" {!! $style !!}>

      @includeIf('sections.partial.section-header', array('context' => array($context), 'source' => 'section-header'))

      <div class="container">
        <div class="row flex-row {!! $row_justify !!} {!! $row_align !!}">
          @yield('content_cols')
        </div>
      </div>

      @includeIf('sections.partial.section-footer', array('context' => array($context), 'source' => 'section-footer'))

    </section>
  <!-- Section Preview: Only visible to logged in users -->
@endif
