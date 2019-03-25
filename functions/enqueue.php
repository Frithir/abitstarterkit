<?php
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// ENQUEUE

//CSS auto version
add_action( 'wp_enqueue_scripts', 'flex_non_cached_stylesheet' );
function flex_non_cached_stylesheet(){

  wp_enqueue_style(
    'style-main',
    get_stylesheet_directory_uri().'/dist/app.min.css',
    array(),
    filemtime( get_stylesheet_directory().'/dist/app.min.css' )
  );

  wp_enqueue_script('jquery');
  wp_enqueue_script(
    'polly',
    'https://cdn.polyfill.io/v2/polyfill.min.js',
    null,
    null,
		true
  );
  wp_enqueue_script(
    'appJS',
    get_template_directory_uri().'/dist/app.min.js',
    null,
    filemtime( get_stylesheet_directory().'/dist/app.min.js' ),
		true
  );

  // Font Awesome
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/c81fe3ea32.css');
  wp_enqueue_style( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css');

}
?>
