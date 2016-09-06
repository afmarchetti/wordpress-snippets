<?php

/* ------------------------------------------------------------------------- *
 *   Create CUSTOM POST TYPE
 *
 *   Change my_service_cpt with the slug name of your post type
/* ------------------------------------------------------------------------- */

add_action('init', 'create_my_service_cpt');

function create_my_service_cpt() {

    $labels = array(
        'name'               => __('Services' , 'language-slug'),
        'singular_name'      => __('Service', 'language-slug'),
        'add_new'            => __('Add Service', 'language-slug'),
        'add_new_item'       => __('Add New Service', 'language-slug'),
        'edit_item'          => __('Edit Service', 'language-slug'),
        'new_item'           => __('New Service', 'language-slug'),
        'all_items'          => __('All Services', 'language-slug'),
        'view_item'          => __('View Service', 'language-slug'),
        'search_items'       => __('Search Service' , 'language-slug'),
        'not_found'          => __('Service Not found', 'language-slug'),
        'not_found_in_trash' => __('Service Not found in the trash', 'language-slug'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'services'),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 22,
        'menu_icon' 		 => 'dashicons-welcome-write-blog',
        'supports'           => array(
                                'title',
                                'editor',
                                'thumbnail',
                                'excerpt',
                                'page-attributes'
                                ),

    );

   register_post_type('my_service_cpt', $args);
}

?>
