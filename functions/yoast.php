<?php
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// Yoast
// Move metabox to bottom
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

add_filter( 'manage_edit-post_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-page_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
//woo
//add_filter( 'manage_edit-product_columns', 'yoast_seo_admin_remove_columns', 10, 1 );

function yoast_seo_admin_remove_columns( $columns ) {
  unset($columns['wpseo-score']);
  unset($columns['wpseo-score-readability']);
  unset($columns['wpseo-title']);
  unset($columns['wpseo-metadesc']);
  unset($columns['wpseo-focuskw']);
  unset($columns['wpseo-links']);
  unset($columns['wpseo-linked']);
  return $columns;
}

/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// WP-LOGIN Autofocus Fix
add_action("login_form", "kill_wp_attempt_focus");
function kill_wp_attempt_focus() {
    global $error;
    $error = TRUE;
}
?>
