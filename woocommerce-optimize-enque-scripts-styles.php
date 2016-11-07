<?php
/**
* Optimize WooCommerce Scripts
* Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
*/
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {

	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {

		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

			/* Style */
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce-general' );
			
			/* Script */
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );

		}
	}
} ?>
