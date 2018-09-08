<?php
/**
 * Template principale
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digital Library
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>
        
        <div id="page" class="site">
	       <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Passa al contenuto', '_dl' ); ?></a>

            <header id="masthead" class="site-header">
                
                <div class="site-branding container">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    $_dl_description = get_bloginfo( 'description', 'display' );
                    if ( $_dl_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $_dl_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation navbar navbar-expand-md" role="navigation">
                    
                    <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i>
					    <?php esc_html_e( 'Menu', 'digital-library' ); ?>
					    </span>
				        </button>

                    </div><!-- .container -->
                    
                </nav><!-- #site-navigation .main-navigation -->
                
            </header><!-- #masthead -->

            <div id="content" class="site-content container">
                <div id="wrapper" class="row d-flex flex-lg-row-reverse flex-column-reverse">

                    <div id="primary" class="content-area col-12 col-lg-9">
                        <main id="main" class="site-main">
  
                        <?php
                        if ( have_posts() ) :
                            if ( is_home() && ! is_front_page() ) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                                <?php
                            endif;
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile;
                            the_posts_navigation();
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>                            

                        </main><!-- #main -->
                    </div><!-- #primary -->
    
                    <aside id="secondary" class="widget-area  col-12 col-lg-3">

                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        
                    </aside><!-- #secondary -->

                </div><!-- #wrapper -->
                
            </div><!-- #content -->

            <footer id="colophon" class="site-footer font-small">

                <!-- Copyright -->        
                <div class="site-info footer-copyright text-center py-3">

                </div><!-- .site-info -->
                <!-- Copyright -->
                
            </footer><!-- #colophon -->
        </div><!-- #page -->

    
    <?php wp_footer(); ?>
    </body>
</html>