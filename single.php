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

/**
 * Hook for Blog Details Wrapper Start
 *
 * Hook exsit_blog_details_wrapper_start
 *
 * @Hooked exsit_blog_details_wrapper_start_cb 10
 */
do_action( 'exsit_blog_details_wrapper_start' );


/**
 * Hero Header (Category + Title + Excerpt)
 */
do_action( 'exsit_blog_details_hero' );
/**
 * Hook for Blog Details Column Start
 *
 * Hook exsit_blog_details_col_start
 *
 * @Hooked exsit_blog_details_col_start_cb 10
 */
do_action( 'exsit_blog_details_col_start' );

/**
 * Hook for Blog Details Content
 *
 * Hook exsit_blog_details_content
 *
 * @Hooked templates/content-single.php
 */
while ( have_posts() ) :
    the_post();

    get_template_part( 'templates/content', 'single' );

endwhile;

/**
 * Hook for Blog Details Column End
 *
 * Hook exsit_blog_details_col_end
 *
 * @Hooked exsit_blog_details_col_end_cb 10
 */
do_action( 'exsit_blog_details_col_end' );

/**
 * Hook for Blog Details Sidebar
 *
 * Hook exsit_blog_details_sidebar
 *
 * @Hooked exsit_blog_details_sidebar_cb 10
 */
do_action( 'exsit_blog_details_sidebar' );

/**
 *
 * Hook for Blog Details Related Post
 *
 * Hook exsit_blog_details_related_post
 *
 * @Hooked exsit_blog_details_related_post_cb 10
 *
 */
do_action('exsit_blog_details_related_post');

/**
 * Hook for Blog Details Wrapper End
 *
 * Hook exsit_blog_details_wrapper_end
 *
 * @Hooked exsit_blog_details_wrapper_end_cb 10
 */
do_action( 'exsit_blog_details_wrapper_end' );



// Footer
get_footer();