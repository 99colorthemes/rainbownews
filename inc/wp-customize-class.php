<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 99colorthemes
 * @subpackage RainbowNews
 * @since RainbowNews 1.0
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

/**
 * A class to create a radio button  for sidebar
 */
class RainbowNews_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {

        if ( empty( $this->choices ) )
            return;

        $name = '_customize-radio-' . $this->id;

        ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

        <ul class="controls" id = 'rainbownews-img-container'>

            <?php	foreach ( $this->choices as $value => $label ) :

                $class = ($this->value() == $value)?'rainbownews-radio-img-selected rainbownews-radio-img-img':'rainbownews-radio-img-img';

                ?>

                <li style="display: inline;">

                    <label>

                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />

                        <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr( $class) ; ?>' />

                    </label>

                </li>

            <?php	endforeach;	?>

        </ul>

        <?php
    }
}


/**
 * A class to create a dropdown for all categories to news ticker
 */
class RainbowNews_Category_Dropdown_Custom_Control extends WP_Customize_Control {

    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array()) {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */

    public function render_content() {

        if(!empty($this->cats)) {
            ?>

            <label>

                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

                <select <?php $this->link(); ?>>

                    <?php
                    foreach ( $this->cats as $cat ) {
                        printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                    }
                    ?>

                </select>

            </label>

            <?php
        }
    }
}