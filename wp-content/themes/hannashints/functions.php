<?php
/**
 * hannashints functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hannashints
 */

if ( ! function_exists( 'hannashints_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hannashints_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hannashints, use a find and replace
		 * to change 'hannashints' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hannashints', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'hannashints' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hannashints_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hannashints_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hannashints_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hannashints_content_width', 640 );
}
add_action( 'after_setup_theme', 'hannashints_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hannashints_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hannashints' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hannashints' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hannashints_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hannashints_scripts() {
	remove_action('wp_head', '_admin_bar_bump_cb');
	
	wp_enqueue_style( 'hannashints-style', get_template_directory_uri() . '/dist/main.css' );

	wp_enqueue_script( 'hannashints-main', get_template_directory_uri() . '/dist/main.js', array(), '20180128', true );

	//wp_enqueue_script( 'hannashints-navigation', get_template_directory_uri() . '/src/js/lib/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'hannashints-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hannashints_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Custom Excerpt Length
**/

function hannashints_custom_excerpt_length( $length ) {
    return 85;
}
add_filter( 'excerpt_length', 'hannashints_custom_excerpt_length', 999 );

/**
* Custom Excerpt Read More
**/

function hannashints_new_excerpt_more($more) {
    global $post;
    return '... <br><br><span class="aligncenter"><a class="btn" href="'. get_permalink($post->ID) . '">Continue Reading</a></span>';
}
add_filter('excerpt_more', 'hannashints_new_excerpt_more');


/**
* Featured Post Option
**/
function hannashints_custom_meta() {
    add_meta_box( 'hannashints_meta', __( 'Featured Posts', 'hannashints-textdomain' ), 'hannashints_meta_callback', 'post' );
}


function hannashints_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'hannashints-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'hannashints_custom_meta' );

/**
 * Saves the custom meta input
 */
function hannashints_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'hannashints_nonce' ] ) && wp_verify_nonce( $_POST[ 'hannashints_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'hannashints_meta_save' );

/**
* Render All Images
**/
function hannashints_get_all_imgs($post_id) {
	$postImgs = [];
	$multi_imgs = miu_get_images($post_id);

	$postImgs[0] = get_the_post_thumbnail_url($post_id);
	if($multi_imgs) {
		foreach($multi_imgs as $url) {
			$postImgs[] = $url;
		}
	}
	
	return $postImgs;	
}

//* Insert SPAN tag into widgettitle
add_filter( 'dynamic_sidebar_params', 'hannashints_wrap_widget_titles', 20 );
function hannashints_wrap_widget_titles( array $params ) {
        
        // $params will ordinarily be an array of 2 elements, we're only interested in the first element
        $widget =& $params[0];
        $widget['before_title'] = '<h4 class="widgettitle"><span class="heading-line"></span><span class="heading-title">';
        $widget['after_title'] = '</span><span class="heading-line"></span><span class="is-tablet is-mobile heading--trigger"></span></h4>';
        
        return $params;
        
}

function hannashints_wrap_archive_title( $title ) {
	$title_parts = explode( ': ', $title, 2 );

	if ( ! empty( $title_parts[1] ) ) {
	    $title = '<span class="header-label">' . esc_html( $title_parts[0] ) . ': </span><span class="header-text">' . $title_parts[1] .'</span>';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'hannashints_wrap_archive_title' );


function hh_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      $excerpt .= '<a class="readmore" href="'. get_permalink($post->ID) . '">Continue Reading > </a>';

      return $excerpt;
}
