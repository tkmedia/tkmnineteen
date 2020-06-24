<?php
/**
 * Classic header.
 *
 * @since   3.0.0
 * @package tkmnineteen
 * @author Tal Katz TKMedia.co.il
 */
//ACF Theme option field
$menu_position = get_option( 'options_hc_mp' );
$logo_position = get_option( 'options_hc_lp' );
$header_height = get_option( 'options_hc_ht' );
$header_trans = get_option( 'options_hc_trans' );
$header_bgcolor = get_option( 'options_hc_bgc' );
$show_top_bar = get_option( 'options_hc_stb' );
$logo_width = get_option( 'options_hc_lw' );
$header_width = get_option( 'options_hc_wid' );
$header_wrap = get_option( 'options_hc_hwr' );
$header_bgcolorsticky = get_option( 'options_hc_bgc' );
$header_bgcolorscroll = get_option( 'options_hc_bgcs' );

if ($show_top_bar) {
	$top_bar_bg = get_option( 'options_hc_tbbg' );
	$top_bar_bgcolor = get_option( 'options_hc_tbbgc' );
	$top_bar_split = get_option( 'options_hc_tbsl' );
	$top_bar_right = get_option( 'options_hc_tbri' );
	$top_bar_left = get_option( 'options_hc_tble' );
}

$menu_height = get_option( 'options_hc_mnh' );
$menu_bgcolor = get_option( 'options_hc_mnbg' );
$menu_fontsize = get_option( 'options_hc_mnfs' );
$menu_fontcolor = get_option( 'options_hc_mnfc' );
$menu_dividers = get_option( 'options_hc_mndi' );

$Hex_foc = $menu_fontcolor;
$RGB_foc = hex2rgb($Hex_foc);
$Final_foc = implode(", ", $RGB_foc);
$Hex_hbgs = $header_bgcolorsticky;
$RGB_hbgs = hex2rgb($Hex_hbgs);
$Final_hbgs = implode(", ", $RGB_hbgs);

if ( class_exists( 'Woocommerce' ) ) {
	$mcart_po = get_option( 'options_mcart_po' );
}

$header_layout = get_option( 'options_op_hely' );
?>
<style>
.header-classic .header_wrap {max-width:<?php echo $header_wrap; ?>px;}
.header-classic .header_menu_container .nav_mibicart.top_bar_minicart.mc_snav,
.header-classic .header_menu_container .nav_mibicart.top_bar_minicart.mc_snav #mini-cart .cart-head, 
.header-classic .header_menu_container .nav_mibicart.top_bar_minicart.mc_snav .header-minicart-search, 
.header-classic .header_menu_container .nav_mibicart.top_bar_minicart.mc_snav .header-minicart-my {height:<?php echo $menu_height; ?>px;}
@media (min-width: 992px) {
	.header-classic .normal_menu .nav-primary.menu > ul > li > .child-wrap:before, .header-inline .normal_menu .nav-primary.menu > ul > li > .child-wrap:before, .header-split .normal_menu .nav-primary.menu > ul > li:before, .header-split .normal_menu .nav-primary.menu > ul > li.current-menu-item:before {background-color: <?php echo $header_bgcolor; ?>;background: <?php echo $header_bgcolor; ?>;background: -webkit-linear-gradient(left, <?php echo $header_bgcolor; ?> 30%, <?php echo $header_bgcolor; ?> 100%);opacity: 0.8;}	
	}
	.normal_menu .menu > ul > li > ul.normal-sub > li a {}
	.header-classic .menu > ul > li > .child-wrap > a,
	.header-classic .dividers-full .menu > ul > li > .child-wrap {color: <?php echo $menu_fontcolor; ?>;border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.header-classic .header_menu_container #header-menu.dividers-full > ul > li > .child-wrap {border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.normal_menu ul#main-menu > li.current-menu-item a, 
	.normal_menu .nav-primary.menu > ul > li:hover > a, 
	.normal_menu ul#main-menu > li.current-menu-item .child-wrap a, 
	.normal_menu .nav-primary.menu > ul > li:hover > .child-wrap > a {color: rgba(<?php echo $Final_foc; ?>,0.7);}
	header .menu > ul > li > a, 
	header .menu > ul > li > .child-wrap > a, 
	.header-classic .menu > ul > li > .child-wrap > a,
	.header-classic .normal_menu ul#main-menu > li.current-menu-item a span {color:<?php echo $menu_fontcolor; ?>;font-size:<?php echo $menu_fontsize; ?>px !important;}
	.header_menu_container .menu li a, 
	.header_menu_container .menu > ul > li > ul.normal-sub > li a, 
	.header_menu_container .menu > ul > li > ul > li a {font-size:<?php echo $menu_fontsize; ?>px !important;}
	.site:not(.header-side).sticky-scroll #header-container.scroll_white.fixed-header {background-color:rgba(255,255,255,0.8);}
	.site:not(.header-side).sticky-scroll #header-container.scroll_black.fixed-header {background-color:rgba(0,0,0,0.8);}
	.scroll_white.normal_menu .menu > ul > li > ul.normal-sub, 
	.scroll_white.normal_menu ul.sub-menu.megamenu {border-top: 2px solid <?php echo $header_bgcolor; ?>;}

}
@media (max-width: 991px) {
	.site:not(.header-side).sticky-scroll #header-container.scroll_white.fixed-header {background-color:rgba(255,255,255,0.8);}	
	#header-container.scroll_white .hamburger-menu .bar {background-color: #000;}
}
@media (max-width: 767px) {
	.branding_wrap {max-width:<?php echo $logo_width; ?>px;width: auto !important;}
}

