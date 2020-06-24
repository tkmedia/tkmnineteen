<!-- Method MastHead -->
<?php
$mmh_bg_image = get_post_meta( get_the_ID(), 'mmh_bgim', true );
$mmh_bg_image_mobile = get_post_meta( get_the_ID(), 'mmh_bgimm', true );
$mmh_bg_image_url = wp_get_attachment_image_src($mmh_bg_image, 'full');
$mmh_bg_title = get_post_meta( get_the_ID(), 'mmh_title', true );
$mmh_hide_title = get_post_meta( get_the_ID(), 'mmh_hidet', true );
$mmh_con_side = get_post_meta( get_the_ID(), 'mmh_consi', true );
$mmh_con_icon = get_post_meta( get_the_ID(), 'mmh_icon', true );
$mmh_con_subtitle = get_post_meta( get_the_ID(), 'mmh_sub', true );
$mmh_con_intro = get_post_meta( get_the_ID(), 'mmh_int', true );
$mmh_btn = get_post_meta( get_the_ID(), 'mmh_btn', true );
$mmh_btn_type = get_post_meta( get_the_ID(), 'mmh_btnty', true );
$mmh_btn_vid = get_post_meta( get_the_ID(), 'mmh_vid', true );
$mmh_btn_form = get_post_meta( get_the_ID(), 'mmh_form', true );
$mmh_btn_page = get_post_meta( get_the_ID(), 'mmh_page', true );
$mmh_btn_link = get_post_meta( get_the_ID(), 'mmh_link', true );

$youtube_vid_url = get_field('mmh_vid', false, false);
//Get vid id - option 1
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
if (isset($match[1]))
$youtube_id = $match[1];

//Get vid id - option 2
$parsedURL = parse_url($youtube_vid_url);
if (isset($parsedURL['query']))
$vidQuery = $parsedURL['query'];
$vidID = str_replace('v=','',$vidQuery);

?>



