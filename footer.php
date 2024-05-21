<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-contact">
			
		</div><!-- .footer-contact -->

    <?php
        if ( !is_page('contact') && function_exists ( 'get_field' ) ) {
            // echo '<h3>Physical Address</h3>';
			?> <div class="footer-contact-left"> <?php
            if ( get_field( 'physical_address', 15 ) ) {
				get_template_part('images/location');
				the_field( 'physical_address', 15 );
            }
			?> 
			</div> 
			<div class="footer-contact-right">
            <?php
            if ( get_field( 'email_address', 15 ) ) {
                the_field( 'email_address', 15 );
            }
        } 

		// scroll to top button
		get_template_part('images/scroll-to-top');
    ?>
	</div>

		<div class="footer-menus">
			<nav id="footer-navigation" class="footer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-left') ); ?>
			</nav>

			<nav id="footer-navigation" class="footer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-right') ); ?>
				<!-- <?php  ?> -->
			</nav>
		</div><!-- .footer-menus -->



		<div class="site-info">
			<?php esc_html_e(''); ?><a href="<?php echo esc_url(__('http://localhost/mindset/privacy-policy-2/', 'fwd')); ?>"><?php esc_html_e('Privacy Policay', 'fwd'); ?></a>
			<br>
			<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo esc_url( __( 'https://wp.bcitwebdeveloper.ca/', 'fwd' ) ); ?>"><?php esc_html_e( 'Jonathon Leathers', 'fwd' ); ?></a>
		</div><!-- .site-info -->


	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
