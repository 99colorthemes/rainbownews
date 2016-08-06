<?php
/**
 * The template for displaying search forms in Rainbownews.
 *
 * @package 99colorthemes
 * @subpackage Rainbownews
 * @since Rainbownews 1.0
 */
?>
<form class="s-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="form">
    <div class="search-form">
        <input type="text" placeholder="<?php echo esc_attr_x( 'Search Here...', 'placeholder', 'rainbownews' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
    </div> 
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
