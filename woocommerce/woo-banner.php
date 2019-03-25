<?php if (is_shop() || is_search()): ?>
  <section class="woo-banner section relative lazy-parent">
    <?php $image = get_field('page_header_image', 39); ?>
    <div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
    <div class="container">
      <?php if(is_search()): ?>
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
      <?php elseif (get_field('page_header_title', 39)): ?>
        <h1 class="page-title"><?= get_field('page_header_title', 39); ?></h1>
      <?php else: ?>
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
      <?php endif; ?>
    </div>
  </section>
  <section class="section woo-cats thin">
    <div class="container">
      <?php wp_nav_menu(array('theme_location' => 'shop', 'container' => false )); ?>
    </ul>
  </div>
</section>
<?php else: ?>
  <section class="woo-banner section relative lazy-parent">
    <?php
    $cat_obj = $wp_query->get_queried_object();
    $currentID = $cat_obj->term_id;
    if($cat_obj->parent !== 0) {
      $parentID = get_parent_terms($cat_obj);
      $term = get_term( $parentID, 'product_cat' );
      $description = $term->description;
    } else {
      $parentID = $cat_obj->term_id;
      $term = get_term( $parentID, 'product_cat' );
      $description = $term->description;
    }
    $thumbnail_id = get_woocommerce_term_meta( $parentID, 'thumbnail_id', true );
    $src = wp_get_attachment_image_src($thumbnail_id, '1800w');
    $blur = wp_get_attachment_image_src($thumbnail_id, 'blur');
    ?>
    <div class="background-image lazy-child" style="background-image: url(<?= $blur[0]; ?>)" data-bg-src="<?= $src[0]; ?>"></div>
    <div class="container">
      <?php if (get_field('extended_title','product_cat_'.$parentID)): ?>
        <h1 class="page-title"><?= get_field('extended_title','product_cat_'.$parentID); ?></h1>
      <?php else: ?>
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
      <?php endif; ?>
        <p><?= $description; ?></p>
    </div>
  </section>
  <section class="section woo-cats thin">
    <div class="container">
      <ul class="sub-cats flex">
        <?php
        $tax = 'product_cat';
        $taxonomies = array($tax);
        $args = array('child_of' => $parentID);
        $terms = get_terms($taxonomies, $args);
        ?>
        <li <?php if ($parentID === $currentID) {echo 'class="active"';}?>>
          <a href="<?= get_term_link($parentID, $tax ); ?>" title="All">All</a>
        </li>
        <?php foreach($terms as $term) :
          $className = '';
          if ($currentID === $term->term_id) {
            $className = 'active';
          }
          ?>
          <li class="<?= $className; ?>">
            <a href="<?= get_term_link( $term->term_id, $tax ); ?>" title="<?= $term->name; ?>"><?= $term->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
<?php endif; ?>
