<?php
/*
Template Name: How to page
*/
get_header(); ?>

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
	<div class="smaller container">
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'classes' => '',
			'post_type' => 'howto',
			'posts_per_page'=> '16',
			'paged' => $paged,
		);
		Overview::render($args);
		?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php numeric_posts_nav(); ?>
	</div>
</section>

<?php get_footer(); ?>
