<?php 
$uid = $block['id'];

$button_block_width = get_field('bt_bw');
$button_break = get_field('bt_br');
$button_block_align = get_field('bt_bal');
$button_order = get_field('bt_or');
$button_mobile = get_field('bt_mo');
$button_hide_mobile = get_field('bt_hmo');
$buttont_animation = get_field('bt_an');
$button_text = get_field('bt_tx');
$button_link_type = get_field('bt_ltp');
$button_page_link = get_field('bt_plk');
$button_free_link = get_field('bt_flk');
$button_form_link = get_field('bt_folk');
$button_style = get_field('bt_sy');
$button_color = get_field('bt_tcl');
$button_bg = get_field('bt_bg');
$button_hor_align = get_field('bt_hal');
$button_ver_align = get_field('bt_val');
$button_icon = get_field('bt_ity');
$button_icon_side = get_field('bt_is');
$button_icon_img = get_field('bt_ii');
$button_icon_font = get_field('bt_if');
$button_icon_color = get_field('bt_icl');
$button_icon_html = get_field('bt_ht');

if ( $button_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $uid; ?> <?php echo $button_mobile;?> <?php echo $button_block_width;?> <?php if( $button_break ){ ?><?php echo $button_block_align; ?><?php } ?>" <?php if( $button_order ){ ?>style="order:<?php echo $button_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $uid; ?>" class="page_flexible page_flexible_content section-<?php echo $uid; ?>" data-aos="<?php echo $buttont_animation;?>">

		<div class="flex_main_button flexible_page_element" itemprop="text">
			<div class="flex_main_button_wrap content_wrap row-flex center-xs <?php echo $button_hor_align; ?>-sm <?php echo $button_ver_align; ?>-sm">
				<?php if( $button_link_type == 'page_link' ): ?>
				<a href="<?php echo $button_page_link; ?>" class="">
				<?php endif; ?>	
				<?php if( $button_link_type == 'free_link' ): ?>
				<a href="<?php echo $button_free_link; ?>" class="">
				<?php endif; ?>
				<?php if( $button_link_type == 'form_link' ): ?>					
				<a data-fancybox data-src="#popop-form-<?php echo $row;?>-<?php echo $count;?>" href="javascript:;">		
				<?php endif; ?>
					<button class="section_readmore_link watch_btn hoverLink <?php echo $button_style; ?> <?php echo $button_icon_side; ?> <?php echo $button_form_link; ?>" style="color:<?php echo $button_color; ?>;background:<?php echo $button_bg; ?>;">
					<?php if( $button_icon_img && $button_icon == 'button_icon_img' ) { ?>
						<div class="flex_main_button_img">
							<?php echo wp_get_attachment_image( $button_icon_img, 'thumbnail' ); ?>
						</div>
					<?php } ?>
					<?php if( $button_icon_font && $button_icon == 'button_icon_font' ) { ?>
						<div class="flex_main_button_icon" style="color:<?php echo $button_icon_color; ?>;"><?php echo $button_icon_font; ?></div>
					<?php } ?>
					<?php if( $button_icon_html && $button_icon == 'button_icon_free' ) { ?>
						<div class="flex_main_button_icon" style="color:<?php echo $button_icon_color; ?>;"><?php echo $button_icon_html; ?></div>
					<?php } ?>
						<div class="button_text">
							<div class="button_text_inner"><?php echo $button_text; ?></div>
						</div>
					</button>
				</a>
			</div>
		</div>

		<?php if( $button_link_type == 'form_link' ): ?>
		<?php 
		$popup_contact_title = get_option( 'options_default_flex_form_title' );
		$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
		?>
		<div style="display: none;max-width: 700px;" id="popop-form-<?php echo $row;?>-<?php echo $count;?>" class="button-popop-form">
		
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
									<?php echo do_shortcode( '[contact-form-7 id="'.$button_form_link.'" ]' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
		<?php endif; ?>
		
	</section>
</div>
<?php if( $button_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>