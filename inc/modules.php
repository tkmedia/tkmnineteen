<?php
/**
 * Modules
 *
 * @package      tkmnineteen
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Display Modules
 *
 */
function sbs_flex( $post_id = false ) {

	if( ! function_exists( 'get_field' ) )
		return;

	$post_id = $post_id ? intval( $post_id ) : get_the_ID();
	$modules = get_field( 'ea_modules', $post_id );
	if( empty( $modules ) )
		return;

	foreach( $modules as $i => $module )
		ea_module( $module, $i );
}

/**
 * Display Module
 *
 */
function ea_module( $module = array(), $i = false ) {
	if( empty( $module['acf_fc_layout'] ) )
		return;

	ea_module_open( $module, $i );

	switch( $module['acf_fc_layout'] ) {

		case ea_module_disable( $module ):
			break;

		case 'content':
			ea_module_header( $module );
			echo '<div class="entry-content">' . apply_filters( 'ea_the_content', $module['content'] ) . '</div>';
			break;

		// More modules go here
	}

	ea_module_close( $module, $i );
}

/**
 * Module Open
 *
 */
function ea_module_open( $module, $i ) {

	if( ea_module_disable( $module ) )
		return;

	$classes = array( 'module' );
	$classes[] = 'type-' . str_replace( '_', '-', $module['acf_fc_layout'] );
	if( !empty( $module['bg_color'] ) )
		$classes[] = 'bg-' . $module['bg_color'];

	$id = !empty( $module['anchor_id'] ) ? sanitize_title_with_dashes( $module['anchor_id'] ) : 'module-' . ( $i + 1 );

	echo '<section class="' . join( ' ', $classes ) . '" id="' . $id . '">';
	echo '<div class="wrap">';

}

/**
 * Module Header
 *
 */
function ea_module_header( $module ) {

	if( !empty( $module['title'] ) ) {
		echo '<header><h3>' . esc_html( $module['title'] ) . '</h3></header>';
	}
}

/**
 * Module Close
 *
 */
function ea_module_close( $module, $i ) {

	if( ea_module_disable( $module ) )
		return;

	echo '</div>';
	echo '</section>';
}

/**
 * Module Disable
 *
 */
function ea_module_disable( $module ) {
	$disable = false;
	if( 'save_recipes_cta' == $module['acf_fc_layout'] && is_user_logged_in() )
		$disable = true;

	return $disable;
}

/**
 * Has Module
 *
 */
function ea_has_module( $module_to_find = '', $post_id = false ) {
	if( ! function_exists( 'get_field' ) )
		return;

	$post_id = $post_id ? intval( $post_id ) : get_the_ID();
	$modules = get_field( 'ea_modules', $post_id );
	$has_module = false;

	foreach( $modules as $module ) {
		if( $module_to_find == $module['acf_fc_layout'] )
			$has_module = true;
	}

	return $has_module;
}