<?php
/*
 * Rewrite rules to allow sub-pages with same path as a custom post type:
 * e.g 'case-studies/page/2', resources/rta-academy
 * where X gets confused if page or custom post type, so pages needs to be defined explicitly here
 *
 * loop through each page type and generate
 * appropriate slug based rewrite rules
 * called on init hook
 *
 */

use Roots\Sage\Assets;

add_action('init', function () {
  //Job Detail path based on Lever's job uuid format
  $lever_job_id = "[0-9a-f]+-[0-9a-f]+-[0-9a-f]+-[0-9a-f]+-[0-9a-f]+";

  add_rewrite_tag('%job_id%','([^/]*)');
  add_rewrite_rule('careers/(' . $lever_job_id . ')/?$',
                   'index.php?job_id=$matches[1]', 'top');
});


add_action( 'template_redirect', function () {
  if ( get_query_var( 'job_id' ) ) {
    add_filter( 'template_include', function() {
      return get_template_directory() . '/views/template-single-careers.blade.php';
    });
  }
} );

add_filter( 'body_class', function ( $classes ) {
  global $wp;
  $current_slug = add_query_arg( array(), $wp->request );
  $careers_slug = 'careers';
  $careers_path = $careers_slug . '/';

  if (
    is_page_template( 'views/template-career-openings.blade.php' )
    || $careers_slug === $current_slug
    || startsWith( $careers_path, $current_slug )
  ) {
    $classes[] = 'careers';


    $job_id = isset( $wp->query_vars['job_id'] ) && ! empty( $wp->query_vars['job_id'] );
    if( $job_id ) {

      $del_val = 'blog';
      if (($key = array_search($del_val, $classes)) !== false) {
        unset($classes[$key]);
      }

    }
  }

  // Return the classes array
  return $classes;
} );

// Function to check string starting
// with given substring
function startsWith ($startString, $string)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}




/**************
 * Careers API Social/OG/Yoast fixes.
 *************/


//////
// Careers Lever api generated pages.
//
// We automatically generate wordrpess pages from the Lever API, however wordpress knows nothing about
// those pages so we also need to use wpseo hooks and generate SEO/Page meta data.
//////


//////
// SEO Meta Title - Carrers single (og:title)
//////
add_filter( 'wpseo_title', function($wpseo_replace_vars) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    // Get job information form lever.
    $response = file_get_contents( "https://www.rjbstarter.com/careers/lever/proxy/" . $job_id );
    $response = json_decode( $response, true );

    $title = isset( $response['text'] ) ? $response['text'] : '';
    $location = isset( $response['categories']['location'] ) ? $response['categories']['location'] : '';

    if( ! empty( $title ) || ! empty( $location ) ) {
      if( ! empty( $title ) || ! empty( $location ) ) {
        $wpseo_replace_vars = __( 'Rjbstarter Careers - ' ) . $title . ' | ' . $location;
      }
      elseif ( ! empty( $title ) ) {
        $wpseo_replace_vars = __( 'Rjbstarter Careers - ' ) . $title;
      }
      elseif ( ! empty( $location ) ) {
        $wpseo_replace_vars = __( 'Rjbstarter Careers - ' ) . $location;
      }
    }
    else {
      $wpseo_replace_vars = __( 'Rjbstarter Careers', 'sage' );
    }
  }

  return $wpseo_replace_vars;

}, 10, 1 );


//////
// SEO Meta Description - Carrers single (meta:description)
//////
add_filter( 'wpseo_metadesc', function( $wpseo_replace_vars ) {
  global $wp_query;

  // Get the job id
   $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

   // Get job information form lever.
   if( $job_id ) {
     $response = file_get_contents( "https://www.rjbstarter.com/careers/lever/proxy/".$job_id );
     $response = json_decode( $response, true );

     $desc_plain = isset( $response['descriptionPlain'] ) ? $response['descriptionPlain'] : '';
     if( ! empty( $desc_plain ) ) {
       $wpseo_replace_vars = $desc_plain;
       $wpseo_replace_vars = substr( $wpseo_replace_vars, 0, 160 );
       $wpseo_replace_vars = trim( $wpseo_replace_vars ) . '...';
     }
   }

   return $wpseo_replace_vars;
}, 10, 1 );


//////
// SEO Meta Share URL - Carrers single (og:url)
//////
add_filter( 'wpseo_opengraph_url', function( $wpseo_replace_vars ) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    $site_url = esc_url( home_url( '/' ) );
    $wpseo_replace_vars = $site_url . 'careers/' . $job_id . '/';
  }

  return $wpseo_replace_vars;
}, 10, 1 );


//////
// SEO Meta canonical URL - Carrers single (link:rel=canonical)
//////
add_filter( 'wpseo_canonical', function( $wpseo_replace_vars ) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    // Using a relative url, because you can, and because esc_url( home_url( '/' ) ); gives
    //  the localized /fr/, /de/, '/it', etc home url and we want the canonical url to point
    //  to the main "engilsh" version as we do not have tranlasted job postings at the moment
    //  esc_url( site_url( '/' ) ); also does not work as this gives the wp install directory
    //  which is techincally in /wp/ (for pantheon and lando (local dev))

    $wpseo_replace_vars = '/careers/' . $job_id . '/';
  }

  return $wpseo_replace_vars;
}, 10, 1 );


//////
// Social Meta images - Carrers single (og:image & twitter:image)
//////
add_action('wp_head', function() {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    $og_image = \App\asset_path('images/rjbstarter-social-share-default-min.png');
    if( $og_image ) {
      echo '<meta property="og:image" content="' . $og_image . '">';
      echo '<meta property="twitter:image" content="' . $og_image . '">';
    }
  }
});


//////
// Remove prev rel link for single career pages
//////
add_filter( 'wpseo_prev_rel_link', function( $wpseo_replace_vars ) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    return false;
  }

  return $wpseo_replace_vars;
}, 10, 1 );


//////
 // Remove next rel link for single career pages
 //////
add_filter( 'wpseo_next_rel_link', function( $wpseo_replace_vars ) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  if( $job_id ) {
    return false;
  }

  return $wpseo_replace_vars;
}, 10, 1 );

//////
 // Remove next rel link for single career pages
 //////
add_filter( 'wpml_hreflangs', function( $hreflang_items ) {
  global $wp_query;

  // Get the job id.
  $job_id = isset( $wp_query->query['job_id'] ) ? $wp_query->query['job_id'] : false;

  // Jobs from lever are not tranlated, therefore we do not need these alternate <link> tags.
  //  that are being added automaticallty, but they are not correct, as these are not "real"
  //  wordpress pages.  Instead they are spoofed pages from the lever API. https://www.rjbstarter.com/careers/lever/proxy/
  if( $job_id ) {
    return array();
  }

  return $hreflang_items;
}, 10, 1 );
