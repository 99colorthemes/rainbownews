<?php
/**
 * The template for displaying category pages.
 *
 * @link https://rainbownews.wordpress.org/Template_Hierarchy
 *
 * @package Rainbownews
 */

get_header();
$cat_sidebar_layout = get_theme_mod('rainbownews_category_sidebar_setting', 'right-sidebar');

global $cat;

$layout = rainbownews_category_layout($cat);

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$args = array(
    'post_type' => 'post',
    'cat' => $cat,

    'post_status' => 'publish',
    'order' => 'DESC',
    'paged' => $paged
);

$query = new WP_Query($args);


if ($query->have_posts()) :
    global $rn_category_post_count;

    $category_post_cnt = get_category($cat);

    $rn_category_post_count = $category_post_cnt->category_count;

    $rn_cat_color = rainbownews_category_color($category_post_cnt->cat_ID);

    $i = 1;

    ?>

    <?php

//left sidebar
    if ($cat_sidebar_layout == 'left-sidebar'):
        ?>
        <aside id="secondary" class="widget-area" role="complementary">
            <?php dynamic_sidebar('rainbownews_left_sidebar'); ?>
        </aside><!-- #secondary -->
        <?php
    endif;

    ?>

    <div id="primary">
        <main id="main" class="site-main">
            <div
                class="nnc-category-highlight-block <?php echo $layout == 'layout-1' ? '' : 'nnc-category2-highlight-block'; ?>">

                <?php while ($query->have_posts()) : $query->the_post();
                    if ($i == 2) {
                        echo '<div class="nnc-category-small-block nnc-clearblock">';
                    }
                    ?>

                    <div class="nnc-hightlight-large">
                        <div class="nnc-highlight-single">

                            <?php if ($i == 1) {
                                if (has_post_thumbnail()) : ?>

                                    <figure class="nnc-slide-img">
                                        <?php
                                            the_post_thumbnail('full');
                                            do_action( 'rainbownews_post_format_icon' );
                                        ?>
                                    </figure>

                                <?php endif;
                            } else { ?>

                                <figure class="nnc-slide-img">
                                    <?php
                                        the_post_thumbnail('small');
                                        do_action( 'rainbownews_post_format_icon' );
                                    ?>
                                </figure>

                            <?php } ?>

                            <div class="nnc-dtl">

                                <div class="nnc-entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>

                                <div class="nnc-entry-meta">
                                       <span class="posted-on">

                                            <?php if ($layout != 'layout-1') { ?>
                                                <a href="<?php the_permalink(); ?>"
                                                   title="<?php echo get_the_time(); ?>" rel="bookmark">
                                                    <time class="entry-date" datetime="">
                                                        <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                                                    </time>
                                                </a>

                                            <?php } else { ?>

                                                <a href="<?php the_permalink(); ?>"
                                                   title="<?php echo get_the_time(); ?>" rel="bookmark">
                                                    <time class="entry-date" datetime="">
                                                        <?php echo get_the_date( 'M d' ); ?>
                                                    </time>
                                                    <br>
                                                    <time><?php echo get_the_date( 'Y' ); ?></time>
                                                </a>

                                            <?php } ?>

                                        </span>
                                        <span class="author"><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php the_author(); ?>"><?php echo esc_html(get_the_author()); ?></a></span>

                                       <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>" title="No Comments"><?php comments_popup_link('No Comment', '1', '%'); ?></a></span>
                                </div>
                                <div class="nnc-category-list">

                                    <?php if (rainbownews_colored_category() > 0) {
                                        rainbownews_colored_category();
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="nnc-content">
                                <p>
                                    <?php
                                    if ($i == 1)
                                        echo rainbownews_excerpt(get_the_content(), 500);
                                    else
                                        echo rainbownews_excerpt(get_the_content(), 200);
                                    ?>
                                </p></div>
                            <a class="nnc-readmore" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                    <?php if ($i == $rn_category_post_count) {
                        echo '</div>';
                    }
                    $i++;
                endwhile;
                ?>
                <?php wp_reset_query(); ?>
            </div>
            <div class="nnc-pagination">

                <?php

                $big = 999999999; // need an unlikely integer

                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $query->max_num_pages
                ));
                //echo paginate_links();
                ?>
            </div>


        </main>
    </div>


    <?php
    if ($cat_sidebar_layout == 'right-sidebar'):
        get_sidebar();
    endif;

else :
    get_template_part('template-parts/content', 'none');
endif;

get_footer();
