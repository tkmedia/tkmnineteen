<?php 
//$header_phone = get_option( 'options_header_phone' );
//$footer_content_text = wpautop(get_option( 'options_footer_content_text' ));
//$footer_content_text_left = wpautop(get_option( 'options_footer_content_text_left' ));
$footer_fixed_show = get_option( 'options_foo_fix' );
$footer_form_id = get_field( 'foo_ffid','option' );
$footer_bgcolor = get_option( 'options_foo_bgc' );
$footer_txtcolor = get_option( 'options_foo_txc' );

if( $footer_txtcolor ){
?>
<style>
	#footer_container {color: <?php echo $footer_txtcolor;?>;}
</style>
<?php } ?>

<?php if( $footer_fixed_show ){ 
$footer_search_show = get_option( 'options_foo_fse' );
$footer_link_show = get_option( 'options_foo_fpls' );
$footer_popup_show = get_option( 'options_foo_fpos' );
$footer_free_link_show = get_option( 'options_foo_flks' );
?>

<div id="footer_mobile_fix" class="footer_mobile_fix">
	<div class="footer_mobile_fix_row row-flex middle-xs center-xs">

		<?php if( $footer_search_show ){ ?>
		<div class="footer_form_fix_col col-xs">
			<div class="mobile_footer_links">
				<a data-fancybox data-src="#footer_search" href="javascript:;">
					<i class="fal fa-search"></i>
					<p><?php _e('Search', 'tkmnineteen'); ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
		<?php if( $footer_link_show ){ 
		$footer_fixed_link_btn = get_field('foo_flkb','option');
		$footer_fixed_link_page = get_field('foo_flkp','option');
		$footer_fixed_link_icon = get_field('foo_flki','option');
		?>
		<div class="footer_form_fix_col col-xs">
			<div class="mobile_footer_links">
				<a href="<?php echo $footer_fixed_link_page;?>">
					<?php echo $footer_fixed_link_icon;?>
					<p><?php echo $footer_fixed_link_btn;?></p>
				</a>
			</div>
		</div>
		<?php } ?>
		<?php if( $footer_free_link_show ){ 
		$footer_fixed_free_link_icon = get_field('foo_ffli','option');
		$footer_fixed_free_link_btn = get_field('foo_fflb','option');
		$footer_fixed_free_link_page = get_field('foo_fflp','option');
		?>
		<div class="footer_form_fix_col col-xs">
			<div class="mobile_footer_links">
				<a href="<?php echo $footer_fixed_free_link_page;?>">
					<?php echo $footer_fixed_free_link_icon;?>
					<p><?php echo $footer_fixed_free_link_btn;?></p>
				</a>
			</div>
		</div>
		<?php } ?>		
		<?php if( $footer_popup_show ){ 
		$footer_fixed_form_icon = get_field('foo_ffoi','option');
		$footer_fixed_form_btn = get_field('foo_ffob','option');
		?>
		<div class="footer_form_fix_col col-xs">
			<div class="mobile_footer_links">
				<a data-fancybox data-src="#contact_form_popup" href="javascript:;">
					<i class="fal fa-envelope"></i>
					<p><?php echo $footer_fixed_form_btn;?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<?php if( $footer_search_show ){ ?>
	<div id="footer_search" style="display: none;">
		<div id="popup-search">
			<div class="search_bar">
			<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if( $footer_popup_show && $footer_form_id ): 
		$footer_form_title = get_field( 'foo_ffti','option' );
		$footer_form_subtitle = get_field( 'foo_ffst','option' );
	?>
	<div id="contact_form_popup" style="display: none;">
		<div id="popup-contact-form">
			<div class="popup-contact-form clearfix">
				<?php if( $footer_form_title ) { ?>
				<div class="contact-title">
					<div class="popup_contact_title"><?php echo $footer_form_title; ?></div>
				</div>
				<?php } ?>
				<?php if( $footer_form_subtitle ) { ?>
				<div class="contact-title">
					<div class="popup_contact_subtext"><?php echo $footer_form_subtitle; ?></div>
				</div>
				<?php } ?>
				<div class="full_form_id">
					<div class="full_form_id_wrap">
						<?php echo do_shortcode( '[contact-form-7 id="'.$footer_form_id.'" ]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

</div>
<?php } ?>

<div id="footer_container" class="footer-main" style="background-color:<?php echo $footer_bgcolor; ?>;">
	<div id="footer">
		<div class="footer wrap">
			<div class="footer_flex_content row-flex around-xs">

			<?php 			
			// check if the flexible content field has rows of data
			if( have_rows('foo_flex','option') ): $fcount = 1;
			     // loop through the rows of data
			    while ( have_rows('foo_flex','option') ) : the_row(); ?>

					<?php if( get_row_layout() == 'f_fcon' ):
							
					$footer_full_contnet_block_width = get_sub_field('fcw');
					$footer_full_contnet_mobile = get_sub_field('fcwm');
					$footer_full_contnet_hide_mobile = get_sub_field('fcmh');
					$footer_full_contnet_title = get_sub_field('fcti');
					$footer_full_contnet_title_size = get_sub_field('fctis');
					$footer_full_contnet_title_color = get_sub_field('fctic');
					$footer_full_contnet_text = get_sub_field('fctx');
	
					if ( $footer_full_contnet_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_full_contnet footer_content_cols <?php echo $footer_full_contnet_mobile;?> <?php echo $footer_full_contnet_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_full_contnet_title ){ ?>
								<div class="footer_full_contnet_title_wrap footer_title">
									<div class="footer_full_contnet_title" style="font-size:<?php echo $footer_full_contnet_title_size; ?>px;color:<?php echo $footer_full_contnet_title_color; ?>;"><?php echo $footer_full_contnet_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_full_contnet_text ){ ?>
								<div class="footer_full_contnet_text_wrap">
									<div class="footer_full_contnet_text"><?php echo $footer_full_contnet_text; ?></div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			

					<?php if( get_row_layout() == 'f_map' ):
							
					$footer_map_block_width = get_sub_field('mpw');
					$footer_map_mobile = get_sub_field('mpwm');
					$footer_map_hide_mobile = get_sub_field('mpmh');
					$footer_map_title = get_sub_field('mpti');
					$footer_map_subtitle = get_sub_field('mpst');
					$footer_map_title_size = get_sub_field('mptis');
					$footer_map_title_color = get_sub_field('mptic');
					$footer_map_subtitle_color = get_sub_field('mpstc');
					$footer_map = get_sub_field('mp');
	
					if ( $footer_map_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_map footer_content_cols <?php echo $footer_map_mobile;?> <?php echo $footer_map_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_map_title ){ ?>
								<div class="footer_map_title_wrap footer_title">
									<div class="footer_map_title" style="font-size:<?php echo $footer_map_title_size; ?>px;color:<?php echo $footer_map_title_color; ?>;"><?php echo $footer_map_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_map_subtitle ){ ?>
								<div class="footer_map_subtitle_wrap">
									<div class="footer_map_subtitle" style="color:<?php echo $footer_map_subtitle_color; ?>;"><?php echo $footer_map_subtitle; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_map ){ ?>
				                <div class="flex_map_content_inner">
									<div class="map google-acfmap">										
										<div class="marker" data-lat="<?php echo $footer_map[ 'lat' ]; ?>" data-lng="<?php echo $footer_map[ 'lng' ]; ?>" data-icon="">
											<div class="location-image"></div>
											<p><?php echo $footer_map['address']; ?></p>
										</div>
									</div>
				                </div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			

					<?php if( get_row_layout() == 'f_se' ):
							
					$footer_search_bar_block_width = get_sub_field('sew');
					$footer_search_bar_mobile = get_sub_field('sewm');
					$footer_search_bar_hide_mobile = get_sub_field('sewmh');
					$footer_search_bar_show = get_sub_field('sesh');
	
					if ( $footer_search_bar_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_search_bar footer_content_cols <?php echo $footer_search_bar_mobile;?> <?php echo $footer_search_bar_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_search_bar_show ){ ?>
									<div class="footer_search_bar_container">
										<?php get_search_form(); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			

					<?php if( get_row_layout() == 'f_sl' ):
							
					$footer_social_links_block_width = get_sub_field('slw');
					$footer_social_links_mobile = get_sub_field('slmw');
					$footer_social_links_hide_mobile = get_sub_field('slmh');
					$footer_social_links_row = get_sub_field('slr');
					$footer_social_title = get_sub_field('slti');
					$footer_social_title_size = get_sub_field('sltis');
					$footer_social_title_color = get_sub_field('sltic');
					if ( $footer_social_links_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_social_links footer_content_cols <?php echo $footer_social_links_mobile;?> <?php echo $footer_social_links_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_social_title ){ ?>
								<div class="footer_full_contnet_title_wrap footer_title">
									<div class="footer_full_contnet_title" style="font-size:<?php echo $footer_social_title_size; ?>px;color:<?php echo $footer_social_title_color; ?>;"><?php echo $footer_social_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_social_links_row ){ ?>
									<div class="footer_social_links_container">
										<div class="footer_social_row">
											<ul class="social-bar">
												<?php while ( have_rows('slr') ) : the_row(); 
												$footer_social_icon = get_sub_field('ico');
												$footer_social_link = get_sub_field('lk');
												$footer_social_text = get_sub_field('txt');
												$footer_social_links_color = get_sub_field('col');
												?>
												<li class="social-item">
													<?php if( $footer_social_link ){ ?>
													<a href="<?php echo $footer_social_link; ?>" target="_blank" class="social_media">
													<?php } ?>
														<span style="color:<?php echo $footer_social_links_color; ?>;"><?php echo $footer_social_icon; ?></span>
													<?php if( $footer_social_link ){ ?>
													</a>
													<?php } ?>
												</li>
											    <?php endwhile; ?>
											</ul>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			

					<?php if( get_row_layout() == 'f_icl' ):
							
					$footer_icon_list_block_width = get_sub_field('iclw');
					$footer_icon_list_mobile = get_sub_field('iclwm');
					$footer_icon_list_hide_mobile = get_sub_field('iclmh');
					$footer_icon_list_list = get_sub_field('icll');
					$footer_icon_list_title = get_sub_field('iclti');
					$footer_icon_list_title_size = get_sub_field('icltis');
					$footer_icon_list_title_color = get_sub_field('icltic');
					if ( $footer_icon_list_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_icon_list footer_content_cols <?php echo $footer_icon_list_mobile;?> <?php echo $footer_icon_list_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_icon_list_title ){ ?>
								<div class="footer_icon_list_title_wrap footer_title">
									<div class="footer_icon_list_title" style="font-size:<?php echo $footer_icon_list_title_size; ?>px;color:<?php echo $footer_icon_list_title_color; ?>;"><?php echo $footer_icon_list_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_icon_list_list ){ ?>
									<div class="footer_icon_list_container">
										<div class="footer_icon_list_row">
											<ul class="footer_icon_list">
												<?php while ( have_rows('icll') ) : the_row(); 
												$footer_icon_list_icon = get_sub_field('ico');
												$footer_icon_list_text = get_sub_field('txt');
												$footer_icon_list_link = get_sub_field('lk');
												?>
												<li class="footer_icon_list_item">
													<?php if( $footer_icon_list_link ){ ?>
													<a href="<?php echo $footer_icon_list_link; ?>">
													<?php } ?>
														<div class="footer_icon_list_icon"><?php echo $footer_icon_list_icon; ?></div>
														<div class="footer_icon_list_text"><?php echo $footer_icon_list_text; ?></div>
													<?php if( $footer_icon_list_link ){ ?>
													</a>
													<?php } ?>
												</li>
											    <?php endwhile; ?>
											</ul>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			
				
					<?php if( get_row_layout() == 'f_nav' ):
							
					$footer_nav_block_width = get_sub_field('fnaw');
					$footer_nav_mobile = get_sub_field('fnawm');
					$footer_nav_hide_mobile = get_sub_field('fnahm');
					$footer_nav_title = get_sub_field('fnati');
					$footer_nav_title_size = get_sub_field('fnatis');
					$footer_nav_title_color = get_sub_field('fnatic');
					$footer_nav_choose = get_sub_field('fnav');
					$footer_nav_cols = get_sub_field('fnavc');
	
					if ( $footer_nav_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_nav footer_content_cols <?php echo $footer_nav_mobile;?> <?php echo $footer_nav_block_width;?> cols<?php echo $footer_nav_cols;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_nav_title ){ ?>
								<div class="footer_nav_title_wrap footer_title">
									<div class="footer_nav_title" style="font-size:<?php echo $footer_nav_title_size; ?>px;color:<?php echo $footer_nav_title_color; ?>;"><?php echo $footer_nav_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_nav_choose ){ ?>
								<div class="footer_nav_wrap">
									<div class="footer_nav" role="navigation">
									<?php if( $footer_nav_choose == 'footer-nav-1' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-1',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php elseif( $footer_nav_choose == 'footer-nav-2' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-2',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php elseif( $footer_nav_choose == 'footer-nav-3' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-3',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php endif; ?>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>							
				
			    <?php $fcount++; endwhile; //  end of flexible_content
			else :
			    // no layouts found
			endif;
			
			?>
				
			</div>
			
		</div>
		
		<?php 
		$footer_copr = get_field( 'foo_copr','option' );
		$footer_copl = get_field( 'foo_copl','option' );
		$footer_copcolor = get_option( 'options_foo_cobgc' );
		if( $footer_copr || $footer_copl ){ ?>
		<div class="footer_copyright" style="background-color:<?php echo $footer_copcolor; ?>;">
			<div class="footer_copyright_wrap wrap">
				<div class="footer_copyright_row row-flex center-xs<?php if( $footer_copr && $footer_copl ){ ?> between-xs<?php } else { ?> center-xs<?php } ?>">
					<?php if( $footer_copr ){ ?>
					<div class="footer_copyright_con footer_copr col-xs-12 col-sm"><?php echo $footer_copr;?></div>
					<?php } ?>
					<?php if( $footer_copl ){ ?>
					<div class="footer_copyright_con footer_copl col-xs-12 col-sm"><?php echo $footer_copl;?></div>
					<?php } ?>
				</div>
				
			</div>
		</div>
		<?php } ?>

	</div>
</div><!-- /.fixedFooter -->