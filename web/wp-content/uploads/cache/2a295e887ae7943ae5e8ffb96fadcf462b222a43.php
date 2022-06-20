<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- ADD: GTM No Script Tag -->
  <?php if ($__env->exists('head.favicon')) echo $__env->make('head.favicon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- END ADD: GTM No Script Tag -->

  <?php
  $disable_gtm = isset($_GET["disable_gtm"]) && 'true' == $_GET["disable_gtm"] ? true : false;
  ?>

  <?php if( ! $disable_gtm ): ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WHRVN7Z');</script>
    <!-- End Google Tag Manager -->
  <?php endif; ?>

  <style type="text/css">
    body {
      animation: fadeSiteIn 0.75s linear;
    }

    @keyframes  fadeSiteIn {
      0% { opacity: 0; }
      60% { opacity: 0; }
      80% { opacity: 0.3; }
      100% { opacity: 1; }
    }
  </style>

  <?php wp_head() ?>

  <!-- <link rel="icon" type="image/x-icon" href="<?= App\asset_path('images/favicon.ico'); ?>" /> -->

</head>
