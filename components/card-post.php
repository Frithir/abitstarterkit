
<a data-aos="flip-up" class="overview-block" href="<?php the_permalink() ?>">
  <div class="lazy-parent post-thumbnail">
    <div class="background-image lazy-child" style="background-image: url(<?php the_post_thumbnail_url( 'blur' ); ?>)" data-bg-src="<?php the_post_thumbnail_url( 'large' ); ?>"></div>
  </div>
  <div class="post-info">
    <p class="post-info-date"><?= get_the_date('j M Y'); ?> | <?php
    $category = get_the_category();
    $length = count($category);
    $i = 0;
    foreach($category as $cat) {
      echo $cat->cat_name;
      if(($length - 1) > $i) {
        echo ' - ';
      }
      $i++;
    }
    ?></p>
    <h4><?php the_title(); ?></h4>
    <span class="link">Read more</span>
  </div>
</a>
