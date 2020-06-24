<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$product_title = get_field( 'product_title');
$product_subtitle = get_field( 'product_subtitle');

?>
<div class="split-title product_split_title" style="text-align:right;font-size:32px;display: inline-block;">
<?php if( $product_title ) { ?>
<h1 class="product_title entry-title"><?php echo $product_title; ?></h1>
<?php } else { the_title( '<h1 class="product_title entry-title">', '</h1>' ); }?>
<?php if( $product_subtitle ) { ?>
<span class="title_last" style="background:;color:;"><?php echo $product_subtitle; ?></span>
<?php } ?>
</div>