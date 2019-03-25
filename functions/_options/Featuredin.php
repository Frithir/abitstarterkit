<?php
// include this file in your functions
// run this function in you theme Featuredin::render();
// add custom class to get button eg. Featuredin::render('your-class-name-here');
class Featuredin {

  public static function render($class = false) {
    ob_start(); ?>
    <section class="section featured-in">
      <div class="container">
        <h2><?php the_field('featured_title', 'options'); ?></h2>
        <?php the_field('featured_content', 'options'); ?>
        <div class="featured_in-slider flex flickity <?php echo $class; ?>">
          <?php if(get_field('featured_in', 'options')): while(has_sub_field('featured_in', 'options')): ?>
            <a href="<?php the_sub_field('link'); ?>" class="slide featured-link">
              <?php $logo = get_sub_field('logo'); ?>
              <div class="hover">
                <img src="<?php echo $logo['sizes']['400w'] ?>" alt="<?php echo $logo; ?>">
              </div>
            </a>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </section>
    <?php
    echo ob_get_clean();
  }

}

// ACF Options Page
add_action( 'init', 'featured_in' );
function featured_in(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Featured In',
      'icon_url' => 'dashicons-megaphone',
      'position' => 55
    ));
  }
}
