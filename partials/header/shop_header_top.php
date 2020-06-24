<!-- Main Var -->
<?php
$shop_masthead_bg =  get_field('shop_masthead_bg', 'option');
$shop_masthead_bgimg = wp_get_attachment_image_src($shop_masthead_bg, 'full');
$default_split_bg = get_field('default_split_bg','option');
$default_split_bgimg = wp_get_attachment_image_src($default_split_bg, 'full');

$shop_main_title =  get_field('shop_main_title', 'option');
$shop_main_subtitle =  get_field('shop_main_subtitle', 'option');
$shop_intro =  get_field('shop_intro', 'option');
?>

<div class="yoast_breadcrumb">
	<div class="yoast_breadcrumb_wrap wrap">
	<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
	</div>
</div>

<div id="home_masthead" class="masthead_split mh_inner_page" itemprop="text">	
	<div class="home_masthead intro-section">	
		<div id="main-top-slider">
			<div class="top-slider-bg top-slider-bg-multiple" style="background-image:url(<?php echo $default_split_bgimg[0]; ?>)">
				<div id="mh_split_container" class="swiper-container style1 swiper-scale-effect" style="direction: ltr;">
					<div class="slides single-slider swiper-wrapper">
						
						<!-- Masthead Image slide -->
				        <div class="single-slider-img-item single-slider-item swiper-slide">
					        
			                <div class="single-slider-img swiper-slide-cover" style="direction: rtl;">
				                <div class="mh_split_row row-flex">
					                <div class="mh_split_col mh_split_col_content col-xs-12 col-sm-6" style="background-image:url(<?php echo $default_split_bgimg[0]; ?>)">
						                <div class="mh_split_col_content_inner">
							                <div class="mh_split_col_content_wrap">
												<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>	
													<?php $paged = get_query_var('paged');?>
													<?php if ( ! get_query_var('paged')) { ?>
													<h1 class="mh_split_title shop_title" itemprop="headline"><?php if( $shop_main_title ) { echo $shop_main_title; } else { woocommerce_page_title(); } ?></h1>
													<?php } else { ?>
													<h1 class="mh_split_title shop_title" itemprop="headline"><?php if( $shop_main_title ) { echo $shop_main_title; } else { woocommerce_page_title(); } ?><span> <?php _e('Page Number', 'tkmnineteen'); ?> <?php echo $paged; ?></span></h1>
													<?php } ?>						
												<?php endif; ?>
												
								                <?php if( $shop_main_subtitle ) { ?>
								                <div class="mh_split_subtitle"><?php echo $shop_main_subtitle; ?></div>
								                <?php } ?>
								                
							                </div>
						                </div>
					                </div>
					                
					                <div class="mh_split_col mh_split_col_img col-xs-12 col-sm-6">
						                <div class="mh_split_col_img_inner">
							                <div class="mh_split_col_img_item">
								                <?php echo wp_get_attachment_image( $shop_masthead_bg, 'full' ); ?>
								                <div class="mh_split_col_img_bor"></div>
							                </div>
						                </div>
					                </div>

				                </div>
			                </div>
				        </div>
				        
					
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>

<?php if( $shop_intro ) { ?>
<div class="shop_intro">
	<div class="shop_intro_wrap wrap">
		<div class="shop_intro_content"><?php echo $shop_intro; ?></div>
	</div>
</div>
<?php } ?>

