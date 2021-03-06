<?php
/**
 * Header functions.
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
 * @link http://www.tkmedia.co.il
**/

/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'tkmnineteen_setup' ) )
{

	function tkmnineteen_setup() {
		
		if( false ) add_editor_style( '/css/style-login.css' );
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		//add_theme_support( 'menus' );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );
		
		// Enable support for post thumbnails and featured images.
		add_theme_support( 'post-thumbnails' );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		// Enable support for wide Gutenberg images.
		add_theme_support( 'align-wide' );
		
		// Enable support for Gutenberg Backend Styles.
		add_theme_support('editor-styles');
		
		// Admin Bar Styling
		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

		//Set the content width in pixels, based on the theme's design and stylesheet.
		$GLOBALS['content_width'] = apply_filters( 'tkmnineteen_content_width', 1200 );
	 		
		// Switch default core markup for search form, comment form, and comments
		// to output valid HTML5.
		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	
		// Body open hook
		add_theme_support( 'body-open' );
		
		// Add support for custom navigation menus.
		register_nav_menus( array(
		    'primary'   => __( 'Primary menu', 'tkmnineteen' ),
		    'footer-nav-1'    => __( 'Footer nav 1', 'tkmnineteen' ),
		    'footer-nav-2'    => __( 'Footer nav 2', 'tkmnineteen' ),
		    'footer-nav-3'    => __( 'Footer nav 3', 'tkmnineteen' ),
		    'panel-nav-right'    => __( 'Top panel nav right', 'tkmnineteen' ),
		    'panel-nav-left'    => __( 'Top panel nav left', 'tkmnineteen' ),
		    'primary-split-right'    => __( 'Primary split right', 'tkmnineteen' ),
		    'primary-split-left'    => __( 'Primary split left', 'tkmnineteen' ),
		    'panel-nav'    => __( 'Top panel nav', 'tkmnineteen' )
		) );
		
		add_theme_support('custom-logo');
		$defaults = array(
		    'height'      => 100,
		    'width'       => 400,
		    'flex-height' => true,
		    'flex-width'  => true,
		    'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
		
		// Add support for background color and images
		add_theme_support( 'custom-background', array(
			'default-color' => 'fff',
		) );

		// Gutenberg
	
		// -- Responsive embeds
		add_theme_support( 'responsive-embeds' );
	
		// -- Wide Images
		add_theme_support( 'align-wide' );
	
		// -- Disable custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );
	
		// -- Editor Font Styles
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => __( 'small', 'tkmnineteen' ),
				'shortName' => __( 'S', 'tkmnineteen' ),
				'size'      => 12,
				'slug'      => 'small'
			),
			array(
				'name'      => __( 'regular', 'tkmnineteen' ),
				'shortName' => __( 'M', 'tkmnineteen' ),
				'size'      => 16,
				'slug'      => 'regular'
			),
			array(
				'name'      => __( 'large', 'tkmnineteen' ),
				'shortName' => __( 'L', 'tkmnineteen' ),
				'size'      => 20,
				'slug'      => 'large'
			),
		) );

		// -- Disable Custom Colors
		//add_theme_support( 'disable-custom-colors' );
	
		// -- Editor Color Palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Blue', 'tkmnineteen' ),
				'slug'  => 'blue',
				'color'	=> '#59BACC',
			),
			array(
				'name'  => __( 'Green', 'tkmnineteen' ),
				'slug'  => 'green',
				'color' => '#58AD69',
			),
			array(
				'name'  => __( 'Orange', 'tkmnineteen' ),
				'slug'  => 'orange',
				'color' => '#FFBC49',
			),
			array(
				'name'	=> __( 'Red', 'tkmnineteen' ),
				'slug'	=> 'red',
				'color'	=> '#E2574C',
			),
		) );
		      			
	}

}
add_action( 'after_setup_theme', 'tkmnineteen_setup' );

