<?php
/*
Template Name: Contact page
*/
get_header(); ?>

<?php if(get_field('two_column_image')): ?>
	<section class="section two-column thick contact">
		<div class="container">
			<?php while(has_sub_field('two_column_image')): ?>
				<div class="row flex">
					<?php	$image = get_sub_field('image');	?>
					<div data-aos="fade-right" class="lazy-parent image-group">
						<div
						class="background-image lazy-child"
						style="background-image: url(<?php echo $image['sizes']['blur']; ?>)"
						data-bg-src="<?php echo $image['sizes']['large']; ?>">
						</div>
					</div>
					<div data-aos="fade-left" class="content">
						<h2><?php the_sub_field('title'); ?></h2>
						<?php the_sub_field('content'); ?>
						<?php if (get_field('email', 'options')): ?>
							<p><strong><a href="mailto:<?= get_field('email', 'options'); ?>"><?= get_field('email', 'options'); ?></a></strong></p>
						<?php endif; ?>
						<?php SocialLinks::render(); ?>
						<?php
							$form_object = get_sub_field('form');
							gravity_form_enqueue_scripts($form_object['id'], true);
							gravity_form($form_object['id'], false, false, false, '', true, 11);
						?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
