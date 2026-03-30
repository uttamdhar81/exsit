<?php
/**
 * @Package     : Exsit
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}


if ( ! function_exists( 'exsit_opt' ) ) {
    function exsit_opt( $option = '', $default = null ) {
        $options = get_option( 'exsit_settings' );
        return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
    }
}
/**
 * Theme logo output (supports light/dark logo switch + text logo)
 */
if ( ! function_exists( 'exsit_theme_logo' ) ) {
    function exsit_theme_logo() {

        $site_url = home_url( '/' );

        // 1. WordPress Custom Logo (highest priority)
        if ( has_custom_logo() ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo_url       = wp_get_attachment_image_url( $custom_logo_id, 'full' );

            if ( $logo_url ) {
                return '<a class="navbar-brand light-logo logo position-relative" href="' . esc_url( $site_url ) . '">
                            <img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo_light" width="156" height="50" loading="eager">
                        </a>';
            }
        }

        // 2. Theme Option Logos ( dark + white logo switch)
        if ( class_exists( 'CSF' ) && function_exists( 'exsit_opt' ) ) {

            $dark_logo  = exsit_opt( 'exsit_dark_logo' );
            $white_logo = exsit_opt( 'exsit_white_logo' );
            $header     = exsit_opt( 'exsit_header_settings' );

            // Image logos (output both for JS/CSS switch)
            if ( ! empty( $dark_logo['url'] ) || ! empty( $white_logo['url'] ) ) {

                $light_src = ! empty( $dark_logo['url'] )  ? $dark_logo['url']  : '';
                $dark_src  = ! empty( $white_logo['url'] ) ? $white_logo['url'] : '';

                return '<a class="navbar-brand light-logo logo position-relative" href="' . esc_url( $site_url ) . '">
                            ' . ( $light_src ? '<img src="' . esc_url( $light_src ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo_light img-fluid">' : '' ) . '
                            ' . ( $dark_src  ? '<img src="' . esc_url( $dark_src )  . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo_dark img-fluid">'  : '' ) . '
                        </a>';
            }

            // 2.1 Text logo from theme options
            if ( ! empty( $header['exsit_text_title'] ) ) {
                return '<h1 class="navbar-brand light-logo logo position-relative display4-size mb-0 fw-700">
                            <a class="text-gray-900" href="' . esc_url( $site_url ) . '">' .
                                esc_html( $header['exsit_text_title'] ) .
                            '</a>
                        </h1>';
            }
        }

        // 3. Final fallback: Site title
        return '<a class="navbar-brand light-logo logo position-relative" href="' . esc_url( $site_url ) . '">
                    <span class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</span>
                </a>';
    }
}

if ( ! function_exists( 'exsit_global_header' ) ) {
    function exsit_global_header() {
        echo '<!-- HEADER WRAPPER  -->';
        echo '<header class="header-wrapper w-100 z-10 py-lg-0 py-1 border-bottom border-gray-200 position-absolute">';
            echo '<nav class="navbar navbar-one navbar-expand-lg border-0 py-0">';
                echo '<div class="container">';
                    echo '<div class="header-wrap d-flex align-items-center justify-content-between w-100">';

                        // Logo
                        echo '<div class="header-logo">';
                        echo exsit_theme_logo();
                        echo '</div>';
                        

                        // Menu Overlay
                        echo '<div class="menu-overlay"></div>';

                        // Menu Block (Desktop + Mobile)
                        echo '<div class="menu-block p-lg-0 p-3">';

                            // Menu Head (Mobile Top)
                            echo '<div class="menu-head align-items-center justify-content-between">';
                                echo '<div class="header-logo">';
                                    echo exsit_theme_logo();
                                echo '</div>';

                                echo '<div class="menu-close" role="button" aria-label="Close menu">';
                                    echo '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';                                
                                echo '</div>';
                            echo '</div>';

                            // WordPress Main Menu
                            if ( has_nav_menu( 'primary-menu' ) ) {
                                wp_nav_menu( array(
                                    'theme_location' => 'primary-menu',
                                    'container'      => false,
                                    'menu_class'     => 'navbar-nav text-white fw-500',
                                    'menu_id'        => 'navbar-main',
                                ) );
                            }

                        echo '</div>'; // .menu-block

                        // Mobile Menu Toggle Button
                        echo '<div class="menu-toggle-wrap">';
                            echo '<button aria-label="menu" class="mobile-menu-trigger btn btn-outline px-0 text-gray-700 d-flex d-lg-none">';
                                echo '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-gray-900"> <line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
                            echo '</button>';
                        echo '</div>';

                    echo '</div>'; // flex wrapper
                echo '</div>'; // .container
            echo '</nav>';
        echo '</header>';
        echo '<!-- HEADER WRAPPER  -->';
    }
}


