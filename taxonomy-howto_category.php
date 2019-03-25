<?php get_header(); ?>

<section class="woo-banner section">
	<div class="lazy-parent">
		<?php $image = get_field('page_header_image', 18956); ?>
		<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
	</div>
	<div class="container">
		<h1 class="page-title"><?php single_term_title(); ?> </h1>
	</div>
</section>


<section class="blog-nav--section section thin">
	<div class="container tacenter">
		<ul class="blog-nav--list">
			<?php
			$terms = get_terms('howto_category');
			foreach($terms as $term) :
				$term_link = get_term_link( $term )
				?>
				<li>
					<a href="<?= $term_link; ?>" title="<?= $term->name; ?>">
						<?= $term->name; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section blog-list">
	<div class="smaller container flex">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'components/card-howto' ); ?>
		<?php endwhile; ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php numeric_posts_nav(); ?>
	</div>
</section>

<?php get_footer(); ?>
