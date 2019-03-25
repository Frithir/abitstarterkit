<?php
  function register_custom_menu() {
    register_nav_menus(
      array(
      	'main_left' => __('Main Navigation left'),
        'mobile' => __('Mobile Navigation'),
        'connect' => __('Connect Navigation'),
        'community' => __('Community Navigation'),
        'information' => __('Information Navigation'),
        'shop' => __('Shop Navigation'),
      )
    );
  }
  add_action( 'init', 'register_custom_menu' );
