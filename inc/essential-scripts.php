<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles
 */
function exsit_essential_scripts(){
    // Main theme stylesheet (style.css)
    $version = wp_get_theme()->get('Version');

    // Styles
    wp_enqueue_style('exsit-style', get_stylesheet_uri(), array(), $version);
    wp_enqueue_style('exsit-core-style', get_theme_file_uri('/assets/css/core.css'), array('exsit-style'), $version);
    wp_enqueue_style('exsit-main-style', get_theme_file_uri('/assets/css/style.css'), array('exsit-core-style'), $version);


    // Vendor JS
    wp_enqueue_script('exsit-bootstrap', get_theme_file_uri('/assets/js/bootstrap.bundle.min.js'), array('jquery'), $version, true);

    // WordPress core imagesLoaded
    wp_enqueue_script('imagesloaded');

    // Main JS (depends on vendor libs)
    wp_enqueue_script(
        'exsit-main-script',
        get_theme_file_uri('/assets/js/main.js'),
        array('jquery', 'exsit-bootstrap'),
        $version,
        true
    );
    


    // Comment reply (WordPress core)
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'exsit_essential_scripts', 99);


/**
 * Preload local fonts
 */
function exsit_preload_fonts( $html, $handle ) {
    if ( 'exsit-main-style' === $handle ) {
        $fonts = array(
            '/assets/fonts/Sora-400.woff2',
            '/assets/fonts/Sora-500.woff2',
            '/assets/fonts/Sora-600.woff2',
            '/assets/fonts/Sora-700.woff2',
        );

        foreach ( $fonts as $font ) {
            $html .= '<link rel="preload" href="' . esc_url( get_theme_file_uri( $font ) ) . '" as="font" type="font/woff2" crossorigin>';
        }
    }
    return $html;
}
add_filter( 'style_loader_tag', 'exsit_preload_fonts', 10, 2 );