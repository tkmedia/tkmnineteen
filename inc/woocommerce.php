<?php

/* ---------------------------------------------------------------------------
 * WooCommerce
 * --------------------------------------------------------------------------- */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if ( class_exists( 'Sitepress', false ) ) {
	add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
	function change_existing_currency_symbol( $currency_symbol, $currency ) {
	    switch( $currency ) {
	        case 'ILS':         
	        if(ICL_LANGUAGE_CODE=='he'){        
	        $currency_symbol = '₪'; 
	        }else{
	            $currency_symbol = 'ILS '; 
	        } 
	        break;          
	    }
	    return $currency_symbol;
	}
}
/**
 * Add Title Header to Product Page
 */
add_action('woocommerce_before_main_content', 'page_header_top', 4);
function page_header_top() {
	if ( is_product() ) {
	    get_template_part('partials/header/product_header');
    } 
    if ( is_product_category() ) {
	    get_template_part('partials/header/category_header');
    } 
    if ( is_shop() ) {
	    get_template_part('partials/header/shop_header');
    }
}

//unhook the WooCommerce wrappers:
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//hook in your own functions to display the wrappers your theme requires:
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	echo '<main id="main_content" role="main"><div class="site_overlay"></div><section id="main_wc" class="main_wc clearfix">';
}
function my_theme_wrapper_end() {
	echo '</section></main>';
}

// Minicart Item count
add_action( 'woocommerce_widget_shopping_cart_before_buttons', 'minicart_count_before_content' );
function minicart_count_before_content() {
    $items_count = WC()->cart->get_cart_contents_count();
    $text_label  = _n( 'Item', 'Items', $items_count, 'woocommerce' );
    ?>
        <p class="total item-count"><strong><?php echo $text_label; ?>:</strong> <?php echo $items_count; ?></p>
    <?php
}

// Change number of products displayed per page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 30;
  return $cols;
}

// Ajaxify minicart
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_mini_cart_ajax_refresh' );
function wc_mini_cart_ajax_refresh( $fragments ){
    ## 1. Refreshing mini cart subtotal amount
    $fragments['#mcart-stotal'] = '<span id="mcart-stotal" class="cart-items">'.WC()->cart->get_cart_contents_count().'</span>';

    ## 2. Refreshing cart subtotal
    ob_start();
    echo '<span id="mcart-widget">';
    woocommerce_mini_cart();
    echo '</span>';
    $fragments['#mcart-widget'] = ob_get_clean();

    return $fragments;
}

/**
 * Global WC Actions
 */
// Remove WC Sidebar from all site
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
//Remove WooCommerce results count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
// Remove WC breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Trim zeros in price decimals
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

//Controls the size used in the product grid/catalog for category images.
//'subcategory_archive_thumbnail_size'
//Controls the size used in the product gallery, below to main image, to switch to a different image.
//'woocommerce_gallery_thumbnail_size'
//Controls the size used in the product gallery.
//'woocommerce_gallery_image_size'
//Controls the size used in the product gallery to zoom or view the full size image.
//'woocommerce_gallery_full_size'
/**
 * Controls the size used in the product grid/catalog.
 */
add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
return 'portrait';
} );
add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
return 'menu-100';
} );
add_filter( 'woocommerce_gallery_image_size', function( $size ) {
//return 'product-830';
} );
add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
return 'portrait';
} );

/**
 * Category/Shop Page WC Actions
 */
// Remove SALE badge @ Product Archives
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
// Hide category product count in product archives
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

// Remove Category ordering
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Product Page WC Actions
 */

// Adds single product image gallery support
add_action( 'after_setup_theme', 'wc_tkmnineteen_setup' );
function wc_tkmnineteen_setup() {
    //add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

// Filer WooCommerce Flexslider options - Add Navigation Arrows
add_filter( 'woocommerce_single_product_carousel_options', 'tkm_update_woo_flexslider_options' );
function tkm_update_woo_flexslider_options( $options ) {
    $options['directionNav'] = true;
    return $options;
}

// Remove SALE badge @ Single Product
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Remove single product page inner title - will be added manualy
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Change location of Product meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 26 );

// Change location of Price | Add To Cart
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

//Remove Short Description
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// Remove single product page data tabs
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Remove Tab description heading
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
return '';
}
//add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );

// Variation Price Change location Empty div for variation data
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
//add_action( 'woocommerce_after_variations_form', 'woocommerce_single_variation', 10 );

// Remove Tab description heading - same as above in a diffrent way
//add_filter('woocommerce_product_description_heading', '__return_empty_string');
// Change location of Price | Add To Cart
//remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_single_variation_add_to_cart_button', 15 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	$args['posts_per_page'] = 10;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 10; // 4 related products
	//$args['columns'] = 2; // arranged in 2 columns
	return $args;
}
/**
 * Related products Remove both “Add to cart” and “Read more” Buttons
 */ 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11);

/**
 * Cart Page - split attributes from item name and place them in data
 */
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

/**
 * Billing form - reorder fields
 */
//add_filter( 'woocommerce_checkout_fields', 'tkm_custom_checkout' );
//function tkm_custom_checkout( $checkout_fields ) {
//	$checkout_fields['billing']['billing_email']['priority'] = 4;
//	$checkout_fields['billing']['billing_country']['priority'] = 5;
//	$checkout_fields['billing']['billing_phone']['priority'] = 25;
//	return $checkout_fields;
//}

/**
 * Yith Quick View - change button location
 */
add_action( 'template_redirect', 'move_quick_view_button' );
function move_quick_view_button(){
   if( class_exists( 'YITH_WCQV_Frontend' ) ) {
   remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
   add_action( 'woocommerce_before_shop_loop_item_title', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
   }
}
add_filter( 'pre_option_yith-wcqv-button-label', 'filter_ywcqv_button_label', 10, 2 );
function  filter_ywcqv_button_label( $value, $option ){
    return '';
}