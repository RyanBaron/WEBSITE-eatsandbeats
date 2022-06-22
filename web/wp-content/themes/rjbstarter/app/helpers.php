<?php

namespace App;

use Roots\Sage\Container;

use WP_Query;


/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}


/**
 * Get the absolute path to an asset.
 *
 * @param string $asset
 *
 * @return string
 */
function locate_asset($asset): string
{
  return trailingslashit(config('assets.path')) . sage('assets')->get($asset);
}

/**
 * Get the contents of a file.
 *
 * @param string $asset
 *
 * @return string
 */
function get_file_contents($asset): string
{

  /** @var \WP_Filesystem_Base */
  global $wp_filesystem;

  if (empty($wp_filesystem)) {
      require_once ABSPATH . '/wp-admin/includes/file.php';
  }

  \WP_Filesystem();

  $asset_path = locate_asset($asset);

  if ($wp_filesystem->is_readable($asset_path)) {
      return $wp_filesystem->get_contents($asset_path);
  }

  return '';
}

/**
 * sanatize_class
 * Sanatize a string or array of strings for html attribute display
 * and concat into a single string for return and usage in html.
 *
 * @param $class string|array a string or array of strings to be sanitized for html display
 * @param $deliminator string a string to be used as a deliminator in for attribute strings
 *
 * @return string a sanatized string for usage as the html class string value.
 */
function sanatize_class($class = '', $deliminator = ' ') {
  $ret = '';

  if( empty( $class ) ) {
    return $ret;
  }

  if( ! is_array( $class ) ) {
    if( is_string( $class ) ) {
      $class = explode( $deliminator, trim( $class ) );
    }
  }

  if( ! is_array( $class ) ) {
    return $ret;
  }

  $cnt = count( $class );
  if ( $cnt >= 1 ) {
    foreach( $class as $key => $value ) {
      if( is_array( $value ) && isset( $value[0]) ) {
        $value = $value[0];
      }
      $ret .= sanitize_html_class($value, '');
      if( $key < ($cnt - 1) ) {
        $ret .= ' '; // add a space if there are more items in the array to be added.
      }
    }
  }

  return $ret;
}

/**
 * sanatize_class
 * Sanatize a string or array of strings for html attribute display
 * and concat into a single string for return and usage in html.
 *
 * @param $class string|array a string or array of strings to be sanitized for html display
 * @param $deliminator string a string to be used as a deliminator in for attribute strings
 *
 * @return string a sanatized string for usage as the html class string value.
 */
function sanatize_class_depth($class = '', $deliminator = ' ') {
  $ret = '';

  if( empty( $class ) ) {
    return $ret;
  }

  if( ! is_array( $class ) ) {
    if( is_string( $class ) ) {
      $class = explode( $deliminator, trim( $class ) );
    }
  }

  if( ! is_array( $class ) ) {
    return $ret;
  }

  $cnt_l1 = count( $class );
  if ( $cnt_l1 >= 1 ) {
    foreach( $class as $key_l1 => $value_l1 ) {
      if( is_array( $value_l1 ) ) {
        $cnt_l2 = count( $value_l1 );
        if ( $cnt_l2 >= 1 ) {
          foreach( $value_l1 as $key_l2 => $value_l2 ) {
            if( is_string( $value_l2 ) ) {
              $ret .= sanitize_html_class($value_l2, '');
              //if( $key_l2 < ($cnt_l2 - 1) ) {
                $ret .= ' '; // add a space if there are more items in the array to be added.
              //}
            }
          }
        }
      }
      else {
        $ret .= sanitize_html_class($value_l1, '');
        if( $key_l1 < ($cnt_l1 - 1) ) {
          $ret .= ' '; // add a space if there are more items in the array to be added.
        }
      }
    }
  }

  return $ret;
}


/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $partial
 * @return mixed
 */
function get_field_partial($partial)
{
    $partial = str_replace('.', '/', $partial);
    return include(config('theme.dir')."/app/acf-fields/{$partial}.php");
}

/**
 * Simple function to pretty up our field larger partial includes.
 *
 * @param  mixed $partial
 * @return mixed
 */
function get_common_section($partial)
{
    $partial = str_replace('.', '/', $partial);
    return include(config('theme.dir')."/app/acf-common/{$partial}.php");
}


/**
 * Convert a string or array of strings into html display ready
 *
 * @param  mixed $values a string or array of strings to be sanitized and returned for html display.
 * @param  string $deliminator the deliminator value to be used for string explosion
 * @return string a sanatized string
 */
function sanatize_attributes($attr_values, $deliminator = ' ')
{
  $ret = '';

  // Bail if the class var is empty.
  if (empty($attr_values))
    return $ret;

  // If $attr_values is not an array, convert it to one uding the $deliminator
  if (!is_array($attr_values)) {
    $attr_values = explode($deliminator, trim($attr_values));
  }

  $cnt = count($attr_values);

  if ($cnt >= 1) {
    foreach ($attr_values as $key => $value) {
      if( is_array( $value ) ) {
        foreach ($value as $key2 => $value2) {
          $ret .= sanitize_html_class($value2);
          $ret .= ' ';
        }
      }
      else {
        $ret .= sanitize_html_class($value);
        if (($key < ($cnt - 1))) {
          $ret .= ' ';
        }
      }
    }
  }

  // Return the sanitized string value ready for html display.
  return $ret;

}


