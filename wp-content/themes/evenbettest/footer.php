<?php wp_footer();?>
<?php
$logo = get_field('logo', 'option');
$copyright = get_field('copyright', 'option');
$socials = get_field('socials', 'option');
$bottom_nav_col_1 = get_field('bottom_nav_col_1', 'option');
$bottom_nav_col_2 = get_field('bottom_nav_col_2', 'option');
$bottom_nav_col_3 = get_field('bottom_nav_col_3', 'option');
$bottom_nav_col_4 = get_field('bottom_nav_col_4', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$skype = get_field('skype', 'option');
$email = get_field('email', 'option');
$footer_nav = get_field('footer_nav', 'option');
$footer_text = get_field('footer_text', 'option');
$labels = get_field('labels', 'option');
?>
<footer class="flex flex-col">
    <div class="bg-evenbettest-purple-dark py-10">
        <div class="container flex flex-col lg:flex-row lg:justify-between lg:gap-x-[58px] gap-y-6 lg:gap-y-0">
            <?php if (!empty($logo) || !empty($copyright) || !empty($socials)):?>
                <div class="flex flex-col gap-y-6 lg:max-w-[248px]">
                    <?php if (!empty($logo)):?>
                        <a id="logo" class="w-[178px] h-[43px]" href="<?php echo site_url();?>">
                            <?php echo wp_get_attachment_image($logo, 'medium', false, ['class' => 'h-full w-full object-contain']);?>
                        </a>
                    <?php endif;?>
                    <?php if (!empty($copyright)):?>
                        <div class="text-sm leading-[1.4]">
                            <?php echo esc_attr($copyright);?>
                        </div>
                    <?php endif;?>
                    <?php if (!empty($socials)):?>
                        <div class="flex flex-wrap gap-4 items-center">
                            <?php foreach ($socials as $item):?>
                                <?php if (empty($item['link'])):?>
                                    <div class="shrink-0 w-6 h-6">
                                        <?php echo wp_get_attachment_image($item['image'], 'thumbnail', false, ['class' => 'evenbettest-icon object-contain h-full w-full']);?>
                                    </div>
                                <?php else:?>
                                    <a href="<?php echo esc_url($item['link']);?>" target="_blank" rel="nofollow" class="shrink-0 w-6 h-6">
                                        <?php echo wp_get_attachment_image($item['image'], 'thumbnail', false, ['class' => 'evenbettest-icon object-contain h-full w-full']);?>
                                    </a>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if (!empty($bottom_nav_col_1) || !empty($bottom_nav_col_2) || !empty($bottom_nav_col_3) || !empty($bottom_nav_col_4)):?>
                <div class="flex flex-col lg:flex-row lg:gap-x-[58px] gap-y-[14px] lg:gap-y-0">
                    <?php if (!empty($bottom_nav_col_1)):?>
                        <nav class="flex flex-col gap-y-[14px]">
                            <?php foreach ($bottom_nav_col_1 as $item):?>
                                <?php if (empty($item['point']['title'])) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="text-[22px] hover:text-evenbettest-emerald">
                                    <?php echo esc_attr($item['point']['title']);?>
                                </a>
                                <?php if (!empty($item['children'])):?>
                                    <div class="flex flex-col gap-y-1.5">
                                        <?php foreach ($item['children'] as $item2):?>
                                            <a href="<?php echo esc_url($item2['point']['url']);?>" target="<?php echo esc_attr($item2['point']['target']);?>" class="text-sm leading-[1.4] hover:text-evenbettest-emerald">
                                                <?php echo esc_attr($item2['point']['title']);?>
                                            </a>
                                        <?php endforeach;?>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </nav>
                    <?php endif;?>
                    <?php if (!empty($bottom_nav_col_2)):?>
                        <nav class="flex flex-col gap-y-[14px]">
                            <?php foreach ($bottom_nav_col_2 as $item):?>
                                <?php if (empty($item['point']['title'])) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="text-[22px] hover:text-evenbettest-emerald">
                                    <?php echo esc_attr($item['point']['title']);?>
                                </a>
                                <?php if (!empty($item['children'])):?>
                                    <div class="flex flex-col gap-y-1.5">
                                        <?php foreach ($item['children'] as $item2):?>
                                            <a href="<?php echo esc_url($item2['point']['url']);?>" target="<?php echo esc_attr($item2['point']['target']);?>" class="text-sm leading-[1.4] hover:text-evenbettest-emerald">
                                                <?php echo esc_attr($item2['point']['title']);?>
                                            </a>
                                        <?php endforeach;?>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </nav>
                    <?php endif;?>
                    <?php if (!empty($bottom_nav_col_3)):?>
                        <nav class="flex flex-col gap-y-[14px]">
                            <?php foreach ($bottom_nav_col_3 as $item):?>
                                <?php if (empty($item['point']['title'])) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="text-[22px] hover:text-evenbettest-emerald">
                                    <?php echo esc_attr($item['point']['title']);?>
                                </a>
                                <?php if (!empty($item['children'])):?>
                                    <div class="flex flex-col gap-y-1.5">
                                        <?php foreach ($item['children'] as $item2):?>
                                            <a href="<?php echo esc_url($item2['point']['url']);?>" target="<?php echo esc_attr($item2['point']['target']);?>" class="text-sm leading-[1.4] hover:text-evenbettest-emerald">
                                                <?php echo esc_attr($item2['point']['title']);?>
                                            </a>
                                        <?php endforeach;?>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </nav>
                    <?php endif;?>
                    <?php if (!empty($bottom_nav_col_4)):?>
                        <nav class="flex flex-col gap-y-[14px]">
                            <?php foreach ($bottom_nav_col_4 as $item):?>
                                <?php if (empty($item['point']['title'])) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="text-[22px] hover:text-evenbettest-emerald">
                                    <?php echo esc_attr($item['point']['title']);?>
                                </a>
                                <?php if (!empty($item['children'])):?>
                                    <div class="flex flex-col gap-y-1.5">
                                        <?php foreach ($item['children'] as $item2):?>
                                            <a href="<?php echo esc_url($item2['point']['url']);?>" target="<?php echo esc_attr($item2['point']['target']);?>" class="text-sm leading-[1.4] hover:text-evenbettest-emerald">
                                                <?php echo esc_attr($item2['point']['title']);?>
                                            </a>
                                        <?php endforeach;?>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </nav>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if (!empty($address) || !empty($phone) || !empty($skype) || !empty($email)):?>
                <div class="flex flex-col gap-y-[14px] lg:items-end lg:text-right lg:max-w-[183px]">
                    <div class="text-[22px]">
                        <?php echo __('Contacts', 'evenbettest');?>
                    </div>
                    <?php if (!empty($address)):?>
                        <div class="text-sm leading-[1.4]">
                            <?php echo $address;?>
                        </div>
                    <?php endif;?>
                    <?php if (!empty($phone) || !empty($skype) || !empty($email)):?>
                        <div class="flex flex-col lg:items-end lg:text-right text-sm leading-[1.4] text-evenbettest-pink">
                            <?php if (!empty($phone) || !empty($skype)):?>
                                <div class="flex gap-x-2">
                                    <?php if (!empty($phone)):?>
                                        <a href="tel:<?php echo esc_attr($phone);?>" class="hover:underline">
                                            <?php echo esc_attr($phone);?>
                                        </a>
                                    <?php endif;?>
                                    <?php if (!empty($phone) && !empty($skype)):?>
                                        |
                                    <?php endif;?>
                                    <?php if (!empty($skype)):?>
                                        <a href="<?php echo esc_attr($skype['url']);?>" class="hover:underline">
                                            <?php echo esc_attr($skype['title']);?>
                                        </a>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                            <?php if (!empty($email)):?>
                                <a href="mailto:<?php echo esc_attr($email);?>" class="hover:underline">
                                    <?php echo esc_attr($email);?>
                                </a>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="bg-evenbettest-purple-alt-2 py-10">
        <div class="container flex flex-col lg:flex-row lg:justify-between lg:gap-x-[58px] gap-y-4 lg:gap-y-0">
            <?php if (!empty($footer_nav)):
                $footer_nav_length = count($footer_nav);
                ?>
                <nav class="flex gap-1 text-[10px] lg:min-w-[252px]">
                    <?php foreach ($footer_nav as $key => $item):?>
                        <?php if (empty($item['point']['title'])) {
                            continue;
                        }
                        ?>
                        <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="hover:text-evenbettest-emerald">
                            <?php echo esc_attr($item['point']['title']);?>
                        </a>
                        <?php if ($key+1 !== $footer_nav_length):?>
                            |
                        <?php endif;?>
                    <?php endforeach;?>
                </nav>
            <?php endif;?>
            <?php if (!empty($footer_text)):?>
                <div class="text-[10px] leading-[1.5] lg:max-w-[385px]">
                    <?php echo wpautop($footer_text);?>
                </div>
            <?php endif;?>
            <?php if (!empty($labels)):?>
                <div>
                    <div class="flex flex-wrap gap-y-4 gap-x-2 items-center">
                        <?php foreach ($labels as $item):?>
                            <?php if (empty($item['link'])):?>
                                <div class="shrink-0<?php echo $item['type'] === 'rectangle' ? ' w-[102px] h-[21px]' : ' w-[42px] h-[42px]';?>">
                                    <?php echo wp_get_attachment_image($item['image'], 'medium', false, ['class' => 'object-contain h-full w-full']);?>
                                </div>
                            <?php else:?>
                                <a href="<?php echo esc_url($item['link']);?>" target="_blank" rel="nofollow" class="shrink-0<?php echo $item['type'] === 'rectangle' ? ' w-[102px] h-[21px]' : ' w-[42px] h-[42px]';?> hover:opacity-80">
                                    <?php echo wp_get_attachment_image($item['image'], 'medium', false, ['class' => 'object-contain h-full w-full']);?>
                                </a>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</footer>
<?php
$header_button = get_field('header_button', 'option');
$mobile_nav = get_field('mobile_nav', 'option');
?>
<?php if (!empty($mobile_nav)):?>
    <nav id="mm" class="h-full w-full absolute inset-0 hidden">
        <div class="h-full w-full relative bg-evenbettest-purple z-50">
            <div class="container sticky top-0 flex flex-col gap-y-4 pt-6 z-60">
                <div class="flex justify-between">
                    <div class="flex flex-col gap-y-2 text-lg">
                        <?php foreach ($mobile_nav as $item):
                            if (empty($item['point']['url']) || empty($item['point']['title'])) {
                                continue;
                            }
                            ?>
                            <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="nav-item hover:text-evenbettest-emerald">
                                <?php echo esc_attr($item['point']['title']);?>
                            </a>
                        <?php endforeach;?>
                    </div>
                    <img id="mm-close" src="<?php echo ASSETS_DIR;?>/icons/xmark.svg" class="shrink-0 w-5 !h-5 cursor-pointer hover:opacity-80">
                </div>
                <?php if (!empty($header_button)):?>
                    <a href="<?php echo esc_url($header_button['url']);?>" target="<?php echo esc_attr($header_button['target']);?>" class="btn-primary">
                        <?php echo esc_attr($header_button['title']);?>
                    </a>
                <?php endif;?>
                <?php echo __('ENG', 'evenbettest');?>
            </div>
        </div>
    </nav>
    <script>
        jQuery(document).ready(function($) {
            $("#mm-open").click(function() {
                $("#mm").show();
            });

            $("#mm-close").click(function() {
                $("#mm").hide();
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('.container').length && !$(e.target).is('#mm-open')) {
                    $("#mm").hide();
                }
            });
        });
    </script>
<?php endif;?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formDataCache = {};

        jQuery('#wpforms-submit-208').on('click', function() {
            const $form = jQuery(this).closest('form');
            formDataCache = {
                name: $form.find('input[name="wpforms[fields][1]"]').val() || '',
                email: $form.find('input[name="wpforms[fields][2]"]').val() || '',
                messenger: $form.find('input[name="wpforms[fields][3]"]').val() || '',
                manager: $form.find('input[name="wpforms[fields][4]"]').val() || '',
                text: $form.find('textarea[name="wpforms[fields][5]"]').val() || '',
                checkbox: $form.find('input[name="wpforms[fields][6][]"]').is(':checked') ? 'yes' : 'no'
            };
        });

        jQuery(document).on('wpformsAjaxSubmitSuccess', function() {
            const utms = getUTMParams();
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'formSubmitted',
                formId: 208,
                ...formDataCache,
                ...utms
            });
            console.log('formSubmitted pushed to dataLayer', {...formDataCache, ...utms});
        });
    });
</script>
</body>
</html>
