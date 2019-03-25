<section class="content-layouts-section ">
	<div data-aos="fade-up" class="container skinny content-layouts">

		<?php if(get_the_content()): ?>
			<div class="pullout layouts">
				<br>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>

		<?php if( have_rows('layouts') ): while ( have_rows('layouts') ) : the_row(); ?>
			<?php if( get_row_layout() == 'fullwidth' ): ?>
				<div class="pullout layouts">
					<?php the_sub_field('content'); ?>
				</div>
			<?php elseif( get_row_layout() == 'two_columns' ): ?>
				<div class="flex-start layouts">
					<div class="one-half">
						<?php the_sub_field('left_content'); ?>
					</div>
					<div class="one-half">
						<?php the_sub_field('right_content'); ?>
					</div>
				</div>
			<?php elseif( get_row_layout() == 'blockquote' ): ?>
				<div class="layouts bquote">
					<blockquote>
						<p>
							<?php the_sub_field('quote'); ?>
						</p>
					</blockquote>
				</div>
			<?php elseif( get_row_layout() == 'galleries' ): ?>
				<div class="gallery-wrap layouts">
					<?php if (get_sub_field('gallery_title')): ?>
						<h3 class="title">
							<?php the_sub_field('gallery_title'); ?>
						</h3>
					<?php endif; ?>
					<div class="gallery slider flickity">
						<?php $i = 0; if(get_sub_field('gallery')): while(has_sub_field('gallery')): ?>
							<?php $attachment = get_sub_field('images');  ?>
							<img class="slide" src="<?php echo $attachment['sizes']['large']; ?>">
							<?php $i++; endwhile; endif; ?>
						</div>
					</div>
				<?php elseif( get_row_layout() == 'accordion_section' ): ?>
					<div class="layouts">
						<h2 class="Accordion--section-title"><?= get_sub_field('section_title'); ?></h2>
						<?php
						$args = array(
							'acf' => get_sub_field('accordion'),
						);
						Accordion::render($args);
						?>
					</div>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</div>
	</section>
