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

/**
* Hook for preloader
*/
add_action( 'wp_body_open', 'exsit_preloader_wrap' );
/**
* Hook for Header
*/
add_action( 'exsit_header', 'exsit_header_cb', 10 );

/**
 * Main wrapper
 */
add_action( 'exsit_main_wrapper_start', 'exsit_main_wrapper_start_cb', 10 );
add_action( 'exsit_main_wrapper_end', 'exsit_main_wrapper_end_cb', 10 );

/**
 * Blog archive hooks
 */
add_action( 'exsit_blog_start_wrap', 'exsit_blog_start_wrap_cb', 10 );
add_action( 'exsit_blog_col_start_wrap', 'exsit_blog_col_start_wrap_cb', 10 );
add_action( 'exsit_blog_content', 'exsit_blog_content_cb', 10 );
add_action( 'exsit_blog_pagination', 'exsit_blog_pagination_cb', 10 );
add_action( 'exsit_blog_col_end_wrap', 'exsit_blog_col_end_wrap_cb', 10 );
add_action( 'exsit_blog_sidebar', 'exsit_blog_sidebar_cb', 10 );
add_action( 'exsit_blog_end_wrap', 'exsit_blog_end_wrap_cb', 10 );

/**
 * Blog single (details) layout
 */
add_action( 'exsit_blog_details_wrapper_start', 'exsit_blog_details_wrapper_start_cb', 10 );
add_action( 'exsit_blog_details_col_start', 'exsit_blog_details_col_start_cb', 10 );
add_action( 'exsit_blog_details_col_end', 'exsit_blog_details_col_end_cb', 10 );
add_action( 'exsit_blog_details_wrapper_end', 'exsit_blog_details_wrapper_end_cb', 10 );

add_action( 'exsit_blog_details_sidebar', 'exsit_blog_details_sidebar_cb', 10 );
// add_action( 'exsit_blog_details_post_meta', 'exsit_blog_details_post_meta_cb', 10 );
add_action( 'exsit_blog_details_post_navigation', 'exsit_blog_details_post_navigation_cb', 10 );
add_action( 'exsit_blog_details_author_bio', 'exsit_blog_details_author_bio_cb', 10 );
// add_action( 'exsit_blog_details_tags_and_categories', 'exsit_blog_details_tags_and_categories_cb', 10 );
add_action( 'exsit_blog_details_related_post', 'exsit_blog_details_related_post_cb', 10 );
add_action( 'exsit_blog_details_comments', 'exsit_blog_details_comments_cb', 10 );
add_action( 'exsit_blog_details_hero', 'exsit_blog_details_hero_cb', 10 );
add_action( 'exsit_blog_details_share_options', 'exsit_blog_details_share_options_cb', 10 );

/**
 * Blog card components (loop items)
 */
add_action( 'exsit_blog_post_thumb', 'exsit_blog_post_thumb_cb', 10 );
add_action( 'exsit_blog_post_meta', 'exsit_blog_post_meta_cb', 20 );
add_action( 'exsit_blog_post_content', 'exsit_blog_post_content_cb', 30 );
add_action( 'exsit_blog_post_author', 'exsit_blog_post_author_cb', 40 );
add_action( 'exsit_blog_postexcerpt_read_content', 'exsit_blog_postexcerpt_read_content_cb', 50 );

/**
 * Pages
 */

add_action( 'exsit_page_start_wrap', 'exsit_page_start_wrap_cb', 10 );
add_action( 'exsit_page_col_start_wrap', 'exsit_page_col_start_wrap_cb', 10 );
add_action( 'exsit_page_content', 'exsit_page_content_cb', 10 );
add_action( 'exsit_page_sidebar', 'exsit_page_sidebar_cb', 10 );
add_action( 'exsit_page_col_end_wrap', 'exsit_page_col_end_wrap_cb', 10 );
add_action( 'exsit_page_end_wrap', 'exsit_page_end_wrap_cb', 10 );

/**
 * Footer extras
 */

add_action( 'exsit_back_to_top', 'exsit_back_to_top_cb', 10 );
add_action( 'exsit_footer_content', 'exsit_footer_content_cb', 10 );

// Add Meta Box Layout Selector for Single Blog Post

add_action('add_meta_boxes', 'exsit_add_blog_layout_meta_box');
add_action('save_post', 'exsit_save_blog_layout_meta');