<?php

namespace App;

use WP_Query;

class Ajax
{
  public function __construct()
  {
    add_action('wp_ajax_get_more_customers', [$this, 'getMoreCustomers']);
    add_action('wp_ajax_nopriv_get_more_customers', [$this, 'getMoreCustomers']);

    add_action('wp_ajax_get_more_resources', [$this, 'getMoreResources']);
    add_action('wp_ajax_nopriv_get_more_resources', [$this, 'getMoreResources']);

    add_action('wp_ajax_get_more_press', [$this, 'getMorePress']);
    add_action('wp_ajax_nopriv_get_more_press', [$this, 'getMorePress']);

    add_action('wp_ajax_get_more_posts', [$this, 'getMorePosts']);
    add_action('wp_ajax_nopriv_get_more_posts', [$this, 'getMorePosts']);

    /*
    add_action('wp_ajax_get_more_category_posts', [$this, 'getMoreCategoryPosts']);
    add_action('wp_ajax_nopriv_get_more_category_posts', [$this, 'getMoreCategoryPosts']);
    */

    add_action('wp_ajax_nopriv_privacy_data_access_ccpa', [$this, 'getDataAccessCcpa'] );
    add_action('wp_ajax_privacy_data_access_ccpa', [$this, 'getDataAccessCcpa'] );

    add_action('wp_ajax_nopriv_privacy_data_access_gdpr', [$this, 'getDataAccessGdpr'] );
    add_action('wp_ajax_privacy_data_access_gdpr', [$this, 'getDataAccessGdpr'] );

    add_action('wp_ajax_nopriv_open_modal_contact_legal', [$this, 'openModalContactLegal'] );
    add_action('wp_ajax_open_modal_contact_legal', [$this, 'openModalContactLegal'] );

    add_action('wp_ajax_nopriv_contact_legal', [$this, 'submitContactLegal'] );
    add_action('wp_ajax_contact_legal', [$this, 'submitContactLegal'] );

  }

  public function getMorePosts()
  {
    //check_ajax_referer( 'ajax_nonce', 'security' );  // ajax_nonce from setup.php
    $ret = array(
      'success' => false,
      'data'    => '',
    );

    $tax_query = array();

    $paged = isset( $_POST['page'] ) ? $_POST['page'] : 2; // default to 2, assumes "page 1" was displayed on page render.
    $category_id = isset( $_POST['category_id'] ) ? intval($_POST['category_id']) : 0;

    //////
    // ToDo: figure out a better way to combine the primary and secondary feature ids into a singele array for exclusions.
    //////
    if( $category_id ) :
      $featured_ids = \App\get_category_secondary_sticky_post_ids($category_id);
      $featured_primary = \App\get_category_primary_sticky_post_id($category_id);
    else :
      $featured_primary = \App\post_primary_feature_id();
      $featured_ids = \App\post_secondary_feature_ids();
    endif;

    if( is_array( $featured_ids ) ) {
      $featured_ids[] = $featured_primary;
    }

    $paged = $_POST['page'];
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'post__not_in' => $featured_ids,
      'posts_per_page' => '10',
      'paged' => $paged,
    );

    if( $category_id ) {
      $tax_query = array(
        array(
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $category_id, /// Where term_id of Term 1 is "1".
          'include_children' => false,
        )
      );

      $args['tax_query'] = $tax_query;
    }

    ob_start();
      $blog_posts = new WP_Query( $args );

      if ( $blog_posts->have_posts() ) : ?>
        <div class="row flex-row justify-content-center gutter-xl">
          <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <?php
            $post_categories = \App\post_category_list();
            $read_time = \App\read_time();
            $post_image = \App\post_image('', 'landscape_sm', array('class' => 'rounded'));

