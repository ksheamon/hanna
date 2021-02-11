<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hannashints
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<div class="page-content">
					<h1 class="page-title">What a Beautiful <strong>MESS!</strong></h1>
					<p>
						It looks like nothing was found at this location.<br>
						<a href="/">Return home</a> or try a search below.
					</p>
					<?php get_search_form();?>					
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
