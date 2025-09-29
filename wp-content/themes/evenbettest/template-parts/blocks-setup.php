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
    register_block_type(__DIR__ . '/blocks/accordion-decorated');
    register_block_type(__DIR__ . '/blocks/cards-basic');
    register_block_type(__DIR__ . '/blocks/cards-team');
    register_block_type(__DIR__ . '/blocks/container');
    register_block_type(__DIR__ . '/blocks/decoration-basic');
    register_block_type(__DIR__ . '/blocks/form-basic');
    register_block_type(__DIR__ . '/blocks/hero-decorated');
}
add_action('init', 'register_acf_blocks');

function enqueue_blocks_assets($post) {
    if (empty($post)) {
        $post = get_the_ID();
    }

    if (enhanced_has_block('acf/accordion-decorated', $post)) {
        wp_enqueue_script('flowbite-js', ASSETS_DIR . '/lib/flowbite/flowbite.min.js');
    }
    if (enhanced_has_block('acf/cards-team', $post)) {
        wp_enqueue_script('swiper-js', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.js');
        wp_enqueue_style('swiper-css', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.css');
    }
    if (enhanced_has_block('acf/form-basic', $post)) {
        wp_enqueue_style('wpforms-css', ASSETS_DIR . '/css/wpforms.css', [], filemtime(ASSETS_DIR_PLAIN . '/css/wpforms.css'));
    }
}
add_action('enqueue_block_assets', 'enqueue_blocks_assets');