/**
 * Convert a string or array of strings into html display ready
 *
 * @param  mixed $values a string or array of strings to be sanitized and returned for html display.
 * @param  string $deliminator the deliminator value to be used for string explosion
 * @return string a sanatized string
 */
function sanatize_data_attr_array($data_attrs = array(), $deliminator = ' ')
{
  $ret = '';

  // Bail if the class var is empty.
  if (empty($data_attrs))
    return $ret;

  // If $attr_values is not an array, convert it to one uding the $deliminator
  if (!is_array($data_attrs)) {
    $data_attrs = explode($deliminator, trim($data_attrs));
  }

  $cnt = count($data_attrs);

  if ($cnt >= 1) {
    foreach ($data_attrs as $key => $value) {
      $attr = ' data-' . str_replace('_', '-', $key);
      $ret .= $attr . '="' . esc_html($value) . '"';
    }
  }

  // Return the sanitized string value ready for html display.
  return $ret;

}

function get_post_categories( $post_id = '', $args = array()) {
  $ret                = array();
  $name_str           = '';
  $name_str_condensed = '';
  $slug_str           = '';
  $slug_str_condensed = '';
  $raw                = array();

  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  // Bail if there is no post id
  if(empty($post_id))
    return $ret;

  $parent_id = isset( $args['parent_id'] ) ? $args['parent_id'] : '';
  $cats      = get_categories_list($parent_id);
  $post_cats = wp_get_post_categories($post_id);

  if( is_array( $post_cats ) ) {
    // Loop through all of the post categories
    foreach ($post_cats as $key => $cat_id) {

      // Exclude the top level categorzation categories.
      //if( WP_CATEGORY_AUDIENCE_ID !== $cat_id && WP_CATEGORY_TOPIC_ID !== $cat_id && WP_CATEGORY_RESOURCE_TYPE_ID !== $cat_id ) {
        $name_str           .= isset( $cats[$cat_id]['name'] ) && ! empty( $cats[$cat_id]['name'] ) ? $cats[$cat_id]['name'] . ', ' : '';
        $name_str_condensed .= isset( $cats[$cat_id]['name'] ) && ! empty( $cats[$cat_id]['name'] ) ? $cats[$cat_id]['name'] . ',' : '';
        $slug_str           .= isset( $cats[$cat_id]['slug'] ) && ! empty( $cats[$cat_id]['slug'] ) ? $cats[$cat_id]['slug'] . ', ' : '';
        $slug_str_condensed .= isset( $cats[$cat_id]['slug'] ) && ! empty( $cats[$cat_id]['slug'] ) ? $cats[$cat_id]['slug'] . ',' : '';

        // Only add to the array if the category is not empty
        if (isset( $cats[$cat_id] ) && ! empty( $cats[$cat_id] ) )
          $raw[$cat_id] = $cats[$cat_id];
      //}
    }
  }

  $ret = array(
    'name'           => rtrim($name_str, ", \t\n"),
    'name_condensed' => rtrim($name_str_condensed, ", \t\n"),
    'slug'           => rtrim($slug_str, ", \t\n"),
    'slug_condensed' => rtrim($slug_str_condensed, ", \t\n"),
    'raw'            => $raw,
  );

  return $ret;
}


function get_resource_type( $post_id = '', $args = array()) {
  $ret                = array('raw' => array());
  $name_str           = '';
  $name_str_condensed = '';
  $slug_str           = '';
  $slug_str_condensed = '';
  $raw                = array();
  $filter             = isset( $args['filter'] ) && ! empty( $args['filter'] ) && is_array( $args['filter'] ) ? $args['filter'] : array();

  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  // Bail if there is no post id
  if(empty($post_id))
    return $ret;

  $terms = get_the_terms($post_id, 'resource_type' );

  if( is_array($filter) && count($filter) ) {
    foreach ($terms as $key => $term) {
      $id = isset($term->slug) ? $term->id : '';
      $slug = isset($term->slug) ? $term->slug : '';
      $name = isset($term->name) ? $term->name : '';

      if( in_array($slug, $filter) && $name ) {
        $ret['raw'][] = array(
          'name' => $name,
          'id' => $id,
          'slug' => $slug,
        );
      }
    }
  }
  else {
    foreach ($terms as $key => $term) {
      $$id = isset($term->slug) ? $term->id : '';
      $slug = isset($term->slug) ? $term->slug : '';
      $name = isset($term->name) ? $term->name : '';

      if( $name ) {
        $ret['raw'][] = array(
          'name' => $name,
          'id' => $id,
          'slug' => $slug,
        );
      }
    }
  }

  return $ret;

}

function get_categories_list( $parent_id = '' ) {
  $ret  = array();
  $args = array('parent' => $parent_id);
  $cats = get_categories( $args );

  foreach ($cats as $key => $cat) {
    $ret[$cat->term_id] = array(
      'id'   => $cat->term_id,
      'name' => $cat->name,
      'slug' => $cat->slug,
    );
  }


  return $ret;
}

function get_meta_title ( $post_id = '', $max_len = 0 ) {

  $ret = '';
  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  if( empty( $post_id ) )
    return $ret;

  $slug = get_post_field( 'post_name', $post_id );
  $slug = str_replace( "-", " ", $slug );
  $ret = truncate_string( $slug, $max_len, '...' );

  return $ret;
}


