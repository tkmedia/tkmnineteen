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
$site_wrap = get_option( 'options_op_wrap' );
$site_layout = get_option( 'options_op_sly' );
$site_theme = get_option( 'options_op_th' );
$header_layout = get_option( 'options_op_hely' );
$header_float = get_option( 'options_op_hflo' );
$header_sticky = get_option( 'options_op_hstk' );
$header_sticky_mobile = get_option( 'options_op_hstkm' );
$site_bgc = get_option( 'options_site_bgc' );
$site_btnbgc = get_option( 'options_op_btnc' );
$site_btnfoc = get_option( 'options_op_btnf' );
$site_mainc = get_option( 'options_op_maco' );

if ($header_layout == 'header-classic' || $header_layout == 'header-inline' ) {
	$show_top_bar = get_option( 'options_hc_stb' );
	if ($show_top_bar) {
		add_filter( 'body_class', 'header_add_body_class' );
		function header_add_body_class( $classes ) {
			$classes[] = 'has_topbar';
			return $classes;
		}
	}
}

$desktop_sticky_fixed = get_option( 'options_dtsk_fx' );
$mobile_sticky_fixed = get_option( 'options_mosk_fx' );
$site_head_code = get_field('site_hco','option');
$site_footer_code = get_field('site_fco','option');
$header_bg_color = get_option( 'options_hbgc' );
$page_masthead = get_post_meta( get_the_ID(), 'hmhs_sty', true );

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
<style>
.wrap {max-width:<?php echo $site_wrap; ?>px !important;}
<?php if ( $site_btnbgc ) { ?>
.masthead_img_slider .popup_btn button.section_readmore_link, 
.masonary_grid_link.box-layout.grid_simple button.section_readmore_link, 
.page_grid_style_article-split button.section_readmore_link, .section_btn.grid_btn.section_readmore_link_wrap button.section_readmore_link, .page_grid_style_article-mix button.section_readmore_link, 
.mh_contact input.wpcf7-form-control.wpcf7-submit, button.section_readmore_link:hover, .page_grid_style_article button.section_readmore_link {background:<?php echo $site_btnbgc; ?>;background-color:<?php echo $site_btnbgc; ?>;}
.masonary_grid_link.grid_features button.section_readmore_link, .masonary_grid_link.grid_features_icon button.section_readmore_link, .sbs_btn button.section_readmore_link {background:<?php echo $site_btnbgc; ?>;background: linear-gradient(to right, #292734 50%,<?php echo $site_btnbgc; ?> 50%) no-repeat scroll right bottom / 210% 100% #292734 !important;}
<?php } ?>
<?php if ( $site_btnfoc ) { ?>
.masthead_img_slider .popup_btn button.section_readmore_link, 
.masonary_grid_link.box-layout.grid_simple button.section_readmore_link, 
.page_grid_style_article-split button.section_readmore_link, .section_btn.grid_btn.section_readmore_link_wrap button.section_readmore_link, .page_grid_style_article-mix button.section_readmore_link, 
.mh_contact input.wpcf7-form-control.wpcf7-submit, .masonary_grid_link.grid_features button.section_readmore_link, .masonary_grid_link.grid_features_icon button.section_readmore_link, .masonary_grid_link.grid_features button.section_readmore_link:hover, .masonary_grid_link.grid_features_icon button.section_readmore_link:hover {color:<?php echo $site_btnfoc; ?>;}
<?php } ?>
<?php if ( $site_mainc ) { ?>
.masthead_img_slider1 .main_slider_subtitle:before, 
.masthead_img_slider .main_slider_inner:before, 
.masonary_grid_link.box-layout.grid_stories button.section_readmore_link:before, .mh_contact_wrap.row-flex .mh_contact_col_right, .flex_form.split_form .mh_contact_wrap .mh_contact_col_right:before, 
.media_content_item.full_content.style_side-line .full_content_inner .full_content_title:before {background:<?php echo $site_mainc; ?>;background-color:<?php echo $site_mainc; ?>;}
.scroll_black.normal_menu .menu > ul > li > ul.normal-sub, .scroll_black.normal_menu ul.sub-menu.megamenu, 
.mh_contact input.wpcf7-form-control.wpcf7-submit, 
.scroll_white.normal_menu .menu > ul > li > ul.normal-sub, .scroll_white.normal_menu ul.sub-menu.megamenu {border-top: 2px solid <?php echo $site_mainc; ?>;}
.title_wrap_start.style_line:after, .title_wrap_center.style_line:after, .title_wrap_end.style_line:after {border-bottom: 3px solid <?php echo $site_mainc; ?>;}
.masonary_grid_link.grid_branches .flex_masonary_subtitle:before {color:<?php echo $site_mainc; ?>;}
.page_grid_style_article-hover .flex_masonary_title {border-top: 4px solid <?php echo $site_mainc; ?>;}
.classic .footer_title:after {background:<?php echo $site_mainc; ?>;}
.on_side .mh_contact_col_form_title_container {border-color:<?php echo $site_mainc; ?>;}
@media (max-width: 991px) {
.normal_menu .menu-dropdown-icon:before {background:<?php echo $site_mainc; ?>;}
}
<?php } ?>
</style>
<body <?php body_class( 'loading '.$header_layout.' '.$site_theme.' '.$header_sticky.' '.$site_layout.'' ); ?> <?php tkmnineteen_schema_body(); ?> id="body-<?php the_ID(); ?>"<?php if ($header_layout == 'header-classic') { ?> style="background:<?php echo $site_bgc; ?>;"<?php } ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
?>

	<div id="page" class="site masthead_<?php echo $page_masthead; ?> <?php echo $header_layout.' '.$site_layout.' '.$header_sticky.' '.$header_sticky_mobile.' '.$header_bg_color; if( $desktop_sticky_fixed ) { ?> desktop_sticky_fixed<?php } ?><?php if( $header_float ) { ?> header_float<?php } else { ?> non_header_float<?php } ?>">
		<a class="skip-link screen-reader-text" href="#main_content"><?php _e( 'Skip to content', 'tkmnineteen' ) ?></a>
		<?php tha_header_before(); ?>
		
		<?php 
		if ($header_layout == 'header-classic') {
			get_template_part( 'partials/header/header-classic' );
		} elseif ($header_layout == 'header-inline') {
			get_template_part( 'partials/header/header-inline' );
		} elseif ($header_layout == 'header-split') {
			get_template_part( 'partials/header/header-split' );
		} elseif ($header_layout == 'header-float') {
			get_template_part( 'partials/header/header-float' );
		}
		?>
		
		<?php tha_header_after(); ?>
