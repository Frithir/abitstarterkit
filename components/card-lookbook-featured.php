<section class="section lookbook-featured">
	<div class="container flex">
    <div class="post-info one-third">
      <p class="post-category"><?php
      $lookbook_terms = wp_get_object_terms( $post->ID,  'lookbook_category' );
      $count = count($lookbook_terms) - 1;
      $i = 0;
      foreach($lookbook_terms as $term) :
        echo $term->name;
        if($count !== $i) {
          echo ', ';
        }
        $i++;
      endforeach;
      ?></p>
      <h2><?php the_title(); ?></h2>
      <p class="excerpt"><?php the_field('excerpt'); ?></p>
      <p><a class="button" href="<?php the_permalink(); ?>">Discover more</a></p>
    </div>
    <div class="relative flex featured-images">
    <?php
      if(get_field('featured_images')): while(has_sub_field('featured_images')):
        if (get_sub_field('select') === 'image') {
          $image = get_sub_field('image');
					$image = get_sub_field('image'); ?>
					<div class="lazy-parent post-thumbnail">
					<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['sizes']['medium']; ?>"></div>
					</div>
				<?php


        }
        if (get_sub_field('select') === 'video') {
          $video = get_sub_field('video');
          echo '<div class="post-video">
            <video class="background-image background-video" autoplay playsinline loop muted>
              <source src="'.$video.'" type="video/mp4" />
            </video>
          </div>';
        }
      endwhile; endif;
    ?>
    </div>
	</div>
</section>
