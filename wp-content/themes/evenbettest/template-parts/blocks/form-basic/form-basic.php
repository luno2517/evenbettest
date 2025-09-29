<?php
/**
 * Form Basic Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!defined('ABSPATH'))
    exit;

$anchor = esc_attr($block['id']);

// Get field values
$title = get_field('title');
$form_id = get_field('form_id');

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
<?php if (!empty($form_id)):?>
    <section id="<?php echo esc_attr($anchor);?>" class="<?php echo esc_attr($class_name);?><?php echo empty($padding_classes) ? ' py-5 lg:py-0' : '';?>">
        <div class="<?php echo esc_attr($container_classes);?> relative">
            <div class="relative z-10 flex flex-col gap-y-6 items-center justify-center">
                <?php if (!empty($title)):?>
                    <h2 class="text-center max-w-[628px]">
                        <?php echo esc_attr($title);?>
                    </h2>
                <?php endif;?>
                <div class="evenbettest-form">
                    <?php echo do_shortcode('[wpforms id="' . $form_id . '"]');?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
