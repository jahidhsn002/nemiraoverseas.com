<?php

include('navWalker.php');

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

if ( ! function_exists( 'twentyseventeen_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function twentyseventeen_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'twentyseventeen' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
endif;

/**
 * Proper way to enqueue scripts and styles
 */
// function wpdocs_theme_name_scripts() {
//     wp_enqueue_style( 'style-name', get_stylesheet_uri() );
//     wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus([
		'top'    => __( 'Top Menu'),
		'footer'    => __( 'Footer Menu')
	]);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 */
	add_theme_support( 'html5', [
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	]);

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', [
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	]);

}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar([
        'name' => __( 'Top Sidebar' ),
        'id' => 'top-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title is-6" style="display:none">',
		'after_title'   => '</h2>',
    ]);
    register_sidebar([
        'name' => __( 'Left Sidebar' ),
        'id' => 'left-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title is-6">',
		'after_title'   => '</h2>',
    ]);
    register_sidebar([
        'name' => __( 'Right Sidebar' ),
        'id' => 'right-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title is-6">',
		'after_title'   => '</h2>',
    ]);
}