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
<article <?php post_class('post-article flex-md-row d-flex gap-4 flex-column mb-4'); ?> 
        aria-label="<?php esc_attr_e('Article', 'exsit'); ?>">

    <?php
    // Blog Post Thumbnail
    do_action('exsit_blog_post_thumb');

    // Blog Post Content
    do_action('exsit_blog_post_content');
    ?>

</article>
<?php
echo '<!-- End Single Post -->';