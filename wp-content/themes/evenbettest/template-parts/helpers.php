<?php
if (!defined('ABSPATH'))
    exit;

function pr($o, $show = false) {
    if (current_user_can('manage_options') || $show) {
        $bt = debug_backtrace();
        $bt = $bt[0];
        $dRoot = $_SERVER["DOCUMENT_ROOT"];
        $dRoot = str_replace("/","\\",$dRoot);
        $bt["file"] = str_replace($dRoot,"",$bt["file"]);
        $dRoot = str_replace("\\","/",$dRoot);
        $bt["file"] = str_replace($dRoot,"",$bt["file"]);
        ?>
        <div style='font-size:9pt; color:#000; background:#fff; border:1px dashed #000;'>
            <div style='padding:3px 5px; background: linear-gradient(to bottom, rgba(220,247,153,1) 1%,rgba(152,246,249,1) 100%); font-weight:bold;'>File: <?php echo $bt["file"]?> [<?php echo $bt["line"]?>]</div>
            <pre style='padding:10px;'><?php print_r($o)?></pre>
        </div>
        <?php
    }
    else{
        return false;
    }
}

function enhanced_has_block($block_name, $post) {
    if (has_block($block_name, $post)) {
        return true;
    }

    if (has_block('core/block', $post)) {
        $content = get_post_field('post_content', $post);
        $blocks = parse_blocks($content);
        return search_reusable_blocks_within_innerblocks($blocks, $block_name);
    }

    return false;
}

function search_reusable_blocks_within_innerblocks($blocks, $block_name) {
    foreach ($blocks as $block) {
        if (isset($block['innerBlocks']) && !empty($block['innerBlocks'])) {
            search_reusable_blocks_within_innerblocks($block['innerBlocks'], $block_name);
        } elseif ($block['blockName'] === 'core/block' && !empty($block['attrs']['ref']) && has_block($block_name, $block['attrs']['ref'])) {
            return true;
        }
    }
    return false;
}

function evenbettest_get_default_section_classes($decoration = []) {
    if (empty($decoration)) {
        $class_names = 'relative section overflow-hidden alignfull';
    }
    else {
        $class_names = 'relative section alignfull';
    }

    return $class_names;
}

function evenbettest_get_container_classes($container_size = 'regular') {
    if (empty($container_size)) {
        return 'container';
    }

    return 'container container-' . $container_size;
}

function evenbettest_get_padding_classes($top = 'none', $bottom = 'none') {
    if ($top === 'none' && $bottom === 'none') {
        return '';
    }

    // Rem values for tailwind classes
    $rem_values = [
        '50px' => [
            'desktop' => '12.5',
            'mobile' => '6',
        ],
        '100px' => [
            'desktop' => '25',
            'mobile' => '12.5',
        ],
        '120px' => [
            'desktop' => '30',
            'mobile' => '15',
        ],
        '150px' => [
            'desktop' => '37.5',
            'mobile' => '18.75',
        ],
    ];

    // Top
    if ($top === 'none') {
        $padding_top = '';
    }
    else {
        if (array_key_exists($top, $rem_values)) {
            $padding_top = 'pt-' . $rem_values[$top]['mobile'] . ' ' . 'lg:pt-' . $rem_values[$top]['desktop'];
        }
        else {
            $padding_top = 'pt-0';
        }
    }

    // Bottom
    if ($bottom === 'none') {
        $padding_bottom = '';
    }
    else {
        if (array_key_exists($bottom, $rem_values)) {
            $padding_bottom = 'pb-' . $rem_values[$bottom]['mobile'] . ' ' . 'lg:pb-' . $rem_values[$bottom]['desktop'];
        }
        else {
            $padding_bottom = 'pb-0';
        }
    }

    return $padding_top . ' ' . $padding_bottom;
}

function build_title($title = '', $title_text_size = 'h1', $no_margin = false) {
    if (empty($title)) {
        return '';
    }

    if ($title_text_size === 'h1_enhanced') {
        return '<h1 class="enhanced w-full' . ($no_margin === true ? ' mb-0' : '') . '">' . esc_attr($title) . '</h1>';
    }

    if ($title_text_size === 'h2_enhanced') {
        return '<h2 class="enhanced w-full' . ($no_margin === true ? ' mb-0' : '') . '">' . esc_attr($title) . '</h2>';
    }

    if ($title_text_size === 'h2_enhanced_bold') {
        return '<h2 class="enhanced-bold w-full' . ($no_margin === true ? ' mb-0' : '') . '">' . esc_attr($title) . '</h2>';
    }

    $title_html = '<' . $title_text_size . ' class="w-full' . ($no_margin === true ? ' mb-0' : '') . '">';
    $title_html .= esc_attr($title);
    $title_html .= '</' . $title_text_size . '>';

    return $title_html;
}

function get_custom_fields($post_type, $post_id) {
    if (empty($post_type) || empty($post_id)) {
        return [];
    }

    $custom_fields = [];

    if ($post_type === 'products') {
        $custom_fields = get_fields($post_id);
    }

    return $custom_fields;
}

function get_acf_field_values($field_name, $posts = []) {
    $values = [];

    if (empty($field_name)) {
        return $values;
    }

    if (empty($posts)) {
        $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
        ];

        $posts = get_posts($args);
    }

    foreach ($posts as $post) {
        $value = get_field($field_name, $post->ID);

        if (!empty($value) && !in_array($value, $values)) {
            $values[] = $value;
        }
    }

    rsort($values);

    return $values;
}
function get_attributes_values($field_name, $posts = []) {
    $values = [];

    if (empty($field_name)) {
        return $values;
    }

    if (empty($posts)) {
        $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
        ];

        $posts = get_posts($args);
    }

    foreach ($posts as $post) {
        $product = wc_get_product($post);
        $value = $product->get_attribute($field_name);

        if (!empty($value) && !in_array($value, $values)) {
            $values[] = $value;
        }
    }

    rsort($values);

    return $values;
}
