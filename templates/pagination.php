<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit();
}

// Only show pagination if there are multiple pages
if (get_the_posts_pagination()):
    ?>

    <!-- Post Pagination -->
    <nav class="exsit-pagination-wrap" role="navigation" aria-label="<?php esc_attr_e('Posts navigation', 'exsit'); ?>">

        <?php
        // Add class to prev/next links
        if (!function_exists('exsit_posts_link_attributes')) {
            add_filter('next_posts_link_attributes', 'exsit_posts_link_attributes');
            add_filter('previous_posts_link_attributes', 'exsit_posts_link_attributes');
            function exsit_posts_link_attributes()
            {
                return 'class="pagi-btn"';
            }
        }

        // Optional arrows (you can replace with icons)
        if (get_previous_posts_link()) {
            previous_posts_link('<span class="pagi-btn prev" aria-hidden="true">&laquo;</span><span class="screen-reader-text">' . esc_html__('Previous page', 'exsit') . '</span>');
        }

        // Your existing helper outputs: <ul class="exsit-pagination">...</ul>
        exsit_pagination();

        if (get_next_posts_link()) {
            next_posts_link('<span class="pagi-btn next" aria-hidden="true">&raquo;</span><span class="screen-reader-text">' . esc_html__('Next page', 'exsit') . '</span>');
        }
        ?>

    </nav>
    <!-- End of Post Pagination -->

<?php endif; ?>