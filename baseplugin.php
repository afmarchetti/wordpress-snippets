<?php
/*
 * Plugin Name:       Base Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mario Rossi
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       bsp
 * Domain Path:       /languages
 */

/*

RESOURCES

Sintax: https://developer.wordpress.org/plugins/plugin-basics/header-requirements/
Best Practive (Prefix Everything): https://developer.wordpress.org/plugins/plugin-basics/best-practices/
Enque Css and Script: https://developer.wordpress.org/plugins/plugin-basics/determining-plugin-and-content-directories/
Add html hook: https://developer.wordpress.org/reference/hooks/wp_body_open/
Lang funtions: https://developer.wordpress.org/reference/functions/__/

*/

/* Security  */
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Proper way to enqueue scripts and styles
 */
function bsp_include_style_and_scripts() {



    wp_enqueue_style( 'bsp-slider-css',  plugins_url( 'splide.min.css', __FILE__ ));
    wp_enqueue_script( 'bsp-slider-js', plugins_url( 'splide.min.js', __FILE__ ), '', '', true );

	wp_enqueue_style( 'bsp-style', plugins_url( 'style.css', __FILE__ ) );
	wp_enqueue_script( 'bsp-scripts', plugins_url( 'scripts.js', __FILE__ ) , array(), '1.0.0', true );





}
add_action( 'wp_enqueue_scripts', 'bsp_include_style_and_scripts' );


/**
 * Add html to top of the page
 */

function bsp_header_code() {
    echo '<p class="bsp-banner">'. __( 'Contact us now!', 'bsp' ) .'</p>';
}
add_action( 'wp_body_open', 'bsp_header_code' );


/*

HOOKS

Modo per aggiungere o modificare codice all'interno di wordpress in punto definito
es. hooks per aggiungere codice dopo il body, nel footer, hooks per comabiare il titolo delle pagine wordpress

2 tipi di hooks

- actions inseriscono codice in un punto preciso di wordpress https://developer.wordpress.org/plugins/hooks/actions/
- filtri filtrano dati per esempio (titolo o il content) facendo qualcosa https://developer.wordpress.org/plugins/hooks/filters/

*/

/* filter */
function bsp_change_and_link_excerpt( $more ) {

	return $more . ' <a href="' . get_the_permalink() . '">Leggi tutto »</a>';
 }
 add_filter( 'excerpt_more', 'bsp_change_and_link_excerpt', 999 );


/* Action */
function bsp_add_content_footer() {
    echo '<a class="bsp-whatsapp" href="https://api.whatsapp.com/send?phone=393333333333">Scrivici su whatsapp!</a>';
}
add_action( 'wp_footer', 'bsp_add_content_footer' );


/*

SHORTCODE

Mode per inserire codice dentor al content di wordpress in maniera dinamica:  https://developer.wordpress.org/plugins/shortcodes/

Esempio Slider custom, o testo dinamico:

*/


function bsp_mex_natale(){

    $deliver = Date('d.m.y', strtotime('+3 days'));

    return ' 🚚 Ordina oggi e ricevi il <strong>'. $deliver.'</strong>';

}

add_shortcode('mex-natale','bsp_mex_natale');



/* ! Shortcode Slider
------------------------------------------------------------------------- */
function bsp_slider() {


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
    $buffer .= '<a href="'.get_permalink().'" style="background: linear-gradient(to bottom, rgba(0,0,0, .55), rgba(0,0,0, .15)),  url('.$image_attributes[0].') no-repeat center center; background-size: cover">';
    $buffer .= '<h3>'.get_the_title().'</h3>';
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
  add_shortcode('slider', 'bsp_slider');




