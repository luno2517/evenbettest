<?php
if (!defined('ABSPATH'))
    exit;

// Security
add_filter('xmlrpc_enabled', '__return_false', PHP_INT_MAX);
add_filter('xmlrpc_methods', '__return_empty_array', PHP_INT_MAX);
add_filter('xmlrpc_element_limit', function() {
    return 1;
}, PHP_INT_MAX);

// Enqueue scripts and styles
function enqueue_scripts_and_styles() {
    wp_enqueue_style('tailwindcss_output-css', get_template_directory_uri() . '/dist/output.css', [], filemtime(get_template_directory() . '/dist/output.css'));
    wp_enqueue_style('app-css', ASSETS_DIR . '/css/app.css', [], filemtime(ASSETS_DIR_PLAIN . '/css/app.css'));
    wp_enqueue_script('app-js', ASSETS_DIR . '/js/app.js', [], filemtime(ASSETS_DIR_PLAIN . '/js/app.js'), ['in_footer' => true]);
    if (strpos($_SERVER['REQUEST_URI'], 'checkout/') === false) {
        wp_enqueue_script('jquery-js', ASSETS_DIR . '/lib/jquery/jquery-3.3.1.min.js');
    }

    if (is_singular('product')) {
        wp_enqueue_script('swiper-js', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.js');
        wp_enqueue_style('swiper-css', ASSETS_DIR . '/lib/swiper/swiper-bundle.min.css');
        wp_enqueue_script('flowbite-js', ASSETS_DIR . '/lib/flowbite/flowbite.min.js');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');

function enqueue_admin_scripts_and_styles() {
    global $parent_file;
    global $pagenow;

    if ($pagenow === 'post.php' && strpos($parent_file, 'acf') === false) {
        wp_enqueue_style('tailwindcss_output-css', get_template_directory_uri() . '/dist/output.css', [], filemtime(get_template_directory() . '/dist/output.css'));
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', false );
        wp_enqueue_style('app-css', ASSETS_DIR . '/css/app.css', [], filemtime(ASSETS_DIR_PLAIN . '/css/app.css'));
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts_and_styles');
function admin_styles() {
    wp_enqueue_style('admin-styles', ASSETS_DIR . '/css/wordpress.css', [], filemtime(ASSETS_DIR_PLAIN . '/css/wordpress.css'));
}
add_action('admin_head', 'admin_styles');

function admin_modify_js() {
    wp_enqueue_script( 'admin-modify-js', ASSETS_DIR . '/js/acf.js', [], '1.0.0', true);
}
add_action('acf/input/admin_enqueue_scripts', 'admin_modify_js');

// Remove redirect guess
function remove_redirect_guess_404_permalink($redirect_url){
    if (is_404()){
        return false;
    }
    return $redirect_url;
}
add_filter('redirect_canonical', 'remove_redirect_guess_404_permalink');
