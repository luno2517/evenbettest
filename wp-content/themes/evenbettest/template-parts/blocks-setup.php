<?php
if (!defined('ABSPATH'))
    exit;

add_filter('block_categories_all', function($categories) {
    $categories[] = [
        'slug'  => 'evenbettest',
        'title' => __('evenbettest', 'evenbettest'),
    ];

    return $categories;
} );

function register_acf_blocks()
{
    register_block_type(__DIR__ . '/blocks/cards-basic');
    register_block_type(__DIR__ . '/blocks/cards-team');
    register_block_type(__DIR__ . '/blocks/container');
    register_block_type(__DIR__ . '/blocks/decoration-basic');
    register_block_type(__DIR__ . '/blocks/hero-decorated');
}
add_action('init', 'register_acf_blocks');

function enqueue_blocks_assets($post) {
    if (empty($post)) {
        $post = get_the_ID();
    }

    if (enhanced_has_block('acf/cards-team', $post)) {
        wp_enqueue_script('swiper-js', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.js');
        wp_enqueue_style('swiper-css', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.css');
    }
}
add_action('enqueue_block_assets', 'enqueue_blocks_assets');
