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
if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

    ?>

    <!-- Post Pagination -->
    <nav class="exsit-pagination-wrap" role="navigation" aria-label="<?php esc_attr_e('Posts navigation', 'exsit'); ?>">

        <?php
        
        // Your existing helper outputs: <ul class="exsit-pagination">...</ul>
        if ( function_exists( 'exsit_pagination' ) ) {
            exsit_pagination();
        }

        ?>


    </nav>
    <!-- End of Post Pagination -->

<?php endif; ?>