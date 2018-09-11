<?php
/**
 * Funzioni che migliorano il tema modificando Wordpress
 *
 * @package _dl
 */
 
    // Add a pingback url auto-discovery header for single posts, pages, or attachments.
function _s_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', '_s_pingback_header' );

    // Gestione del copyright del footer
function data_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
  $output = '';
  if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
      $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
  $output = $copyright;
  }
  return $output;
  }

// Funzioni relative all'excerpt

    // Rimozione del excerpt box standard
function oz_remove_normal_excerpt() {
    remove_meta_box( 'postexcerpt' , 'post' , 'normal' );
}
add_action( 'admin_menu' , 'oz_remove_normal_excerpt' );

    // Aggiunta del nuovo excerpt box
function oz_add_excerpt_meta_box( $post_type ) {
    if ( in_array( $post_type, array( 'post', 'page' ) ) ) {
        add_meta_box(
            'oz_postexcerpt',
            __( 'Riassunto', '_dl' ),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'oz_add_excerpt_meta_box' );

    // Posizionamento del nuovo excerpt box sotto il titolo del post o della pagina
function oz_run_after_title_meta_boxes() {
    global $post, $wp_meta_boxes;
    # Output the `below_title` meta boxes:
    do_meta_boxes( get_current_screen(), 'after_title', $post );
}
add_action( 'edit_form_after_title', 'oz_run_after_title_meta_boxes' );

    // Aggiunge l'obbligo di inserimento di un excerpt per post o pagine
function mandatory_excerpt($data) {
  $excerpt = $data['post_excerpt'];
  if (empty($excerpt)) {
    if ($data['post_status'] === 'publish') {
      add_filter('redirect_post_location', 'excerpt_error_message_redirect', '99');
    }
    $data['post_status'] = 'draft';
  }
  return $data;
}
add_filter('wp_insert_post_data', 'mandatory_excerpt');
function excerpt_error_message_redirect($location) {
  remove_filter('redirect_post_location', __FILTER__, '99');
  return add_query_arg('excerpt_required', 1, $location);
}
function excerpt_admin_notice() {
  if (!isset($_GET['excerpt_required'])) return;
  switch (absint($_GET['excerpt_required'])) {
    case 1:
      $message = 'Per la pubblicazione di un post è necessario inserire il riassunto';
      break;
    default:
      $message = 'Errore inaspettato';
  }
  echo '<div id="notice" class="error"><p>' . $message . '</p></div>';
}
add_action('admin_notices', 'excerpt_admin_notice');

// Funzioni relative alla Bacheca

    // Rimuove il box per l'aggiunta di nuove categorie nella finestra di creazione di post
add_action( 'add_meta_boxes', 'isa_remove_categories_meta_box' );
function isa_remove_categories_meta_box() {
     
    remove_meta_box( 'categorydiv', 'post', 'side' );// remove the Categories box
     
    // you can remove more boxes here
    // for example...
    //  remove_meta_box( 'formatdiv', 'post', 'side' ); // remove the Format box
    //  remove_meta_box( 'tagsdiv-post_tag', 'post', 'side' );// remove the Tags box
  
}
    
    // Modifica la categoria Uncategorized in Bacheca
// Uncategorized ID is always 1
wp_update_term(1, 'category', array(
  'name' => 'Bacheca',
  'slug' => 'Bacheca', 
  'description' => 'Blog post collector'
));

    // Rimuove la base URL delle categorie nel permalink
function remove_category( $string, $type )
{ 
        if ( $type != 'single' && $type == 'category' && ( strpos( $string, 'category' ) !== false ) )
        {
            $url_without_category = str_replace( "/category/", "/", $string );
            return trailingslashit( $url_without_category );
        }
    return $string;
}
 
add_filter( 'user_trailingslashit', 'remove_category', 100, 2);

    // Sistema la paginazione in Bacheca
function my_pagination_rewrite() {
    add_rewrite_rule('bacheca/page/?([0-9]{1,})/?$', 'index.php?category_name=bacheca&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');
