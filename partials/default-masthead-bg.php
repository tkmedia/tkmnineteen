<?php
$page_masthead_title = get_field('mhsh_tit');
$page_masthead_bg = get_field('mhsh_bgi');
$page_masthead_bg_url = wp_get_attachment_image_src($page_masthead_bg, 'full');
$default_masthead_bg = get_field('mmh_bg','option');
$default_bgi_url = wp_get_attachment_image_src($default_masthead_bg, 'full');
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<!-- MastHead -->
<div id="default_masthead" itemprop="text">
	<?php if( $page_masthead_bg ) { ?>
	<div class="default_masthead_short intro-section" style="background-image:url(<?php echo $page_masthead_bg_url[0]; ?>)">
	<?php } elseif( $featured_img_url ) { ?>	
	<div class="default_masthead_short intro-section" style="background-image:url(<?php echo $featured_img_url; ?>)">
	<?php } elseif( $default_masthead_bg ) { ?>	
	<div class="default_masthead_short intro-section" style="background-image:url(<?php echo $default_bgi_url[0]; ?>);">
	<?php } ?>	
		<div class="main_slider_image">
			<div class="default_masthead_container">
				<div class="default_masthead_content wrap">
					<h1 class="entry-title masthead_content_title" itemprop="headline">
						<?php if( $page_masthead_title ) { ?>
							<?php echo $page_masthead_title; ?>
						<?php } else { ?>
							<?php the_title(); ?>
						<?php } ?>
					</h1>
					<div class="yoast_breadcrumb_wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>