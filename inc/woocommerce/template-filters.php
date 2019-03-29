<?php 

function acorn_woocommerce_loop_add_to_cart_args( $args ) {
	$args['class'] = isset( $args[ 'class' ] ) ? $args[ 'class' ] . ' btn btn-secondary' : 'btn btn-secondary';
	return $args;
}
// add_filter( 'woocommerce_loop_add_to_cart_args', 'acorn_woocommerce_loop_add_to_cart_args' );


function acorn_woocommerce_post_class( $classes ) {
	if ( is_shop() || is_product_taxonomy() ) {
		$columns = wc_get_loop_prop( 'columns' );
		$classes[] = 'd-flex';
		$classes[] = 'col-12';
		$classes[] = 'col-sm-6';
	//	if ( is_archive() ) {
			switch ( $columns ) {
				case '1':
					$classes[] = 'col-lg-12';
					break;
				case '2':
					$classes[] = 'col-lg-6';
					break;
				case '3':
					$classes[] = 'col-lg-4';
					break;
				case '4':
					$classes[] = 'col-lg-3';
					break;
				case '6':
					$classes[] = 'col-lg-2';
					break;
				default:
					$classes[] = 'col-lg-3';
					break;
			}
	//	} else {
	//		$classes[] = 'col-lg-3';
	//	}			
	}

	return $classes;
}
// add_filter( 'post_class', 'acorn_woocommerce_post_class' );
