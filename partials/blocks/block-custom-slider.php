<?php 
$uid = $block['id'];

$client_slider_width = get_field('cs_bw');
$client_slider_mobile_cols = get_field('cs_mo');
$client_slider_hide_mobile = get_field('cs_hmo');
$client_slider_order = get_field('cs_or');
$client_slider_animation = get_field('cs_an');
$client_slider_break = get_field('cs_br');
$client_slider_block_align = get_field('cs_bAl');

$client_src = get_field('cs_src');
$client_type = get_field('cs_ity');
$client_slider_count = get_field('cs_cu');
$client_slider_count_mobile = get_field('cs_cum');
$client_slider_size = get_field('cs_ims');

$client_slider_image_page = get_field( 'cs_img' );
$client_slider_image_effect = get_field( 'cs_ime' );
$client_slider_image = get_field( 'client_slider_image','option' );
$client_slider_image_options = get_field('client_slider_image','option');

$flex_client_title = get_field('cs_t');
$flex_client_title_size = get_field('cs_tsz');
$flex_client_title_color = get_field('cs_tcl');
$flex_client_title_align = get_field('cs_tal');
$flex_client_subtitle = get_field('cs_st');
$flex_client_subtitle_size = get_field('cs_sts');
$flex_client_subtitle_color = get_field('cs_stc');

$client_s_id = get_field('cs_id');

