<?php

/* ------------------------------------------------------------------------- *
 *    Custom Loop  with WP Query
 *		Docs: https://codex.wordpress.org/Class_Reference/WP_Query
/* ------------------------------------------------------------------------- */

?>
<?php

	/* Wp Query - page + menu order */

	$custom_post = new WP_Query( array(
			'post_type'			=> 'page',
			'posts_per_page'=> 3,
	    'orderby' => 'menu_order',
	    'order' => 'ASC',
	));

	/* Wp Query - page + taxonomy + menu order */

	// $custom_post = new WP_Query( array(
	// 	'post_type'			=> 'page',
	// 	'posts_per_page'=> 3,
	// 	'orderby' => 'menu_order',
	// 	'order' => 'ASC',
	// 	'tax_query' => array(
	// 		array(
	// 			'taxonomy' => 'home_positions',
	// 			'field' => 'slug',
	// 			'terms' => 'top'
	// 		)
	// 	)
	// ));

	/* Wp Query - post + taxonomy */

	// $custom_post = new WP_Query( array(
	// 	'post_type'			=> 'post',
	// 	'tax_query' => array(
	// 		array(
	// 			'taxonomy' => 'people',
	// 			'field'    => 'slug',
	// 			'terms'    => 'bob',
	// 		)
	// 	)
	// ));

	/* Wp Query - post + category */

	// $custom_post = new WP_Query( array(
	// 		'post_type'			=> 'post',
	// 		'category_name' => 'news',
	// 		'posts_per_page'=> 3,
	// ));


  /* Wp Query - sub pages + menu order */
	
	// $this_page_id = $wp_query->post->ID;
	// $custom_post = new WP_Query( array(
	// 	'post_type' => 'page',
	// 	'post_parent' => $this_page_id,
	// 	'posts_per_page' => 100,
	// 	'orderby' => 'menu_order',
	// 	'order' => 'ASC',
	// ));



?>

<?php	if ($custom_post->have_posts()) : while($custom_post->have_posts()) : $custom_post->the_post(); ?>


	<?php the_post_thumbnail('thumbnail', array('class' => '','alt' => get_the_title())); ?>

	<h3><?php the_title(); ?></h3>

	<?php the_content(); ?>


<?php wp_reset_postdata(); ?>
<?php endwhile; endif; ?>
