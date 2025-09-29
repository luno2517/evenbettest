<!DOCTYPE html>
<html <?php language_attributes();?> class="front">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=ASSETS_DIR?>/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?=ASSETS_DIR?>/icons/favicon.ico">
    <?php wp_head();?>
    <?php require_once( PARTS_DIR . '/fonts.php' ); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P32BBLP8');</script>
    <!-- End Google Tag Manager -->
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LNCSWECF7H"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-LNCSWECF7H');
</script>
<body <?php body_class(LOCALE ?? '');?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P32BBLP8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
$logo = get_field('logo', 'option');
$header_nav_left = get_field('header_nav_left', 'option');
$header_nav_left = array_filter($header_nav_left, fn(array $item): bool=>!empty($item['point']['url']));
$header_nav_right = get_field('header_nav_right', 'option');
$header_nav_right = array_filter($header_nav_right, fn(array $item): bool=>!empty($item['point']['url']));
$header_button = get_field('header_button', 'option');
?>
<header class="relative md:sticky md:top-0 z-30 bg-evenbettest-purple py-7.5">
    <div class="container relative flex items-center justify-between gap-y-6 gap-x-4">
        <?php if (!empty($logo)):?>
            <a id="logo" class="w-[130px] h-7.5 lg:w-[260px] lg:h-[63px]" href="<?php echo site_url();?>">
                <?php echo wp_get_attachment_image($logo, 'medium', false, ['class' => 'h-full w-full object-contain']);?>
            </a>
        <?php endif;?>
        <?php if (!empty($header_nav_left)):?>
            <nav class="hidden md:flex lg:items-center md:gap-x-2 lg:gap-x-8">
                <?php foreach ($header_nav_left as $item):
                    if (empty($item['point']['url']) || empty($item['point']['title'])) {
                        continue;
                    }
                    ?>
                    <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="nav-item hover:text-evenbettest-emerald">
                        <?php echo esc_attr($item['point']['title']);?>
                    </a>
                <?php endforeach;?>
            </nav>
        <?php endif;?>
        <?php if (!empty($header_nav_right) || !empty($header_button)):?>
            <div class="hidden lg:flex lg:items-center lg:gap-x-4">
                <?php if (!empty($header_nav_right)):?>
                    <nav class="flex lg:items-center lg:gap-x-8">
                        <?php foreach ($header_nav_right as $item):
                            if (empty($item['point']['url']) || empty($item['point']['title'])) {
                                continue;
                            }
                            ?>
                            <a href="<?php echo esc_url($item['point']['url']);?>" target="<?php echo esc_attr($item['point']['target']);?>" class="nav-item hover:text-evenbettest-emerald">
                                <?php echo esc_attr($item['point']['title']);?>
                            </a>
                        <?php endforeach;?>
                    </nav>
                <?php endif;?>
                <?php if (!empty($header_button)):?>
                    <a href="<?php echo esc_url($header_button['url']);?>" target="<?php echo esc_attr($header_button['target']);?>" class="btn-primary">
                        <?php echo esc_attr($header_button['title']);?>
                    </a>
                <?php endif;?>
                <?php echo __('ENG', 'evenbettest');?>
            </div>
        <?php endif;?>
        <div class="shrink-0 flex lg:hidden items-center gap-5">
            <img id="mm-open" src="<?php echo ASSETS_DIR;?>/icons/bars.svg" class="shrink-0 w-5 !h-5 cursor-pointer hover:opacity-80">
        </div>
    </div>
</header>
