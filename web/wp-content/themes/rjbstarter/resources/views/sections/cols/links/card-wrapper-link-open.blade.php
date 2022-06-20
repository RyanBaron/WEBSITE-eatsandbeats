@php
$links      = get_sub_field('card_link_items') ?: array();
$link = isset($links[0]) && ! empty($links[0]['card_link']) ? $links[0]['card_link'] : array();
$link_modal = get_sub_field('link_modal') ?: '';

//$url = isset($link['card_link']['url']) ? $link['card_link']['url'] : '';
//$target = isset($link['card_link']['target']) ? $link['card_link']['target'] : '';

$args = array(
  'link_modal' => $link_modal,
  'data' => array(
    'g_action' => isset($link['card_data_g_action']) ? $link['card_data_g_action'] : '',
    'g_label'  => isset($link['card_data_g_label']) ? $link['card_data_g_label'] : '',
  ),
);
@endphp

{!! App::card_wrapper_link_open(
  $link,
  $args
) !!}
