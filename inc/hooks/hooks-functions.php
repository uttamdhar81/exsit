<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */



// Block direct access
if (!defined('ABSPATH')) {
    exit();
}

// Preloader hook function 

if (!function_exists('exsit_preloader_wrap')) {
    function exsit_preloader_wrap()
    {

        // If CSF exists, respect theme option
        if (class_exists('CSF') && function_exists('exsit_opt')) {

            $preloader_display = exsit_opt('exsit_display_preloader', true);

            if (!$preloader_display) {
                return; // disabled in theme options
            }

        }

        // Fallback (if CSF or options not available, still show preloader)
        echo '<div class="preloader"><div class="loading-container"><div class="loading"></div></div></div>';
    }
}


// Header Hook function
if (!function_exists('exsit_header_cb')) {
    function exsit_header_cb()
    {
        echo '<!-- HEADER  -->';
        get_template_part('template-parts/header');
        get_template_part('template-parts/header-menu-bottom');
    }
}
/**
 * Main wrapper start
 */
if (!function_exists('exsit_main_wrapper_start_cb')) {
    function exsit_main_wrapper_start_cb()
    {
        echo '<main id="primary" class="site-main">';
    }
}

/**
 * Main wrapper end
 */
if (!function_exists('exsit_main_wrapper_end_cb')) {
    function exsit_main_wrapper_end_cb()
    {
        echo '</main>';
    }
}

/**
 * Back to top button
 */
if (!function_exists('exsit_back_to_top_cb')) {
    function exsit_back_to_top_cb()
    {
        ?>
        <div class="arrow-round" aria-label="<?php esc_attr_e('Back to top', 'exsit'); ?>">
            <div class="arrow-round-wrap primary">
                <svg class="arrow-circle svg-content text-white" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
                <div class="arrow-svg">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-gray-900">
                        <polyline points="18 15 12 9 6 15"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <?php
    }
}


// Blog Start Wrapper Function
if (!function_exists('exsit_blog_start_wrap_cb')) {
    function exsit_blog_start_wrap_cb()
    {

        echo '<section class="blog-wrapper">';
        echo '<div class="container">';

        $exsit_gutter_class = '';

        if (is_active_sidebar('exsit-blog-sidebar')) {
            $exsit_gutter_class = 'gx-30';
        }

        echo '<div class="row ' . esc_attr($exsit_gutter_class) . '">';
    }
}

// Blog End Wrapper Function
if (!function_exists('exsit_blog_end_wrap_cb')) {
    function exsit_blog_end_wrap_cb()
    {
        echo '</div>';   // .row
        echo '</div>';   // .container
        echo '</section>';
    }
}

// Blog Column Start Wrapper Function
if (!function_exists('exsit_blog_col_start_wrap_cb')) {
    function exsit_blog_col_start_wrap_cb()
    {

        // If Codestar Framework (or your options framework) exists
        if (class_exists('CSF')) {

            // Fetch blog settings
            $blogtab = exsit_opt('exsit_blog_setting');

            // Ensure $blogtab is valid and option exists
            if (is_array($blogtab) && isset($blogtab['exsit_blog_sidebar'])) {
                $exsit_blog_sidebar = $blogtab['exsit_blog_sidebar'];

                if ($exsit_blog_sidebar == '2' && is_active_sidebar('exsit-blog-sidebar')) {
                    // Sidebar right
                    echo '<div class="col-lg-8 order-lg-last">';
                } elseif ($exsit_blog_sidebar == '3' && is_active_sidebar('exsit-blog-sidebar')) {
                    // Sidebar left
                    echo '<div class="col-lg-8">';
                } else {
                    // No sidebar / full width
                    echo '<div class="col-lg-12">';
                }

            } else {
                // Fallback if option not set
                if (is_active_sidebar('exsit-blog-sidebar')) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }

        } else {
            // Fallback if options framework not available
            if (is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }
        }
    }
}

// Blog Column End Wrapper Function
if (!function_exists('exsit_blog_col_end_wrap_cb')) {
    function exsit_blog_col_end_wrap_cb()
    {
        echo '</div>';
    }
}

