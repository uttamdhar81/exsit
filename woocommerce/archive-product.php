<?php
/** 
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * @link https://woocommerce.com/document/template-structure/
 * @package     Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */


defined( 'ABSPATH' ) || exit;

get_header( 'shop' );


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */

do_action('exsit_page_title');


do_action( 'exsit_shop_main_content' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening diexsit for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );


if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
    do_action( 'woocommerce_before_shop_loop' );

    /**
	 * Hook: exsit_woocommerce_product_content.

	 * Hook: exsit_woocommerce_product_content.
	 *
	 * @hooked exsit_woocommerce_product_content_cb - 10
	 */
    do_action( 'exsit_woocommerce_product_content' );


	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing diexsit for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

/**
 * Hook: exsit_shop_main_content_end.
 *
 * @hooked exsit_shop_main_content_end_cb
 *
 */
do_action( 'exsit_shop_main_content_end' );




get_footer( 'shop' );