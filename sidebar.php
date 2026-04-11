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

// Get post meta (priority)
$meta = get_post_meta(get_the_ID(), '_exsit_blog_layout', true);

// Get blog settings
$blogtab = class_exists( 'CSF' ) ? exsit_opt( 'exsit_blog_setting' ) : array();

$exsit_blog_sidebar    = $blogtab['exsit_blog_sidebar'] ?? null;
$exsit_single_sidebar  = $blogtab['exsit_blog_single_sidebar'] ?? null;
$exsit_page_sidebar    = class_exists( 'CSF' ) ? exsit_opt( 'exsit_page_sidebar' ) : null;


// =========================
// PRIORITY 1: POST META
// =========================
if ( is_single() ) {

    // If explicitly NO sidebar
    if ( $meta === 'none' ) {
        return;
    }

    // If left/right → ALWAYS show sidebar (ignore CSF)
    if ( in_array($meta, ['left', 'right'], true) ) {
        // continue (do not return)
    } else {
        // =========================
        // PRIORITY 2: CSF
        // =========================
        if ( '1' === (string) $exsit_single_sidebar ) {
            return;
        }
    }

} elseif ( is_page() ) {

    if ( '1' === (string) $exsit_page_sidebar ) {
        return;
    }

} else {

    if ( '1' === (string) $exsit_blog_sidebar ) {
        return;
    }
}

?>

<!-- Sidebar -->
<aside class="sidebar-area sticky-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'exsit' ); ?>">

    <?php 
    if ( is_active_sidebar( 'exsit-blog-sidebar' ) ) {
        dynamic_sidebar( 'exsit-blog-sidebar' );
    } else {
        echo '<p class="text-muted">Add widgets to Blog Sidebar</p>';
    }
    ?>

</aside>
<!-- Sidebar -->