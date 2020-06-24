<?php 
$d_maneu_bg = get_field('d_menu_bg','option');
if ( is_page() || is_single() ) { 
	$menu_bg = get_field('nav_bg');	
}
if ( is_product_category() ) {
	$queried_object = get_queried_object();
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	$menu_bg = get_field( 'nav_bg', 'product_cat_' .$term_id);
}
if ( is_shop() ) { 
	$menu_bg = get_field('d_menu_bg','option');	
}
$menu_bg_url = wp_get_attachment_image_src($menu_bg, 'full');
$d_menu_bg_url = wp_get_attachment_image_src($d_maneu_bg, 'full');
?>

<div class="header_menu site-header clearfix dt-mobile-header">
	<div id="header-menu-wrapper" class="page-header-menu menu_close1" style="display: none;">
		<div id="header-menu-wrapper-inner" class="menu-container container clearfix">
			
			<nav id="header-menu"  class="nav nav-primary menu collapse navbar-collapse collapsed row-flex" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Primary menu', 'tkmnineteen' ); ?>" style="background-image:url(<?php if ( $menu_bg_url ) { echo $menu_bg_url[0]; } else { echo $d_menu_bg_url[0]; } ?>);">
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
			</nav>
								
		</div>
	</div>
</div>
