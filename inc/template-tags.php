<?php
/**
 * Custom template tags per questo tema
 *
 *
 * @package _dl
 */
if ( ! function_exists( '_dl_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function _dl_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Pubblicato il %s', 'post date', '_dl' ),
			 $time_string  
		);
		echo '<span class="posted-on"><small class="text-muted">' . $posted_on . '</small></span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( '_dl_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _dl_entry_meta() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tags();
            
			if ( $tags_list ) {
                echo '<span class="tags-links"><small class="text-muted">';
				foreach( $tags_list as $tag ) {
                    echo $tag->name; 
                }
            echo '</small></span>';
			}
		}
	}
endif;