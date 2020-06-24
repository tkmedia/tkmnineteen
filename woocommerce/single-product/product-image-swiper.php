<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$product_tags = get_field( 'product_tags');
$product_tagi = get_field( 'product_tagi');

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

$items_count            = 1;
$product_images_attrs   = '';


$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>

<div class="product-images images">
	<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
		
		<?php if( $product_tagi ) { ?>
		<div class="product_tag_banner">
			<div class="product_tag_banner_wrap tag_<?php echo esc_attr($product_tagi['value']); ?>">
				<?php if( $product_tagi['value'] == 'sale' ) { ?>
				<span class="product_tags"><?php echo $product_tags; ?>%</span>
				<span><?php _e('Sale', 'tkmnineteen'); ?></span>
				<?php } ?>
				<?php if( $product_tagi['value'] == 'new' ) { ?>
				<span><?php _e('New', 'tkmnineteen'); ?></span>
				<?php } ?>
				<?php if( $product_tagi['value'] == 'popular' ) { ?>
				<span><?php _e('Popular', 'tkmnineteen'); ?></span>
				<?php } ?>
				<?php if( $product_tagi['value'] == 'out_stock' ) { ?>
				<span><?php _e('Out of stock', 'tkmnineteen'); ?></span>
				<?php } ?>

			</div>
		</div>
		<?php } ?>
		
		<?php
		if ( $attachment_ids ) {
		$product_image_classes = 'swiper-slide  img-thumbnail';
		$product_images_classes  = 'swiper-slide img-thumbnail';
		$html = '<div class="swiper-container"><div class="swiper-wrapper">';	
		} else {
		$product_image_classes = 'img-thumbnail';
		$product_images_classes  = 'swiper-slide img-thumbnail';
		$html = '';
		}			
		$attachment_id = method_exists( $product, 'get_image_id' ) ? $product->get_image_id() : get_post_thumbnail_id();
		if ( $attachment_id ) {
			$image_link = wp_get_attachment_url( $attachment_id );
	
			$html .= '<div class="' . esc_attr( $product_image_classes ) . '"><div class="inner">';
			$html .= '<a class="image-zoom" data-fancybox="gallery" href="' . esc_url( $image_link ) . '"><i class="fas fa-search"></i></a>';

			$html .= wp_get_attachment_image(
				$attachment_id, 'product-830',
				false,
				array(
					'href'  => esc_url( $image_link ),
					'class' => 'woocommerce-main-image img-responsive',
					'title' => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				)
			);
			$html .= '</div></div>';
	
		} else {
	
			$image_link = wc_placeholder_img_src( 'woocommerce_single' );
			$html      .= '<div class="' . esc_attr( $product_image_classes ) . '"><div class="inner">';
			$html      .= '<img src="' . esc_url( $image_link ) . '" alt="placeholder" href="' . esc_url( $image_link ) . '" class="woocommerce-main-image img-responsive" />';
			$html      .= '</div></div>';
		}

		if ( $attachment_ids ) {
			foreach ( $attachment_ids as $attachment_id ) {
	
				$image_link = wp_get_attachment_url( $attachment_id );
	
				if ( ! $image_link ) {
					continue;
				}
	
				$html .= '<div class="' . esc_attr( $product_images_classes ) . '"><div class="inner">';
				$html .= '<a class="image-zoom" data-fancybox="gallery" href="' . esc_url( $image_link ) . '"><i class="fas fa-search"></i></a>';
				$size  = 'product-830';
				if ( strpos( $product_images_classes, 'product-image-slider owl-carousel' ) ) {
					$thumb_image = wp_get_attachment_image_src( $attachment_id, $size );
					if ( $thumb_image && is_array( $thumb_image ) && count( $thumb_image ) >= 3 ) {
						//$placeholder = porto_generate_placeholder( $thumb_image[1] . 'x' . $thumb_image[2] );
						$html       .= wp_get_attachment_image(
							$attachment_id,
							$size,
							false,
							array(
								'data-src' => esc_url( $thumb_image[0] ),
								'src'      => esc_url( $placeholder[0] ),
								'href'     => esc_url( $image_link ),
								'class'    => 'img-responsive owl-lazy',
							)
						);
					}
				} else {
					$html .= wp_get_attachment_image(
						$attachment_id,
						$size,
						false,
						array(
							'href'  => esc_url( $image_link ),
							'class' => 'img-responsive',
						)
					);
				}
				$html .= '</div></div>';
	
			}
		
		}
		if ( $attachment_ids ) {
		$html .= '</div></div>';	
					
		$html .= '<div id="js-pagevertical-pro" class="swiper-pagination style1"></div>';
		$html .= '<div id="js-next-pro" class="swiper-button-next"></div>';
		$html .= '<div id="js-prev-pro" class="swiper-button-prev"></div>';
		}
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		//do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div>