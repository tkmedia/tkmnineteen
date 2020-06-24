<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( is_product_category() ) { ?>
	<div id="subcategory_row" class="product_cat_subrow">
		<div class="products archive_product_row columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
<?php } elseif ( is_shop() ) { 
	$shop_cat_title =  get_field('sho_cti', 'option');
	$shop_cat_subtitle =  get_field('sho_csti', 'option');
?>
	<div id="subcategory_row" class="shop_subrow">
		<div class="products archive_product_loop columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
			<?php if( $shop_cat_title || $shop_cat_subtitle ) { ?>
			<div class="shop_cat_title_wrap wrap">
				<?php if( $shop_cat_title ) { ?>
				<div class="shop_cat_title"><?php echo $shop_cat_title; ?></div>
				<?php } ?>
				<?php if( $shop_cat_subtitle ) { ?>
				<div class="shop_cat_subtitle"><?php echo $shop_cat_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
<?php } else { ?>
	<div class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
<?php } ?>