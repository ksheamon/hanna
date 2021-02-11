<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hannashints
 */

?>

<article id="post-<?php the_ID(); ?>">
	<div class="article--b">
		<div class="article-img">
			<?php hannashints_post_thumbnail(); ?>
		</div>
		<div class="article-content">
			<?php the_title( sprintf( '<h2 class="content-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
			if ( 'post' === get_post_type() ) : ?>
				<div class="content-date">
					<?php
						hannashints_posted_on();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<div class="entry-summary">
				<?php echo hh_excerpt(25); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
