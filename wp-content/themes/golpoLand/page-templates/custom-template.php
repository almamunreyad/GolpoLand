<?php
/* Template Name: Custom Page template */
?>

<?php get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="[&_hr]:!border-silver [&_hr]:!my-9 [&_img+p]:mt-9 [&_p+ul]:mt-9 [&_ul]:pl-6 [&_ul]:list-disc [&_p+ol]:mt-9 [&_ol]:pl-6 [&_ol]:list-decimal [&_li]:leading-[1.8] [&_blockquote]:font-lateSerif [&_blockquote]:text-32 [&_blockquote]:leading-[1.3] [&_blockquote]:-tracking-03 [&_blockquote]:mt-9 [&_ul+p]:mt-9 [&_ol+p]:mt-9 [&_h3]:text-2xl [&_h3]:font-medium [&_a]:underline [&_.wp-block-heading]:mt-8 [&_.wp-block-heading]:mb-4 [&_h2]:text-32 [&_h3]:text-32 [&_h4]:text-28 [&_h5]:text-28 [&_h5]:font-lateSerif textContent">
      <div class="w-full px-4 md:px-18 lg:px-42 max-w-[1512px] mx-auto">
        <?php the_content(); ?>
      </div>
    </article>
<?php endwhile;
endif;
get_footer(); ?>