function truncate_string( $str, $max_len = 0, $suffix = '...' ) {

  $ret = '';
  // Bail if the max_len is 0 or if the string is empty.
  if( $max_len <= 0 || empty( $str ) || strlen( $str ) < $max_len )
    return $str;

  $str_arr = explode( " ", $str);

  $str_cnt = 0;
  $cnt     = 0;
  $total = count( $str_arr );
  foreach ($str_arr as $key => $word) {
    $cnt++;
    $last_item = ( $cnt >= $total ) ? true : false;

    $ret .= $word;
    $str_cnt += ( strlen( $word ) + 1 ); // add a +1 for the word space

    //echo "<br>str cnt: $str_cnt<br>";

    if( $str_cnt >= $max_len && ! $last_item  ) {
      $ret .= $suffix;
      break;
    }
    elseif ( ! $last_item ) {
      $ret .= ' ';
    }
  }

  return $ret;
}

/*
function get_post_topic_categories($post_id, $return_style = 'slug', $return_type = 'array' ) {

  $topic_cats = get_topic_categories();
  $post_topic_categories = wp_get_post_categories($post_id);

  if( is_array( $post_topic_categories ) ) {
    foreach ($post_topic_categories as $key => $cat_id) {

      if (isset( $topic_cats[$cat_id] ) ) {
        switch($return_type) {
          case "string":
            $ret .= $topic_cats[$cat_id][$return_style] . ", ";
          break;

          case "full":
            $ret[$cat_id] = array(
              'name' => $topic_cats[$cat_id]['name'],
              'slug' => $topic_cats[$cat_id]['slug'],
            );
          break;

          default:
            $ret[$cat_id] = $topic_cats[$cat_id][$return_style];
          break;
        }
      }
    }
  }

  $ret = is_string( $ret ) ? rtrim($ret, ", \t\n") : $ret;

  return $ret;
}

function get_topic_categories() {

  $ret = array();
  $args = array('parent' => WP_CATEGORY_TOPIC_ID);
  $categories = get_categories( $args );

  foreach ($categories as $key => $category) {

    $ret[$category->term_id] = array(
      'name' => $category->name,
      'slug' => $category->slug,
      'g_category' => strtolower( str_replace( '-', ' ', $category->slug))
    );
  }

  return $ret;
}

function get_post_audience_categories($post_id, $return_style = 'slug', $return_type = 'array' ) {

  $audience_cats = get_audience_categories();
  $post_audience_categories = wp_get_post_categories($post_id);

  if( is_array( $post_audience_categories ) ) {
    foreach ($post_audience_categories as $key => $cat_id) {

      if (isset( $audience_cats[$cat_id] ) ) {
        switch($return_type) {
          case "string":
            $ret .= $audience_cats[$cat_id][$return_style] . ", ";
          break;

          case "full":
            $ret[$cat_id] = array(
              'name' => $audience_cats[$cat_id]['name'],
              'slug' => $audience_cats[$cat_id]['slug'],
            );
          break;

          default:
            $ret[$cat_id] = $audience_cats[$cat_id][$return_style];
          break;
        }
      }
    }
  }

  $ret = is_string( $ret ) ? rtrim($ret, ", \t\n") : $ret;

  return $ret;
}

function get_audience_categories() {

  $ret = array();
  $args = array('parent' => WP_CATEGORY_AUDIENCE_ID);
  $categories = get_categories( $args );

  foreach ($categories as $key => $category) {

    $ret[$category->term_id] = array(
      'name' => $category->name,
      'slug' => $category->slug,
    );
  }

  return $ret;
}

function get_post_type_categories($post_id, $return_style = 'slug', $return_type = 'array' ) {

  $audience_cats = get_audience_categories();
  $post_audience_categories = wp_get_post_categories($post_id);

  if( is_array( $post_audience_categories ) ) {
    foreach ($post_audience_categories as $key => $cat_id) {

      if (isset( $audience_cats[$cat_id] ) ) {
        switch($return_type) {
          case "string":
            $ret .= $audience_cats[$cat_id][$return_style] . ", ";
          break;

          case "full":
            $ret[$cat_id] = array(
              'name' => $audience_cats[$cat_id]['name'],
              'slug' => $audience_cats[$cat_id]['slug'],
            );
          break;

          default:
            $ret[$cat_id] = $audience_cats[$cat_id][$return_style];
          break;
        }
      }
    }
  }

  $ret = is_string( $ret ) ? rtrim($ret, ", \t\n") : $ret;

  return $ret;
}

function get_audience_type_categories() {

  $ret = array();
  $args = array('parent' => WP_CATEGORY_AUDIENCE_ID);
  $categories = get_categories( $args );

  foreach ($categories as $key => $category) {

    $ret[$category->term_id] = array(
      'name' => $category->name,
      'slug' => $category->slug,
    );
  }

  return $ret;
}
*/
function get_primary_category($post_id) {
  $priority_order = array(
    0 => 'whitepaper',
    1 => 'video',
    2 => 'webinar',
    3 => 'podcast',
    5 => 'resource',
    6 => 'article',
  );

  $primary_name = '';
  $categories = get_the_category($post_id);
  $key_primary = count($priority_order) - 1;

  foreach ($categories as $key => $item) {
    $k = array_search($item->slug, $priority_order); //$k = 1;

    if( $k ) {
      if( $k < $key_primary ):
        $key_primary = $k;
        $primary_name = $item->name;
      endif;
    }
  }

  return isset($priority_order[$key_primary]) ? array( 'type' => $priority_order[$key_primary], 'name' => $primary_name) : array();
}

