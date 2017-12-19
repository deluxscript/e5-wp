<?php
/**
 * Enterfive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Enterfive
 */


if ( ! function_exists( 'enterfive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function enterfive_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Enterfive, use a find and replace
		 * to change 'enterfive' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'enterfive', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'enterfive' ),
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
		add_theme_support( 'custom-background', apply_filters( 'enterfive_custom_background_args', array(
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
add_action( 'after_setup_theme', 'enterfive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function enterfive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'enterfive_content_width', 640 );
}
add_action( 'after_setup_theme', 'enterfive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function enterfive_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'enterfive' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'enterfive' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'enterfive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'homepage.php' ) ) {
        wp_enqueue_style( 'enterfive-custom', get_template_directory_uri() . '/css/main.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );


function enterfive_scripts() {
	wp_enqueue_style( 'enterfive-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'enterfive-custom', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_style( 'enterfive-owl', get_template_directory_uri() . '/css/owl.carousel.min.css' );

	wp_enqueue_style( 'enterfive-theme-owl', get_template_directory_uri() . '/css/owl.theme.default.min.css' );

	wp_enqueue_script( 'enterfive-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery.min.js', array(), '20151216', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151217', true );

	wp_enqueue_script( 'enterfive-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151218', true );

	wp_enqueue_script( 'enterfive-main', get_template_directory_uri() . '/js/main.js', array(), '20151219', true );

	wp_enqueue_script( 'enterfive-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enterfive_scripts' );

add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_length($length) {

    return 25;

}

add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more($text){

    return ' ';

}

function cases_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid);
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');
    return  $image_url[0];
}

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


 // Register Custom Navigation Walker
 require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

 // Require cases custom post type
 require_once('cases.php');

 // Require portfolio custom post type
 require_once('portfolio.php');

 // Require latest venture custom post type
 require_once('latest_venture.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
