<?php
function register_custom_menu() {
  register_nav_menus(
    array(
      'main' => __('Main Navigation'),
      'mobile' => __('Mobile Navigation'),
    )
  );
}
add_action( 'init', 'register_custom_menu' );
