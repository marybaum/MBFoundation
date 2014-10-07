<?php

 /**
  * Template Name: Category
	*
	**/



get_header();

remove_action( 'genesis_loop', 'genesis_do_loop' );

?>


			<div class="row">
  				<ul class="small-block-grid-3 medium-block-grid-3 large-block-grid-3">
    <?php // Query latest blog items

		$include = genesis_get_option( 'blog_cat' );
		$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
		$paged   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		//* Easter Egg
		$query_args = wp_parse_args(
			genesis_get_custom_field( 'query_args' ),
			array(
				'post_type' => 'post',
      	'posts_per_page' => 8,
				'cat'              => $include,
				'category__not_in' => $exclude,
				'showposts'        => genesis_get_option( 'blog_cat_num' ),
				'paged'            => $paged,
			) );


    $blog_query = new WP_Query( $query_args );

    // Start the loop
    if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

      <li class="post">

        <?php
//the_post_thumbnail(); // If you leave the arhument blank and the img css to max-width 100% your images should look at their best (unless you have set the thumbnail to crop to make them square, in that case, leave as is.)
        ?>
        <!--<h5><strong><?php the_title(); // Have you defined h5 strong? Otherwise I'd just stick to h5 and keep the markup as simple as possible. '?></strong></h5>-->
        <a href="<?php the_permalink();?>" title="<?php the_title_attribute()?>" > <?php the_post_thumbnail(); ?> </a>

        <a href="<?php the_permalink();?>" title="<?php the_title_attribute()?>" ><?php genesis_do_post_title();?></a>

				<a href="<?php the_permalink();?>" title="<?php the_title_attribute()?>" > <?php the_excerpt();?> </a>



			</li>

    <?php endwhile;
      // Always reset the loop after you're done with the loop
      //wp_reset_postdata();
   		endif; ?>
  </ul>
</div> <!-- end row -->
</div> <!-- end site-inner -->

<!-- optional row <div class="row">
  <div class="small-12 columns"><!-- all screen sizes inherit from small
    <nav id="nav-posts">
        <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
        <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
    </nav>
  </div>
</div> -->

<?php
genesis();






