<?php get_header(); ?>

    <?php get_template_part('components/page-banner') ?>

    <section class="content">
        <div class="short search-section">
            <div class="center">
                <h2 class="heading">Search results</h2>
            </div>
            <?php if (have_posts()) : ?>
                <?php if (function_exists('wp_searchheader')) : ?>
                    <?php wp_searchheader()?>
                <?php endif; ?>
                <ol class="searchResults" start="<?php echo ($posts_per_page*($paged-1)+1) ?>">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php
                        $title = get_the_title();
                        $keys= explode(" ",$s);
                        $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title);
                        $excerpt = get_the_excerpt();
                        $excerpt .= get_field('content');
                        $excerpt .= get_field('bio');
                        $excerpt .= get_field('intro');
                        if( have_rows('layouts') ): while ( have_rows('layouts') ) : the_row();
                            $excerpt .= get_sub_field('content');
                            $excerpt .= get_sub_field('left_content');
                            $excerpt .= get_sub_field('right_content');
                        endwhile; endif;

                        $excerpt .= " " . get_field('start_date');
                        $excerpt .= " " . get_field('duration');
                        $excerpt .= " " . get_field('time');
                        $excerpt .= " " . get_field('start_date');


                        $excerpt = strip_tags($excerpt);
                        $excerpt = substr($excerpt, 0, 205) . '...';
                        //$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);
                        //$excerpt = str_replace(' [...]', '...', $excerpt);
                    ?>
                    <li>
                        <a class="title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php get_the_title() ?>"><?php echo $title; ?></a><br/>
                        <?php echo $excerpt; ?> <!-- <small>Updated: <?php echo mysql2date(get_option('date_format'), $post->post_modified) ?></small> -->
                    </li>
                    <?php endwhile; ?>
                </ol>
                <?php wp_pagenavi(); ?>
    		<?php else : ?>
    			<h2>No results found. Try a different search?</h2>
    			<hr />
    			<form action="<?php bloginfo('url'); ?>/" method="get" class="blog-search">
    				<label class="hidden" for="s" accesskey="S">Input search here</label>
    				<input id="s" class="searchField" type="text" name="s" value="Search"  onfocus="if (this.value=='Search') this.value='';" onblur="if (this.value=='') this.value='Search';"  />
    				<input type="submit" value="Search" id="go"  />
    			</form>
    		<?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>
