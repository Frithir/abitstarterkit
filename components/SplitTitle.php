<?php
class SplitTitle {
  // options avaiable to pass through
  static $defaultProps = array(
    'acf' => '',
    'classes' => '',
  );
  public static function render(array $args = []) {
    $props = array_merge(self::$defaultProps, $args);
    ob_start(); ?>
    <div class="split-title <?= $props['classes']; ?>">
      <div class="script"><?= $props['acf']['script']; ?></div>
      <div class="bold"><?= $props['acf']['bold']; ?></div>
    </div>
    <?php echo ob_get_clean();
  }
}
