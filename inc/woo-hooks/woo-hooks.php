<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}

// removing archive product hooks
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

// shop main content hook
add_action('exsit_shop_main_content','exsit_shop_main_content_cb',10);
add_action('exsit_shop_main_content_end','exsit_shop_main_content_end_cb',10);
add_action( 'woocommerce_before_main_content', 'exsit_shop_col_start_cb', 10 );
add_action('woocommerce_sidebar','exsit_woocommerce_get_sidebar',10);
add_action('woocommerce_after_main_content','exsit_shop_col_end_cb',10);
add_action('woocommerce_before_shop_loop','exsit_woocommerce_filter_wrapper',20);
add_action('woocommerce_after_shop_loop','exsit_woocommerce_pagination',10);

// exsit woocommerce product content wrapper
add_action('exsit_woocommerce_product_content', 'exsit_woocommerce_tab_content_wrapper_start', 10 );
add_action('exsit_woocommerce_product_content', 'exsit_grid_tab_content_cb', 10 );
add_action('exsit_woocommerce_product_content', 'exsit_list_tab_content_cb', 20 );
add_action('exsit_woocommerce_product_content', 'exsit_woocommerce_tab_content_wrapper_end', 30 );