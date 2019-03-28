<?php
/*
Template Name: Woocommerce page
*/
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="header-banner section thin woo-title-section">
		<div class="container tacenter">
			<h1 class="page_header_title"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="section thin">
		<div class="container smaller">
			<?php the_content() ?>
		</div>
	</section>

<?php endwhile; ?>

<?php get_footer(); ?>
