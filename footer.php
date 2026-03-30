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
    /**
    *
    * Hook for Footer Content
    *
    * Hook exsit_footer_content
    *
    * @Hooked exsit_footer_content_cb 10
    *
    */
    do_action( 'exsit_footer_content' );

    if( !is_404( ) ) {
        /**
        *
        * Hook for Back to Top Button
        *
        * Hook exsit_back_to_top
        *
        * @Hooked exsit_back_to_top_cb 10
        *
        */
        do_action( 'exsit_back_to_top
        
        
        
        ' );
    }


    wp_footer();
    ?>
</body>
</html>