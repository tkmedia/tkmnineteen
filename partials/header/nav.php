<?php
$header_layout = get_option( 'options_op_hely' );
if ($header_layout == 'header-classic') {
	$menu_fontsize = get_option( 'options_hc_mnfs' );
	$menu_fontcolor = get_option( 'options_hc_mnfc' );
	$menu_bgcolor = get_option( 'options_hc_mnbg' );
	$menu_dividers = get_option( 'options_hc_mndi' );

$Hex_foc = $menu_fontcolor;
$RGB_foc = hex2rgb($Hex_foc);
$Final_foc = implode(", ", $RGB_foc);

$Hex_bgc = $menu_bgcolor;
$RGB_bgc = hex2rgb($Hex_bgc);
$Final_bgc = implode(", ", $RGB_bgc);

?>
<style>
@media (min-width: 992px) {
	.normal_menu .menu > ul > li > ul.normal-sub > li a, 
	.header-classic .menu > ul > li > .child-wrap > a,
	.header-classic .dividers-full .menu > ul > li > .child-wrap {color: <?php echo $menu_fontcolor; ?>;border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.header-classic .header_menu_container #header-menu.dividers-full > ul > li > .child-wrap {border-left-color: rgba(<?php echo $Final_foc; ?>,0.7) !important;}
	.normal_menu .menu > ul > li > ul.normal-sub {background-color:rgba(<?php echo $Final_bgc; ?>,0.7);}
	.normal_menu ul#main-menu li.current-menu-item a, 
	.normal_menu .nav-primary.menu > ul > li:hover > a, 
	.normal_menu ul#main-menu li.current-menu-item .child-wrap a, 
	.normal_menu .nav-primary.menu > ul > li:hover > .child-wrap > a {color: rgba(<?php echo $Final_foc; ?>,0.7);}
	header .menu > ul > li > a, 
	header .menu > ul > li > .child-wrap > a, 
	.header-classic .menu > ul > li > .child-wrap > a {color:<?php echo $menu_fontcolor; ?>;font-size:<?php echo $menu_fontsize; ?>px;}

}
</style>
<?php } ?>
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
