<?php
// Smart components - Team
// include this file in your functions
// run this finction in you theme Team::render();
// add custom class to get button eg. Team::render('your-class-name-here');

class Team {
  // set the title of the page
  public static function render($add_class = false){
    ob_start(); ?>
    <section class="team <?php echo $add_class && is_string($add_class) ? $add_class : '' ; ?>">
      <?php if (get_field('team_section_title', 'options')): ?>
        <h2><?php the_field('team_section_title', 'options') ?></h2>
      <?php endif; ?>
      <div class="container">

        <?php if(get_field('team', 'options')): while(has_sub_field('team', 'options')): ?>
          <div class="team-member flex">
            <div class="profile">
              <?php if (get_sub_field('image')): ?>
                <?php $image = get_sub_field('image');?>
                <img src="<?php echo $image['sizes']['800x800']; ?>" alt="<?php echo $image['alt']; ?>">
              <?php endif; ?>
            </div>
            <div class="info">
              <?php if (get_sub_field('name')): ?>
                <div class="name">
                  <?php the_sub_field('name');?>
                </div>
              <?php endif; ?>
              <?php if (get_sub_field('position')): ?>
                <div class="position">
                  <?php the_sub_field('position');?>
                </div>
              <?php endif; ?>
              <?php if (get_sub_field('bio')): ?>
                <div class="bio">
                  <?php the_sub_field('bio');?>
                </div>
              <?php endif; ?>
              <div class="social-links">
                <?php if (get_sub_field('linked_in')): ?>
                  <a href="<?php the_sub_field('linked_in');?>">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                <?php endif; ?>
                <?php if (get_sub_field('twitter')): ?>
                  <a href="<?php the_sub_field('twitter');?>">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                <?php endif; ?>
                <?php if (get_sub_field('instagram')): ?>
                  <a href="<?php the_sub_field('instagram');?>">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>

      </div>
    </section>
    <?php
    echo ob_get_clean();
  }
}

// ACF Options Page
add_action( 'init', 'team' );
function team(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' => 'Team',
      'icon_url' => 'dashicons-groups',
      'position' => 52
    ));
  }
}


?>
