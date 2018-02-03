<?php
$args = array(
	'posts_per_page' => 5,
	'meta_key' => 'meta-checkbox',
	'meta_value' => 'yes'
);

$featured = new WP_Query($args);

if ($featured->have_posts()): ?>
	<div class="img-slider">
		<?php while($featured->have_posts()): $featured->the_post(); 

			$post_url = get_the_post_thumbnail_url($post->ID);
		?>
		<div class="slide" style="background-image:url('<?php echo $post_url;?>');">
			<div class="content-box">
				<div class="content-box content-box-inner">
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
					<h3 class="content-title">
						<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
					</h3>		
					<div class="content-date"><?php echo get_the_date('F j, Y');?></div>	
				</div>
			</div>
		</div>
		<?php endwhile;?>
	</div>
<?php endif; ?>
