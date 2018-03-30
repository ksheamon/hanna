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
	<?php 
		$post_imgs = hannashints_get_all_imgs($post->ID); ?>
		
		<div class="article-img <?php echo ((count($post_imgs) > 1) ? ' gallery' : '') ;?>">
			<div class="slides gallery-for" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": true, "asNavFor": ".gallery-nav", "fade": true}'>

				<?php 
				foreach($post_imgs as $img)	{
					echo '<img src="'. $img .'">';
				} ?>

			</div>
		
			<?php 
			//Add thumbnail nav if using gallery
			if(count($post_imgs) > 1): ?>
				<div class="gallery-nav slides" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows": true, "asNavFor": ".gallery-for", "focusOnSelect": true}'>

					<?php foreach($post_imgs as $img)	{
						echo '<img src="'. $img .'">';
					} ?>

				</div>
			<?php endif;?>
		</div><!-- .gallery -->

	<div class="article-content">
		<?php the_content(); ?>
	</div><!-- .article-content -->
	<br>
	<footer class="article-meta">
		<div class="content-date">
			Posted On:
			<?php
				hannashints_posted_on();
			?>
		</div><!-- .content-date -->
		<ul class="content-tags">
			<?php
				foreach(wp_get_post_tags( $post->ID ) as $c){
				    $cat = get_tag( $c );

				    if($cat->name !== 'Uncategorized'){
				    	echo '<li><a href="/category/' . $cat->slug . '">' . $cat->name . '</a></li>';
				    }		    
				}
			?>
		</ul>
	</footer><!-- .article-meta -->

</article><!-- #post-<?php the_ID(); ?> -->
