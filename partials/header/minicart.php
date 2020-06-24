<?php
$header_email_icon = get_field('header_email_icon','option');
$social_links = get_field('header_top_nav_left','option');
$panel_bg_color = get_field('header_top_panel_bg_color','option');
$panel_font_color = get_field('header_top_panel_font_color','option');

$header_phone = esc_html( get_option( 'options_header_phone' ) );
$header_main_email = esc_html( get_option( 'options_header_main_email' ) );
$panel_text = esc_html( get_option( 'options_header_top_panel_right' ) );
$show_phone = get_option('options_header_top_panel_phone_show');
$show_nav = get_option('options_header_top_panel_nav_show');
$htp_mid = get_option( 'options_htp_mid' );

$header_top_panel_phone = esc_html( get_option( 'options_header_top_panel_phone' ) );

 ?>

<?php if ( class_exists( 'Woocommerce' ) ) : ?>
<div class="header-minicart">
	<div class="shopping_cart_content">
		<div id="mini-cart" class="mini-cart">
			<div class="cart-head">
				<i class="fal fa-shopping-bag"></i>
				<span id="mcart-stotal" class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				<span class="cart-items-text"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
				<!--
				<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
				-->
			</div>
			<div class="cart-popup widget_shopping_cart_wrap">
				<div class="widget_shopping_cart_head">
					<span class="widget_shopping_cart_title"><?php _e('Shopping Cart', 'tkmnineteen'); ?></span>
					<i class="fal fa-times-circle widget_shopping_cart_close"></i>
				</div>
				<div class="widget_shopping_cart_content">
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
