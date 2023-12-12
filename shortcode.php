<?php

/* ! Insert Slider Splide Files (https://splidejs.com/)
------------------------------------------------------------------------- */
function custom_styles_and_scripts() {

  wp_enqueue_style( 'custom-slider', get_template_directory_uri().'/css/splide.min.css');

  wp_enqueue_script( 'custom-slider', get_template_directory_uri() . 'js/splide.min.js', '', '', true );
  wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . 'js/scripts.js',  '', '', true );


}

add_action( 'wp_enqueue_scripts', 'custom_styles_and_scripts' );


/* ! Shortcode Slider
------------------------------------------------------------------------- */
function nakedbase_slider_shortcode() {


  $custom_loop = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page'=> 6,
  ));


  $buffer = '<div class="splide">';
  $buffer .= '<div class="splide__track">';
  $buffer .= '<ul class="splide__list">';

  //loop
  if ($custom_loop->have_posts()) : while($custom_loop->have_posts()) : $custom_loop->the_post();

  $image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' );

  $buffer .= '<li class="splide__slide">';
  $buffer .= '<a href="'.get_permalink().'" style="background: url('.$image_attributes[0].') no-repeat center center; background-size: cover">';
  $buffer .= '<div class="splide__text"> <h3 class="mt-1 c-white">'.get_the_title().'</h3> <span>'. get_the_excerpt().'</span> <strong>Guarda il video</strong> </div>';
  $buffer .= '</a>';
  $buffer .= '</li>';

  wp_reset_postdata();endwhile; endif;
  //end loop

  $buffer .= '</ul>';
  $buffer .= '</div>';
  $buffer .= '</div>';

  return $buffer;


}
// register shortcode
add_shortcode('slider', 'custom_slider_shortcode');
