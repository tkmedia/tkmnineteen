<?php
/**
 * Site Header
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

//ACF Theme option field
$site_layout = get_option( 'options_op_sly' );
$header_layout = get_option( 'options_op_hely' );



$site_bg_color = get_option( 'options_site_bgc' );
$site_inner_bg_color = get_option( 'options_site_ibgc' );
$site_phone = get_field('site_ph','option');
$site_phone_title = get_field('site_pht','option');
$site_whatsapp_num = get_field('site_wa','option');
$site_whatsapp_text = get_field('site_wat','option');
$site_main_email = get_field('site_me','option');
$site_main_email_text = get_field('site_met','option');
$site_main_cellphone = get_field('site_mce','option');
$site_main_cellphone_text = get_field('site_mcet','option');
$site_messanger = get_field('site_mes','option');
$site_messanger_text = get_field('site_mest','option');
$site_facebook = get_field('site_fb','option');
$site_facebook_text = get_field('site_fbt','option');

$site_twitter_share = get_field('site_stw','option');
$site_facebook_share = get_field('site_sfb','option');
$site_whatsapp_share = get_field('site_swa','option');
$site_email_share = get_field('site_sem','option');

$header_logo_width = get_option( 'options_hlogo_w' );
$header_style = get_option( 'options_hsty' );
$header_bg_color = get_option( 'options_hbgc' );
$logo_side_position = get_option( 'options_hlogo_po' );
$logo_side = get_option( 'options_hlogo_si' );

$menu_item_layout = get_option( 'options_menu_itly' );
$default_main_masthead_bg = get_field('mmh_bg','option');
$default_split_bg = get_field('mmh_spbg','option');
$desktop_sticky_fixed = get_option( 'options_dtsk_fx' );
$mobile_sticky_fixed = get_option( 'options_mosk_fx' );
$home_masthead_content_title = get_option( 'options_mh_tisi' );

$top_panel_position = get_option( 'options_toppl_po' );
$header_top_panel_show = get_option( 'options_toppl_sh' );
$header_top_panel_bg_color = get_option( 'options_toppl_bgc' );
$header_top_panel_font_color = get_option( 'options_toppl_foc' );
$header_top_panel_phone_show = get_option( 'options_toppl_shph' );
$header_top_panel_nav_show = get_option( 'options_toppl_shna' );
$header_top_panel_phone = get_field('toppl_ph','option');
$header_top_panel_phonetxt = get_field('toppl_phtxt','option');
$header_top_panel_right = get_field('toppl_rtxt','option');
$default_main_masthead_bg = get_field('mmh_bg','option');
$default_main_masthead_bg = get_field('mmh_bg','option');
$default_main_masthead_bg = get_field('mmh_bg','option');

$site_head_code = get_field('site_hco','option');
$site_footer_code = get_field('site_fco','option');
?>
 
<!DOCTYPE html>
<!--[if lt IE 9]>
<html id="unsupported" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]>
<html <?php language_attributes(); ?>>
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<?php 
	tha_head_top();
	wp_head();
	tha_head_bottom();
	?>
	
	<?php 
	if ( $site_head_code ) {
		echo $site_head_code;
	}	
	?>
	
</head>

<body <?php body_class( 'loading' ); ?> <?php tkmnineteen_schema_body(); ?> id="body-<?php the_ID(); ?>">
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
?>

<?php 
if ($header_layout == 'he_classic') {
	get_template_part( 'partials/header/he_classic' );
<?php } ?>


	<div id="page" class="site full_width <?php echo $site_layout; ?> <?php echo $header_style; ?> <?php echo $header_bg_color; ?> <?php if( $desktop_sticky_fixed ) { ?>desktop_sticky_fixed<?php } ?> <?php if( $mobile_sticky_fixed ) { ?>mobile_sticky_fixed<?php } ?>">
		<a class="skip-link screen-reader-text" href="#main_content"><?php _e( 'Skip to content', 'tkmnineteen' ) ?></a>
		<?php tha_header_before(); ?>
		
		<?php if (! ($header_style == 'header_logo_center_no_nav' || $header_style == 'header_logo_r_no_nav') ) {
		?>
		<?php get_template_part( 'partials/header/hamburger' ); ?>
		<?php } ?>
		<header id="header-container" class="header-bar animated clearfix fixedHeader sticky_header <?php if (is_front_page()) { ?>front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?>archive_header_container<?php } elseif ( is_singular() ) { ?>deafault_header_container<?php } else { ?>deafault_header_container<?php } ?> <?php if ($header_style == 'split_row_box normal_menu' || $header_style == 'header_logo_r_no_nav' ) { echo $logo_side; }?> <?php if ($header_style == 'full_row_box normal_menu') { echo $logo_side_position; } ?><?php if( $header_top_panel_show ) { ?> header_topbar<?php } ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
			<div class="header_wrapper_bg<?php if( $header_top_panel_show ) { ?> <?php echo $top_panel_position; }?>">
				<?php tha_header_top(); ?>

					<div id="branding">
						<div class="branding_wrap" style="width:<?php echo $header_logo_width; ?>px;">
							<?php get_template_part( 'partials/header/branding-customizer' ); ?>
						</div>
					</div>

				<?php if( $header_top_panel_show ) { ?>
				<div class="header_topbar_container top_panel" style="padding-right:<?php echo $header_logo_width; ?>px;background:<?php echo $header_top_panel_bg_color; ?>;">
					<div class="header_topbar_container_inner">
						<?php //get_template_part( 'partials/header/top-bar' ); ?>
						
						<div class="header_topbar_row">
							<?php if( $header_top_panel_nav_show ) { ?>
							<div class="header_topbar_start"><div class="header_topbar_start_inner">
								<div class="header_topbar_chat">
									
									<style>#menu-panel>li {color:<?php echo $header_top_panel_font_color; ?>!important;}</style>
									<div id="panel-nav" class="panel-nav" role="navigation">
										<?php wp_nav_menu(
											array(
												'theme_location' => 'panel-nav',
												'container'      => false,
												'menu_id'      => 'menu-panel',
												'menu_class'     => 'menu-panel',
												'depth'          => '1',
												'fallback_cb'    => false,
												'link_before'    => '<span class="nav-name-item" itemprop="name">',
												'link_after'     => '</span>',
										) ); ?>
									</div>
									


								</div>
							</div></div>
							<?php } ?>
							
							<?php if( have_rows('htp_mid','option')): ?>
							<div class="header_topbar_center"><div class="header_topbar_center_inner">
								<div class="header_topbar_logos">
									<?php while ( have_rows('htp_mid','option') ) : the_row();
									$htp_mid_img = get_sub_field('htp_mid_img', false);
									$htp_mid_txt = get_sub_field('htp_mid_txt');
									$htp_mid_lnk = get_sub_field('htp_mid_lnk');
									?>
									<div class="header_topbar_logo">
									<?php if( $htp_mid_lnk ): ?>
									<a href="<?php echo $htp_mid_lnk; ?>">
									<?php endif; ?>
									<div class="header_topbar_logo_img"><?php echo wp_get_attachment_image( $htp_mid_img, 'full' ); ?></div>
									<?php if( $htp_mid_lnk ): ?></a><?php endif; ?>
									</div>
									<?php endwhile; ?>
								</div>
							</div></div>
							<?php endif; ?>
							<div class="header_topbar_end"><div class="header_topbar_end_inner">
								
								<?php if( have_rows('header_top_nav_left','option') || $site_phone || $header_top_panel_nav_show ): ?>
								<div id="header-info">
									<ul class="social-bar">
								
										<?php while ( have_rows('header_top_nav_left','option') ) : the_row();
											$social_links_icon = get_sub_field('header_top_nav_left_icon');
											$social_links_text = get_sub_field('header_top_nav_left_text');
											$social_links_link = get_sub_field('header_top_nav_left_link');
										?>
											<li class="social-item social_link" style="color:<?php echo $header_top_panel_font_color; ?>;">
												<a href="<?php echo $social_links_link; ?>" target="_blank" class="social_media">
													<?php echo $social_links_icon; ?>
												</a>
											</li>
									    <?php endwhile; ?>
									    <?php if( $header_top_panel_phone_show && $site_phone ) { ?>
									    <li class="social-item site_phone" id="top_panel_phone">
										    <a href="tel:<?php echo $site_phone; ?>" style="color:<?php echo $header_top_panel_font_color; ?>;">
											    <span class="site_phone_pre"><?php echo $header_top_panel_phone; ?></span>
											    <i class="fas fa-phone-alt" style="color:<?php echo $header_top_panel_font_color; ?>;"></i>
										    </a>
									    </li>
									    <?php } ?>
									</ul>
									
									<?php if( $header_top_panel_right ) { ?>
									<div id="panel_text" class="panel_text"><?php echo $header_top_panel_right; ?></div>
									<?php } ?>	
									
								
								</div>
								<?php endif; ?>	
								<?php if ( class_exists( 'Sitepress', false ) ) { ?>
								<div class="language_block desktop_lang_switcher">
									<ul>
								    <?php 
								    //echo tkmnineteen_lang_switcher();
								    echo tkmnineteen_lang_switcher2();
								    //language_selector_flags();
								    ?>
									</ul>
								</div>
								<div class="language_block mobile_lang_switcher">
								    <?php
								    do_action('wpml_add_language_selector');
								    ?>
								</div>
								<?php } ?>
									
							</div></div>
						</div>						
						
						
					</div>
				</div>				
				<?php } ?>

				<div class="header_wrapper" style="padding-right:<?php echo $header_logo_width; ?>px;">
					
					<?php if( $header_style == 'full_row_box normal_menu' || $header_style == 'split_row_box normal_menu' || $header_style == 'header_logo_center_nav normal_menu') { ?>
					<div class="header_menu_container <?php echo $menu_item_layout; ?>">
						<div class="header_menu_container_inner">
							<?php get_template_part( 'partials/header/nav' ); ?>
						</div>
					</div>				
					<?php } elseif( $header_style == 'full_site_hamburger') { ?>		
					<div class="header_menu_container">
						<div class="header_menu_container_inner">
							<?php get_template_part( 'partials/header/nav-side' ); ?>
						</div>
					</div>				
					<?php } ?>						
				</div>
				
				<div class="header_mobile header_mobile_bottom">
					<?php if( $site_phone ) { ?>
					<div class="header_mobile_call">
					    <a href="tel:<?php echo $site_phone; ?>" style="color:<?php echo $header_top_panel_font_color; ?>;">
						    <span class="site_phone_text"><?php echo $header_top_panel_phonetxt; ?></span>
						    <span class="site_phone_pre"><?php echo $header_top_panel_phone; ?></span>
						    <i class="fas fa-phone-alt" style="color:<?php echo $header_top_panel_font_color; ?>;"></i>
					    </a>
					</div>
					<?php } ?>
				</div>
				<?php tha_header_bottom(); ?>
			</div>
		</header>
		<?php tha_header_after(); ?>
		<main id="main_content" role="main">
			<div class="site_overlay"></div>			
			