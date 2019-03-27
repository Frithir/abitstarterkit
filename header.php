<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="msvalidate.01" content="B0112812CA622A13C327AF572E2BA5B5" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- remove dev bg -->
	<div class="background-image" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/images/uploads/themebg0.jpg'); height: 100vh; width: 100%; position: fixed"></div>
	<?php
		get_template_part( 'components/inc-edit' );
		get_template_part( 'layouts/header-shop' );
	?>
