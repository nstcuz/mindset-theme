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
            the_content();
          ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                    <?php fwd_post_thumbnail(); ?>

                <div class="entry-content">
                    <?php
                if ( function_exists ( 'get_field' ) ) {

                    echo '<h3>Physical Address</h3>';
                    if ( get_field( 'physical_address' ) ) {
                        the_field( 'physical_address' );
                    }

                    echo '<h3>Email Address</h3>';
                    if ( get_field( 'email_address' ) ) {
                        the_field( 'email_address' );
                    }
                } 
                ?>
                </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #primary -->

<?php
get_sidebar();
get_footer();