/* ---------------------------------------------------------------------------
 * Styles
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkmnineteen_styles' ) )
{
	function tkmnineteen_styles()
	{
		// wp_enqueue_style ------------------------------------------------------
		//wp_enqueue_style( 'tkm-google-fonts', 'https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap&subset=hebrew', false ); 
		wp_enqueue_style( 'tkm-google-fonts', 'https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&display=swap&subset=hebrew', false ); 
		wp_enqueue_style( 'plugins', get_template_directory_uri() .'/assets/css/plugins.css', false );
		//wp_enqueue_style( 'fontello-embedded', get_template_directory_uri() .'/assets/css/fontello-embedded.css', false );
		//wp_enqueue_style( 'fa5-all', get_template_directory_uri() .'/assets/css/fa5-all.min.css', false );
		//wp_enqueue_style( 'v4-shims', get_template_directory_uri() .'/assets/css/v4-shims.min.css', false );
		wp_enqueue_style( 'global', get_template_directory_uri() .'/assets/css/global.css', false );
		wp_enqueue_style( 'aos', get_template_directory_uri() .'/assets/css/aos.css', false );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() .'/assets/css/jquery.fancybox.min.css', false );
		wp_enqueue_style( 'elements', get_template_directory_uri() .'/assets/css/elements.css', false );
		wp_enqueue_style( 'main-style', get_template_directory_uri() .'/assets/css/main.css', false );

		if ( class_exists( 'Sitepress', false ) ) { 
			if ( !is_rtl() ) {		
				wp_enqueue_style( 'style-ltr', get_template_directory_uri() .'/assets/css/main-ltr.css', false );
			}
		} 		

	}
}
add_action( 'wp_enqueue_scripts', 'tkmnineteen_styles' );

//ENQUEUE BACKEND RESOURCES
function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/style-login.css', false );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );


/* ---------------------------------------------------------------------------
 * Scripts
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkmnineteen_scripts' ) )
{
	function tkmnineteen_scripts()
	{
		// Custom ----------------------------------
		//wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/939e569026.js', array(), '', true );
		wp_enqueue_script( 'plugins', get_template_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'gmapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD6FEYaLhW3OhWJhHovx0BK3MAxtkGSAMw&language=he', array(), true );
		wp_enqueue_script( 'acfmaps', get_template_directory_uri() . '/assets/js/acfmaps.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'simpleParallax', get_template_directory_uri() . '/assets/js/simpleParallax.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', array( 'jquery' ), '', true );

		// Main config -----------------------------
		wp_enqueue_script( 'functionality', get_template_directory_uri() .'/assets/js/functionality.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'essentials', get_template_directory_uri() .'/assets/js/essentials.js', array( 'jquery' ), null, true );
		
		if ( class_exists( 'Sitepress', false ) ) { 
			if ( !is_rtl() ) {		
				wp_enqueue_script( 'main-ltr', get_template_directory_uri() .'/assets/js/main-ltr.js', array( 'jquery' ), null, true );
			} else {
				wp_enqueue_script( 'main', get_template_directory_uri() .'/assets/js/main.js', array( 'jquery' ), null, true );
			}	
		} else {
			wp_enqueue_script( 'main', get_template_directory_uri() .'/assets/js/main.js', array( 'jquery' ), null, true );
		}	
		
	}
}
add_action( 'wp_enqueue_scripts', 'tkmnineteen_scripts' );

//wp_script_add_data( 'fontawesome', array( 'crossorigin' ) , array( 'anonymous' ) );

function fontawesome_add_defer_attribute($tag, $handle) {
	if ( 'fontawesome' !== $handle )
	return $tag;
	return str_replace( ' src', ' defer src', $tag );
}
add_filter('script_loader_tag', 'fontawesome_add_defer_attribute', 10, 2);

/* ---------------------------------------------------------------------------
 * Template Hierarchy
 * --------------------------------------------------------------------------- */
function tkmnineteen_template_hierarchy( $template ) {

	//if( is_home() || is_search() )
	if( is_home() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'tkmnineteen_template_hierarchy' );
