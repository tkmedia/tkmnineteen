<!-- Main Var -->
<?php
$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');
$default_masthead_bg_url = wp_get_attachment_image_src($default_masthead_bg, 'full');
$product_masthead_bg =  get_field('product_masthead_bg');
?>
<div id="masthead-product" itemprop="text">	
	<div class="yoast_breadcrumb">
		<div class="yoast_breadcrumb_wrap wrap">
		<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
		</div>
	</div>
</div>