// Blog Sidebar
if (!function_exists('exsit_blog_sidebar_cb')) {
    function exsit_blog_sidebar_cb()
    {

        // Get sidebar option (from theme options if available)
        if (class_exists('CSF')) {
            $exsit_blog_sidebar = exsit_opt('exsit_blog_sidebar');
        } else {
            $exsit_blog_sidebar = 2; // default: sidebar enabled
        }

        // Show sidebar if not disabled and sidebar has widgets
        if ($exsit_blog_sidebar != 1 && is_active_sidebar('exsit-blog-sidebar')) {

            // Output sidebar markup (use your sidebar template)
            get_sidebar('blog');
            // or use: 
            // dynamic_sidebar( 'exsit-blog-sidebar' );
        }
    }
}

// Blog Content Function
if (!function_exists('exsit_blog_content_cb')) {
    function exsit_blog_content_cb()
    {

        // Defaults
        $blog_style   = 'blog_style_one';
        $blog_sidebar = '3'; // default with sidebar

        // Fetch blog options
        if (class_exists('CSF') && function_exists('exsit_opt')) {
            $blogtab = exsit_opt('exsit_blog_setting');

            if (is_array($blogtab)) {
                if (!empty($blogtab['exsit_blog_style'])) {
                    $blog_style = $blogtab['exsit_blog_style'];
                }

                if (isset($blogtab['exsit_blog_sidebar'])) {
                    $blog_sidebar = $blogtab['exsit_blog_sidebar'];
                }
            }
        }

        // Item class
        $item_class = '';

        if ($blog_style === 'blog_style_two') {

            // No sidebar → 3 columns
            if ($blog_sidebar == '1') {
                $item_class = 'col-lg-4 col-md-6 col-sm-12 article-style-two';
            }
            // With sidebar → 2 columns
            else {
                $item_class = 'col-lg-6 col-sm-12 article-style-two';
            }

            // OPEN wrapper (direct output = safest)
            echo '<div class="row">';
        }

        if (have_posts()) {
            while (have_posts()) {
                the_post();

                if (!empty($item_class)) {
                    echo '<div class="' . esc_attr($item_class) . '">';
                }

                get_template_part('template-parts/content', get_post_format());

                if (!empty($item_class)) {
                    echo '</div>';
                }
            }
            
        } else {
            get_template_part('template-parts/content', 'none');
        }

        // CLOSE wrapper
        if ($blog_style === 'blog_style_two') {
            echo '</div>';
        }
    }
}

// Blog Pagination Function
if (!function_exists('exsit_blog_pagination_cb')) {
    function exsit_blog_pagination_cb()
    {
        get_template_part('template-parts/pagination');
    }
}

if (!function_exists('exsit_blog_post_author_cb')) {
    function exsit_blog_post_author_cb()
    {
        ?>

        <div class="d-flex flex-row gap-3 mt-2 exsit-post-author">
            <?php
            echo get_avatar(
                get_the_author_meta('ID'),
                44,
                '',
                esc_attr(get_the_author()),
                array(
                    'class' => 'w-11 h-11 rounded-circle',
                )
            );
            ?>
            <div class="d-flex flex-column">
                <span class="fs-17 text-gray-900 fw-500 lh-22 d-inline-block">
                    <?php echo esc_html(get_the_author()); ?>
                </span>
                <span class="fs-15 text-gray-700 fw-500 lh-22 d-inline-block">
                    <?php
                    $user = get_userdata(get_the_author_meta('ID'));
                    $roles = $user->roles;
                    $role = !empty($roles) ? ucfirst($roles[0]) : __('Author', 'exsit');

                    echo esc_html($role);
                    ?>
                </span>
            </div>
        </div>

        <?php
    }
}
// Blog Post Meta Function
if (!function_exists('exsit_blog_post_meta_cb')) {
    function exsit_blog_post_meta_cb()
    {
        echo '<div class="article-tag d-flex flex-row text-gray-700 fw-500 fs-14 mb-2">';
        echo '<span>' . esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) . ' ' . esc_html__('ago', 'exsit') . '</span>';
        echo '<span class="mx-1">•</span>';
        echo '<span>' . esc_html(exsit_estimated_reading_time()) . '</span>';
        echo '</div>';
    }
}


if (!function_exists('exsit_blog_postexcerpt_read_content_cb')) {
    function exsit_blog_postexcerpt_read_content_cb()
    {
        echo '<p class="text-gray-700 mt-1 pe-lg-5">';
        echo wp_kses_post(wp_trim_words(get_the_excerpt(), 24));
        echo '</p>';
    }
}

