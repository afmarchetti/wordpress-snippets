<?php

/* ------------------------------------------------------------------------- *
 *    Basic Wordpress Functions.php
/* ------------------------------------------------------------------------- */


  /*  Content Width
  /* ------------------------------------ */
  if ( !isset( $content_width ) ) { $content_width = 720; }


  /*  Theme setup
  /* ------------------------------------ */
  if ( ! function_exists( 'slug_theme_setup' ) ) {

  	function slug_theme_setup() {

      // Enable title tag
  		add_theme_support( "title-tag" );

  		// Enable automatic feed links
  		add_theme_support( 'automatic-feed-links' );

  		// Enable featured image
  		add_theme_support( 'post-thumbnails' );
  		set_post_thumbnail_size( 450, 450 );

  		// Thumbnail sizes
  		add_image_size( 'slug_theme_quad', 600, 600, true );    //(cropped)
  		add_image_size( 'slug_theme_single', 800, 494, true );  //(cropped)
  		add_image_size( 'slug_theme_big', 1400, 865, true ); 	  //(cropped)

  		// Custom menu areas
  		register_nav_menus( array(
  			'header' => esc_html__( 'Header', 'slug_theme' )
  		) );

  		// Load theme languages
  		load_theme_textdomain( 'slug_theme', get_template_directory().'/languages' );

  	}

  }
  add_action( 'after_setup_theme', 'slug_theme_setup' );


  /*  Register sidebars
  /* ------------------------------------ */
  if ( ! function_exists( 'slug_theme_sidebars' ) ) {


  	function slug_theme_sidebars()	{
  		register_sidebar(array( 'name' => esc_html__( 'Primary', 'slug_theme' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'slug_theme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
  	}

  }
  add_action( 'widgets_init', 'slug_theme_sidebars' );


  /*  Enqueue javascript
  /* ------------------------------------ */
  if ( ! function_exists( 'slug_theme_scripts' ) ) {

  	function slug_theme_scripts() {

  		// all script
  		wp_enqueue_script( 'slug_theme-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ),'', true );
  		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }

  	}

  }
  add_action( 'wp_enqueue_scripts', 'slug_theme_scripts' );


  /*  Enqueue css
  /* ------------------------------------ */
  if ( ! function_exists( 'slug_theme_styles' ) ) {

  	function slug_theme_styles() {
  		wp_enqueue_style( 'slug_theme-style', get_template_directory_uri().'/style.css');

  	}

  }
  add_action( 'wp_enqueue_scripts', 'slug_theme_styles' );

?>
