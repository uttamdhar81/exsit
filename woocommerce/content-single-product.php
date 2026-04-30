<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 10.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$layout = get_post_meta(get_the_ID(), '_exsit_product_layout', true);

// default fallback
if (empty($layout)) {
    $layout = 'layout1';
}

$img_class = 'product-details-img product-img';

if ($layout === 'layout2') {
    $img_class .= ' product-img-horizontal';
} elseif ($layout === 'layout3') {
	$img_class .= ' product-img-vertical';
}

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( array( '', 'single-product-content' ), $product ); ?>>
	<?php
	echo '<div class="row gx-5">';
		echo '<div class="col-lg-6">';
			echo '<div class="'.esc_attr($img_class).'">';
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			echo '</div>';
		echo '</div>';
		echo '<div class="col-lg-6">';
			echo '<div class="product-about">';
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked exsit_woocommerce_single_product_price_rating - 30
				 * @hooked woocommerce_template_single_excerpt - 40
				 * @hooked exsit_woocommerce_single_product_availability - 50
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );

			echo '</div>';
		echo '</div>';
	echo '</div>';
	?>
</div>
    
<div class="product-summary-wrap">
	<div class="container">
		<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
</div>
<?php do_action( 'exsit_woocommerce_output_related_products' ); ?>



<?php do_action( 'woocommerce_after_single_product' ); ?>