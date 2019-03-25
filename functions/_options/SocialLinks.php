<?php
// include this file in your functions
// run this function in you theme SocialLinks::render();
// add custom class to get button eg. SocialLinks::render($show_labels = true or false);

class SocialLinks {

  public static function render($show_labels = false) {

    $custom_icons = array(
      'icons' => array(
        'twitter' => 'fa-twitter',
        'facebook' => 'fa-facebook',
        'instagram' => 'fa-instagram',
        'linkedin' => 'fa-linkedin',
        'youtube' => 'fa-youtube',
        'email' => 'fa-envelope',
        'pinterest' => 'fa-pinterest-p',
        'google' => 'fa-google-plus'
      )
    );

    $social_links = get_field('social_links', 'options');
    if ($social_links) :
      ob_start();
      ?>
      <ul class="social_links">
        <?php foreach ($social_links as $link) : ?>
          <li>
            <a target="_blank" href="<?= $link['url'] ?>">
              <i class="fa <?= $custom_icons['icons'][$link['name']['value']] ?>" aria-hidden="true"></i>
              <?= $show_labels ? $link['name']['label'] : '' ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
      <?php
    endif;
    echo ob_get_clean();
  }
}

//// Options Page
add_action( 'init', 'social' );
function social(){
  //// ACF Options Page
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Social Media',
      'icon_url' => 'dashicons-thumbs-up',
      'position' => 54
    ));
  }
}
