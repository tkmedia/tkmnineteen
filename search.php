<?php
   
//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'default_page flex_page search-page';
   return $classes;
}
?>

<?php get_header(); ?>
<div id="masthead">
	<div id="page-title" class="masthead-title" itemprop="text">
		<div class="wf-wrap wrap">
			<div class="yoast_breadcrumb">
				<div class="yoast_breadcrumb_wrap">
				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
				</div>
			</div>
			<div class="page-title-head hgroup">
				
				<h1 class="entry-title" itemprop="headline">
				<?php								
				$title = __('Search Results for:', 'tkmnineteen'). ' <em>' . get_search_query() . '</em>';
				if( ! empty( $title ) )
					echo $title;
				?>
				<?php								
				if( get_query_var( 'paged' ) ) {
					global $wp_query;
					$paged = get_query_var('paged');
					$maxpaged = $wp_query->max_num_pages;
				?>
					<span><?php _e('Page ', 'tkmnineteen'); echo $paged; _e(' of ', 'tkmnineteen'); echo $maxpaged; ?></span>
				<?php } ?>
					
				</h1>
				
			</div>
		</div>
	</div>
</div>

<main id="main_content" role="main">
	<div class="site_overlay"></div>			

	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
		<div class="page-container">	
			<div class="entry-content" itemprop="text">
				
				<!-- Page Main Content -->
				<div class="page-main-content">
				
					<div class="search_page_index wrap">
						<div class="search_page_grid">
							
						    <?php if ( have_posts() ) : ?>
						    
						        <?php while ( have_posts() ) : the_post(); ?>
						        
									<div class="search_page_item">
										<div class="search_page_item_container">
											
											<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to page %s', 'tkmnineteen' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
												<div class="search_page_item_row row-flex">
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="search_page_item_img col-xs-12 col-sm-4">
													<?php echo get_the_post_thumbnail($post->ID, 'article-400'); ?>
													</div>
													<?php } ?>
													<div class="search_page_item_inner col-xs-12 col-sm-8">
														<div class="search_grid_item_text">	
															<h3 itemprop="name" class="magazine_grid_item_title"><?php the_title(); ?></h3>
															<div class="search_item_intro"><?php echo custom_field_excerpt(); ?></div>
														
															<div class="readmore btn_wrap search_item_btn">
																<button class="btn_readmore main_btn arrow_btn"><?php _e( 'Read More', 'tkmnineteen' ); ?> <span class="screen-reader-text" data-echo="על <?= get_the_title($post->ID); ?>"></span></button>
															</div>
														</div>
													</div>
												</div>
											</a>
												
										</div>
									</div>
						            
						        <?php endwhile; ?>
						        
						</div>
						
						        <?php theme_numeric_posts_nav(); ?>
						        
						    <?php else : ?>
						    
						        <?php get_template_part( 'no-results', 'index' ); ?>
						        
						    <?php endif; ?>
						    
					</div>                        
				</div>
							
			</div><!-- .entry-content -->
		</div><!-- .page-container -->
	</article><!-- #post-## -->	
</main><!-- page content #main_content -->
	
<?php get_footer(); ?> 