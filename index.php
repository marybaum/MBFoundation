<?php

 /**
  * Template Name: Index
  * @author MHB
  * @package  Customizations
	*
	**/




//add foundation markup to loop


add_action('genesis_before_loop', 'mbf_before_loop');

function mbf_before_loop(){
	echo '<div class="row">
				<ul class="small-12 medium-12 large-block-grid-3">';
}

add_action('genesis_before_entry', 'mbf_before_entry');

function mbf_before_entry(){
	echo '<li class="post">';
}

add_action('genesis_after_entry', 'mbf_after_entry');

function mbf_after_entry(){
	echo "</li>";
}

add_action('genesis_after_loop', 'mbf_after_loop');

function mbf_after_loop (){
	echo "</ul></div>";
}

//* Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'mbf_post_info_filter' );
function mbf_post_info_filter($post_info) {
	$post_info = '[post_edit]';
	return $post_info;
}

//* Remove the entry meta in the entry footer (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );



genesis();













