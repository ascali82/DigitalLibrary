<?php
/**
 * Template Name: Sitemap Page
 * 
 * Template per visualizzare la Mappa del sito in formato HTML
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
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <?php get_template_part('template-parts/sitemap'); ?>
                                </div><!-- .entry-content -->

                                <?php if ( get_edit_post_link() ) : ?>
                                <footer class="entry-footer">
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(
                                                /* translators: %s: Name of current post. Only visible to screen readers */
                                                __( 'Edit <span class="screen-reader-text">%s</span>', '_dl' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            get_the_title()
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                    ?>
                                </footer><!-- .entry-footer -->
                                <?php endif; ?>
                                
                            </article><!-- #post-<?php the_ID(); ?> -->
                        
                        </main><!-- #main -->
                    </div><!-- #primary -->
    
<?php get_sidebar(); ?>

                </div><!-- #wrapper -->
<?php
get_footer(); 