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