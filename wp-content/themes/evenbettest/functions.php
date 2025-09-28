<?php
// WP settings
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// Constants
define('ASSETS_DIR', get_template_directory_uri().'/assets');
define('ASSETS_DIR_PLAIN', get_template_directory().'/assets');
define('PARTS_DIR', get_template_directory().'/template-parts');
define('LOCALE', preg_replace('/(.*)_(.*)/', '$1', determine_locale()));

define('FALLBACK_IMG_ID', 11);
$GLOBALS['IDS']['product'] = 12;

// Blocks setup
require_once(PARTS_DIR . '/helpers.php');
require_once(PARTS_DIR . '/blocks-setup.php');
require_once(PARTS_DIR . '/setup.php');
