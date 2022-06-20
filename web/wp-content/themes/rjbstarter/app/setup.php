<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

//use

//\Env::init();

//$envPath = __DIR__.'/../.env';
//$dotenv = new \Dotenv\Dotenv(__DIR__);
//$dotenv = new \Dotenv\Dotenv($envPath);
//$dotenv = new \Dotenv\Dotenv('../../');
//$dotenv->load();

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

  //////
  // The hashbar pro plugin is delivering unminified .css onto the page. I manually moved
  // the pluigin .css into our them.
  //
  // ToDo: Pull the offending .css into the theme via the build process, pulling directly
  //       from the plugin during build.
  //////
  wp_dequeue_style( 'hashbar-notification-bar' );
  wp_deregister_style( 'hashbar-notification-bar' );


  $theme_style_css = get_field('theme_style_css', 'options');
  $theme = isset( $_GET["theme"] ) && ! empty( $_GET["theme"] ) ? trim( htmlspecialchars($_GET["theme"]) ) : '';

  if( 'wireframe' == $theme_style_css && 'dev' !== $theme ) {
    wp_enqueue_style('sage/critical.css', asset_path('styles/critical-wireframe.css'), false, null);

    if( is_home() || is_front_page() ) {
      wp_enqueue_style('sage/critical-home.css', asset_path('styles/critical-wireframe-home.css'), false, null);
    }

    wp_enqueue_style('sage/main.css', asset_path('styles/wireframe.css'), false, null);
  }
  else {
    wp_enqueue_style('sage/critical.css', asset_path('styles/critical.css'), false, null);

    //if( is_home() || is_front_page() ) {
    //  wp_enqueue_style('sage/critical-home.css', asset_path('styles/critical-wireframe-home.css'), false, null);
    //}

    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
  }

  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  // wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
  wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
  //wp_enqueue_script('marketo/forms2.js', '//info.rjbstarter.com/js/forms2/js/forms2.js', ['jquery'], null, true);
  //wp_enqueue_script('marketo/marketo.js', asset_path('scripts/marketo.js'), ['jquery','marketo/forms2.js'], null, true);
  //wp_enqueue_script('font/fontawesome-kit', 'https://kit.fontawesome.com/a44674fc35.js', [], null, true);

  $ajax_params = array(
      'ajax_url' => admin_url('admin-ajax.php'),
      //'ajax_nonce' => wp_create_nonce('ajax_nonce'),
  );

  wp_localize_script('sage/main.js', 'ajax_object', $ajax_params);


}, 100);

