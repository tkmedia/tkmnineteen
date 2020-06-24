<!-- Manual Slider MastHead -->
<?php
$slider_effect = get_post_meta( get_the_ID(), 'page_top_slider_effect', true );
$md_bg_r = get_field('md_bg_r');
$md_bg_l = get_field('md_bg_l');
$mh_bg_rotate = get_field('mh_bg_rotate');
$masthead_background_color = get_field('masthead_background_color');
$md_bg_img = get_field('mh_split_bgimg');
$mh_split_bgimg = wp_get_attachment_image_src($md_bg_img, 'full');
$masthead_title = get_field('masthead_title');
$masthead_title_hide = get_field('masthead_title_hide');
$masthead_subtitle = get_field('masthead_subtitle');

$Hex_bg_r = $md_bg_r;
$RGB_bg_r = hex2rgb($Hex_bg_r);
$Final_Rgb_bg_r = implode(", ", $RGB_bg_r);
$Hex_bg_l = $md_bg_l;
$RGB_bg_l = hex2rgb($Hex_bg_l);
$Final_Rgb_bg_l = implode(", ", $RGB_bg_l);

$mh_split_phone = get_field('mh_split_phone','option');
$mh_split_phone_link = get_field('mh_split_phone_link','option');
$mh_form_title = get_field('mh_form_title','option');

$default_split_bg = get_field('default_split_bg','option');
$default_split_bgimg = wp_get_attachment_image_src($default_split_bg, 'full');
$default_split_img = get_field('default_main_masthead_bg','option');
$default_split_imgwp = wp_get_attachment_image_src($default_split_img, 'full');

?>
<style>
	.top-slider-bg.top-slider-bg-multiple {background:<?php echo $masthead_background_color; ?>;}	

	@media (min-width: 992px) {
		
	}
	
	@media (min-width: 992px) {

	}
</style>

