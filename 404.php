<?php
/**
 * Template per la pagina 404
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

                            <section class="error-404 not-found">
                                <header class="page-header">
                                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', '_s' ); ?></h1>
                                </header><!-- .page-header -->

                                <div class="page-content">


				                </div><!-- .page-content -->
                            </section><!-- .error-404 -->

                        </main><!-- #main -->
                    </div><!-- #primary -->
    
<?php get_sidebar(); ?>

                </div><!-- #wrapper -->
<?php
get_footer(); 