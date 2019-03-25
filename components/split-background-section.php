<section class="section split-background-section">
	<div class="container flex">
		<?php if(get_field('two_column_image')): while(has_sub_field('two_column_image')): ?>
			<div class="one-half">
				<?php $image = get_sub_field('image'); ?>
				<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
			</div>
			<div class="one-half">
				<?php if(get_sub_field('title')): ?>
					<h2><?php the_sub_field('title'); ?></h2>
				<?php endif; ?>
				<?php if(get_sub_field('excerpt')): ?>
					<?php the_sub_field('excerpt'); ?>
				<?php endif; ?>
				<?php
				$link = get_sub_field('link');
				if($link):
					?>
					<a class="button arrow" target="<?php echo $link['target']; ?>" href="<?php echo $link['link']; ?>"><?php echo $link['title']; ?></a>
				<?php endif; ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>