/**
 * Return the content yield value for the wrapper.
 *
 * @param  string $image_size wordpress image size.
 * @return string wordpress image size (low resolution match, if it exists otherwise the original).
 */
function display_type($post_id, $args = array()) {

  $primary_category = get_primary_category($post_id);
  return isset($primary_category['type']) ? $primary_category['type'] : '';

}


function read_more_link( $type = 'text', $post_id = '', $args = array() ) {
  $ret = '';
  $post_id = ! empty( $post_id ) ? $post_id : get_the_id();
  $link_text = isset( $args['link_text']) && ! empty( $args['link_text'] ) ? $args['link_text'] : '';
  $class = isset($args['class']) ? \App\sanatize_class($args['class']) : '';

  if( ! $post_id )
    return $ret;

  $content_cat = \App\get_primary_category($post_id);
  $content_type = isset( $content_cat['type'] ) && ! empty( $content_cat['type'] ) ? $content_cat['type'] : 'article';

  if( empty( $link_text ) )
    $link_text = \App\more_text($content_type);

  switch( $type ) {
    case 'text-no-link':
      $ret = '<span class="more '.$class.'">'.$link_text.'</span>';
    break;
    case 'text-no-link-arrow':
      $ret = '<span class="more '.$class.'">'.$link_text.'<i class="fal fa-arrow-right"></i></span>';
    break;
    default:
      $url = get_permalink($post_id);
      $ret = '<a href="'.$url.'" class="more '.$class.'">'.$link_text.'</a>';
    break;
  }

  return $ret;
}

function more_text( $type ) {
  $more_text = 'Read more';

  switch( $type ) {
    case 'webinar':
      $more_text = "Watch webinar";
    break;
    case 'podcast':
      $more_text = "Listen now";
    break;
    case 'whitepaper':
      $more_text = "Read whitepaper";
    break;
    case 'article':
      $more_text = "Read article";
    break;
    case 'video':
      $more_text = "Watch video";
    break;
    case 'resource':
      $more_text = "Read more";
    break;
  }

  return $more_text;
}
/**
 * Return the content yield value for the wrapper.
 *
 * @param  string $image_size wordpress image size.
 * @return string wordpress image size (low resolution match, if it exists otherwise the original).
 */
function card_display($post_id, $args = array()) {
  $ret = array();
  $post = get_post($post_id);
  $g_label = isset( $args['g_label'] ) && ! empty( $args['g_label'] ) ? $args['g_label'] : 'cards';
  $g_action_prefix = isset( $args['g_action_prefix'] ) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] : '';

  $image_id = get_post_thumbnail_id($post_id);
  $url      = get_permalink($post_id);

  $data_attrs = get_post_data_attributes($post_id, $data_attr_args = array('g_label' => $g_label, 'g_action_prefix' => $g_action_prefix));

  $display_type = isset($args['display_type']) && ! empty( $args['display_type'] ) ? $args['display_type'] : 'article';

  $more_text = more_text($display_type);

  if( $url ) {
    $ret['link']['url'] = $url;
    $ret['link']['wrapper']['top'] = '<a href="'. $url .'" class="wrapper-link" '. $data_attrs .'>';
    $ret['link']['wrapper']['bottom'] = '</a>';
    $ret['link']['footer']['button'] = '<span class="more">'.$more_text.'</span>';
  }

  // Bail if the post is not published.
  $status  = isset($post->post_status) ? $post->post_status : '';

  if( 'publish' !== $status ) {
    return $ret;
  }

  $title   = isset($post->post_title) ? $post->post_title : '';
  $excerpt = isset($post->post_excerpt) ? $post->post_excerpt : '';

  if( $title ) {
    $ret['header']['headline'] = $title;
  }

  if( $excerpt ) {
    $ret['body']['excerpt'] = $excerpt;
  }

  if( $image_id ) {
    $image = array(
      'id' => $image_id,
      'size' => get_sub_field('image_size') ?: 'landscape_md',
      'class' => array(
        'image',
        'img-fluid',
        'figure-img'
      ),
    );
    $figure['class'] = 'w-100';

    $ret['figure'] = array(
      'class' => array('w-100'),
      'image' => $image,
    );
  }

  return $ret;
}
/**
 * Return the content yield value for the wrapper.
 *
 * @param  string $image_size wordpress image size.
 * @return string wordpress image size (low resolution match, if it exists otherwise the original).
 */
