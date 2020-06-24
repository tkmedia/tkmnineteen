<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="archive_product_item subcategory_item col-xs-6 col-sm-6 col-md-4 col-lg-3">
	<div class="archive_product_item_container">
		<div <?php wc_product_cat_class( '', $category ); ?>>
			<?php
			/**
			 * woocommerce_before_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_open - 10
			 */
			do_action( 'woocommerce_before_subcategory', $category );

			/**
			 * woocommerce_before_subcategory_title hook.
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			?>

			<div class="subcategory_title_wrap">
			<?php
			/**
			 * woocommerce_shop_loop_subcategory_title hook.
			 *
			 * @hooked woocommerce_template_loop_category_title - 10
			 */
			//do_action( 'woocommerce_shop_loop_subcategory_title', $category );
			?>
			
				<div class="woocommerce-loop-category__title">
					<?php
					echo esc_html( $category->name ).' ';
		
					if ( $category->count > 0 ) {
						echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
					}
					?>
				</div>
			
			</div>

			<?php
			/**
			 * woocommerce_after_subcategory_title hook.
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		
			/**
			 * woocommerce_after_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_close - 10
			 */
			do_action( 'woocommerce_after_subcategory', $category ); ?>
		</div>
	</div>
</div>
