<?php if(get_field('breakout_banner')): while(has_sub_field('breakout_banner')): ?>
	<?php $image = get_sub_field('image'); ?>
	<section class="section breakout-banner thick" style="background: url(<?php echo $image['sizes']['large']; ?>) center no-repeat;">
		<div class="overlay"></div>
		<div class="container skinny">
			<?php if(get_sub_field('title')): ?>
				<h2><?php the_sub_field('title'); ?></h2>
			<?php endif; ?>
			<?php if(get_sub_field('excerpt')): ?>
				<p><?php the_sub_field('excerpt'); ?></p>
			<?php endif; ?>
			<?php
			$link = get_sub_field('link');
			if($link):
				?>
				<a class="button arrow" target="<?php echo $link['target']; ?>" href="<?php echo $link['link']; ?>"><?php echo $link['title']; ?></a>
			<?php endif; ?>
		</div>
	</section>
<?php endwhile; endif; ?>
