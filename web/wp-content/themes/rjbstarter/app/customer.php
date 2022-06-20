<?php
//////
// Alter the main query for customer archive and taxonomy pages to account for featured posts.
//////
add_action('pre_get_posts', function($query){
  //gets the global query var object
  global $wp_query;
  $exclude = array();

  if ( !$query->is_main_query() || is_admin() )
    return;

  // Archive or taxonomy home page
  if( ($query->is_tax('customer_category') ) ) :
    $taxonomy = isset($query->queried_object->taxonomy) ? $query->queried_object->taxonomy : '';
    $term_id = isset($query->queried_object->term_id) ? $query->queried_object->term_id : 0;
    $featured_customer = \App\get_featured_primary_cpt('customer', $taxonomy, $term_id);
    $featured_secondary_customer = \App\get_featured_secondary_cpt('customer', $taxonomy, $term_id);

    $exclude = array_merge($featured_customer, $featured_secondary_customer);

    $query->set('post__not_in', $exclude ); // remove the 4 featured items from the feed.
  elseif ( $query->is_archive() && is_post_type_archive('customer') && ! is_category() ) :
    $args = array(
      'numberposts' => 4,
      'post_type'   => 'customer',
      'post_status' => 'publish',
    );
    $latest_customers = get_posts( $args );
    foreach ($latest_customers as $key => $value) {
      $exclude[] = $value->ID;
    }

    $query->set('post__not_in', $exclude ); // remove the 4 featured items from the feed.
  endif;
}, 999, 1);

add_action( 'init', function () {

  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //
  // flush_rewrite_rules();
  // This can be done manually on a site settings->permalinks->save (dont make any changes, just save).
  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //

  ////
  // Register Custom Post Type "customers"
  ////
  $labels = array(
    'name'                  => _x( 'Customers', 'Post Type General Name', 'sage' ),
    'singular_name'         => _x( 'Customer', 'Post Type Singular Name', 'sage' ),
    'menu_name'             => __( 'Customers', 'sage' ),
    'name_admin_bar'        => __( 'Customer', 'sage' ),
    'archives'              => __( 'Customer Archives', 'sage' ),
    'attributes'            => __( 'Customer Attributes', 'sage' ),
    'parent_item_colon'     => __( 'Parent Customer:', 'sage' ),
    'all_items'             => __( 'All Customers', 'sage' ),
    'add_new_item'          => __( 'Add New Customer', 'sage' ),
    'add_new'               => __( 'Add New', 'sage' ),
    'new_item'              => __( 'New Customer', 'sage' ),
    'edit_item'             => __( 'Edit Customer', 'sage' ),
    'update_item'           => __( 'Update Customer', 'sage' ),
    'view_item'             => __( 'View Customer', 'sage' ),
    'view_items'            => __( 'View Customers', 'sage' ),
    'search_items'          => __( 'Search Customers', 'sage' ),
    'not_found'             => __( 'Not found', 'sage' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
    'featured_image'        => __( 'Featured Image', 'sage' ),
    'set_featured_image'    => __( 'Set featured image', 'sage' ),
    'remove_featured_image' => __( 'Remove featured image', 'sage' ),
    'use_featured_image'    => __( 'Use as featured image', 'sage' ),
    'insert_into_item'      => __( 'Insert into item', 'sage' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
    'items_list'            => __( 'Customers list', 'sage' ),
    'items_list_navigation' => __( 'Customers list navigation', 'sage' ),
    'filter_items_list'     => __( 'Filter items list', 'sage' ),
  );
  $rewrite = array(
    'slug'                  => 'case-study',
    'pages'                 => true,
    'feeds'                 => true,
    'with_front'            => false
  );
  $args = array(
    'label'                 => __( 'Customer', 'sage' ),
    'description'           => __( 'Customer case studies.', 'sage' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
    //'taxonomies'            => array( 'category', 'customer_category', 'post_tag' ),
    'taxonomies'            => array( 'customer_category' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-admin-users',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'case-studies',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'show_in_rest'          => true,
  );
  register_post_type( 'customer', $args );

  ////
  // Add the customer_category custom taxonomy.
  ////
  $labels = array(
    "name"          => __( 'Customer Categories', 'sage' ),
    "singular_name" => __( 'Customer Category', 'sage' ),
  );

  register_taxonomy(
    'customer_category',
    array('customer'),
    array(
      'label'              => __( 'Customer Categories' ),
      'labels'             => $labels,
      'public'             => true,
      'rewrite'            => array(
        'slug'             => 'case-studies',
        'with_front'       => false,
      ),
      'hierarchical'       => true,
      'show_in_rest'       => true,
      'show_admin_column'  => true,
      'default_term'       => array(
        'name'             => 'Uncategorized',
        'slug'             => 'uncategorized',
      ),
      "show_ui"            => true,
      "show_in_menu"       => true,
      "show_in_nav_menus"  => true,
      "query_var"          => true,
    )
  );
}, 0 );

////
// Replace 'customer' with 'case studies'.
////
add_filter( 'post_type_link', function ( $post_link, $post ) {
  if ( 'customer' != $post->post_type || 'publish' != $post->post_status ) {
    return $post_link;
  }

  $post_link = str_replace( '/' . $post->post_type . '/', '/case-studies/', $post_link );

  return $post_link;
}, 10, 2 );
