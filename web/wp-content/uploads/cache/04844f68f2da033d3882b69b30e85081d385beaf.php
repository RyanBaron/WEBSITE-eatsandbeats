<?php $__env->startSection('content'); ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

    </div>
    <?php echo get_search_form(false); ?>

  <?php endif; ?>

  <div class="container pb-5 blog-feature-content">
    <?php
    $post_primary_feature_id = \App\post_primary_feature_id();
    ?>
    <?php if( $post_primary_feature_id ): ?>
      <div class="row flex-row justify-content-center">
        <div class="col col-feature-primary col-12">
          <?php echo $__env->make('partials.content-post-feature-primary', array('post_id' => $post_primary_feature_id), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php
    $post_secondary_feature_ids = \App\post_secondary_feature_ids();
    ?>
    <?php if(3 == (count($post_secondary_feature_ids))): ?>
      <header class="header-content pt-4 pb-2">
        <div class="row">
          <div class="col-12 col-md-6">
            <h3 class="headline headline-header">Popular Posts</h3>
          </div>
        </div>
      </header>
      <div class="row flex-row justify-content-center">
        <?php $__currentLoopData = $post_secondary_feature_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col col-feature-secondary col-12 col-sm-10 col-md-4">
            <?php echo $__env->make('partials.content-post-feature-secondary', array('post_id' => $post_id) , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="bg-lighter blog-feed-content py-6">
    <div class="container">
      <header class="header-content py-6">
        <div class="row">
          <div class="col-12 col-md-6">
            <h3 class="headline headline-header">All Posts</h3>
          </div>
        </div>
      </header>
      <div class="row flex-row justify-content-center">
        <div class="col col-articles col-12 col-xxl-12">
          <?php
            $cnt = 1;
          ?>
          <?php while(have_posts()): ?> <?php the_post() ?>
            <?php echo $__env->make('partials.content-post-feed-condensed', array('cnt' => $cnt), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php
              $cnt++;
            ?>
          <?php endwhile; ?>

          <div id="more-posts">
            <div id="ajax-posts"></div>
            <div id="more-empty" class="d-none">Sorry, there are no more posts.</div>
            <div id="more-load" class="text-center pt-10 pb-4">
              <a href="javascript:void(0)" data-load-posts="all" class="btn btn-outline-dark icon-after">See More Posts <i class="fal fa-arrow-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(true); ?>

<?php echo $__env->make('layouts.app-blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>