<?php
/**
* Single Product Price
*
* This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you
* (the theme developer) will need to copy the new files to your theme to
* maintain compatibility. We try to do this as little as possible, but it does
* happen. When this occurs the version of the template file will be bumped and
* the readme will list any important changes.
*

* @see https://docs.woocommerce.com/document/template-structure/
* @package WooCommerce/Templates
* @version 3.4.0
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>
<p class="price"><?php echo $product->get_price_html(); ?></p>
<?php
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating() + 0;
?>
<div class="flex small-data">
<div class="flex star-rating number-<?php echo $average; ?>">
	<div class="star"></div>
	<div class="star"></div>
	<div class="star"></div>
	<div class="star"></div>
	<div class="star"></div>
	<div class="reviewers">(<?php echo $review_count; ?> customer reviews)</div>
</div>
<div class="save"><?= do_shortcode('[ti_wishlists_addtowishlist]'); ?> Save</div>
</div>
