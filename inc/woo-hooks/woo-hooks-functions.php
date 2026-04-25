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

// shop page
if( !function_exists('exsit_shop_main_content_cb') ) {
    function exsit_shop_main_content_cb() {
        echo "<!--MAIN CONTENT-->";
        echo '<div class="shop-main-content pb-100">';
        echo '<div class="container">';
        echo '<div class="row gx-5">';
    }
}

if( !function_exists('exsit_shop_main_content_end_cb') ) {
    function exsit_shop_main_content_end_cb() {
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo "<!--MAIN CONTENT-->";
    }
}
// single shop page
if( !function_exists('exsit_single_shop_main_content_cb') ) {
    function exsit_single_shop_main_content_cb() {
        echo "<!--SINGLE SHOP CONTENT-->";
        echo '<div class="single-product-wrap">';
        echo '<div class="container">';
        echo '<div class="row gx-5">';
    }
}

if( !function_exists('exsit_single_shop_main_content_end_cb') ) {
    function exsit_single_shop_main_content_end_cb() {
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo "<!--SINGLE SHOP CONTENT-->";
    }
}


if( !function_exists('exsit_woocommerce_product_loop_start') ) {
    function exsit_woocommerce_product_loop_start( ) {
        echo '<div class="row g-3">';
    }
}

// wooocommerce product loop start filter
if( !function_exists('exsit_woocommerce_product_loop_end') ) {
    function exsit_woocommerce_product_loop_end( ) {
        echo '</div>';
    }
}
add_filter( 'loop_shop_per_page', 'exsit_new_loop_shop_per_page', 20 );
function exsit_new_loop_shop_per_page( $product_count ) {
  $wctab = exsit_opt('exsit_wc_settings');
  if ( is_array($wctab) && isset($wctab['exsit_woo_product_perpage']) ) {
    $product_count = $wctab['exsit_woo_product_perpage'];
  }
  return $product_count;
}



