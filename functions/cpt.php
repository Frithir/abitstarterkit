<?php
add_action( 'init', 'create_custom_taxonomies' );
function create_custom_taxonomies() {
	$labels = array(
		"name" => 'Colours',
		"singular_name" => 'Colour',
		'add_new_item' => 'Add New Colour',
		'new_item_name' => "New Colour"
	);
	$args = array(
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"show_admin_column" => true,
		"show_in_rest" => false,
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "colour", array( "product" ), $args );

	$labels = array(
		"name" => 'Formulations',
		"singular_name" => 'Formulation',
		'add_new_item' => 'Add New Formulation',
		'new_item_name' => "New Formulation"
	);
	$args = array(
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"show_admin_column" => true,
		"show_in_rest" => false,
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "formulation", array( "product" ), $args );

	$labels = array(
		"name" => 'Categories',
		"singular_name" => 'Category',
		'add_new_item' => 'Add New Category',
		'new_item_name' => "New Category"
	);
	$args = array(
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"show_admin_column" => true,
		"show_in_rest" => false,
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "howto_category", array( "howto" ), $args );
}



// Custom filter products
// add additional arg to set query for setting and removing max and min price
function setQuery($target, $arg, $url = false){
	if(!$url) {
		$url = $_SERVER['QUERY_STRING'];
	}
	parse_str($url, $vals);
	if(gettype($target) === 'array') {
		foreach ($target as $num) {
			$vals[$num] = $arg;
			if($arg === ''){
				unset($vals[$num]);
			}
		}
	} else {
		$vals[$target] = $arg;
		if($arg === ''){
			unset($vals[$target]);
		}
	}
	$new_query = '?' . urldecode(http_build_query($vals));
	return $new_query;
}

// Woo list custom taxonomies
function get_terms_checkbox($taxonomies, $args){
	$myterms = get_terms($taxonomies, $args);
	foreach($myterms as $term){
		$root_url = get_bloginfo('url');
		$term_taxonomy=$term->taxonomy;
		$term_slug=$term->slug;
		$term_name =$term->name;
		$link = $root_url.'/'.$term_taxonomy.'/'.$term_slug;
		$output .="<a class='barba ".$term_slug."' href='".$link."'>".$term_name."</a>";
	}
	return $output;
}

// Creates How to Custom Post Type
function howto_init() {
	$args = array(
		'label' => 'How to',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, 
		'rewrite' => array('slug' => 'how-to'),
		'query_var' => true,
		'menu_icon' => 'dashicons-video-alt',
		'supports' => array(
			'title',
			'editor',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',)
		);
		register_post_type( 'howto', $args );
	}
	add_action( 'init', 'howto_init' );
