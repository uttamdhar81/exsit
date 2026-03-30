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
function exsit_essential_scripts()
{

    // Main theme stylesheet (style.css)
    wp_enqueue_style(
        'exsit-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    

    // Vendor CSS (Splide)
    wp_enqueue_style('exsit-splide-style', get_theme_file_uri('/assets/css/splideslider.css'), array(), '1.8.1');
    wp_enqueue_style( 'exsit-core-style', get_theme_file_uri( '/assets/css/core.css' ), array(), '1.0' );

    
    // Theme CSS
    wp_enqueue_style(
        'exsit-main-style',
        get_theme_file_uri('/assets/css/style.css'),
        array(),
        wp_get_theme()->get('Version')
    );

    // Vendor JS
    wp_enqueue_script('exsit-bootstrap', get_theme_file_uri('/assets/js/bootstrap.bundle.min.js'), array('jquery'), '5.3.2', true);
    wp_enqueue_script('exsit-aos', get_theme_file_uri('/assets/js/aos.js'), array(), '2.3.4', true);
    wp_enqueue_script('exsit-splide', get_theme_file_uri('/assets/js/splide.min.js'), array(), '4.1.4', true);
    wp_enqueue_script('exsit-splide-autoscroll', get_theme_file_uri('/assets/js/splide-extension-auto-scroll.min.js'), array('exsit-splide'), '0.5.3', true);
    wp_enqueue_script('exsit-glightbox', get_theme_file_uri('/assets/js/glightbox.min.js'), array(), '3.2.0', true);

    // WordPress core imagesLoaded
    wp_enqueue_script('imagesloaded');

    // Main JS (depends on vendor libs)
    wp_enqueue_script(
        'exsit-main-script',
        get_theme_file_uri('/assets/js/main.js'),
        array('jquery', 'exsit-bootstrap', 'exsit-aos', 'exsit-splide', 'exsit-glightbox'),
        wp_get_theme()->get('Version'),
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
function exsit_preload_fonts() {

    echo '<link rel="preload" href="' . esc_url( get_theme_file_uri('/assets/fonts/Sora-400.woff2') ) . '" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . esc_url( get_theme_file_uri('/assets/fonts/Sora-500.woff2') ) . '" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . esc_url( get_theme_file_uri('/assets/fonts/Sora-600.woff2') ) . '" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . esc_url( get_theme_file_uri('/assets/fonts/Sora-700.woff2') ) . '" as="font" type="font/woff2" crossorigin>';

}
add_action('wp_head', 'exsit_preload_fonts', 1);