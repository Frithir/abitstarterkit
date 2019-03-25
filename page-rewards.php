<?php
/*
Template Name: Rewards page
*/
get_header(); ?>

<section class="section thin">
	<div class="container">
		<?php
		$args = array('acf' => get_field('rewards_split_title'));
		SplitTitle::render($args);
		?>
	</div>
</section>

<?php if(get_field('reward_pods')): ?>
	<section class="section reward_pods basepad">
		<div class="container flex">
			<?php while(has_sub_field('reward_pods')): ?>
				<div class="rewards_pod">
					<?php if (get_sub_field('number')): ?>
						<div class="number">
							<h3><?php the_sub_field('number'); ?></h3>
							<h4><?php the_sub_field('units'); ?></h4>
						</div>
					<?php endif; ?>
					<?php if (get_sub_field('title')): ?>
						<div class="title arrow_box"><?php the_sub_field('title'); ?></div>
					<?php endif; ?>
					<?php if (get_sub_field('content')): ?>
						<div class="content"><?php the_sub_field('content'); ?></div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>

<section class="section">
	<div class="container ">
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer(); ?>
