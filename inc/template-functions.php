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

/**
 * Rewrite set up, when theme activate i mean
 */
if (isset($_GET['activated']) && is_admin()) {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%category%/%postname%/');
    $wp_rewrite->flush_rules();
}

/**
* Redirect to Permalink setting Page.
* Otherwise Redirect rule will not work Properly.
*/
function redirect_to_permalink() {

    wp_redirect('options-permalink.php');
}
add_action( 'after_switch_theme', 'redirect_to_permalink' );

// Breadcrumbs

function dimox_breadcrumbs(){
  /* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['tax'] 	  = 'Archive for "%s"'; // text for a taxonomy page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ' &raquo; '; // delimiter between crumbs
	$before      = '<span class="current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$homeLink = get_bloginfo('url') . '/';
	$linkBefore = '<span typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
	if (is_home() || is_front_page()) {
		if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
	} else {
		echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
		
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif( is_tax() ){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
		
		}elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo $delimiter;
			}
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</div>';
	}
} // end dimox_breadcrumbs()

/**
* Add additional contact methods to a WordPress user profile
*/
function modify_user_contact_methods( $user_contact ) {

	// Add user contact methods
    $user_contact['facebook'] = __( 'Facebook URL' );
	$user_contact['twitter'] = __( 'Twitter Username' );
    $user_contact['google+'] = __( 'GooglePlus URL' );
    $user_contact['instagram'] = __( 'Instagram' );
    $user_contact['youtube'] = __( 'Youtube' );
    $user_contact['linkedin'] = __( 'Linkedin' );
    $user_contact['tumblr'] = __( 'Tumblr' );
    $user_contact['skype']   = __( 'Skype Username'   );    

	// Remove user contact methods
	unset( $user_contact['aim']    );
	unset( $user_contact['jabber'] );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'modify_user_contact_methods' );