<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 */

/* 
Rainbownews Slider Widget Section
*/ 
add_action( 'widgets_init', 'register_rainbownews_featured_post' );

function register_rainbownews_featured_post()
{
    register_widget("rainbownews_featured_post");
} 

class rainbownews_featured_post extends WP_Widget {
    function __construct() {
        $widget_ops           = array(
            'classname'       => 'widget_featured_post',
            'description'     => esc_html__( 'Add your  Featured Post', 'rainbownews' )
        );
        $control_ops        = array(
            'width'           => 200,
            'height'          =>250
        );
        parent::__construct(
            false,
            $name             = esc_html__( 'NNC: Main Featured Post ', 'rainbownews' ),
            $widget_ops,
            $control_ops
        );
    }// end of construct.


 function form( $instance ) {
      $defaults['number'] = 3;
      $defaults['type'] = 'latest';
      $defaults['category'] = '';
      $instance = wp_parse_args( (array) $instance, $defaults );
      $number = $instance['number'];
      $type = $instance['type'];
      $category = $instance['category'];
      ?>
      <p>
         <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'rainbownews' ); ?></label>
         <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
      </p>

      <p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'rainbownews' );?><br />
       <input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'rainbownews' );?><br /></p>

      <p>
         <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'rainbownews' ); ?>:</label>
         <?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
      </p>

      <?php
   }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'number' ] = absint( $new_instance[ 'number' ] );
      $instance[ 'type' ] = $new_instance[ 'type' ];
      $instance[ 'category' ] = $new_instance[ 'category' ];

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      global $post;
      $number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
      $type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
      $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

      if( $type == 'latest' ) {
         $get_featured_posts = new WP_Query( array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'ignore_sticky_posts'   => true
         ) );
      }
      else {
         $get_featured_posts = new WP_Query( array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'category__in'          => $category
         ) );
      }


 echo $before_widget; ?>





   <!--    <div class="nnc-highlight-block">
       <?php
       $i=1;
       while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
           ?>
           <?php if( $i == 1 ) { $featured = 'colormag-featured-post-medium'; } else { $featured = 'colormag-featured-post-small'; } ?>
           <?php if( $i == 1 ) { echo '<div class="nnc-hightlight-large">'; } elseif( $i == 2 ) { echo '<div class="nnc-hightlight-small-block nnc-clearblock">'; } elseif ($i > 2) { echo '<div class="nnc-hightlight-small">'; } ?>


               <figure class="nnc-slide-img">
                   <img src="<?php echo get_template_directory_uri(); ?>/images/f2.png">
               </figure>
               <div class="nnc-dtl">
                   <div class="nnc-entry-title"><a href="#">Travelling with Kids on the Capricorn Coast</a></div>
                   <div class="nnc-entry-meta">
								<span class="posted-on">
									<a href="#" title="3:39 pm" rel="bookmark">
                                        <time class="entry-date" datetime="">
                                            June 28
                                        </time><br>
                                        <time>2016</time>
                                    </a>
								</span>
                       <span class="author"><i class="fa fa-user" aria-hidden="true"></i> <a href="#" title="admin">admin</a></span>
                       <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> <a href="#">No Comments</a></span>
                   </div>
                   <div class="nnc-category-list">
								<span class="cat-links">
									<a href="#" rel="category tag" style="background: red;">General</a>&nbsp;
									<a href="#" rel="category tag" style="background: blue;">Latest</a>&nbsp;
									<a href="#" rel="category tag" style="background: #333;">News</a>&nbsp;
								</span>
                   </div>
               </div>



 <?php if( $i == 1 ) { echo '</div>'; }
            $i++;
            if($i == 2 ){ echo '</div>'; }
         if ( $i > 2 ) { echo '</div>'; }
       endwhile;
         // Reset Post Data
         wp_reset_query();
         ?>
       </div>



                   

<?php echo $after_widget; ?>
 <?php
}// end of widdget function.
}// end of apply for action widget.



