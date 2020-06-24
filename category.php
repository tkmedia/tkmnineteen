<?php
    
//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'archive-page';
   return $classes;
}
 ?>

 
<?php get_header(); ?>

<?php get_template_part('partials/header/archive_header_top'); ?>

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
