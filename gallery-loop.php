<?php

/* ------------------------------------------------------------------------- *
 *   Custom Loop Gallery
 *
 *   1) add the remove shortcode code in functions.php
 *   2) insert the loop code in page.php or post.php	
/* ------------------------------------------------------------------------- */


	/*  Remove default gallery shortcode from page and post (insert in functions.php) */
	/*
	function remove_gallery($content) {
	  if ( 'page' == get_post_type() || 'post' == get_post_type()) {
	    $content = strip_shortcodes( $content );
	  }
	  return $content;
	}
	add_filter('the_content', 'remove_gallery');
	// Remove gallery from content
add_filter('the_content', 'strip_shortcode_gallery');
function strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
}

	*/
	

	/* Loop */	
	
	$gallery = get_post_gallery( $post->ID, false );

	if($gallery != ''){
	
	$ids = explode( ",", $gallery['ids'] );
	
		/* loop image gallery */
			
		foreach( $ids as $id ) {
		
		$image_url = wp_get_attachment_image_src( $id , 'medium' ); 
		$thumbnail_image = get_posts(array('p' => $id, 'post_type' => 'attachment'));
					
		?>
	
		<div class="gallery-item">
	
			<img src="<?php echo  $image_url[0]; ?>" />
		
			<p><?php echo $thumbnail_image[0]->post_excerpt; ?></p>
			
		</div>
	
	<?php	} /* end foreach */
	
	} /* end if gallery */

?>



