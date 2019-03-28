<header class="header">

  <div class="container flex desktop-nav">
    <div class="header-sides">
      <div class="flex">
        <?php wp_nav_menu(array('theme_location' => 'main_left', 'container' => false )); ?>
      </div>
    </div>
    <a class="logo" href="<?= esc_url( home_url() ); ?>">
      <img class="default-logo" src="<?= esc_url( get_template_directory_uri() ) . '/images/logo.svg'; ?>" alt="<?php bloginfo('name'); ?> "/>
    </a>
    <div class="header-sides header-sides-right">
      <div class="flex">
        <?php wp_nav_menu(array('theme_location' => 'main_right', 'container' => false )); ?>
      </div>
      <a class="search-link" title="search-site" href="."><svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"><path d="M14.066 13.55c2.897-3.174 2.812-8.116-.254-11.182C10.657-.79 5.525-.79 2.37 2.368A8.048 8.048 0 0 0 0 8.092c0 2.162.843 4.196 2.37 5.724a8.07 8.07 0 0 0 5.721 2.366 8.065 8.065 0 0 0 5.455-2.113l3.823 3.825a.365.365 0 0 0 .262.106.383.383 0 0 0 .262-.106.368.368 0 0 0 0-.52l-3.827-3.825zm-11.177-.254A7.317 7.317 0 0 1 .737 8.092c0-1.966.765-3.812 2.152-5.204A7.34 7.34 0 0 1 8.091.734a7.33 7.33 0 0 1 5.201 2.154c2.87 2.87 2.87 7.537 0 10.408a7.361 7.361 0 0 1-10.403 0z" fill="currentColor" fill-rule="evenodd"/></svg></a>
    </div>
  </div>

  <div class="mobile-nav">
    <div class="mobile-heading">
      <a href="javascript:void(0)" class="icon burger">
        <div class="hamburger">
          <div class="menui top-menu"></div>
          <div class="menui mid-menu"></div>
          <div class="menui bottom-menu"></div>
        </div>
      </a>

      <a class="logo" href="<?= esc_url( home_url() ); ?>">
        <img class="default-logo" src="<?= esc_url( get_template_directory_uri() ) . '/images/logo.svg'; ?>" alt="<?php bloginfo('name'); ?> "/>
      </a>

      <a class="search-link" title="search-site" href=".">
        <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"><path d="M14.066 13.55c2.897-3.174 2.812-8.116-.254-11.182C10.657-.79 5.525-.79 2.37 2.368A8.048 8.048 0 0 0 0 8.092c0 2.162.843 4.196 2.37 5.724a8.07 8.07 0 0 0 5.721 2.366 8.065 8.065 0 0 0 5.455-2.113l3.823 3.825a.365.365 0 0 0 .262.106.383.383 0 0 0 .262-.106.368.368 0 0 0 0-.52l-3.827-3.825zm-11.177-.254A7.317 7.317 0 0 1 .737 8.092c0-1.966.765-3.812 2.152-5.204A7.34 7.34 0 0 1 8.091.734a7.33 7.33 0 0 1 5.201 2.154c2.87 2.87 2.87 7.537 0 10.408a7.361 7.361 0 0 1-10.403 0z" fill="currentColor" fill-rule="evenodd"/></svg>
      </a>
    </div>
  </div>

</header>

<div class="mobile-nav-overlay">
  <div class="close"></div>
  <div class="mobile-main">
    <?php wp_nav_menu(array('theme_location' => 'mobile', 'container' => false )); ?>
  </div>
</div>

<div class="search-overlay">
  <div class="close"></div>
  <form action="/" method="get" id="search-site" class="flex-row">
    <input id="s" name="s" class="site-search" type="search" placeholder="Type here to search">
    <input type="hidden" name="post_type" value="product" />
    <button name="search-site" type="submit"></button>
  </form>
</div>
