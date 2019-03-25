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

	<?php get_template_part( 'components/inc-edit' ); ?>

	<header class="header">
		<div class="container">
			<a class="logo" href="<?= esc_url( home_url() ); ?>">
				<img class="default-logo" src="<?= esc_url( get_template_directory_uri() ) . '/images/logo.svg'; ?>" alt="<?php bloginfo('name'); ?> "/>
			</a>
			<?php // get_template_part( 'components/headerShop' ); ?>
		</div>
	</header>
