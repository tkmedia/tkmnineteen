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

<div class="header_topbar_row">
	
	<div class="header_topbar_start"><div class="header_topbar_start_inner">
		<div class="header_topbar_chat">
			<div class="header_topbar_chat_icon"><i class="fas fa-user-headset"></i></div>
			<div class="header_topbar_chat_text"><?php _e('Start a conversation', 'tkmnineteen'); ?></div>
		</div>
	</div></div>
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
		
		<?php if( have_rows('header_top_nav_left','option') || $header_phone || $show_nav ): ?>
		<div id="header-info">
			<ul class="social-bar">
		
				<?php while ( have_rows('header_top_nav_left','option') ) : the_row();
					$social_links_icon = get_sub_field('header_top_nav_left_icon');
					$social_links_text = get_sub_field('header_top_nav_left_text');
					$social_links_link = get_sub_field('header_top_nav_left_link');
				?>
					<li class="social-item social_link" style="color:<?php echo $panel_font_color; ?>;">
						<a href="<?php echo $social_links_link; ?>" target="_blank" class="social_media">
							<?php echo $social_links_icon; ?>
						</a>
					</li>
			    <?php endwhile; ?>
			    <?php if( $show_phone && $header_phone ) { ?>
			    <li class="social-item site_phone" id="top_panel_phone">
				    <a href="tel:<?php echo $header_phone; ?>" style="color:<?php echo $panel_font_color; ?>;">
					    <span class="site_phone_pre"><?php echo $header_top_panel_phone; ?></span>
					    <i class="fas fa-phone-alt" style="color:<?php echo $panel_font_color; ?>;"></i>
				    </a>
			    </li>
			    <?php } ?>
			</ul>
			
			<?php if( $panel_text ) { ?>
			<div id="panel_text" class="panel_text"><?php echo $panel_text; ?></div>
			<?php } ?>	
			
			<?php if( $show_nav ) { ?>
			<style>#menu-panel>li {color:<?php echo $panel_font_color; ?>!important;}</style>
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