            $g_action_prefix = 'click';
            $g_label_prefix = 'blog';
            $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
            $g_data = \App\get_post_data_attributes('', $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
            $col_content = 'col col-text col-12 col-lg-11 col-xl-10  order-last';
            ?>

            <div class="col col-12 col-sm-10 col-md-10">
              <a href="<?php the_permalink(); ?>" class="wrapper-link" <?php echo $g_data; ?>>
                <article class="article-feed-item py-3 py-4 hl-xs post type-post status-publish format-standard has-post-thumbnail hentry category-other">
                  <div class="row flex-row justify-content-center">
                    <?php if(!empty($post_image)) : ?>
                      <div class="col col-image col-3 col-md-4 order-first">
                        <div class="col-inside col-image-inside w-100">
                          <figure class="figure figure-sidebar w-100 bg-offset-fade-primary bg-offset-fade-rounded">
                            <?php echo $post_image; ?>
                          </figure>
                        </div>
                      </div>
                      <?php $col_content = 'col col-text col-9 col-md-8 col-lg-7 col-xl-6 order-last'; ?>
                    <?php endif; ?>
                    <div class="<?php echo $col_content; ?>">
                      <div class="col-inside col-text-inside w-100">
                        <header class="entry-col">
                          <div class="pretails d-flex flex-row pb-1">
                            <div class="post-date w-100">
                              <?php echo get_the_date(); ?>
                            </div>
                          </div>
                          <h3 class="entry-title"><?php the_title(); ?></h3>
                        </header>
                        <div class="entry-col entry-summary">
                          <p><?php the_excerpt(); ?></p>
                          <div class="footer footer-buttons text-right">
                            <div class="btn btn-secondary btn-small">Read more <i class="fal fa-angle-double-right"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      <?php
      endif;

      $output = ob_get_clean();
    ob_end_clean();

    wp_send_json_success( $output );
    wp_die($ret);

  }

  /*
  public function getMoreCategoryPosts()
  {
    //check_ajax_referer( 'ajax_nonce', 'security' );  // ajax_nonce from setup.php
    $ret = array(
      'success' => false,
      'data'    => '',
    );

    $paged = $_POST['page'];
    $category_id = $_POST['category_id'];

    // Get the primary and secondary sticky posts from the category and exclude them from teh ajax return
    $primary = get_category_primary_sticky_post_id($category_id);
    $secondary = get_category_secondary_sticky_post_ids($category_id);
    $primary = is_array($primary) ? $primary : array($primary);
    $secondary = is_array($secondary) ? $secondary : array($secondary);

    $sticky = array_merge($primary, $secondary);
    rsort( $sticky ); // Sort the stickies with the newest ones at the top
    $sticky = array_slice( $sticky, 0, 4 ); // Slice out the first 4 sticky items (4 featured items)

    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'post__not_in' => $sticky,
      'ignore_sticky_posts' => 1,
      'posts_per_page' => '4',
      'paged' => $paged,
      'cat' => $category_id,
    );

    $sticky_count = count($sticky);
    if( $sticky_count >= 1 && $sticky_count < 4 ) :
      $sticky = array_slice( $sticky, 0, 1 ); // Slice out the first 4 sticky items (4 featured items)
    elseif( $sticky_count >= 4 ) :
      $sticky = array_slice( $sticky, 0, 4 ); // Slice out the first 4 sticky items (4 featured items)
    endif;

    ob_start();
      $blog_posts = new WP_Query( $args );
      if ( $blog_posts->have_posts() ) : ?>
        <div>
          <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <?php
            $post_categories = \App\post_category_list();
            $read_time = \App\read_time();
            $post_image = \App\post_image();
            $temp_id = get_the_ID();

            $g_action_prefix = 'click';
            $g_label_prefix = 'blog';
            $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
            $g_data = \App\get_post_data_attributes('', $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
            ?>
            <a href="<?php the_permalink(); ?>" class="wrapper-link" <?php echo $g_data; ?>>
              <article class="article-feed-item py-3 py-4 hl-xs post-1036 post type-post status-publish format-standard has-post-thumbnail hentry category-other">
                <div class="row flex-row justify-content-center">
                  <div class="col col-image col-3 col-md-3 col-xxl-2 order-last">
                    <div class="col-inside col-image-inside w-100">
                      <figure class="figure figure- w-100">
                        <?php echo $post_image; ?>
                      </figure>
                    </div>
                  </div>
                  <div class="col col-text col-9 col-md-9 col-xxl-10 order-first">
                    <div class="col-inside col-text-inside w-100">
                      <header class="entry-col">
                        <div class="pretails d-flex flex-row pb-2">
                          <div class="pretail-item pretail-categories"><?php echo $post_categories; ?></div>
                          <div class="pretail-item pretail-read-time"><?php echo $read_time; ?></div>
                        </div>
                        <h3 class="entry-title"><?php the_title(); ?></h3>
                      </header>
                      <div class="entry-col entry-summary">
                        <p><?php the_excerpt(); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </a>
          <?php endwhile; ?>
        </div>
      <?php endif;

      $output = ob_get_clean();
    ob_end_clean();

    wp_send_json_success($output);
    wp_die($ret);
  }
  */

