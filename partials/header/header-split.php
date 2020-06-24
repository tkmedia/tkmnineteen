<?php
/**
 * Inline header.
 *
 * @since   3.0.0
 * @package tkmnineteen
 * @author Tal Katz TKMedia.co.il
 */
//ACF Theme option field
$menu_position = get_option( 'options_hs_mp' );
$menu_vertical = get_option( 'options_hs_mvp' );
$header_width = get_option( 'options_hs_wid' );

$header_height = get_option( 'options_hc_ht' );
$header_trans = get_option( 'options_hc_trans' );
$header_bgcolor = get_option( 'options_hc_bgc' );
$header_bgcolorsticky = get_option( 'options_hc_bgcs' );
$logo_width = get_option( 'options_hc_lw' );

$header_layout = get_option( 'options_op_hely' );

$show_top_bar = get_option( 'options_hc_stb' );	
if ($show_top_bar) {
	$top_bar_bg = get_option( 'options_hc_tbbg' );
	$top_bar_bgcolor = get_option( 'options_hc_tbbgc' );
	$top_bar_split = get_option( 'options_hc_tbsl' );
	$top_bar_right = get_option( 'options_hc_tbri' );
	$top_bar_left = get_option( 'options_hc_tble' );
}
$menu_fontsize = get_option( 'options_hs_mnfs' );
$menu_fontcolor = get_option( 'options_hs_mnfc' );
$menu_dividers = get_option( 'options_hs_mndi' );

$Hex_foc = $menu_fontcolor;
$RGB_foc = hex2rgb($Hex_foc);
$Final_foc = implode(", ", $RGB_foc);
$Hex_hbgs = $header_bgcolorsticky;
$RGB_hbgs = hex2rgb($Hex_hbgs);
$Final_hbgs = implode(", ", $RGB_hbgs);

?>
<style>
@media (min-width: 992px) {
	.normal_menu .menu > ul > li > ul.normal-sub > li a, 
	.header-split .menu > ul > li > .child-wrap > a,
	.header-split .dividers-full .menu > ul > li > .child-wrap {color: <?php echo $menu_fontcolor; ?>;border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.header-split .header_menu_container #header-menu.dividers-full > ul > li > .child-wrap {border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.normal_menu ul#main-menu li.current-menu-item a, 
	.normal_menu .nav-primary.menu > ul > li:hover > a, 
	.normal_menu ul#main-menu li.current-menu-item .child-wrap a, 
	.normal_menu .nav-primary.menu > ul > li:hover > .child-wrap > a {color: rgba(<?php echo $Final_foc; ?>,0.7);}
	header .menu > ul > li > a, 
	header .menu > ul > li > .child-wrap > a, 
	.header-split .menu > ul > li > .child-wrap > a {color:<?php echo $menu_fontcolor; ?>;font-size:<?php echo $menu_fontsize; ?>px;}
	.site:not(.header-side).sticky-scroll #header-container.fixed-header {background-color:rgba(<?php echo $Final_hbgs; ?>,0.8);}
	.normal_menu .menu-dropdown-icon > .child-wrap a span:after {color:<?php echo $menu_fontcolor; ?>;}
}
</style>

<header id="header-container" class="clearfix normal_menu<?php if (is_front_page()) { ?> front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?> archive_header_container<?php } elseif ( is_singular() ) { ?> deafault_header_container<?php } else { ?> deafault_header_container<?php } ?> <?php echo $menu_position; ?><?php if( $header_trans ) { ?> header_trans<?php } ?><?php if( $show_top_bar ) { ?> show_top_bar<?php } else { ?> no_top_bar<?php } ?>" style="background-color:<?php echo $header_bgcolor; ?>;" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<div class="header_wrapper_bg">
		
		<?php get_template_part( 'partials/header/hamburger' ); ?>
		
		<?php tha_header_top(); ?>
		<?php if ($show_top_bar) { ?>
		<div id="header_top_bar" class="<?php echo $header_width; ?><?php if( $top_bar_split ) { ?> top_bar_split<?php } ?>">
			<div class="top_bar_bg"></div>
			<?php if ($top_bar_right) { get_template_part( 'partials/header/top-bar-right' ); } ?>
			<?php if ($top_bar_left) { get_template_part( 'partials/header/top-bar-left' ); } ?>
		</div>
		<?php } ?>
		<div id="header_bar">
			<div class="header_bar <?php echo $header_width; ?> menu_ver_<?php echo $menu_vertical; ?>">
				
				<div id="branding" class="">
					<div class="branding_wrap" style="width:<?php echo $logo_width; ?>px;">
						<?php get_template_part( 'partials/header/branding-customizer' ); ?>
					</div>
				</div>
				
				<div id="header-menu-wrapper-right" class="menu_container_desktop page-header-menu">
					<div class="menu-container container clearfix">
						<nav class="nav nav-primary menu <?php echo $menu_dividers; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmnineteen' ); ?>">
						<?php
						wp_nav_menu( array (
								'theme_location'    => 'primary-split-right',
								'depth'             => 3,
								'container'         => '',
								'container_id'      => '',
								'container_class'   => '',
								'menu_id'      => 'main-menu1',
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
				
				<div id="header-menu-wrapper-left" class="menu_container_desktop page-header-menu">
					<div class="menu-container container clearfix">
						<nav class="nav nav-primary menu <?php echo $menu_dividers; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmnineteen' ); ?>">
						<?php
						wp_nav_menu( array (
								'theme_location'    => 'primary-split-left',
								'depth'             => 3,
								'container'         => '',
								'container_id'      => '',
								'container_class'   => '',
								'menu_id'      => 'main-menu2',
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
				
				
				<div class="header_menu_container menu_container_mobile position-<?php echo $menu_position; ?> menu-<?php echo $menu_dividers; ?>" style="">
					<div class="header_menu_container_inner">
						<div class="header_menu site-header clearfix dt-mobile-header">
							<div id="header-menu-wrapper" class="page-header-menu menu_close1" style="display: none;">
								<div id="header-menu-wrapper-inner" class="menu-container container clearfix">
									<nav id="header-menu"  class="nav nav-primary menu <?php echo $menu_dividers; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmnineteen' ); ?>">
									<input id="main-menu-state" type="checkbox" />
									
									<?php
									wp_nav_menu( array (
											'theme_location'    => 'primary-split-right',
											'depth'             => 3,
											'container'         => '',
											'container_id'      => '',
											'container_class'   => '',
											'menu_id'      => 'main-menu1',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'menu_class'        => 'header-main-menu main-navigation',
											//'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
											'walker'         => new dynamicWalkerNavMenu(),
										)
									);
									wp_nav_menu( array (
											'theme_location'    => 'primary-split-left',
											'depth'             => 3,
											'container'         => '',
											'container_id'      => '',
											'container_class'   => '',
											'menu_id'      => 'main-menu2',
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
				</div>				
			</div>
		</div>

		<?php tha_header_bottom(); ?>
		
	</div>
</header>
