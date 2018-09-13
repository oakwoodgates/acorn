<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_template_part( 'template-parts/title' ); ?>
				<div class="entry-content container">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div><!-- .entry-content -->
				<?php if ( get_edit_post_link() ) : ?>
					<?php acorn_entry_footer(); ?>
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php
		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
