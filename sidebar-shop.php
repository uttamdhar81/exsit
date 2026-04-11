<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit( );
}
/**
* @Packge 	   : Lonyo
* @Version     : 1.0
* @Author     : Mthemeus
* @Author URI : https://mthemeus.com/
*
*/

if( ! is_active_sidebar( 'exsit-woo-sidebar' ) ){
    return;
}
?>
<div class="col-lg-4">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'exsit-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>