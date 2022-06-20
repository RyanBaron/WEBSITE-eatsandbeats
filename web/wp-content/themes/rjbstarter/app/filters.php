<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ){

  $label = isset( $args->menu->name ) ? str_replace( "navigation", "nav", strtolower($args->menu->name) ) : '';;
  $title = isset( $item->title ) ? strtolower($item->title) : '';

  if ( $title ) {
    $atts['data-g-action'] = 'click: ' . $title;
  }

  if ( $label ) {
    $atts['data-g-label'] = 'nav: ' . $label;
  }

  return $atts;
}, 10, 3 );

add_filter( 'nav_menu_css_class', function( $classes, $item, $args, $depth ){
  if ( isset( $item->object_id ) && isset( $item->type ) && 'taxonomy' === $item->type ) {
    $classes[] = 'category-id-' . $item->object_id;
  }

  return $classes;
}, 10, 4 );

add_filter( 'excerpt_length', function($length) {
  if( true ) {
    return 30;
  }
  else {
    return $length;
  }
}, 999, 1 );

add_filter('excerpt_more', function() {
  return '[...]';
  //return '';
  //return '<a href="' . get_the_permalink() . '" rel="nofollow">&nbsp;[more]</a>';
});

add_filter('admin_body_class', function($classes) {

  if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    $search_array = array_map('strtolower', $role);

    if (in_array('administrator', $search_array)) {
      $classes = ! empty( $classes ) ? $classes . " user-type-admin" : "user-type-admin";
    }
  }

  return $classes;
});

add_filter('body_class', function($classes) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = 'category-' . $category->category_nicename;
      $classes[] = 'category-' . $category->term_id;
    }
  }
  // return the $classes array
  return $classes;
}, 10, 1);
