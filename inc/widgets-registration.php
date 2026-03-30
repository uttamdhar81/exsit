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

function exsit_widgets_init() {

    // Blog Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'exsit' ),
        'id'            => 'exsit-blog-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'exsit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Page Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'exsit' ),
        'id'            => 'exsit-page-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your page sidebar.', 'exsit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // WooCommerce Sidebar (add later when shop is supported)
    /*
    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'WooCommerce Sidebar', 'exsit' ),
            'id'            => 'exsit-woo-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your WooCommerce page sidebar.', 'exsit' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
    */
}
add_action( 'widgets_init', 'exsit_widgets_init' );