/**
 * Blog date permalink (archive link for the post date)
 */
function exsit_blog_date_permalink() {
    $year  = get_the_time( 'Y' );
    $month = get_the_time( 'm' );
    $day   = get_the_time( 'd' );

    return get_day_link( $year, $month, $day );
}

/**
 * Audio format iframe match
 */
function exsit_iframe_match() {
    $audio_content = exsit_embedded_media( array( 'audio', 'iframe' ) );
    return (bool) preg_match( '/<iframe\b/i', $audio_content );
}

/**
 * Post embedded media (audio / iframe / video)
 */
function exsit_embedded_media( $type = array() ) {
    $content = apply_filters( 'the_content', get_the_content() );
    $embed   = get_media_embedded_in_content( $content, $type );

    if ( in_array( 'audio', $type, true ) ) {
        if ( ! empty( $embed ) ) {
            return str_replace( '?visual=true', '?visual=false', $embed[0] );
        }
        return '';
    }

    return ! empty( $embed ) ? $embed[0] : '';
}

/**
 * WP post pagination for multi-page posts
 */
function exsit_link_pages() {
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'exsit' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'exsit' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

/**
 * Data background image attribute helper
 */
function exsit_data_bg_attr( $img_url = '' ) {
    if ( empty( $img_url ) ) {
        return '';
    }
    return 'data-bg-img="' . esc_url( $img_url ) . '"';
}

/**
 * Image alt text helper (fallback to filename)
 */
function exsit_image_alt( $url = '' ) {
    if ( empty( $url ) ) {
        return '';
    }

    $attachment_id = attachment_url_to_postid( esc_url( $url ) );

    if ( $attachment_id ) {
        $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
        if ( ! empty( $image_alt ) ) {
            return esc_attr( $image_alt );
        }
    }

    $filename = pathinfo( $url, PATHINFO_FILENAME );
    return esc_attr( str_replace( '-', ' ', $filename ) );
}

/**
 * Blog category link
 */
function exsit_blog_category()
{
    $cats = get_the_category();
    if (!empty($cats)) {
        echo '<a href="' . esc_url(get_term_link($cats[0])) . '">' . esc_html($cats[0]->name) . '</a>';
    }
}

/**
 * Pingback header
 */
function exsit_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="' . esc_url(get_bloginfo('pingback_url')) . '">';
    }
}
add_action('wp_head', 'exsit_pingback_header');

/**
 * Excerpt more
 */
add_filter('excerpt_more', function () {
    return '…';
});

/**
 * Pagination (WordPress native)
 */
if ( ! function_exists( 'exsit_pagination' ) ) {
    function exsit_pagination() {
        $links = paginate_links( array(
            'type'      => 'array',
            'mid_size'  => 2,
            'prev_text' => esc_html__( '&laquo;', 'exsit' ),
            'next_text' => esc_html__( '&raquo;', 'exsit' ),
        ) );

        if ( ! empty( $links ) ) {
            echo '<ul class="exsit-pagination">';
            foreach ( $links as $link ) {
                // Add active class for current page
                if ( strpos( $link, 'current' ) !== false ) {
                    echo '<li class="active">' . wp_kses_post( $link ) . '</li>';
                } else {
                    echo '<li>' . wp_kses_post( $link ) . '</li>';
                }
            }
            echo '</ul>';
        }
    }
}

// Article read time calculation 

if ( ! function_exists( 'exsit_estimated_reading_time' ) ) {
    function exsit_estimated_reading_time( $wpm = 200 ) {
        $content = get_post_field( 'post_content', get_the_ID() );
        $word_count = str_word_count( wp_strip_all_tags( $content ) );
        $minutes = ceil( $word_count / $wpm );
        return sprintf( _n( '%d min read', '%d mins read', $minutes, 'exsit' ), $minutes );
    }
}

if ( ! function_exists( 'exsit_opt' ) ) {
    function exsit_opt( $option = '', $default = null ) {
        $options = get_option( 'exsit_settings' );  // <-- your Exsit options key
        return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
    }
}

function exsit_comment_callback( $comment, $args, $depth ) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <div class="comment-avatar">
                <?php echo get_avatar( $comment, 64 ); ?>
            </div>
            <div class="comment-content">
                <p class="comment-author"><?php comment_author(); ?></p>
                <span class="comment-date"><?php echo get_comment_date(); ?></span>
                <div class="comment-text"><?php comment_text(); ?></div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array(
                        'reply_text' => __( 'Reply', 'exsit' ),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                    ) ) ); ?>
                </div>
            </div>
        </div>
    </li>
    <?php
}

