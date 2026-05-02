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
?>

<div class="col-lg-12 mb-4 pb-1 filter-item no-content">

    <h2 class="nof-title display4-size text-gray-900 fw-600 lh-6 mb-1">
        <?php esc_html_e( 'Nothing Found', 'exsit' ); ?>
    </h2>

    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p class="nof-desc text-gray-900 fw-400 text-gray-700 mt-1 pe-lg-5">
            <?php
            printf(
                wp_kses_post( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'exsit' ) ),
                esc_url( admin_url( 'post-new.php' ) )
            );
            ?>
        </p>

    <?php elseif ( is_search() ) : ?>

        <p class="nof-desc text-gray-900 fw-400 text-gray-700 mt-1 pe-lg-5">
            <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'exsit' ); ?>
        </p>

        <div class="content-none-search mt-4">
            <div class="widget widget_search">
                <?php get_search_form(); ?>
            </div>
        </div>

    <?php else : ?>

        <p class="nof-desc text-gray-900 fw-400 text-gray-700 mt-1 pe-lg-5 mb-0">
            <?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'exsit' ); ?>
        </p>

        <?php get_search_form(); ?>

    <?php endif; ?>

</div>