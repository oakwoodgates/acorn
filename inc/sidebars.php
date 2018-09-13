<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acorn_widgets_init() {
  register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'acorn' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'acorn' ),
		'before_widget' => '<section id="%1$s" class="widget mb-2 col-12 col-md-6 col-lg-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
  register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'acorn' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'acorn' ),
		'before_widget' => '<section id="%1$s" class="widget mb-2 col-12 col-md-6 col-lg-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'acorn_widgets_init' );
