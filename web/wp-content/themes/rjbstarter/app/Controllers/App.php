<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

  public function siteName()
  {
      return get_bloginfo('name');
  }

  public function urlParamVersion()
    {
        $version = isset($_GET['v']) ? $_GET['v'] : '';
        return $version;
    }

  public static function socialLink($social = '')
  {
    $ret = '';
    $twitter_url = get_field('twitter_url', 'options') ?: '';
    $facebook_url = get_field('facebook_url', 'options') ?: '';
    $linkedin_url = get_field('linkedin_url', 'options') ?: '';
    $pinterest_url = get_field('pinterest_url', 'options') ?: '';
    $instagram_url = get_field('instagram_url', 'options') ?: '';
    $glassdoor_url = get_field('glassdoor_url', 'options') ?: '';

    $social_link = array();
    switch($social) {
      case 'twitter':
        if( $twitter_url ) :
          $social_link = array(
            'url' => $twitter_url,
            'icon' => 'fab fa-twitter',
            'title' => 'Twitter',
          );
        endif;
      break;

      case 'linkedin':
        if( $linkedin_url ) :
          $social_link = array(
            'url' => $linkedin_url,
            'icon' => 'fab fa-linkedin',
            'title' => 'LinkedIn',
          );
        endif;
      break;

      case 'facebook':
        if( $facebook_url ) :
          $social_link = array(
            'url' => $facebook_url,
            'icon' => 'fab fa-facebook',
            'title' => 'FaceBook',
          );
        endif;
      break;

      case 'pinterest':
        if( $pinterest_url ) :
          $social_link = array(
            'url' => $pinterest_url,
            'icon' => 'fab fa-pinterest',
            'title' => 'Pinterest',
          );
        endif;
      break;

      case 'instagram':
        if( $instagram_url ) :
          $social_link = array(
            'url' => $instagram_url,
            'icon' => 'fab fa-instagram',
            'title' => 'Instagram',
          );
        endif;
      break;

      case 'glassdoor':
        if( $glassdoor_url ) :
          $social_link = array(
            'url' => $glassdoor_url,
            'icon' => 'fac fa-glassdoor',
            'title' => 'Glassdoor',
          );
        endif;
      break;
    }

    $url   = isset($social_link['url']) ? $social_link['url'] : '';
    $icon  = isset($social_link['icon']) ? $social_link['icon'] : '';
    $title = isset($social_link['title']) ? $social_link['title'] : '';

    if( $url && $icon ) {
      $ret = '<a class="social-icon-link" href="'.$url.'" target="_blank" title="'.$title.'"><i class="'. $icon .'"></i><span class="sr-only">'.$title.' (External link)</span></a>';
    }

    return $ret;
  }

  public static function title()
  {
      if (is_home()) {
          if ($home = get_option('page_for_posts', true)) {
              return get_the_title($home);
          }
          return __('Latest Posts', 'sage');
      }
      if (is_archive()) {
          return get_the_archive_title();
      }
      if (is_search()) {
          return sprintf(__('Search Results for %s', 'sage'), get_search_query());
      }
      if (is_404()) {
          return __('Not Found', 'sage');
      }
      return get_the_title();
  }

  public static function image($img_id, $img_size = 'full', $args = array()) {
    $ret             = '';
    $img_src_attr    = '';
    $img_srcset_attr = '';
    $img_sizes_attr_ = '';
    $img_alt_attr    = '';
    $img_id_attr     = '';
    $img_class_attr  = '';
    $video_preview   = '';

    $alt_overwrite  = isset($args['alt_overwrite']) && ! empty($args['alt_overwrite']) ? $args['alt_overwrite'] : '';
    $img_icon       = isset($args['icon']) && is_bool($args['icon']) ? $args['icon'] : false;
    $img_meta       = isset($args['image_meta']) ? $args['image_meta'] : array();
    $low_res        = isset($args['low_res']) ? $args['low_res'] : '';
    $class          = isset($args['class']) ? \App\sanatize_class($args['class']) : 'image-default';
    $lazy_load      = isset($args['lazy_load']) ? $args['lazy_load'] : 'placeholder';

    if( strpos( $class, 'video-preview-darken' ) || strpos( $class, 'video-preview' ) ) {
      $wrapper_class = 'video-preview';
      if( strpos( $class, 'video-preview-darken' ) ) {
        $wrapper_class .= ' video-preview-darken';
      }
      $video_preview = '<div class="'.$wrapper_class.'"><div class="img-icon-wrapper"><i class="fal fa-play-circle"></i></div></div>';
    }

    // Get the image src value.
    $img_src_array = wp_get_attachment_image_src( $img_id, $img_size, $img_icon );
    //print_r($img_src_array);
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

    if( 'placeholder' === $lazy_load ) {
      // If there is a $low_res_src value, set the src attribute to the low res value.
      if (!empty($low_res_src)) {
        $img_src_attr = 'src="' . $low_res_src . '" ';
        $data_first_load   = 'data-first-load="' . $low_res_src . '" ';
      }

      // Set the return value with the lazy load image tag.
      $ret = '<img class="lazy ' . $class . '" ' . $img_alt_attr . $img_src_attr . $lazy_img_src_attr . $data_first_load . $lazy_img_srcset_attr . $lazy_img_sizes_attr  . '/>';
    }
    elseif( 'no-lazy-load' === $lazy_load ) {
      // Set the return value with the image tag.
      $ret = '<img class="' . $class . '" ' . $img_alt_attr . $img_src_attr . $img_srcset_attr . $img_sizes_attr . '/>';
    }
    else {
      $ret = '<img class="lazy ' . $class . '" ' . $img_alt_attr . $lazy_img_src_attr . $lazy_img_srcset_attr . $lazy_img_sizes_attr  . '/>';
    }

    if( $video_preview ) {
      $ret = $ret . $video_preview;
    }

    // Return the image tag.
    return $ret;
  }

  /**
   * Convert a string or array of strings into html display ready
   *
   * @param  mixed $values a string or array of strings to be sanitized and returned for html display.
   * @param  string $deliminator the deliminator value to be used for string explosion
   * @return string a sanatized string
   */
  public static function sanatize_attrs($attr_values = '', $deliminator = ' ')
  {
    return \App\sanatize_attributes($attr_values, $deliminator);
  }

  /**
   * Convert a string or array of strings into html display ready
   *
   * @param  mixed $class a string or array of strings to be sanitized and returned for html display.
   * @param  string $deliminator the deliminator value to be used for string explosion
   * @return string a sanatized string
   */
  public static function context_class($base, $context = array(), $deliminator = ' ')
  {
    $ret = '';
    $context_array = array();

    // Bail if the class var is empty.
    if (empty($base))
      return $ret;

    $context_array[] = $base;

    // If $attr_values is not an array, convert it to one uding the $deliminator
    if (!is_array($context)) {
      $context = explode($deliminator, trim($context));
    }

    foreach ($context as $key => $value) {
      $context_array[] = $base . '-' . $value;
    }

    return \App\sanatize_attributes($context_array);
  }

  public static function card_wrapper_link_open($link = array(), $args = array()) {
    $ret = '';
    $url = isset( $link['url'] ) ? $link['url'] : '';
    $target = isset( $link['target'] )  && ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
    $data_attrs = '';
    $class_array = array('wrapper-link', 'card-wrapper-link');
    $class = '';

    if( empty( $url ) ) {
      return $ret;
    }

    $link_modal = isset( $args['link_modal'] ) ? $args['link_modal'] : '';
    $data_attrs_array = isset( $args['data'] ) ? $args['data'] : array();
    $data_modal_attrs = '';

    if( !empty( $data_attrs_array ) ) {
      $data_attrs = \App\sanatize_data_attr_array($data_attrs_array);
    }

    if( !empty( $link_modal ) ) {
      $url = '#';

      $data_modal_attrs_array = array(
        'toggle' => 'modal',
        'target' => '#' . $link_modal,
      );
      $data_modal_attrs = \App\sanatize_data_attr_array($data_modal_attrs_array);
    }

    $class = \App\sanatize_class_depth($class_array);
    $ret = '<a class="'.$class.'" href="' . $url . '"' . $data_attrs . ' ' . $data_modal_attrs . $target . '>';

    return $ret;
  }

  public static function button($link = array(), $args = array()) {
      $ret             = '';

      $text = isset( $link['title'] ) ? $link['title'] : '';
      $url = isset( $link['url'] ) ? $link['url'] : '';
      $target = isset( $link['target'] )  && ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
      $data_attrs = '';
      $class_array = array();
      $class = '';
      $icon_before = '';
      $icon_after = '';

      if( empty( $url ) || empty( $text ) ) {
        return $ret;
      }

      $wrapper_link = isset( $args['wrapper_link'] ) ? $args['wrapper_link'] : false;
      $link_class = isset( $args['link_class'] ) ? $args['link_class'] : '';
      $link_options = isset( $args['link_options'] ) ? $args['link_options'] : array();
      $link_modal = isset( $args['link_modal'] ) ? $args['link_modal'] : '';
      $link_style = isset( $args['link_style'] ) ? $args['link_style'] : '';
      $button_style = isset( $args['button']['style'] ) ? $args['button']['style'] : '';
      $button_size = isset( $args['button']['size'] ) ? $args['button']['size'] : '';
      $text_style = isset( $args['text']['style'] ) ? $args['text']['style'] : '';
      $text_size = isset( $args['text']['size'] ) ? $args['text']['size'] : '';
      $font_weight = isset( $args['font']['weight'] ) ? $args['font']['weight'] : '';
      $icon_position = isset( $args['icon']['position'] ) ? $args['icon']['position'] : '';
      $icon_class = isset( $args['icon']['class'] ) ? $args['icon']['class'] : '';
      $icon_style = isset( $args['icon']['style'] ) ? $args['icon']['style'] : '';
      $data_attrs_array = isset( $args['data'] ) ? $args['data'] : array();
      $data_modal_attrs = '';

      if( !empty( $data_attrs_array ) ) {
        $data_attrs = \App\sanatize_data_attr_array($data_attrs_array);
      }

      if( !empty( $link_modal ) ) {
        $url = '#';


        $data_modal_attrs_array = array(
          'toggle' => 'modal',
          'target' => '#' . $link_modal,
        );
        $data_modal_attrs = \App\sanatize_data_attr_array($data_modal_attrs_array);
      }

      if( !empty( $link_class ) ) {
        $class_array[] = $link_class;
      }

      if( !empty( $link_style ) ) {
        $class_array[] = $link_style;
      }

      if( !empty( $font_weight ) ) {
        $class_array[] = $font_weight;
      }

      if( !empty( $text_style ) ) {
        $class_array[] = $text_style;

        if( !empty( $text_size ) ) {
          $class_array[] = 'link-' . $text_size;
        }
      }

      if( !empty( $button_style ) ) {
        $class_array[] = $button_style;

        if( !empty( $button_size ) ) {
          $class_array[] = 'btn-' . $button_size;
        }
      }

      if( !empty( $link_options ) ) {
        $class_array[] = $link_options;
      }

      if( !empty( $icon_position ) ) {
        $class_array[] = $icon_position;
      }

      if( $wrapper_link ) {
        $class_array[] = 'wrapped-link';
      }

      $icon_style_class = \App\sanatize_class_depth($icon_style);
      $class = \App\sanatize_class_depth($class_array);

      if( !empty( $icon_class ) && ( $icon_position === 'icon-before' || $icon_position === 'icon-after' )  ) {
        $icon_class = \App\sanatize_class_depth($icon_class);

        switch($icon_position) {
          case 'icon-before':
            $icon_before = '<i class="' . $icon_class . '"></i>';

            if( $icon_style_class )
              $icon_before = '<span class="icon-wrap ' . $icon_style_class . '">' . $icon_before . '</span>';
            break;
          case 'icon-after':
            $icon_after = '<i class="' . $icon_class . '"></i>';

            if( $icon_style_class )
              $icon_after = '<span class="icon-wrap ' . $icon_style_class . '">' . $icon_after . '</span>';
            break;
        }
      }

      if( $wrapper_link ) {
        // If wrapped link is true, that means the button/link is wrapped in a link and we only want
        // this item to look like a button/link.  HTML does not allow <a><a></a></a> structure.
        $ret = '<div class="'.$class.'">' . $icon_before . $text . $icon_after . '</div>';
      }
      else {
        $ret = '<a class="'.$class.'" href="' . $url . '"' . $data_attrs . ' ' . $data_modal_attrs . $target . '>' . $icon_before . $text . $icon_after . '</a>';
      }

      return $ret;
    }

  public static function icon($class = '') {
    $ret = '';

    if( !empty( $class ) ) {
      $class = \App\sanatize_class_depth($class);
      $ret = '<i class="' . $class . '"></i>';
    }

    return $ret;
  }

  public static function read_more( $type = 'text', $post_id = '', $args = array() ) {
    $ret = '';
    $post_id = ! empty( $post_id ) ? $post_id : get_the_id();

    if( ! $post_id )
      return $ret;

    $content_cat = \App\get_primary_category($post_id);
    $content_type = isset( $content_cat['type'] ) && ! empty( $content_cat['type'] ) ? $content_cat['type'] : 'article';
    $more_text = \App\more_text($content_type);

    switch( $type ) {
      case 'text-no-link':
        $ret = '<span class="more">'.$more_text.'</span>';
      break;
      default:
        $url = get_permalink($post_id);
        $ret = '<a href="'.$url.'" class="more">'.$more_text.'</a>';
      break;
    }

    return $ret;
  }

  public static function list_item( $style = '', $args = array() ) {
    $ret      = '';
    $headline = isset($args['headline']) ? $args['headline'] : '';
    $text     = isset($args['text']) ? $args['text'] : '';
    $icon     = isset($args['icon']) ? $args['icon'] : '';

    // bail if there is no list headline or text
    if( empty( $headline ) && empty( $text ) ) :
      return $ret;
    endif;

    if( ! empty( $icon ) ) :
      $ret .= '<div class="icon-wrapper text-primary"><i class="fas fa-check-circle"></i></div>';
    endif;

    if( ! empty( $headline ) ) :
      $ret .= '<h5 class="headline headline-list">' . $headline . '</h5>';
    endif;

    if( ! empty( $text ) ) :
      $ret .= '<div class="text text-list">' . $text . '</div>';
    endif;

    if( ! empty( $ret ) ) :
      $ret = '<li class="list-item">' . $ret . '</li>';
    endif;
    return $ret;
  }

  public static function post_categories( $type = 'text', $post_id = '', $args = array() ) {

    $ret = '';
    $post_id = isset( $post_id ) && ! empty( $post_id ) ? $post_id : get_the_id();

    if ( empty( $post_id ) )
      return $ret;

    $categories = \App\get_post_categories( $post_id, $args );

    switch( $type ) {
      case 'list-html':
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

  public static function post_social( $type = '', $post_id = '', $args = array() ) {

    $title = get_the_title();
    $title_encoded = urlencode($title);
    $permalink = get_the_permalink();

    $g_action_prefix = isset($args['g_action_prefix_li']) && ! empty( $args['g_action_prefix_li'] ) ? $args['g_action_prefix_li'] : 'share';
    $g_label_prefix = isset($args['g_label_prefix']) && ! empty( $args['g_label_prefix'] ) ? $args['g_label_prefix'] : 'social share';
    $g_label_li = isset($args['g_label_li']) && ! empty( $args['g_label_li'] ) ? $args['g_label_li'] : 'linkedin';
    $g_label_fb = isset($args['g_label_fb']) && ! empty( $args['g_label_fb'] ) ? $args['g_label_fb'] : 'facebook';
    $g_label_tw = isset($args['g_label_tw']) && ! empty( $args['g_label_tw'] ) ? $args['g_label_tw'] : 'twitter';

    $g_data_li = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label_li, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
    $g_data_tw = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label_tw, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));
    $g_data_fb = \App\get_post_data_attributes(get_the_id(), $data_attr_args = array('g_label' => $g_label_fb, 'g_action_prefix' => $g_action_prefix, 'g_label_prefix' => $g_label_prefix));

    return '
      <a class="social-share social-share-linkedin" data-share-li="' . $permalink . '" '.$g_data_li.'><i class="fab fa-linkedin"></i></a>
      <a class="social-share social-share-twitter" href="https://twitter.com/intent/tweet/?url='.$permalink.'&text='.$title_encoded.'" data-share-tw="' . $permalink . '" '.$g_data_tw.'><i class="fab fa-twitter"></i></a>
      <a class="social-share social-share-facebook" data-share-fb="' . $permalink . '" '.$g_data_fb.'><i class="fab fa-facebook"></i></a>
    ';

  }

  public static function reading_time($post_id = '', $args = array()) {

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

  /**
 * Primary Nav Menu arguments
 * @return array
 */
  public function primarymenu() {

    $version = isset($_GET['v']) ? $_GET['v'] : '';

    switch( $version ) {
      case 'platform':
        $args = array(
          'theme_location'  => 'primary_nav_platform',
          'depth'           => 3,
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'primaryNavigation',
          'menu_class'      => 'navbar-nav nav-banner nav-banner-primary mr-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new \App\WP_Bootstrap_Navwalker(),
        );

        break;

      default:
        $args = array(
          'theme_location'  => 'primary_navigation',
          'depth'           => 3,
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'primaryNavigation',
          'menu_class'      => 'navbar-nav nav-banner nav-banner-primary mr-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new \App\WP_Bootstrap_Navwalker(),
        );

    }


    return $args;
  }

  /**
 * Primary Nav Menu arguments
 * @return array
 */
  public function blogprimarymenu() {
    $args = array(
      'theme_location'  => 'blog_primary_navigation',
      'depth'           => 3,
      'container'       => 'div',
      'container_id'    => 'blogPrimaryNavigation',
      'menu_class'      => 'navbar-nav nav-banner mr-auto',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new \App\WP_Bootstrap_Navwalker(),
    );
    return $args;
  }

  /**
 * Primary Nav Menu arguments
 * @return array
 */
  public function blogcategorymenu() {
    $args = array(
      'theme_location' => 'blog_category_navigation',
      'menu_class'     => 'navbar-nav blog-nav secondary-nav category-nav',
      'depth'          => 2,
      'walker'         => new \App\wp_bootstrap4_navwalker(), // added via composer "mwdelaney/sage-bootstrap4-navwalker": "^1.5.1"
    );
    return $args;
  }

  /**
 * Primary Nav Menu arguments
 * @return array
 */
  public function customercategorymenu() {
    $args = array(
      'theme_location' => 'customer_category_navigation',
      'menu_class'     => 'navbar-nav customer-nav secondary-nav category-nav',
      'depth'          => 2,
      'walker'         => new \App\wp_bootstrap4_navwalker(), // added via composer "mwdelaney/sage-bootstrap4-navwalker": "^1.5.1"
    );
    return $args;
  }

  /**
 * Primary Nav Menu arguments
 * @return array
 */
  public function resourcetypemenu() {
    $args = array(
      'theme_location' => 'resource_type_navigation',
      'menu_class'     => 'navbar-nav resource-nav secondary-nav category-nav',
      'depth'          => 2,
      'walker'         => new \App\wp_bootstrap4_navwalker(), // added via composer "mwdelaney/sage-bootstrap4-navwalker": "^1.5.1"
    );
    return $args;
  }

  /*
  public static function post_primary_feature() {
    $ret = '';
    $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
    rsort( $sticky ); // Sort the stickies with the newest ones at the top

    // Slice out the first 4 sticky items (4 featured items)
    $sticky = array_slice( $sticky, 0, 1 );
    return $ret;
  }
  */

  public static function post_secondary_feature() {

    $ret = '';

    $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
    rsort( $sticky ); // Sort the stickies with the newest ones at the top

    // Slice out the first 4 sticky items (4 featured items)
    $sticky = array_slice( $sticky, 1, 3 );

    return $ret;
  }

}

/*
function latest_sticky_post() {

  // Get all sticky posts
  $sticky = get_option( 'sticky_posts' );

  // Sort the stickies with the newest ones at the top
  rsort( $sticky );

  // Get the 5 newest stickies (change 5 for a different number)
  $sticky = array_slice( $sticky, 0, 5 );

  // Query sticky posts //
  $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
  // The Loop
  if ( $the_query->have_posts() ) {
      $return .= '<ul>';
      while ( $the_query->have_posts() ) {
          $the_query->the_post();
          $return .= '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a><br />' . get_the_excerpt(). '</li>';

      }
      $return .= '</ul>';

  } else {
      // no posts found
  }
  // Restore original Post Data
  wp_reset_postdata();

  return $return;

}
add_shortcode('latest_stickies', 'wpb_latest_sticky');

}
*/