<div id="method_masthead" class="" itemprop="text">

	<?php if ( wp_is_mobile() ) { ?>
	<div class="method_masthead metod_masthead_mobile">
		<div class="method_masthead_image">
			<?php echo wp_get_attachment_image( $mmh_bg_image_mobile, 'full' ); ?>
		</div>	
		
		<div class="method_masthead_content con_<?php echo $mmh_con_side; ?>">
			<div class="method_masthead_row row-flex">
				
				<div class="method_masthead_col metod_masthead_main col-xs-12 col-sm-6">
					<div class="method_masthead_main_inner">
						<?php if( $mmh_bg_image_mobile ) { ?>
						<div class="mmh_con_icon"><?php echo wp_get_attachment_image( $mmh_con_icon, 'full' ); ?></div>
						<?php } ?>	
						<h1 class="entry-title method_masthead_title" itemprop="headline">
							<?php if( $mmh_bg_title ) { ?>
								<?php echo $mmh_bg_title; ?>
							<?php } else { ?>
								<?php the_title(); ?>
							<?php } ?>
						</h1>
						<?php if( $mmh_con_subtitle ) { ?>
						<div class="mmh_con_subtitle"><?php echo $mmh_con_subtitle; ?></div>
						<?php } ?>
						<?php if ( !is_front_page() ) { ?>
						<div class="yoast_breadcrumb breadcrumb_content_in_slider">
							<div class="yoast_breadcrumb_wrap">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
							</div>
						</div>
						<?php } ?>							
						<?php if( $mmh_con_intro ) { ?>
						<div class="mmh_con_intro"><?php echo $mmh_con_intro; ?></div>
						<?php } ?>	
						<?php if( $mmh_btn ) { ?>
						<div class="method_masthead_main_btn section_btn popup_btn section_readmore_link_wrap">
							<?php if( $mmh_btn_type == 'page' ): ?>
							<a href="<?php echo $mmh_btn_page; ?>" class="">
							<?php endif; ?>	
							<?php if( $mmh_btn_type == 'link' || $mmh_btn_type == 'link_new' ): ?>
							<a href="<?php echo $mmh_btn_link; ?>" class=""<?php if( $mmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
							<?php endif; ?>
							<?php if( $mmh_btn_type == 'form' ): ?>					
							<a data-fancybox data-src="#popop-mmh" href="javascript:;">
							<?php endif; ?>
							<?php if( $mmh_btn_type == 'video' ): ?>					
							<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
							<?php endif; ?>
								<button class="section_readmore_link watch_btn hoverLink"><?php echo $mmh_btn; ?></button>
							</a>
						</div>	
						
						<?php if( $mmh_btn_type == 'form' && $mmh_btn ):
						?>
						<div style="display: none;max-width: 500px;" id="popop-mmh" class="popop-feature button-popop-form">
							<div class="button-popop-form-wrap">
								<div class="button-popop-form-row">
									<div class="button-popop-form-col form-image col-xs-12">
										<?php if( $form_title ) { ?>
										<div class="contact-title">
											<div class="popup_contact_title"><?php echo $form_title; ?></div>
										</div>
										<?php } ?>
										<?php if( $form_subtitle ) { ?>
										<div class="contact-title">
											<div class="popup_contact_subtext"><?php echo $form_subtitle; ?></div>
										</div>
										<?php } ?>
										<div class="contact-form-page">
											<div class="full_form_id">
												<div class="full_form_id_wrap">
													<?php echo do_shortcode( '[contact-form-7 id="'.$mmh_btn_form.'" ]' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php } ?>
						
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	
	<?php } else { ?>
			
	<div class="method_masthead metod_masthead_desktop" style="background-image:url(<?php echo $mmh_bg_image_url[0]; ?>);">
		
		<div class="method_masthead_content con_<?php echo $mmh_con_side; ?>">
			<div class="method_masthead_row row-flex">
				
				<div class="method_masthead_col metod_masthead_main col-xs-12 col-sm-6">
					<div class="method_masthead_main_inner">
						<?php if( $mmh_con_icon ) { ?>
						<div class="mmh_con_icon"><?php echo wp_get_attachment_image( $mmh_con_icon, 'full' ); ?></div>
						<?php } ?>	
						<h1 class="entry-title method_masthead_title" itemprop="headline">
							<?php if( $mmh_bg_title ) { ?>
								<?php echo $mmh_bg_title; ?>
							<?php } else { ?>
								<?php the_title(); ?>
							<?php } ?>
						</h1>
						<?php if( $mmh_con_subtitle ) { ?>
						<div class="mmh_con_subtitle"><?php echo $mmh_con_subtitle; ?></div>
						<?php } ?>
						<?php if ( !is_front_page() ) { ?>
						<div class="yoast_breadcrumb breadcrumb_content_in_slider">
							<div class="yoast_breadcrumb_wrap">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
							</div>
						</div>
						<?php } ?>							
						<?php if( $mmh_con_intro ) { ?>
						<div class="mmh_con_intro"><?php echo $mmh_con_intro; ?></div>
						<?php } ?>	
						<?php if( $mmh_btn ) { ?>
						<div class="method_masthead_main_btn section_btn popup_btn section_readmore_link_wrap">
							<?php if( $mmh_btn_type == 'page' ): ?>
							<a href="<?php echo $mmh_btn_page; ?>" class="">
							<?php endif; ?>	
							<?php if( $mmh_btn_type == 'link' || $mmh_btn_type == 'link_new' ): ?>
							<a href="<?php echo $feature_btn_link; ?>" class=""<?php if( $mmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
							<?php endif; ?>
							<?php if( $mmh_btn_type == 'form' ): ?>					
							<a data-fancybox data-src="#popop-mmh" href="javascript:;">
							<?php endif; ?>
							<?php if( $mmh_btn_type == 'video' ): ?>					
							<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
							<?php endif; ?>
								<button class="section_readmore_link watch_btn hoverLink"><?php echo $mmh_btn; ?></button>
							</a>
						</div>	
						
						<?php if( $mmh_btn_type == 'form' && $mmh_btn ):
						//$form_title = get_sub_field('ffs_fti');
						//$form_subtitle = get_sub_field('ffs_fsut');
						?>
						<div style="display: none;max-width: 500px;" id="popop-mmh" class="popop-feature button-popop-form">
							<div class="button-popop-form-wrap">
								<div class="button-popop-form-row">
									<div class="button-popop-form-col form-image col-xs-12">
										<?php if( $form_title ) { ?>
										<div class="contact-title">
											<div class="popup_contact_title"><?php echo $form_title; ?></div>
										</div>
										<?php } ?>
										<?php if( $form_subtitle ) { ?>
										<div class="contact-title">
											<div class="popup_contact_subtext"><?php echo $form_subtitle; ?></div>
										</div>
										<?php } ?>
										<div class="contact-form-page">
											<div class="full_form_id">
												<div class="full_form_id_wrap">
													<?php echo do_shortcode( '[contact-form-7 id="'.$mmh_btn_form.'" ]' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						
						<?php } ?>


					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	<?php } ?>
	
	<div class="method_masthead_boxes">
		<div class="mmh_boxes_row">
		    <div class="mmh_boxes_wrap wrap">
				<?php 
				$mmh_boxes_rows = 0;
				$mmh_box = get_sub_field('mmh_box');
				if (is_array($mmh_box)) {
				  $mmh_boxes_rows = count($mmh_box);
				}
				?>						    
				<div class="mmh_boxes_items item_count_<?php echo $mmh_boxes_rows; ?>">
				<?php if( have_rows('mmh_box') ): ?>
					<div class="mmh_boxes_items_wrap">
					<?php $mmh_box_item = 1;while( have_rows('mmh_box') ): the_row(); 
						$mmh_micon = get_sub_field('mmh_mico');
						$mmh_mtitile = get_sub_field('mmh_mti');
						$mmh_mlink = get_sub_field('mmh_mli');
						$mmh_mbgcolor = get_sub_field('mmh_mbgc');
						?>
						<div class="mmh_boxes_item box<?php echo $mmh_box_item; ?>">
						<?php if( $mmh_mlink ) { ?><a href="<?php echo $mmh_mlink; ?>"><?php } ?>
							<div class="mmh_boxes_item_wrap" style="background:<?php echo $mmh_mbgcolor; ?>;">
							
								<?php if( $mmh_micon ) { ?>
								<div class="mmh_micon">
									<figure>
									<?php echo wp_get_attachment_image( $mmh_micon, 'full' ); ?>
									</figure>
								</div>
								<?php } ?>
								<?php if( $mmh_mtitile ) { ?>
								<div class="mmh_mtitile_wrap">
									<div class="mmh_mtitile"><?php echo $mmh_mtitile; ?></div>
								</div>
								<?php } ?>
							
							</div>
						<?php if( $mmh_mlink ) { ?></a><?php } ?>
						</div>
						
					<?php $mmh_box_item++; endwhile; ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
		<script>					
		jQuery(function($) {
			if ($('.method_masthead_boxes .mmh_boxes_item').length > 1) {
				$(".mmh_boxes_items_wrap").slick({
					centerMode: true,
					centerPadding: '0px',
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: 5,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: false,
					autoplaySpeed: 6000,
					arrows: false,
					dots: false,
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 3,
				        centerPadding: '30px',
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 1,
				        centerPadding: '40px',
				      }
				    }
					]
				});
				
			}
	
		}); 
		</script>					
	
	
</div>
  