function get_post_data_attributes($post_id = '', $args = array()) {
  $ret = array(
    'g_action' => '',
    'g_label' => '',
  );

  $post_id = ! empty( $post_id ) ? $post_id : get_the_id();

  if( ! $post_id )
    return $ret;

  $g_action_prefix = isset($args['g_action_prefix']) && ! empty( $args['g_action_prefix'] ) ? $args['g_action_prefix'] . ': ' : '';
  $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] . ': ' : '';
  $g_label = isset($args['g_label']) && ! empty( $args['g_label'] ) ? $args['g_label'] : '';

  if( ! empty( $g_label_prefix ) ) {
    $ret['g_label'] = $g_label_prefix;
  }
  $ret['g_label'] .= $g_label;

  if( ! empty( $g_action_prefix ) ) {
    $ret['g_action'] = $g_action_prefix;
  }

  $slug = get_post_field( 'post_name', $post_id );
  $slug = str_replace("-", " ", $slug);

  $ret['g_action'] .= truncate_string($slug, 25);

  return sanatize_data_attr_array($ret);
}

/**
 * Return the low resolution wp image size.
 *
 * @param  string $image_size wordpress image size.
 * @return string wordpress image size (low resolution match, if it exists otherwise the original).
 */
function low_res_image_size($image_size)
{
  $ret = $image_size;

  switch ($image_size) {
    case 'landscape_md':
    case 'landscape_lg':
    case 'landscape_xl':
    case 'landscape_2x':
      $ret = 'landscape_sm';
      break;

    case 'square_md':
    case 'square_lg':
    case 'square_xl':
    case 'square_2x':
      $ret = 'square_sm';
      break;

    case 'panoramic_md':
    case 'panoramic_lg':
    case 'panoramic_xl':
    case 'panoramic_2x':
      $ret = 'panoramic_sm';
      break;

    case 'portrait_md':
    case 'portrait_lg':
    case 'portrait_xl':
    case 'portrait_2x':
      $ret = 'portrait_sm';
      break;

    case 'screen_md':
    case 'screen_lg':
    case 'screen_xl':
    case 'screen_2x':
      $ret = 'screen_sm';
      break;

    case 'logo_md':
    case 'logo_lg':
    case 'logo_xl':
    case 'logo_2x':
      $ret = 'logo_sm';
      break;
  }

  return $ret;
}

function get_background_image_style($image_id, $args = array()) {
  $background = '';
  $bg_size  = isset($args['bg_size']) ? $args['bg_size'] : 'background-size:cover;';
  $size     = isset($args['size']) ? $args['size'] : 'full';
  $repeat   = isset($args['repeat']) ? 'background-repeat: ' . $args['repeat'] . ';' : 'background-repeat: no-repeat;';
  $position = isset($args['position']) ? 'background-position:' . $args['position'] . ';' : 'background-position: center;';

  $url = wp_get_attachment_image_src( $image_id, $size );
  if( isset( $url[0] ) && ! empty( $url[0] ) ) {
    $background = "background-image:url($url[0]); $bg_size $repeat $position";
  }

  return $background;
}

function get_grid_item_config($grid_style, $args = array()) {

  $col_custom = isset($args['col-custom']) ? $args['col-custom'] : array();

  $ret = array();

  switch( $grid_style ) {
    case 'one-col-grid-sm':
      $ret = array(
        'class' => array(
          'col' => 'col-10 col-md-8 col-xxl-7',
        )
      );
    break;
    case 'one-col-grid-lg':
      $ret = array(
        'class' => array(
          'col' => 'col-11 col-md-10 col-xxl-9',
        )
      );
    break;

    case 'one-col-grid-full':
      $ret = array(
        'class' => array(
          'col' => 'col-12',
        )
      );
    break;

    case 'two-col-grid-sm':
      $ret = array(
        'class' => array(
          'col' => 'col-10 col-md-5 col-xxl-4',
        )
      );
    break;

    case 'two-col-grid-lg':
      $ret = array(
        'class' => array(
          'col' => 'col-10 col-md-6 col-lg-5',
        )
      );
    break;

    case 'two-col-grid-full':
      $ret = array(
        'class' => array(
          'col' => 'col-12 col-md-6',
        )
      );
    break;

    case 'three-col-grid-lg':
      $ret = array(
        'class' => array(
          'col' => 'col-10 col-md-6 col-xxl-3',
        )
      );
    break;
    case 'three-col-grid-full':
      $ret = array(
        'class' => array(
          'col' => 'col-12 col-md-6 col-xl-4',
        )
      );
    break;
    case 'custom':
      $ret = array(
        'class' => array(
          'col' => $col_custom,
        )
      );
    break;
    default:
      $ret = array(
        'class' => array(
          'col' => 'col-12 col-md-5',
        )
      );
    break;
  }

  $ret['class']['margin'] = 'mt-2 mb-2';
  $ret['class']['padding'] = 'pt-2 pb-2';

  return $ret;

}

/*
function get_featured_primary_post($category = '') {
  $ret = array();
  $tax_query = array();

  $idObj = get_category_by_slug($category);
  $cagegory_id = isset( $idObj->term_id ) ? $idObj->term_id : '';

  if( ! empty( $cagegory_id ) ) :
    $tax_query = array(
      array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $cagegory_id, /// Where term_id of Term 1 is "1".
        'include_children' => false,
      )
    );
  endif;

  $args = array(
    'numberposts' => 1,
    'post_type'   => 'posts',
    'tax_query' => $tax_query
  );

  $featured_primary_customers = get_posts( $args );

  // return an empty array if there are < 3 featured (secondary) items
  if( count( $featured_primary_customers ) < 1 ) {
    return $ret;
  }

  $ret[] = isset( $featured_primary_customers[0]->ID ) && ! empty( $featured_primary_customers[0]->ID ) ? $featured_primary_customers[0]->ID : 0;

  return $ret;
}
*/

