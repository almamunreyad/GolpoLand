<?php get_header(); ?>

<?php
$category    = get_queried_object();
$cat_name    = $category->name;
$cat_desc    = $category->description;
$total_posts = $category->count;
?>



<!-- Posts Grid -->
<section class="books-section py-10" aria-label="<?php echo esc_attr($cat_name); ?> books">
    <div class="holder">

        <?php if (have_posts()) : ?>

            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 gap-4 gap-y-6">
                <?php while (have_posts()) : the_post();
                    $featured_img = has_post_thumbnail()
                        ? get_the_post_thumbnail_url(get_the_ID(), 'full')
                        : get_template_directory_uri() . '/_/images/placeholder.png'; ?>
                    <div>
                        <a href="<?php the_permalink(); ?>" class="book-card" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                            <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php else : ?>

            <div class="text-center py-20 text-slate-400">
                <p class="text-lg"><?php esc_html_e('এই ক্যাটাগরিতে এখনো কোনো বই নেই।', 'golpoLand'); ?></p>
            </div>

        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>