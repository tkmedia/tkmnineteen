<?php
$default_masthead_bg = get_field('mmh_bg','option');
$default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' );
?>
<script>
jQuery(function($) {
	var mhc_header = $('.site:not(.header-side) #header-container').outerHeight(),
	mhc_height = $('.site.header_float:not(.header-side).sticky-fixed.header_float.masthead_clean_top #masthead .slide-inner');	
	mhc_height.css('padding-top', mhc_header);
});	
</script>
<div id="clean_masthead" itemprop="text">
	<div class="slide-inner masthead_img_slider" style="background-image:url(<?php echo $default_masthead_bg_url[0]; ?>);">
		<div class="page-title" itemprop="text">
			<div class="wf-wrap wrap">
				<div class="page-title-head hgroup">
					<h1 class="entry-title masthead_content_title main_slider_title <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" itemprop="headline">
						<?php the_title(); ?>
					</h1>
				</div>
				<div class="yoast_breadcrumb">
					<div class="yoast_breadcrumb_wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>