<div class="woo-grid">
  <?php if ( have_posts() ) : ?>
    <?php do_action( 'woo_custom_result_count' ); ?>
    <div class="flex woo-products">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( './components/card-product' ); ?>
      <?php endwhile; ?>
    </div>
    <?php do_action( 'woo_custom_pagination' ); ?>
  <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
    <div class="woocommerce-message">
      <p>No products found</p>
    </div>
  <?php endif; ?>
</div>
