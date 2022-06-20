<?php if( $link ): ?>

  <?php
    $args['link_options'] = isset( $link_options) ? $link_options : array();
    $args['wrapper_link'] = isset($wrapper_link) ? $wrapper_link : false;
    $args['link_modal'] = isset( $link_modal) ? $link_modal : array();
    $args['link_style'] = isset( $link_style) ? $link_style : array();
    $args['button']['style'] = isset( $button['style'] ) ? $button['style'] : '';
    $args['button']['size'] = isset( $button['size'] ) ? $button['size'] : '';
    $args['text']['style'] = isset( $text['style'] ) ? $text['style'] : '';
    $args['text']['size'] = isset( $text['size'] ) ? $text['size'] : '';
    $args['font']['weight'] = isset( $font_weight ) ? $font_weight : '';
    $args['icon']['class'] = isset( $icon['class'] ) ? $icon['class'] : '';
    $args['icon']['style'] = isset( $icon['style'] ) ? $icon['style'] : '';
    $args['icon']['position'] = isset( $icon['position'] ) ? $icon['position'] : '';
    $args['data']['g_action'] = isset( $data['g_action'] ) ? $data['g_action'] : '';
    $args['data']['g_label'] = isset( $data['g_label'] ) ? $data['g_label'] : '';
  ?>

  <?php echo App::button(
    $link,
    $args
  ); ?>


<?php endif; ?>