// Blog Details Share Options Hook Function
if( ! function_exists( 'exsit_blog_details_share_options_cb' ) ) {
    function exsit_blog_details_share_options_cb() {

        $blogtab = exsit_opt( 'exsit_blog_setting' );

        if ( class_exists( 'CSF' ) && ! empty( $blogtab ) ) {
            $exsit_post_details_share_options = $blogtab['exsit_post_details_share_options'];
        } else {
            $exsit_post_details_share_options = false;
        }

        if ( function_exists( 'exsit_social_sharing_buttons' ) && $exsit_post_details_share_options ) {

            echo '<div class="post-share-social">';
                echo '<span class="share-links-title">' . esc_html__( 'Share:', 'exsit' ) . '</span>';
                echo '<ul class="social-links">';
                    echo exsit_social_sharing_buttons();
                echo '</ul>';
            echo '</div>';

        }
    }
}



if (!function_exists('exsit_blog_post_content_cb')) {
    function exsit_blog_post_content_cb()
    { ?>


        <div class="post-content d-flex flex-column bg-white overflow-hidden z-5">

            <!-- Meta -->
            <?php do_action('exsit_blog_post_meta'); ?>

            <!-- Title -->
            <h2 class="post-title text-gray-900 fw-600 mb-1">
                <a class="text-gray-900" href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php echo esc_html( get_the_title() ); ?>
                </a>
            </h2>

            <!-- Excerpt -->
            <p class="text-gray-800 fw-400 mt-1 pe-lg-5 mb-2">
                <?php
                $excerpt_length = 24; // default fallback
        
                if (class_exists('CSF') && function_exists('exsit_opt')) {
                    $blogtab = exsit_opt('exsit_blog_setting');

                    if (is_array($blogtab) && isset($blogtab['exsit_blog_post_excerpt'])) {
                        $excerpt_length = (int) $blogtab['exsit_blog_post_excerpt'];
                    }
                }

                echo wp_kses_post(wp_trim_words(get_the_excerpt(), $excerpt_length));
                ?>
            </p>

            <!-- Author -->
            <?php do_action('exsit_blog_post_author'); ?>

        </div>


    <?php }
}


if (!function_exists('exsit_blog_post_thumb_cb')) {
    function exsit_blog_post_thumb_cb()
    {

        $format = get_post_format() ? get_post_format() : 'standard';

        // Post meta (optional, for later use)
        $meta = get_post_meta(get_the_ID(), 'exsit_blog_post_control', true);
        $slider_images = (is_array($meta) && !empty($meta['post_format_slider']))
            ? $meta['post_format_slider']
            : array();

        // Check if we have ANY media to show
        $has_media = !empty($slider_images)
            || has_post_thumbnail()
            || ($format === 'video' && !empty($meta['post_format_video']))
            || ($format === 'audio' && !empty($meta['post_format_audio']));

        // ❌ No media? Don't render the image column at all
        if (!$has_media) {
            return;
        }

        // 1) Slider gallery (use exsit_img_tag)
        if (!empty($slider_images)) {

            echo '<div class="post-image scale-img overflow-hidden exsit-carousel">';

            foreach ($slider_images as $img) {
                if (!is_single()) {
                    echo '<a href="' . esc_url(get_permalink()) . '" class="post-thumbnail">';
                }

                echo exsit_img_tag(array(
                    'url'     => $img,
                    'alt'     => get_the_title(),
                    'class'   => 'img-fluid',
                    'loading' => 'lazy',
                ));

                if (!is_single()) {
                    echo '</a>';
                }
            }

            echo '</div>';

            // 2) Featured image (keep native WP)
        } elseif (has_post_thumbnail()) {

            echo '<div class="post-image scale-img overflow-hidden">';

            if (!is_single()) {
                echo '<a href="' . esc_url(get_permalink()) . '" class="post-thumbnail">';
            }

            the_post_thumbnail('large', array(
                'class' => 'img-fluid',
                'loading' => 'lazy',
                'alt' => esc_attr(get_the_title()),
            ));

            if (!is_single()) {
                echo '</a>';
            }

            echo '</div>';

            // 3) Video fallback
        } elseif ($format === 'video' && !empty($meta['post_format_video'])) {

            echo '<div class="post-image blog-video overflow-hidden rounded-4">';
            $embed = wp_oembed_get( esc_url( $meta['post_format_video'] ) );
            if ( $embed ) {
                echo wp_kses_post( $embed );
            }
            echo '</div>';

            // 4) Audio fallback
        } elseif ($format === 'audio' && !empty($meta['post_format_audio'])) {

            echo '<div class="post-image blog-audio overflow-hidden rounded-4">';
            echo wp_kses_post( wp_oembed_get( esc_url( $meta['post_format_audio'] ) ) );
            echo '</div>';
        }
    }
}


