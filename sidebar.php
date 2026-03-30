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

// No widgets? No sidebar.
if ( ! is_active_sidebar( 'exsit-blog-sidebar' ) ) {
    return;
}

// Get blog settings
$blogtab = class_exists( 'CSF' ) ? exsit_opt( 'exsit_blog_setting' ) : array();

$exsit_blog_sidebar        = $blogtab['exsit_blog_sidebar'] ?? null;
$exsit_single_sidebar     = $blogtab['exsit_blog_single_sidebar'] ?? null;
$exsit_page_sidebar       = class_exists( 'CSF' ) ? exsit_opt( 'exsit_page_sidebar' ) : null;

// Respect sidebar visibility per page type
if ( is_single() ) {
    if ( '1' === (string) $exsit_single_sidebar ) {
        return;
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
<div class="col-lg-4">
    <aside class="sidebar-area sticky-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'exsit' ); ?>">
        <?php dynamic_sidebar( 'exsit-blog-sidebar' ); ?>
    </aside>
</div>
<!-- Sidebar -->