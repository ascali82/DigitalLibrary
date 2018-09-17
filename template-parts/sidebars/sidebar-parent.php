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