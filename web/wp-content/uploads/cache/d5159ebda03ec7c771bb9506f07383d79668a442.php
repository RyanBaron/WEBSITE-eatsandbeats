<?php
$links      = get_sub_field('card_link_items') ?: array();
$link = isset($links[0]) && ! empty($links[0]) ? $links[0] : array();
?>

<?php if( !empty( $link ) ): ?>
  </a>
<?php endif; ?>