  public function getMoreCustomers()
  {
    //check_ajax_referer( 'ajax_nonce', 'security' );  // ajax_nonce from setup.php
    $ret = array(
      'success' => false,
      'data'    => '',
    );

    $tax_query = array();

    $paged = isset( $_POST['page'] ) ? $_POST['page'] : 2; // default to 2, assumes "page 1" was displayed on page render.
    $taxonomy_id = isset( $_POST['taxonomy_id'] ) ? intval($_POST['taxonomy_id']) : 0;

    $customer_primary_feature = \App\get_featured_primary_cpt('customer', 'customer_category', $taxonomy_id);
    $customer_secondary_feature_ids = \App\get_featured_secondary_cpt('customer', 'customer_category', $taxonomy_id);
    $exclude = array_merge($customer_primary_feature, $customer_secondary_feature_ids);

    $args = array(
      'post_type' => 'customer',
      'post_status' => 'publish',
      'posts_per_page' => '10',
      'paged' => $paged,
      'post__not_in' => $exclude,
    );

    if( $taxonomy_id ) {
      $tax_query = array(
        array(
          'taxonomy' => 'customer_category',
          'field' => 'term_id',
          'terms' => $taxonomy_id, /// Where term_id of Term 1 is "1".
          'include_children' => false,
        )
      );

      $args['tax_query'] = $tax_query;
    }

    ob_start();
      $customer_posts = new WP_Query( $args );
      if ( $customer_posts->have_posts() ) : ?>
        <div class="row flex-row justify-content-center justify-content-md-start gutter-xl">
          <?php while ( $customer_posts->have_posts() ) : $customer_posts->the_post(); ?>
            <?php
            $post_categories = \App\post_category_list();
            $read_time = \App\read_time();
            $post_image = \App\post_image();
            $temp_id = get_the_ID();

            $g_action_prefix = 'click';
            $g_label_prefix = 'case study';
            $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
            $g_data = \App\get_post_data_attributes('', $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
            ?>
            <div class="col col-12 col-sm-10 col-md-6">
            <a href="<?php the_permalink(); ?>" class="wrapper-link" <?php echo $g_data; ?>>
              <article class="article-feed-item py-3 py-4 hl-xs post type-post status-publish format-standard has-post-thumbnail hentry category-other">
                <div class="row flex-row justify-content-center justify-content-md-between">
                  <div class="col col-image col-3 col-md-4 order-last">
                    <div class="col-inside col-image-inside w-100">
                      <figure class="figure figure- w-100">
                        <?php echo $post_image; ?>
                      </figure>
                    </div>
                  </div>
                  <div class="col col-text col-9 col-md-8 col-xl-7 order-first">
                    <div class="col-inside col-text-inside w-100">
                      <header class="entry-col">
                        <div class="pretails d-flex flex-row pb-1">
                          <div class="post-date w-100">
                            <?php echo get_the_date(); ?>
                          </div>
                        </div>
                        <h3 class="entry-title"><?php the_title(); ?></h3>
                      </header>
                      <?php /*
                      <div class="entry-col entry-summary">
                        <p><?php the_excerpt(); ?></p>
                      </div>
                      */ ?>
                    </div>
                  </div>
                </div>
              </article>
            </a>
          </div>
          <?php endwhile; ?>
        </div>
      <?php endif;

      $output = ob_get_clean();
    ob_end_clean();

    wp_send_json_success($output);
    wp_die($ret);
  }

  public function getMoreResources()
  {
    //check_ajax_referer( 'ajax_nonce', 'security' );  // ajax_nonce from setup.php
    $ret = array(
      'success' => false,
      'data'    => '',
    );

    $tax_query = array();

    $paged = isset( $_POST['page'] ) ? $_POST['page'] : 2; // default to 2, assumes "page 1" was displayed on page render.
    $taxonomy_id = isset( $_POST['taxonomy_id'] ) ? intval($_POST['taxonomy_id']) : 0;

    $resource_primary_feature = \App\get_featured_primary_cpt('resource', 'resource_type', $taxonomy_id);
    $resource_secondary_feature_ids = \App\get_featured_secondary_cpt('resource', 'resource_type', $taxonomy_id);
    $exclude = array_merge($resource_primary_feature, $resource_secondary_feature_ids);

    $args = array(
      'post_type' => 'resource',
      'post_status' => 'publish',
      'posts_per_page' => '10',
      'paged' => $paged,
      'post__not_in' => $exclude,
    );

    if( $taxonomy_id ) {
      $tax_query = array(
        array(
          'taxonomy' => 'resource_type',
          'field' => 'term_id',
          'terms' => $taxonomy_id, /// Where term_id of Term 1 is "1".
          'include_children' => false,
        )
      );

      $args['tax_query'] = $tax_query;
    }

    ob_start();
      $resource_posts = new WP_Query( $args );
      if ( $resource_posts->have_posts() ) : ?>
        <div class="row flex-row justify-content-center justify-content-md-start gutter-xl">
          <?php while ( $resource_posts->have_posts() ) : $resource_posts->the_post(); ?>
            <?php
            $read_time = \App\read_time();
            $post_image = \App\post_image();
            $temp_id = get_the_ID();
            /**
            * TODO: Find a better way to allow for user control, making it easier when categories are added in the future.
            */
            $post_categories = \App\resource_type_list($temp_id, 'text', array('filter' => array('webinars', 'videos', 'data-insights',)));

            $g_action_prefix = 'click';
            $g_label_prefix = 'case study';
            $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
            $g_data = \App\get_post_data_attributes('', $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
            ?>
            <div class="col col-12 col-sm-10 col-md-6">
            <a href="<?php the_permalink(); ?>" class="wrapper-link" <?php echo $g_data; ?>>
              <article class="article-feed-item py-3 py-4 hl-xs post type-post status-publish format-standard has-post-thumbnail hentry category-other">
                <div class="row flex-row justify-content-center justify-content-md-between">
                  <div class="col col-image col-3 col-md-4 order-last">
                    <div class="col-inside col-image-inside w-100">
                      <figure class="figure figure- w-100">
                        <?php echo $post_image; ?>
                      </figure>
                    </div>
                  </div>
                  <div class="col col-text col-9 col-md-8 col-xl-7 order-first">
                    <div class="col-inside col-text-inside w-100">
                      <header class="entry-col">
                        <div class="pretails d-flex flex-row pb-1">
                          <div class="pretail-item pretail-categories"><?php echo $post_categories; ?></div>
                        </div>
                        <h5 class="entry-title"><?php the_title(); ?></h5>
                      </header>
                      <div class="entry-col entry-summary">
                        <p><?php the_excerpt(); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </a>
          </div>
          <?php endwhile; ?>
        </div>
      <?php endif;

      $output = ob_get_clean();
    ob_end_clean();

    wp_send_json_success($output);
    wp_die($ret);
  }
  public function getMorePress()
  {
    //check_ajax_referer( 'ajax_nonce', 'security' );  // ajax_nonce from setup.php
    $ret = array(
      'success' => true,
      'data'    => 'test',
    );

    $tax_query = array();

    $paged = isset( $_POST['page'] ) ? $_POST['page'] : 2; // default to 2, assumes "page 1" was displayed on page render.
    $taxonomy_id = isset( $_POST['taxonomy_id'] ) ? intval($_POST['taxonomy_id']) : 0;

    // Disable, no "featured press release items"
    //$press_primary_feature = \App\get_featured_primary_cpt('press', 'press_category', $taxonomy_id);
    //$press_secondary_feature_ids = \App\get_featured_secondary_cpt('press', 'press_category', $taxonomy_id);
    //$exclude = array_merge($press_primary_feature, $press_secondary_feature_ids);

    $args = array(
      'post_type' => 'press',
      'post_status' => 'publish',
      'posts_per_page' => '10',
      'paged' => $paged,
      //'post__not_in' => $exclude,
    );

    if( $taxonomy_id ) {
      $tax_query = array(
        array(
          'taxonomy' => 'press_category',
          'field' => 'term_id',
          'terms' => $taxonomy_id, /// Where term_id of Term 1 is "1".
          'include_children' => false,
        )
      );

      $args['tax_query'] = $tax_query;
    }

    ob_start();
      $press_posts = new WP_Query( $args );
      if ( $press_posts->have_posts() ) : ?>
        <div class="row flex-row justify-content-center justify-content-md-start gutter-xl">
          <?php while ( $press_posts->have_posts() ) : $press_posts->the_post(); ?>
            <?php
            $read_time = \App\read_time();
            $post_image = \App\post_image();
            $temp_id = get_the_ID();
            $g_action_prefix = 'click';
            $g_label_prefix = 'press';
            $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'feed';
            $g_data = \App\get_post_data_attributes('', $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
            $col_content = 'col col-text col-12 order-first';
            ?>
            <div class="col col-12 col-sm-10 col-md-6">
            <a href="<?php the_permalink(); ?>" class="wrapper-link" <?php echo $g_data; ?>>
              <article class="article-feed-item py-3 py-4 hl-xxs post type-post status-publish format-standard has-post-thumbnail hentry category-other">
                <div class="row flex-row justify-content-center justify-content-md-between">
                  <?php if ( $post_image ) { ?>
                    <?php $col_content = 'col col-text col-9 col-md-8 col-xl-7 order-first'; ?>
                    <div class="col col-image col-3 col-md-4 order-last">
                      <div class="col-inside col-image-inside w-100">
                        <figure class="figure figure- w-100">
                          <?php echo $post_image; ?>
                        </figure>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="<?php echo $col_content; ?>">
                    <div class="col-inside col-text-inside w-100">
                      <header class="entry-col">
                        <div class="pretails d-flex flex-row pb-1">
                          <div class="post-date w-100">
                            <?php echo get_the_date(); ?>
                          </div>
                        </div>
                        <h5 class="entry-title"><?php echo get_the_title(); ?></h5>
                      </header>
                      <div class="entry-col entry-summary">
                        <p><?php echo get_the_excerpt(); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </a>
          </div>
          <?php endwhile; ?>
        </div>
      <?php endif;

      $output = ob_get_clean();
    ob_end_clean();

    // Return our output/html
    wp_send_json_success($output);

  }

  function getDataAccessCcpa()
  {
    $template_file = 'data-request-iframe.php';
    $iframe_src = DATA_SUBJECT_RIGHTS_IFRAME_SRC . 'ccpa/';
    $html = '';

    ob_start();
    include( locate_template( 'privacy/' . $template_file, false, false ) ); // using 'locate_template' instead of 'get_template_part' so we can use variables generate in this funciton in the template file
    $html = ob_get_clean();

    if( ! empty( $html ) ) {
      $ret = array(
        'success'         => true,
        'html'            => $html,
        'post'            => $_POST,
      );
    }

    echo json_encode( $ret );

    wp_die();
  }

  function getDataAccessGdpr()
  {
    $template_file = 'data-request-iframe.php';
    $iframe_src = DATA_SUBJECT_RIGHTS_IFRAME_SRC . 'gdpr/';
    $html = '';

    ob_start();
    include( locate_template( 'privacy/' . $template_file, false, false ) ); // using 'locate_template' instead of 'get_template_part' so we can use variables generate in this funciton in the template file
    $html = ob_get_clean();

    if( ! empty( $html ) ) {
      $ret = array(
        'success'         => true,
        'html'            => $html,
        'post'            => $_POST,
      );
    }

    echo json_encode( $ret );

    wp_die();
  }

  /**
   * Return the legal contact modal html content, for dispaly (with ajax) in the empty
   * contact legal modal (already added to the footer)
   */
  function openModalContactLegal()
  {
    $html = '';
    $privacy_location = isset( $_POST['location'] ) && ! empty( $_POST['location'] ) ? $_POST['location'] : 'in-us';

    ob_start();
      include( locate_template( 'partials/modal/legal-contact-modal.blade.php', false, false ) ); // using 'locate_template' instead of 'get_template_part' so we can use variables generate in this funciton in the template file
    $html = ob_get_clean();

    if( ! empty( $html ) ) {
      $ret = array(
        'success'         => true,
        'html'            => $html,
        'post'            => $_POST,
      );
    }

    echo json_encode( $ret );

    wp_die();
  }


  /**
   * Sends the submitted data to the appropriate legal email address.
   */
  function submitContactLegal() {

    // Verify valid google captcha.
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
    $verify = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . GCAPTCHASECRET . "&response={$recaptchaResponse}" );
    $captcha_success = json_decode( $verify );

    if ( ! $captcha_success->success ) {
      wp_die(
        json_encode(
          array(
            'status' => 'error',
            'errors' => array(
              array(
                'container' => 'form-group-g-recaptcha',
                'msg' => 'Sorry, we could not validate your captcha response, please try again.',
              ),
            ),
            'raw_data' => $_POST
          )
        )
      );
    }

    $host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : 'http://unknown.com/';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $toSubject = isset($_POST['firstName']) && isset($_POST['lastName']) ? "QC Website Email: " . $_POST['firstName'] . ' ' . $_POST['lastName'] : 'QC Website Email';
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $body = isset($_POST['message']) ? $_POST['message'] : '';
    $contact_type = isset($_POST['contact_type']) ? $_POST['contact_type'] : 'legal';
    $location = isset($_POST['location']) ? $_POST['location'] : 'in-us';

    switch( $contact_type ) {
      case 'privacy':
        $privacy_email = ( 'www.rjbstarter.com' === $host ) || ( 'rjbstarter.com' === $host ) || ( 'test.rjbstarter.com' === $host ) ? DEFAULT_LEGAL_PRIVACY_EMAIL : DEFAULT_LEGAL_PRIVACY_EMAIL_TESTING;
        $privacy_email_int = ( 'www.rjbstarter.com' === $host ) || ( 'rjbstarter.com' === $host ) || ( 'test.rjbstarter.com' === $host ) ? DEFAULT_LEGAL_PRIVACY_EMAIL_INT : DEFAULT_LEGAL_PRIVACY_EMAIL_INT_TESTING;
        $to = ( 'outside-us' === $location ) ? $privacy_email_int : $privacy_email;
      break;

      case 'dpo':
        $to = ( 'www.rjbstarter.com' === $host ) || ( 'rjbstarter.com' === $host ) || ( 'test.rjbstarter.com' === $host ) ? DEFAULT_DPO_EMAIL : DEFAULT_DPO_EMAIL_TESTING;
      break;

      default:
        $to = ( 'www.rjbstarter.com' === $host ) || ( 'rjbstarter.com' === $host ) || ( 'test.rjbstarter.com' === $host ) ? DEFAULT_LEGAL_EMAIL : DEFAULT_LEGAL_EMAIL_TESTING;
    }

    $data = array(
      'firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'company' => $company,
      'location' => $location,
      'subject' => $subject,
      'body' => $body
    );

    // To send HTML mail, the Content-type header must be set
    $headers  = 'From: noreply@rjbstarter.com' . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    $message = "
      <html>
        <head>
          <title>Website Legal Contact</title>
        </head>
        <body>
          <div><strong>Subject: </strong>$subject</div>
          <div><strong>Submission Site: </strong>$host</div>
          <br>
          <div><strong>Name: </strong>$firstName $lastName</div>
          <div><strong>Email: </strong>$email</div>
          <div><strong>Location: </strong>$location</div>
          <div><strong>Company: </strong>$company</div>
          <div><strong>Message:</strong></div>
          <div>$body</div>
        </body>
      </html>
    ";

    // send email to rjbstarter legal.
    $emailSentToLegal = mail( $to, $toSubject, $message, $headers );
    if ( $emailSentToLegal ) {
      wp_die(
        json_encode(
          array(
            'status' => 'success',
            'msg' => '<div class="text-center success-message"><h5>' . $firstName .', thank you for contacting Rjbstarter.</h5><p>Your message has been sent.</p></div>',
            'captcha' => $verify,
            'emailSentToLegal' => $emailSentToLegal,
            'emailSentToAddress' => $to,
            'host' => $host,
          )
        )
      );
    }
    else {
      wp_die(
        json_encode(
          array(
            'status' => 'error',
            'errors' => array(
              array(
                'container' => 'top-msg',
                'msg' => 'Sorry, there was an error sending your message. Please refresh the page and try again.',
              ),
            ),
          )
        )
      );
    }
  }
}

new Ajax();