// Footer content function
if (!function_exists('exsit_footer_content_cb')) {
    function exsit_footer_content_cb()
    {

        // If Elementor Pro footer exists, let Elementor handle footer
        if (defined('ELEMENTOR_PRO_VERSION')) {
            return;
        }
        echo '<!-- FOOTER WRAPPER  -->';
        echo '<footer class="footer-wrap bg-gray-900 text-gray-100 dark-footer">';
        echo '<div class="container">';

        // Separator line
        echo '<div class="separator-line border-top"></div>';

        // Bottom row
        echo '<div class="row justify-content-center py-4 gy-2">';
        echo '<div class="col-sm-12">';
        echo '<p class="mb-0 py-1 text-center text-gray-500">';

        // If CSF (helper plugin) active and option exists, use it
        if (class_exists('CSF') && function_exists('exsit_opt')) {

            $copyright = exsit_opt('exsit_copyright_text');

            if (!empty($copyright)) {
                echo wp_kses_post($copyright);
            } else {
                // Fallback text if option is empty
                echo sprintf(
                    esc_html__('Exsit Sass © %s – All Rights Reserved', 'exsit'),
                    esc_html( date_i18n( 'Y' ) )
                );
            }

        } else {
            // Fallback if helper plugin is not active
            echo sprintf(
                esc_html__('Exsit Sass © %s – All Rights Reserved', 'exsit'),
                esc_html( date_i18n( 'Y' ) )
            );
        }

        echo '</p>';
        echo '</div>';
        echo '</div>';

        echo '</div>'; // .container
        echo '</footer>'; // .footer-wrap
        echo '<!-- FOOTER WRAPPER  -->';
    }
}



// Blog details wrapper start hook function
if (!function_exists('exsit_blog_details_wrapper_start_cb')) {
    function exsit_blog_details_wrapper_start_cb()
    {

        echo '<section class="single-blog">';

        echo '<div class="container">';

        if (is_active_sidebar('blog-sidebar')) {
            $exsit_gutter_class = ''; // 
        } else {
            $exsit_gutter_class = '';
        }

        echo '<div class="row justify-content-center g-5 ' . esc_attr($exsit_gutter_class) . '">';
    }
}

