<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
  <?php
  
  //Services Navigation
    $args = array(
      'post_type' => 'fwd-services',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    );

    $query = new WP_Query( $args );
    if($query -> have_posts()) {
    echo '<nav class="service-nav">';
      while($query -> have_posts()){
       $query -> the_post(); 
        ?>
          <a href="#<?php echo get_the_ID(); ?>">
      <?php the_title(); ?>
          </a>
        <?php
        }
      wp_reset_postdata();
    echo "</nav>";
    }

// Services content
$terms = get_terms( 
  array(
      'taxonomy' => 'fwd-services-category',
  ) 
);
if ( $terms && ! is_wp_error( $terms ) ) {
  foreach ( $terms as $term ) {
      // Add your WP_Query() code here
      $args = array(
        'post_type' => 'fwd-services',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'tax_query'      => array(
          array(
            'taxonomy'   => 'fwd-services-category',
            'field'      => 'slug',
            // Use $term->slug in your tax_query
            'terms'      => $term->slug 
          )
        )
      );
  
      $query = new WP_Query( $args );
      if($query -> have_posts()) {
      // Use $term->name to organize the posts
      echo '<h2>' . $term->name . '</h2>';
        while($query -> have_posts()){
         $query -> the_post(); 
          ?>
      <article id="<?php echo get_the_ID(); ?>">
            <h2><?php the_title(); ?></h2> 
          <?php 
            if(get_field('service')){
               the_field('service');
            }
          ?>
        </article>
          <?php
          }
        wp_reset_postdata();
      }

  }
}
  ?>
<?php get_template_part( 'template-parts/work-categories' ); ?>
	</main><!-- #primary -->

<?php
// get_sidebar();
get_footer();