<header class="banner">
  <a class="skip-link screen-reader-text sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'acorn' ); ?></a>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <?php the_custom_logo(); ?>

      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <span class="site-title d-block w-100 text-center font-weight-bold"><?php bloginfo( 'name' ); ?></span>
        <?php $acorn_description = get_bloginfo( 'description', 'display' );
        if ( $acorn_description || is_customize_preview() ) :
          ?>
          <span class="site-description d-block w-100 text-center font-italic small"> <?php echo $acorn_description; /* WPCS: xss ok. */ ?></span>
        <?php endif; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
        'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'      => 'navbar-nav ml-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker()
      ) );
      ?>
    </div>
  </nav>
</header>
