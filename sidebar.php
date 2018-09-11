<?php
/**
 * La sidebar contenente l'area widget principale
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _dl
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        
                    </aside><!-- #secondary -->