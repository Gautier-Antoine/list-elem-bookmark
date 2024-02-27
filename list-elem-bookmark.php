<?php
/**
 * Plugin Name:       ListBookMark Plugin
 * Description:       Small Widget - [viscaweb-sc]
 * Version:           0.1.0
 * Author:            Gautier-Antoine
 */


/**
 * Trigger Shortcode
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
    add_shortcode('viscaweb-sc', 'block_shortcode');
}
add_action('init', 'shortcode_block_init');

/**
 * Make HTML
 *
 * @return void
 */
function visual_elem() {
    $plugin_url = plugin_dir_url( __FILE__ );
    ?>
    <div class="block-best-betting-site">
        <div class="header flex">
            <a class="sort" onClick="sort_elem(this)">Sort Alphabetically</a>
            <div class="title flex">
                <img class="logo" src="<?= $plugin_url; ?>./img/canada.png" alt="canadian flag">
                <h1>BEST SPORTS BETTING SITES</h1>
            </div>
            <div class="view-content flex hide-mobile">
                <label for="view" class="view">Change View</label>
                <input type="checkbox" onClick="change_view()" name="view" id="view" class="view">
            </div>
        </div>
        <hr class="hide-mobile">
        <div class="main flex">
            <?php
            $elems = get_block_details();
            $html = '';
            foreach ($elems as $elem) {
                $id = sanitize_title_with_dashes($elem['name']);
                $html .= '<div onClick="get_link(this)" class="elem flex" id="' . $id . '">';
                    $html .= '<div class="part-1 flex">';
                        $html .= '<h2 class="position">' . $elem['position']['canada'] . '</h2>';
                        $html .= '<img class="logo" src="' . $plugin_url . $elem['icon'] . '">';
                        $html .= '<a class="rating flex hide-mobile" href="' . $elem['link_review'] . '">';
                            for ($i = 0; $i < $elem['rating']; $i++ ) {
                                $html .= '<img src="' . $plugin_url . './img/icon/star.png">';
                            }
                        $html .= '</a>';
                        $html .= '<a class="review" href="' . $elem['link_review'] . '"></a>';
                    $html .= '</div>';
                    $html .= '<div class="part-2 flex">';
                        if ($elem['bonus']['exclusive']) {
                            $html .= '<p class="exclusive hide-mobile">- Exclusive -</p>';
                        } else {
                            $html .= '<p class="sign-up hide-mobile">100% Sign Up Bonus</p>';
                        }
                        $html .= '<p>' . $elem['bonus']['amount'] . '</p>';
                        if ($elem['bonus']['type'] == 'bet') {
                            $html .= '<p class="bet hide-mobile"> Free Bet</p>';
                        } else {
                            $html .= '<p class="bet hide-mobile"> Bonus</p>';
                        }
                        $html .= '<a class="btn flex" href="' . $elem['link'] . '"><span class="hide-mobile">Play Now</span></a>';
                    $html .= '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';
            echo $html;
            ?>
        <div class="footer">
            <a class="alpha" href="/all">View All Sports Betting Sites</a>
        </div>
    </div>
    <?php
}
/**
 * Lists of companies
 *
 * @return Array
 */
function get_block_details() {
    return [
        [
            'name' => 'Sports interaction',
            'icon' => './img/logo/sports-interaction.png',
            'rating' => 5,
            'link_review' => '/#link-review',
            'bonus' => [
                'exclusive' => true,
                'type' =>'bonus',
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
            'name' => 'PowerPlay Sports',
            'icon' => './img/logo/powerplay-sports.png',
            'rating' => 5,
            'link_review' => '/#link-review',
            'bonus' => [
                'exclusive' => true,
                'type' =>'bonus',
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
            'name' => 'Betway',
            'icon' => './img/logo/betway.png',
            'rating' => 5,
            'link_review' => '/#link-review',
            'bonus' => [
                'exclusive' => false,
                'type' =>'bonus',
                'amount' =>'200$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 3,
                'us' => 2,
            ],
        ],
        [
            'name' => 'Spin Sports',
            'icon' => './img/logo/spin-sports.png',
            'rating' => 5,
            'link_review' => '/#link-review',
            'bonus' => [
                'exclusive' => true,
                'type' =>'bet',
                'amount' =>'500$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 4,
                'us' => 2,
            ],
        ],
        [
            'name' => 'Bodog',
            'icon' => './img/logo/bodog.png',
            'rating' => 5,
            'link_review' => '/#link-review',
            'bonus' => [
                'exclusive' => false,
                'type' =>'bonus',
                'amount' =>'200$',
                'after' =>'200$',
            ],
            'link' => '/#link',
            'position' => [
                'canada' => 5,
                'us' => 2,
            ],
        ],
    ];
}
