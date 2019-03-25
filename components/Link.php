<?php
class Link {
  // options avaiable to pass through
  static $defaultProps = array(
    'acf' => '',
    'classes' => '',
  );
  public static function render(array $args = []) {
    $props = array_merge(self::$defaultProps, $args);
    ob_start();
    ?>
    <a target="<?= $props['acf']['target']; ?>" href="<?= $props['acf']['url']; ?>" class="<?= $props['classes']; ?>"><?= $props['acf']['title']; ?></a>
    <?php echo ob_get_clean();
  }
}
