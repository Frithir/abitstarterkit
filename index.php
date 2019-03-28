<?php
get_header();
?>

<section class="blog-nav--section section thin">
	<div class="container tacenter">
		<ul class="blog-nav--list">
			<?php wp_list_categories(array(
				'hide_title_if_empty' => true,
				'title_li' => '',
				'show_option_all' => 'All'
			)); ?>
		</ul>
	</div>
</section>

<section class="section blog-list">
	<div class="container flex blog-list-container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'components/card-post' ); ?>
		<?php endwhile; ?>
	</div>
</section>

<section class="section hidden">
  <div class="container">
		<?php numeric_posts_nav(); ?>
  </div>
</section>

<?php get_footer(); ?>
