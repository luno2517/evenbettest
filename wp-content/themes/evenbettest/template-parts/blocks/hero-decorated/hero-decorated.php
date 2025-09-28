<?php
/**
 * Hero Decorated Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!defined('ABSPATH'))
    exit;

$anchor = esc_attr($block['id']);

// Get field values
$title = get_field('title');
$info = get_field('info');
$content = get_field('content');
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
<?php if (!empty($title)):?>
    <section id="<?php echo esc_attr($anchor);?>" class="<?php echo esc_attr($class_name);?><?php echo empty($padding_classes) ? ' py-5 lg:py-0' : '';?>">
        <div class="<?php echo esc_attr($container_classes);?>">
            <?php if (!empty($info) || !empty($content)):?>
                <div class="flex gap-x-6 xl:gap-x-[90px]">
                    <div class="w-[282px] min-w-[282px] h-[760px] hidden lg:block" style="background-image: url('<?php echo ASSETS_DIR;?>/img/decoration-left.svg'); background-position: right;"></div>
                    <div class="w-[745px] flex flex-col gap-y-8 justify-center">
                        <h1 class="text-evenbettest-emerald">
                            <?php echo esc_attr($title);?>
                        </h1>
                        <?php if (!empty($info)):
                            $info_length = count($info);
                            ?>
                            <div class="flex flex-col extra-xl:flex-row extra-xl:items-center gap-y-2 gap-x-5">
                                <?php foreach ($info as $key => $item):?>
                                    <div class="text-[28px] leading-[1.3]">
                                        <?php echo esc_attr($item['text']);?>
                                    </div>
                                    <?php if ($key+1 !== $info_length):?>
                                        <div class="text-evenbettest-purple-text text-[32px] hidden extra-xl:block">
                                            |
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                        <?php if (!empty($content)):?>
                            <div class="entry-content enhanced">
                                <?php echo wpautop($content);?>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="w-[767px] h-[760px] hidden lg:block" style="background-image: url('<?php echo ASSETS_DIR;?>/img/decoration-right.svg'); background-position: left;"></div>
                </div>
            <?php endif;?>
            <div class="">

            </div>
        </div>
    </section>
<?php endif;?>
