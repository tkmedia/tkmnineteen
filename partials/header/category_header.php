<!-- Manual Slider MastHead -->
<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
?>

<div id="page-title" class="masthead-product masthead-product-category" itemprop="text">
	<div class="wf-wrap wrap">
		<div class="yoast_breadcrumb">
			<div class="yoast_breadcrumb_wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
			</div>
		</div>
		<div class="page-title-head hgroup">
            <?php apply_filters( 'woocommerce_show_page_title', true ); ?>
            <h1 class="category_title entry-title"><?php woocommerce_page_title(); ?></h1>
		</div>
	</div>
</div>