if( !function_exists('exsit_shop_col_start_cb') ) {
    function exsit_shop_col_start_cb( ) {
        if( class_exists('CSF') ) {
            if( class_exists('woocommerce') && is_shop() ) {
                $wctab = exsit_opt('exsit_wc_settings');
                $exsit_woo_shoppage_sidebar = is_array($wctab) && isset($wctab['exsit_woo_shoppage_sidebar']) ? $wctab['exsit_woo_shoppage_sidebar'] : '';

                if( $exsit_woo_shoppage_sidebar == '2' && is_active_sidebar('exsit-woo-sidebar') ) {
                    echo '<div class="col-lg-8 order-last">';
                } elseif( $exsit_woo_shoppage_sidebar == '3' && is_active_sidebar('exsit-woo-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        } else {
            if( class_exists('woocommerce') && is_shop() ) {
                if( is_active_sidebar('exsit-woo-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12 gg">';
            }
        }

    }
}
// exsit woocommerce get sidebar hook function
if( ! function_exists('exsit_woocommerce_get_sidebar') ) {
    function exsit_woocommerce_get_sidebar( ) {
        if( class_exists('CSF') ) {
            $wctab = exsit_opt('exsit_wc_settings');
            $exsit_woo_shoppage_sidebar = is_array( $wctab ) && isset( $wctab['exsit_woo_shoppage_sidebar'] ) ? $wctab['exsit_woo_shoppage_sidebar'] : '1'; 
        } else {
            if( is_active_sidebar('exsit-woo-sidebar') ) {
                $exsit_woo_shoppage_sidebar = '2';
            } else {
                $exsit_woo_shoppage_sidebar = '1';
            }
        }

        if( is_shop() ) {
            if( $exsit_woo_shoppage_sidebar != '1' ) {
                
                get_sidebar('shop');
                
            }
        }
    }
}

function exsit_shop_col_end_cb( ) {
    echo '</div>';
}

// woocommerce filter wrapper hook function
if( ! function_exists('exsit_woocommerce_filter_wrapper') ) {
    function exsit_woocommerce_filter_wrapper() {

        echo '<div class="sort-bar pb-3 border-bottom border-gray-200 mb-3">';
            echo '<div class="row justify-content-between align-items-center gy-3">';

                echo '<div class="col-md-6 col-12">';
                    echo '<p class="woocommerce-result-count">'.woocommerce_result_count().'</p>';
                echo '</div>';

                echo '<div class="col-md-6 col-12">';
                    echo '<div class="col-sm-auto">';

                       echo woocommerce_catalog_ordering();
                    echo '</div>';
                echo '</div>';

            echo '</div>';
        echo '</div>';
    }
}

// exsit woocommerce pagination hook function
if( ! function_exists('exsit_woocommerce_pagination') ) {
    function exsit_woocommerce_pagination( ) {
        if( ! empty( exsit_pagination() ) ) {
            echo '<div class="row">';
                echo '<div class="col-12">';
                    echo '<div class="exsit-pagination">';
                        add_filter('next_posts_link_attributes', 'woo_posts_link_attributes');
                        add_filter('previous_posts_link_attributes', 'woo_posts_link_attributes');
                        function woo_posts_link_attributes(){
                            return 'class="pagi-btn"';
                        };
                        $prev 	= '<i class="ri-arrow-left-s-line"></i>';
                        $next 	= '<i class="ri-arrow-right-s-line"></i>';
                        // previous
                        if( get_previous_posts_link() ){
                            previous_posts_link( $prev );
                        }
                        echo '<ul>';
                            echo exsit_pagination();
                        echo '</ul>';
                        // next
                        if( get_next_posts_link() ){
                            next_posts_link( $next );
                        }
                        
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('exsit_woocommerce_tab_content_wrapper_start') ) {
    function exsit_woocommerce_tab_content_wrapper_start( ) {
        echo '<!-- PRODUCT GRID WRAP -->';
        echo '<div class="product-grid-wrap">';
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('exsit_woocommerce_tab_content_wrapper_end') ) {
    function exsit_woocommerce_tab_content_wrapper_end( ) {
        echo '</div>';
        echo '<!-- PRODUCT GRID WRAP -->';
    }
}

if( ! function_exists('exsit_product_list_content_col_start_cb') ) {
    function exsit_product_list_content_col_start_cb() {

        global $woocommerce_loop;

        // ===== DEFAULT =====
        $col_setting = '4';

        // ===== DETECT RELATED PRODUCTS (CORRECT WAY) =====
        if ( isset($woocommerce_loop['name']) && $woocommerce_loop['name'] === 'related' ) {

            // 👉 FORCE 4 columns
            $col_setting = '4';

        } else {

            // ===== NORMAL SETTINGS =====
            if( class_exists('CSF') ) {
                $wctab = exsit_opt('exsit_wc_settings');
                $col_setting = ( is_array($wctab) && isset($wctab['exsit_woo_product_col']) )
                    ? $wctab['exsit_woo_product_col']
                    : '4';
            }
        }

        // ===== FORCE CATEGORY = 4 =====
        if ( is_product_category() || is_product_tag() ) {
            $col_setting = '4';
        }

        // ===== COLUMN CLASS =====
        if ( $col_setting == '2' ) {
            $col_class = 'col-sm-6 col-md-6 col-lg-6 col-xl-6';
        } elseif ( $col_setting == '3' ) {
            $col_class = 'col-sm-6 col-md-6 col-lg-6 col-xl-4';
        } elseif ( $col_setting == '4' ) {
            $col_class = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
        } elseif ( $col_setting == '6' ) {
            $col_class = 'col-sm-6 col-md-6 col-lg-6 col-xl-2';
        } else {
            $col_class = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
        }

        echo '<div class="'.esc_attr($col_class).'">';
    }
}

if( ! function_exists('exsit_product_list_content_col_end_cb') ) {
    function exsit_product_list_content_col_end_cb( ) {
        echo '</div>';
    }
}

// exsit grid tab content hook function
if( !function_exists('exsit_grid_tab_content_cb') ) {
    function exsit_grid_tab_content_cb() {

        woocommerce_product_loop_start();

        
        // ===== LOOP =====
        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();

                do_action( 'woocommerce_shop_loop' );
                wc_get_template_part( 'content', 'product' );                
            }
            wp_reset_postdata();
        }

        woocommerce_product_loop_end();
    }
}

// exsit list tab content hook function
if( !function_exists('exsit_list_tab_content_cb') ) {
    function exsit_list_tab_content_cb( ) {
        echo '<!-- List -->';
        echo '<div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">';
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    echo '<div class="col-sm-6 col-lg-6 col-xl-4">';
                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content-horizontal', 'product' );
                    echo '</div>';
                }
                wp_reset_postdata();
            }

            woocommerce_product_loop_end();
        echo '</div>';
        echo '<!-- End List -->';
    }
}

// exsit loop product thumbnail hook function
if( !function_exists('exsit_loop_product_thumbnail') ) {
    function exsit_loop_product_thumbnail( ) {
        global $product;

        echo '<div class="product-img">';
            echo '<div class="product-onboard-label">';
                if( $product->is_on_sale() && $product->get_type() == 'simple' ) {
                    echo '<div class="onsale product-label">'.esc_html__( 'Sale', 'exsit' ).'</div>';
                }
                if( $product->is_featured() ) {
                    echo '<div class="featured woocommerce-badge product-label">'.esc_html__( 'Hot', 'exsit' ).'</div>';
                }
                if( ! $product->is_in_stock() ) {
                    echo '<div class="outofstock woocommerce-badge product-label">'.esc_html__( 'Stock Out', 'exsit' ).'</div>';
                }
            echo '</div>';

            if( has_post_thumbnail() ){
                echo '<a href="'.esc_url( get_permalink() ).'">';
                    the_post_thumbnail();
                echo '</a>';
            }
            // Product bottom
            echo '<div class="product-actions">';
                // Cart Button
                woocommerce_template_loop_add_to_cart_text_style();
                // Wishlist Button
                if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                    echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                }
            echo '</div>';
        echo '</div>';
    }
}

// add to cart button Text
function woocommerce_template_loop_add_to_cart_text_style( $args = array() ) {
    global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'add-to-cart-btn',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = wp_parse_args( $args, $defaults );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s><span> %s %s </span></a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '',
            esc_html__( 'Add to Cart', 'exsit' ),
            
        );
}

// shop loop product summary
if( ! function_exists('exsit_loop_product_summary') ) {
    function exsit_loop_product_summary( ) {
        global $product;
        echo '<div class="product-content">';
            
            // Product Title
            echo '<h2 class="product-title">
                <a class="text-inherit" href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a>
            </h2>';
            echo woocommerce_template_loop_rating();

            // Product Category
            echo '<div class="product-category">';
                echo wc_get_product_category_list( 
                    $product->get_id(), 
                    ', ', 
                    '<span class="posted-in">', 
                    '</span>' 
                );
            echo '</div>';
            // Product Price
            echo '<div class="product-price">';
                echo woocommerce_template_loop_price();
            echo '</div>';
        echo '</div>';
    }
}

// woocommerce proceed to checkout hook function
if( !function_exists('exsit_woocommerce_button_proceed_to_checkout') ) {
    function exsit_woocommerce_button_proceed_to_checkout() {
        echo '<a href="'.esc_url( wc_get_checkout_url() ).'" class="checkout-button button alt wc-forward exsit-btn exsit-default-btn btn-style"  data-text="Proceed to checkout">';
            echo '<span class="btn-wraper">';
                esc_html_e( 'Proceed to checkout', 'lonyo' );
            echo '</span>';
        echo '</a>';
    }
}

// exsit woocommerce cross sell display hook function
if( !function_exists('exsit_woocommerce_cross_sell_display') ) {
    function exsit_woocommerce_cross_sell_display( ){
        woocommerce_cross_sell_display();
    }
}

// exsit minicart view cart button hook function
if( !function_exists('exsit_minicart_view_cart_button') ) {
    function exsit_minicart_view_cart_button() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button checkout wc-forward exsit-btn style1">' . esc_html__( 'View cart', 'exsit' ) . '</a>';
    }
}

// exsit minicart checkout button hook function
if( !function_exists('exsit_minicart_checkout_button') ) {
    function exsit_minicart_checkout_button() {
        echo '<a href="' .esc_url( wc_get_checkout_url() ) . '" class="button wc-forward exsit-btn style1">' . esc_html__( 'Checkout', 'exsit' ) . '</a>';
    }
}




// single product price rating hook function
if( !function_exists('exsit_woocommerce_single_product_price_rating') ) {
    function exsit_woocommerce_single_product_price_rating() {
        echo '<!-- Product Prices -->';
        woocommerce_template_single_price();
        echo '<p class="text-gray-700 fs-14 mb-0 fst-italic">( MRP inclusive all taxes )</p>';
        echo '<!-- End Product Price -->';
    }
}

if( !function_exists('exsit_woocommerce_single_product_title') ) {
    function exsit_woocommerce_single_product_title() {

        echo '<!-- Product Title -->';
        echo '<h1 class="product-title display5-size text-gray-900 fw-500 mb-0">'.esc_html( get_the_title() ).'</h1>';
        echo '<!-- End Product Title -->';

        global $product;

        $average_rating = $product->get_average_rating();
        $review_count   = $product->get_review_count();

        echo '<div class="product-rating">';

        if ( $review_count > 0 ) {

            // ⭐ Stars HTML (Woo default stars)
            echo wc_get_rating_html( $average_rating );

            // ⭐ Rating number (4.5/5)
            echo '<span class="rating-number fw-500">' . esc_html( $average_rating ) . '/5</span>';

        } else {
            echo '<span>No reviews yet</span>';
        }

        echo '</div>';
    }
}

// single product title hook function
if( !function_exists('exsit_woocommerce_quickview_single_product_title') ) {
    function exsit_woocommerce_quickview_single_product_title( ) {
        echo '<!-- Product Title -->';
        echo '<h2 class="product-title">'.esc_html( get_the_title() ).'</h2>';
        echo '<!-- End Product Title -->';
    }
}
if( !function_exists('exsit_woocommerce_single_product_breadcrumb') ) {
    function exsit_woocommerce_single_product_breadcrumb() {
        echo '<div class="product-breadcrumb">';
        woocommerce_breadcrumb();
        echo '</div>';
    }
}

// single product excerpt hook function
if( !function_exists('exsit_woocommerce_single_product_excerpt') ) {
    function exsit_woocommerce_single_product_excerpt() {
        global $post;

        if ( ! empty($post->post_excerpt) ) {

            // Remove Elementor content completely
            $clean_excerpt = wp_strip_all_tags($post->post_excerpt);

            echo '<!-- Product Excerpt -->';
            echo '<div class="woocommerce-product-details__short-description">';
            echo wpautop($clean_excerpt);
            echo '</div>';
            echo '<!-- Product Excerpt -->';
        }
    }
}

// single product availability hook function
if( !function_exists('exsit_woocommerce_single_product_availability') ) {
    function exsit_woocommerce_single_product_availability( ) {
        global $product;
        $availability = $product->get_availability();

        if( class_exists( 'CSF' ) ){
            $wctab = exsit_opt('exsit_wc_settings');
            $exsit_stock_quantity = $wctab['exsit_woo_stock_quantity_show_hide'];
        }else{
            $exsit_stock_quantity = 1;
        }

        if( $exsit_stock_quantity ){
            if( $availability['class'] != 'out-of-stock' ) {
                echo '<!-- Product Availability -->';
                    echo '<div class="product-stock">';
                        echo '<p>';
                            if( $product->get_stock_quantity() ){
                                echo '<span class="stock in-stock">'.esc_html( $product->get_stock_quantity() ).'</span>';
                            }else{
                                echo '<span class="stock in-stock">'.esc_html__( 'In Stock', 'exsit' ).'</span>';
                            }
                        echo '</p>';
                    echo '</div>';
                echo '<!--End Product Availability -->';
            } else {
                echo '<!-- Product Availability -->';
                echo '<div class="product-stock">';
                    echo '<p>';
                        echo '<span class="stock out-of-stock">'.esc_html__( 'Out Of Stock', 'exsit' ).'</span>';
                    echo '</p>';
                echo '</div>';
                echo '<!--End Product Availability -->';
            }
        }
    }
}

// single product add to cart fuunction
if( !function_exists('exsit_woocommerce_single_add_to_cart_button') ) {
    function exsit_woocommerce_single_add_to_cart_button( ) {
        echo '<div class="product-add-to-cart">';
        echo '<p class="text-gray-900 fw-500 mb-2 text-uppercase fs-14">'.esc_html__( 'Choose quantity:', 'exsit' ).'</p>';
        woocommerce_template_single_add_to_cart();
        echo '</div>';
    }
}

// single product meta hook function
if( !function_exists('exsit_woocommerce_single_meta') ) {
    function exsit_woocommerce_single_meta( ) {
        global $product;
        echo '<div class="product_meta">';
            echo '<p class="text-gray-900 fw-500 mb-2 text-uppercase fs-14">'.esc_html__( 'Quick info', 'exsit' ).'</p>';
            if( ! empty( $product->get_sku() ) ){
                echo '<span class="sku_wrapper">'.esc_html__( 'SKU: ', 'exsit' ).'<span class="sku">' .$product->get_sku().'</span></span>';
            }
            echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'exsit' ) . ' ', '</span>' );
            // Add the "Tags" section here
            $product_tags = get_the_terms( $product->get_id(), 'product_tag' );
            if ( $product_tags && ! is_wp_error( $product_tags ) ) {
                echo '<span>' . esc_html__( 'Tags:', 'exsit' ) . ' ';
                $tag_links = array();
                foreach ( $product_tags as $tag ) {
                    $tag_links[] = '<a href="' . get_term_link( $tag ) . '" rel="tag">' . esc_html( $tag->name ) . '</a>';
                }
                echo implode( ', ', $tag_links );
                echo '</span>';
            }
        echo '</div>';
    }
}

