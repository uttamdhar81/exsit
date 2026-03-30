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

?>

<div <?php post_class(); ?>>

    <div class="blog-content entry-content">

        <?php
        /**
         * Hook for Blog Details Post Meta
         *
         * Hook exsit_blog_details_post_meta
         *
         * @Hooked exsit_blog_details_post_meta_cb 10
         */
        do_action('exsit_blog_details_post_meta');
        ?>

        <?php
        // Blog Content
        the_content();

        // Link Pages (for paginated posts <!--nextpage-->)
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'exsit'),
            'after' => '</div>',
        ));
        ?>

    </div><!-- .blog-content -->


</div><!-- post_class wrapper -->

<?php
/**
 * Hook for Blog Details Post Navigation Options
 *
 * Hook exsit_blog_details_post_navigation
 *
 * @Hooked exsit_blog_details_post_navigation_cb 10
 */
do_action('exsit_blog_details_post_navigation');

/**
 *
 * Hook for Blog Details Author Bio
 *
 * Hook exsit_blog_details_author_bio
 *
 * @Hooked exsit_blog_details_author_bio_cb 10
 *
 */
do_action('exsit_blog_details_author_bio');

do_action('exsit_blog_details_share_options');
/**
 *
 * Hook for Blog Details Comments
 *
 * Hook exsit_blog_details_comments
 *
 * @Hooked exsit_blog_details_comments_cb 10
 *
 */
do_action('exsit_blog_details_comments');




