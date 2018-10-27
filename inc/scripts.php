<?php
/**
 * Enqueue scripts and styles.
 */
function acorn_scripts() {
//	wp_enqueue_style( 'acorn-theme', get_stylesheet_uri() );
	wp_enqueue_style( 'acorn-style', get_template_directory_uri() . '/assets/css/main.css', '', filemtime( get_template_directory() . '/assets/css/main.css' ) );

	wp_enqueue_script( 'main-acorn', get_template_directory_uri() . '/assets/js/app.min.js', array(), '20151215', true );
	wp_enqueue_script( 'acorn-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acorn_scripts' );
