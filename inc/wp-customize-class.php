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

class Rainbownews_Image_Radio_Control extends WP_Customize_Control
{

    public function render_content()
    {

        if (empty($this->choices))
            return;

        $name = '_customize-radio-' . $this->id;

        ?>
        <style>
            #
            <?php echo $this->id; ?>
            .powermag-radio-img-img {
                border: 3px solid #DEDEDE;
                margin: 0 5px 5px 0;
                cursor: pointer;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
            }

            #
            <?php echo $this->id; ?>
            .powermag-radio-img-selected {
                border: 3px solid #AAA;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
            }

            input[type=checkbox]:before {
                content: '';
                margin: -3px 0 0 -4px;
            }
        </style>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='<?php echo $this->id; ?>'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'powermag-radio-img-selected powermag-radio-img-img' : 'powermag-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style='display:none' type="radio"
                               value="<?php echo esc_attr($value); ?>"
                               name="<?php echo esc_attr($name); ?>" <?php $this->link();
                        checked($this->value(), $value); ?> />
                        <img src='<?php echo esc_html($label); ?>' class='<?php echo $class; ?>'/>
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <script type="text/javascript">

            jQuery(document).ready(function ($) {
                $('.controls#<?php echo $this->id; ?> li img').click(function () {
                    $('.controls#<?php echo $this->id; ?> li').each(function () {
                        $(this).find('img').removeClass ('powermag-radio-img-selected');
                    });
                    $(this).addClass ('powermag-radio-img-selected');
                });
            });

        </script>
        <?php
    }
}

