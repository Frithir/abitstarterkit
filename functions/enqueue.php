<?php
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// ENQUEUE

//CSS auto version
add_action( 'wp_enqueue_scripts', 'flex_non_cached_stylesheet' );
function flex_non_cached_stylesheet(){

  wp_enqueue_style( 'typekit', 'https://use.typekit.net/hxi3lxc.css');
  wp_enqueue_style( 'googleapis', 'https://fonts.googleapis.com/css?family=Raleway:100,200,300');
  wp_enqueue_style( 'photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css');
  wp_enqueue_style( 'photoswipe-skin', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css');

  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/c81fe3ea32.css');
  wp_enqueue_style( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css');


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
  wp_enqueue_script('stickyKit', 'https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js');
  wp_enqueue_script('jQueryZoom', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js');
  wp_enqueue_script('PhotoSwipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js');
  wp_enqueue_script('PhotoSwipeUI_Default', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js');

  wp_enqueue_script(
    'appJS',
    get_template_directory_uri().'/dist/app.min.js',
    null,
    filemtime( get_stylesheet_directory().'/dist/app.min.js' ),
		true
  );


}
?>
