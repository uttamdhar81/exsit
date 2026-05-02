<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Default
$exsit_blog_style = 'blog-style-one';

// Fetch option
if ( class_exists( 'CSF' ) && function_exists( 'exsit_opt' ) ) {
    $blogtab = exsit_opt( 'exsit_blog_setting' );

    if ( is_array( $blogtab ) && ! empty( $blogtab['exsit_blog_style'] ) ) {
        $exsit_blog_style = sanitize_key( $blogtab['exsit_blog_style'] );
    }
}

// Normalize
$exsit_blog_style = str_replace( '_', '-', $exsit_blog_style );

// Allow only valid styles
$allowed_styles = array( 'blog-style-one', 'blog-style-two' );

if ( ! in_array( $exsit_blog_style, $allowed_styles, true ) ) {
    $exsit_blog_style = 'blog-style-one';
}

// Load template
get_template_part( 'template-parts/content', $exsit_blog_style );