<?php
/**
 * Container Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!defined('ABSPATH'))
    exit;

$anchor = esc_attr($block['id']);

// Get field values
$apply_content_styling = get_field('apply_content_styling');

$background_color = get_field('background_color');
$padding_top = get_field('padding_top');
$padding_bottom = get_field('padding_bottom');
$container_size = get_field('container_size');

// Get default variables
$section_classes = evenbettest_get_default_section_classes();
$container_classes = evenbettest_get_container_classes($container_size);
$padding_classes = evenbettest_get_padding_classes($padding_top, $padding_bottom);

// Build <section> classes
$class_name = $section_classes . ' ' . $padding_classes;
if ($background_color) {
    $class_name .= ' bg-[' . $background_color . ']';
}
?>
<section id="<?php echo esc_attr($anchor);?>" class="<?php echo esc_attr($class_name);?><?php echo empty($padding_classes) ? ' py-5 lg:py-0' : '';?>">
    <div class="<?php echo esc_attr($container_classes);?>">
        <div class="<?php echo $apply_content_styling === 'yes' ? 'entry-content' : '';?>">
            <InnerBlocks />
        </div>
    </div>
</section>
