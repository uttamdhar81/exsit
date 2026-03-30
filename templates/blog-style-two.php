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
<div class="post-article flex-column gap-4 flex-column mb-4" aria-label="article" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="300" <?php post_class(); ?>>

    <?php
    // Blog Post Thumbnail
    do_action('exsit_blog_post_thumb');

    // Blog Post Content
    do_action('exsit_blog_post_content');
    ?>

</div>
<?php
echo '<!-- End Single Post -->';