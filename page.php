<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php // get_template_part( 'layouts/content-layouts' ); ?>

	<!--sample only-->
	<section class="section ">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</section>
	<!--end sample only-->

<?php endwhile; ?>

<?php get_footer(); ?>
