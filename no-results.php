<div class="no-results_col col-xs-12"> 
 <article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h2 class="entry-title no-results-title"><?php _e( 'Not found', 'tkmnineteen' ); ?></h2>
    </header><!-- .entry-header -->
 
    <div class="entry-content no-results-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	        
	        <p><?php printf( __( 'Ready to write your first post? <a href="%1$s">Start here</a>.', 'tkmnineteen' ), admin_url( 'post-new.php' ) ); ?></p>
  
        <?php elseif ( is_search() ) : ?>
        	        
	        <p><?php _e( 'Sorry, No results found for your search. Please try again with new key words.', 'tkmnineteen' ); ?></p>
 
			<div class="no-results-search">  
            <?php get_search_form(); ?>
 
			</div>
 
        <?php else : ?>
        	        
	        <p><?php _e( 'Sorry, the page was not found. Try a new search.', 'tkmnineteen' ); ?></p>
 
			<div class="no-results-search">  
            <?php get_search_form(); ?>
 
			</div>
			
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
</div>