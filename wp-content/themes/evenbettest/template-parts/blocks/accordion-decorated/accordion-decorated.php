<?php
/**
 * Accordion Decorated Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!defined('ABSPATH'))
    exit;

$anchor = esc_attr($block['id']);

// Get field values
$title = get_field('title');
$items = array_filter((array) get_field('items'));

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
    <div class="<?php echo esc_attr($container_classes);?> relative">
        <div class="lg:grid lg:grid-cols-2 lg:gap-[90px] lg:pl-[18%] extra-xl:pl-[372px] lg:items-center">
            <div class="flex flex-col gap-y-7.5">
                <?php if (!empty($title)):?>
                    <h2>
                        <?php echo esc_attr($title);?>
                    </h2>
                <?php endif;?>
                <?php if (!empty($items)):?>
                    <div class="block-accordion flex flex-col">
                        <?php
                        $cnt = count($items);
                        foreach ($items as $key => $item):?>
                            <div class="accordion-heading border-b border-evenbettest-pink-light" id="<?php echo $block['id'] . '-accordion-heading-' . $key;?>" aria-expanded="false">
                                <button
                                    class="flex w-full items-center justify-between py-7.5 text-left gap-x-4"
                                    data-accordion-target="#<?php echo $block['id'] . '-accordion-body-' . $key;?>"
                                    type="button"
                                    aria-controls="<?php echo $block['id'] . '-accordion-body-' . $key;?>"
                                    >
                                    <?php if (!empty($item['title'])):?>
                                        <span class="font-medium text-xl lg:text-[24px] leading-[1.3]">
                                            <?php echo esc_attr($item['title']);?>
                                        </span>
                                    <?php endif;?>
                                    <span class="accordion-icon-plus flex items-center justify-center w-[25px] h-[25px] shrink-0 hover:opacity-80" data-accordion-icon="">
                                        <img src="<?php echo ASSETS_DIR;?>/icons/plus.svg" class="quper-icon !max-w-[25px]" alt>
                                    </span>
                                    <span class="accordion-icon-minus flex items-center justify-center w-[25px] h-[25px] shrink-0 hover:opacity-80 !hidden" data-accordion-icon="">
                                        <img src="<?php echo ASSETS_DIR;?>/icons/minus.svg" class="quper-icon !max-w-[25px]" alt>
                                    </span>
                                </button>
                            </div>
                            <div
                                class="pt-7.5 pb-15 border-b border-evenbettest-pink-light"
                                id="<?php echo $block['id'] . '-accordion-body-' . $key;?>"
                                aria-labelledby="<?php echo $block['id'] . '-accordion-heading-' . $key;?>"
                                >
                                <?php if (!empty($item['content'])):?>
                                    <div class="entry-content">
                                        <?php echo wpautop($item['content']);?>
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
            <div class="h-[760px] hidden lg:block" style="background-image: url('<?php echo ASSETS_DIR;?>/img/decoration-faq.png'); background-position: left;"></div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        const accordions = document.querySelectorAll('.block-accordion');
        if (accordions instanceof NodeList && 0 !== accordions.length) {
            Array.from(accordions).forEach((block) => {
                const activeClasses = 'active !border-b-0';
                const inactiveClasses = 'inactive';

                const options = {
                    activeClasses: activeClasses,
                    inactiveClasses: inactiveClasses,
                    onToggle: (item) => {
                        item._items.forEach(button => {
                            let minusIcon = button.triggerEl.querySelector('.accordion-icon-minus');
                            let plusIcon = button.triggerEl.querySelector('.accordion-icon-plus');

                            if (minusIcon instanceof HTMLElement && plusIcon instanceof HTMLElement) {
                                let isActive = button.active === true;
                                minusIcon.classList.toggle('!hidden', !isActive);
                                plusIcon.classList.toggle('!hidden', isActive);
                            }
                        });
                    },
                };

                const accordionItems = block.querySelectorAll('.accordion-heading');
                if (accordionItems instanceof NodeList && 0 !== accordionItems.length) {
                    const contentAccordionItems = Array.from(accordionItems)
                        .map((accordionItem) => {
                            const accordionBody = block.querySelector(
                                `[aria-labelledby=${accordionItem.id}]`,
                            );
                            return {
                                id: accordionItem.id,
                                triggerEl: accordionItem,
                                targetEl: accordionBody,
                                active: true,
                            };
                        })
                        .filter((item) => item.targetEl instanceof HTMLElement);

                    const accordion = new Accordion(block, contentAccordionItems, options);
                    accordion.close('<?php echo $block['id'] . '-accordion-heading-0';?>');
                }
            });
        }
    });
</script>
