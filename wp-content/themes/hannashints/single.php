<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hannashints
 */

get_header(); 
	while ( have_posts() ) : the_post();
?>
<header class="page-header">
	<?php
		the_title( '<h1 class="page-title">', '</h1>' );
	?>
</header><!-- .page-header -->
<?php endwhile; ?>
<div class="wrapper">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' ); ?>

				<?php //the_post_navigation();?>
				<div id="post-nav" class="navigation">
				<?php 
					$prevPost = get_previous_post(false);
					if($prevPost): ?>
						<a href="<?php echo get_post_permalink($prevPost->ID);?>" class="nav-box previous">
							<div class="nav-box--heading">
								<h4><< Prev</h4>
							</div>
							<div class="nav-box--text">
								<?php echo get_the_post_thumbnail($prevPost->ID, array(140,94));?>
								<p class="post-title"><?php echo $prevPost->post_title; ?></p>
							</div>
						</a>
				<?php endif;

					$nextPost = get_next_post(false);
					if($nextPost): ?>
						<a href="<?php echo get_post_permalink($nextPost->ID);?>" class="nav-box next">
							<div class="nav-box--heading">
								<h4>Next >></h4>
							</div>
							<div class="nav-box--text">
								<?php echo get_the_post_thumbnail($nextPost->ID, array(140,94));?>
								<p class="post-title"><?php echo $nextPost->post_title; ?></p>
							</div>
						</a>
				<?php endif; ?>
					<br class="clearfix"/>
				</div><!--#post-nav div -->

				
				<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
