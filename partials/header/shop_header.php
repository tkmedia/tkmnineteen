<!-- Main Var -->
<?php
//$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');
//$default_masthead_bg_url = wp_get_attachment_image_src($default_masthead_bg, 'full');
//$product_masthead_bg =  get_field('product_masthead_bg');

$shop_main_title =  get_field('sho_mti', 'option');
$shop_main_subtitle =  get_field('sho_msti', 'option');
$shop_main_intro =  get_field('sho_int', 'option');
?>
<div id="page-title" class="masthead-product" itemprop="text">
	<div class="wf-wrap wrap">
		<div class="yoast_breadcrumb">
			<div class="yoast_breadcrumb_wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
			</div>
		</div>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<div class="page-title-head hgroup">
			<h1 class="woocommerce-products-header__title page-title">
				<?php if( $shop_main_title ) { echo $shop_cat_subtitle; } else { woocommerce_page_title(); } ?>
			</h1>
		</div>
		<?php endif; ?>
		
		<?php if( $shop_main_subtitle ) { ?>
		<div class="shop_head_subtitle"><?php echo $shop_main_subtitle; ?></div>
		<?php } ?>
		<?php if( $shop_main_intro ) { ?>
		<div class="shop_head_intro"><?php echo $shop_main_intro; ?></div>
		<?php } ?>
		
	</div>
</div>