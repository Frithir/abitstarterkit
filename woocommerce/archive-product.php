<?php
/**
* @see https://docs.woocommerce.com/document/template-structure/
* @package WooCommerce/Templates
* @version 3.4.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

wc_get_template_part( 'woo', 'banner' );
wc_get_template_part( 'woo', 'filter' );
?>
<section class="section basepad">
	<div class="container">
		<div class="flex woo-archive">
			<?php wc_get_template_part( 'woo', 'grid' ); ?>
		</div>
	</div>
</section>
<?php get_footer( 'shop' ); ?>
