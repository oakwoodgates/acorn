<?php
/**
 * The template for displaying BuddyPress pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.buddypress.org/themes/
 *
 * @package acorn
 */

get_header(); 
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
 
		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<article <?php post_class(); ?>>
				<?php 
			//	if ( ! ( bp_is_user() || bp_is_group() ) ) {
				if ( bp_is_directory() ) {
					get_template_part( 'template-parts/title' );
				} 
				?>

				<div class="entry-content <?php // echo Acorn_Vars::get_buddypress_entry_content_wrapper() ?>">

					<?php 
					the_content(); ?>

				</div><!-- .entry-content -->
			</article><!-- .bp_* -->

		<?php
		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
