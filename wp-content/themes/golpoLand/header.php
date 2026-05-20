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

    <?php
    // $floating_header = get_field('floating_header');
    // $banner_type = get_field('banner_type');
    // $showBanner = get_field('show_banner');
    ?>

    <!-- ══════════════════════════════════════════
   SITE HEADER
══════════════════════════════════════════ -->
    <header class="site-header" role="banner">

        <!-- Top bar -->
        <div class="holder">
            <div class="header-top">

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

                </a>

                <!-- Right actions -->
                <div class="header-actions">

                    <!-- Search (desktop) -->
                    <form action="/search" method="get" role="search" aria-label="Site search" class="search-form">
                        <div style="position:relative; display:flex; align-items:center;">
                            <svg class="search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z" />
                            </svg>
                            <input type="search" name="q" placeholder="Search books…" aria-label="Search books" class="search-input" />
                        </div>
                    </form>

                    <!-- Sign Up (desktop) -->
                    <a href="/signup" class="btn btn-ghost btn-sm btn-hidden-sm">Sign Up</a>

                    <!-- Sign In (desktop) -->
                    <a href="/signin" class="btn btn-primary btn-sm btn-hidden-sm">Sign In</a>

                    <!-- Search icon (mobile) -->
                    <button type="button" class="icon-btn btn-show-sm" aria-label="Search">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z" />
                        </svg>
                    </button>

                    <!-- User icon (mobile) -->
                    <a href="/account" class="icon-btn btn-show-sm" aria-label="Your account">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
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
                    <button
                        type="button"
                        id="mobile-menu-btn"
                        class="icon-btn btn-show-sm"
                        aria-controls="mobile-drawer"
                        aria-expanded="false"
                        aria-label="Open navigation menu">
                        <svg id="icon-ham" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg id="icon-close" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true" style="display:none">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <!-- Desktop nav -->
        <nav class="site-nav border-t border-border hidden md:block" aria-label="Main navigation">
            <div class="holder">
                <div class="nav-inner py-2 flex items-center justify-between">
                    <ul class="nav-links flex items-center gap-5 list-none" role="list">
                        <li><a href="/" class=" active" aria-current="page">Home</a></li>
                        <li><a href="/books">Books</a></li>
                        <li><a href="/series">Series</a></li>
                        <li><a href="/contributors">Contributors</a></li>
                        <li><a href="/about">About Us</a></li>
                    </ul>
                    <a href="/donate" class="btn btn-accent btn-sm" aria-label="Donate to support Booktime">
                        <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        Donate
                    </a>
                </div>
            </div>
        </nav>

        <!-- Mobile drawer -->
        <div id="mobile-drawer" class="mobile-drawer" aria-label="Mobile navigation">
            <div class="drawer-auth">
                <a href="/signup" class="btn btn-ghost btn-sm">Sign Up</a>
                <a href="/signin" class="btn btn-primary btn-sm">Sign In</a>
            </div>
            <ul class="drawer-links" role="list">
                <li><a href="/" class="active" aria-current="page">Home</a></li>
                <li><a href="/books">Books</a></li>
                <li><a href="/series">Series</a></li>
                <li><a href="/contributors">Contributors</a></li>
                <li><a href="/about">About Us</a></li>
            </ul>
            <div class="drawer-donate">
                <a href="/donate" class="btn btn-accent btn-sm" style="width:100%; justify-content:center;">
                    <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                    Donate
                </a>
            </div>
        </div>

    </header>
    <!-- ══════════════════════════════════════════
   END HEADER
══════════════════════════════════════════ -->


    <!-- ═══════════════════════════════════
     HERO
