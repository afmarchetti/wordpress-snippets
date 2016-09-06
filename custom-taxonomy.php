<?php

/* ------------------------------------------------------------------------- *
 *   Create CUSTOM TAXONOMY
 *
 *	Change my_service_cpt with the slug name of your post type
 *	Change service_category_tax with the slug name of your taxonomy
 *	Change service-category with your url taxonomy slug
/* ------------------------------------------------------------------------- */

/**
 * Create TAXONOMY
 */

add_action( 'init', 'create_service_category_tax' );
function create_service_category_tax() {

    $labels = array(
			'name'							=> __('Categories', 'language-slug'),
			'singular_name'     => __('Category', 'language-slug'),
			'add_new_item'      => __('Add Category', 'language-slug'),
			'edit_item'         => __('Edit Category', 'language-slug'),
			'new_item_name'     => __('New Category', 'language-slug'),
			'all_items'         => __('All Categories', 'language-slug'),
			'search_items'      => __('Search Category', 'language-slug'),
			'update_item'       => __('Update Category', 'language-slug'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical'  => true,
        'query_var' 	=> true,
        'rewrite' 		=> array('slug' => 'service-category' , 'hierarchical'  => true) //rewrite the tax permalink structure
    );

    register_taxonomy('service_category_tax','my_service_cpt', $args);
}


/**
 * Show taxonomy in backend list post type
 */

add_filter( 'manage_taxonomies_for_my_service_cpt_columns', 'my_service_cpt_type_columns' );
function my_service_cpt_type_columns( $taxonomies ) {
    $taxonomies[] = 'service_category_tax';
    return $taxonomies;
}

?>
