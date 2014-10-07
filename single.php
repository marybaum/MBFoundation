<?php

/**
 * Template name: single
 *
 */

 //add foundation markup to loop


add_action('genesis_before_loop', 'mbf_single_before_loop');

function mbf_single_before_loop(){
	echo '<div class="row small-12 medium-8 large-8 large-centered columns">';
}

add_action('genesis_after_loop', 'mbfsingle_after_loop');

function mbfsingle_after_loop (){
	echo "</div></div>";
}

genesis();