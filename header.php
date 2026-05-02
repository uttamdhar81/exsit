<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }

    /**
    *
    * exsit header
    *
    * Hook exsit_header
    *
    * @Hooked exsit_header_cb 10
    *
    */
    do_action( 'exsit_header' );

    