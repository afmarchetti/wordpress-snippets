<?php

	/*-----------------------------
	* Fetaured Image Url
	*-----------------------------*/

	$image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );

?>

<div style="background: url(<?php echo $image_attributes[0]; ?>) center center; -webkit-background-size: cover; -moz-background-size: cover; background-size: cover; -o-background-size: cover;"></div>
