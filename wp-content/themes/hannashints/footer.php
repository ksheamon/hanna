<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hannashints
 */

?>
		</div><!-- #content -->
	</div><!-- .wrapper -->
	

	<footer id="colophon" class="site-footer">
		<div class="wrapper">
			<div class="footer-left">
				<?php $description = get_bloginfo( 'description', 'display' );?>
				<p class="site-title"><?php bloginfo( 'name' ); ?></p>
				<p class="site-description"><?php echo $description; ?></p>
			</div><!-- .footer-left -->
			<div class="footer-right">
				&copy; <?php echo date('Y');?>
			</div><!-- .footer-right -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
