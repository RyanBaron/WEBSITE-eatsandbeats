<?php
add_action( 'init', function () {

  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //
  // flush_rewrite_rules();
  // This can be done manually on a site settings->permalinks->save (dont make any changes, just save).
  // ********** flush_rewrite_rules is for testing only (do not add to production) *************** //

  ////
  // Register Custom Post Type "presss"
  ////
  $labels = array(
    'name'                  => _x( 'Press Release', 'Post Type General Name', 'sage' ),
    'singular_name'         => _x( 'Press Release', 'Post Type Singular Name', 'sage' ),
    'menu_name'             => __( 'Press Release', 'sage' ),
    'name_admin_bar'        => __( 'Press Release', 'sage' ),
    'archives'              => __( 'Press Release Archives', 'sage' ),
    'attributes'            => __( 'Press Release Attributes', 'sage' ),
    'parent_item_colon'     => __( 'Parent Press Release:', 'sage' ),
    'all_items'             => __( 'All Press Releases', 'sage' ),
    'add_new_item'          => __( 'Add New Press Release', 'sage' ),
    'add_new'               => __( 'Add New', 'sage' ),
    'new_item'              => __( 'New Press Release', 'sage' ),
    'edit_item'             => __( 'Edit Press Release', 'sage' ),
    'update_item'           => __( 'Update Press Release', 'sage' ),
    'view_item'             => __( 'View Press Release', 'sage' ),
    'view_items'            => __( 'View Press Releases', 'sage' ),
    'search_items'          => __( 'Search Press Releases', 'sage' ),
    'not_found'             => __( 'Not found', 'sage' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
    'featured_image'        => __( 'Featured Image', 'sage' ),
    'set_featured_image'    => __( 'Set featured image', 'sage' ),
    'remove_featured_image' => __( 'Remove featured image', 'sage' ),
    'use_featured_image'    => __( 'Use as featured image', 'sage' ),
    'insert_into_item'      => __( 'Insert into item', 'sage' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
    'items_list'            => __( 'Press Release list', 'sage' ),
    'items_list_navigation' => __( 'Press Release list navigation', 'sage' ),
    'filter_items_list'     => __( 'Filter items list', 'sage' ),
  );
  $rewrite = array(
    'slug'                  => 'press-release',
    'pages'                 => true,
    'feeds'                 => true,
    'with_front'            => false
  );
  $args = array(
    'label'                 => __( 'Press Release', 'sage' ),
    'description'           => __( 'Rjbstarter press releases.', 'sage' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
    //'taxonomies'            => array( 'category', 'press_category', 'post_tag' ),
    'taxonomies'            => array( 'press_category' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-admin-users',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'press-releases',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'show_in_rest'          => true,
  );
  register_post_type( 'press', $args );

  ////
  // Add the press_category custom taxonomy.
  ////
  $labels = array(
    "name"          => __( 'Press Release Categories', 'sage' ),
    "singular_name" => __( 'Press Release Category', 'sage' ),
  );

  register_taxonomy(
    'press_category',
    array('press'),
    array(
      'label'              => __( 'Press Categories' ),
      'labels'             => $labels,
      'public'             => true,
      'rewrite'            => array(
        'slug'             => 'press-releases',
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
