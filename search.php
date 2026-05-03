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
 * Hook for Blog Start Wrapper
 *
 * Hook exsit_blog_start_wrap
 *
 * @Hooked exsit_blog_start_wrap_cb 10
 */
do_action( 'exsit_blog_archive_start_wrap' );

/**
 * Hook for Blog Column Start Wrapper
 *
 * Hook exsit_blog_col_start_wrap
 *
 * @Hooked exsit_blog_col_start_wrap_cb 10
 */
do_action( 'exsit_blog_col_start_wrap' );

/**
 * Hook for Blog Content (Search Results)
 *
 * Hook exsit_blog_content
 *
 * @Hooked exsit_blog_content_cb 10
 */
do_action( 'exsit_blog_content' );

/**
 * Hook for Blog Pagination
 *
 * Hook exsit_blog_pagination
 *
 * @Hooked exsit_blog_pagination_cb 10
 */
do_action( 'exsit_blog_pagination' );

/**
 * Hook for Blog Column End Wrapper
 *
 * Hook exsit_blog_col_end_wrap
 *
 * @Hooked exsit_blog_col_end_wrap_cb 10
 */
do_action( 'exsit_blog_col_end_wrap' );

/**
 * Hook for Blog Sidebar
 *
 * Hook exsit_blog_sidebar
 *
 * @Hooked exsit_blog_sidebar_cb 10
 */
do_action( 'exsit_page_sidebar' );

/**
 * Hook for Blog End Wrapper
 *
 * Hook exsit_blog_end_wrap
 *
 * @Hooked exsit_blog_end_wrap_cb 10
 */
do_action( 'exsit_blog_archive_end_wrap' );

// Footer
get_footer();