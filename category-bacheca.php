<?php
/**
 * Bacheca
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
                            <?php // if ( have_posts() ) : ?>
                                <header class="entry-header">
                                   <?php  //if (is_category()){
                                echo single_cat_title( '<h1 class="entry-title">') . '</h1>';
                         //   }?>
                                </header><!-- .entry-header -->
                                
                                <div class="entry-content">           
 
                                    <div id="news-container" class="d-inline-flex flex-wrap">
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
                                get_template_part( 'template-parts/content', 'bacheca' );
                            endwhile;
                            //the_posts_navigation();
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>                      
                                    </div>

        <?php mdb_pagination(); ?>
                                </div>       
                            </article><!-- #post-<?php the_ID(); ?> -->     
                            
                        </main><!-- #main -->
                    </div><!-- #primary -->                            
<?php get_sidebar(); ?>
                </div><!-- #wrapper -->
<?php
get_footer(); 