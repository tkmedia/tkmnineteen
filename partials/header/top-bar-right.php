<?php
$tbri_rows = get_field('hc_tbri','option');
$mcart_po = get_field('mcart_po','option');
if ($tbri_rows) {
?>

<div class="top_bar_right top_bar_col">
	<div class="top_bar_right_elements top_bar_elements">

		<?php
		$tbri_rows = get_field('hc_tbri','option');
		//print_r($sbs_rows);
		//$sbs_rows = get_post_meta( get_the_ID(), 'sbs_flex', true );
		$tbri_col = 0;
		foreach( $tbri_rows as $tbri_count => $tbri_row ) { 
			$tbri_col++;
		?>
			<div class="top_bar_right_row">
			<?php
			switch ( $tbri_row['acf_fc_layout'] ) {
				
				case 'hc_tbrse':
				$hc_tbrsesh = $tbri_row['hc_tbrsesh'];
				?>
				<div class="top_bar_right_col top_bar_search">
					<?php if ($hc_tbrsesh == 'se-icon') { ?>
					<div class="top_bar_text_inner"><?php echo $hc_tbrtext; ?></div>
					<?php } elseif ($hc_tbrsesh == 'se-field') { ?>
					<div class="top_bar_text_inner"><?php echo $hc_tbrtext; ?></div>
					<?php } ?>
				</div>
				<?php break;

				case 'hc_tbrmc':
				$tbrmc_co = $tbri_row['tbrmc_co'];
				$tbrmc_sz = $tbri_row['tbrmc_sz'];
				$tbrmc_se = $tbri_row['tbrmc_se'];
				$tbrmc_ma = $tbri_row['tbrmc_ma'];
				if ( class_exists( 'Woocommerce' ) && $mcart_po == 'mc_tb' ) :
				?>
				<div class="top_bar_right_col top_bar_minicart">
					<?php if ($tbrmc_se) { ?>
					<div class="header-minicart-search">
						<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
						<i class="fal fa-search" style="color:<?php echo $tbrmc_co; ?>;font-size:<?php echo $tbrmc_sz; ?>px;"></i>
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
					<?php if ($tbrmc_ma) { ?>
					<div class="header-minicart-my">
						<a class="" href="/my-account/">
						<i class="fal fa-user-alt" style="color:<?php echo $tbrmc_sz; ?>;font-size:<?php echo $tbrmc_co; ?>px;"></i>
						</a>
					</div>
					<?php } ?>
					<div class="header-minicart">
						<div class="shopping_cart_content">
							<div id="mini-cart" class="mini-cart">
								<div class="cart-head">
									<i class="fal fa-shopping-bag" style="color:<?php echo $tbrmc_co; ?>;font-size:<?php echo $tbrmc_sz; ?>px;"></i>
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
				<?php endif; ?>
				<?php break;

				case 'hc_tbrnav':
				$hc_tbrsnv = $tbri_row['hc_tbrsnv'];
				?>
				<div class="top_bar_right_col top_bar_text">
					<?php if ($hc_tbrsnv == 'top-nav-left') { ?>
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
					<?php } elseif ($hc_tbrsnv == 'top-nav-right') { ?>
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
	
				case 'hc_tbrtx':
				$hc_tbrtext = $tbri_row['hc_tbrtext'];
				?>
				<div class="top_bar_right_col top_bar_text">
					<div class="top_bar_text_inner"><?php echo $hc_tbrtext; ?></div>
				</div>
				<?php break;

				case 'hc_tbric':
				$hc_tbrici = $tbri_row['hc_tbrici'];
				$hc_tbricim = $tbri_row['hc_tbricim'];
				$hc_tbrictx = $tbri_row['hc_tbrictx'];
				$hc_tbriclty = $tbri_row['hc_tbriclty'];
				
				$hc_tbricfo = $tbri_row['hc_tbricfo'];
				$hc_tbricpg = $tbri_row['hc_tbricpg'];
				$hc_tbriclk = $tbri_row['hc_tbriclk'];
				?>
				<div class="top_bar_right_col top_bar_icon">
					<div class="icon_link_item" style="color:;">
						<?php if ($hc_tbriclty == 'free-link') { ?>
						<a href="<?php echo $hc_tbriclk; ?>" target="_blank" class="">
						<?php } elseif ($hc_tbriclty == 'popup-form') { ?>
						<a data-fancybox data-src="#popop-form-tbri<?php echo $tbri_col; ?>" href="javascript:;">
						<?php } elseif ($hc_tbriclty == 'page') { ?>
						<a href="<?php echo $hc_tbricpg; ?>" class="">
						<?php } elseif ($hc_tbriclty == 'popup-video') { ?>
						<a data-fancybox href="<?php echo $hc_tbriclk;?>">
						<?php } ?>
							<?php if ($hc_tbrici) { ?>
							<?php echo $hc_tbrici; ?>
							<?php } elseif ($hc_tbricim) { ?>
							<?php echo wp_get_attachment_image( $hc_tbricim, 'full' );?>
							<?php } ?>
							<?php if ($hc_tbrictx) { ?><span class="icon_link_text"><?php echo $hc_tbrictx; ?></span><?php } ?>
						</a>
					</div>
				</div>
				<?php if( $hc_tbriclty == 'popup-form' ): ?>
				<?php 
				$popup_contact_title = get_option( 'options_default_flex_form_title' );
				$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
				?>
				<div style="display: none;max-width: 700px;" id="popop-form-tbri<?php echo $tbri_col; ?>" class="button-popop-form">
				
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
											<?php echo do_shortcode( '[contact-form-7 id="'.$hc_tbricfo.'" ]' ); ?>
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
