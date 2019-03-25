<section class="section welcome thick">
	<div class="container flex">
		<?php if(get_field('welcome')): while(has_sub_field('welcome')): ?>
			<div class="one-half">
				<?php if(get_sub_field('extended_title')): ?>
					<h1><?php the_sub_field('extended_title'); ?></h1>
				<?php endif; ?>
			</div>
			<div class="one-half">
				<?php if(get_sub_field('content')): ?>
					<?php the_sub_field('content'); ?>
				<?php endif; ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>
