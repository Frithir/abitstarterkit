<?php
// ACF Google Maps
function acf_scripts(){
  wp_enqueue_script( 'maps', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDJYspP2AZKaXukHbxyX4qdvqibk15vyuI', null, null, true);
}
add_action( 'wp_enqueue_scripts', 'acf_scripts' );

function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyDJYspP2AZKaXukHbxyX4qdvqibk15vyuI');
}
add_action('acf/init', 'my_acf_init');


// ACF Keyboard Shortcuts
function acf_keyboardshortcuts() { ?>
  <script type="text/javascript">
  console.log(`
    ---

    ACF keyboard shortcuts:
    A   – new field
    ESC – close field

    ---
    `)
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.querySelectorAll('.acf-field-object.open a[title="Close Field"]').forEach(btn => btn.click())
      }
      if ((e.target.nodeName === 'BODY' || e.target.nodeName === 'DIV') && e.key === 'a') {
        const addButton = Array.from(document.querySelectorAll('.acf-hl.acf-tfoot a.add-field')).pop()
        if (addButton) addButton.click()
      }
      if (e.key === 's' && e.metaKey === true) {
        e.preventDefault()
        document.querySelector('#publishing-action input[name="save"]').click()
      }
    })
    </script>
  <?php }
  add_action('acf/input/admin_footer', 'acf_keyboardshortcuts');

  // add filter option tmplate uses
  // $wysiwyg = get_field('editor');
  // echo apply_filters('the_content', $wysiwyg);
  add_filter('acf/format_value/type=wysiwyg', 'format_value_wysiwyg', 10, 3);
  function format_value_wysiwyg( $value, $post_id, $field ) {
    $value = apply_filters( 'the_content', $value );
    return $value;
  }

  // ACF custom field validation
  add_filter('acf/validate_value/name=text', 'my_acf_validate_value', 10, 4);
  function my_acf_validate_value($valid, $value, $field, $input) {
    if ($valid && strlen(strip_tags($value)) > 250) {
      $valid = 'You can\'t enter more that 250 chars';
    }
    return $valid;
  }

  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
    acf_add_options_sub_page('Shipping message');
    acf_add_options_sub_page('Woocommerce Checkout Minimums');
  }

  ?>