function get_featured_primary_cpt($post_type, $tax_type, $tax = '') {
  $ret = array();
  $tax_query = array();

  if( ! empty( $tax ) ) :
    if( is_string( $tax ) ) :
      $term = get_term_by('slug', $tax, $tax_type);
      $term_id = isset($term->term_id) ? $term->term_id : '';
    elseif ( ! empty( $tax ) && is_int( $tax ) ) :
      $term_id = $tax;
    endif;

    $tax_query = array(
      array(
        'taxonomy' => $tax_type,
        'field' => 'term_id',
        'terms' => $term_id, /// Where term_id of Term 1 is "1".
        'include_children' => false,
      )
    );
  endif;

  $args = array(
    'post_status' => 'publish',
    'numberposts' => 1,
    'post_type'   => $post_type,
    'tax_query' => $tax_query
  );

  $featured_primary_customers = get_posts( $args );

  // return an empty array if there are < 3 featured (secondary) items
  if( count( $featured_primary_customers ) < 1 ) {
    return $ret;
  }

  $ret[] = isset( $featured_primary_customers[0]->ID ) && ! empty( $featured_primary_customers[0]->ID ) ? $featured_primary_customers[0]->ID : 0;

  return $ret;
}

function get_featured_secondary_cpt($post_type, $tax_type, $tax = '') {
  $ret = array();
  $tax_query = array();

  if( ! empty( $tax ) ) :
    if( is_string( $tax ) ) :
      $term = get_term_by('slug', $tax, $tax_type);
      $term_id = isset($term->term_id) ? $term->term_id : '';
    elseif ( ! empty( $tax ) && is_int( $tax ) ) :
      $term_id = $tax;
    endif;

    $tax_query = array(
      array(
        'taxonomy' => $tax_type,
        'field' => 'term_id',
        'terms' => $term_id, /// Where term_id of Term 1 is "1".
        'include_children' => false,
      )
    );
  endif;

  $args = array(
    'numberposts' => 3,
    'offset' => 1,
    'post_status' => 'publish',
    'post_type'   => $post_type,
    'tax_query' => $tax_query
  );
  $featured_primary_customers = get_posts( $args );

  foreach ($featured_primary_customers as $key => $customer) {
    if( isset( $customer->ID ) ) {
      $ret[] = isset( $customer->ID ) && ! empty( $customer->ID ) ? $customer->ID : 0;
    }
  }

  return $ret;
}

function post_primary_feature_id() {
  $ret = '';

  // $sticky will be an array of post id, wordpress incremets their post ids so
  // this assumes the higher the number the more recent the post.
  $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
  rsort( $sticky ); // Sort the stickies with the newest ones at the top

  // Loop throught the sticky items and find the first "published" item id and break
  $index = 0;
  foreach ($sticky as $key => $sticky_post_id) {
    if( 'publish' == get_post_status($sticky_post_id) ) {
      $ret = $sticky_post_id;
      break;
    }
    $index++;
  }

  return $ret;
}

function post_secondary_feature_ids() {
  $ret = array();

  // $sticky will be an array of post id, wordpress incremets their post ids so
  // this assumes the higher the number the more recent the post.
  $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
  rsort( $sticky ); // Sort the stickies with the newest ones at the top

  // Loop throught the sticky items and find the first 3 "published" item idsand break
  $index = 0;
  $cnt = 0;
  foreach ($sticky as $key => $sticky_post_id) {
    if( 'publish' == get_post_status($sticky_post_id) ) {
      $ret[] = $sticky_post_id;
      $cnt++;
    }
    $index++;

    // If we have found 3 published sticky items, bail
    if( $cnt >= 4 ) {
      break;
    }
  }

  if( $cnt <= 4 ) {
    // Slice out the last 3 sticky items of the 4 featured items.
    // - This assumes that the first featured/sticky item is being displayed on the
    //   page by another means and this takes array items 1 - 3 (ignoring the 0 index item)
    $ret = array_slice( $ret, 1, 3 );
  }
  else {
    // return an empty array if there are not at least 4 (sliced to 3, featued items)
    return array();
  }

  return $ret;
}

function post_category_list( $post_id = '', $type = 'text', $args = array() ) {

  $ret = '';
  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  if ( empty( $post_id ) )
    return $ret;

  $categories = \App\get_post_categories( $post_id, $args );

  switch( $type ) {
    case 'list-html':
    case 'list-links':
      $cats_raw = isset( $categories['raw'] ) && is_array( $categories['raw'] ) ? $categories['raw'] : array();

      foreach ($cats_raw as $key => $cat) {
        $id = isset($cat['id']) ? $cat['id'] : '';
        $name = isset($cat['name']) ? $cat['name'] : '';

        $cat_link = get_term_link($id);

        if( $cat_link && $name ) {
          $ret .= '<li class="category-list-item"><a class="category-list-item-link" href="'.$cat_link.'">' .esc_html($name).'</a></li>';
        }
      }

      if( !empty( $ret ) ) {
        $ret = "<ul class='category-list'>$ret</ul>";
      }
    break;
    default:
      $cats_raw = isset( $categories['raw'] ) && is_array( $categories['raw'] ) ? $categories['raw'] : array();

      foreach ($cats_raw as $key => $cat) {
        $id = isset($cat['id']) ? $cat['id'] : '';
        $name = isset($cat['name']) ? $cat['name'] : '';

        $cat_link = get_term_link($id);

        if( $cat_link && $name ) {
          $ret .= '<li class="category-list-item">' .esc_html($name).'</li>';
        }
      }

      if( !empty( $ret ) ) {
        $ret = "<ul class='category-list'>$ret</ul>";
      }
    break;
  }

  return $ret;

}

