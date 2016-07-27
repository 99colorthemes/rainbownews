<?php
/**
 * Template Name: HomePage
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header(); ?>

    <!-- trending-start -->
    <div class="nnc-trending-news">
        <div class="nnc-container">
            <div class="nnc-trending-single">
                <div class="nnc-trend-title">Trending Now</div>
                <ul class="newsticker"> 
                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elitum.</a></li> 
                    <li><a href="#">psum dolor sit amet, consectetur adipisicing elitum.</a></li> 
                    <li><a href="#">Loolor sit amet, consectetur adipisicing elitum.</a></li> 
                    <li><a href="#">um dolor sit amet, consectetur adipisicing elitum.</a></li> 
                    <li><a href="#">em ipsum dolor sit amet, consectetur adipisicing elitum.</a></li>   
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

    <!-- banner-start -->
    <div class="nnc-highlight-banner">
        <div class="nnc-container">
            <div class="nnc-highlight-slider">
                <?php
                if (is_active_sidebar('rainbownews_front_page_left_area')) {
                    if (!dynamic_sidebar('rainbownews_front_page_left_area')):
                    endif;
                }
                ?>
            </div>

            <div class="nnc-highlight-post">
                <?php
                if (is_active_sidebar('rainbownews_front_page_right_area')) {
                    if (!dynamic_sidebar('rainbownews_front_page_right_area')):
                    endif;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- banner-end -->

    <!-- latest-start -->
    <div class="nnc-top-latest">
        <div class="nnc-container">
            <div class="nnc-latest">
                <div class="nnc-title nnc-clearblock">
                    <h2 class="widget-title"><span style="color:#8224e3;">Latest News</span></h2>

                    <div class="nnc-viewmore"><i class="fa fa-th-large"></i></div>
                </div>
                <!-- use (nnc-latest-layout-2) class for Layout2 -->
                 <?php $latest_news_layout = get_theme_mod('rainbownews_latest_news_layout_style_setting', 'menu-1'); ?>
                <div class="nnc-latest-block nnc-clearblock <?php echo $latest_news_layout == 'menu-1'?'':'nnc-latest-layout-2'; ?>">
                    <?php
                    $recent_post_args = array('post-type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => true,);
                    $recent_posts_query = new WP_Query($recent_post_args);

                    while ($recent_posts_query->have_posts()): $recent_posts_query->the_post();
                        ?>
                        <div class="nnc-latest-single">
                            <figure class="nnc-img">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                            <div class="nnc-dtl">
                                <div class="nnc-entry-title"><a
                                        href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php echo get_the_title(); ?></a></div>
                                <div class="nnc-entry-meta">
									<span class="posted-on">
										<a href="<?php the_permalink(); ?>" title="<?php echo get_the_time(); ?>" rel="bookmark">
                                            <time class="entry-date" datetime="">
                                                <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                                            </time>
                                        </a>
									</span>
                                <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> <a
                                        href="#" title="No Comments"><?php comments_popup_link( 'No Comment', '1', '%' );?></a></span>
                                </div>
                                <div class="nnc-category-list">
									<?php rainbownews_colored_category(); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- latest-end -->

    <div id="content" class="content nnc-clearblock">
        <div class="nnc-container">
            <div id="primary">
                <main id="main" class="site-main">

                    <?php
                    if (is_active_sidebar('rainbownews_front_page_content_area')) {
                        if (!dynamic_sidebar('rainbownews_front_page_content_area')):
                        endif;
                    }
                    ?>

                    <div class="nnc-middle-ads">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/wide-ads2.png" alt="advertisement">
                    </div>



                    <div class="nnc-middle-ads">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/wide-ads3.png" alt="advertisement">
                    </div>

                    <!--<div class="nnc-category nnc-category-layout-3 nnc-left">
                        <div class="nnc-title nnc-clearblock">
                            <h2 class="widget-title"><span style="color:red;">Politics</span></h2>

                            <div class="nnc-viewmore"><a href="#"><i class="fa fa-th-large" title="View All"></i></a>
                            </div>
                        </div>
                        <div class="nnc-category-block nnc-clearblock">
                            <div class="nnc-category-small nnc-clearblock">
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nnc-category nnc-category-layout-3 nnc-right">
                        <div class="nnc-title nnc-clearblock">
                            <h2 class="widget-title"><span style="color:red;">Politics</span></h2>

                            <div class="nnc-viewmore"><a href="#"><i class="fa fa-th-large" title="View All"></i></a>
                            </div>
                        </div>
                        <div class="nnc-category-block nnc-clearblock">
                            <div class="nnc-category-small nnc-clearblock">
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nnc-category-single">
                                    <figure class="nnc-img">
                                        <a href="#"><img src="<?php /*echo get_template_directory_uri(); */?>/images/c1s.png"></a>
                                    </figure>
                                    <div class="nnc-category-dtl">
                                        <div class="nnc-entry-title"><a href="#">Watch What It's Like to Play Big Bird
                                                on Sesame Street</a></div>
                                        <div class="nnc-entry-meta">
												<span class="posted-on">
													<a href="#" title="3:39 pm" rel="bookmark">
                                                        <time class="entry-date" datetime="">
                                                            <i class="fa fa-calendar"></i> May 18, 2016
                                                        </time>
                                                    </a>
												</span>
                                            <span class="comments-link"><i class="fa fa-comments"
                                                                           aria-hidden="true"></i> <a href="#"
                                                                                                      title="No Comments">No
                                                    Comments</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </main>
            </div>

            <aside id="secondary" class="widget-area" role="complementary">
                <section id="search-2" class="widget widget_search"><h2 class="widget-title"><span style="color:red;">Search</span>
                    </h2>

                    <form role="search" method="get" class="search-form" action="http://localhost/wordpress/">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
                </section>
                <section id="recent-posts-2" class="widget widget_recent_entries"><h2 class="widget-title"><span
                            style="color:red;">Recent Posts</span></h2>
                    <ul>
                        <li>
                            <a href="http://localhost/wordpress/2016/07/13/hello-world/">Hello world!</a>
                        </li>
                    </ul>
                </section>
                <section id="recent-comments-2" class="widget widget_recent_comments"><h2 class="widget-title"><span
                            style="color:red;">Recent Comments</span></h2>
                    <ul id="recentcomments">
                        <li class="recentcomments"><span class="comment-author-link">admin</span> on <a
                                href="http://localhost/wordpress/2016/07/13/hello-world/#comment-3">Hello world!</a>
                        </li>
                        <li class="recentcomments"><span class="comment-author-link">admin</span> on <a
                                href="http://localhost/wordpress/2016/07/13/hello-world/#comment-2">Hello world!</a>
                        </li>
                        <li class="recentcomments"><span class="comment-author-link"><a href="https://wordpress.org/"
                                                                                        rel="external nofollow"
                                                                                        class="url">Mr
                                    WordPress</a></span> on <a
                                href="http://localhost/wordpress/2016/07/13/hello-world/#comment-1">Hello world!</a>
                        </li>
                    </ul>
                </section>

                <section class="widget">
                    <h2 class="widget-title"><span style="color:red;">Our Posts</span></h2>

                    <div class="nnc-tabs">
                        <ul>
                            <li>Latest</li>
                            <li>Popular</li>
                            <li>Comments</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </section>

                <section class="widget">
                    <h2 class="widget-title"><span style="color:red;">Connect with Us</span></h2>

                    <div class="nnc-social-sidebar-icons">

                    </div>
                </section>

            </aside>
        </div>
    </div>

<?php get_footer(); ?>