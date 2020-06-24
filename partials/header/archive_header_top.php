<div id="page-title" class="masthead-product" itemprop="text">
	<div class="wf-wrap wrap">
		<div class="yoast_breadcrumb">
			<div class="yoast_breadcrumb_wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
			</div>
		</div>
		<div class="page-title-head hgroup">
			<?php $paged = get_query_var('paged');?>
			<?php if ( ! get_query_var('paged')) { ?>
			<h1 class="entry-title title_head product_title" itemprop="headline"><?php if ( ! is_post_type_archive() ) { echo single_cat_title(); } else { echo post_type_archive_title(); } ?></h1>
			<?php } else { ?>
			<h1 class="entry-title title_head product_title" itemprop="headline"><?php if ( ! is_post_type_archive() ) { echo single_cat_title(); } else { echo post_type_archive_title(); } ?><span> <?php _e('Page Number', 'tkmnineteen'); ?> <?php echo $paged; ?></span></h1>
			<?php } ?>						
		</div>
	</div>
</div>