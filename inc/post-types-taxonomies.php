<?php
/**
 * Custom post types and taxonomies.
 *
 * @package Marzeotti_Portfolio
 */

/**
 * Registers Talk custom post type.
 */
function mzp_register_talk_post_type() {

	$labels = array(
		'name'                  => _x( 'Talks', 'Post Type General Name', 'marzeotti-portfolio' ),
		'singular_name'         => _x( 'Talk', 'Post Type Singular Name', 'marzeotti-portfolio' ),
		'menu_name'             => __( 'Talks', 'marzeotti-portfolio' ),
		'name_admin_bar'        => __( 'Talks', 'marzeotti-portfolio' ),
		'archives'              => __( 'Talk Archives', 'marzeotti-portfolio' ),
		'attributes'            => __( 'Talk Attributes', 'marzeotti-portfolio' ),
		'parent_item_colon'     => __( 'Parent Talk:', 'marzeotti-portfolio' ),
		'all_items'             => __( 'All Talk', 'marzeotti-portfolio' ),
		'add_new_item'          => __( 'Add New Talk', 'marzeotti-portfolio' ),
		'add_new'               => __( 'Add New', 'marzeotti-portfolio' ),
		'new_item'              => __( 'New Talk', 'marzeotti-portfolio' ),
		'edit_item'             => __( 'Edit Talk', 'marzeotti-portfolio' ),
		'update_item'           => __( 'Update Talk', 'marzeotti-portfolio' ),
		'view_item'             => __( 'View Talk', 'marzeotti-portfolio' ),
		'view_items'            => __( 'View Talks', 'marzeotti-portfolio' ),
		'search_items'          => __( 'Search Talk', 'marzeotti-portfolio' ),
		'not_found'             => __( 'Not found', 'marzeotti-portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'marzeotti-portfolio' ),
		'featured_image'        => __( 'Featured Image', 'marzeotti-portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'marzeotti-portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'marzeotti-portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'marzeotti-portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'marzeotti-portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'marzeotti-portfolio' ),
		'items_list'            => __( 'Talks list', 'marzeotti-portfolio' ),
		'items_list_navigation' => __( 'Talks list navigation', 'marzeotti-portfolio' ),
		'filter_items_list'     => __( 'Filter items list', 'marzeotti-portfolio' ),
	);
	$args   = array(
		'label'                 => __( 'Talk', 'marzeotti-portfolio' ),
		'description'           => __( 'Talks I\'ve given.', 'marzeotti-portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array(
			'slug'       => 'talks',
			'with_front' => false,
		),
	);
	register_post_type( 'talk', $args );

}
add_action( 'init', 'mzp_register_talk_post_type', 0 );

/**
 * Registers Work custom post type.
 */
function mzp_register_work_post_type() {

	$labels = array(
		'name'                  => _x( 'Work', 'Post Type General Name', 'marzeotti-portfolio' ),
		'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'marzeotti-portfolio' ),
		'menu_name'             => __( 'Work', 'marzeotti-portfolio' ),
		'name_admin_bar'        => __( 'Work', 'marzeotti-portfolio' ),
		'archives'              => __( 'Work Archives', 'marzeotti-portfolio' ),
		'attributes'            => __( 'Work Attributes', 'marzeotti-portfolio' ),
		'parent_item_colon'     => __( 'Parent Work:', 'marzeotti-portfolio' ),
		'all_items'             => __( 'All Work', 'marzeotti-portfolio' ),
		'add_new_item'          => __( 'Add New Work', 'marzeotti-portfolio' ),
		'add_new'               => __( 'Add New', 'marzeotti-portfolio' ),
		'new_item'              => __( 'New Work', 'marzeotti-portfolio' ),
		'edit_item'             => __( 'Edit Work', 'marzeotti-portfolio' ),
		'update_item'           => __( 'Update Work', 'marzeotti-portfolio' ),
		'view_item'             => __( 'View Work', 'marzeotti-portfolio' ),
		'view_items'            => __( 'View Work', 'marzeotti-portfolio' ),
		'search_items'          => __( 'Search Work', 'marzeotti-portfolio' ),
		'not_found'             => __( 'Not found', 'marzeotti-portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'marzeotti-portfolio' ),
		'featured_image'        => __( 'Featured Image', 'marzeotti-portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'marzeotti-portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'marzeotti-portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'marzeotti-portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'marzeotti-portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'marzeotti-portfolio' ),
		'items_list'            => __( 'Work list', 'marzeotti-portfolio' ),
		'items_list_navigation' => __( 'Work list navigation', 'marzeotti-portfolio' ),
		'filter_items_list'     => __( 'Filter items list', 'marzeotti-portfolio' ),
	);
	$args   = array(
		'label'                 => __( 'Work', 'marzeotti-portfolio' ),
		'description'           => __( 'Work I\'ve done.', 'marzeotti-portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array(
			'slug'       => 'work',
			'with_front' => false,
		),
	);
	register_post_type( 'work', $args );

}
add_action( 'init', 'mzp_register_work_post_type', 0 );

/**
 * Registers Modal custom post type.
 */
function mzp_register_modal_post_type() {

	$labels = array(
		'name'                  => _x( 'Modals', 'Post Type General Name', 'marzeotti-portfolio' ),
		'singular_name'         => _x( 'Modal', 'Post Type Singular Name', 'marzeotti-portfolio' ),
		'menu_name'             => __( 'Modals', 'marzeotti-portfolio' ),
		'name_admin_bar'        => __( 'Modals', 'marzeotti-portfolio' ),
		'archives'              => __( 'Modal Archives', 'marzeotti-portfolio' ),
		'attributes'            => __( 'Modal Attributes', 'marzeotti-portfolio' ),
		'parent_item_colon'     => __( 'Parent Modal:', 'marzeotti-portfolio' ),
		'all_items'             => __( 'All Modal', 'marzeotti-portfolio' ),
		'add_new_item'          => __( 'Add New Modal', 'marzeotti-portfolio' ),
		'add_new'               => __( 'Add New', 'marzeotti-portfolio' ),
		'new_item'              => __( 'New Modal', 'marzeotti-portfolio' ),
		'edit_item'             => __( 'Edit Modal', 'marzeotti-portfolio' ),
		'update_item'           => __( 'Update Modal', 'marzeotti-portfolio' ),
		'view_item'             => __( 'View Modal', 'marzeotti-portfolio' ),
		'view_items'            => __( 'View Modals', 'marzeotti-portfolio' ),
		'search_items'          => __( 'Search Modal', 'marzeotti-portfolio' ),
		'not_found'             => __( 'Not found', 'marzeotti-portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'marzeotti-portfolio' ),
		'featured_image'        => __( 'Featured Image', 'marzeotti-portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'marzeotti-portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'marzeotti-portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'marzeotti-portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'marzeotti-portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'marzeotti-portfolio' ),
		'items_list'            => __( 'Modals list', 'marzeotti-portfolio' ),
		'items_list_navigation' => __( 'Modals list navigation', 'marzeotti-portfolio' ),
		'filter_items_list'     => __( 'Filter items list', 'marzeotti-portfolio' ),
	);
	$args   = array(
		'label'                 => __( 'Modal', 'marzeotti-portfolio' ),
		'description'           => __( 'Modals.', 'marzeotti-portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'modal', $args );

}
add_action( 'init', 'mzp_register_modal_post_type', 0 );

/**
 * Registers Agency custom taxonomy.
 */
function mzp_register_agency_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Agencies', 'Taxonomy General Name', 'marzeotti-portfolio' ),
		'singular_name'              => _x( 'Agency', 'Taxonomy Singular Name', 'marzeotti-portfolio' ),
		'menu_name'                  => __( 'Agency', 'marzeotti-portfolio' ),
		'all_items'                  => __( 'All Agencies', 'marzeotti-portfolio' ),
		'parent_item'                => __( 'Parent Agency', 'marzeotti-portfolio' ),
		'parent_item_colon'          => __( 'Parent Agency:', 'marzeotti-portfolio' ),
		'new_item_name'              => __( 'New Agency Name', 'marzeotti-portfolio' ),
		'add_new_item'               => __( 'Add New Agency', 'marzeotti-portfolio' ),
		'edit_item'                  => __( 'Edit Agency', 'marzeotti-portfolio' ),
		'update_item'                => __( 'Update Agency', 'marzeotti-portfolio' ),
		'view_item'                  => __( 'View Agency', 'marzeotti-portfolio' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'marzeotti-portfolio' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'marzeotti-portfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'marzeotti-portfolio' ),
		'popular_items'              => __( 'Popular Agencies', 'marzeotti-portfolio' ),
		'search_items'               => __( 'Search Agencies', 'marzeotti-portfolio' ),
		'not_found'                  => __( 'Not Found', 'marzeotti-portfolio' ),
		'no_terms'                   => __( 'No items', 'marzeotti-portfolio' ),
		'items_list'                 => __( 'Agencies list', 'marzeotti-portfolio' ),
		'items_list_navigation'      => __( 'Agencies list navigation', 'marzeotti-portfolio' ),
	);
	$args   = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'agency', array( 'work' ), $args );

}
add_action( 'init', 'mzp_register_agency_taxonomy', 0 );
