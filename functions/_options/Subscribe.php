<?php
// include this file in your functions
// run this function in you theme Subscribe::render();
// add custom class to get button eg. Subscribe::render('your-class-name-here');

class Subscribe {

  public static function render($class = false) {
    ob_start();
    ?>
    <div class="Subscribe flex <?php echo $class; ?>">
      <div class="one-half">
        <?php  $args = array('acf' => get_field('subscribe_split_title', 'options'));
        SplitTitle::render($args); ?>
      </div>
      <div class="one-half form-half">
        <?php
        $form_object = get_field('subscribe_form', 'options');
        gravity_form_enqueue_scripts($form_object['id'], true);
        gravity_form($form_object['id'], false, false, false, '', true, 11);
        ?>
      </div>
    </div>
    <?php
    echo ob_get_clean();
  }
}

// ACF Social Options
add_action( 'init', 'subscribe_form' );
function subscribe_form(){
  //// ACF Options Page
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Subscribe Form',
      'icon_url' => 'dashicons-admin-customizer',
      'position' => 54
    ));
  }
}

?>
