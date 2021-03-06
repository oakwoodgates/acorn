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
	'scripts', // Enqueue the assets.
	'sidebars', // Register widget areas.
	'template-components', // Functions create small component parts used in templates.
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
		$img_src = wp_get_attachment_image_src( $img_id, 'large' );
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

function my_builder_color_presets( $colors ) {
    $colors = array();
      
      $colors[] = '8E181B';
      $colors[] = 'D11C23';
      $colors[] = '1A4688';
      $colors[] = 'D6E1EE';
      $colors[] = 'fdfffc';
      $colors[] = 'f1d302';
  
    return $colors;
}
add_filter( 'fl_builder_color_presets', 'my_builder_color_presets' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


/**
 * Add server-side active_callbacks for the site title and tagline controls.
 *
 * When the preview is refreshed, the active states for the blogname and blogdescription
 * controls will be returned by `get_header_text_control_active_state` and sent from
 * the preview back to the pane, causing these controls to show or hide _after_ the
 * preview has finished refreshing. This server-side method sufficient is sufficient
 * by itself because the header_textcolor setting has a refresh transport. If, however,
 * the setting has a postMessage transport, then the active state for the blogname
 * and blogdescription controls would need to be manipulated in JS as well.
 * This can be seen in conditionally-contextual-site-title-and-tagline-customizer-controls.js.
 *
 * @param \WP_Customize_Manager $wp_customize Manager.
 */
function my_customize_register( \WP_Customize_Manager $wp_customize ) {
	$header_text_controls = array_filter( array(
		$wp_customize->get_control( 'blogname' ),
		$wp_customize->get_control( 'blogdescription' ),
	) );
	foreach ( $header_text_controls as $header_text_control ) {
		$header_text_control->active_callback = 'my_get_header_text_control_active_state';
	}
}
// add_action( 'customize_register', 'my_customize_register', 11 );
/**
 * Get header text control active state.
 *
 * @param \WP_Customize_Control $control Control for site title or tagline.
 * @return bool Active.
 */
function my_get_header_text_control_active_state( \WP_Customize_Control $control ) {
	$setting = $control->manager->get_setting( 'header_textcolor' );
	if ( ! $setting ) {
		return true;
	}
	return 'blank' !== $setting->value();
}