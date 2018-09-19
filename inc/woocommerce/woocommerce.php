<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package acorn
 */

 /**
  * Library files.
  */
 $files = array(
	 'header-cart', // Set up the header cart
	 'scripts', // Enqueue the assets.
	 'sidebars', // Register widget areas.
	 'template-hooks', // Add (new) and remove (default) template actions.
 );
 foreach ( $files as $file ) {
	 require get_template_directory() . '/inc/woocommerce/'.$file.'.php';
 }

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function acorn_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'acorn_woocommerce_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function acorn_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'acorn_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function acorn_woocommerce_products_per_page() {
	return 12;
}
//add_filter( 'loop_shop_per_page', 'acorn_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function acorn_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'acorn_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function acorn_woocommerce_loop_columns() {
	return 3;
}
//add_filter( 'loop_shop_columns', 'acorn_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function acorn_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'acorn_woocommerce_related_products_args' );
