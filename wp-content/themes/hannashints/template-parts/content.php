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
				    	echo '<li><a href="/category/' . $cat->slug . '">' . $cat->name . '</a></li>';
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
		$rand = rand(); //generate random string for each gallery to keep refs aligned
		?>
		
		<div class="article-img <?php echo ((count($post_imgs) > 1) ? ' gallery' : '') ;?>">
			<div class="slides gallery-for gallery-for-<?php echo $rand;?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": true, "asNavFor": ".gallery-nav-<?php echo $rand;?>", "fade": true}'>

				<?php 
				foreach($post_imgs as $img)	{
					echo '<img src="'. $img .'">';
				} ?>

			</div>
		
			<?php 
			//Add thumbnail nav if using gallery
			if(count($post_imgs) > 1): ?>
				<div class="gallery-nav gallery-nav-<?php echo $rand;?> slides" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows": true, "asNavFor": ".gallery-for-<?php echo $rand;?>", "focusOnSelect": true}'>

					<?php foreach($post_imgs as $img)	{
						echo '<img src="'. $img .'">';
					} ?>

				</div>
			<?php endif;?>
		</div><!-- .gallery -->

	<div class="article-content">
		<?php the_excerpt(); ?>
		
	</div><!-- .article-content -->
</article><!-- #post-<?php the_ID(); ?> -->
