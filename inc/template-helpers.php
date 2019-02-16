<?php 

/*
 * Get an array of terms (and thier data) in a taxonomy for a post
 */
function acorn_get_the_terms_array( $id = 0, $taxonomy = 'post_tag' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) || empty( $terms ) )
		return array();

	$array = array();

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( ! is_wp_error( $link ) ) {
			$array[] = array(
				'url' => esc_url( $link ),
				'name' => $term->name
			);
		}
	}

	return $array;
}
