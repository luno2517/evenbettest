<?php
/**
 * Cards Team Block template.
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
        <div class="<?php echo esc_attr($container_classes);?> relative flex flex-col gap-y-6 lg:gap-y-12">
            <?php if (!empty($title)):?>
                <h2 class="text-center">
                    <?php echo esc_attr($title);?>
                </h2>
            <?php endif;?>
            <div class="swiper-outer-<?php echo esc_attr($anchor);?>">
                <div class="absolute left-0 top-[37%] lg:top-[45%] w-full flex items-center justify-between px-5 md:px-0">
                    <span class="swiper-prev relative z-20 md:left-2 lg:left-6 xl:left-10">
                        <img src="<?php echo ASSETS_DIR;?>/icons/angle.svg" class="quper-icon !h-8 !w-4 relative right-0.5">
                    </span>
                    <span class="swiper-next relative z-20 md:left-2 lg:left-6 xl:right-10">
                        <img src="<?php echo ASSETS_DIR;?>/icons/angle.svg" class="quper-icon !h-8 !w-4 rotate-180 relative left-0.5">
                    </span>
                </div>
                <div class="swiper-<?php echo esc_attr($anchor);?> relative flex flex-row items-center justify-center overflow-hidden">
                    <div class="swiper-wrapper">
                        <?php foreach ($cards as $card):?>
                            <div class="swiper-slide">
                                <?php include PARTS_DIR. '/cards/card-team.php';?>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function ($) {
            const carouselCardsInit = (defaultOptions = {}) => {
                const swiperOuter = $('.swiper-outer-<?php echo esc_attr($anchor);?>');
                if (swiperOuter.length === 0) return;

                const options = {
                    ...defaultOptions,
                    spaceBetween: '5%',
                    slidesPerView: 'auto',
                    speed: 800,
                    breakpoints: {
                        768: {
                            slidesPerView: 3,
                            spaceBetween: '5%',
                        },
                        1024: {
                            slidesPerView: <?php echo esc_attr($columns);?>,
                            spaceBetween: <?php echo $columns > 2 ? '16' : '40';?>,
                        },
                    },
                };

                const navigationPrev = swiperOuter.find('.swiper-prev');
                const navigationNext = swiperOuter.find('.swiper-next');
                if (navigationPrev.length > 0 && navigationNext.length) {
                    options.navigation = {
                        prevEl: '.swiper-outer-<?php echo esc_attr($anchor);?> .swiper-prev',
                        nextEl: '.swiper-outer-<?php echo esc_attr($anchor);?> .swiper-next',
                    };
                }

                new Swiper('.swiper-<?php echo esc_attr($anchor);?>', options);
            };

            const isAdmin = window?.theme?.isAdmin,
                acf = window?.acf;

            // If is admin side
            if (isAdmin && acf) {
                acf.addAction('render_block_preview/type=cards-post', () =>
                    carouselCardsInit({ simulateTouch: false }),
                );
            } else {
                // If is frontend
                carouselCardsInit();
            }
        });
    </script>
<?php endif;?>
