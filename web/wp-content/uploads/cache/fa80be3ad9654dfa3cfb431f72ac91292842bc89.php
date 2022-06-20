<!doctype html>
<html <?php echo get_language_attributes(); ?>>
  <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <body <?php body_class() ?>>

    <!-- ADD: GTM No Script Tag -->
    <?php if ($__env->exists('partials.gtm-noscript')) echo $__env->make('partials.gtm-noscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- END ADD: GTM No Script Tag -->

    <?php do_action('get_header') ?>
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrap container-fluid" role="document">
      <div class="row">
        <div class="content w-100">
          <main class="main">
            <?php echo $__env->yieldContent('content'); ?>
          </main>
        </div>
      </div>
    </div>
    <?php do_action('get_footer') ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if ($__env->exists('partials.modal.get-started-takover')) echo $__env->make('partials.modal.get-started-takover', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if ($__env->exists('partials.modal.contact-takover')) echo $__env->make('partials.modal.contact-takover', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php wp_footer() ?>
  </body>
</html>
