<?php
/**
 * Funzioni per la registrazione dei Custom Post Type
 *
 * @package _dl
 */

// Register Custom Post Type Autori
function custom_post_type_autori() {

	$labels = array(
		'name'                  => _x( 'Autori', 'Post Type General Name', '_dl' ),
		'singular_name'         => _x( 'Autore', 'Post Type Singular Name', '_dl' ),
		'menu_name'             => __( 'Autori', '_dl' ),
		'name_admin_bar'        => __( 'Autori', '_dl' ),
		'archives'              => __( 'Item Archives', '_dl' ),
		'attributes'            => __( 'Item Attributes', '_dl' ),
		'parent_item_colon'     => __( 'Parent Item:', '_dl' ),
		'all_items'             => __( 'All Items', '_dl' ),
		'add_new_item'          => __( 'Add New Item', '_dl' ),
		'add_new'               => __( 'Add New', '_dl' ),
		'new_item'              => __( 'New Item', '_dl' ),
		'edit_item'             => __( 'Edit Item', '_dl' ),
		'update_item'           => __( 'Update Item', '_dl' ),
		'view_item'             => __( 'View Item', '_dl' ),
		'view_items'            => __( 'View Items', '_dl' ),
		'search_items'          => __( 'Search Item', '_dl' ),
		'not_found'             => __( 'Not found', '_dl' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_dl' ),
		'featured_image'        => __( 'Featured Image', '_dl' ),
		'set_featured_image'    => __( 'Set featured image', '_dl' ),
		'remove_featured_image' => __( 'Remove featured image', '_dl' ),
		'use_featured_image'    => __( 'Use as featured image', '_dl' ),
		'insert_into_item'      => __( 'Insert into item', '_dl' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_dl' ),
		'items_list'            => __( 'Items list', '_dl' ),
		'items_list_navigation' => __( 'Items list navigation', '_dl' ),
		'filter_items_list'     => __( 'Filter items list', '_dl' ),
	);
	$args = array(
		'label'                 => __( 'Autore', '_dl' ),
		'description'           => __( 'Lista degli autori caricati', '_dl' ),
		'labels'                => $labels,
		'supports'              => array( 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true, // Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable). 'true' - Implies exclude_from_search: false, publicly_queryable: true, show_in_nav_menus: true, and show_ui:true. The built-in types attachment, page, and post are similar to this.
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 60, // The position in the menu order the post type should appear. show_in_menu must be true. 60 - below first separator
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'autori', $args );

}
add_action( 'init', 'custom_post_type_autori', 0 );