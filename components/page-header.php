<?php if(!is_archive() && !is_shop() && !is_front_page() && get_field('page_header')): ?>
  <section class="woo-banner section">
    <div class="lazy-parent">
    	<?php $image = get_field('page_header_image'); ?>
    	<div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
    </div>
    <div class="container">
      <?php if (get_field('page_header_title')): ?>
        <h1 class="page-title"><?= get_field('page_header_title'); ?></h1>
      <?php else: ?>
        <h1 class="page-title"><?php the_title(); ?></h1>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
