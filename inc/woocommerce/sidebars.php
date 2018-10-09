<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acorn_woocommerce_widgets_init() {
  register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'acorn' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here.', 'acorn' ),
		'before_widget' => '<section id="%1$s" class="widget mb-2 col-12 col-sm-6 col-md-12 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'acorn_woocommerce_widgets_init' );
