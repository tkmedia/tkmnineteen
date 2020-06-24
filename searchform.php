<?php
/**
 * Search form
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<div class="search-form-container searchform">
	<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search-table">	
			<div class="search-button">
		        <button type="submit" id="search-submit">
		        <span class="screen-reader-text"><?php _e('Search', 'tkmnineteen'); ?></span>
		        <?php _e('Search', 'tkmnineteen'); ?>
		        </button>
			</div>
			<div class="search-field">
				<label class="screen-reader-text" for="search-input"><?php _e('Search site', 'tkmnineteen'); ?></label>
		        <input type="search" placeholder="<?php _e('Search site', 'tkmnineteen'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
			</div>
		</div>
	</form>
</div>