<?php
/*
 * Template Name: Template per la pagina parent della Tassonomia Portale
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

                                    $args = array( 'hide_empty' => 0, 'parent' => 0 );

$terms = get_terms( 'portali', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="my_term-archive">';
    foreach ( $terms as $term ) {
        $i++;
    	$term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
    	if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
} ?>

                                    <?php wp_reset_postdata(); ?>

                                        </div>
	<?php if ( get_edit_post_link() ) : ?>

	<?php endif; ?>                            
                                </div>
                            </article><!-- #post-<?php the_ID(); ?> --> 

                        </main><!-- #main -->
                    </div><!-- #primary -->

<?php
get_footer(); 