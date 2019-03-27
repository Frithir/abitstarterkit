<header class="header">
  <div class="container">
    <a class="logo" href="<?= esc_url( home_url() ); ?>">
      <img class="default-logo" src="<?= esc_url( get_template_directory_uri() ) . '/images/logo.svg'; ?>" alt="<?php bloginfo('name'); ?> "/>
    </a>
    <?php wp_nav_menu(array('container' => false )); ?>
  </div>
</header>
