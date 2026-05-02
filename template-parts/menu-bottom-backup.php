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

if( is_search() || is_archive() || is_shop() || is_product_category() || is_product_tag() ) {
    echo '<!-- PAGETITLE WRAPPER  -->';
    echo '<div class="banner-wrap header-top position-relative light-blue-banner">';
        echo '<div class="container py-100">';
            echo '<div class="row justify-content-center">';
                echo '<div class="col-lg-7 text-center justify-content-center">';

                    // ===== Title =====
                    echo '<h1 class="display6-size text-gray-900 fw-700 mb-lg-2 mb-13 lh-5">';

                    if ( is_front_page() ) {
                        echo esc_html( get_bloginfo('name') );

                    } elseif ( is_home() ) {
                        echo esc_html__( 'Blog', 'exsit' );

                    } elseif ( is_shop() ) {
                        echo woocommerce_page_title(false); // Shop title

                    } elseif ( is_product_category() || is_product_tag() ) {
                        echo single_term_title('', false);

                    } elseif ( is_archive() ) {
                        echo get_the_archive_title();

                    } elseif ( is_search() ) {
                        echo esc_html__( 'Search Results for: ', 'exsit' ) . get_search_query();

                    } else {
                        echo esc_html( get_the_title() );
                    }

                    echo '</h1>';

                    // ===== Breadcrumb =====
                    echo '<p class="d-flex align-items-center justify-content-center gap-2 mt-3 mb-0">';

                        echo '<span class="text-gray-800 fw-500">';
                            echo '<a href="' . esc_url( home_url('/') ) . '" class="text-gray-800">';
                                echo esc_html__( 'Home', 'exsit' );
                            echo '</a>';
                        echo '</span>';

                        echo '<svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>';

                        echo '<span class="text-gray-800 fw-500">';

                        if ( is_home() ) {
                            echo esc_html__( 'Blog', 'exsit' );

                        } elseif ( is_shop() ) {
                            echo woocommerce_page_title(false);

                        } elseif ( is_product_category() || is_product_tag() ) {
                            echo single_term_title('', false);

                        } elseif ( is_search() ) {
                            echo esc_html( get_search_query() );

                        } elseif ( is_archive() ) {
                            echo get_the_archive_title();

                        } else {
                            echo esc_html( get_the_title() );
                        }

                        echo '</span>';

                    echo '</p>';

                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '<!-- PAGETITLE WRAPPER  -->';
}

// Optional: hide on builder template and single post
elseif (  is_page_template( 'template-builder.php' )  ) {
    return;
} else {
    return;
}


