<?php
/**
 * Footer del tema
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _dl
 */
?>

            </div><!-- #content -->

            <footer id="colophon" class="site-footer page-footer font-small primary-color">
                
                <!-- Footer Links -->
                <div class="container text-center text-md-left">
                              
                    <!-- Grid row-->
<?php if ( get_the_author_meta('facebook', 1 ) || get_the_author_meta('twitter', 1 ) || get_the_author_meta('google+', 1 ) || get_the_author_meta('instagram', 1 ) || get_the_author_meta('youtube', 1 ) || get_the_author_meta('linkedin', 1 ) || get_the_author_meta('tumblr', 1 ) || get_the_author_meta('skype', 1 ) ) :  ?>                    
                    <div class="row py-4 d-flex align-items-center">
                    <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Seguici:</h6>
          </div>
          <!-- Grid column -->

           <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <?php if ( get_the_author_meta('facebook', 1 ) ) :  ?>
              <a href="<?php the_author_meta('facebook', 1); ?>" target="_blank" title="Seguici su Facebook">
              <i class="fab fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>
            <?php endif; ?>
            <!-- Twitter -->
            <?php if ( get_the_author_meta('twitter', 1 ) ) :  ?>
              <a href="<?php the_author_meta('twitter', 1); ?>" target="_blank" title="Seguici su Twitter">
              <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>
            <?php endif; ?>
            <!-- Google +-->
            <?php if ( get_the_author_meta('google+', 1 ) ) :  ?>
              <a href="<?php the_author_meta('google+', 1); ?>" target="_blank" title="Seguici su GooglePlusr">
              <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>
            <?php endif; ?>
            <!--Altri -->
            <?php if ( get_the_author_meta('instagram', 1 ) || get_the_author_meta('youtube', 1 ) || get_the_author_meta('linkedin', 1 ) || get_the_author_meta('tumblr', 1 ) || get_the_author_meta('skype', 1 ) ) :  ?>
              <a href="<?php echo site_url('/website/contattaci/'); ?>" title="Tutti i collegameti">
              <i class="fas fa-grip-horizontal fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>
            <?php endif; ?>
          </div>
        </div>
<?php endif; ?>                    
        <!-- Grid column -->


      <!-- Grid row-->
      <hr />  

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Website</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Very long link 1</a>
            </li>
            <li>
              <a href="#!">Very long link 2</a>
            </li>
            <li>
              <a href="#!">Very long link 3</a>
            </li>
            <li>
              <a href="#!">Very long link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Documentazione</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Tassonomie</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Portali</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

                <!-- Copyright -->        
                <div class="site-info footer-copyright text-center py-3">
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s realizzato da %2$s.', '_dl' ), '<a href="https://github.com/ascali82/DigitalLibrary">Digital Library</a>', '<a href="https://github.com/ascali82">Alessandro Scali</a>' );
                    ?>
                    <span class="sep"> | </span>
				    <?php echo data_copyright(); ?>
                </div><!-- .site-info -->
                <!-- Copyright -->
                
            </footer><!-- #colophon -->
        </div><!-- #page -->

    
    <?php wp_footer(); ?>
    </body>
<script>
$("#mdb-navigation > ul > li").addClass("page-item")
$("#mdb-navigation > ul > li > a").addClass("page-link")
</script>
</html>