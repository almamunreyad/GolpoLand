<?php get_header(); ?>

<section class="py-8 md:py-40">
    <div class="holder space-y-8">
        <h1 class="text-5xl font-bold text-center"><?php the_field('404__title', 'option'); ?></h1>

        <?php if (get_field('404__text', 'option')) : ?>
            <div class="text-center space-y-4 [&>*]:text-3xl [&>*]:text-black">
                <?php the_field('404__text', 'option'); ?>
            </div>
        <?php endif; ?>

        <div class="text-center">
            <a class="btn border border-black hover:bg-black hover:text-white" href="/">
                <span>
                    <?php _e('Go to Homepage', 'websureFertility'); ?>
                </span>
            </a>
        </div>

    </div>
</section>

<?php get_footer();
