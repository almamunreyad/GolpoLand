<section class="relative py-10 flex overflow-hidden items-center bg-gradient-to-br from-brand-xlight via-emerald-50 to-yellow-50 max-sm:h-auto max-sm:py-9 max-sm:px-5" aria-labelledby="hero-heading">

    <!-- Blobs -->
    <div aria-hidden="true" class="absolute -top-16 -right-12 w-64 h-64 rounded-full pointer-events-none bg-[radial-gradient(circle,rgba(134,239,172,.36),rgba(74,222,128,.1))] blur-[50px]"></div>
    <div aria-hidden="true" class="absolute -bottom-14 -left-8 w-52 h-52 rounded-full pointer-events-none bg-[radial-gradient(circle,rgba(253,230,138,.36),rgba(251,191,36,.1))] blur-[42px]"></div>

    <!-- Inner grid -->
    <div class="holder relative z-10 grid grid-cols-2 gap-8 items-center w-full max-sm:grid-cols-1 max-sm:gap-7">

        <!-- ── Left: Copy ── -->
        <div class="flex flex-col gap-4 max-sm:items-center max-sm:text-center">

            <?php
            $banner_sub_title = get_field('banner_sub_title');
            if ($banner_sub_title) : ?>
                <div class="inline-flex items-center gap-1.5 w-fit px-2.5 py-[3px] rounded-full bg-brand-light border border-brand/20 text-brand-dark text-[10.5px] font-bold tracking-[.07em] uppercase">
                    <span aria-hidden="true" class="w-[5px] h-[5px] rounded-full bg-brand shrink-0 shadow-[0_0_0_2px_rgba(22,163,74,.22)]"></span>
                    <?= esc_html($banner_sub_title); ?>
                </div>
            <?php endif; ?>

            <?php
            $banner_title = get_field('banner_title');
            if ($banner_title) : ?>
                <h1 id="hero-heading" class="font-display font-extrabold leading-[1.06] tracking-[-0.035em] text-slate-900 text-[2.3rem]">
                    <?= esc_html($banner_title); ?>
                </h1>
            <?php endif; ?>

            <?php
            $description = get_field('description');
            if ($description) : ?>
                <div class="text-base leading-[1.65] text-slate-500 max-w-[340px] max-sm:mx-auto space-y-4">
                    <?= $description; ?>
                </div>
            <?php endif; ?>

            <?php
            $banner_cta = get_field('banner_cta');
            if ($banner_cta) : ?>
                <div class="hero-ctas fade-up fade-up-4">
                    <?php foreach ($banner_cta as $i => $row) :
                        $cta = $row['link'];
                        if (!$cta) continue;
                        $btn_class = $i === 0 ? 'btn-primary' : 'btn-outline'; ?>
                        <a href="<?= esc_url($cta['url']); ?>" target="<?= esc_attr($cta['target']); ?>" class="btn btn-lg <?= $btn_class; ?>">
                            <?php if ($i === 0): ?>
                                <?php get_template_part('svgs/man'); ?>
                            <?php endif; ?>

                            <?= esc_html($cta['title']); ?>

                            <?php if ($i != 0): ?>
                                <?php get_template_part('svgs/green-arrow'); ?>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- ── Right: Image ── -->
        <div class="flex items-center justify-center relative h-[250px]" aria-hidden="true">
            <!-- Glow orb -->
            <div class="absolute rounded-full bg-[radial-gradient(circle,rgba(134,239,172,.45),transparent_68%)] blur-[22px]"></div>
            <!-- Book + floating chips -->
            <div class="relative w-full h-full z-10 animate-float">
                <!-- Book box -->
                <?php
                $banner_image = get_field('image');
                if ($banner_image) : ?>
                    <div class="book-gradient w-full h-full rounded-[18px] flex items-center justify-center text-[120px] border border-white/50 shadow-[0_16px_40px_rgba(22,163,74,.2),0_4px_10px_rgba(22,163,74,.12),inset_0_1px_0_rgba(255,255,255,.4)]" role="img" aria-label="Stack of colourful books">
                        <div class="w-full max-w-[150px] h-[150px]">
                            <img src="<?= esc_url($banner_image['url']); ?>" alt="<?= esc_attr($banner_image['alt']); ?>" class="w-full h-full object-cover" />
                        </div>
                    </div>
                <?php endif; ?>

                <?php /*
                    <!-- Chip: top-right -->
                    <div class="animate-float-delay1 absolute -top-3 -right-4 flex items-center gap-1.5 px-2.5 py-1.5 rounded-[10px] bg-white/90 backdrop-blur-[10px] border border-white/80 shadow-[0_4px_16px_rgba(15,23,42,.08)]">
                        <span class="text-sm">🏅</span>

                        <div>
                            <div class="text-[11px] font-bold text-slate-900 leading-tight">
                                500+ Books
                            </div>

                            <div class="text-[9.5px] text-slate-400 font-medium">
                                Free forever
                            </div>
                        </div>
                    </div>

                    <!-- Chip: bottom-left -->
                    <div class="animate-float-delay2 absolute -bottom-2 -left-5 flex items-center gap-1.5 px-2.5 py-1.5 rounded-[10px] bg-white/90 backdrop-blur-[10px] border border-white/80 shadow-[0_4px_16px_rgba(15,23,42,.08)]">
                        <span class="text-sm">🌐</span>

                        <div>
                            <div class="text-[11px] font-bold text-slate-900 leading-tight">
                                10 Languages
                            </div>

                            <div class="text-[9.5px] text-slate-400 font-medium">
                                50K+ readers
                            </div>
                        </div>
                    </div> */ ?>

            </div>
        </div>

    </div>
</section>