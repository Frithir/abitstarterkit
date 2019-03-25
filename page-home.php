<?php
/*
Template Name: Home page
*/
get_header(); ?>


<?php if(get_field('banner')): ?>
	<section class="section home-banner flex">
		<?php while(has_sub_field('banner')): ?>
			<div data-aos="fade-right" class="text-half">
				<?php if (get_sub_field('script')): ?>
					<h1 class="script"><?php the_sub_field('script') ?></h1>
				<?php endif; ?>
				<div class="short">
					<?php if (get_sub_field('bold')): ?>
						<h2 class="bold"><?php the_sub_field('bold') ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('content')): ?>
						<?php the_sub_field('content') ?>
					<?php endif; ?>
					<div class="flex flex-links">
						<?php
						$args = array(
							'acf' => get_sub_field('link_1'),
							'classes' => 'button button-outline'
						);
						Link::render($args);
						?>
						<?php
						$args = array(
							'acf' => get_sub_field('link_2'),
							'classes' => 'button button-outline'
						);
						Link::render($args);
						?>
					</div>
				</div>
			</div>
			<div  data-aos="fade-left" class="image-half lazy-parent">
				<?php $image = get_sub_field('image'); ?>
				<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
			</div>
		<?php endwhile; ?>
	</section>
<?php endif; ?>

<section class="section featured-product">
	<div class="container">
		<?php
		$args = array('acf' => get_field('featured_products_split_title'));
		SplitTitle::render($args);
		?>
		<?php
		$args = array(
			'classes' => '',
			'slider' => true,
			'post_type' => 'product',
			'posts_per_page'=> '16',
			'tax_query' => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
				),
			),
		);
		Overview::render($args);
		?>
		<div class="tacenter">
			<a class="link" href="<?php echo get_permalink(39) ?>">Shop all</a>
		</div>
	</div>
</section>

<?php if(get_field('parent_categories')): ?>
	<section class="section featured-categories">
		<div class="flex lazy-parent">
			<?php $i = 0; while(has_sub_field('parent_categories')):
				$Link = get_sub_field('url');	?>
				<a data-aos="fade-down"
			     data-aos-easing="linear"
			     data-aos-duration="<?= $i; ?>" class="category-link" href="<?= get_term_link( $Link, 'product_cat' ); ?>">
					<?php $image = get_sub_field('image'); ?>
					<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['sizes']['large']; ?>"></div>
					<div class="relative">
						<?php
						$args = array('acf' => get_sub_field('category_split_title'));
						SplitTitle::render($args);
						?>
						<div class="link">shop now</div>
					</div>
				</a>
			<?php $i = $i + 500; endwhile; ?>
		</div>
	</section>
<?php endif; ?>

<div class="background-wrap">
	<img class="background-wrap-img" src="<?= esc_url( get_template_directory_uri() ) . '/images/background-wrap.png'; ?>" alt="background" />
	<?php if(get_field('our_story')): ?>
		<section class="section our-story">
			<div class="container flex">
				<?php while(has_sub_field('our_story')): ?>
					<div data-aos="fade-right" class="one-third story-image lazy-parent">
						<?php $image = get_sub_field('image');?>
						<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['sizes']['large']; ?>"></div>
					</div>
					<div data-aos="fade-left" class="two-thirds">
						<?php
						$args = array('acf' => get_sub_field('story_split_title'));
						SplitTitle::render($args);
						?>
						<?php the_sub_field('content'); ?>
						<?php
						$args = array(
							'acf' => get_sub_field('url'),
							'classes' => 'link'
						);
						Link::render($args);
						?>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>

	<section class="section featured-posts">
		<div class="container">
			<?php
			$args = array('acf' => get_field('journal_split_title'));
			SplitTitle::render($args);
			?>
			<?php
			$args = array(
				'classes' => '',
				'post_type' => 'post',
				'posts_per_page'=> '3',
			);
			Overview::render($args);
			?>
			<div class="tacenter">
				<br>
				<a class="link" href="<?= get_permalink(7147); ?>">View journal</a>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
