<?php
$tble_rows = get_field('hc_tble','option');
$mcart_po = get_field('mcart_po','option');
if ($tble_rows) {
?>

<div class="top_bar_left top_bar_col">
	<div class="top_bar_left_elements top_bar_elements">

		<?php
		$tble_rows = get_field('hc_tble','option');
		//print_r($sbs_rows);
		//$sbs_rows = get_post_meta( get_the_ID(), 'sbs_flex', true );
		$tble_col = 0;
		foreach( $tble_rows as $tble_count => $tble_row ) { 
			$tble_col++;
		?>
			<div class="top_bar_left_row tble_col_<?php echo $tble_col; ?>">
			<?php
			switch ( $tble_row['acf_fc_layout'] ) {
				
				case 'hc_tblse':
				$hc_tblsesh = $tble_row['hc_tblsesh'];
				?>
				<div class="top_bar_left_col top_bar_search">
					<?php if ($hc_tblsesh == 'se-icon') { ?>
					<div class="top_bar_text_inner"><?php echo $hc_tbltext; ?></div>
					<?php } elseif ($hc_tblsesh == 'se-field') { ?>
					<div class="top_bar_text_inner"><?php echo $hc_tbltext; ?></div>
					<?php } ?>
				</div>
				<?php break;

				case 'hc_tblmc':
				$tblmc_co = $tble_row['tblmc_co'];
				$tblmc_sz = $tble_row['tblmc_sz'];
				$tblmc_se = $tble_row['tblmc_se'];
				$tblmc_my = $tble_row['tblmc_my'];
				
				if ( defined('YITH_YWRAQ_PREMIUM') && function_exists('YITH_YWRAQ_Frontend') && $mcart_po == 'mc_tb' ) {
					
					
					

				<div class="top_bar_left_col top_bar_minicart">
					<?php if ($tblmc_se) { ?>
					<div class="header-minicart-search">
						<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
						<i class="fal fa-search" style="color:<?php echo $tblmc_co; ?>;font-size:<?php echo $tblmc_sz; ?>px;"></i>
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
					<?php if ($tblmc_my) { ?>
					<div class="header-minicart-my">
						<a class="" href="/my-account/">
						<i class="fal fa-user-alt" style="color:<?php echo $tblmc_sz; ?>;font-size:<?php echo $tblmc_co; ?>px;"></i>
						</a>
					</div>
					<?php } ?>
					<div class="header-minicart">
						<div class="shopping_cart_content">
							<div id="mini-cart" class="mini-cart">
								<div class="cart-head">
									<i class="fal fa-shopping-bag" style="color:<?php echo $tblmc_co; ?>;font-size:<?php echo $tblmc_sz; ?>px;"></i>
									<?php echo do_shortcode('[yith_ywraq_mini_widget_quote]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php } elseif ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_tb' ) { ?>
				<div class="top_bar_left_col top_bar_minicart">
					<?php if ($tblmc_se) { ?>
					<div class="header-minicart-search">
						<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
						<i class="fal fa-search" style="color:<?php echo $tblmc_co; ?>;font-size:<?php echo $tblmc_sz; ?>px;"></i>
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
					<?php if ($tblmc_my) { ?>
					<div class="header-minicart-my">
						<a class="" href="/my-account/">
						<i class="fal fa-user-alt" style="color:<?php echo $tblmc_sz; ?>;font-size:<?php echo $tblmc_co; ?>px;"></i>
						</a>
					</div>
					<?php } ?>
					<div class="header-minicart">
						<div class="shopping_cart_content">
							<div id="mini-cart" class="mini-cart">
								<div class="cart-head">
									<i class="fal fa-shopping-bag" style="color:<?php echo $tblmc_co; ?>;font-size:<?php echo $tblmc_sz; ?>px;"></i>
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
				<?php }
				break;

				case 'hc_tblnav':
				$hc_tblsnv = $tble_row['hc_tblsnv'];
				?>
				<div class="top_bar_left_col top_bar_text">
					<?php if ($hc_tblsnv == 'top-nav-left') { ?>
						<div id="panel-nav" class="panel-nav" role="navigation">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'panel-nav-left',
									'container'      => false,
									'menu_id'      => 'menu-panel',
									'menu_class'     => 'menu-panel',
									'depth'          => '1',
									'fallback_cb'    => false,
									'link_before'    => '<span class="nav-name-item" itemprop="name">',
									'link_after'     => '</span>',
							) ); ?>
						</div>
					<?php } elseif ($hc_tblsnv == 'top-nav-right') { ?>
						<div id="panel-nav" class="panel-nav" role="navigation">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'panel-nav-right',
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
				<?php break;
	
				case 'hc_tbltx':
				$hc_tbltext = $tble_row['hc_tbltext'];
				?>
				<div class="top_bar_left_col top_bar_text">
					<div class="top_bar_text_inner"><?php echo $hc_tbltext; ?></div>
				</div>
				<?php break;

				case 'hc_tblic':
				$hc_tblici = $tble_row['hc_tblici'];
				$hc_tblicim = $tble_row['hc_tblicim'];
				$hc_tblictx = $tble_row['hc_tblictx'];
				$hc_tbliclty = $tble_row['hc_tbliclty'];
				$hc_tblicfo = $tble_row['hc_tblicfo'];
				$hc_tblicpg = $tble_row['hc_tblicpg'];
				$hc_tbliclk = $tble_row['hc_tbliclk'];
				?>
				<div class="top_bar_left_col top_bar_icon">
					<div class="icon_link_item" style="color:;">
						<?php if ($hc_tbliclty == 'free-link') { ?>
						<a href="<?php echo $hc_tbliclk; ?>" target="_blank" class="">
						<?php } elseif ($hc_tbliclty == 'popup-form') { ?>
						<a data-fancybox data-src="#popop-form-tble<?php echo $tble_col; ?>" href="javascript:;">
						<?php } elseif ($hc_tbliclty == 'page') { ?>
						<a href="<?php echo $hc_tblicpg; ?>" class="">
						<?php } elseif ($hc_tbliclty == 'popup-video') { ?>
						<a data-fancybox href="<?php echo $hc_tbliclk;?>">
						<?php } ?>
						<?php if ($hc_tblictx) { ?><span class="icon_link_text"><?php echo $hc_tblictx; ?></span><?php } ?>
							<?php if ($hc_tblici) { ?>
							<?php echo $hc_tblici; ?>
							<?php } elseif ($hc_tblicim) { ?>
							<?php echo wp_get_attachment_image( $hc_tblicim, 'full' );?>
							<?php } ?>
						</a>
					</div>
				</div>
				<?php if( $hc_tbliclty == 'popup-form' ): ?>
				<?php 
				$popup_contact_title = get_option( 'options_default_flex_form_title' );
				$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
				?>
				<div style="display: none;max-width: 700px;" id="popop-form-tble<?php echo $tble_col; ?>" class="button-popop-form">
				
					<div class="button-popop-form-wrap">
						
						<div class="button-popop-form-row">
							<div class="button-popop-form-col form-image col-xs-12">
								<?php if( $popup_contact_title ) { ?>
								<div class="contact-title">
									<div class="popup_contact_title"><?php echo $popup_contact_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $popup_contact_subtext ) { ?>
								<div class="contact-title">
									<div class="popup_contact_subtext"><?php echo $popup_contact_subtext; ?></div>
								</div>
								<?php } ?>
								<div class="contact-form-page">
									<div class="full_form_id">
										<div class="full_form_id_wrap">
											<?php echo do_shortcode( '[contact-form-7 id="'.$hc_tblicfo.'" ]' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>
				<?php endif; ?>
				
				<?php break;
	
			} ?>
			</div>
		<?php
		} ?>					
	</div>	
</div>
<?php } ?>
