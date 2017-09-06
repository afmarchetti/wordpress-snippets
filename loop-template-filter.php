<?php

/* ------------------------------------------------------------------------- *
 *    Custom Loop with Pages that have specific template set
 *
 *   change "my-custom-template.php" whit your template
/* ------------------------------------------------------------------------- */

?>
<?php

	$template_pages = new WP_Query( array(
		'post_type'			=> 'page',
		'no_found_rows' 	=> true,
		'post_status'   	=> 'publish',
		'orderby' => 'menu_order',
	  'order' => 'ASC',
		'posts_per_page' 	=> 3,
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'my-custom-template.php',
            )
        )
	) );	?>

<?php	if ($template_pages->have_posts()) : while($template_pages->have_posts()) : $template_pages->the_post(); ?>


	<?php the_post_thumbnail('thumbnail', array('class' => '','alt' => get_the_title())); ?>

	<h3><?php the_title(); ?></h3>

	<?php the_content(); ?>

<?php endwhile; endif; ?>