// Blog Details Wrapper end hook function
if (!function_exists('exsit_blog_details_wrapper_end_cb')) {
    function exsit_blog_details_wrapper_end_cb()
    {
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
}

if (!function_exists('exsit_blog_details_hero_cb')) {
    function exsit_blog_details_hero_cb()
    {

        if (!is_single()) {
            return;
        }
        // Text column
        echo '<div class="col-lg-9 text-center pb-65">';

        // Category Badge
        $cats = get_the_category();
        if (!empty($cats)) {
            echo '<div class="d-flex flex-row mx-auto justify-content-center mb-3">';
            echo '<div class="px-3 py-1 border border-gray-200 rounded-3 fs-13 fw-600 text-uppercase text-gray-900 bg-white shadow-sm align-items-center gap-2 d-flex w-auto" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="400">';
            echo esc_html($cats[0]->name);
            echo '</div>';
            echo '</div>';
        }

        // Post Title
        echo '<h1 class="display5-size text-gray-900 fw-600 mb-lg-2 mb-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="0">';
        echo esc_html(get_the_title());
        echo '</h1>';

        // Post Excerpt (Subtitle)
        if (has_excerpt()) {
            echo '<p class="text-gray-700 fw-400 mb-0 fs-16" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">';
            echo esc_html(get_the_excerpt());
            echo '</p>';
        }

        echo '</div>'; // .col-lg-9

        // Featured Image (Full width under hero text)
        if (has_post_thumbnail()) {
            echo '<div class="col-lg-12 maxw-1200 mt-0" data-aos="fade-up" data-aos-duration="400" data-delay="00">';
            the_post_thumbnail('full', array(
                'class' => 'object-fit-cover w-100 rounded-4',
                'loading' => 'eager',
                'alt' => esc_attr(get_the_title()),
            ));
            echo '</div>';
        }


    }
}


function exsit_get_blog_layout() {
    // 1. Check post meta
    $meta = get_post_meta(get_the_ID(), '_exsit_blog_layout', true);

    if (in_array($meta, ['left', 'right', 'none'], true)) {
        return $meta;
    }
    // 2. CSF fallback
    if (class_exists('CSF')) {
        $opt = exsit_opt('exsit_blog_single_sidebar');

        if ($opt == '2') return 'left';
        if ($opt == '3') return 'right';
        if ($opt == '1') return 'none';
    }

    // 3. Final fallback → NO SIDEBAR
    return 'none';
}

// Blog details column wrapper start hook function
if (!function_exists('exsit_blog_details_col_start_cb')) {
    function exsit_blog_details_col_start_cb()
    {
        // 1. Get post meta
        $meta = get_post_meta(get_the_ID(), '_exsit_blog_layout', true);

        // 2. Get CSF option safely
        $blogtab = exsit_opt('exsit_blog_setting');
        $csf_layout = '';

        if (class_exists('CSF') && !empty($blogtab) && is_array($blogtab)) {
            $csf_layout = isset($blogtab['exsit_blog_single_sidebar']) 
                ? $blogtab['exsit_blog_single_sidebar'] 
                : '';
        }

        echo '<div class="row pt-5 justify-content-center maxw-1200">';

        // =========================
        // PRIORITY 1: POST META
        // =========================
        if (in_array($meta, ['left', 'right', 'none'], true)) {

            if ($meta === 'left' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-8 order-lg-last">';
            } elseif ($meta === 'right' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-9">';
            }

            return;
        }

        // =========================
        // PRIORITY 2: CSF OPTION
        // =========================
        if (!empty($csf_layout)) {

            if ($csf_layout == '2' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-8 order-lg-last">';
            } elseif ($csf_layout == '3' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } elseif ($csf_layout == '1') {
                echo '<div class="col-lg-9">';
            } else {
                echo '<div class="col-lg-8">';
            }

            return;
        }

        // =========================
        // PRIORITY 3: SIDEBAR CHECK
        // =========================
        if (is_active_sidebar('exsit-blog-sidebar')) {
            echo '<div class="col-lg-8">';
        } else {
            echo '<div class="col-lg-12">';
        }
    }
}

// Blog details column wrapper end hook function
if (!function_exists('exsit_blog_details_col_end_cb')) {
    function exsit_blog_details_col_end_cb()
    {
        echo '</div>'; // .col 
    }
}

// Blog details sidebar hook function
if (!function_exists('exsit_blog_details_sidebar_cb')) {
    function exsit_blog_details_sidebar_cb()
    {
        // 1. Get post meta
        $meta = get_post_meta(get_the_ID(), '_exsit_blog_layout', true);

        // 2. Get CSF option safely
        $blogtab = exsit_opt('exsit_blog_setting');
        $csf_layout = '';

        if (class_exists('CSF') && !empty($blogtab) && is_array($blogtab)) {
            $csf_layout = isset($blogtab['exsit_blog_single_sidebar']) 
                ? $blogtab['exsit_blog_single_sidebar'] 
                : '';
        }

        // =========================
        // PRIORITY 1: POST META
        // =========================
        if (in_array($meta, ['left', 'right', 'none'], true)) {

            if ($meta !== 'none' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-4">';
                get_sidebar('blog');
                echo '</div>';
            }

            echo '</div>'; // close .row
            return;
        }

        // =========================
        // PRIORITY 2: CSF OPTION
        // =========================
        if (!empty($csf_layout)) {

            if ($csf_layout != '1' && is_active_sidebar('exsit-blog-sidebar')) {
                echo '<div class="col-lg-4">';
                get_sidebar('blog');
                echo '</div>';
            }

            echo '</div>'; // close .row
            return;
        }

        // =========================
        // PRIORITY 3: FALLBACK
        // =========================
        if (is_active_sidebar('exsit-blog-sidebar')) {
            echo '<div class="col-lg-4">';
            get_sidebar('blog');
            echo '</div>';
        }

        echo '</div>'; // close .row
    }
}

// Blog details post navigation hook function
if ( ! function_exists( 'exsit_blog_details_post_navigation_cb' ) ) {
    function exsit_blog_details_post_navigation_cb() {

        $blogtab = function_exists('exsit_opt') ? exsit_opt('exsit_blog_setting') : array();

        if ( class_exists('CSF') && ! empty($blogtab) && is_array($blogtab) ) {
            $exsit_post_details_post_navigation = $blogtab['exsit_post_details_post_navigation'] ?? true;
        } else {
            $exsit_post_details_post_navigation = true;
        }

        // Stop execution if disabled
        if ( ! $exsit_post_details_post_navigation ) {
            return;
        }

        $prevpost = get_previous_post();
        $nextpost = get_next_post();

        // Also prevent wrapper if no posts exist
        if ( empty($prevpost) && empty($nextpost) ) {
            return;
        }

        echo '<!-- Post Navigation -->';
        echo '<div class="post-navigation">';

        if ( ! empty($prevpost) ) {
            echo '<div class="nav-previous">';
            echo '<a href="' . esc_url( get_permalink( $prevpost->ID ) ) . '">';
            echo '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>';
            echo esc_html__( 'Previous post', 'exsit' );
            echo '</a>';
            echo '</div>';
        }

        if ( ! empty($nextpost) ) {
            echo '<div class="nav-next">';
            echo '<a href="' . esc_url( get_permalink( $nextpost->ID ) ) . '">';
            echo esc_html__( 'Next post', 'exsit' ) . ' ';
            echo '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
        echo '<!-- End Post Navigation -->';
    }
}

// Blog details author bio hook function
if (!function_exists('exsit_blog_details_author_bio_cb')) {
    function exsit_blog_details_author_bio_cb()
    {

        $blogtab = function_exists('exsit_opt') ? exsit_opt('exsit_blog_setting') : array();

        // Default: hide
        $show_author = false;

        if (class_exists('CSF') && is_array($blogtab)) {
            $show_author = !empty($blogtab['exsit_post_details_author_desc_trigger']);
        }

        // Stop if disabled
        if (!$show_author) {
            return;
        }

        // Stop if author has no bio
        if (!get_the_author_meta('description')) {
            return;
        }

        echo '<!-- Post Author -->';
        echo '<div class="post-author d-flex gap-3 align-items-center">';

        echo '<div class="post-author-avater">';
        echo get_avatar(get_the_author_meta('ID'), 96, '', get_the_author(), array(
            'class' => 'rounded-circle'
        ));
        echo '</div>';

        echo '<div class="post-author-body">';

        echo '<h3 class="author-name h5 mb-1">';
        echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
        echo esc_html(get_the_author());
        echo '</a>';
        echo '</h3>';

        echo '<p class="author-text mb-0">';
        echo esc_html(get_the_author_meta('description'));
        echo '</p>';

        echo '</div>';
        echo '</div>';
        echo '<!-- End Post Author -->';
    }
}

// Blog Details Comments hook function
if (!function_exists('exsit_blog_details_comments_cb')) {
    function exsit_blog_details_comments_cb()
    {

        // If comments are closed, show message
        if (!comments_open()) {
            echo '<div class="blog-comment-area">';
            echo '<h3 class="inner-title">';
            echo esc_html__('Comments are closed', 'exsit');
            echo '</h3>';
            echo '</div>';
        }

        // Load comments template if comments open or already exist
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    }
}

// Blog Details Related Post hook function
if (!function_exists('exsit_blog_details_related_post_cb')) {
    function exsit_blog_details_related_post_cb()
    {

        $blogtab = function_exists('exsit_opt') ? exsit_opt('exsit_blog_setting') : array();

        $show_related = false;

        if (class_exists('CSF') && is_array($blogtab)) {
            $show_related = !empty($blogtab['exsit_post_details_related_post']);
        }

        if (!$show_related) {
            return;
        }

        $categories = wp_get_post_categories( get_the_ID() );

        if ( empty( $categories ) ) {
            return;
        }

        // Query related posts by same categories
        $relatedpost = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category__in'        => $categories,
            'post__not_in' => array(get_the_ID()),
            'ignore_sticky_posts' => true,
            'no_found_rows'       => true,
        ));

        if ($relatedpost->have_posts()) {

            echo '<!-- Related Post -->';
            echo '<div class="col-12 related-post">';
            echo '<h2 class="fw-600 display5-size text-gray-900 mb-5 pt-2 text-center">';
            echo esc_html__('Related', 'exsit') . ' <span class="text-theme">' . esc_html__('posts', 'exsit') . '</span>';
            echo '</h2>';

            echo '<div class="row">';

            while ($relatedpost->have_posts()) {
                $relatedpost->the_post();

                echo '<div class="col-lg-4 col-md-6 col-sm-12 article-style-two">';

                // 🔥 Reuse your blog style template
                // get_template_part('templates/blog-style-two');
                // OR (recommended naming):
                get_template_part( 'template-parts/content', 'blog-style-two' );

                echo '</div>';
            }

            wp_reset_postdata();

            echo '</div>';
            echo '</div>';
            echo '<!-- End Related Post -->';
        }
    }
}


