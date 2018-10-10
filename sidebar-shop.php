<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acorn
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-4 col-lg-3 col-xl-3">
	<div class="row">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div>
</aside><!-- #secondary -->
