<a href="<?php echo esc_url($card['link']['url']);?>" target="<?php echo esc_attr($card['link']['target']);?>" class="flex flex-col gap-y-4 items-center overflow-hidden relative bg-evenbettest-purple p-6 pb-12 rounded-[20px] lg:min-h-[350px]">
    <?php if (!empty($card['icon'])):?>
        <div class="w-20 h-20">
            <?php echo wp_get_attachment_image($card['icon'], 'thumbnail', false, ['class' => 'w-full h-full object-contain']);?>
        </div>
    <?php endif;?>
    <?php if (!empty($card['title'])):?>
        <div class="text-xl text-center leading-[1.1]">
            <?php echo esc_attr($card['title']);?>
        </div>
    <?php endif;?>
    <?php if (!empty($card['content'])):?>
        <div class="entry-content text-center">
            <?php echo wpautop($card['content']);?>
        </div>
    <?php endif;?>
</a>
