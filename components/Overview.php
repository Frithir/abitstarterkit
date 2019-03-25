<?php
class Overview {
  // options avaiable to pass through

  static $defaultProps = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page'=> '-1',
    'post__in' => array(),
    'taxonomy' => false,
    'taxonomy_terms' => false,
    'operator' => 'IN', //  Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
    // 'tax_query' => array(
    //   array(
    //     'taxonomy' => 'product_visibility',
    //     'field'    => 'name',
    //     'terms'    => 'featured',
    //   ),
    // ),
    'aos' => '',
    'classes' => '',
    'slider' => false,
  );

  public static function render(array $args) {
    $props = array_merge(self::$defaultProps, $args);
    $result = new WP_Query($props);
    ob_start();
    ?>
    <div class="flex overview <?= $props['classes']; ?>">
      <?php if ($props['slider']) : ?>
        <div class="featured-slider">
      <?php endif; ?>
      <?php
      if($result->have_posts()) {
        while($result->have_posts()) {
          $result->the_post();
          global $post;
          if ($props['post_type'] == "product") {
            get_template_part('components/card-product');
          } elseif($props['post_type'] == "howto") {
            get_template_part('components/card-howto');
          } else {
            get_template_part('components/card-post');
          }
        }
      }
      ?>
      <?php if ($props['slider']) : ?>
</div>
      <?php endif; ?>
    </div>
    <?php
    wp_reset_postdata();
    echo ob_get_clean();
  }
}
