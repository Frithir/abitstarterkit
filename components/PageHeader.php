<?php
class PageHeader {
  // options avaiable to pass through
  static $defaultProps = array(
    'id' => '',
    'classes' => '',
  );
  public static function render(array $args = []) {
    $props = array_merge(self::$defaultProps, $args);
    if ($props['id']) {
      $page_header_image = get_field('page_header_image', $props['id']);
      $page_header_script = get_field('page_header_script', $props['id']);
      $page_header_title = get_field('page_header_title', $props['id']);
    } else {
      $page_header_image = get_field('page_header_image');
      $page_header_script = get_field('page_header_script');
      $page_header_title = get_field('page_header_title');
    }
    ob_start();
    ?>
    <section class="section page-header-image <?= $props['classes']; ?>">
      <div class="lazy-parent">
        <?php if($page_header_image): ?>
          <div class="background-image lazy-child" style="background-image: url(<?= $page_header_image['sizes']['blur']; ?>)" data-bg-src="<?= $page_header_image['url']; ?>"></div>
        <?php endif; ?>
      </div>
    </section>
    <section class="header-banner section thin woo-title-section">
      <div class="container tacenter">
        <?php if ($page_header_script): ?>
          <span class="script"><?= $page_header_script; ?></span>
        <?php endif; ?>
        <?php if ($page_header_title): ?>
          <h1 class="page_header_title"><?= $page_header_title; ?></h1>
        <?php else: ?>
          <h1 class="page_header_title"><?php the_title(); ?></h1>
        <?php endif; ?>
      </div>
      </section>
    <?php echo ob_get_clean();
  }
}
?>
