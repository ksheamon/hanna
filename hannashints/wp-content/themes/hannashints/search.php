<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package hannashints
 */
$allsearch = new WP_Query("s=$s&showposts=-1");
$count = $allsearch->post_count;

get_header(); 
?>
<header class="page-header">
	<h1 class="page-title">
		<?php
			if ( have_posts() ) :
				printf( esc_html__( '%s %s Found For: %s', 'hannashints' ), $count, ($count > 1) ? 'Results' : 'Result', '<strong>' . get_search_query() . '</strong>' );
			else: 
				printf( esc_html__( '0 Results Found For: %s', 'hannashints' ), '<strong>' . get_search_query() . '</strong>' );
			endif;
		?>
	</h1>	
</header><!-- .page-header -->
<div class="wrapper">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
					if( have_posts()):
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;
						the_posts_pagination(array(
							'prev_text' => __( '<<', 'textdomain' ),
		    				'next_text' => __( '>>', 'textdomain' ),
						));
					else:
						get_template_part( 'template-parts/content', 'none' );
					endif;
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer();