if( !function_exists('exsit_woocommerce_single_delivaryoption') ) {
    function exsit_woocommerce_single_delivaryoption( ) {
        // Implementation for delivery option hook
        echo '<div class="product-delivery-option mt-3">';
            echo '<p class="text-gray-900 fw-500 mb-2 text-uppercase fs-14">'.esc_html__( 'Delivery Options:', 'exsit' ).'</p>';
            echo '<ul class="delivery-options-list">';
                echo '<li>'.esc_html__( 'Standard Delivery: 3-5 business days', 'exsit' ).'</li>';
                echo '<li>'.esc_html__( 'Express Delivery: 1-2 business days', 'exsit' ).'</li>';
                echo '<li>'.esc_html__( 'Free Shipping on orders over $50', 'exsit' ).'</li>';
            echo '</ul>';
        echo '</div>';
    }
}

if( !function_exists('exsit_woocommerce_single_payment_options') ) {
    function exsit_woocommerce_single_payment_options( ) {
        // Implementation for payment options hook
        echo '<div class="product-payment-options mt-3">';
            echo '<p class="text-gray-900 fw-500 mb-2 text-uppercase fs-14">'.esc_html__( 'Payment Options:', 'exsit' ).'</p>';
            echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/payment-1.png' ) . '" alt="' . esc_attr__( 'Payment Options', 'exsit' ) . '" class="payment-options-image">';
        echo '</div>';
    }
}

if( !function_exists('exsit_woocommerce_cross_sell_display') ) {
    function exsit_woocommerce_cross_sell_display( ){
        woocommerce_cross_sell_display();
    }
}

if( !function_exists('exsit_login_form_wrapper_start') ) {
    function exsit_login_form_wrapper_start() {
        echo '<div class="woocommerce-register-wrapper">';
    }
}


if( !function_exists('exsit_login_form_wrapper_end') ) {
    function exsit_login_form_wrapper_end() {
        echo '</div>';
    }
}