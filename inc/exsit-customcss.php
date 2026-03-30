<?php
// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function exsit_common_custom_assets() {

    $custom_css = '';
    $custom_js  = '';

    if ( class_exists( 'CSF' ) && function_exists( 'exsit_opt' ) ) {

        $tabbed_options = exsit_opt( 'exsit_custom_code_tab' );

        // Custom CSS
        if ( is_array( $tabbed_options ) && ! empty( $tabbed_options['exsit_css_editor'] ) ) {
            $custom_css .= $tabbed_options['exsit_css_editor'];
        }

        // Custom JS
        if ( is_array( $tabbed_options ) && ! empty( $tabbed_options['exsit_js_editor'] ) ) {
            $custom_js .= $tabbed_options['exsit_js_editor'];
        }

    }

    // Attach inline CSS to your already-registered main style
    if ( ! empty( $custom_css ) ) {
        wp_add_inline_style( 'exsit-style', $custom_css ); // <-- use your real handle
    }

    // Attach inline JS to your already-registered main script
    if ( ! empty( $custom_js ) ) {
        wp_add_inline_script( 'exsit-main-script', $custom_js );
    }
}
add_action( 'wp_enqueue_scripts', 'exsit_common_custom_assets', 100 );