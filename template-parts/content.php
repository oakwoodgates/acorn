<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acorn
 */

?>
<?php 
if ( is_singular() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'template-parts/title' ); ?>

		<?php acorn_post_thumbnail(); ?>

		<div class="entry-content <?php echo acorn_entry_content_container_class() ?>">
			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acorn' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php acorn_entry_footer(); ?>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php else :
	get_template_part( 'template-parts/loop' );
endif; 