if ( $client_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>


<div class="flex_content_cols <?php echo $uid; ?> <?php echo $client_slider_mobile_cols;?> <?php echo $client_slider_width;?> <?php echo $client_slider_image_effect;?> <?php if( $client_slider_break ){ ?><?php echo $client_slider_block_align; ?><?php } ?>" <?php if( $client_slider_order ){ ?>style="order:<?php echo $client_slider_order; ?>;"<?php } ?>>
	<?php if( $client_slider_image_effect == 'round-articles' ) { ?>
	<div class="round-articles-bg" itemprop="text"></div>
	<?php } ?>
	
	<section id="section-<?php echo $uid; ?><?php if( $client_s_id ){ ?> client_s_id<?php } ?>" class="page_flexible page_flexible_content section-<?php echo $uid; ?>" data-aos="<?php echo $client_slider_animation;?>">
		<div class="client_slider flexible_page_element" itemprop="text">
			
			<?php if( $flex_client_title || $flex_client_subtitle ) { ?>
			<div class="masonary_grid_link_title_wrap">
				<?php if( $flex_client_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $flex_client_title_align; ?>" style="text-align:<?php echo $flex_client_title_align; ?> !important;color:<?php echo $flex_client_subtitle_color; ?>;font-size:<?php echo $flex_client_title_size; ?>px;"><?php echo $flex_client_title; ?></h2>
				<?php } ?>
				<?php if( $flex_client_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $flex_client_title_align; ?>" itemprop="headline" style="text-align:<?php echo $flex_client_title_align; ?> !important;color:<?php echo $flex_client_subtitle_color; ?>;font-size:<?php echo $flex_client_subtitle_size; ?>px;"><?php echo $flex_client_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<div class="client_slider_wrap slider-<?php echo $uid; ?> type-<?php echo $client_src;?> <?php echo $client_slider_image_effect;?> client-<?php echo $client_type;?>">
				
			<?php if( $client_type == 'slider' ) : ?>				

				<?php if( $client_src == 'option' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $uid; ?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $client_slider_image_options as $image ): ?>
					                <div class="client_slide_item swiper-slide">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    
						    <div id="js-next-s" class="swiper-button-next"></div>
						    <div id="js-prev-s" class="swiper-button-prev"></div>
						</div>
					</div>
					<div id="js-pagevertical-s" class="swiper-pagination style1"></div>
				</div>
				
				<?php } elseif( $client_src == 'from-page' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $uid; ?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $client_slider_image_page as $image ): ?>
					                <div class="client_slide_item swiper-slide">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
										<div class="client_slide_item_caption"><?php echo $image['caption']; ?></div>

						                </div>
					                </div>
					            <?php endforeach; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
					</div>
					<div id="js-pagevertical-s" class="swiper-pagination style1"></div>
				</div>

				<?php } elseif( $client_src == 'from-page-link' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="<?php if( $client_slider_image_effect !== 'vertical-slider'){ ?>swiper-container<?php } ?> client-top-<?php echo $uid; ?>">
							    <div class="<?php if( $client_slider_image_effect !== 'vertical-slider'){ ?>swiper-wrapper<?php } ?> client_slider_wrapper">
								<?php $client_item = 1; while ( have_rows('cs_pl') ) : the_row();
								$plinks_link = get_sub_field('cs_pll');
								$plinks_title = get_sub_field('cs_plt');
								$plinks_subtitle = get_sub_field('cs_pls');
								$plinks_new = get_sub_field('cs_pln');
								
								$post = $plinks_link;
								setup_postdata( $post ); 
								?>
									<div class="client_slide_item swiper-slide">
									<a href="<?php the_permalink(); ?>" <?php if( $plinks_new ){ ?>target="_blank"<?php } ?>>
										<div class="client_slide_item_inner">
											<div class="client_slide_item_span">
												<div class="client_slide_item_img">
												 <?php echo get_the_post_thumbnail( $post, $client_slider_size ); ?>
												</div>
												<div class="client_title_wrap">
													<?php if( $plinks_subtitle ) { ?>
														<div class="client_subtitle"><?php echo $plinks_subtitle; ?></div>
													<?php } ?>
													<div class="client_title">
														<div class="client_title_wrap"><?php if( $plinks_title ){ echo $plinks_title; } else { the_title(); }?></div>
												</div>
												</div>
											</div>
										</div> 
									</a>
									</div>
								<?php wp_reset_postdata(); $client_item++; endwhile; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
					</div>
					<div class="swiper-pagination style1"></div>
				</div>

				<?php } elseif( $client_src == 'from-page-repeater' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $uid; ?>">
							    <div class="swiper-wrapper">
								<?php $client_item = 1; while ( have_rows('cs_rp') ) : the_row();
								$client_img = get_sub_field('cs_rpi');
								$client_title = get_sub_field('cs_rpt');
								$client_title_color = get_sub_field('cs_rptc');
								$client_subtitle = get_sub_field('cs_rpst');
								$client_link = get_sub_field('cs_rpl');
								$client_link_new = get_sub_field('cs_rpln');
								$client_overlay = get_sub_field('cs_rpov');
								?>
									<div class="client_slide_item swiper-slide">
									<?php if( $client_link && $client_slider_image_effect !== 'round-name'){ ?><a href="<?php echo $client_link; ?>" <?php if( $client_link_new ){ ?>target="_blank"><?php } ?>><?php } ?>

									<?php if( $client_slider_image_effect == 'round-name' ) { ?>
									<a data-fancybox data-src="#popop-client-<?php echo $client_item;?>" href="javascript:;">
									<?php } ?>
									
										<div class="client_slide_item_inner">
											<div class="client_slide_item_span">

												<div class="client_slide_item_img">
												<?php echo wp_get_attachment_image( $client_img, $client_slider_size ); ?>
												<?php if( $client_overlay ){ ?>
												<div class="client_slide_item_overlay"></div>
												<?php } ?>
												</div>
												<?php if( $client_title ){ ?>
													<div class="client_title" style="color:<?php echo $client_title_color; ?>;">
														<?php if( $client_slider_image_effect == 'vet-titles' ) { ?>
														<div class="title_ver-titles"></div>
														<?php } ?>
														<div class="client_title_wrap"><?php echo $client_title; ?></div>
														<?php if( $client_slider_image_effect == 'vet-titles' ) { ?>
														<div class="title_ver-titles"></div>
														<?php } ?>
													</div>
												<?php } ?>	
												<?php if( $client_subtitle && $client_slider_image_effect !== 'round-name') { ?>
													<div class="client_subtitle" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_subtitle; ?></div>
												<?php } ?>
											</div>
										</div> 
									<?php if( $client_link || $client_slider_image_effect == 'round-name' ){ ?></a><?php } ?>
									</div>
								<?php $client_item++; endwhile; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
					</div>
					<div class="swiper-pagination style1"></div>
				</div>

				<?php } ?>
				
				<?php if( $client_slider_image_effect == 'round-name' ): ?>
					<?php $client_item = 1; while ( have_rows('cs_rp') ) : the_row();
					$client_img = get_sub_field('cs_rpi');
					$client_title = get_sub_field('cs_rpt');
					$client_title_color = get_sub_field('cs_rptc');
					$client_subtitle = get_sub_field('cs_rpst');
					$client_link = get_sub_field('cs_rpl');
					$client_link_new = get_sub_field('cs_rpln');
					?>
					<div style="display: none;max-width: 700px;" id="popop-client-<?php echo $client_item;?>" class="popop-client button-popop-form">
						<div class="button-popop-form-wrap">
							<div class="button-popop-form-row">
								<div class="button-popop-form-col form-image col-xs-12">
									
									<div class="popop-client-first">
										<div class="client_slide_item_img">
										 <?php echo wp_get_attachment_image( $client_img, 'menu-100' ); ?>
										</div>
										<?php if( $client_title ){ ?>
											<div class="client_title" style="color:<?php echo $client_title_color; ?>;">
												<div class="client_title_wrap"><?php echo $client_title; ?></div>
											</div>
										<?php } ?>	
										<div class="client_subtitle" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_subtitle; ?></div>
										<button class="section_readmore_link watch_btn popop-client-btn"><?php _e('Consult', 'tkmnineteen'); ?></button>
									</div>
									<div class="popop-client-second" style="display: none;">
										<div class="full_form_id_wrap">
											<?php echo do_shortcode( '[contact-form-7 id="404"]' ); ?>
										</div>
									</div>
	
								</div>
							</div>
						</div>
					</div>				
						<script>
						jQuery(function($) {
							var $first = $("#popop-client-<?php echo $client_item;?> .popop-client-first"),
								$second = $("#popop-client-<?php echo $client_item;?> .popop-client-second");
							
							$( "#popop-client-<?php echo $client_item;?> .popop-client-btn" ).click(function() {
								$first.hide();
								$second.show().addClass("active");
							});
							$( "#popop-client-<?php echo $client_item;?> .fancybox-close-small" ).click(function() {
								if ($second.hasClass("active")){
									$first.show();
									$second.hide().removeClass("active");
								}
							});
						});
						</script>							
					
					<?php $client_item++; endwhile; ?>
				<?php endif; ?>
				
				<?php if( $client_slider_image_effect == 'vertical-slider'){ ?>
				<script>					
				jQuery(function($) {
					$('#section-<?php echo $uid; ?> .client_slider_wrapper').slick({
						vertical: true,
						verticalSwiping: true,
						//rtl: true,
						slidesToShow: <?php echo $client_slider_count;?>,
						slidesToScroll: 1,
						dots: false,
						//pauseOnHover: true,
						//speed: 500,
						//autoplay: true,
						//autoplaySpeed: 6000,
						arrows: true,
						infinite: false,
						responsive: [
						{
						  breakpoint: 768,
						  settings: {
						    slidesToShow: <?php echo $client_slider_count_mobile;?>,
						  }
						}
						]
					});
				}); 				
				</script>	
				
				<?php } else {?>
				<script>					
				jQuery(function($) {
					
				    let options<?php echo $uid; ?> = {};
				    
				    if ( $("#section-<?php echo $uid; ?> .swiper-slide").length > 1 ) {
				        options<?php echo $uid; ?> = {
				            //direction: 'horizontal',
				            loop: true,
				            slidesPerView : <?php echo $client_slider_count;?>,
				            autoplayDisableOnInteraction: false,
							//pagination: {
								//el: '#section-<?php echo $uid; ?> .swiper-pagination',
								//clickable: true,
								//type: 'fraction',
							//},
							pagination: false,
							navigation: {
								nextEl: '#section-<?php echo $uid; ?> .swiper-button-next',
								prevEl: '#section-<?php echo $uid; ?> .swiper-button-prev',
							},
				            paginationClickable: true,
				            fadeEffect: {
					            crossFade: true
				            },
							speed: 1000,
							grabCursor: true,
							watchSlidesProgress: true,
							mousewheelControl: true,
							keyboardControl: true,
							//effect: 'fade',  
							breakpoints: {
								768: {
									slidesPerView : <?php echo $client_slider_count_mobile;?>,
						        },
								991: {
									slidesPerView : 3,
						        },
								1200: {
									slidesPerView : <?php echo $client_slider_count;?>,
						        },
							}
							        
				        }
				        $('#section-<?php echo $uid; ?> .swiper-button-next').show();
				        $('#section-<?php echo $uid; ?> .swiper-button-prev').show();
				    } else {
				        options<?php echo $uid; ?> = {
				            loop: false,
				            slidesPerView : <?php echo $client_slider_count;?>,
				            autoplay: false,
				            watchOverflow: true,
				            navigation: false,
				        }
				    }
				    var topSlider<?php echo $uid; ?> = new Swiper('#section-<?php echo $uid; ?> .client-top-<?php echo $uid; ?>', options<?php echo $uid; ?>);								
					
				}); 				
				</script>	
				<?php } ?>							
			
			<?php endif; ?>
			
			<?php 
			if( $client_type == 'grid' ) :				

			if ( $client_slider_count == 1 ) : $c_md_cols = "12";
			elseif ( $client_slider_count == 2 ) : $c_sm_cols = "6"; $c_md_cols = "6";
			elseif ( $client_slider_count == 3 ) : $c_sm_cols = "6"; $c_md_cols = "4";
			elseif ( $client_slider_count == 4 ) : $c_sm_cols = "6"; $c_md_cols = "3";
			elseif ( $client_slider_count == 5 ) : $c_sm_cols = "6"; $c_md_cols = "20"; 
			elseif ( $client_slider_count == 6 ) : $c_sm_cols = "6"; $c_md_cols = "2";
			elseif ( $client_slider_count == 7 ) : $c_sm_cols = "4"; $c_md_cols = "seven"; 
			elseif ( $client_slider_count == 8 ) : $c_sm_cols = "3"; $c_md_cols = "eight";  
			endif;
			if ( $client_slider_count_mobile == 1 ) : $c_xs_cols = "12";
			elseif ( $client_slider_count_mobile == 2 ) : $c_xs_cols = "6";
			elseif ( $client_slider_count_mobile == 3 ) : $c_xs_cols = "4";
			elseif ( $client_slider_count_mobile == 4 ) : $c_xs_cols = "3";
			endif;			
			 ?>

				<?php if( $client_src == 'option' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $uid; ?> row-flex">
					            <?php foreach( $client_slider_image_options as $image ): ?>
					                <div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
						    </div>
						</div>
					</div>
				</div>
				
				<?php } elseif( $client_src == 'from-page' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $uid; ?> row-flex">
					            <?php foreach( $client_slider_image_page as $image ): ?>
					                <div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
						    </div>
						</div>
					</div>
				</div>

				<?php } elseif( $client_src == 'from-page-repeater' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $uid; ?> row-flex">
								<?php $client_item = 1; while ( have_rows('cs_rp') ) : the_row();
								$client_img = get_sub_field('cs_rpi');
								$client_title = get_sub_field('cs_rpt');
								$client_title_color = get_sub_field('cs_rptc');
								$client_subtitle = get_sub_field('cs_rpst');
								$client_link = get_sub_field('cs_rpl');
								$client_link_new = get_sub_field('cs_rpln');
								?>
									<div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
									<?php if( $client_link ){ ?><a href="<?php echo $client_link; ?>"><?php } ?>
										<div class="client_slide_item_inner">
											<div class="client_slide_item_img">
											 <?php echo wp_get_attachment_image( $client_img, $client_slider_size ); ?>
											</div>
											<?php if( $client_title ){ ?>
												<p class="client_title" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_title; ?></p>
											<?php } ?>	
											<?php if( $client_subtitle ) { ?>
												<div class="client_subtitle" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_subtitle; ?></div>
											<?php } ?>
										</div> 
									<?php if( $client_link ){ ?></a><?php } ?>
									</div>
								<?php $client_item++; endwhile; ?>
						    </div>
						</div>
					</div>
				</div>

				<?php } ?>

			<?php endif; ?>
			
			</div>
		</div>
	</section>
</div>
<?php if( $client_slider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>