<?php
function register_custom_menu() {
  register_nav_menus(
    array(
      'main_left' => __('Main Left Navigation'),
      'main_right' => __('Main Right Navigation'),
      'mobile' => __('Mobile Navigation'),
      'footer' => __('Footer Navigation'),
    )
  );
}
add_action( 'init', 'register_custom_menu' );
