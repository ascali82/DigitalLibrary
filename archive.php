<?php
/**
 * Template per la visualizzazione delle pagine archivio standard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _dl
 */
get_header();
?>
                <div id="wrapper" class="row d-flex flex-lg-row-reverse flex-column-reverse">

                    <div id="primary" class="content-area col-12 col-lg-9">
                        <main id="main" class="site-main">

                        <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                                ?>
                            </header><!-- .page-header -->

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile;
                            the_posts_navigation();
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
    
                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        
                    </aside><!-- #secondary -->

                </div><!-- #wrapper -->
<?php
get_footer(); 