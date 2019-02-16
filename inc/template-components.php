<?php 

function acorn_badge( $content, $link = '', $variation = '', $pill = false, $classes = '' ) {

	if ( $classes ) {
		$classes = 'badge ' . $classes;
	} else {
		$classes = 'badge';
	}

	if ( $pill ) 
		$classes .= ' badge-pill';

	if ( $variation ) 
		$classes .= ' badge-' . $variation;

	if ( $link ) {
		echo '<a href="' . $link . '" class="' . $classes . '">' . $content . '</a> ';
	} else {
		echo '<span class="' . $classes . '">' . $content . '</span> ';
	}
}
