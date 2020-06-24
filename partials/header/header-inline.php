<?php
/**
 * Inline header.
 *
 * @since   3.0.0
 * @package tkmnineteen
 * @author Tal Katz TKMedia.co.il
 */
//ACF Theme option field
$menu_position = get_option( 'options_hi_mp' );
$logo_position = get_option( 'options_hi_lp' );
$header_width = get_option( 'options_hi_wid' );
$header_wrap = get_option( 'options_hi_hwr' );

$header_height = get_option( 'options_hc_ht' );
$header_trans = get_option( 'options_hc_trans' );
$header_bgcolor = get_option( 'options_hc_bgc' );
$header_bgcolorsticky = get_option( 'options_hc_bgc' );
$header_bgcolorscroll = get_option( 'options_hc_bgcs' );
$logo_width = get_option( 'options_hc_lw' );

$header_layout = get_option( 'options_op_hely' );

$show_top_bar = get_option( 'options_hc_stb' );	
if ($show_top_bar) {
	$top_bar_bg = get_option( 'options_hc_tbbg' );
	$top_bar_bgcolor = get_option( 'options_hc_tbbgc' );
	$top_bar_split = get_option( 'options_hc_tbsl' );
	$top_bar_right = get_option( 'options_hc_tbri' );
	$top_bar_left = get_option( 'options_hc_tble' );
	$top_bar_linec = get_option( 'options_hc_tbslc' );
}
$menu_fontsize = get_option( 'options_hi_mnfs' );
$menu_fontcolor = get_option( 'options_hi_mnfc' );
$menu_dividers = get_option( 'options_hi_mndi' );

$Hex_foc = $menu_fontcolor;
$RGB_foc = hex2rgb($Hex_foc);
$Final_foc = implode(", ", $RGB_foc);
$Hex_hbgs = $header_bgcolorsticky;
$RGB_hbgs = hex2rgb($Hex_hbgs);
$Final_hbgs = implode(", ", $RGB_hbgs);

