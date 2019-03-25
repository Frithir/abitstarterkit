<header class="header">
  <div class="container flex">
    <?php wp_nav_menu(array('theme_location' => 'main', 'container' => false )); ?>
    <a class="logo" href="<?php echo esc_url( home_url() ); ?>">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?> "/>
    </a>
    <?php wp_nav_menu(array('theme_location' => 'main', 'container' => false )); ?>
  </div>
  <div class="mobile-nav">
    <a href="javascript:void(0)" class="icon">
      <div class="hamburger">
        <div class="menui top-menu"></div>
        <div class="menui mid-menu"></div>
        <div class="menui bottom-menu"></div>
      </div>
    </a>
  </div>
</header>
