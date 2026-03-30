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

// Default blog style
$exsit_blog_style = 'blog-style-one';

// Fetch blog style from options if CSF exists
if ( class_exists( 'CSF' ) ) {
    $blogtab = exsit_opt( 'exsit_blog_setting' );

    if ( is_array( $blogtab ) && isset( $blogtab['exsit_blog_style'] ) ) {
        $exsit_blog_style = $blogtab['exsit_blog_style'];
    }
}

// Load the appropriate template based on blog style
if ( 'blog_style_one' === $exsit_blog_style || 'blog-style-one' === $exsit_blog_style ) {
    get_template_part( 'templates/blog-style-one' );
} elseif ( 'blog_style_two' === $exsit_blog_style || 'blog-style-two' === $exsit_blog_style ) {
    get_template_part( 'templates/blog-style-two' );
} else {
    // Fallback
    get_template_part( 'templates/blog-style-one' );
}