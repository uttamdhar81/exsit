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

        add_theme_support( 'custom-header', array(
            'width'       => 1920,
            'height'      => 300,
            'flex-height' => true,
        ) );

        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff',
        ) );

    }
}

add_action( 'after_setup_theme', 'exsit_setup' );


/**
 * Register block styles & patterns
 */
if ( ! function_exists( 'exsit_register_blocks' ) ) {
    function exsit_register_blocks() {

        // Block Style
        if ( function_exists( 'register_block_style' ) ) {
            register_block_style(
                'core/image',
                array(
                    'name'  => 'exsit-rounded',
                    'label' => esc_html__( 'Rounded Image', 'exsit' ),
                )
            );
        }

        // Block Pattern
        if ( function_exists( 'register_block_pattern' ) ) {
            register_block_pattern(
                'exsit/hero-section',
                array(
                    'title'   => esc_html__( 'Hero Section', 'exsit' ),
                    'content' => '<!-- wp:heading --><h2>Exsit Hero Section</h2><!-- /wp:heading -->',
                )
            );
        }
    }
}
add_action( 'init', 'exsit_register_blocks' );