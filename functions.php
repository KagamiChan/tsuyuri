<?php
/**
 * tsuyuri functions and definitions
 *
 * @package tsuyuri
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tsuyuri_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tsuyuri_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tsuyuri, use a find and replace
	 * to change 'tsuyuri' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tsuyuri', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tsuyuri' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tsuyuri_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tsuyuri_setup
add_action( 'after_setup_theme', 'tsuyuri_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tsuyuri_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tsuyuri' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tsuyuri_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tsuyuri_scripts() {
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array(), '1.0.2', true );

	wp_enqueue_style( 'pace-style', get_template_directory_uri() . '/js/pace.css', array(), '1.0' );

	wp_enqueue_style( 'webfont', get_template_directory_uri() . '/webfont/webfont.css', array(), '1.0' );

	wp_enqueue_style( 'tsuyuricons', get_template_directory_uri() . '/tsuyuricons/tsuyuricons.css', array(), '1.1' );

	wp_enqueue_style( 'tsuyuri-style', get_stylesheet_uri() ,array( 'tsuyuricons','webfont' ));

	// wp_enqueue_script( 'tsuyuri-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tsuyuri-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '1.11.1', true );

	// wp_enqueue_script( 'jquery.sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.js', array(), '1.1.1', true );

	wp_enqueue_script( 'headhesive', get_template_directory_uri() . '/js/headhesive.js', array(), '1.1.1', true );

	wp_enqueue_script( 'tsuyuri', get_template_directory_uri() . '/js/tsuyuri.js', array(), 'dev', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsuyuri_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
