<!-- MastHead -->
<?php
$hmh_title = get_post_meta( get_the_ID(), 'hmh_title', true );
$hmh_mimg = get_post_meta( get_the_ID(), 'hmh_mimg', true );
$hmh_int = get_post_meta( get_the_ID(), 'hmh_int', true );

$hmh_btn = get_post_meta( get_the_ID(), 'hmh_btn', true );
$hmh_btn_type = get_post_meta( get_the_ID(), 'hmh_btnty', true );
$hmh_btn_vid = get_post_meta( get_the_ID(), 'hmh_vid', true );
$hmh_btn_form = get_post_meta( get_the_ID(), 'hmh_form', true );
$hmh_btn_page = get_post_meta( get_the_ID(), 'hmh_page', true );
$hmh_btn_link = get_post_meta( get_the_ID(), 'hmh_link', true );

if( $hmh_btn_type == 'video' ):
	$youtube_vid_url = get_field('hmh_vid', false, false);
	//Get vid id - option 1
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
	if (isset($match[1]))
	$youtube_id = $match[1];
	//Get vid id - option 2
	$parsedURL = parse_url($youtube_vid_url);
	if (isset($parsedURL['query']))
	$vidQuery = $parsedURL['query'];
	$vidID = str_replace('v=','',$vidQuery);
endif;

$sideslider_title = get_post_meta( get_the_ID(), 'hmhs_title', true );
$sideslider_btn = get_post_meta( get_the_ID(), 'hmhs_btn', true );
$sideslider_btnlk = get_post_meta( get_the_ID(), 'hmhs_btnl', true );
?>