/*
add_filter( 'allowed_http_origins', function( $origins ) {
  echo "<br>original origins<br>";
  print_r($origins);
    $origins[] = 'https://kit.fontawesome.com';

  echo "<br>new origins<br>";
  print_r($origins);
    return $origins;
} );
*/

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    //add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_nav_platform' => __('Primary Nav Platform', 'sage'),
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation (Header Right)', 'sage'),
        'blog_primary_navigation' => __('Blog Primary Navigation', 'sage'),
        'blog_category_navigation' => __('Blog Category Navigation', 'sage'),
        'customer_category_navigation' => __('Customer Category Navigation', 'sage'),
        'resource_type_navigation' => __('Resource Type Navigation', 'sage'),
        'footer_primary_navigation' => __('Footer Primary Navigation', 'sage'),
        'footer_publisher_navigation' => __('Footer Publisher Navigation', 'sage'),
        'footer_marketer_navigation' => __('Footer Marketer Navigation', 'sage'),
        'footer_products_navigation' => __('Footer Products Navigation', 'sage'),
        'footer_platform_navigation' => __('Footer Platform Navigation', 'sage'),
        'footer_solutions_navigation' => __('Footer Solutions Navigation', 'sage'),
        'footer_resources_navigation' => __('Footer Resources Navigation', 'sage'),
        'footer_data_navigation' => __('Footer Data Navigation', 'sage'),
        'footer_company_navigation' => __('Footer Company Navigation', 'sage'),
        'footer_legal_navigation' => __('Footer Legal Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // Screen image sizes.
    add_image_size('screen_sm', 500, 312, true);
    add_image_size('screen_md', 800, 500, true);
    add_image_size('screen_lg', 1200, 750, true);
    add_image_size('screen_2x', 2400, 1500, true);

    // Landscape image sizes.
    add_image_size('landscape_sm', 500, 283, true);
    add_image_size('landscape_md', 800, 453, true);
    add_image_size('landscape_lg', 1200, 680, true);
    add_image_size('landscape_2x', 2400, 1360, true);

    // Square image sizes.
    add_image_size('square_sm', 500, 500, true);
    add_image_size('square_md', 800, 800, true);
    add_image_size('square_lg', 1200, 1200, true);
    add_image_size('square_2x', 2400, 2400, true);

    // Panoramic image sizes.
    add_image_size('panoramic_sm', 500, 216, true);
    add_image_size('panoramic_md', 800, 320, true);
    add_image_size('panoramic_lg', 1200, 480, true);
    add_image_size('panoramic_2x', 2400, 960, true);

    // Portrait image sizes.
    add_image_size('portrait_sm', 383, 500, true);
    add_image_size('portrait_md', 613, 800, true);
    add_image_size('portrait_lg', 920, 1200, true);
    add_image_size('portrait_2x', 1840, 2400, true);

    // Landscape image sizes.
    //add_image_size('logo_sm', 480, 220, true);
    //add_image_size('logo_lg', 960, 440, true);
    //add_image_size('logo_xl', 1920, 880, true);


    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    $config_footer = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>'
    ];
    $config_sidebar = [
        'before_widget' => '<section class="widget widget-sidebar %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config_footer);
    register_sidebar([
        'name'          => __('Legal Sidebar', 'sage'),
        'id'            => 'sidebar-legal'
    ] + $config_sidebar);
    register_sidebar([
        'name'          => __('Service Sidebar Left', 'sage'),
        'id'            => 'sidebar-service-left'
    ] + $config_sidebar);
    register_sidebar([
        'name'          => __('Service Sidebar Right', 'sage'),
        'id'            => 'sidebar-service-right'
    ] + $config_sidebar);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Async load CSS.
 * https://roots.io/guides/asynchronous-css-loading-in-sage/
 */
add_filter('style_loader_tag', function (string $html, string $handle): string {

  // Disable adding media="print" onload="this.media='all'" for admin, lando and non pantheon (build/jenkins) environments.
  //if (is_admin() || ! isset( $_ENV['PANTHEON_ENVIRONMENT'] ) || ( isset( $_ENV['PANTHEON_ENVIRONMENT']) && 'lando' ===  $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  //  return $html;
  //}

  // If the css string handle has the word 'critical', dont modify the load.
  $critical = 'critical';
  if (strpos($handle, $critical) !== false) {
    // Bail, returning the original $html.
    return $html;
  }

  // Return the original html for admins and non-pantheon (build) environments
  if( is_admin() || ! isset( $_ENV['PANTHEON_ENVIRONMENT'] )){
    // Bail, returning the original $html.
    return $html;
  }

  $dom = new \DOMDocument();
  $dom->loadHTML($html);
  $tag = $dom->getElementById($handle . '-css');
  $tag->setAttribute('media', 'print');
  $tag->setAttribute('onload', "this.media='all'");
  $tag->removeAttribute('type');
  $tag->removeAttribute('id');
  $html = $dom->saveHTML($tag);

  return $html;

}, 999, 2);

/**
 * Inject critical assets in head as early as possible.
 * https://roots.io/guides/asynchronous-css-loading-in-sage/
 */
add_action('wp_head', function (): void {

  //if (is_admin() || $_GET['no-async']) {
  //    return $html;
  //}
  //if ('development' === env('WP_ENV')) {
  //  return;
  //}

  /*
  if (is_front_page()) {
    $critical_CSS_file = 'styles/critical-home.css';
  } elseif (is_singular()) {
    $critical_CSS_file = 'styles/critical-singular.css';
  } else {
    $critical_CSS_file = 'styles/critical-archive.css';
  }
  */

  ///////
  // ToDo: Fix the critical css.
  //       At the moment only 1 critical css file is getting built, critcial-home.css
  //       So for now just load that in the head on every page as it includes basic layout, nav and header at a min.
  ///////
  /*
  $critical_CSS_file = 'styles/critical.css';
  $critical_CSS = locate_asset($critical_CSS_file);
  if (file_exists($critical_CSS)) {

    //////
    // get_file_contents works on local lando dev, but returns "" on production, changing to <link> until this can be fixed.
    //////
    // echo '<style id="critical-css" data-css-file="'.$critical_CSS_file.'" data-asset-location="'.$critical_CSS.'">' . get_file_contents($critical_CSS_file) . '</style>';

    $critical_CSS_href = '/wp-content/themes/rjbstarter/dist/'. $critical_CSS_file;
    echo '<link rel="stylesheet" href="'. $critical_CSS_href .'" type="text/css" media="all">';
  }

  $critical_home_CSS_file = 'styles/critical-home.css';
  $critical_home_CSS = locate_asset($critical_home_CSS_file);
  if (file_exists($critical_home_CSS)) {
    $critical_home_CSS_href = '/wp-content/themes/rjbstarter/dist/'. $critical_home_CSS_file;
    echo '<link rel="stylesheet" href="'. $critical_home_CSS_href .'" type="text/css" media="all">';
  }
  */

}, 1);

/*
add_action('wp_head', function() {
  $themeFilePath = get_theme_file_path();

  //$qtcDistPath = '/dist/libs/qtc';
  $gglDistPath = '/dist/libs/ggl';
  $cssDistPath = '/dist/libs';

  $gtmAssetPath = asset_path('libs/ggl/gtm.js');
  //$cssPreloadAssetPath = asset_path('libs/cssrelpreload.js');

  $gtmFile = end($gtmAssetPath);
  //$cssPreloadFile = end($cssPreloadAssetPath);

  $preloadScripts = [];
  if (strpos($gtmFile, '.js') !== false) {
    $preloadScripts[] = array(
      'root' => $themeFilePath,
      'path' => $gglDistPath,
      'file' => $gtmFile,
      'full_path' => $themeFilePath . $gglDistPath . $gtmFile,
    );
  }

  //if (strpos($cssPreloadFile, '.js') !== false) {
  //  $preloadScripts[] = array(
  //    'root' => $themeFilePath,
  //    'path' => $cssDistPath,
  //    'file' => $cssPreloadFile,
  //    'full_path' => $themeFilePath . $cssDistPath . $cssPreloadFile,
  //  );
  //}

  foreach ($preloadScripts as $key => $script) {
    if (fopen($script['full_path'], 'r')) {
      echo '<script async=async>' . file_get_contents($script['full_path']) . '</script>';
    }
  }
});
*/

add_action('wp_head', function() {
  global $wp_query;

  if( is_single() || is_page() ) {
    $post_id = get_the_id();
    if( $post_id ) {

      $meta_title         = \App\get_meta_title( $post_id, 0 );
      $topic_cats         = \App\get_post_categories( $post_id, array( 'parent_id' => WP_CATEGORY_TOPIC_ID ) );
      $resource_type_cats = \App\get_post_categories( $post_id, array( 'parent_id' => WP_CATEGORY_RESOURCE_TYPE_ID ) );
      $audience_cats      = \App\get_post_categories( $post_id, array( 'parent_id' => WP_CATEGORY_AUDIENCE_ID ) );

      if ( isset( $meta_title ) && ! empty( $meta_title ) )
        echo '<meta name="content-title" content="' . esc_attr( $meta_title ) . '" />';

      if ( isset( $topic_cats['name_condensed'] ) && ! empty( $topic_cats['name_condensed'] ) )
        echo '<meta name="content-topic" content="' . esc_attr( $topic_cats['name_condensed'] ) . '" />';

      if ( isset( $resource_type_cats['name_condensed'] ) && ! empty( $resource_type_cats['name_condensed'] ) )
        echo '<meta name="content-type" content="' . esc_attr( $resource_type_cats['name_condensed'] ) . '" />';

      if ( isset( $audience_cats['name_condensed'] ) && ! empty( $audience_cats['name_condensed'] ) )
        echo '<meta name="content-audience" content="' . esc_attr( $audience_cats['name_condensed'] ) . '" />';
    }
  }
  elseif ( is_category() || is_archive() ) {
    $cat = $wp_query->get_queried_object();
    $meta_title = isset( $cat->slug ) && ! empty( $cat->slug ) ? str_replace( '-', ' ', $cat->slug ) : '';
    if ( isset( $meta_title ) && ! empty( $meta_title ) )
      echo '<meta name="content-title" content="' . esc_attr( $meta_title ) . '" />';
  }

  elseif( is_home() ) {
    // is_home() in this case is for the main blog feed page (per wordpress), which is the /blog page in our case.
    echo '<meta name="content-title" content="' . esc_attr( 'blog' ) . '" />';
  }
});

/**
 * Initialize ACF Builder
 */
add_action('init', function () {
    collect(glob(config('theme.dir').'/app/acf-{fields,common}/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});

/**
 * Initialize custom tab block.
 */
add_action('init', function() {
  wp_register_script('rjb/blocktabs.js', asset_path('scripts/blocks-tabs.js'));

  register_block_type('rjb/blocktabs-js', [
    'editor_script' => 'rjb/blocktabs.js',
  ]);
});

/**
 * Initialize custom tab block.
 */
add_action('init', function() {
  wp_register_script('rjb/blockslider.js', asset_path('scripts/blocks-slider.js'), asset_path('scripts/blocks-other.js'));

  register_block_type('rjb/blockslider-js', [
    'editor_script' => 'rjb/blockslider.js',
  ]);
});


// Filter wp_nav_menu() to add additional links and other output
// Show only other language in language switcher
// Use the new filter: https://wpml.org/wpml-hook/wpml_active_languages/
add_filter('wp_nav_menu_items', function ($items, $args) {
  // uncomment this to find your theme's menu location
  //echo "args:<pre>"; print_r($args); echo "</pre>";

  $top_nav = '';
  $dropdown = '';
  $lang_nav = '';
  // get languages
  $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );

  //////
  // FIXME: Add a admin option to enable/disbale the language nav in different places.
  //   Currently hard coded here, with false added to secondary_navigation to disable.
  //////
  if(!empty($languages) && $args->theme_location == 'secondary_navigation' && false) {
    foreach($languages as $l){
      if($l['active']){
        $top_nav = '
          <li class="menu-item menu-item-language menu-item-has-children dropdown lang-dropdown lang-flag-dropdown nav-item">
            <a href="' . $l['url'] . '" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-lang" data-g-action="click: language" data-g-label="nav: secondary nav">
              <img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />
            </a>
        '; // the "</li>"" tag is closed later on down the file.
           // FIXME: find a better solution to this uneven open/close.
      }

      if (!$l['active']) {
        $dropdown = $dropdown . '
          <li class="menu-item menu-item-language menu-flag-item">
            <a href="' . $l['url'] . '">
              <img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />
              ' . $l['native_name'] . '
            </a>
          </li>
        ';
      }
    }

    if( $dropdown ) {
      $dropdown = '
        <ul class="dropdown-menu nav-lvl-0 animate slideIn">
          <li id="menu-item-lang-dropdown" class="menu-lang menu-item menu-item-has-children dropdown nav-item">
            <span itemprop="name">Section – Nav Languages</span>
            <ul class="section-menu nav-lvl-1">' . $dropdown . '</ul>
          </li>
        </ul>';

      $lang_nav = $top_nav . $dropdown . "</li>";
    }
  }

  elseif(!empty($languages) && $args->theme_location == 'footer_legal_navigation') {
    foreach($languages as $l){
      if($l['active']){
        $top_nav = '
          <li class="menu-item menu-item-language menu-item-has-children dropup lang-dropdown lang-flag-dropdown nav-item">
            <a href="' . $l['url'] . '" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-lang" data-g-action="click: language" data-g-label="nav: secondary nav">
              <img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />
            </a>
        '; // the "</li>"" tag is closed later on down the file.
           // FIXME: find a better solution to this uneven open/close.
      }

      if (!$l['active']) {
        $dropdown = $dropdown . '
          <li class="menu-item menu-item-language menu-flag-item">
            <a href="' . $l['url'] . '">
              <img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />
              ' . $l['native_name'] . '
            </a>
          </li>
        ';
      }
    }
  }

  if( $dropdown ) {
    $dropdown = '
      <ul class="dropdown-menu nav-lvl-0 animate slideIn">
        <li id="menu-item-lang-dropdown" class="menu-lang menu-item menu-item-has-children dropdown nav-item">
          <span itemprop="name">Section – Nav Languages</span>
          <ul class="section-menu nav-lvl-1">' . $dropdown . '</ul>
        </li>
      </ul>';

    $lang_nav = $top_nav . $dropdown . "</li>";
  }

  if( $lang_nav ) {
    $items = $lang_nav . $items;
  }

  return $items;
}, 10, 2);
