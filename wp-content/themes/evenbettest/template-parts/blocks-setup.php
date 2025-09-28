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
}
add_action('init', 'register_acf_blocks');

function enqueue_blocks_assets($post) {
    if (empty($post)) {
        $post = get_the_ID();
    }
}
add_action('enqueue_block_assets', 'enqueue_blocks_assets');
