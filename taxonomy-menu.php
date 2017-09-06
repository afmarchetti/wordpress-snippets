<?php

/* ------------------------------------------------------------------------- *
 *   Menu Taxonomy
 *
 *   remove XXX add tax slug 
/* ------------------------------------------------------------------------- */

?>

<ul class="tax-menu">
	<?php 
	    $args = array(
			'title_li'           => __( '' ),
			'show_option_none'   => __( '' ),
			'taxonomy'           => 'XXX',
	    );
	    wp_list_categories( $args ); 
	?>
</ul>



