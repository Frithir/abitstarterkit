<a class="overview-block" href="<?php the_permalink() ?>">
  <div class="lazy-parent post-thumbnail">
    <?php
    if(get_field('featured_images')): while(has_sub_field('featured_images')):
      if (get_sub_field('select') === 'image') {

        $image = get_sub_field('image'); ?>
        <div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['sizes']['medium']; ?>"></div>
      <?php
      } elseif (get_sub_field('select') === 'video') {
        $video = get_sub_field('video');
        echo '<video class="background-image background-video" loop playsinline muted autoplay><source src="' . $video .'"/></video>';
      }
      break;
    endwhile; endif;
    ?>
  </div>
  <div class="post-info">
    <h4><?php the_title(); ?></h4>
  </div>
</a>
