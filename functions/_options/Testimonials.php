<?php
// include this file in your functions
// run this function in you theme Testimonials::render();
// add custom class to get button eg. Testimonials::render('your-class-name-here');

class Testimonials {

  public static function render($class = false) {
    ob_start();
    ?>
    <h2><?php the_field('title', 'options'); ?></h2>
		<div class="testimonial-slider flickity <?php echo $class; ?>">
			<?php if(get_field('testimonial', 'options')): while(has_sub_field('testimonial', 'options')): ?>
				<div class="slide">
					<blockquote>
						<p><?php the_sub_field('quote'); ?></p>
					</blockquote>
					<p class="tacenter">
						<?php the_sub_field('name'); ?> |
						<?php the_sub_field('customer_type'); ?>
					</p>
				</div>
			<?php endwhile; endif; ?>
		</div>
    <?php
    echo ob_get_clean();
  }
}

// ACF Social Options
add_action( 'init', 'testimonal' );
function testimonal() {
  //// ACF Options Page
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Testimonals',
      'icon_url' => 'dashicons-editor-quote',
      'position' => 54
    ));
  }
}

?>
