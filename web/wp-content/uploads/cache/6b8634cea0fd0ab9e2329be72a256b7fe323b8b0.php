<?php
$disable_gtm = isset($_GET["disable_gtm"]) && 'true' == $_GET["disable_gtm"] ? true : false;
?>

<?php if( ! $disable_gtm ): ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHRVN7Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
