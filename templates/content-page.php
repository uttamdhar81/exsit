<?php
/**
 * Page Content Template
 *
 * @Package     : Exsit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div <?php post_class( 'page-content' ); ?>>

    <?php
    /**
     *
     * Hook for Page Content
     *
     * Hook exsit_page_content
     *
     * @Hooked exsit_page_content_cb 10
     *
     */
    do_action( 'exsit_page_content' );
    ?>
























</div>