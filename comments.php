<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */


if ( ! defined( 'ABSPATH' ) ) exit;

if ( post_password_required() ) {
    return;
}

if ( have_comments() ) : ?>
    <div class="comments-wrap">
        <h3 class="blog-inner-title">
            <?php
            printf(
                _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'exsit' ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h3>

        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 80,
                'callback'    => 'exsit_comment_callback',
            ) );
            ?>
        </ul>

        <?php the_comments_navigation(); ?>
    </div>
<?php endif; ?>


<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? "required" : '' );

$fields = array(
    'author' =>
        '<div class="col-md-6 form-group mt-3">
            <input class="form-control" type="text" name="author" placeholder="'. esc_attr__( 'Your Name *', 'exsit' ) .'" value="'. esc_attr( $commenter['comment_author'] ) .'" '. $aria_req .'>
        </div>',

    'email'  =>
        '<div class="col-md-6 form-group mt-3">
            <input class="form-control" type="email" name="email" placeholder="'. esc_attr__( 'Your Email *', 'exsit' ) .'" value="'. esc_attr( $commenter['comment_author_email'] ) .'" '. $aria_req .'>
        </div>',
);

$args = array(
    'fields'               => $fields,   // ✅ MUST be array
    'comment_field'       =>
        '<div class="form-group col-12">
            <textarea class="form-control" name="comment" placeholder="'. esc_attr__( 'Write your comment...', 'exsit' ) .'" rows="5" required></textarea>
        </div>',
    'title_reply'         => esc_html__( 'Leave a Comment', 'exsit' ),
    'class_form'          => 'comment-form row',
    'class_submit'        => 'btn btn-primary btn-lg mt-3',
    'submit_button'       => '<button type="submit" class="%3$s">%4$s</button>',
);

if ( comments_open() ) :
    echo '<div id="comments" class="exsit-comment-form">';
        comment_form( $args );
    echo '</div>';
endif;