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

// Header
get_header();


do_action('exsit_page_title');
/**
 *
 * Hook for Page Start Wrapper
 *
 * Hook exsit_page_start_wrap
 *
 * @Hooked exsit_page_start_wrap_cb 10
 *
 */
do_action( 'exsit_page_start_wrap' );

/**
 *
 * Hook for Column Start Wrapper
 *
 * Hook exsit_page_col_start_wrap
 *
 * @Hooked exsit_page_col_start_wrap_cb 10
 *
 */
do_action( 'exsit_page_col_start_wrap' );

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        // Page Content
        get_template_part( 'templates/content', 'page' );
    }
    wp_reset_postdata();
} else {
    get_template_part( 'templates/content', 'none' );
}

/**
 *
 * Hook for Column End Wrapper
 *
 * Hook exsit_page_col_end_wrap
 *
 * @Hooked exsit_page_col_end_wrap_cb 10
 *
 */
do_action( 'exsit_page_col_end_wrap' );

/**
 *
 * Hook for Page Sidebar
 *
 * Hook exsit_page_sidebar
 *
 * @Hooked exsit_page_sidebar_cb 10
 *
 */
do_action( 'exsit_page_sidebar' );

/**
 *
 * Hook for Page End Wrapper
 *
 * Hook exsit_page_end_wrap
 *
 * @Hooked exsit_page_end_wrap_cb 10
 *
 */
do_action( 'exsit_page_end_wrap' );

// Footer
get_footer();