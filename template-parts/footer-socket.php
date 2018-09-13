<div class="site-info bg-secondary text-center py-2">
  <div class="container-fluid">
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'acorn' ) ); ?>">
      <?php
      /* translators: %s: CMS name, i.e. WordPress. */
      printf( esc_html__( 'Proudly powered by %s', 'acorn' ), 'WordPress' );
      ?>
    </a>
    <span class="sep"> | </span>
    <?php
    /* translators: 1: Theme name, 2: Theme author. */
    printf( esc_html__( 'Theme: %1$s by %2$s.', 'acorn' ), 'acorn', '<a href="http://underscores.me/">Underscores.me</a>' );
    ?>
  </div>
</div><!-- .site-info -->