// Page Start Wrapper
if (!function_exists('exsit_page_start_wrap_cb')) {
    function exsit_page_start_wrap_cb()
    {
        echo '<!-- MAIN WRAPPER  -->';
        echo '<section class="page-section pb-100">';
        echo '<div class="container">';
        echo '<div class="row g-5">';
    }
}

// Page Column Start Wrapper Function
if (!function_exists('exsit_page_col_start_wrap_cb')) {
    function exsit_page_col_start_wrap_cb()
    {
        // 🚀 Disable sidebar for WooCommerce core pages
        if (function_exists('is_cart') && (is_cart() || is_checkout() || is_account_page())) {
            echo '<div class="col-lg-12 woocommerce-full">';
            return;
        }

        // If Codestar Framework exists
        if (class_exists('CSF') && function_exists('exsit_opt')) {

            $page_sidebar = exsit_opt('exsit_page_sidebar');

            if ($page_sidebar == '2' && is_active_sidebar('exsit-page-sidebar')) {
                // Left Sidebar
                echo '<div class="col-lg-8 order-lg-last">';

            } elseif ($page_sidebar == '3' && is_active_sidebar('exsit-page-sidebar')) {
                // Right Sidebar
                echo '<div class="col-lg-8">';

            } else {
                // No Sidebar / Full Width
                echo '<div class="col-lg-12">';
            }

        } else {
            // Fallback
            if (is_active_sidebar('exsit-page-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }
        }
    }
}

// Page Column End
if (!function_exists('exsit_page_col_end_wrap_cb')) {
    function exsit_page_col_end_wrap_cb()
    {
        echo '</div>'; // .col
    }
}


// Page Sidebar
// Page Sidebar
if (!function_exists('exsit_page_sidebar_cb')) {
    function exsit_page_sidebar_cb()
    {
        //  Disable sidebar for WooCommerce pages
        if (function_exists('is_cart') && (is_cart() || is_checkout() || is_account_page())) {
            return;
        }

        // Default options
        $page_sidebar_layout = '3'; // right sidebar
        $page_sidebar_type = '1'; // page sidebar by default

        // Get options
        if (class_exists('CSF') && function_exists('exsit_opt')) {

            $layout = exsit_opt('exsit_page_sidebar');
            $type = exsit_opt('exsit_page_layoutopt');

            if (!empty($layout)) {
                $page_sidebar_layout = $layout;
            }

            if (!empty($type)) {
                $page_sidebar_type = $type;
            }
        }

        // No sidebar selected
        if ($page_sidebar_layout == '1') {
            return;
        }

        // Decide which widget area to use
        $sidebar_id = ($page_sidebar_type == '2') ? 'exsit-blog-sidebar' : 'exsit-page-sidebar';

        // If no widgets → skip
        if (!is_active_sidebar($sidebar_id)) {
            return;
        }

        // Output sidebar
        echo '<div class="col-lg-4">';
        echo '<div class="sidebar-area sticky-sidebar" role="complementary" aria-label="' . esc_attr__('Page Sidebar', 'exsit') . '">';
        dynamic_sidebar($sidebar_id);
        echo '</div>';
        echo '</div>';
    }
}

// Page End Wrapper
if (!function_exists('exsit_page_end_wrap_cb')) {
    function exsit_page_end_wrap_cb()
    {
        echo '</div>'; // .row
        echo '</div>'; // .container
        echo '</section>';
    }
}



// Page content hook function
if (!function_exists('exsit_page_content_cb')) {
    function exsit_page_content_cb() {
        echo '<!-- PAGE CONTENT -->';
        // WooCommerce-aware wrapper
        if (class_exists('woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
            echo '<div class="woocommerce--content">';
        } else {
            echo '<div class="page--content clearfix">';
        }

        the_content();

        // Support paginated pages
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'exsit'),
            'after' => '</div>',
        ));

        echo '</div>';

        // Comments on pages (optional, Envato-friendly)
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    }
}

