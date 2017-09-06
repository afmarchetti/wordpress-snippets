<?php

/* ------------------------------------------------------------------------- *
 *    Loop Wordpress
 *		Docs: https://codex.wordpress.org/The_Loop
/* ------------------------------------------------------------------------- */

?>

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

				<?php the_post_thumbnail('thumbnail', array('class' => '','alt' => get_the_title())); ?>

				<h3><?php the_title(); ?></h3>

				<?php the_content(); ?>

	<?php endwhile; ?>

				<div class="pagination clearfix">

					<?php
					global $wp_query;
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );
					?>

				</div>

	<?php else : ?>

				<h3><?php esc_html_e('Sorry, no posts matched your criteria.', 'isbase'); ?></h3>
				<p><?php esc_html_e('Try to make a search...', 'isbase'); ?></p>

	<?php endif; ?>
