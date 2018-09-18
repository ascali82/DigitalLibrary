<?php
/*
 * Template Name: Versioning Template
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
        
<?php 
$terms_array = array( 
  'taxonomy' => 'version', // you can change it according to your taxonomy
  'parent'   => 0, // If parent => 0 is passed, only top-level terms will be returned
    'orderby' =>  'name',
  'order' =>  'DESC'
);


        
$versions_terms = get_terms($terms_array); 
foreach($versions_terms as $version): ?>
<h2>Versione <?php echo $version->name; ?></h2>
<?php 
$post_args = array(
      'posts_per_page' => -1,
 //     'post_type' => 'service', // you can change it according to your custom post type
      'tax_query' => array(
          array(
              'taxonomy' => 'version', // you can change it according to your taxonomy
              'field' => 'term_id', // this can be 'term_id', 'slug' & 'name'
              'terms' => $version->term_id,
              'orderby' =>  'date',
  'order' =>  'ASC'
          )
      )
);
$myposts = get_posts($post_args); ?>
<div class="list-group">
<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><h3><?php
$terms = get_the_terms($post->ID, 'version');
   foreach ($terms as $term) {
   if (($term->parent) !== 0) {
      echo $term->name . ' - '; } }
        ?><?php the_title(); ?></h3></a>
<?php endforeach; // Term Post foreach ?>
</div>
<?php wp_reset_postdata(); ?>

<?php endforeach; // End Term foreach; ?>
        
        
	</div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->
                        </main><!-- #main -->
                    </div><!-- #primary -->
    
<?php get_sidebar(); ?>

                </div><!-- #wrapper -->
<?php
get_footer(); 