if ( class_exists( 'Woocommerce' ) ) {
	$mcart_po = get_option( 'options_mcart_po' );
}
?>
<style>
.header-inline .header_wrap {max-width:<?php echo $header_wrap; ?>px;}
<?php if ($show_top_bar ) { ?>
.site:not(.header-side) #header_top_bar.top_bar_split:after {border-bottom: 1px solid <?php echo $top_bar_linec; ?>;}
@media (min-width: 768px) {
	.site:not(.header-side) .top_bar_bg {<?php if ($top_bar_bg ) { ?>background-image:<?php echo $top_bar_bg; ?>;<?php } elseif ($top_bar_bgcolor ) { ?>background-color:<?php echo $top_bar_bgcolor; ?>;<?php } ?>}	
}
<?php } ?>
@media (min-width: 992px) {
	.language_block.desktop_lang_switcher li.menu-item {color: <?php echo $menu_fontcolor; ?>}
	.normal_menu .menu > ul > li > ul.normal-sub > li a {}
	.header-inline .menu > ul > li > .child-wrap > a,
	.header-inline .dividers-full .menu > ul > li > .child-wrap {color: <?php echo $menu_fontcolor; ?>;border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.header-inline .header_menu_container #header-menu.dividers-full > ul > li > .child-wrap {border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.normal_menu ul#main-menu > li.current-menu-item a, 
	.normal_menu .nav-primary.menu > ul > li:hover > a, 
	.normal_menu ul#main-menu > li.current-menu-item .child-wrap a, 
	.normal_menu .nav-primary.menu > ul > li:hover > .child-wrap > a {color: rgba(<?php echo $Final_foc; ?>,0.7);}
	header .menu > ul > li > a, 
	header .menu > ul > li > .child-wrap > a, 
	.header-inline .menu > ul > li > .child-wrap > a,
	.header-inline .normal_menu ul#main-menu > li.current-menu-item a span {color:<?php echo $menu_fontcolor; ?>;font-size:<?php echo $menu_fontsize; ?>px;}
	.header-inline .normal_menu .menu-dropdown-icon > a span:after, 
	.header-inline .normal_menu .menu-dropdown-icon > .child-wrap a span:after {color:<?php echo $menu_fontcolor; ?>;}
	.header_menu_container .menu li a, 
	.header_menu_container .menu > ul > li > ul.normal-sub > li a, 
	.header_menu_container .menu > ul > li > ul > li a {font-size:<?php echo $menu_fontsize; ?>px;}
	.site:not(.header-side).sticky-scroll #header-container.scroll_white.fixed-header, 
	body:not(.woocommerce-page) .site:not(.masthead_no_image_top):not(.masthead_clean_top) #header-container.header_trans.scroll_white.fixed-header {background-color:rgba(255,255,255,0.8) !important;}
	.site:not(.header-side).sticky-scroll #header-container.scroll_black.fixed-header, 
	body:not(.woocommerce-page) .site:not(.masthead_no_image_top):not(.masthead_clean_top) #header-container.header_trans.scroll_black.fixed-header {background-color:rgba(0,0,0,0.8) !important;}
	
}
@media (max-width: 991px) {
	.site:not(.header-side).sticky-scroll #header-container.scroll_white.fixed-header {background-color:rgba(255,255,255,0.8);}	
	#header-container.scroll_white .hamburger-menu .bar {background-color: #000;}
}
@media (max-width: 767px) {
	.branding_wrap {max-width:<?php echo $logo_width; ?>px;width: auto !important;}
	.sticky-fixed-mobile #header-container.scroll_black {background-color: #222 !important;}
	.sticky-fixed-mobile #header-container.scroll_white {background-color: #fff !important;}
}
</style>

<header id="header-container" class="clearfix normal_menu<?php if (is_front_page()) { ?> front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?> archive_header_container<?php } elseif ( is_singular() ) { ?> deafault_header_container<?php } else { ?> deafault_header_container<?php } ?> <?php echo $menu_position.' '.$logo_position; ?><?php if( $header_trans ) { ?> header_trans<?php } ?><?php if( $show_top_bar ) { ?> show_top_bar<?php } else { ?> no_top_bar<?php } if ( class_exists( 'Woocommerce' ) ) { ?> minicart-<?php echo $mcart_po; } ?> scroll_<?php echo $header_bgcolorscroll; ?>" style="background-color:<?php echo $header_bgcolor; ?>;<?php if (!$show_top_bar) { ?>height:<?php echo $header_height; ?>px;<?php } ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<div class="header_wrapper_bg">
		
		<?php get_template_part( 'partials/header/hamburger' ); ?>
		
		<?php tha_header_top(); ?>
		<?php if ($show_top_bar) { ?>
		<div class="top_bar_bg"></div>
		<div id="header_top_bar" class="<?php echo $header_width; ?><?php if( $top_bar_split ) { ?> top_bar_split<?php } ?>">
			
			<?php if ($top_bar_right) { get_template_part( 'partials/header/top-bar-right' ); } ?>
			<?php if ($top_bar_left) { get_template_part( 'partials/header/top-bar-left' ); } ?>
		</div>
		<?php } ?>
		<div id="header_bar" class="<?php echo $header_width; ?>">
			<div class="header_bar">
				<div id="branding" class="<?php echo $header_width; ?>">
					<div class="branding_wrap" style="width:<?php echo $logo_width; ?>px;">
						<?php get_template_part( 'partials/header/branding-customizer' ); ?>
					</div>
				</div>
				<div class="header_menu_container position-<?php echo $menu_position; ?> menu-<?php echo $menu_dividers; ?>" style="">
					<div class="header_menu_container_inner">
						<div class="header_menu site-header clearfix dt-mobile-header">
							<div id="header-menu-wrapper" class="page-header-menu menu_close1" style="display: none;">
								<div id="header-menu-wrapper-inner" class="menu-container container clearfix">
									<nav id="header-menu"  class="nav nav-primary menu <?php echo $menu_dividers; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmnineteen' ); ?>">
									<input id="main-menu-state" type="checkbox" />
									<?php				
									wp_nav_menu( array (
											'theme_location'    => 'primary',
											'depth'             => 3,
											'container'         => '',
											'container_id'      => '',
											'container_class'   => '',
											'menu_id'      => 'main-menu',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'menu_class'        => 'header-main-menu main-navigation',
											//'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
											'walker'         => new dynamicWalkerNavMenu(),
										)
									);
									?>						
								</div>
							</div>
						</div>
					</div>

					<?php if ( class_exists( 'Sitepress', false ) ) { ?>
					<div class="language_block desktop_lang_switcher">
					    <?php //do_action('wpml_add_language_selector'); ?>
					    <?php echo tkmnineteen_lang_switcher2(); ?>
					    <?php //echo languages_list_footer(); ?>
					</div>
					<div class="language_block mobile_lang_switcher">
					    <?php
					    do_action('wpml_add_language_selector');
					    ?>
					</div>
					<?php } ?>
					
					<?php if ( class_exists( 'Woocommerce' ) ) : ?>
						
						<div class="header-minicart-mobile">
							<div class="shopping_cart_content">
								<div id="mini-cart" class="mini-cart">
									<div class="cart-head">
										<i class="fal fa-shopping-bag"></i>
										<span id="mcart-stotal" class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
										<span class="cart-items-text"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
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
						
						<?php if ($mcart_po == 'mc_nav') { 
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
						<?php } ?>
					<?php endif; ?>
					
				</div>				
			</div>
		</div>

		<?php tha_header_bottom(); ?>
		
	</div>
</header>
