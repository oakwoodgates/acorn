<?php
/**
 * acorn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package acorn
 */

if ( ! function_exists( 'acorn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function acorn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on acorn, use a find and replace
		 * to change 'acorn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'acorn', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'acorn' ),
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
		add_theme_support( 'custom-background', apply_filters( 'acorn_custom_background_args', array(
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

		// Support align-wide in Gutenberg
    add_theme_support( 'align-wide' );

		// Add Gutenberg default styles
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'acorn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acorn_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'acorn_content_width', 640 );
}
add_action( 'after_setup_theme', 'acorn_content_width', 0 );

/**
 * Library files.
 */
$files = array(
	'variables', // Sitewide variables to use within templates and functions.
	'compat', // 3rd party plugin compatibility.
	'custom-header', // Implement the Custom Header feature.
	'customizer', // Customizer additions.
	'helpers', // Functions to help get data.
	'scripts', // Enqueue the assets.
	'sidebars', // Register widget areas.
	'template-helpers', // Functions to get and prepare data.
	'template-tags', // Custom template tags for this theme.
	'template-functions', // Functions which enhance the theme by hooking into WordPress.
	'walker-nav' // Bootstrap 4 Walker_Nav_Menu
);
foreach ( $files as $file ) {
	require get_template_directory() . '/inc/'.$file.'.php';
}

function acorn_template( $file, $params ) {
	ob_start();
	include( $file ); 
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $vars array
 * @param string filepart
 * @param mixed array of variables to use within template
 */
function acorn_template_part( $slug, $template_vars = array(), $content_vars = array() ) {

	// setup default variables if none passed
	if ( ! $content_vars ) {
		$title   = get_the_title();
		$content = get_the_excerpt();
		$link    = get_the_permalink();

		$img_id  = get_post_thumbnail_id();
		$img_src = wp_get_attachment_image_src( $img_id, 'thumbnail' );
		$img_src = isset( $img_src[0] ) ? $img_src[0] : '';
		if ( $img_src ) {
			$img_alt = trim( strip_tags( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ) );
		} else {
			$img_alt = $title . ' image';
		}

		$content_vars = array(
			'img_src' 	=> $img_src,
			'img_alt' 	=> $img_alt,
			'title' 	=> $title,
			'content' 	=> $content,
			'link' 		=> $link
		);
	}

	$c = get_stylesheet_directory() . '/template-parts/components/';
	$p = get_template_directory()   . '/template-parts/components/';
	$post_type = get_post_type();

	// find the template
	if ( file_exists(  $c . $slug . '-'. $post_type . '.php' ) )
		$file = $c . $slug . '-'. $post_type . '.php';
	elseif ( file_exists( $p . $slug . '-'. $post_type . '.php' ) )
		$file = $p . $slug . '-'. $post_type . '.php';
	elseif ( file_exists( $c . $slug . '.php' ) )
		$file = $c . $slug . '.php';
	elseif ( file_exists( $p . $slug . '.php' ) )
		$file = $p . $slug . '.php';
	else $file = '';

	// output the template
	ob_start();
//	do_action( 'acorn_template_wrapper_start', $slug );
	if ( $file )
		require( $file );
//	do_action( 'acorn_template_wrapper_end', $slug );
	echo ob_get_clean();
}

function acorn_loop( $wrapper_template, $single_template ) {
	/* Start the Loop */
	while ( have_posts() ) : 
		the_post();
		$content_vars = apply_filters( 'acorn_single_template_vars', array(), get_the_ID(), $wrapper_template, $single_template ); 
		acorn_template_part( 'single/' . $single_template, $content_vars ); 
	endwhile;
}
