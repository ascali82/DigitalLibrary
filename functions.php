<?php
/**
 * Funzioni e definizioni del tema
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digital Library
 */

if ( ! function_exists( '_dl_setup' ) ) :
	/**
	 * Inizializza le funzionalità di default del tema e registra il supporto per varie funzionalità di Wordpress.
	 *
	 * Questa funzione è agganciata a after_setup_theme hook, che si avvia prima dell'init hook.
	 */
	function _dl_setup() {
		add_theme_support( 'automatic-feed-links' );
		// Aggiunge il supporto per la gestione automatica da parte di Wordpress per il titolo
		add_theme_support( 'title-tag' );
		// Aggiunge il supporto per le Thumbnails per post e pagine
        // @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		add_theme_support( 'post-thumbnails' );
		// Registrazione del menu di navigazione principale.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_dl' ),
		) );
		// Aggiunge il supporto per HTML5 per search form e commenti modificando l'output originario
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );
		// Aggiunge il supporto per il selective refresh dei widget.
		add_theme_support( 'customize-selective-refresh-widgets' );
        // Aggiunge il supporto per i Post format
        add_theme_support( 'post-formats', array( 'status', 'gallery', 'link' ) );
	}
endif;
add_action( 'after_setup_theme', '_dl_setup' );

/**
 * Stili e script
 */
function theme_enqueue_scripts() {
    // Stili - Caricati nella sezione head del tema
        // Font Awesome 5.3.1
        wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
        // Bootstrap 4
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        // MDB
        wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' );
        // Stili specifici del tema
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css' );
    // Script - Caricati nella sezione footer del tema
        // jQuery
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
        // Popper
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
        // Bootstrap
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        // MDB
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );

        }
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


/**
 * Caricamento file esterni
 */

// Registrazione della classe wp-bootstrap-navwalker per la customizzazione del menu principale
require_once('inc/wp-bootstrap-navwalker.php');
    
// Funzioni supplementari
require get_template_directory() . '/inc/template-functions.php';
?>