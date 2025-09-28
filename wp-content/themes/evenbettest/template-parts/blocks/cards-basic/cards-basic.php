<?php
/**
 * Cards Basic Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!defined('ABSPATH'))
    exit;

$anchor = esc_attr($block['id']);

// Get field values
$title = get_field('title');
$columns = get_field('columns');
$cards = array_filter((array) get_field('cards'));
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
<?php if (!empty($cards)):?>
    <section id="<?php echo esc_attr($anchor);?>" class="<?php echo esc_attr($class_name);?><?php echo empty($padding_classes) ? ' py-5 lg:py-0' : '';?>">
        <div class="<?php echo esc_attr($container_classes);?> flex flex-col gap-y-6 lg:gap-y-12">
            <?php if (!empty($title)):?>
                <h2 class="text-evenbettest-purple-dark text-center">
                    <?php echo esc_attr($title);?>
                </h2>
            <?php endif;?>
            <div class="grid lg:grid-cols-<?php echo esc_attr($columns);?> gap-5">
                <?php foreach ($cards as $card):?>
                    <?php
                    if (!empty($card['link']['url'])) {
                        include PARTS_DIR. '/cards/card-link.php';
                    }
                    else {
                        include PARTS_DIR. '/cards/card.php';
                    }
                    ?>
                <?php endforeach;?>
            </div>
        </div>
    </section>
<?php endif;?>
