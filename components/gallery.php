<section class="section nopad">
  <div class="full-width-gallery flickity">
    <?php $i = 0; if(get_field('gallery')): while(has_sub_field('gallery')): ?>
      <?php $attachment = get_sub_field('image');  ?>
      <img class="slide" src="<?php echo $attachment['sizes']['800x800']; ?>">
      <?php $i++; endwhile; endif; ?>
  </div>
</section>
