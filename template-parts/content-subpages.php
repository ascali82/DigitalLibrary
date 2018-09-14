<!-- Card -->
<article id="post-<?php the_ID(); ?>" <?php post_class('card col-12 col-lg-5 mx-auto mb-2'); ?>>

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h2 class="card-title"><?php the_title(); ?></h2>
    <hr class="my-2">
    <!-- Text -->
    <p class="card-text mb-4"><?php echo the_excerpt(); ?></p>
    <!-- Link -->
    <a href="<?php the_permalink(); ?>" class="d-flex justify-content-end" title="<?php the_title(); ?>"><h5>Vai alla pagina <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</article>
<!-- Card -->