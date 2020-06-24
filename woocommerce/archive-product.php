<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Main ACF Var
if ( is_product_category() ) {
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
//$category_masthead_bg = get_field( 'product_cat_masthead_bg', $queried_object );

$product_cat_top_title = get_field( 'pc_top_t', 'product_cat_' .$term_id);
$product_cat_top_subtitle = get_field( 'pc_top_st', 'product_cat_' .$term_id);
$pc_top_th = get_field( 'pc_top_th', 'product_cat_' .$term_id);
$pc_top_sth = get_field( 'pc_top_sth', 'product_cat_' .$term_id);
} if ( is_shop() ) {
$shop_pro_title =  get_field('sho_pti', 'option');
$shop_pro_subtitle =  get_field('sho_psti', 'option');
}
	
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>


<div class="wc_category_wrap<?php if ( is_shop() ) { ?> shop_page_content<?php } ?>">

	<div id="category_page_intro">
		<div class="category_page_intro_inner wrap">
			<div class="category_page_intro_row row-flex">

				<?php if ( is_product_category() ) { ?>
					<div class="category_page_intro_col category_page_description_wrap col-xs-12">	
						<div class="cat_intro_col_wrap">
						<?php
							/**
							 * woocommerce_archive_description hook.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
						?>
						</div>
					</div>
									
				<?php } ?>
			</div>
		</div>
	</div>

	<?php if ( woocommerce_product_loop() ) { ?>

		<div id="archive_top" class="clearfix">
			<div class="archive_top wrap">
					
				<div class="archive_catalog_ordering">
				<?php 				
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				?>
				</div>
			</div>
		</div>
	
		<?php	
		woocommerce_product_loop_start(); ?>

		<div id='category_product_container'>
		<?php if ( is_shop() ) { ?>
			<?php if( $shop_pro_title || $shop_pro_subtitle ) { ?>
			<div class="archive_products_top wrap">
				<?php if( $shop_pro_title ) { ?>
				<div class="product_cat_top_title"><?php echo $shop_pro_title; ?></div>
				<?php } ?>
				<?php if( $shop_pro_subtitle ) { ?>
				<div class="product_cat_top_subtitle"><?php echo $shop_pro_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
		<?php } elseif ( is_product_category() ) { ?>
		
			<?php if( $product_cat_top_title || $product_cat_top_subtitle ) { ?>
			<div class="archive_products_top wrap">
				<?php if( $product_cat_top_title ) { ?>
				<<?php echo $pc_top_th; ?> class="product_cat_top_title"><?php echo $product_cat_top_title; ?></<?php echo $pc_top_th; ?>>
				<?php } ?>
				<?php if( $product_cat_top_subtitle ) { ?>
				<<?php echo $pc_top_sth; ?> class="product_cat_top_subtitle"><?php echo $product_cat_top_subtitle; ?></<?php echo $pc_top_sth; ?>>
				<?php } ?>
			</div>
			<?php } ?>
		<?php } ?>
		<?php
		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
	
				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );
	
				wc_get_template_part( 'content', 'product-archive' );
			}
		}
		?>
		</div>
		<?php
		woocommerce_product_loop_end();
	
		/**
		 * Hook: woocommerce_after_shop_loop.
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
	?>	
	<div id="archive_no_products">
		<div class="archive_no_products wrap">
		<?php
		/**
		 * Hook: woocommerce_no_products_found.
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
		?>
		</div>
	</div>
	<?php } ?>

</div><!-- .wc_category_wrap .wrap -->

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
