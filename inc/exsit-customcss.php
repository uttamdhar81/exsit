<?php
// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function exsit_add_custom_code_assets() {

    $custom_css = '';
    $custom_js  = '';

    if ( class_exists( 'CSF' ) && function_exists( 'exsit_opt' ) ) {

        $tabbed_options = exsit_opt( 'exsit_custom_code_tab' );

        // Custom CSS
        if ( is_array( $tabbed_options ) && ! empty( $tabbed_options['exsit_css_editor'] ) ) {
            $custom_css .= wp_strip_all_tags( $tabbed_options['exsit_css_editor'] );
        }

        // Custom JS
        if ( is_array( $tabbed_options ) && ! empty( $tabbed_options['exsit_js_editor'] ) ) {
            $custom_js .= wp_kses_post( $tabbed_options['exsit_js_editor'] );
        }
    }

    // Attach inline CSS
    if ( $custom_css !== '' ) {
        wp_add_inline_style( 'exsit-main-style', $custom_css );
    }

    // Attach inline JS
    if ( $custom_js !== '' ) {
        wp_add_inline_script( 'exsit-main-script', $custom_js, 'after' );
    }
}
add_action( 'wp_enqueue_scripts', 'exsit_add_custom_code_assets', 100 );