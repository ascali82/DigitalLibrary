<?php
/**
 * Porzione di template per la visualizzazione dei Post in Bacheca
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _dl
 */
?>

                                        <!-- Card -->
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('card col-12 col-lg-5 m-1'); ?>>

                                            <!-- Card content -->
                                            <div class="card-body">

                                                <!-- Title -->              
                                                <header class="entry-header">
                                                    <div class="entry-meta">
                                                        <?php _dl_entry_meta() ?>
                                                    </div><!-- .entry-meta -->                                              
                                                    <?php
                                                        if ( is_singular() ) :
                                                            the_title( '<h1 class="entry-title card-title">', '</h1>' );
                                                        else :
                                                            the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                                        endif;
                                                        if ( 'post' === get_post_type() ) :
                                                    ?>
                                                    <?php endif; ?>
                                                </header><!-- .entry-header -->
                                        
                                                <!-- Text -->
                                                <div class="entry-content">
                                                    <p class="card-text"><?php echo the_excerpt(); ?></p>
                                                </div>
                                                
                                                <!-- Card footer -->
                                                <footer class="entry-footer card-footer text-right bg-transparent">
                                                    <?php _dl_posted_on() ?>
                                                </footer>
                                        
                                            </div>

                                        </article>
                                        <!-- Card -->