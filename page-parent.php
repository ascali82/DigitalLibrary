<?php
/*
 * Template Name: Template per le pagine parent
 *
 * @package _dl
 */
get_header();
?>
                <div id="wrapper" class="row d-flex flex-lg-row-reverse flex-column-reverse">
                
                    <!--Jumbotron-->
                    <div class="jumbotron text-center mdb-color lighten-2 white-text z-depth-2 col-12">

                        <!--Title-->
                        <?php the_title( '<h1 class="card-title h1-responsive mt-2 font-bold entry-title"><strong>', '</strong></h1>' ); ?>
                        <hr class="my-4 rgba-white-light">
                        <!--Subtitle-->
                        <?php
                            echo '<p class="mt-4"><strong>';
                            echo the_excerpt();
                            echo '</strong></p>';
                            ?>
                    </div><!--Jumbotron-->                        

                    <div id="primary" class="content-area col-12 col-lg-9">
                        <main id="main" class="site-main">
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            
<?php
if (have_posts()):
  while (have_posts()) : the_post();
    the_content();
  endwhile;
else:
  echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
?>

 <div class="row">     
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
<!--Panel-->
<div class="card col-6">
    <div class="card-body">
         <p class="card-text"><?php echo the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-primary"><h5 class="card-title"><?php the_title(); ?></h5></a>
    </div>
</div>
<!--/.Panel-->
 

    <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>

</div>
	<?php if ( get_edit_post_link() ) : ?>

	<?php endif; ?>                            
         
                            </article><!-- #post-<?php the_ID(); ?> --> 

                        </main><!-- #main -->
                    </div><!-- #primary -->
    
                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

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

        <div  class="list-group">

            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="list-group-item border-0"><?php the_title(); ?></a>

        </div>

    <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>
                        
                    </aside><!-- #secondary -->

                </div><!-- #wrapper -->
<?php
get_footer(); 