<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">

	<div id="checkout-cart-order">
		
		<div class="checkout-cart-order-list">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' ); ?>
		
			<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
			
					<div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						
						<div class="product-thumbnail-col">
							<div class="product-thumbnail">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('portrait'), $cart_item, $cart_item_key );
	
							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>
							</div>
						</div>
						
						<div class="product-info-col">
							<div class="product-info-col-name">
								
								<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}
		
								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
		
								// Meta data.
								//echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
		
								// Backorder notification.
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
								}
								?>
								</div>
								<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
								
								<?php
								if ( $cart_item['data']->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) { ?>
								<div class="product-data">
								<?php
								// Meta data.
								echo wc_get_formatted_cart_item_data( $cart_item, $flat = true, $return = true );
								?>
								</div>
								<?php } ?>
								
							</div>
							
							<div class="product-info-col-data">
								
								<div class="product-info-col-quantity">
									<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
									<span><?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>: </span>
										
									<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <span class="product-quantity">' . sprintf( $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</div>
								</div>
								<?php if ( $_product->get_sku() ) { ?>
								<div class="product-sku" data-title="<?php esc_attr_e( 'SKU', 'woocommerce' ); ?>">
									<span><?php esc_attr_e( 'SKU', 'woocommerce' ); ?>: </span>
									<?php echo $_product->get_sku(); ?>
								</div>
								<?php } ?>							
								<div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
									<span><?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>: </span>
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
							</div>

						</div>
					</div>
						<?php
					}
				}
				?>

			</div>
		
		<?php
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
		</div>
	</div>


	<div id="checkout-cart-subtotal">

		<div class="cart-subtotal">
			<div class="cart-subtotal-title"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="cart-subtotal-value"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
				<div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<div class="checkout_shipping">
			<?php wc_cart_totals_shipping_html(); ?>
			</div>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<div><?php echo esc_html( $fee->name ); ?></div>
				<div><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
					<div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<div><?php echo esc_html( $tax->label ); ?></div>
						<div><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<div><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="order-total">
			<div><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
			<div><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</div>




</div>