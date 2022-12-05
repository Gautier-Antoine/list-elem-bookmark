<?php
/**
 * Plugin Name:       ListBookMark Plugin
 * Description:       Small Widget - [viscaweb-sc]
 * Version:           0.1.0
 * Author:            Gautier-Antoine
 */



/**
 * Trigger Shortcode
 * [orchestrated_contact_form recipients="antoine@orchestrated.ca, support@orchestrated.ca"]
 *
 * @param array attributes
 * @return string|false
 */
function block_shortcode()
{
    // ! load css
    wp_enqueue_style('block-css', plugin_dir_url(__FILE__) . '/files/style.css');
    ob_start();
    visual_elem();
    return ob_get_clean();
}

/**
 * Add Shortcode
 *
 * @return void
 */
function shortcode_block_init()
{
    add_shortcode('viscawebsc', 'block_shortcode');
}
add_action('init', 'shortcode_block_init');



function get_block_details() {
    return $array = [
        [
            'name' => '',
            'icon' => '',
            'rating' => '',
            'link_review' => '',
            'bonus' => '',
            'link' => ''
        ],

    ];
}

function visual_elem() {
    ?>
    <div class="block">
        <div class="header">
            <a class="alpha">Sort Alphabetically</a>
            <h2 class="canada">BEST SPORTS BETTING SITES</h2>
            <input type="checkbox" class="view">Change View</input>
        </div>
        <div class="main">
            <?php
            $elems = get_block_details();
            foreach ($elems as $elem) {
                echo '<div class="elem">';
                    echo '<h2 class="position">get_position</h2>';
                    echo '<img src="' . $elem['icon'] . '">';
                    echo '<img src="' . $elem['rating'] . '">';
                    echo '<a href="' . $elem['link_review'] . '">Read review</a>';
                    echo '<p>' . $elem['bonus'] . '</p>';
                    echo '<a class="btn" href="' . $elem['link'] . '">Play Now</a>';

                echo '</div>';
            }
            echo '</div>';
            ?>
        <div class="footer">
            <a class="alpha">View All Sports Betting Sites</a>
        </div>
    </div>
    <?php
}

