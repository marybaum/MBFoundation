<?php
/***
 *
 * This is the front page for mbfoundation.
 * @author MHB
 * @package  Customizations
 * @subpackage Home
 *
 */

//* Enqueue scripts
/*add_action( 'wp_enqueue_scripts', 'mbf_front_page_enqueue_scripts' );
function mbf_front_page_enqueue_scripts() {

	//* Load scripts only if custom background is being used
	/*if ( ! get_background_image() )
		return;*/

	//* Enqueue Backstretch scripts
	/*wp_enqueue_script( 'mbf-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mbf-backstretch-set', get_bloginfo('stylesheet_directory').'/js/backstretch-set.js' , array( 'jquery', 'mbf-backstretch' ), '1.0.0' );
	wp_localize_script( 'mbf-backstretch-set', 'BackStretchImg', array(
	'src' => get_entry_image() ) );*/

add_action( 'genesis_meta', 'mbfoundation_home_genesis_meta' );

//Add widget support for homepage. If no widgets active, display the default loop.


function mbfoundation_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-bottom-left' ) || is_active_sidebar( 'home-bottom-middle' ) || is_active_sidebar( 'home-bottom-right' ) ) {

		//* Add home body class
		add_filter( 'body_class', 'mbfoundation_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home top widgets
		add_action( 'genesis_after_header', 'mbfoundation_home_top_widgets' );

		//* Add home bottom widgets
		add_action( 'genesis_loop', 'mbfoundation_home_bottom_widgets' );

	}
}

function mbfoundation_body_class( $classes ) {

		$classes[] = 'mbfoundation-home';
		return $classes;

}

function mbfoundation_home_top_widgets() {

	echo '<div class="row">';

	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area"><div class="small-12 columns">
',
		'after'  => '</div></div>',
	) );

echo '</div>';

}

function mbfoundation_home_bottom_widgets() {

	echo '<div class="row">';

genesis_widget_area( 'home-bottom-left', array(
		'before' => '<div class="home-bottom-left widget-area">
										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'home-bottom-middle', array(
		'before' => '<div class="home-bottom-middle widget-area">
										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'home-bottom-right', array(
		'before' => '<div class="home-bottom-right widget-area">

										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

}

genesis();

