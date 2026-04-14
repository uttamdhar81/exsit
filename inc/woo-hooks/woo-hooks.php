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

add_filter('woocommerce_product_loop_start','exsit_woocommerce_product_loop_start');
add_filter('woocommerce_product_loop_end','exsit_woocommerce_product_loop_end');
// exsit woocommerce product content wrapper
add_action('exsit_woocommerce_product_content', 'exsit_woocommerce_tab_content_wrapper_start', 10 );
// add_action('exsit_woocommerce_product_content', 'exsit_grid_tab_content_cb', 10 );
add_action('exsit_woocommerce_product_content', 'exsit_grid_tab_content_cb', 20 );
add_action('exsit_woocommerce_product_content', 'exsit_woocommerce_tab_content_wrapper_end', 30 );

add_action( 'exsit_product_list_content_col_start', 'exsit_product_list_content_col_start_cb', 10 );
add_action( 'exsit_product_list_content_col_end', 'exsit_product_list_content_col_end_cb', 10 );

// single shop page hooks
add_action( 'exsit_single_shop_main_content', 'exsit_single_shop_main_content_cb', 10 );
add_action( 'exsit_single_shop_main_content_end', 'exsit_single_shop_main_content_end_cb', 10 );

// removing content product hooks
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);

// exsit shop loop product thumbnail hook
add_action( 'woocommerce_before_shop_loop_item', 'exsit_loop_product_thumbnail', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'exsit_loop_product_summary', 10 );


// removing cart hook
remove_action('woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout',20);
remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display',10);
remove_action('woocommerce_cart_is_empty','wc_empty_cart_message',10);
remove_action('woocommerce_widget_shopping_cart_buttons','woocommerce_widget_shopping_cart_button_view_cart',10);
remove_action('woocommerce_widget_shopping_cart_buttons','woocommerce_widget_shopping_cart_proceed_to_checkout',20);

/*
*   cart hook
*/

// cart proceed to checkout button hook
add_action('woocommerce_proceed_to_checkout','exsit_woocommerce_button_proceed_to_checkout',20);

// cross sell products
add_action('woocommerce_after_cart','exsit_woocommerce_cross_sell_display',10);

// mini cart view cart button
add_action('woocommerce_widget_shopping_cart_buttons','exsit_minicart_view_cart_button',10);

// mini cart checkout button
add_action('woocommerce_widget_shopping_cart_buttons','exsit_minicart_checkout_button',20);

// woocommerce related product number
// add_filter('woocommerce_output_related_products_args','exsit_woocommerce_output_related_products_args',10,1);
// function exsit_woocommerce_output_related_products_args( $args ) {
//     if( class_exists('CSF') ) {
//         $args['posts_per_page'] = exsit_opt('exsit_woo_relproduct_num');
//     } else {
//         $args['posts_per_page'] = '4';
//     }
//     return $args;
// }



// Remove Related Product Hook
remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_related_products',20 );

// Add Related Product
add_action( 'exsit_woocommerce_output_related_products', 'woocommerce_output_related_products', 20 );

