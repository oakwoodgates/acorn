<?php
$class = is_singular() ? 'entry-header' : 'page-header';
?>

<header class="jumbotron jumbotron-fluid bg-dark text-light text-center <?php echo $class ?>">
	<div class="container">
		<?php
		if ( is_home() && ! is_front_page() ) {
			?><h1 class="page-title text-uppercase"><?php single_post_title(); ?></h1><?php
		} elseif ( is_singular() ) {
				the_title( '<h1 class="entry-title text-uppercase">', '</h1>' );
				if ( 'post' === get_post_type() ) :
					?>
					<p class="entry-meta lead">
						<?php
						acorn_posted_on();
						acorn_posted_by();
						?>
					</p><!-- .entry-meta -->
				<?php endif;
		} else {
			the_archive_title( '<h1 class="page-title text-uppercase">', '</h1>' );
			the_archive_description( '<div class="archive-description lead">', '</div>' );
		}
		?>
	</div>
</header>
