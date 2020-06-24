<?php 
$uid = $block['id'];

$img_content_width = get_field('imc_bw');
$img_content_order = get_field('imc_or');
$img_content_mobile = get_field('imc_mo');
$img_content_hide_mobile = get_field('imc_hmo');
$img_content_break = get_field('imc_br');
$img_content_block_align = get_field('imc_ba');
$img_content_animation = get_field('imc_an');

$img_content_style = get_field('imc_sy');
$img_content_type = get_field('imc_tp');
$img_content_title = get_field('imc_t');
$img_content_subtitle = get_field('imc_st');
$img_content_title_h = get_field('imc_th');
$img_content_title_s = get_field('imc_ts');
$img_content_title_color = get_field('imc_tc');
$img_content_subtitle_color = get_field('imc_stc');
$img_content_text_color = get_field('imc_txc');

$img_content_img = get_field('imc_im');
$img_content_img_size = get_field('imc_ims');
$img_content_text_f = get_field('imc_txf');
$img_content_align = get_field('imc_ia');
$img_content_btn = get_field('imc_bt');
$img_content_link = get_field('imc_lk');
$img_content_btn2 = get_field('imc_bt2');
$img_content_link2 = get_field('imc_lk2');

$img_content_btn_color = get_field('imc_btc');	
$img_content_img_layout = get_field('imc_ly');
$img_content_img_bg = get_field('imc_ibg');	
$img_content_img_side = get_field('imc_isi');	
$img_col_layout = get_field('imc_ily');
$img_content_logo = get_field('imc_lo');

