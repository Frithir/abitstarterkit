<?php

add_image_size( 'blur', 10, 0, false );

add_image_size( '800w', 800, 0, false );
add_image_size( '1800w', 1800, 0, false );
// crops
add_image_size( '600x800', 600, 800, true );
add_image_size( '800x800', 800, 800, true );


// IMAGE QUALITY
function gpp_jpeg_quality_callback($arg) {
  return (int)75; // change 100 to whatever you prefer, but don't go below 60
}
add_filter('jpeg_quality', 'gpp_jpeg_quality_callback');

// alt text fix
function my_set_image_meta_upon_image_upload( $post_ID ) {
  // Check if uploaded file is an image, else do nothing
  if ( wp_attachment_is_image( $post_ID ) ) {
    $my_image_title = get_post( $post_ID )->post_title;
    // Sanitize the title:  remove hyphens, underscores & extra spaces:
    $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
    // Sanitize the title:  capitalize first letter of every word (other letters lower case):
    $my_image_title = ucwords( strtolower( $my_image_title ) );
    // Create an array with the image meta (Title, Caption, Description) to be updated
    // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
    $my_image_meta = array(
      'ID'        => $post_ID,            // Specify the image (ID) to be updated
      'post_title'    => $my_image_title,        // Set image Title to sanitized title
      //'post_excerpt'    => $my_image_title,        // Set image Caption (Excerpt) to sanitized title
      //'post_content'    => $my_image_title,        // Set image Description (Content) to sanitized title
    );
    // Set the image Alt-Text
    update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );
    // Set the image meta (e.g. Title, Excerpt, Content)
    wp_update_post( $my_image_meta );
  }
}
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