<?php if ( wp_is_mobile() ) { ?>
<div id="home_masthead" class="home_masthead_mobile" itemprop="text">	
	<div class="home_masthead intro-section">
		
		
			<div class="home_masthead_content">
				<div class="home_masthead_row row-flex">
					
					<div class="home_masthead_col home_masthead_main col-xs-12 col-sm-6">
						<div class="home_masthead_main_inner">
							<h1 class="entry-title home_masthead_title" itemprop="headline">
								<?php if( $hmh_title ) { ?>
									<?php echo $hmh_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<div class="home_masthead_main_image">
								<div class="home_masthead_over masthead_glasses" style="display: none;"></div>
								<?php echo wp_get_attachment_image( $hmh_mimg, 'block-300' ); ?>
							</div>
							<div class="home_masthead_main_text"><?php echo $hmh_int; ?></div>
							<?php if( $hmh_btn ) { ?>
							<div class="home_masthead_main_btn">
								<div class="section_btn popup_btn section_readmore_link_wrap">
									<?php if( $hmh_btn_type == 'page' ): ?>
									<a href="<?php echo $hmh_btn_page; ?>" class="">
									<?php endif; ?>	
									<?php if( $hmh_btn_type == 'link' || $hmh_btn_type == 'link_new' ): ?>
									<a href="<?php echo $hmh_btn_link; ?>" class=""<?php if( $hmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'form' ): ?>					
									<a data-fancybox data-src="#popop-mmh" href="javascript:;">
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'video' ): ?>					
									<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
									<?php endif; ?>
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $hmh_btn; ?></button>
									</a>
								</div>
							</div>
							
								<?php if( $hmh_btn_type == 'form' && $hmh_btn ):
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
															<?php echo do_shortcode( '[contact-form-7 id="'.$hmh_btn_form.'" ]' ); ?>
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
					
					<div class="home_masthead_col home_side_slider col-xs-12 col-sm-6">
						<div class="home_side_slider_inner">
							<div class="home_side_slider_title"><?php echo $sideslider_title; ?></div>
							
							<?php if( have_rows('hmhs_slider') ): ?>
							<div class="home_side_slider">
								<?php while( have_rows('hmhs_slider') ): the_row(); 
								$hmh_sicon = get_sub_field('hmhs_sico');
								$hmh_stitle = get_sub_field('hmhs_sti');
								$hmh_sstitle = get_sub_field('hmhs_ssti');
								?>

								<div class="home_side_slider_item">
									<div class="side_slider_image"><?php echo wp_get_attachment_image( $hmh_sicon, 'menu-100' ); ?></div>
									<div class="side_slider_title"><?php echo $hmh_stitle; ?></div>
									<div class="side_slider_text"><?php echo $hmh_sstitle; ?></div>
								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>

							<div class="side_slider_btn">
								<div class="section_btn popup_btn section_readmore_link_wrap">
									<a href="<?php echo $sideslider_btnlk; ?>">
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $sideslider_btn; ?> </button>
									</a>
								</div>										
							</div>
							
						</div>
					</div>
				
				</div>
			</div>						
		
	</div>
</div>

<?php } else { ?>

<div id="home_masthead" class="home_masthead_desktop" itemprop="text">	
	<div class="home_masthead intro-section">
		
		<div class="home_masthead_over masthead_glasses" style="display: none;"></div>
		
			<div class="home_masthead_content">
				<div class="home_masthead_row row-flex">
					
					<div class="home_masthead_col home_masthead_main col-xs-12 col-sm-6">
						<div class="home_masthead_main_inner">
							<h1 class="entry-title home_masthead_title" itemprop="headline">
								<?php if( $hmh_title ) { ?>
									<?php echo $hmh_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<div class="home_masthead_main_image"><?php echo wp_get_attachment_image( $hmh_mimg, 'menu-100' ); ?></div>
							<div class="home_masthead_main_text"><?php echo $hmh_int; ?></div>
							<?php if( $hmh_btn ) { ?>
							<div class="home_masthead_main_btn">
								<div class="section_btn popup_btn section_readmore_link_wrap">
									<?php if( $hmh_btn_type == 'page' ): ?>
									<a href="<?php echo $hmh_btn_page; ?>" class="">
									<?php endif; ?>	
									<?php if( $hmh_btn_type == 'link' || $hmh_btn_type == 'link_new' ): ?>
									<a href="<?php echo $hmh_btn_link; ?>" class=""<?php if( $hmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'form' ): ?>					
									<a data-fancybox data-src="#popop-mmh" href="javascript:;">
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'video' ): ?>					
									<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
									<?php endif; ?>
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $hmh_btn; ?></button>
									</a>
								</div>
							</div>
							
								<?php if( $hmh_btn_type == 'form' && $hmh_btn ):
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
															<?php echo do_shortcode( '[contact-form-7 id="'.$hmh_btn_form.'" ]' ); ?>
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
					
					<div class="home_masthead_col home_side_slider col-xs-12 col-sm-6">
						<div class="home_side_slider_inner">
							<div class="home_side_slider_title"><?php echo $sideslider_title; ?></div>
							
							<?php if( have_rows('hmhs_slider') ): ?>
							<div class="home_side_slider">
								<?php while( have_rows('hmhs_slider') ): the_row(); 
								$hmh_sicon = get_sub_field('hmhs_sico');
								$hmh_stitle = get_sub_field('hmhs_sti');
								$hmh_sstitle = get_sub_field('hmhs_ssti');
								?>

								<div class="home_side_slider_item">
									<div class="side_slider_image"><?php echo wp_get_attachment_image( $hmh_sicon, 'menu-100' ); ?></div>
									<div class="side_slider_title"><?php echo $hmh_stitle; ?></div>
									<div class="side_slider_text"><?php echo $hmh_sstitle; ?></div>
								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>

							<div class="side_slider_btn">
								<div class="section_btn popup_btn section_readmore_link_wrap">
									<a href="<?php echo $sideslider_btnlk; ?>">
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $sideslider_btn; ?> </button>
									</a>
								</div>										
							</div>
							
						</div>
					</div>
				
				</div>
			</div>
						
		</div>
		
	</div>
</div>
<?php } ?>

<script>
jQuery(function($) {

	// Auto Padding content top
	$(window).load(function(){
		get_header_height();
	    //function to get current div height
	    function get_header_height(){
	        //var footer_height = $('#footer_container').height();
	        var header_height = $('.header_wrapper').outerHeight();
	        topSlider = $("#home_masthead #top-slider .slides");
	        topSliderImg = $("#home_masthead #top-slider .single-slider-img");
	        topSlider.css('height', "calc(100vh - " + header_height + "px)");
	        topSliderImg.css('height', "calc(100vh - " + header_height + "px)");
	        $('.masthead_content.top-xs .masthead_content_container').css('padding-top', header_height);
	        $('.slider_content_bottom #main-top-slider').css('padding-top', header_height);
	         
	    }
    });	

});
</script>   