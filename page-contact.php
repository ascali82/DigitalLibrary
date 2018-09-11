<?php
/**
 * Template Name: Contact Page
 * 
 * Template per visualizzare la pagina dei contatti
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
    
                     <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php
                        global $post;
                        $direct_parent = $post->post_parent;
                        $args = array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => $direct_parent, // Get this pages id and find the children
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order',
                        //    'post__not_in' => array( $post->ID ),
                         );
                        $currentPage =  $post->ID;
                        // The Query 
                        $parent = new WP_Query( $args );
                        // The Loop 
                        if ( $parent->have_posts() ) { ?>

                                <div class="list-group">
                           <?php while ( $parent->have_posts() ) {
                            $parent->the_post() ; ?>
                                          <?php if( $currentPage == $post->ID  ) { ?>
                                        <a href="<?php the_permalink() ?>" class="list-group-item active disabled"><h3><?php the_title() ?></h3></a>
                                  <?php continue;  } ?>      
                        <a href="<?php the_permalink() ?>" class="list-group-item"><h3> <?php the_title() ?> </h3></a>


                          <?php } //endwhile; ?>

                         </div><!-- /.child -->

                        <?php } wp_reset_query(); ?>
            
                         <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        
                    </aside><!-- #secondary -->

                </div><!-- #wrapper -->
<?php
get_footer(); 