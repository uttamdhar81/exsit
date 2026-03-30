<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'exsit_setup' ) ) {
    function exsit_setup() {

        // Content width
        $GLOBALS['content_width'] = apply_filters( 'exsit_content_width', 751 );

        // Language file
        load_theme_textdomain( 'exsit', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        // Title tag
        add_theme_support( 'title-tag' );

        // Post thumbnails
        add_theme_support( 'post-thumbnails' );

        // Menus
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Primary Menu', 'exsit' ),
            'mobile-menu'  => esc_html__( 'Mobile Menu', 'exsit' ),
        ) );

        // HTML5 support
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Post formats (optional – keep only if you really use them)
        add_theme_support( 'post-formats', array( 'audio', 'video', 'gallery' ) );

        // Custom logo
        add_theme_support( 'custom-logo' );

        // Selective refresh for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Block styles
        add_theme_support( 'wp-block-styles' );

        // Wide/full align images
        add_theme_support( 'align-wide' );

        // Editor styles
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/style-editor.css' );

        // Responsive embeds
        add_theme_support( 'responsive-embeds' );

        // WooCommerce support (only if you plan shop)
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}

add_action( 'after_setup_theme', 'exsit_setup' );
