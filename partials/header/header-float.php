<?php
/**
 * Classic header.
 *
 * @since   3.0.0
 * @package tkmnineteen
 * @author Tal Katz TKMedia.co.il
 */
//ACF Theme option field
$logo_position = get_option( 'options_hf_lp' );
$header_height = get_option( 'options_hc_ht' );
$header_trans = get_option( 'options_hc_trans' );
$header_bgcolor = get_option( 'options_hc_bgc' );
$show_top_bar = get_option( 'options_hc_stb' );
$logo_width = get_option( 'options_hc_lw' );
$header_width = get_option( 'options_hc_wid' );

if ($show_top_bar) {
	$top_bar_bg = get_option( 'options_hc_tbbg' );
	$top_bar_bgcolor = get_option( 'options_hc_tbbgc' );
	$top_bar_split = get_option( 'options_hc_tbsl' );
	$top_bar_right = get_option( 'options_hc_tbri' );
	$top_bar_left = get_option( 'options_hc_tble' );
}

$menu_height = get_option( 'options_hc_mnh' );
$menu_bgcolor = get_option( 'options_hc_mnbg' );

//if ($header_layout == 'header-classic') {
//	get_template_part( 'partials/header/header-classic' );
//}

$header_layout = get_option( 'options_op_hely' );
?>
<script>
jQuery(function($) {
	var $FHheader = $('header').outerHeight(true),
		$FHmenu = $('.menu-sidebar');
		$FHmenu.css('top', $FHheader);
});
</script>									

<header id="header-container" class="full_hamburger clearfix <?php if (is_front_page()) { ?> front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?> archive_header_container<?php } elseif ( is_singular() ) { ?> deafault_header_container<?php } else { ?> deafault_header_container<?php } ?> <?php echo $logo_position; ?><?php if( $header_trans ) { ?> header_trans<?php } ?><?php if( $show_top_bar ) { ?> show_top_bar<?php } else { ?> no_top_bar<?php } ?>" style="background-color:<?php echo $header_bgcolor; ?>;" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<div class="header_wrapper_bg">
		<?php tha_header_top(); ?>
		<?php if ($show_top_bar) { ?>
		<div id="header_top_bar" class="<?php echo $header_width; ?><?php if( $top_bar_split ) { ?> top_bar_split<?php } ?>">
			<div class="top_bar_bg"></div>
			<?php if ($top_bar_right) { get_template_part( 'partials/header/top-bar-right' ); } ?>
			<?php if ($top_bar_left) { get_template_part( 'partials/header/top-bar-left' ); } ?>
		</div>
		<?php } ?>
		<div id="header_bar">
			<div class="header_bar">
				<div id="branding" class="<?php echo $header_width; ?>">
					<div class="branding_wrap" style="width:<?php echo $logo_width; ?>px;">
						<?php get_template_part( 'partials/header/branding-customizer' ); ?>
					</div>
				</div>
				<?php //get_template_part( 'partials/header/hamburger' ); ?>
				<div class="header_hamburger_btn">
					<span class="toggle-button">
			        	<div class="menu-bar menu-bar-top"></div>
			        	<div class="menu-bar menu-bar-middle"></div>
			        	<div class="menu-bar menu-bar-bottom"></div>
			        </span>
				</div>
			</div>
		</div>
		<?php tha_header_bottom(); ?>
	</div>
	<div class="hamburger_menu_container menu-wrap <?php echo $header_width; ?>" style="background-color:<?php echo $menu_bgcolor; ?>;">
		<div class="hamburger_menu_container_inner">
			<div class="hamburger_menu site-header clearfix menu-sidebar">
				<div id="hamburger-menu-wrapper" class="hamburger-menu-wrapper">
					<nav id="header-menu" class="nav nav-primary menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmnineteen' ); ?>">
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
	
</header>


