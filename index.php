<?php
/**
 * Template principale
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digital Library
 */
get_header();
?>
                <div id="wrapper" class="row d-flex flex-lg-row-reverse flex-column-reverse">

                    <div id="primary" class="content-area col-12 col-lg-9">
                        <main id="main" class="site-main">
  
                        <?php
                        if ( have_posts() ) :
                            if ( is_home() && ! is_front_page() ) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                                <?php
                            endif;
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
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