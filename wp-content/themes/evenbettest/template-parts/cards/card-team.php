<div class="flex flex-col gap-y-3 items-center relative">
    <?php if (!empty($card['image'])):?>
        <div class="w-[208px] h-[208px] bg-evenbettest-pink-light overflow-hidden rounded-[20px]">
            <?php echo wp_get_attachment_image($card['image'], 'medium', false, ['class' => 'w-full h-full object-cover']);?>
        </div>
    <?php endif;?>
    <?php if (!empty($card['title'])):?>
        <div class="text-xl text-center leading-[1.1] max-w-[119px]">
            <?php echo esc_attr($card['title']);?>
        </div>
    <?php endif;?>
    <?php if (!empty($card['position'])):?>
        <div class="text-sm text-evenbettest-pink text-center leading-[1.3] max-w-[144px]">
            <?php echo esc_attr($card['position']);?>
        </div>
    <?php endif;?>
</div>