// Page Title Hook Function
if ( ! function_exists( 'exsit_page_title_cb' ) ) {
    function exsit_page_title_cb() {

        echo '<!-- PAGETITLE WRAPPER -->';
        echo '<div class="banner-wrap header-top position-relative light-blue-banner">';
        echo '<div class="container py-100">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-7 text-center justify-content-center">';

        // ===== TITLE =====
        echo '<h1 class="display6-size text-gray-900 fw-700 mb-lg-2 mb-13 lh-5">';

        if ( is_search() ) {

            echo esc_html__( 'Search result', 'exsit' );

        } elseif ( function_exists( 'is_shop' ) && is_shop() && function_exists( 'wc_get_page_id' ) ) {

            echo '<span>' . esc_html( get_the_title( wc_get_page_id( 'shop' ) ) ) . '</span>';

        } elseif ( is_category() ) {

            echo '<span>' . esc_html__( 'Category:', 'exsit' ) . ' ' . esc_html( single_term_title( '', false ) ) . '</span>';

        } elseif ( is_tag() ) {

            echo '<span>' . esc_html__( 'Tag:', 'exsit' ) . ' ' . esc_html( single_term_title( '', false ) ) . '</span>';

        } elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) {

            echo '<span>' . esc_html( single_term_title( '', false ) ) . '</span>';

        } elseif ( function_exists( 'is_product_category' ) && is_product_category() ) {

            echo '<span>' . esc_html( single_term_title( '', false ) ) . '</span>';

        } elseif ( is_archive() ) {

            $title = get_the_archive_title();
            $title = preg_replace( '/^\w+:\s/', '', $title );

            echo '<span>' . esc_html( $title ) . '</span>';

        } elseif ( is_404() ) {

            echo esc_html__( 'Page Not Found', 'exsit' );

        } else {

            echo esc_html( get_the_title() );
        }

        echo '</h1>';

        // ===== BREADCRUMB =====
        echo '<nav class="d-flex align-items-center justify-content-center gap-2 mt-3 mb-0" aria-label="' . esc_attr__( 'Breadcrumb', 'exsit' ) . '">';

        // Home
        echo '<span class="text-gray-800 fw-500">';
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="text-gray-800">';
        echo esc_html__( 'Home', 'exsit' );
        echo '</a>';
        echo '</span>';

        // Arrow
        echo '<svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none">';
        echo '<polyline points="9 18 15 12 9 6"></polyline>';
        echo '</svg>';

        // Current page
        echo '<span class="text-gray-800 fw-500">';

        if ( is_search() ) {

            echo esc_html( get_search_query() );

        } elseif ( function_exists( 'is_shop' ) && is_shop() && function_exists( 'wc_get_page_id' ) ) {

            echo esc_html( get_the_title( wc_get_page_id( 'shop' ) ) );

        } elseif ( is_category() ) {

            echo esc_html( single_term_title( '', false ) );

        } elseif ( is_tag() ) {

            echo esc_html( single_term_title( '', false ) );

        } elseif ( function_exists( 'is_product_category' ) && is_product_category() ) {

            echo esc_html( single_term_title( '', false ) );

        } elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) {

            echo esc_html( single_term_title( '', false ) );

        } elseif ( is_archive() ) {

            $title = get_the_archive_title();
            $title = preg_replace( '/^\w+:\s/', '', $title );

            echo esc_html( $title );

        } elseif ( is_404() ) {

            echo esc_html__( '404', 'exsit' );

        } else {

            echo esc_html( get_the_title() );
        }

        echo '</span>';

        echo '</nav>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<!-- END PAGETITLE WRAPPER -->';
    }
}


if (!function_exists('exsit_blog_post_tags_cb')) {
    function exsit_blog_post_tags_cb() {

        if (!is_single() || !has_tag()) {
            return;
        }

        echo '<div class="post-tags">';
        echo wp_kses_post( get_the_tag_list('', ' ') );
        echo '</div>';
    }
}