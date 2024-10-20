<?php
/**
 * Jetpack Compatibility File.
 */

/**
 * Jetpack setup function.
 */
function stsblogfeedly_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'main',
		'render'    => 'stsblogfeedly_infinite_scroll_render',
		'footer'    => 'page'
	) );
}
add_action( 'after_setup_theme', 'stsblogfeedly_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function stsblogfeedly_infinite_scroll_render() {
	while ( have_posts() ) :
		the_post();
		if ( is_search() || is_author() ) :
			get_template_part( 'content', 'list' );
		else:
			get_template_part( 'content' );
		endif;
	endwhile;
}
