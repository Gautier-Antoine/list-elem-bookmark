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
    wp_register_script('block-js', plugin_dir_url(__FILE__) . '/files/block.js', array('jquery'), null, true);
    wp_enqueue_script('block-js');
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
            'name' => 'Betty',
            'icon' => 'https://global-uploads.webflow.com/5e157547d6f791d34ea4e2bf/6087f2b060c7a92408bac811_logo.svg',
            'rating' => 'https://media.istockphoto.com/id/1072182672/vector/five-stars-rating-vector-icon.jpg?s=612x612&w=0&k=20&c=xrQFBRAmMApyDvVOeJrlwYazCNMj52aDwekhVCt_Nu8=',
            'link_review' => '/#link-review',
            'bonus' => [
                'before' =>'200$',
                'amount' =>'200$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 1,
                'us' => 3,
            ],
        ],
        [
            'name' => 'Allin',
            'icon' => 'https://global-uploads.webflow.com/5e157547d6f791d34ea4e2bf/6087f2b060c7a92408bac811_logo.svg',
            'rating' => 'https://media.istockphoto.com/id/1072182672/vector/five-stars-rating-vector-icon.jpg?s=612x612&w=0&k=20&c=xrQFBRAmMApyDvVOeJrlwYazCNMj52aDwekhVCt_Nu8=',
            'link_review' => '/#link-review',
            'bonus' => [
                'before' =>'200$',
                'amount' =>'200$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 2,
                'us' => 1,
            ],
        ],
        [
            'name' => 'Castor',
            'icon' => 'https://global-uploads.webflow.com/5e157547d6f791d34ea4e2bf/6087f2b060c7a92408bac811_logo.svg',
            'rating' => 'https://media.istockphoto.com/id/1072182672/vector/five-stars-rating-vector-icon.jpg?s=612x612&w=0&k=20&c=xrQFBRAmMApyDvVOeJrlwYazCNMj52aDwekhVCt_Nu8=',
            'link_review' => '/#link-review',
            'bonus' => [
                'before' =>'200$',
                'amount' =>'200$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 3,
                'us' => 2,
            ],
        ],
    ];
}

function visual_elem() {
    ?>
    <div class="block-best-betting-site">
        <div class="header">
            <a class="sort" onClick="sort_elem(this)">Sort Alphabetically</a>
            <h2 class="canada">BEST SPORTS BETTING SITES</h2>
            <input type="checkbox" onClick="change_view()" name="view" id="view" class="view">
            <label for="view" class="view">Change View</label>
        </div>
        <div class="main">
            <?php
            $elems = get_block_details();
            foreach ($elems as $elem) {
                echo '<div onClick="get_link(this)" class="elem" id="' . sanitize_title_with_dashes($elem['name']) . '">';
                    echo '<div class="part-1">';
                        echo '<h2 class="position">' . $elem['position']['canada'] . '</h2>';
                        echo '<img class="logo" src="' . $elem['icon'] . '">';
                        echo '<a href="' . $elem['link_review'] . '"><img class="rating" src="' . $elem['rating'] . '"></a>';
                        echo '<a href="' . $elem['link_review'] . '">Read review</a>';
                    echo '</div>';
                    echo '<div class="part-2">';
                        echo '<p>' . $elem['bonus']['amount'] . '</p>';
                        echo '<a class="btn" href="' . $elem['link'] . '"><span>Play Now</span></a>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            ?>
        <div class="footer">
            <a class="alpha" href="/all">View All Sports Betting Sites</a>
        </div>
    </div>
    <?php
}

