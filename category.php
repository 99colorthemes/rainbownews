<?php
/**
 * The template for displaying category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

get_header();

?>

    <!-- trending-start -->
    <div class="nnc-trending-news">
        <div class="nnc-container">
            <div class="nnc-trending-single">

                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">|</a></li>
                    <li class="active"><a href="#">Business</a></li>
                </ul>

            </div>
            <div class="nnc-search nnc-clearblock">
                <form class="s-form" action="" method="POST" role="form">
                    <div class="search-form">
                        <input type="text" id="" placeholder="Search Here...">
                    </div>
                    <div class="search-icon"><i class="fa fa-search"></i></div>
                </form>
            </div>
        </div>
    </div>
    <!-- trending-end -->


<?php
global $cat;

/*$layout = rainbownews_category_layout($cat);*/


$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = array(
    'post_type' => 'post',
    'cat' => $cat,

    //'posts_per_page'=>2,
    'post_status' => 'publish',
    'order' => 'DESC',
    'paged' => $paged
);

$query = new WP_Query($args);

/*echo "<pre>";
       print_r($query);
        echo "</pre>";*/

if ($query->have_posts()) :
    global $cat;
    global $pm_category_post_count;
    $category_post_cnt = get_category($cat);
    $pm_category_post_count = $category_post_cnt->category_count;


    $pm_cat_color = rainbownews_category_color($category_post_cnt->cat_ID);


    global $cat_count;
    $cat_count = 1;
    ?>

    <div id="content" class="content nnc-clearblock">
        <div class="nnc-container">
            <div id="primary">
                <main id="main" class="site-main">
                    <div class="nnc-category-highlight-block">
                        <?php $i = 1; ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php if ($i == 2) {
                                echo '<div class="nnc-category-small-block nnc-clearblock">';
                            } ?>
                            <div class="nnc-hightlight-large">
                                <div class="nnc-highlight-single">
                                    <?php if ($i == 1) { ?>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <figure class="nnc-slide-img">
                                                <?php the_post_thumbnail('large'); ?>
                                            </figure>
                                        <?php endif; ?>
                                    <?php } else { ?>
                                        <figure class="nnc-slide-img">
                                            <?php the_post_thumbnail('small'); ?>
                                        </figure>
                                    <?php } ?>
                                    <div class="nnc-dtl">

                                        <div class="nnc-entry-title"><a href="<?php the_permalink(); ?>"
                                                                        title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <div class="nnc-entry-meta">
                                               <span class="posted-on">
                                                    <a href="<?php the_permalink(); ?>"
                                                       title="<?php echo get_the_time(); ?>" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <?php esc_attr(the_time("M d")); ?>
                                                        </time>
                                                        <br>
                                                        <time><?php esc_attr(the_time("Y")); ?></time>
                                                    </a>
                                                </span>
                                            <span class="author"><i class="fa fa-user" aria-hidden="true"></i> <a
                                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                                                    title="<?php the_author(); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
                                           <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> <a
                                                   href="<?php the_permalink(); ?>"
                                                   title="No Comments"><?php comments_popup_link('No Comment', '1', '%'); ?></a></span>
                                        </div>
                                        <div class="nnc-category-list">
                                            <?php if (rainbownews_colored_category() > 0) {
                                                rainbownews_colored_category();
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="nnc-content">
                                        <p><?php echo rainbownews_excerpt(get_the_content(), 200); ?></p></div>
                                    <a class="nnc-readmore" href="#">Read More</a>
                                </div>
                            </div>
                            <?php if ($i == $pm_category_post_count) {
                                echo '</div>';
                            } ?>

                            <?php $i++; endwhile; ?>
                    </div>

                    <div class="nnc-pagination">
                        <ul>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>
                    </div>

                </main>
            </div>


            <?php get_sidebar(); ?>

        </div>
    </div>

    <?php
else :

    get_template_part('template-parts/content', 'none');
endif;
?>

<?php

get_footer();
