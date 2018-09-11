<?php
/**
 * Template per la visualizzazione dei post singoli
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _dl
 */
get_header();
?>
                <div id="wrapper" class="row d-flex flex-lg-row-reverse flex-column-reverse">

                    <div id="primary" class="content-area col-12 col-lg-9">
                        <main id="main" class="site-main">

                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', get_post_type() );
                            the_post_navigation();
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                        ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
    
                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        
                    </aside><!-- #secondary -->

                </div><!-- #wrapper -->
<?php
get_footer(); 