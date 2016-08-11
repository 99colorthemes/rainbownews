<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 99colorthemes
 * @subpackage PageLine
 * @since PageLine 1.0
 */
if (!class_exists('WP_Customize_Control'))
    return NULL;

/**
 * Class theme important links starts.
 */
class RainbowNews_Important_Links extends WP_Customize_Control
{

    public $type = "rainbownews-important-links";

    public function render_content()
    {
        //Add Theme instruction, Support Forum, Demo Link, Rating Link
        $important_links = array(
            'theme-info' => array(
                'link' => esc_url('http://99colorthemes.com/themes/rainbownews/'),
                'text' => esc_html__('Theme Info', 'rainbownews'),
            ),
            'support' => array(
                'link' => esc_url('http://99colorthemes.com/support-forum/'),
                'text' => esc_html__('Support Forum', 'rainbownews'),
            ),
            'documentation' => array(
                'link' => esc_url('http://docs.99colorthemes.com/rainbownews/'),
                'text' => esc_html__('Documentation', 'rainbownews'),
            ),
            'demo' => array(
                'link' => esc_url('http://demo.99colorthemes.com/rainbownews/'),
                'text' => esc_html__('View Demo', 'rainbownews'),
            ),
            'rating' => array(
                'link' => esc_url('http://wordpress.org/support/view/theme-reviews/rainbownews?filter=5'),
                'text' => esc_html__('Rate this theme', 'rainbownews'),
            ),
        );
        foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . esc_url($important_link['link']) . '" >' . esc_attr($important_link['text']) . ' </a></p>';
        }
    }

}

