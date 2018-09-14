<?php
/*
 * Template Name: Template per le pagine parent
 *
 * @package _dl
 */
get_header();
?>
                
                     <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--Jumbotron-->
<header class="entry-header jumbotron text-center mdb-color lighten-2 white-text z-depth-2">

    <!--Title-->
    <h1 class="card-title h2-responsive mt-2 font-bold"><strong><?php the_title( ); ?></strong></h1>
    <hr class="my-4 rgba-white-light">

    <!--Text-->
    <div class="d-flex justify-content-center">
        <p class="card-text my-2" style="max-width: 43rem;"><?php echo the_excerpt(); ?>
        </p>
    </div>

</header>
<!--Jumbotron-->                                


                                <div class="entry-content">
                            
                                    <?php
                                    if (have_posts()):
                                      while (have_posts()) : the_post();
                                        the_content();
                                      endwhile;
                                    else:
                                      echo '<p>Sorry, no posts matched your criteria.</p>';
                                    endif;
                                    ?>

                                     <div id="news-container" class="d-inline-flex flex-wrap justify-content-space-evenly">     
                                    <?php

                                    $args = array(
                                        'post_type'      => 'page',
                                        'posts_per_page' => -1,
                                        'post_parent'    => $post->ID,
                                        'order'          => 'ASC',
                                        'orderby'        => 'menu_order'
                                     );


                                    $parent = new WP_Query( $args );

                                    if ( $parent->have_posts() ) : ?>
                                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                                    <?php get_template_part( 'template-parts/content', 'subpages' ); ?>


                                        <?php endwhile; ?>

                                    <?php endif; wp_reset_postdata(); ?>

                                        </div>
	<?php if ( get_edit_post_link() ) : ?>

	<?php endif; ?>                            
                                </div>
                            </article><!-- #post-<?php the_ID(); ?> --> 

                        </main><!-- #main -->
                    </div><!-- #primary -->

<?php
get_footer(); 