═══════════════════════════════════ -->
    <section
        class="relative py-10 flex overflow-hidden items-center
         bg-gradient-to-br from-brand-xlight via-emerald-50 to-yellow-50
         max-sm:h-auto max-sm:py-9 max-sm:px-5"
        aria-labelledby="hero-heading">

        <!-- Blobs -->
        <div aria-hidden="true"
            class="absolute -top-16 -right-12 w-64 h-64 rounded-full pointer-events-none
           bg-[radial-gradient(circle,rgba(134,239,172,.36),rgba(74,222,128,.1))]
           blur-[50px]">
        </div>
        <div aria-hidden="true"
            class="absolute -bottom-14 -left-8 w-52 h-52 rounded-full pointer-events-none
           bg-[radial-gradient(circle,rgba(253,230,138,.36),rgba(251,191,36,.1))]
           blur-[42px]">
        </div>

        <!-- Inner grid -->
        <div class="holder relative z-10 grid grid-cols-2 gap-8 items-center w-full
              max-sm:grid-cols-1 max-sm:gap-7">

            <!-- ── Left: Copy ── -->
            <div class="flex flex-col gap-4 max-sm:items-center max-sm:text-center">

                <!-- Eyebrow pill -->
                <div
                    class="inline-flex items-center gap-1.5 w-fit px-2.5 py-[3px] rounded-full
               bg-brand-light border border-brand/20
               text-brand-dark text-[10.5px] font-bold tracking-[.07em] uppercase"
                    aria-label="For young readers">
                    <span
                        aria-hidden="true"
                        class="w-[5px] h-[5px] rounded-full bg-brand shrink-0
                 shadow-[0_0_0_2px_rgba(22,163,74,.22)]">
                    </span>
                    For Young Readers
                </div>

                <!-- Title -->
                <h1
                    id="hero-heading"
                    class="font-display font-extrabold leading-[1.06] tracking-[-0.035em] text-slate-900
               text-[2.3rem]">
                    Golpo<span class="text-gradient">Land</span>
                </h1>

                <!-- Description -->
                <p class="text-base leading-[1.65] text-slate-500 max-w-[340px] max-sm:mx-auto">
                    Your child's gateway to knowledge and imagination. Explore hundreds of stories
                    in 10 languages — free, forever.
                </p>

                <!-- CTAs -->
                <div class="flex items-center gap-2 flex-wrap max-sm:justify-center">

                    <a
                        href="/signup"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-[10px]
                 bg-gradient-to-br from-brand to-brand-mid text-white
                 text-[.8rem] font-bold
                 shadow-[0_3px_14px_rgba(22,163,74,.3)]
                 hover:shadow-[0_5px_20px_rgba(22,163,74,.38)]
                 hover:-translate-y-px transition-all duration-150
                 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2
                 active:scale-[.97]"
                        aria-label="Sign up for free">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Sign Up Free
                    </a>

                    <a
                        href="/books"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-[10px]
                 bg-white/70 backdrop-blur-[8px] text-slate-900
                 text-[.8rem] font-bold
                 border border-black/10 shadow-[0_2px_6px_rgba(15,23,42,.05)]
                 hover:border-brand/30 hover:-translate-y-px transition-all duration-150
                 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2
                 active:scale-[.97]"
                        aria-label="Browse all books">
                        Browse Books
                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>

                </div>

                <!-- Trust bar -->
                <div class="flex items-center flex-wrap max-sm:justify-center" role="list" aria-label="Key features">
                    <div class="flex items-center gap-1 text-xs text-slate-400 font-medium px-2 first:pl-0
                    [&:not(:first-child)]:border-l [&:not(:first-child)]:border-slate-200/60"
                        role="listitem">
                        <span class="w-1 h-1 rounded-full bg-green-400 shrink-0" aria-hidden="true"></span>
                        Free forever
                    </div>
                    <div class="flex items-center gap-1 text-xs text-slate-400 font-medium px-2
                    border-l border-slate-200/60"
                        role="listitem">
                        <span class="w-1 h-1 rounded-full bg-green-400 shrink-0" aria-hidden="true"></span>
                        No credit card
                    </div>
                    <div class="flex items-center gap-1 text-xs text-slate-400 font-medium px-2
                    border-l border-slate-200/60"
                        role="listitem">
                        <span class="w-1 h-1 rounded-full bg-green-400 shrink-0" aria-hidden="true"></span>
                        10 languages
                    </div>
                </div>

            </div>

            <!-- ── Right: Visual ── -->
            <div class="flex items-center justify-center relative h-[250px]" aria-hidden="true">

                <!-- Glow orb -->
                <div class="absolute  rounded-full
                  bg-[radial-gradient(circle,rgba(134,239,172,.45),transparent_68%)]
                  blur-[22px]">
                </div>

                <!-- Book + floating chips -->
                <div class="relative w-full h-full z-10 animate-float">

                    <!-- Book box -->
                    <div
                        class="book-gradient w-full h-full rounded-[18px]
                 flex items-center justify-center text-[120px]
                 border border-white/50
                 shadow-[0_16px_40px_rgba(22,163,74,.2),0_4px_10px_rgba(22,163,74,.12),inset_0_1px_0_rgba(255,255,255,.4)]"
                        role="img"
                        aria-label="Stack of colourful books">
                        📚
                    </div>

                    <!-- Chip: top-right -->
                    <div
                        class="animate-float-delay1
                 absolute -top-3 -right-4
                 flex items-center gap-1.5 px-2.5 py-1.5 rounded-[10px]
                 bg-white/90 backdrop-blur-[10px]
                 border border-white/80
                 shadow-[0_4px_16px_rgba(15,23,42,.08)]">
                        <span class="text-sm">🏅</span>
                        <div>
                            <div class="text-[11px] font-bold text-slate-900 leading-tight">500+ Books</div>
                            <div class="text-[9.5px] text-slate-400 font-medium">Free forever</div>
                        </div>
                    </div>

                    <!-- Chip: bottom-left -->
                    <div
                        class="animate-float-delay2
                 absolute -bottom-2 -left-5
                 flex items-center gap-1.5 px-2.5 py-1.5 rounded-[10px]
                 bg-white/90 backdrop-blur-[10px]
                 border border-white/80
                 shadow-[0_4px_16px_rgba(15,23,42,.08)]">
                        <span class="text-sm">🌐</span>
                        <div>
                            <div class="text-[11px] font-bold text-slate-900 leading-tight">10 Languages</div>
                            <div class="text-[9.5px] text-slate-400 font-medium">50K+ readers</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



    <main class="flex-1">

        <!-- Start of banner block -->
        <?php //require(get_template_directory() . '/layout-modules/page-banner-partial.php');
        ?>
