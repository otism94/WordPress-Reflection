<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_Reflection
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="site-credits">
				<span>Copyright &copy; 2021 Otis Moorman</span>
				<span class="sep"> | </span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'new-reflection' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Powered by %s', 'new-reflection' ), 'WordPress' );
					?>
				</a>
			</div>
			<div class="site-links">
				<a href="/privacy-policy">Privacy Policy</a>
				<span class="sep"> | </span>
				<a href="#">Sitemap</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