if ( $img_content_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $uid; ?> <?php echo $img_content_mobile;?> <?php echo $img_content_width;?> <?php if( $img_content_break ){ ?><?php echo $img_content_block_align; ?><?php } ?>" <?php if( $img_content_order ){ ?>style="order:<?php echo $img_content_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $uid; ?>" class="page_flexible page_flexible_content section-<?php echo $uid; ?>" data-aos="<?php echo $img_content_animation;?>">

		<div class="flex_img_content flexible_page_element" itemprop="text">
			<div class="flex_img_content_wrap img_content_<?php echo $img_content_style; ?>">
				<div class="flex_img_content_container type_<?php echo $img_content_type; ?>">
					
					<?php if( $img_content_type == 'img_top' ): ?>
						<div class="img_content_item_row">
							<?php if( $img_content_img ){ ?>
							<div class="img_content_item_img">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
							<div class="img_content_item_content content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_title ){ ?>
								<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;color:<?php echo $img_content_title_color; ?>;">
									<?php echo $img_content_title; ?>
								</<?php echo $img_content_title_h; ?>>
							<?php } ?>	
							<?php if( $img_content_subtitle ){ ?>
								<p class="img_content_subtitle" style="color:<?php echo $img_content_title_color; ?>;">
									<?php echo $img_content_subtitle; ?>
								</p>
							<?php } ?>	
							<?php if( $img_content_text_f ) { ?>
								<div class="img_content_item_text" style="color:<?php echo $img_content_text_color; ?>;">
									<?php echo $img_content_text_f; ?>
								</div>
							<?php } ?>
							<?php if( $img_content_btn || $$img_content_btn2 ){ ?>
							<div class="img_content_item_buttons">
								<?php if( $img_content_btn || $img_content_link ){ ?>
								<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
									<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
									</a>
								</div>
								<?php } ?>
								<?php if( $img_content_btn2 || $img_content_link2 ){ ?>
								<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
									<a href="<?php echo $img_content_link2; ?>" class="<?php echo $img_content_btn_color; ?>">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn2; ?></button>
									</a>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
							
							</div>
						</div>
					<?php endif; ?>
					
					<?php if( $img_content_type == 'title_top' ): ?>
						<div class="img_content_item_row">
							<?php if( $img_content_title ){ ?>
							<div class="img_content_title_top content_<?php echo $img_content_align; ?>">
								<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;color:<?php echo $img_content_title_color; ?>;">
									<?php echo $img_content_title; ?>
								</<?php echo $img_content_title_h; ?>>
								<?php if( $img_content_subtitle ){ ?><span class="img_content_subtitle" style="color:<?php echo $img_content_title_color; ?>;"><p class="img_content_subtitle_inner"><?php echo $img_content_subtitle; ?></p></span><?php } ?>	
								<?php if( $img_content_img ){ ?>
							</div>
							<?php } ?>	
							<div class="img_content_item_img">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
							<div class="img_content_item_content content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_text_f ) { ?>
								<div class="img_content_item_text" style="color:<?php echo $img_content_text_color; ?>;">
									<?php echo $img_content_text_f; ?>
								</div>
							<?php } ?>
							<?php if( $img_content_btn || $$img_content_btn2 ){ ?>
							<div class="img_content_item_buttons">
								<?php if( $img_content_btn || $img_content_link ){ ?>
								<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
									<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
									</a>
								</div>
								<?php } ?>
								<?php if( $img_content_btn2 || $img_content_link2 ){ ?>
								<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
									<a href="<?php echo $img_content_link2; ?>" class="<?php echo $img_content_btn_color; ?>">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn2; ?></button>
									</a>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if( $img_content_type == 'img_side' ): ?>
						<div class="img_content_item_row row-flex image_<?php echo $img_content_img_layout; ?> side-<?php echo $img_content_img_side; ?>" style="background:<?php echo $img_content_img_bg; ?>;">
							<div class="img_content_item_content Aligner col-xs-12 <?php echo $img_col_layout; ?> content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_text_f || $img_content_title ) { ?>
								<div class="img_content_item_text" style="color:<?php echo $img_content_text_color; ?>;">
									<div class="img_content_item_text_inner">
										<div class="img_content_item_title">	
											<?php if( $img_content_title ){ ?>
												<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;color:<?php echo $img_content_title_color; ?>;">
													<?php echo $img_content_title; ?>
												</<?php echo $img_content_title_h; ?>>
											<?php } ?>	
											<?php if( $img_content_subtitle ){ ?>
												<p class="img_content_subtitle" style="color:<?php echo $img_content_title_color; ?>;">
													<?php echo $img_content_subtitle; ?>
												</p>
											<?php } ?>	
										</div>
										<?php if( $img_content_text_f ){ ?>
										<div class="img_content_text_f" style="color:<?php echo $img_content_text_color; ?>;"><?php echo $img_content_text_f; ?></div>
										<?php } ?>
										<?php if( $img_content_btn || $$img_content_btn2 ){ ?>
										<div class="img_content_item_buttons">
											<?php if( $img_content_btn || $img_content_link ){ ?>
											<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
												<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
												<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
												</a>
											</div>
											<?php } ?>
											<?php if( $img_content_btn2 || $img_content_link2 ){ ?>
											<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
												<a href="<?php echo $img_content_link2; ?>" class="<?php echo $img_content_btn_color; ?>">
												<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn2; ?></button>
												</a>
											</div>
											<?php } ?>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							</div>

							<?php if( $img_content_img ){ ?>
							<div class="img_content_item_img col-xs-12 <?php echo $img_col_layout; ?> <?php echo $img_content_img_side; ?>">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
						</div>
							<?php if( $img_content_logo ){ ?>
							<div class="img_content_logo">
								<?php echo wp_get_attachment_image( $img_content_logo, 'full' ); ?>
							</div>
							<?php } ?>


					<?php endif; ?>
					
				</div>
			</div>
		</div>	
		
	</section>
	<script>
	jQuery(function($) {
		$(window).load(function(){
			get_content_height();
		    //function to get current div height
		    function get_content_height(){
		        //var footer_height = $('#footer_container').height();
		        var content_height = $('.section-<?php echo $uid; ?> .flex_img_content_container.type_img_side .img_content_item_content').outerHeight();
		        $('.section-<?php echo $uid; ?> .flex_img_content_container.type_img_side .img_content_item_img').css('height', content_height);
		    }
	    });	
	}); 
	</script>
	
</div>
<?php if( $img_content_break ){ ?><div class="break"></div><?php } ?>

<?php } ?>