<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});


/**
 * Admin assets
 */
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('sage/admin.css', asset_path('styles/admin.css'), false, null);

    //wp_enqueue_script('font/fontawesome-kit', 'https://kit.fontawesome.com/a44674fc35.js', [], null, true);
});