function resource_type_list( $post_id = '', $type = 'text', $args = array() ) {

  $ret = '';
  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  if ( empty( $post_id ) )
    return $ret;

  $categories = \App\get_resource_type( $post_id, $args );

  switch( $type ) {
    case 'list-html':
    case 'list-links':
      $cats_raw = isset( $categories['raw'] ) && is_array( $categories['raw'] ) ? $categories['raw'] : array();

      foreach ($cats_raw as $key => $cat) {
        $id = isset($cat['id']) ? $cat['id'] : '';
        $name = isset($cat['name']) ? $cat['name'] : '';

        $cat_link = get_term_link($id);

        if( $cat_link && $name ) {
          $ret .= '<li class="category-list-item"><a class="category-list-item-link" href="'.$cat_link.'">' .esc_html($name).'</a></li>';
        }
      }

      if( !empty( $ret ) ) {
        $ret = "<ul class='category-list'>$ret</ul>";
      }
    break;
    default:
      $cats_raw = isset( $categories['raw'] ) && is_array( $categories['raw'] ) ? $categories['raw'] : array();

      foreach ($cats_raw as $key => $cat) {
        $id = isset($cat['id']) ? $cat['id'] : '';
        $name = isset($cat['name']) ? $cat['name'] : '';

        $cat_link = get_term_link($id);

        if( $cat_link && $name ) {
          $ret .= '<li class="category-list-item">' .esc_html($name).'</li>';
        }
      }

      if( !empty( $ret ) ) {
        $ret = "<ul class='category-list'>$ret</ul>";
      }
    break;
  }

  return $ret;

}

function read_time($post_id = '', $args = array()) {

  $ret = '';
  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  if ( empty( $post_id ) )
    return $ret;

  $content = get_post_field( 'post_content', $post_id );
  $word_count = str_word_count( strip_tags( $content ) );
  $readingtime = ceil($word_count / 200);

  if ($readingtime == 1) {
    $timer = " min read";
  } else {
    $timer = " min read";
  }

  $ret = $readingtime . $timer;

  return $ret;
}

function post_image($post_id = '', $image_size = 'full', $args = array()) {

  $ret = '';

  $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

  if ( empty( $post_id ) )
    return $ret;

  $image_id = get_post_thumbnail_id($post_id);

  if( $image_id ) {
    $ret = get_image($image_id, $image_size, $args);

    //$ret = $image_id;
  }

  return $ret;
}

function get_image($img_id, $img_size = 'full', $args = array()) {
  $ret             = '';
  $img_src_attr    = '';
  $img_srcset_attr = '';
  $img_sizes_attr_ = '';
  $img_alt_attr    = '';
  $img_id_attr     = '';
  $img_class_attr  = '';

  $alt_overwrite  = isset($args['alt_overwrite']) && ! empty($args['alt_overwrite']) ? $args['alt_overwrite'] : '';
  $img_icon       = isset($args['icon']) && is_bool($args['icon']) ? $args['icon'] : false;
  $img_meta       = isset($args['image_meta']) ? $args['image_meta'] : array();
  $low_res        = isset($args['low_res']) ? $args['low_res'] : '';
  $class          = isset($args['class']) ? \App\sanatize_class($args['class']) : 'image-default';
  $lazy_load      = isset($args['lazy_load']) ? $args['lazy_load'] : 'placeholder';

  // Get the image src value.
  $img_src_array = wp_get_attachment_image_src( $img_id, $img_size, $img_icon );
  $img_src       = isset($img_src_array[0]) ? $img_src_array[0] : '';

  // Bail if there is no image source value.
  if (empty($img_src)) {
    return '';
  }

  // Get the low resilution image src value.
  $low_res_src_array = wp_get_attachment_image_src( $img_id, $low_res, $img_icon );
  $low_res_src       = isset($low_res_src_array[0]) ? $low_res_src_array[0] : '';

  // Create image src data attributes
  $img_src_attr      = 'src="' . $img_src . '" ';
  $data_first_load   = 'data-first-load="' . $img_src . '" ';
  $lazy_img_src_attr = 'data-src="' . $img_src . '" ';

  // Get the image srcset value and set the srcset attributes.
  $img_srcset           = wp_get_attachment_image_srcset( $img_id, $img_size );
  $img_srcset_attr      = !empty($img_srcset) ? 'srcset="' . $img_srcset . '" ' : '';
  $lazy_img_srcset_attr = !empty($img_srcset) ? 'data-srcset="' . $img_srcset . '" ' : '';

  // Get the image sizes value and set the sizes attributes.
  $img_sizes           = wp_get_attachment_image_sizes( $img_id, $img_size );
  $img_sizes_attr      = ! empty($img_sizes) ? 'sizes="' . $img_sizes . '" ' : '';
  $lazy_img_sizes_attr = ! empty($img_sizes) ? 'sizes="' . $img_sizes . '" ' : '';

  // Get the image alt value and set the alt attribute.
  $img_alt      = get_post_meta($img_id, '_wp_attachment_image_alt', true);
  $img_alt      = ! empty( $alt_overwrite ) ? $alt_overwrite : $img_alt;
  $img_alt_attr = ! empty($img_alt) ? 'alt="' . esc_attr( $img_alt ) . '" ' : '';

  if( $lazy_load ) {
    // If there is a $low_res_src value, set the src attribute to the low res value.
    if (!empty($low_res_src)) {
      $img_src_attr = 'src="' . $low_res_src . '" ';
      $data_first_load   = 'data-first-load="' . $low_res_src . '" ';
    }

    // Set the return value with the lazy load image tag.
    $ret = '<img class="lazy ' . $class . '" ' . $img_alt_attr . $img_src_attr . $lazy_img_src_attr . $data_first_load . $lazy_img_srcset_attr . $lazy_img_sizes_attr  . '/>';
  }
  else {
    // Set the return value with the image tag.
    $ret = '<img class="' . $class . '" ' . $img_alt_attr . $img_src_attr . $img_srcset_attr . $img_sizes_attr . '/>';
  }

  // Return the image tag.
  return $ret;
}

