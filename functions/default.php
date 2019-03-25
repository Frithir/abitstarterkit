<?php
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Default Functions

function mytheme_setup_theme_supported_features() {
  add_theme_support( 'editor-color-palette', array(
    array(
      'name' => __( 'strong magenta', 'themeLangDomain' ),
      'slug' => 'strong-magenta',
      'color' => '#a156b4',
    ),
    array(
      'name' => __( 'light grayish magenta', 'themeLangDomain' ),
      'slug' => 'light-grayish-magenta',
      'color' => '#d0a5db',
    ),
    array(
      'name' => __( 'very light gray', 'themeLangDomain' ),
      'slug' => 'very-light-gray',
      'color' => '#eee',
    ),
    array(
      'name' => __( 'very dark gray', 'themeLangDomain' ),
      'slug' => 'very-dark-gray',
      'color' => '#444',
    ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );




/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// Title Tag Support

function theme_slug_setup() {
  add_theme_support( 'align-wide' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'align-wide' );
  add_theme_support( 'editor-styles' );
  add_editor_style( 'style-editor.css' );
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );

}
add_action( 'after_setup_theme', 'theme_slug_setup' );

///////////////////////////////////////////////////////
// No pingbacks for security
// http://blog.sucuri.net/2014/03/more-than-162000-wordpress-sites-used-for-distributed-denial-of-service-attack.html
add_filter( 'xmlrpc_methods', function( $methods ) {
  unset( $methods['pingback.ping'] );
  return $methods;
} );

//// Nice url
function niceurl($url) {
  $url = str_replace('http://', '', $url);
  $url = str_replace('https://', '', $url);
  $url = str_replace('www.', '', $url);
  $url = rtrim($url, "/");
  return $url;
}
// Usage
// niceurl('http://google.com.au/');
/// outputs -> google.com.au

///////////////////////////////////////////////////////
//Add an excerpt box for pages
if ( function_exists('add_post_type_support') ){
  add_action('init', 'add_page_excerpts');
  function add_page_excerpts(){
    add_post_type_support( 'page', 'excerpt' );
  }
}
?>
