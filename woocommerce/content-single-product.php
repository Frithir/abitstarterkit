<?php
/**
* @see https://docs.woocommerce.com/document/template-structure/
* @package WooCommerce/Templates
* @version 3.4.0
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( post_password_required() ) { echo get_the_password_form(); return; }
global $product;
?>

<section class="section top-split">
	<div class="container">
		<div <?php post_class('flex'); ?>>
			<div class="woo-gallery">
				<?php
				/**
				* woocommerce_before_single_product_summary hook.
				*
				* @hooked woocommerce_show_product_sale_flash - 10
				* @hooked woocommerce_show_product_images - 20
				*/
				do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>

			<?php $video = get_field( 'video_embed_code' );
			if ($video): ?>
				<div class='product-video-mobile flex-video'><?= $video; ?></div>
			<?php endif; ?>

			<div class="woo-details">
				<?php
					do_action( 'woocommerce_before_single_product' );
					do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
	</div>
</section>

<section class="section woo-tabs">
	<div class="container">
			<?php $video = get_field( 'video_embed_code' ); ?>
			<?php if ($video): ?>
				<div class="product-flex flex">
					<div class='one-half flex-video $aspect'><?= $video; ?></div>
					<div class="one-half"><?php do_action( 'woocommerce_after_single_product_summary' ); ?></div>
				</div>
			<?php else: ?>
				<div class='two-thirds'>
					<?php
						/**
						* woocommerce_after_single_product_summary hook.
						*
						* @hooked woocommerce_output_product_data_tabs - 10
						* @hooked woocommerce_upsell_display - 15
						* @hooked woocommerce_output_related_products - 20
						*/
						do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php wc_get_template_part( 'woo-related-products' ); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
