<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

echo '<!-- Single Post -->';
?>
<article <?php post_class('post-article flex-column gap-4 mb-4'); ?>
        aria-label="<?php echo esc_attr( get_the_title() ); ?>"
        data-aos="zoom-in" data-aos-delay="0" data-aos-duration="300">

    <?php
    // Blog Post Thumbnail
    do_action('exsit_blog_post_thumb');

    // Blog Post Content
    do_action('exsit_blog_post_content');
    ?>

</article>
<?php
echo '<!-- End Single Post -->';