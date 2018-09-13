<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>

  <header class="entry-header">
    <?php
    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    if ( 'post' === get_post_type() ) :
      ?>
      <div class="entry-meta small">
        <?php
        acorn_posted_on();
        acorn_posted_by();
        ?>
      </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->
  <?php	acorn_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
    the_excerpt();
    ?>
  </div><!-- .entry-content -->
  <?php acorn_entry_footer(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
