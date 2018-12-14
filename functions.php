<?php
/**
 * categitau functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package categitau
 */

if ( ! function_exists( 'categitau_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function categitau_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on categitau, use a find and replace
		 * to change 'categitau' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'categitau', get_template_directory() . '/languages' );

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
		 * Let WordPress manage the header image.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'custom-header' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		// Image sizes to be displayed
		add_image_size( 'display-thumb', 675, 450, true ); // Hard Crop Mode
		add_image_size( 'blog-thumb', 675, 450); // Soft Crop Mode
		add_image_size( 'article-thumb', 590, 9999 ); // Unlimited Height Mode
		
		add_filter('show_admin_bar','__return_false');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'categitau' ),
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
		add_theme_support( 'custom-background', apply_filters( 'categitau_custom_background_args', array(
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
add_action( 'after_setup_theme', 'categitau_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function categitau_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'categitau_content_width', 640 );
}
add_action( 'after_setup_theme', 'categitau_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function categitau_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'categitau' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'categitau' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'categitau_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function categitau_scripts() {

	wp_enqueue_style( 'categitau-style', get_stylesheet_uri() );

	wp_enqueue_script( 'categitaujs', get_template_directory_uri() . '/assets/js/categitau.js',null,rand(),true );

	wp_localize_script('categitaujs','vars',[

		'ajax_url' => admin_url('admin-ajax.php')

	]);
}

add_action( 'wp_enqueue_scripts', 'categitau_scripts' );

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


// Create Portfolio post type
function create_portfolio_post_type () {
	register_post_type('portfolio', [
		'labels' => [
			'name' => __('Portfolios'),
			'singular_name' => __('Portfolio')
		],
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => [ 'slug' => 'game-reviews'],
		'menu_icon' => 'dashicons-portfolio',
		'supports' => [
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'],
	]);
}

add_action('init', 'create_portfolio_post_type' );

// Limit excerpt to 20 words
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action('wp_ajax_nopriv_filters','filterarticles');
add_action('wp_ajax_filters','filterarticles');

// Filter articles 
function filterarticles(){
	$posts = query_posts([
		'post_type' => 'post',
		'cat' => $_POST['term'],
		 'post_status' => 'publish',
	]);
	ob_start();
	if(have_posts()):
	while(have_posts()): the_post();?>
		<div class="col-lg-4 col-md-6">
			<article class="post">
				<div style="display: block;">
					<?php if (has_post_thumbnail()) : ?>
					<div class="post-image">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'display-thumb'); ?>
						</a>
					</div>
					<?php else : ?>
					<div class="post-image">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php get_template_directory_uri() ?>.assets/img/blog-8.jpg" width="675" height="450">
						</a>
					</div>      
					<?php endif; ?>
					<div class="post-header">
						<div class="post-tag">
							<a href="" rel="tag">
								<?= the_date('Y-m-d') ?> 
							</a>  
						</div>
						<h5>
							<span>
								<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
							</span>
						</h5>
					</div>
					<div class="post-entry">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</article>
		</div>

	<?php endwhile;
	endif;
	echo json_encode(['content' => ob_get_clean()]);
	exit;
}