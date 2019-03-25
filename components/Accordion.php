<?php
class Accordion {
  // options avaiable to pass through
  static $defaultProps = array(
    'acf' => '',
    'classes' => '',
  );
  public static function render(array $args = []) {
    $props = array_merge(self::$defaultProps, $args);
    cl($props['acf']);
    ob_start(); ?>
    <div class="Accordion">
      <?php foreach($props['acf'] as $faq): ?>
        <div class="Accordion--item">
          <h4>
            <span><?= $faq['title']; ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </h4>
          <div class="description"><?= $faq['content']; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <?
    echo ob_get_clean();
  }
}
