<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) 
					 get_template_part( 'template-parts/title' );

			//	$container_class = ( ! is_singular() ) ? 'container-fluid' : 'container';
				?>

				<div class="container" style="max-width: 750px">

					<?php

				//	if ( is_singular() ) :
						/* Start the Loop */
				//		while ( have_posts() ) :
				//			the_post();
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
				//			get_template_part( 'template-parts/content',  get_post_type() );
				//		endwhile;
				//	else :
				//		acorn_template_part( 'components/media-list' );
					//	get_template_part( 'template-parts/components/media-list' );
				//	endif;

				//	the_posts_navigation();
					$template = 'row';

					get_template_part( 'template-parts/components/loop/' . $template, get_post_type() );
				/*	?>
					<ul class="list-unstyled">
						<?php
						while ( have_posts() ) :
							the_post();
							acorn_template_part( 'single/media-object' );
						endwhile;

						
						?>						
					</ul>
					<?php 
					*/
					the_posts_navigation();
					?>
				</div>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
