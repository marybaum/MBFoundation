<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'MB Foundation', 'mbfoundation' ) );
define( 'CHILD_THEME_URL', '/localhost/foundation' );
define( 'CHILD_THEME_VERSION', '0.1.0' );


//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Reposition the breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Force full-width-content layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

	// Add Foundation JS
	wp_enqueue_script( 'mbfoundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), '1', true );

	//Foundation Init JS
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation/js/foundation.js', array( 'jquery' ), '1', true );

	function mbfoundation_enqueue_style(){

//register typography
wp_register_style( 'mbfoundation-arquitecta', get_stylesheet_directory_uri() . '/type/arquitecta/arquitecta.css', array(), '2' );

wp_register_style( 'mbfoundation-baskerville', get_stylesheet_directory_uri() . '/type/baskerville/baskerville.css', array(), '2' );

wp_register_style( 'mbfoundation-poller', get_stylesheet_directory_uri() . '/type/poller/pollerone.css', array(), '2' );

//Add Foundation CSS
	//wp_register_style( 'foundation-normalize', get_stylesheet_directory_uri() . '/foundation/css/normalize.css' );

	wp_register_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css' );

	wp_enqueue_style( 'mbfoundation-arquitecta' );
	wp_enqueue_style( 'mbfoundation-baskerville' );
	wp_enqueue_style( 'mbfoundation-poller' );
	wp_enqueue_style( 'foundation' );

}
add_action( 'wp_enqueue_scripts', 'mbfoundation_enqueue_style' );

/** Add custom body class to the head */
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
    if ( is_category( '10' ))
    $classes[] = 'slides';
    return $classes;
}


//* Modify the Genesis content limit read more link
add_filter( 'get_the_content_more_link', 'mbf_read_more_link' );
function mbf_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">Keep Reading ...</a>';
}

//* Customize search form input box text
add_filter( 'genesis_search_text', 'mbfoundation_search_text' );
function mbfoundation_search_text( $text ) {
	return esc_attr( 'Search.' );
}


//* Enqueue site-wide scripts
add_action( 'wp_enqueue_scripts', 'custom_load_scripts' );
function custom_load_scripts() {

	wp_enqueue_style( 'dashicons' );

	//wp_enqueue_script( 'header-fade', get_bloginfo( 'stylesheet_directory' ) . '/js/header-fade.js', array( 'jquery' ), '1.0.0', true );

}

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'mbf_load_scripts_styles' );
function mbf_load_scripts_styles() {

	wp_enqueue_script( 'mbf-effects', get_bloginfo( 'stylesheet_directory' ) . '/js/effects.js', array( 'jquery' ), '1.0.0' );

	if ( is_singular( array( 'post', 'page' ) ) && has_post_thumbnail() ) {

	  wp_enqueue_script( 'mbf-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'mbf-backstretch-set', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch-set.js' , array( 'jquery', 'mbf-backstretch' ), '1.0.0', true );

	}

}

//* Localize backstretch script
add_action( 'genesis_after_entry', 'mbf_set_background_image' );
function mbf_set_background_image() {

	$image = array( 'src' => has_post_thumbnail() ? genesis_get_image( array( 'format' => 'url' ) ) : '' );

	wp_localize_script( 'mbf-backstretch-set', 'BackStretchImg', $image );

}

//* Add body class if no featured image
add_filter( 'body_class', 'mbf_featured_img_body_class' );
function mbf_featured_img_body_class( $classes ) {

	if ( is_singular( array( 'post', 'page' ) ) && ! has_post_thumbnail() ) {
		$classes[] = 'no-featured-image';
	}
	return $classes;

}

//* Hook entry background area
add_action( 'genesis_after_header', 'mbf_entry_background' );
function mbf_entry_background() {

	if ( is_singular( 'post' ) || ( is_singular( 'page' ) && has_post_thumbnail() ) ) {

		echo '<div class="entry-background">' . '<h2>' . genesis_do_post_title() .  '</h2>' . '</div>';

	}

}

//* Add support for image sizes
add_image_size( 'giant', 1500, 600, true );
add_image_size( 'medium', 750, 0, false );
add_image_size( 'square' , 600, 600, true );
add_image_size( 'small' , 300, 300, TRUE );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Widgeted areas

genesis_register_sidebar( array(
  'id'          => 'home-top',
  'name'        => __( 'Home - Top', 'mbfoundation' ),
  'description' => __( 'This is the top section of the homepage.', 'mbfoundation' ),
  'before_title'=> __( '<h4>', 'mbfoundation'),
  'after_title' => __( '</h4>', 'mbfoundation'),
) );
genesis_register_sidebar( array(
  'id'          => 'home-bottom-left',
  'name'        => __( 'Home - bottom-left', 'mbfoundation' ),
  'description' => __( 'This is the bottom-left section of the homepage.', 'mbfoundation' ),
  'before_title'=> __( '<h4>', 'mbfoundation'),
  'after_title' => __( '</h4>', 'mbfoundation'),
) );
genesis_register_sidebar( array(
  'id'          => 'home-bottom-middle',
  'name'        => __( 'Home - bottom-middle', 'mbfoundation' ),
  'description' => __( 'This is the bottom-middle section of the homepage.', 'mbfoundation' ),
  'before_title'=> __( '<h4>', 'mbfoundation'),
  'after_title' => __( '</h4>', 'mbfoundation'),
) );
genesis_register_sidebar( array(
  'id'          => 'home-bottom-right',
  'name'        => __( 'Home - bottom-right', 'mbfoundation' ),
  'description' => __( 'This is the bottom-right section of the homepage.', 'mbfoundation' ),
  'before_title'=> __( '<h4>', 'mbfoundation'),
  'after_title' => __( '</h4>', 'mbfoundation'),
) );