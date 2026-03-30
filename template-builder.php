<?php
/**
 * Template Name: Template Builder
 * * @Package     : Exsit
 * @Version     : 1.0.1
 * @Author      : Uicobe
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- MAIN WRAPPER  -->
<main id="main" class="site-main">
    <div class="builder-page-wrapper">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();

                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'exsit'),
                    'after' => '</div>',
                ));

            endwhile;
        endif;
        // No wp_reset_postdata() needed here because we are in the main loop
        ?>
    </div>
</main>
<!-- MAIN WRAPPER  -->

<?php
get_footer();