<?php
	
/* ------------------------------------------------------------------------- *
 *   Create CUSTOM POST TYPE
 *
 *   Change my_service_cpt with the slug name of your post type
/* ------------------------------------------------------------------------- */

add_action('init', 'create_my_service_cpt');

function create_my_service_cpt() {

    $labels = array(
        'name'               => __('Services' , 'fullbase-plugin'),
        'singular_name'      => __('Service', 'fullbase-plugin'),
        'add_new'            => __('Add Service', 'fullbase-plugin'),
        'add_new_item'       => __('Add New Service', 'fullbase-plugin'),
        'edit_item'          => __('Edit Service', 'fullbase-plugin'),
        'new_item'           => __('New Service', 'fullbase-plugin'),
        'all_items'          => __('All Services', 'fullbase-plugin'),
        'view_item'          => __('View Service', 'fullbase-plugin'),
        'search_items'       => __('Search Service' , 'fullbase-plugin'),
        'not_found'          => __('Service Not found', 'fullbase-plugin'),
        'not_found_in_trash' => __('Service Not found in the trash', 'fullbase-plugin'),
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