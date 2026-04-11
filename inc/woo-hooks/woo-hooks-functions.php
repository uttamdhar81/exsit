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

function exsit_shop_main_content_cb() {
    echo "<!--MAIN CONTENT-->";
    echo '<div class="shop-main-content pb-100">';
    echo '<div class="container">';
    echo '<div class="row gx-5">';
}

function exsit_shop_main_content_end_cb() {
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo "<!--MAIN CONTENT-->";
}

if( !function_exists('exsit_shop_col_start_cb') ) {
    function exsit_shop_col_start_cb( ) {
        if( class_exists('CSF') ) {
            if( class_exists('woocommerce') && is_shop() ) {
                $wctab = exsit_opt('exsit_wc_settings');
                $exsit_woo_shoppage_sidebar = is_array($wctab) && isset($wctab['exsit_woo_shoppage_sidebar']) ? $wctab['exsit_woo_shoppage_sidebar'] : '';

                if( $exsit_woo_shoppage_sidebar == '2' && is_active_sidebar('exsit-woo-sidebar') ) {
                    echo '<div class="col-lg-8 order-lg-last">';
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

        echo '<div class="sort-bar">';
            echo '<div class="row justify-content-between align-items-center">';

                echo '<div class="col-md-6 col-12">';
                    echo '<p class="woocommerce-result-count">'.woocommerce_result_count().'</p>';
                echo '</div>';

                echo '<div class="col-md-6 col-12">';
                    echo '<div class="col-sm-auto">';

                        // Capture output
                        ob_start();
                        woocommerce_catalog_ordering();
                        $ordering = ob_get_clean();

                        // Add class to <select>
                        $ordering = str_replace(
                            '<select',
                            '<select class="form-select w-auto fs-15"',
                            $ordering
                        );

                        echo $ordering;

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
        echo '<!-- Tab Content -->';
        echo '<div class="tab-content" id="nav-tabContent">';
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('exsit_woocommerce_tab_content_wrapper_end') ) {
    function exsit_woocommerce_tab_content_wrapper_end( ) {
        echo '</div>';
        echo '<!-- End Tab Content -->';
    }
}
// exsit grid tab content hook function
if( !function_exists('exsit_grid_tab_content_cb') ) {
    function exsit_grid_tab_content_cb( ) {
        echo '<!-- Grid -->';
            echo '<div class="tab-pane fade show active" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">';
                woocommerce_product_loop_start();
                if( class_exists('CSF') ) {
                    $wctab = exsit_opt('exsit_wc_settings');
                    $exsit_woo_product_col = ( is_array($wctab) && isset($wctab['exsit_woo_product_col']) ) ? $wctab['exsit_woo_product_col'] : '4';
                    if( $exsit_woo_product_col == '2' ) {
                        $exsit_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-6';
                    } elseif( $exsit_woo_product_col == '3' ) {
                        $exsit_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-4';
                    } elseif( $exsit_woo_product_col == '4' ) {
                        $exsit_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
                    } elseif( $exsit_woo_product_col == '6' ) {
                        $exsit_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-2';
                    }
                } else {
                    $exsit_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
                }

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();

                        echo '<div class="'.esc_attr( $exsit_woo_product_col_val ).'">';
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );

                        echo '</div>';
                    }
                    wp_reset_postdata();
                }

                woocommerce_product_loop_end();
            echo '</div>';
        echo '<!-- End Grid -->';
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