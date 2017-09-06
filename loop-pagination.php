<?php
	/*-----------------------------
	* Custom loop with numeric pagination
	*
	* Based on:
	* http://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
	-----------------------------*/


// Define custom query parameters
$custom_query_args = array(
	'post_type' => 'page',
	'posts_per_page' => 10,
);

// Get current page and append to custom query parameters array
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;

// Output custom query loop
if ( $custom_query->have_posts() ) :
    while ( $custom_query->have_posts() ) :
      $custom_query->the_post();
    	// Loop
    	?>


			<?php the_post_thumbnail('thumbnail', array('class' => '','alt' => get_the_title())); ?>

			<h3><?php the_title(); ?></h3>

			<?php the_content(); ?>


    <?php
    endwhile;
endif;

// Reset postdata
wp_reset_postdata();

	// Pagination with numbers
	echo '<div class="pagination">';

	global $wp_query;

	$big = 999999999; // Need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );

	echo '</div>';

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;

?>
