<?php

/**
 * Template name: page
 *
 */

 //add foundation markup to loop


add_action('genesis_before_loop', 'mbfsinglesingle_before_loop');

function mbfsinglesingle_before_loop(){
	echo '<div class="row large-8 columns">';
}


add_action('genesis_after_loop', 'mbfsingle_after_loop');

function mbfsingle_after_loop (){
	echo "</div></div>";
}

 genesis();
