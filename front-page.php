<?php
/**
 * Front Page
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'front-page woocommerce';
   return $classes;
}
 ?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="masthead">
<?php 
$page_top_slider_style = get_post_meta( get_the_ID(), 'hmhs_sty', true );	
if( $page_top_slider_style == 'full_slider' ):
	get_template_part('partials/masthead-full' );
endif;
if( $page_top_slider_style == 'no_image_top' ):
	get_template_part('partials/masthead-title' );
endif;	
if( $page_top_slider_style == 'manual_slider' ):
	get_template_part('partials/masthead-full-manual' );
endif;			
if( $page_top_slider_style == 'clean_top' ):
	get_template_part('partials/masthead-clean');
endif;
?>
</div>

<main id="main_content" role="main">
	<div class="site_overlay"></div>			

	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
		<div class="page-container">
			<div class="entry-content" itemprop="text">
	
				<?php get_template_part('partials/flexible-content'); ?>
				
				<?php
				$thecontent = get_the_content();
				if(!empty($thecontent)) { ?>
					<section id="the_content" itemprop="text" class="page_section">
						<div class="page_the_content wrap">	
						<?php the_content(); ?>
						</div>
					</section>
				<?php } ?>
	
				
	
			</div><!-- .entry-content -->
		</div><!-- .page-container -->
	</article><!-- #post-## -->
</main><!-- page content #main_content -->

<?php endwhile; ?><?php endif; ?>
<?php get_footer(); ?>