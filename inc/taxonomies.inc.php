<?php
/**
 * Funzioni per la registrazione delle Tassonomie
 *
 * @package _dl
 */

// Register Custom Taxonomy for versioning
function version_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Versioni', 'Taxonomy General Name', '_dl' ),
		'singular_name'              => _x( 'Versione', 'Taxonomy Singular Name', '_dl' ),
		'menu_name'                  => __( 'Versione', '_dl' ),
		'all_items'                  => __( 'Tutte le versioni', '_dl' ),
		'parent_item'                => __( 'Parent Item', '_dl' ),
		'parent_item_colon'          => __( 'Parent Item:', '_dl' ),
		'new_item_name'              => __( 'Nuova versione', '_dl' ),
		'add_new_item'               => __( 'Aggiungi nuova versione', '_dl' ),
		'edit_item'                  => __( 'Modifica versione', '_dl' ),
		'update_item'                => __( 'Aggiorna versione', '_dl' ),
		'view_item'                  => __( 'Visualizza versione', '_dl' ),
		'separate_items_with_commas' => __( 'Separate items with commas', '_dl' ),
		'add_or_remove_items'        => __( 'Add or remove items', '_dl' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_dl' ),
		'popular_items'              => __( 'Popular Items', '_dl' ),
		'search_items'               => __( 'Search Items', '_dl' ),
		'not_found'                  => __( 'Not Found', '_dl' ),
		'no_terms'                   => __( 'No items', '_dl' ),
		'items_list'                 => __( 'Items list', '_dl' ),
		'items_list_navigation'      => __( 'Items list navigation', '_dl' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
	);
	register_taxonomy( 'version', array( 'post' ), $args );

}
add_action( 'init', 'version_taxonomy', 0 );


// Register Custom Taxonomy Portali
function custom_taxonomy_portali() {

	$labels = array(
		'name'                       => _x( 'Portali', 'Taxonomy General Name', '_dl' ),
		'singular_name'              => _x( 'Portale', 'Taxonomy Singular Name', '_dl' ),
		'menu_name'                  => __( 'Portali', '_dl' ),
		'all_items'                  => __( 'All Items', '_dl' ),
		'parent_item'                => __( 'Parent Item', '_dl' ),
		'parent_item_colon'          => __( 'Parent Item:', '_dl' ),
		'new_item_name'              => __( 'New Item Name', '_dl' ),
		'add_new_item'               => __( 'Add New Item', '_dl' ),
		'edit_item'                  => __( 'Edit Item', '_dl' ),
		'update_item'                => __( 'Update Item', '_dl' ),
		'view_item'                  => __( 'View Item', '_dl' ),
		'separate_items_with_commas' => __( 'Separate items with commas', '_dl' ),
		'add_or_remove_items'        => __( 'Add or remove items', '_dl' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_dl' ),
		'popular_items'              => __( 'Popular Items', '_dl' ),
		'search_items'               => __( 'Search Items', '_dl' ),
		'not_found'                  => __( 'Not Found', '_dl' ),
		'no_terms'                   => __( 'No items', '_dl' ),
		'items_list'                 => __( 'Items list', '_dl' ),
		'items_list_navigation'      => __( 'Items list navigation', '_dl' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'portali', array( 'autori', 'opere' ), $args );

}
add_action( 'init', 'custom_taxonomy_portali', 0 );