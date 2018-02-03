<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hannashints
 */
?>

<article id="post-<?php the_ID(); ?>" class="">
	<header class="aligncenter article-meta">
		<ul class="content-tags">
			<?php
				foreach(wp_get_post_categories( $post->ID ) as $c){
				    $cat = get_category( $c );

				    if($cat->name !== 'Uncategorized'){
				    	echo '<li><a href="' . $cat->slug . '">' . $cat->name . '</a></li>';
				    }		    
				}
			?>
		</ul>

		<?php 
		if ( is_singular() ) :
			the_title( '<h1 class="content-title">', '</h1>' );
		else :
			the_title( '<h2 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="content-date">
			<?php
				hannashints_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .article-meta -->

	<?php 
		$post_imgs = hannashints_get_all_imgs($post->ID);
		
		echo '<div class="article-img '.((count($post_imgs) > 1) ? ' gallery' : '') .'">';

		foreach($post_imgs as $img)	{
			echo '<img src="'. $img .'">';
		}

		echo '</div>';
				
	?>

	<div class="article-content">
		<?php the_excerpt(); ?>
		
	</div><!-- .article-content -->
</article><!-- #post-<?php the_ID(); ?> -->
