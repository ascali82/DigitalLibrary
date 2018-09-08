<?php
/**
 * Funzioni e definizioni di Digital Library
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digital Library
 */

/**
 * Funzione per caricare gli stili e gli script
 */

function theme_enqueue_scripts() {
        // Stili del tema - Caricati nell'head del tema
        wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' ); // Font Awesome v5.3.1
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' ); // Bootstrap 4
        wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' ); // MDB
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css' ); // Stili del tema
        // Script del tema - Caricati nel footer del tema
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true ); // JQuery
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true ); // Popper
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true ); // Bootstrap
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true ); // MDB

        }
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
?>