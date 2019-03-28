<?php
global $product;
$slider = get_field('slider');
?>
<div <?php post_class('overview-block-product '); ?>>
  <div class="product-info">
    <a href="<?= get_permalink(); ?>">
      <div class="cover lazy-parent">
        <?php
        $srcType = $slider[0]['type'];
        if ($srcType === 'image') {
          $src = $slider[0]['image']['sizes']['medium']; ?>
          <div class="background-image lazy-child" style="background-image: url(<?= $src; ?>)"></div>
          <?php
        } elseif ($srcType === 'video') {
          $video = $slider[0]['video'];
          $poster = $slider[0]['thumbnail']['sizes']['large'];
          echo '<div class="background-image lazy-child" style="background-image: url(' . $poster .' )"></div><video class="background-image background-video" loop playsinline autoplay muted><source src="' . $video .'" type="video/mp4"/></video>';
        }
        ?>
      </div>
      <div class="product-info-title"><?= get_the_title(); ?></div>
    </a>
  </div>
</div>
