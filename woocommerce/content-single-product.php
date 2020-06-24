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
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_custom_dim = get_field('procu_dim');
$procu_dimb = get_field('procu_dimb');
$procu_dimt_ft = get_field( 'procu_dimt_ft');
$procu_dimt_fst = get_field( 'procu_dimt_fst');

$procu_dimt = get_option('options_procu_dimt');
$procu_dimt_dft = get_option( 'options_procu_dimt_dft' );
$procu_dimt_dfst = get_option( 'options_procu_dimt_dfst' );
$procu_dimt_fsi = get_field( 'procu_dimt_fsi','option' );

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
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product_full_content', $product ); ?>>
	<div class="product-summary-wrap">
		<div class="product-summary-container wrap">
			
			<div class="row-flex product-summary-row">
				
				<div class="col-xs-12 col-sm-6 col-lg-5 summary summary-before">
					
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
			
				</div>
		
				<div class="col-xs-12 col-sm-6 col-lg-7 summary entry-summary entry-summary-info">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>					
				</div>				
			</div>
			
		</div>
				
		<div class="product_after_info">
			<div class="product_after_info_wrap wrap">
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
		
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
