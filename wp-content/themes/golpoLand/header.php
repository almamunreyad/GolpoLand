<?php
// Is intro forced via URL?
$intro = isset($_GET['intro']) ? $_GET['intro'] : NULL;
// If intro isn't in URL, check cookie - if less than 1... intro = 1
if (!$intro) {
    if (isset($_COOKIE['devlogic_home_visited'])) {
        $intro = 0;
    } else {
        // First visit
        setcookie("devlogic_home_visited", 1, time() + (60 * 60 * 24 * 7), '/');
        $intro = 1;
    }
} ?>


<!doctype html>
<html class="loading" <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>



    <?php /* if ($intro == 1) :
        get_template_part('layout-modules/_preloader');
    endif; */ ?>

    <!-- ════════════ SITE HEADER ═══════════ -->
    <header class="site-header" role="banner">

        <!-- Top bar -->
        <div class="holder">
            <div class="header-top">

                <<?php echo is_front_page() ? 'h1' : 'h2'; ?> title="<?php bloginfo('name') ?>">
                    <a href="<?php echo home_url(); ?>" class="w-[120px] h-auto block">
                        <?php
                        $logo = get_field('site_logo', 'options');
                        if ($logo) : ?>
                            <img class="w-full h-full" src="<?php echo esc_url($logo['url']); ?>" alt="<?php bloginfo('name') ?>" />
                        <?php endif; ?>
                    </a>
                </<?php echo is_front_page() ? 'h1' : 'h2'; ?>>

                <?php /*
                <a href="/" class="shrink-0 flex items-center group" aria-label="Go to homepage">

                    <span class="font-display text-xl md:text-2xl font-bold tracking-tight relative">

                        <span class="relative z-10">
                            Golpo <span class="text-green-400">Land</span>
                        </span>

                        <!-- glow layer -->
                        <span class="absolute inset-0 blur-xl opacity-0 group-hover:opacity-70 transition duration-500">
                            Golpo <span class="text-green-400">Land</span>
                        </span>
                    </span>

                </a> */ ?>

                <!-- Right actions -->
                <div class="header-actions">

                    <!-- Search (desktop) -->
                    <form action="/search" method="get" role="search" aria-label="Site search" class="search-form">
                        <div style="position:relative; display:flex; align-items:center;">
                            <?php get_template_part('svgs/search-desktop'); ?>
                            <input type="search" name="q" placeholder="Search books…" aria-label="Search books" class="search-input" />
                        </div>
                    </form>

                    <?php
                    $cta_links = get_field('cta_links', 'option');
                    if ($cta_links) :
                        foreach ($cta_links as $i => $row) :
                            $cta = $row['link'];
                            if (!$cta) continue;
                            $btn_class = $i === 0 ? 'btn-ghost' : 'btn-primary'; ?>
                            <a href="<?= esc_url($cta['url']); ?>" target="<?= esc_attr($cta['target']); ?>" class="btn btn-sm btn-hidden-sm <?= $btn_class; ?>">
                                <?= esc_html($cta['title']); ?>
                            </a>
                    <?php endforeach;
                    endif; ?>

                    <!-- Search icon (mobile) -->
                    <button type="button" class="icon-btn btn-show-sm" aria-label="Search">
                        <?php get_template_part('svgs/search'); ?>
                    </button>

                    <!-- User icon (mobile) -->
                    <a href="/account" class="icon-btn btn-show-sm" aria-label="Your account">
                        <?php get_template_part('svgs/man'); ?>
                    </a>

                    <!-- Language dropdown -->
                    <div class="lang-wrap" role="navigation" aria-label="Language selection">
                        <button type="button" class="lang-btn" id="lang-btn" aria-haspopup="listbox" aria-expanded="false" aria-label="Change language, current: English">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                            </svg>
                            <span>EN</span>
                            <svg width="10" height="10" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <ul class="lang-menu" id="lang-menu" role="listbox" aria-label="Available languages">
                            <li role="option" aria-selected="false"><a href="?lang=ar" hreflang="ar"><span>العربية</span><span class="lang-count">240 books</span></a></li>
                            <li role="option" aria-selected="true"><a href="?lang=en" hreflang="en" class="active" aria-current="true"><span>English</span><span class="lang-count" style="color:var(--brand)">180 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=pt" hreflang="pt"><span>Português</span><span class="lang-count">96 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=es" hreflang="es"><span>Español</span><span class="lang-count">74 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=ja" hreflang="ja"><span>日本語</span><span class="lang-count">52 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=fr" hreflang="fr"><span>Français</span><span class="lang-count">48 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=hi" hreflang="hi"><span>हिन्दी</span><span class="lang-count">31 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=bn" hreflang="bn"><span>বাংলা</span><span class="lang-count">22 books</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=cy" hreflang="cy"><span>Cymraeg</span></a></li>
                            <li role="option" aria-selected="false"><a href="?lang=hy" hreflang="hy"><span>Հայերեն</span></a></li>
                        </ul>
                    </div>

                    <!-- Hamburger (mobile) -->
                    <button type="button" id="mobile-menu-btn" class="icon-btn btn-show-sm" aria-controls="mobile-drawer" aria-expanded="false" aria-label="Open navigation menu">
                        <?php get_template_part('svgs/burger-menu'); ?>
                    </button>

                </div>
            </div>
        </div>

        <!-- Desktop nav -->
        <nav class="site-nav border-t border-border hidden md:block" aria-label="Main navigation">
            <div class="holder">
                <div class="nav-inner py-2 flex items-center justify-between">
                    <!-- desktop menu -->
                    <?php
                    $menu_class = "nav-links flex items-center gap-5 list-none";
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'ul',
                        'menu_class' => $menu_class,
                        'menu_id' => 'primary-menu',
                    )); ?>

                    <?php $donate_link = get_field('donate_link', 'option'); ?>
                    <?php if ($donate_link) : ?>
                        <a href="<?= esc_url($donate_link['url']); ?>" target="<?= esc_attr($donate_link['target']); ?>" class="btn btn-accent btn-sm" aria-label="Donate to support Booktime">
                            <?= get_template_part('svgs/heart'); ?>
                            <?= esc_html($donate_link['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <!-- Mobile drawer -->
        <div id="mobile-drawer" class="mobile-drawer" aria-label="Mobile navigation">
            <?php if ($cta_links) : ?>
                <div class="drawer-auth">
                    <?php foreach ($cta_links as $i => $row) :
                        $cta = $row['link'];
                        if (!$cta) continue;
                        $btn_class = $i === 0 ? 'btn-ghost' : 'btn-primary'; ?>
                        <a href="<?= esc_url($cta['url']); ?>" target="<?= esc_attr($cta['target']); ?>" class="btn btn-sm <?= $btn_class; ?>">
                            <?= esc_html($cta['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- mobile menu -->
            <?php
            $menu_class = "drawer-links";
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'menu_class' => $menu_class,
                'menu_id' => 'primary-menu',
            )); ?>

            <?php if ($donate_link) : ?>
                <div class="drawer-donate">
                    <a href="<?= esc_url($donate_link['url']); ?>" target="<?= esc_attr($donate_link['target']); ?>" class="btn btn-accent btn-sm" style="width:100%; justify-content:center;">
                        <?= get_template_part('svgs/heart'); ?>
                        <?= esc_html($donate_link['title']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </header>
    <!-- ═══════════ END HEADER ═══════════ -->


    <!-- ══════════ HERO banner ══════════ -->
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



    <main class="flex-1">

        <!-- Start of banner block -->
        <?php //require(get_template_directory() . '/layout-modules/page-banner-partial.php');
        ?>