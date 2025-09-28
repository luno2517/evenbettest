<?php get_header();?>

<main>
    <div class="container py-25">
        <div class="flex flex-col gap-y-5 items-center justify-center text-center">
            <h1 class="mb-0">404</h1>
            <div><?php echo __('Page is not found', 'evenbettest');?></div>
            <a class="btn-primary" href="/"><?php echo __('Home', 'evenbettest');?></a>
        </div>
    </div>
</main>

<?php get_footer();?>
