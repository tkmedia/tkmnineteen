<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

$related_products_title_d = get_field('related_products_title_d','option'); 
$related_products_title = get_field('related_products_title'); 
$related_products_subtitle_d = get_field('related_products_subtitle_d','option'); 
$related_products_subtitle = get_field('related_products_subtitle'); 

if ( $related_products ) : ?>
	<section id="related_products">
		<div class="related_products">
			<div class="split-title product_split_title">
				<h2 class="product_title related_products_title" itemprop="headline">
				<?php 
				if ( $related_products_title ) {
					echo $related_products_title;
				} elseif ( $related_products_title_d ) {
					echo $related_products_title_d;
				} else {	
					//esc_html_e( 'Related products', 'woocommerce' ); //@version 3.0.0
					echo esc_html( $heading );
				}
				?>
				</h2>
				
				<span class="title_last">
				<?php 
				if ( $related_products_subtitle ) {
					echo $related_products_subtitle;
				} elseif ( $related_products_subtitle_d ) {
					echo $related_products_subtitle_d;
				}
				?>
				</span>
			</div>

			<div class="related_products_slider">
				<div class="related_products_row">
				<?php woocommerce_product_loop_start(); ?>
					<div class="product_related_products_row">
					<?php foreach ( $related_products as $related_product ) : ?>
		
						<?php
						 	$post_object = get_post( $related_product->get_id() );
		
							setup_postdata( $GLOBALS['post'] =& $post_object );
		
							wc_get_template_part( 'content', 'product-related' ); ?>
		
					<?php endforeach; ?>
					</div>
				<?php woocommerce_product_loop_end(); ?>
				</div>
			</div>
		</div>
	</section>

<?php endif;

wp_reset_postdata();