</style>

<?php get_template_part( 'partials/header/hamburger' ); ?>

<header id="header-container" class="clearfix normal_menu<?php if (is_front_page()) { ?> front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?> archive_header_container<?php } elseif ( is_singular() ) { ?> deafault_header_container<?php } else { ?> deafault_header_container<?php } ?> <?php echo $menu_position.' '.$logo_position; ?><?php if( $header_trans ) { ?> header_trans<?php } ?><?php if( $show_top_bar ) { ?> show_top_bar<?php } else { ?> no_top_bar<?php } ?> scroll_<?php echo $header_bgcolorscroll; ?>" style="background-color:<?php echo $header_bgcolor; ?> !important;" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<div class="header_wrapper_bg">
		<?php tha_header_top(); ?>
		<?php if ($show_top_bar) { 
		$topline_color = get_option( 'options_hc_tbslc' );
		?>
		<style>.site:not(.header-side) #header_top_bar.top_bar_split:after {border-bottom: 1px solid <?php echo $topline_color; ?>;}</style>
		<div id="header_top_bar" class="<?php echo $header_width; ?><?php if( $top_bar_split ) { ?> top_bar_split<?php } ?>">
			<div class="top_bar_bg"></div>
			<?php if ($top_bar_right) { get_template_part( 'partials/header/top-bar-right' ); } ?>
			<?php if ($top_bar_left) { get_template_part( 'partials/header/top-bar-left' ); } ?>
		</div>
		<?php } ?>
		<div id="header_bar">
			<div class="header_bar">
				<div id="branding" class="<?php echo $header_width; ?>">
					<div class="branding_wrap<?php if ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_hcbr' ) {?> mc_brand<?php } ?>" style="width:<?php echo $logo_width; ?>px;">
						<div class="branding_inner" style="width:<?php echo $logo_width; ?>px;"><?php get_template_part( 'partials/header/branding-customizer' ); ?></div>
						
						<?php if ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_hcbr' ) : 
						$mcart_sd = get_option( 'options_mcart_sd' );
						$mcart_sz = get_option( 'options_mcart_sz' );
						$mcart_co = get_option( 'options_mcart_co' );
						$mcart_ise = get_option( 'options_mcart_ise' );
						$mcart_ima = get_option( 'options_mcart_ima' );
						?>
						<div class="nav_mibicart top_bar_minicart <?php echo $mcart_sd; ?>">
							<?php if ($mcart_ise) { ?>
							<div class="header-minicart-search">
								<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
								<i class="fal fa-search" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
								</a>
								<div id="header-minicart-search" class="header_search_block" style="display: none;max-width: 700px;">
									<div class="search-form-container searchform">
										<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<div class="search-table">	
												<div class="search-button">
											        <button type="submit" id="search-submit">
											        <span class="screen-reader-text"><?php _e('Search', 'tkmnineteen'); ?></span>
											        <?php _e('Search', 'tkmnineteen'); ?>
											        </button>
												</div>
												<div class="search-field">
													<label class="screen-reader-text" for="search-input"><?php _e('Search site', 'tkmnineteen'); ?></label>
											        <input type="search" placeholder="<?php _e('Search site', 'tkmnineteen'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if ($mcart_ima) { ?>
							<div class="header-minicart-my">
								<a class="" href="/my-account/">
								<i class="fal fa-user-alt" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
								</a>
							</div>
							<?php } ?>
							<div class="header-minicart">
								<div class="shopping_cart_content">
									<div id="mini-cart" class="mini-cart">
										<div class="cart-head">
											<i class="fal fa-shopping-bag" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
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
						</div>
						<?php endif; ?>						
						
						
					</div>
				</div>
				<div class="header_menu_container position-<?php echo $menu_position; ?> menu-<?php echo $menu_dividers; ?><?php if ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_nav' ) {?> mc_nav<?php } ?>" style="height:<?php echo $menu_height; ?>px;background-color:<?php echo $menu_bgcolor; ?>;">
					<div class="header_menu_container_inner <?php echo $header_width; ?>">
						<?php get_template_part( 'partials/header/nav' ); ?>
						
						<?php if ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_nav' ) : 
						$mcart_sd = get_option( 'options_mcart_sd' );
						$mcart_sz = get_option( 'options_mcart_sz' );
						$mcart_co = get_option( 'options_mcart_co' );
						$mcart_ise = get_option( 'options_mcart_ise' );
						$mcart_ima = get_option( 'options_mcart_ima' );
						?>
						<div class="nav_mibicart top_bar_minicart <?php echo $mcart_sd; ?>">
							<?php if ($mcart_ise) { ?>
							<div class="header-minicart-search">
								<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
								<i class="fal fa-search" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
								</a>
								<div id="header-minicart-search" class="header_search_block" style="display: none;max-width: 700px;">
									<div class="search-form-container searchform">
										<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<div class="search-table">	
												<div class="search-button">
											        <button type="submit" id="search-submit">
											        <span class="screen-reader-text"><?php _e('Search', 'tkmnineteen'); ?></span>
											        <?php _e('Search', 'tkmnineteen'); ?>
											        </button>
												</div>
												<div class="search-field">
													<label class="screen-reader-text" for="search-input"><?php _e('Search site', 'tkmnineteen'); ?></label>
											        <input type="search" placeholder="<?php _e('Search site', 'tkmnineteen'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if ($mcart_ima) { ?>
							<div class="header-minicart-my">
								<a class="" href="/my-account/">
								<i class="fal fa-user-alt" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
								</a>
							</div>
							<?php } ?>
							<div class="header-minicart">
								<div class="shopping_cart_content">
									<div id="mini-cart" class="mini-cart">
										<div class="cart-head">
											<i class="fal fa-shopping-bag" style="color:<?php echo $mcart_co; ?>;font-size:<?php echo $mcart_sz; ?>px;"></i>
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
						</div>
						<?php endif; ?>						
					</div>
				</div>				
			</div>
		</div>

		<?php tha_header_bottom(); ?>
		
	</div>
</header>
