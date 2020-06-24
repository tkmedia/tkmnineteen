<!-- Main Var -->
<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;

$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');
$default_masthead_bg_url = wp_get_attachment_image_src($default_masthead_bg, 'full');
$category_masthead_bg = get_field('product_cat_masthead_bg', 'product_cat_' .$term_id);

?>
<div id="masthead" itemprop="text">	
	<div id="page_masthead" class="masthead page-top shop_masthead" style="background: url(<?php if ($shop_masthead_bg) { echo $category_masthead_bg['url']; } else { echo $default_masthead_bg_url[0]; }?>) no-repeat 50% 50% #f6f6f6;">	
		
		<div class="page_title_head wrap">
			<div class="page_title_head_row row-flex middle-xs center-xs">
				<div class="masthead_content_container col-xs-12">
					<div class="masthead_content_container_wrap">				
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>	
						<?php $paged = get_query_var('paged');?>
						<?php if ( ! get_query_var('paged')) { ?>
						<h1 class="entry-title masthead_content_title shop_title" itemprop="headline"><?php woocommerce_page_title(); ?></h1>
						<?php } else { ?>
						<h1 class="entry-title masthead_content_title shop_title" itemprop="headline"><?php woocommerce_page_title(); ?><span> <?php _e('Page Number', 'tkmnineteen'); ?> <?php echo $paged; ?></span></h1>
						<?php } ?>						
					<?php endif; ?>
						
						<?php if ( is_product_category() ) { ?>	
						<div class="category_page_description">
							<?php
								/**
								 * woocommerce_archive_description hook.
								 *
								 * @hooked woocommerce_taxonomy_archive_description - 10
								 * @hooked woocommerce_product_archive_description - 10
								 */
								do_action( 'woocommerce_archive_description' );
							?>
						</div><!-- .category_page_description -->
						<?php } ?>						

					</div>
				</div>
			</div>
		</div>
		<div class="yoast_breadcrumb">
			<div class="yoast_breadcrumb_wrap wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
			</div>
		</div>
																						
	</div>
</div>