function get_category_sticky_post_ids( $category_id ) {
  $category_sticky = new WP_Query(
    array(
      'fields' => 'ids',
      'post_type' => 'post',
      'posts_per_page' => '6',
      'post_status' => 'publish',
      'tax_query' => array(
        'terms' => null,
        'include_children' => false
      ),
      'meta_query' => array(
        array(
          'key' => 'category_sticky_post',
          'value' => $category_id,
        )
      )
    )
  );

  $category_sticky_ids = $category_sticky->posts;
  wp_reset_postdata();

  return $category_sticky_ids;

  }

function get_category_primary_sticky_post_id( $category_id ) {
  $category_sticky = new WP_Query(
    array(
      'fields' => 'ids',
      'post_type' => 'post',
      'posts_per_page' => '1',
      'post_status' => 'publish',
      'tax_query' => array(
        'terms' => null,
        'include_children' => false
      ),
      'meta_query' => array(
        array(
          'key' => 'category_sticky_post',
          'value' => $category_id,
        )
      )
    )
  );

  $category_sticky_id = $category_sticky->posts;
  $category_sticky_id = isset( $category_sticky_id[0] ) && ! empty( $category_sticky_id[0] ) ? $category_sticky_id[0] : '';
  wp_reset_postdata();

  return $category_sticky_id;

  }

function get_category_secondary_sticky_post_ids( $category_id ) {
  $category_sticky = new WP_Query(
    array(
      'fields' => 'ids',
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post_status' => 'publish',
      'tax_query' => array(
        'terms' => null,
        'include_children' => false
      ),
      'meta_query' => array(
        array(
          'key' => 'category_sticky_post',
          'value' => $category_id,
        )
      )
    )
  );

  $category_sticky_ids = $category_sticky->posts;
  // Make sure there are at least 4 sticky items (a primary and 3 secondary).
  $has_secondary_sticky = isset( $category_sticky_ids[3] ) && ! empty( $category_sticky_ids[3] ) ? true : false;
  wp_reset_postdata();

  if( $has_secondary_sticky ) :
    $category_sticky_ids = array_slice( $category_sticky_ids, 1, 3 );
  else:
    $category_sticky_ids = array();
  endif;

  return $category_sticky_ids;
}

function getRandId($n = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


/**
 * Job sidebar partial
 * Typically called from within templates/template-careers.php
 * These components of the job filters require translated values
 */


/**
 * Builds a translated header over each filter group e.g. "By Locations"
 */
function build_accordion_header($module, $header_text, $en_title) {
  return "<a href='#' id='{$en_title}_CurrentOpeningModule_{$module}ExpandArrow' " .
            "class='accordion__title accordion--active'>" .
             $header_text .
         "</a>";
}

/**
 * Builds the first-most, translated "All" checkbox value for each filter group
 */
function build_accordion_all_checkbox($filter_type) {

  return "
    <div class='accordion__content accordion--active'>
       <div class='accordion__inner'>
          <ul>
            <li>
            <label class='custom-checkbox'>
              <input type='radio' id='{$filter_type}[all]' name='{$filter_type}' value='' class='check-all' checked>
              <span class='custom-checkbox__indicator'></span>All
            </label>
            </li>
          </ul>
        </div>
     </div>";
}

/**
 * Advanced Custom Fields Options function
 * Always fetch an Options field value from the default language
 *
 * https://wpml.org/forums/topic/cant-get-acf-option-page-field-on-front-on-translated-languages/#post-3052016
 */
function get_global_option($name) {
    add_filter('acf/settings/current_language', function() {
      return acf_get_setting('default_language');
    }, 100);
    $option = get_field($name, 'option');
    remove_filter('acf/settings/current_language', function() {
      return acf_get_setting('default_language');
    }, 100);
    return $option;
}
