<header class="banner fixed-top">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img class="logo" src="/bw/wp-content/themes/bw/dist/images/logo.svg" alt="UCLA Bruin Woods Family Resort at Lake Arrowhead"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault"> -->
    <nav class="nav nav-primary" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
      <!-- </div> -->
  </div>
</header>
