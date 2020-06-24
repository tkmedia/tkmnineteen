<?php
/**
 * Base template
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'archive-page index-page';
   return $classes;
}
 ?>

 
<?php get_header(); ?>

<div id="page-title" class="masthead-product" itemprop="text">
	<div class="wf-wrap wrap">
		<div class="yoast_breadcrumb">
			<div class="yoast_breadcrumb_wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
			</div>
		</div>
		<div class="page-title-head hgroup">
			<?php								
			//function tkmnineteen_archive_header() {
				$title = $subtitle = $description = false;
				if( is_home() ) {
					$title = get_the_title( get_option( 'page_for_posts' ) );
				} elseif( is_search() ) {
					$title = 'Search Results for: <em>' . get_search_query() . '</em>';
				} elseif( is_archive() ) {
					$title = get_the_archive_title();
					$description = get_the_archive_description();
				} elseif( ! is_post_type_archive() ) {
					$title = single_cat_title();
				} else {
					$title = post_type_archive_title();
				}
				
				if( empty( $title ) && empty( $description ) )
					return;
				if( get_query_var( 'paged' ) ) {
					global $wp_query;
					$subtitle = __( 'Page ', 'tkmnineteen' ) . get_query_var( 'paged' ) . __( ' of ', 'tkmnineteen') . $wp_query->max_num_pages;
				}
				if( ! empty( $title ) )
					echo '<h1 class="entry-title title_head masthead_content_title archive-title" itemprop="headline">' . $title . '</h1>';
				if( !empty( $subtitle ) )
					echo '<h4>' . $subtitle . '</h4>';
			//}
			//add_action( 'tha_content_while_before', 'tkmnineteen_archive_header' );
			?>								
		</div>
	</div>
</div>
<main id="main_content" role="main">
	<div class="site_overlay"></div>			

	<div id="archive_main_content">
		<div class="page-container">	
			<div class="entry-content" itemprop="text">
	
				<div class="magazine_page_index wrap">
					<div class="magazine_page_grid row-flex articles_grid_item_row center-xs">
						
					    <?php if ( have_posts() ) : ?>
					    
					        <?php while ( have_posts() ) : the_post(); ?>
					        
					            <?php get_template_part( 'content-magazine-grid', get_post_format() ); ?>
					            
					        <?php endwhile; ?>
					        
					</div>
					
					        <?php theme_numeric_posts_nav(); ?>
					        
					    <?php else : ?>
					    
					        <?php get_template_part( 'no-results', 'index' ); ?>
					        
					    <?php endif; ?>
					    
				</div>		                        
	
				<?php //get_template_part('partials/full_thin_form'); ?>
	
			</div><!-- .entry-content -->
		</div><!-- .page-container -->
	</div><!-- #post-## -->	
</main>
	
<?php get_footer(); ?>
