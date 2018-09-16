<?php
/**
 * Header del tema
 *
  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _dl
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
<div class="jumbotron text-center site-branding">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() ) :
                        ?>
                        <h1 class="site-title card-title h2-responsive mt-2"><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title blue-text mb-4 font-bold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    $_dl_description = get_bloginfo( 'description', 'display' );
                    if ( $_dl_description || is_customize_preview() ) :
                        ?>
        <hr class="my-4">
    <div class="d-flex justify-content-center">
                        <p class="site-description card-text" style="max-width: 43rem;"><?php echo $_dl_description; /* WPCS: xss ok. */ ?></p>
   </div>     
                    <?php endif; ?>

</div>
<!--Jumbotron-->
</div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation navbar navbar-expand-md navbar-dark bg-primary" role="navigation">
                    
                    <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i>
					    <?php esc_html_e( 'Menu', 'digital-library' ); ?>
					    </span>
				        </button>
                        
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id'    => 'primary-menu',
                                'menu_class'      => 'navbar-nav mr-auto',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>

                    </div><!-- .container -->
                    
                </nav><!-- #site-navigation .main-navigation -->
                
            </header><!-- #masthead -->

            <div id="content" class="site-content container my-2">
                <!-- start breadcrumbs -->
<?php dimox_breadcrumbs(); ?>
<!-- end breadcrumbs -->