<div id="home_masthead" class="masthead_split" itemprop="text">	
	<div class="home_masthead intro-section">	
		<div id="main-top-slider">
			<?php if($mh_split_bgimg) { ?>
			<div class="top-slider-bg top-slider-bg-multiple" style="background-image:url(<?php echo $mh_split_bgimg[0]; ?>)">
			<?php } else { ?>	
			<div class="top-slider-bg top-slider-bg-multiple" style="background-image:url(<?php echo $default_split_bgimg[0]; ?>)">
			<?php } ?>	
			<?php if( $md_bg_r || $md_bg_l) { ?>
			<div class="masthead_bg_overlay" style="background: <?php echo $md_bg_r; ?>;background: -moz-linear-gradient(right, rgba(<?php echo $Final_Rgb_bg_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_bg_l; ?>,1) 100%);background: -webkit-linear-gradient(<?php echo $mh_bg_rotate; ?>deg, rgba(<?php echo $Final_Rgb_bg_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_bg_l; ?>,1) 100%);background: linear-gradient(right, rgba(<?php echo $Final_Rgb_bg_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_bg_l; ?>,1) 100%);"></div>
			<?php } ?>
			    <div id="mh_split_container" class="swiper-container style1 swiper-scale-effect" style="direction: ltr;">
				    <?php if( have_rows('mh_split') ): ?>
				    <div class="slides single-slider swiper-wrapper">

						<?php 
						$split_item = 1; while( have_rows('mh_split') ): the_row(); 
						$mh_split_img = get_sub_field('mh_split_img');
						$mh_split_link_type = get_sub_field('mh_split_link_type');
						$mh_split_vid = get_sub_field('mh_split_vid');
						$mh_split_title = get_sub_field('mh_split_title');
						$mh_split_title_type = get_sub_field('mh_split_title_type');
						$mh_split_subtitle = get_sub_field('mh_split_subtitle');
						$mh_split_text = get_sub_field('mh_split_text');
						$mh_split_flink = get_sub_field('mh_split_flink');
						$mh_split_plink = get_sub_field('mh_split_plink');
						$mh_split_form = get_sub_field('mh_split_form');
						
						if( $mh_split_link_type == 'video_popup' ) {
							$youtube_vid_url = get_sub_field('mh_split_vid', false, false);
							//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
							$oembed = _wp_oembed_get_object();
							//get provider
							$provider = $oembed->get_provider($youtube_vid_url);
							//fetch oembed data as an object
							$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
							$thumbnail = $oembed_data->thumbnail_url;
							$iframe = $oembed_data->html;
							preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
							$youtube_id = $match[1];
						}
						?>
						<!-- Masthead Image slide -->
				        <div class="single-slider-img-item single-slider-item swiper-slide">
					        
			                <div class="single-slider-img swiper-slide-cover" style="direction: rtl;">
				                <div class="mh_split_row row-flex">
					                <div class="mh_split_col mh_split_col_content col-xs-12 col-sm-6" style="background-image:url(<?php echo $mh_split_bgimg[0]; ?>)">
						                <div class="mh_split_col_content_inner">
							                <div class="mh_split_col_content_wrap">
								                <?php if( $mh_split_title ) { ?>
								                <<?php echo $mh_split_title_type; ?> class="mh_split_title"><?php echo $mh_split_title; ?></<?php echo $mh_split_title_type; ?>>
								                <?php } ?>
								                <?php if( $mh_split_subtitle ) { ?>
								                <div class="mh_split_subtitle"><?php echo $mh_split_subtitle; ?></div>
								                <?php } ?>
								                
												<?php if( $mh_split_text ) { ?>
												<div class="mh_split_text section_readmore_link_wrap">
													<?php if( $mh_split_link_type == 'link_page' ): ?>
													<a href="<?php echo $one_col_page_link; ?>">
													<?php endif; ?>	
													<?php if( $mh_split_link_type == 'link_new' ): ?>
													<a href="<?php echo $one_column_link; ?>">
													<?php endif; ?>
													<?php if( $mh_split_link_type == 'link_form' ): ?>					
													<a data-fancybox data-src="#popop-form-<?php echo $split_item; ?>" href="javascript:;">
													<?php endif; ?>
													<?php if( $mh_split_link_type == 'video_popup' ): ?>					
													<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>">
													<?php endif; ?>	
													<button class="section_readmore_link watch_btn hoverLink"><?php echo $mh_split_text; ?></button>
													</a>
												</div>
												<?php } ?>
							                </div>
						                </div>
					                </div>
					                <div class="mh_split_col mh_split_col_img col-xs-12 col-sm-6">
						                <div class="mh_split_col_img_inner">
							                <div class="mh_split_col_img_item">
								                <?php echo wp_get_attachment_image( $mh_split_img, 'full' ); ?>
								                <div class="mh_split_col_img_bor"></div>
							                </div>
						                </div>
					                </div>
				                </div>
			                </div>
				        </div>
						<?php if( $mh_split_link_type == 'link_form' ):
						$popup_contact_title = get_option( 'options_default_flex_form_title' );
						$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
						?>
						<div style="display: none;max-width: 700px;" id="popop-form-<?php echo $split_item;?>" class="button-popop-form">
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
													<?php echo do_shortcode( '[contact-form-7 id="'.$mh_split_form.'" ]' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						
						<?php $split_item++; endwhile; ?>
				    </div>

				    <?php else: ?>
				    
				    <div class="slides single-slider swiper-wrapper">
						<!-- Masthead Image slide -->
				        <div class="single-slider-img-item single-slider-item swiper-slide">
					        
			                <div class="single-slider-img swiper-slide-cover" style="direction: rtl;">
				                <div class="mh_split_row row-flex">
					                <div class="mh_split_col mh_split_col_content col-xs-12 col-sm-6" style="background-image:url(<?php echo $default_split_bgimg[0]; ?>)">
						                <div class="mh_split_col_content_inner">
							                <div class="mh_split_col_content_wrap">
							                
							                <?php if( !$masthead_title_hide ) { ?>
								                <?php if( $masthead_title ) { ?>
								                <<?php echo $mh_split_title_type; ?> class="mh_split_title"><?php echo $masthead_title; ?></<?php echo $mh_split_title_type; ?>>
								                <?php } else { ?>
								                <h1 class="mh_split_title"><?php the_title(); ?></h1>
								                <?php } ?>
							                <?php } ?>
								                <?php if( $masthead_subtitle ) { ?>
								                <div class="mh_split_subtitle"><?php echo $masthead_subtitle; ?></div>
								                <?php } ?>
							                </div>
						                </div>
					                </div>
					                <div class="mh_split_col mh_split_col_img col-xs-12 col-sm-6">
						                <div class="mh_split_col_img_inner">
							                <div class="mh_split_col_img_item">
								                <?php echo wp_get_attachment_image( $default_split_img, 'full' ); ?>
								                <div class="mh_split_col_img_bor"></div>
							                </div>
						                </div>
					                </div>
					                
				                </div>
			                </div>
				        </div>
				    </div>				    
				    
					<?php endif; ?>
			        
			    </div>

			    <!-- Add Arrows -->
			    <div id="js-pagevertical1" class="swiper-pagination-style1"></div>
			    <div id="js-next1" class="swiper-button-next"></div>
			    <div id="js-prev1" class="swiper-button-prev"></div>
			    
			</div>
			
		</div>
	</div>
</div>