<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hannashints
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<ul>
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
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				hannashints_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php 
		$post_imgs = hannashints_get_all_imgs($post->ID);
		if((count($post_imgs) > 1)) {
			echo '<div class="gallery">';
			foreach($post_imgs as $img)	{
				echo '<img src="'. $img .'">';
			}
			echo '</div>';
		}else{
			foreach($post_imgs as $img)	{
				echo '<img src="'. $img .'">';
			}
		}
		
	?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
		
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
