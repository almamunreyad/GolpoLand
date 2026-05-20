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

                <!-- Logo -->
                <a href="/" class="shrink-0 flex items-center" aria-label="Go to homepage">
                    <!-- Desktop logo -->
                    <img
                        src="/wp-content/themes/golpoLand/_/images/Logo_en.svg"
                        alt="Site Logo"
                        class="hidden md:block h-11.5 w-auto" />
                    <!-- Mobile logo -->

                    <img
                        src="/wp-content/themes/golpoLand/_/images/Logo-icon.png"
                        alt="Site Logo"
                        class="block md:hidden h-9 w-auto" />

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
        <nav class="site-nav" aria-label="Main navigation">
            <div class="holder">
                <div class="nav-inner">
                    <ul class="nav-links" role="list">
                        <li><a href="/" class="nav-link active" aria-current="page">Home</a></li>
                        <li><a href="/books" class="nav-link">Books</a></li>
                        <li><a href="/series" class="nav-link">Series</a></li>
                        <li><a href="/contributors" class="nav-link">Contributors</a></li>
                        <li><a href="/about" class="nav-link">About Us</a></li>
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


    <main>

        <!-- Start of banner block -->
        <?php //require(get_template_directory() . '/layout-modules/page-banner-partial.php');
        ?>
