<?php
$parentID = [];
if (!is_shop()) {
  $cat_obj = $wp_query->get_queried_object();
  $currentID = $cat_obj->term_id;
  if($cat_obj->parent !== 0) {
    $parentID = get_parent_terms($cat_obj);
  } else {
    $parentID = $cat_obj->term_id;
  }
}
// if is in these cats show the filter

?>
<section class="woo-filter">
  <div class="container flex woo-filter-options ">
    <?php if(in_array($parentID, array(233, 22)) || is_shop()) : ?>
      <div class="open-filters <?php if(isset($_GET['colour']) || isset($_GET['formulation'])) { echo ' filtered ';} ?>">Filters</div>
    <?php endif; ?>
    <div class="order">
      <?php do_action('woo_custom_catalog_ordering'); ?>
    </div>
  </div>
  <?php if(in_array($parentID, array(233, 22)) || is_shop()) : ?>
    <div class="container relative">
      <div class="all-filters">
        <div class="flex tab-nav">
          <a class="tab-btn openTabBtn" data-filter="colour">colour</a>
          <a class="tab-btn"  data-filter="formulation">formulation</a>
        </div>
        <div class="tab-contents">
          <div class="tab-content openTab" data-key="colour">
            <div class="script">Pick a colour</div>
            <ul>
              <?php
              $tax = 'colour';
              $taxonomies = array($tax);
              $terms = get_terms($taxonomies);
              foreach($terms as $tag) :
                $new_query = setQuery($tax, $tag->slug);
                $className = '';
                if((isset($_GET[$tax])) && $_GET[$tax] === $tag->slug){
                  $className = 'class="active"';
                  $new_query = setQuery($tax, '');
                }
                ?>
                <li <?= $className; ?>>
                  <a class="swatch" href="<?= $new_query; ?>" title="<?= $tag->name; ?>">
                    <?php if (get_field('image','colour_'.$tag->term_id)): ?>
                      <div class="lazy-parent">
                        <?php $image = get_field('image','colour_'.$tag->term_id); ?>
                        <div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
                      </div>
                    <?php endif; ?>
                    <div class="label">
                      <?= $tag->name; ?>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="tab-content" data-key="formulation">
            <div class="script">Pick a Formulation</div>
            <ul>
              <?php
              $tax = 'formulation';
              $taxonomies = array($tax);
              $terms = get_terms($taxonomies);
              foreach($terms as $tag) :
                $new_query = setQuery($tax, $tag->slug);
                $className = '';
                if((isset($_GET[$tax])) && $_GET[$tax] === $tag->slug){
                  $className = 'class="active"';
                  $new_query = setQuery($tax, '');
                }
                ?>
                <li <?= $className; ?>>
                  <a class="swatch" href="<?= $new_query; ?>" title="<?= $tag->name; ?>">
                    <?php if (get_field('image','colour_'.$tag->term_id)): ?>
                      <div class="lazy-parent">
                        <?php $image = get_field('image','colour_'.$tag->term_id); ?>
                        <div class="background-image lazy-child" style="background-image: url(<?= $image['sizes']['blur']; ?>)" data-bg-src="<?= $image['url']; ?>"></div>
                      </div>
                    <?php endif; ?>
                    <div class="label">
                      <?= $tag->name; ?>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
