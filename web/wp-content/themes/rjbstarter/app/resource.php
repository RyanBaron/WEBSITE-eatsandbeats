<?php
//////
// Alter the main query for resource archive and taxonomy pages to account for featured posts.
//////
add_action('pre_get_posts', function($query){
  //gets the global query var object
	global $wp_query;

  if ( !$query->is_main_query() || is_admin() )
		return;

  // Archive or taxonomy home page
  if( ($query->is_tax('resource_type') ) || $query->is_post_type_archive('resource')  ) :
    $taxonomy = isset($query->queried_object->taxonomy) ? $query->queried_object->taxonomy : '';
    $term_id = isset($query->queried_object->term_id) ? $query->queried_object->term_id : 0;
    $featured_resource = \App\get_featured_primary_cpt('resource', $taxonomy, $term_id);
    //$featured_secondary_resource = \App\get_featured_secondary_cpt('resource', $taxonomy, $term_id);

    $exclude = array_merge(array(), $featured_resource);

    $query->set('post__not_in', $exclude ); // remove the 4 featured items from the feed.
  endif;
}, 999, 1);


add_action( 'init', function () {

  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //
  // flush_rewrite_rules();
  // This can be done manually on a site settings->permalinks->save (dont make any changes, just save).
  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //

  ////
  // Register Custom Post Type "resource"
  ////
  $labels = array(
    'name'                  => _x( 'Resources', 'Post Type General Name', 'sage' ),
    'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'sage' ),
    'menu_name'             => __( 'Resources', 'sage' ),
    'name_admin_bar'        => __( 'Resource', 'sage' ),
    'archives'              => __( 'Resource Archives', 'sage' ),
    'attributes'            => __( 'Resource Attributes', 'sage' ),
    'parent_item_colon'     => __( 'Parent Resource:', 'sage' ),
    'all_items'             => __( 'All Resources', 'sage' ),
    'add_new_item'          => __( 'Add New Resource', 'sage' ),
    'add_new'               => __( 'Add New', 'sage' ),
    'new_item'              => __( 'New Resource', 'sage' ),
    'edit_item'             => __( 'Edit Resource', 'sage' ),
    'update_item'           => __( 'Update Resource', 'sage' ),
    'view_item'             => __( 'View Resource', 'sage' ),
    'view_items'            => __( 'View Resources', 'sage' ),
    'search_items'          => __( 'Search Resource', 'sage' ),
    'not_found'             => __( 'Not found', 'sage' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
    'featured_image'        => __( 'Featured Image', 'sage' ),
    'set_featured_image'    => __( 'Set featured image', 'sage' ),
    'remove_featured_image' => __( 'Remove featured image', 'sage' ),
    'use_featured_image'    => __( 'Use as featured image', 'sage' ),
    'insert_into_item'      => __( 'Insert into resourceesource', 'sage' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
    'items_list'            => __( 'Resources list', 'sage' ),
    'items_list_navigation' => __( 'Items list navigation', 'sage' ),
    'filter_items_list'     => __( 'Filter resources list', 'sage' ),
  );
  $rewrite = array(
    'slug'                  => 'resource',
    'pages'                 => true,
    'feeds'                 => true,
    'with_front'            => false
  );
  $args = array(
    'label'                 => __( 'Resource', 'sage' ),
    'description'           => __( '', 'sage' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
    'taxonomies'            => array( 'resource_category', 'category', 'post_tag' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 6,
    'menu_icon'             => 'dashicons-media-default',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'resources',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'show_in_rest'          => true,
  );
  register_post_type( 'resource', $args );


  ////
  // Add the customer_category custom taxonomy.
  ////
  $labels = array(
    "name"          => __( 'Resource Types', 'sage' ),
    "singular_name" => __( 'Resource Type', 'sage' ),
  );

  register_taxonomy(
    'resource_type',
    array('resource'),
    array(
      'label' => __( 'Resource Types' ),
      'labels' => $labels,
      'public' => true,
      'rewrite' => array(
        'slug' => 'resources',
        'with_front' => false,
      ),
      'hierarchical' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'default_term' => array(
        'name' => 'Uncategorized',
        'slug' => 'uncategorized',
      ),
      "show_ui"            => true,
      "show_in_menu"       => true,
      "show_in_nav_menus"  => true,
      "query_var"          => true,
    )
  );

}, 0 );

////
// Update single resource post type links.
////
/*
add_filter( 'post_type_link', function ( $post_link, $post ) {
  if ( 'resource' != $post->post_type || 'publish' != $post->post_status ) {
    return $post_link;
  }

  $post_link = str_replace( '/' . $post->post_type . '/', '/resources/', $post_link );

  return $post_link;
}, 10, 2 );
*/
