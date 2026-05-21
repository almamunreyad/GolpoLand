<?php get_header();

$term        = get_queried_object();
$term_name   = $term->name;
$total_posts = $term->count;
?>

<!-- Author Banner -->
<section class="relative py-10 overflow-hidden bg-gradient-to-br from-brand-xlight via-emerald-50 to-yellow-50" aria-label="Author banner">
    <div aria-hidden="true" class="absolute -top-16 -right-12 w-64 h-64 rounded-full pointer-events-none bg-[radial-gradient(circle,rgba(134,239,172,.36),rgba(74,222,128,.1))] blur-[50px]"></div>
    <div aria-hidden="true" class="absolute -bottom-14 -left-8 w-52 h-52 rounded-full pointer-events-none bg-[radial-gradient(circle,rgba(253,230,138,.36),rgba(251,191,36,.1))] blur-[42px]"></div>

    <div class="holder relative z-10">
        <div class="flex items-center gap-3 flex-col text-center">
            <h1 class="font-display font-extrabold text-slate-900 text-[2rem] leading-[1.1] tracking-[-0.03em]">
                <?php echo esc_html($term_name); ?>
            </h1>

            <p class="text-sm text-slate-400 font-medium">
                <?php echo $total_posts; ?> books
            </p>
        </div>
    </div>
</section>