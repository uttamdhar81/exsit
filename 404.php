<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme options fallback
if (class_exists('CSF')) {
    $exsit_404_title = exsit_opt('exsit_404_title', __('Oops! That page cant be found.', 'exsit'));
    $exsit_404_text = exsit_opt('exsit_404_subtitle', __('Oops, the page you are trying to access does not exist ? Try again later or go back to home.', 'exsit'));
    $exsit_404_btn_text = exsit_opt('exsit_404_btn_text', __('Back to Home', 'exsit'));
    $exsit_404_image = exsit_opt('exsit_error_image');
} else {
    $exsit_404_title = __('Oops! That page cant be found.', 'exsit');
    $exsit_404_text = __('Oops, the page you are trying to access does not exist ? Try again later or go back to home.', 'exsit');
    $exsit_404_btn_text = __('Back to Home', 'exsit');
    $exsit_404_image = '';
}

get_header();
?>

<section class="error-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-duration="700">

                <?php
                if (!empty($exsit_404_image['url'])) {
                    echo '<div class="error-thumb mb-4">';
                    echo '<img src="' . esc_url($exsit_404_image['url']) . '" alt="404" class="img-fluid">';
                    echo '</div>';
                } else {
                    echo '<h1>404</h1>';
                }
                ?>
            </div>
            <div class="col-12"></div>
            <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-duration="700">
                <h2 class="display5-size fw-700 mb-3 text-gray-900"><?php echo esc_html($exsit_404_title); ?></h2>

                <?php if (!empty($exsit_404_text)): ?>
                    <p class="mb-4"><?php echo esc_html($exsit_404_text); ?></p>
                <?php endif; ?>

                <?php if (!empty($exsit_404_btn_text)): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html($exsit_404_btn_text); ?>
                    </a>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>