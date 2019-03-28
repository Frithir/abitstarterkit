<?php get_header();

$term = get_queried_object();
$page_header_script = get_field('page_header_script', 104);
?>

<section class="woo-banner section">
	<div class="lazy-parent">
		<?php $image = get_field('featured_image', $term);
		if (!$image) $image = get_field('page_header_image', 104)
		?>
		<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
	</div>
</section>

<section class="header-banner section thin woo-title-section">
	<div class="container tacenter">
			<?php if ($page_header_script): ?>
				<span class="script"><?= $page_header_script; ?></span>
			<?php endif; ?>
			<h1 class="page_header_title"><?php single_term_title(); ?></h1>
	</div>
</section>

<section class="blog-nav--section section thin">
	<div class="container tacenter">
		<ul class="blog-nav--list">
			<li>
				<a href="/lookbook/" title="All" <?= strpos('lookbook', $_SERVER['REQUEST_URI']) > -1 ? 'class="active"' : '' ?>>
					All
				</a>
			</li>
			<?php
			$terms = get_terms('lookbook_category');
			foreach($terms as $term) :
				$term_link = get_term_link( $term )
				?>
				<li>
					<a href="<?= $term_link; ?>" title="<?= $term->name; ?>" <?= strpos($term_link, $_SERVER['REQUEST_URI']) > 0 ? 'class="active"' : '' ?>>
						<?= $term->name; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section blog-list">
	<div class="container flex">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'components/card-lookbook' ); ?>
		<?php endwhile; ?>
	</div>
</section>

<section class="section hidden">
	<div class="container">
		<?php numeric_posts_nav(); ?>
	</div>
</section>

<?php get_footer(); ?>
