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

            <footer id="colophon" class="site-footer font-small">

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