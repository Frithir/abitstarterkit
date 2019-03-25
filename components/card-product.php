<?php
if (is_tax()) {
  $queried_object = get_queried_object();
  $link = get_term_link($queried_object);
} else {
  $queried_object = get_option( 'woocommerce_shop_page_id' );
  $link = get_permalink($queried_object);
}
global $product;
$id = get_the_ID();
$imgID = get_post_thumbnail_id($id);
$srcset = wp_get_attachment_image_srcset($imgID);
$src = wp_get_attachment_image_src($imgID, 'large');
$blur = wp_get_attachment_image_src($imgID, 'blur');
?>
<div <?php post_class('overview-block-product '); ?>>
  <div class="product-info">
    <div class="onsale">Sale</div>
    <?= do_shortcode('[ti_wishlists_addtowishlist]'); ?>
    <a href="<?= get_permalink(); ?>">
    <div class="background-image" style="background-image: url(<?= $src[0]; ?>)"></div>
    <div class="product-info-title"><?= get_the_title(); ?></div>
    <div class="product-info-price"><?= $product->get_price_html(); ?></div>
    </a>
  </div>
<?php if ($product->get_stock_quantity() >= 1): ?>
  <a class="button" href="<?= $link; ?>?add-to-cart=<?= $id; ?>">Add to cart</a>
<?php else: ?>
  <a class="button button-light" href="<?= get_permalink(); ?>">Read more</a>
<?php endif; ?>

</div>
