<?php
/**
 * La sidebar contenente l'area widget principale
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _dl
 */
?>

                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php if ( is_category('bacheca') ) {
  get_template_part( 'template-parts/sidebars/sidebar-bacheca' );
} elseif (is_page_template ('page-parent.php')) {
    get_template_part( 'template-parts/sidebars/sidebar-parent' );
} elseif ( is_page() && $post->post_parent ) {
    get_template_part( 'template-parts/sidebars/sidebar-child' );
} elseif ( is_404() ) {
    get_template_part( 'template-parts/sidebars/sidebar-404' );
} elseif ( is_search() ) {
    get_template_part( 'template-parts/sidebars/sidebar-search' );
} elseif ( is_single() ) {
    get_template_part( 'template-parts/sidebars/sidebar-single' );
} else {
  dynamic_sidebar( 'sidebar-1' );
} ?>
                        
                    </aside><!-- #secondary -->