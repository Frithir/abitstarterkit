<header class="header">
  <div class="container flex">
    <div class="left-nav">
      <div class="social">
        <?php
          SocialLinks::render();
        ?>
      </div>
      <?php wp_nav_menu(array('theme_location' => 'top', 'container' => false )); ?>
    </div>

    <a class="logo" href="<?php echo esc_url( home_url() ); ?>">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?> "/>
    </a>

    <div class="right-tools flex">
      <div class="woo-tools">
        <?php if (!is_user_logged_in()) : ?>
          <a href="<?php echo get_permalink(10); ?>" class="woo-login"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
        <?php else: ?>
          <a href="<?php echo get_permalink(10); ?>" class="login"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
        <?php endif; ?>
      </div>
        <div class="cart-contents"><?php global $woocommerce; ?>
          <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <?php if ($woocommerce->cart->cart_contents_count) :?>
              <div class="in-cart"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
            <?php endif; ?>
          </a>
        </div>
        <div class="search">
          <form action="<?php bloginfo('url'); ?>/" method="get" id="search-site" class="flex">
            <input id="s" name="s" class="site-search" type="search" placeholder="Search">
            <input type="hidden" name="post_type" value="product" />
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
    </div>
  </div>
  <div class="header-nav">
    <nav class="container">
      <?php wp_nav_menu(array('theme_location' => 'main', 'container' => false )); ?>
    </nav>
  </div>
  <div class="mobile-nav">
    <a href="javascript:void(0)" class="icon">
      <div class="hamburger">
        <div class="menui top-menu"></div>
        <div class="menui mid-menu"></div>
        <div class="menui bottom-menu"></div>
      </div>
    </a>
    <div class="search mobile-search">
      <div class="center">
        <a href="<?php echo get_permalink(7); ?>" class="login mobile"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
      </div>
      <form action="<?php bloginfo('url'); ?>/" method="get" id="search-site" class="flex">
        <input id="s" name="s" class="site-search" type="search" placeholder="Search">
        <input type="hidden" name="post_type" value="product" />
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'container'=> false ) ); ?>
  </div>
</header>
