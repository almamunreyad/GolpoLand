<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Golpo Land</title>
  <link rel="stylesheet" href="/wp-content/themes/golpoLand/_/css/swiper-bundle.min.css">
  <link href="/wp-content/themes/golpoLand/_/css/websure.min.css?var=<?php echo uniqid(); ?>" rel="stylesheet">
</head>

<body>

  <!-- ═══════════════════════════════════════════════
     SITE HEADER
════════════════════════════════════════════════ -->
  <header class="w-full bg-white shadow-sm sticky top-0 z-50" role="banner">

    <!-- ─── TOP BAR ─────────────────────────────── -->
    <div class="border-b border-slate-100">
      <div class="holder">
        <div class="flex items-center justify-between h-16 md:h-22.75 gap-4">

          <!-- LOGO -->
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

          <!-- RIGHT ACTIONS -->
          <div class="flex items-center gap-2">

            <!-- Sign Up — desktop only -->
            <a
              href="/signup"
              class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-medium border border-slate-200 text-slate-700 hover:border-emerald-600 hover:text-emerald-700 hover:bg-emerald-50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
              Sign Up
            </a>

            <!-- Sign In — desktop only -->
            <a
              href="/signin"
              class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-semibold text-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2"
              style="background-color:var(--color-brand);"
              onmouseover="this.style.backgroundColor='var(--color-brand-dark)'"
              onmouseout="this.style.backgroundColor='var(--color-brand)'">
              Sign In
            </a>

            <!-- User icon — mobile only -->
            <a
              href="/account"
              class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
              aria-label="Your account">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </a>

            <!-- Language Switcher -->
            <div class="lang-dropdown relative" role="navigation" aria-label="Language selection">
              <button
                type="button"
                class="flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                aria-haspopup="listbox"
                aria-expanded="false"
                aria-label="Change language, current: English">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                </svg>
                <span class="hidden sm:block">EN</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Language Menu -->
              <ul
                class="lang-menu absolute right-0 top-full mt-1.5 w-56 bg-white rounded-xl shadow-lg border border-slate-100 py-1.5 z-50"
                role="listbox"
                aria-label="Available languages">
                <!-- Arabic -->
                <li role="option" aria-selected="false">
                  <a href="?lang=ar" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="ar">
                    <span>العربية</span>
                    <span class="text-xs text-slate-400">٢٤٠ كتاب</span>
                  </a>
                </li>
                <!-- English (active) -->
                <li role="option" aria-selected="true">
                  <a href="?lang=en" class="flex items-center justify-between px-4 py-2.5 text-sm font-semibold transition-colors" style="color:var(--color-brand);background-color:var(--color-brand-light)" hreflang="en" aria-current="true">
                    <span>English</span>
                    <span class="flex items-center gap-1.5">
                      <span class="text-xs" style="color:var(--color-brand);opacity:.7;">180 books</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </li>
                <!-- Portuguese -->
                <li role="option" aria-selected="false">
                  <a href="?lang=pt" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="pt">
                    <span>Português</span>
                    <span class="text-xs text-slate-400">96 books</span>
                  </a>
                </li>
                <!-- Spanish -->
                <li role="option" aria-selected="false">
                  <a href="?lang=es" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="es">
                    <span>Español</span>
                    <span class="text-xs text-slate-400">74 books</span>
                  </a>
                </li>
                <!-- Japanese -->
                <li role="option" aria-selected="false">
                  <a href="?lang=ja" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="ja">
                    <span>日本語</span>
                    <span class="text-xs text-slate-400">52 books</span>
                  </a>
                </li>
                <!-- French -->
                <li role="option" aria-selected="false">
                  <a href="?lang=fr" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="fr">
                    <span>Français</span>
                    <span class="text-xs text-slate-400">48 books</span>
                  </a>
                </li>
                <!-- Welsh -->
                <li role="option" aria-selected="false">
                  <a href="?lang=cy" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="cy">
                    <span>Cymraeg</span>
                  </a>
                </li>
                <!-- Hindi -->
                <li role="option" aria-selected="false">
                  <a href="?lang=hi" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="hi">
                    <span>हिन्दी</span>
                    <span class="text-xs text-slate-400">31 books</span>
                  </a>
                </li>
                <!-- Bengali -->
                <li role="option" aria-selected="false">
                  <a href="?lang=bn" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="bn">
                    <span>বাংলা</span>
                    <span class="text-xs text-slate-400">22 books</span>
                  </a>
                </li>
                <!-- Armenian -->
                <li role="option" aria-selected="false">
                  <a href="?lang=hy" class="flex items-center justify-between px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors" hreflang="hy">
                    <span>Հայերեն</span>
                  </a>
                </li>
              </ul>
            </div>

            <!-- Search -->
            <form
              action="/search"
              method="get"
              role="search"
              aria-label="Site search"
              class="flex items-center">
              <div class="relative flex items-center">
                <!-- Search input: expands on focus (desktop), icon-only on mobile -->
                <input
                  type="search"
                  name="q"
                  placeholder="Search books…"
                  aria-label="Search"
                  class="hidden md:block w-0 md:w-44 lg:w-56 pl-9 pr-3 py-2 rounded-lg text-sm border border-slate-200 bg-slate-50 placeholder-slate-400 text-slate-800 transition-all focus:outline-none focus:ring-2 focus:border-transparent"
                  style="--tw-ring-color:var(--color-brand)" />
                <button
                  type="submit"
                  class="md:absolute md:left-2.5 flex items-center justify-center w-9 h-9 md:w-auto md:h-auto rounded-lg md:rounded-none text-slate-500 hover:text-emerald-700 hover:bg-slate-100 md:hover:bg-transparent transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                  aria-label="Submit search">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z" />
                  </svg>
                </button>
              </div>
            </form>

            <!-- Hamburger toggle — mobile only -->
            <button
              type="button"
              id="mobile-menu-btn"
              class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
              aria-controls="mobile-menu"
              aria-expanded="false"
              aria-label="Open navigation menu">
              <svg id="icon-hamburger" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

          </div>
        </div>
      </div>
    </div>
    <!-- ─── END TOP BAR ─────────────────────────── -->


    <!-- ─── BOTTOM NAV BAR ──────────────────────── -->
    <nav
      class="hidden md:block border-b border-slate-100"
      aria-label="Main navigation">
      <div class="holder">
        <div class="flex items-center justify-between h-12">

          <!-- NAV LINKS — centered -->
          <ul class="flex items-center gap-1" role="list">
            <li>
              <a
                href="/"
                class="px-3 py-1.5 rounded-md text-sm font-semibold transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                style="color:var(--color-brand);background-color:var(--color-brand-light)"
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="/books" class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">Books</a>
            </li>
            <li>
              <a href="/series" class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">Series</a>
            </li>
            <li>
              <a href="/contributors" class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">Contributors</a>
            </li>
            <li>
              <a href="/about" class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">About Us</a>
            </li>
          </ul>

          <!-- DONATE CTA -->
          <a
            href="/donate"
            class="flex items-center gap-1.5 px-4 py-1.5 rounded-lg text-sm font-semibold text-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-amber-400"
            style="background-color:var(--color-accent)"
            onmouseover="this.style.backgroundColor='#d08a10'"
            onmouseout="this.style.backgroundColor='var(--color-accent)'"
            aria-label="Donate to support us">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
            Donate
          </a>

        </div>
      </div>
    </nav>
    <!-- ─── END BOTTOM NAV BAR ───────────────────── -->


    <!-- ─── MOBILE MENU (drawer) ────────────────── -->
    <div
      id="mobile-menu"
      class="md:hidden border-t border-slate-100 bg-white"
      aria-label="Mobile navigation">
      <div class="max-w-7xl mx-auto px-4 py-3 flex flex-col gap-1">

        <!-- Auth buttons -->
        <div class="flex gap-2 pb-3 border-b border-slate-100">
          <a
            href="/signup"
            class="flex-1 text-center px-4 py-2 rounded-lg text-sm font-medium border border-slate-200 text-slate-700 hover:border-emerald-600 hover:text-emerald-700 hover:bg-emerald-50 transition-colors">Sign Up</a>
          <a
            href="/signin"
            class="flex-1 text-center px-4 py-2 rounded-lg text-sm font-semibold text-white transition-colors"
            style="background-color:var(--color-brand)">Sign In</a>
        </div>

        <!-- Nav links -->
        <ul class="flex flex-col gap-0.5 py-1" role="list">
          <li>
            <a
              href="/"
              class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors"
              style="color:var(--color-brand);background-color:var(--color-brand-light)"
              aria-current="page">Home</a>
          </li>
          <li><a href="/books" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition-colors">Books</a></li>
          <li><a href="/series" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition-colors">Series</a></li>
          <li><a href="/contributors" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition-colors">Contributors</a></li>
          <li><a href="/about" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition-colors">About Us</a></li>
        </ul>

        <!-- Donate -->
        <div class="pt-2 border-t border-slate-100">
          <a
            href="/donate"
            class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-lg text-sm font-semibold text-white transition-colors"
            style="background-color:var(--color-accent)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
            Donate
          </a>
        </div>

      </div>
    </div>
    <!-- ─── END MOBILE MENU ──────────────────────── -->

  </header>
  <!-- ═══════════════════════════════════════════════
     END SITE HEADER
════════════════════════════════════════════════ -->


  <!-- ══════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════ -->
  <section class="hero-bg relative py-10 md:py-15" aria-labelledby="hero-heading">

    <!-- Decorative blob — top-right atmosphere -->
    <div
      class="pointer-events-none absolute -top-24 -right-24 w-96 h-96 rounded-full opacity-30 blur-3xl"
      style="background: radial-gradient(circle, #6ee7b7, #34d399);"
      aria-hidden="true"></div>
    <div
      class="pointer-events-none absolute -bottom-16 -left-16 w-72 h-72 rounded-full opacity-20 blur-3xl"
      style="background: radial-gradient(circle, #fde68a, #fbbf24);"
      aria-hidden="true"></div>

    <!-- Decorative left mask -->
    <img
      src="/wp-content/themes/golpoLand/_/images/L.png"
      alt=""
      aria-hidden="true"
      class="anim-mask-l pointer-events-none select-none absolute left-0 bottom-0 h-48 md:h-72 lg:h-80 w-auto object-contain hidden sm:block z-0 opacity-80" />

    <!-- Decorative right mask -->
    <img
      src="/wp-content/themes/golpoLand/_/images/R.png"
      alt=""
      aria-hidden="true"
      class="anim-mask-r pointer-events-none select-none absolute right-0 top-1/2 -translate-y-1/2 h-48 md:h-72 lg:h-80 w-auto object-contain hidden sm:block z-0 opacity-80" />

    <!-- CONTENT CONTAINER -->
    <div class="relative z-10 holder">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-8 lg:gap-16 items-center">

        <!-- ── LEFT: Copy ──────────────────────── -->
        <div class="flex flex-col gap-6 text-center md:text-left">

          <!-- Eyebrow label -->
          <div class="anim-fade-up-1 flex items-center justify-center md:justify-start gap-2">
            <span
              class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-800 tracking-wide uppercase"
              style="background-color:var(--brand-light);color:var(--brand)">
              <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
              </svg>
              For Young Readers
            </span>
          </div>

          <!-- Main Heading -->
          <h1
            id="hero-heading"
            class="anim-fade-up-2 display-font leading-tight tracking-wide"
            style="color:var(--ink);font-size:clamp(2.4rem,6vw,4rem)">
            Book<span style="color:var(--brand)">time</span>
          </h1>

          <!-- Description -->
          <p
            class="anim-fade-up-3 text-base md:text-lg leading-relaxed max-w-md mx-auto md:mx-0"
            style="color:var(--muted)">
            Booktime is the children's and young readers' gateway to a world of knowledge and imagination. Explore a variety of interesting books and enjoyable stories in different languages.
          </p>

          <!-- CTA Buttons -->
          <div class="anim-fade-up-4 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-3 pt-2">

            <!-- Sign Up — primary -->
            <a
              href="/signup"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl text-sm font-800 text-white shadow-lg transition-all duration-200 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-offset-2"
              style="background-color:var(--brand);focus-visible:--tw-ring-color:var(--brand)"
              onmouseover="this.style.backgroundColor='var(--brand-dark)'"
              onmouseout="this.style.backgroundColor='var(--brand)'">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              Sign Up Free
            </a>

            <!-- Sign In — secondary -->
            <a
              href="/signin"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl text-sm font-700 border-2 transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-offset-2"
              style="border-color:var(--brand);color:var(--brand);background:white;"
              onmouseover="this.style.backgroundColor='var(--brand-light)'"
              onmouseout="this.style.backgroundColor='white'">
              Sign In
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>

          </div>

          <!-- Social proof micro-line -->
          <p class="anim-fade-up-4 text-xs font-600 mt-1" style="color:var(--muted);opacity:.75">
            Free forever · No credit card required · 10 languages
          </p>

        </div>
        <!-- ── END LEFT ─────────────────────────── -->


        <!-- ── RIGHT: Hero Image ───────────────── -->
        <div class="flex items-center justify-center md:justify-end relative">

          <!-- Decorative ring behind image -->
          <div
            class="absolute w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full opacity-40"
            style="background: radial-gradient(circle at 40% 40%, #bbf7d0, #d1fae5, transparent 70%);"
            aria-hidden="true"></div>

          <!-- Floating accent badge -->
          <div
            class="anim-fade-up-3 absolute -top-2 right-4 md:right-0 lg:-right-2 flex items-center gap-1.5 px-3 py-2 rounded-2xl text-xs font-800 text-white shadow-lg z-10"
            style="background-color:var(--accent)"
            aria-hidden="true">
            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            500+ Books
          </div>

          <img
            src="/wp-content/themes/golpoLand/_/images/hero_en.png"
            alt="Children exploring books and stories in a colourful library"
            loading="lazy"
            class="anim-hero-img relative z-10 w-full max-w-xs sm:max-w-sm md:max-w-full h-auto object-contain drop-shadow-2xl"
            style="filter: drop-shadow(0 20px 40px rgba(26,107,74,.18));" />

        </div>
        <!-- ── END RIGHT ───────────────────────── -->

      </div>
    </div>
  </section>
  <!-- ══════════════════════════════════════════════
     END HERO SECTION
══════════════════════════════════════════════ -->

  <!-- ══════════════════════════════════════════════
     BOOK SECTION
══════════════════════════════════════════════ -->
  <section class="w-full py-8 md:py-12 relative " aria-label="Books showcase">
    <div class="holder">

      <div class="swiper book-swiper overflow-hidden">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <a href="/en/books/1" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 1">
              <img src="https://covers.openlibrary.org/b/id/8739161-L.jpg" alt="Book 1 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/2" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 2">
              <img src="https://covers.openlibrary.org/b/id/8228691-L.jpg" alt="Book 2 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/3" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 3">
              <img src="https://covers.openlibrary.org/b/id/10909258-L.jpg" alt="Book 3 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/4" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 4">
              <img src="https://covers.openlibrary.org/b/id/12006469-L.jpg" alt="Book 4 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/5" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 5">
              <img src="https://covers.openlibrary.org/b/id/8739175-L.jpg" alt="Book 5 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/6" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 6">
              <img src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="Book 6 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/7" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 7">
              <img src="https://covers.openlibrary.org/b/id/10527843-L.jpg" alt="Book 7 cover" loading="lazy" />
            </a>
          </div>

          <div class="swiper-slide">
            <a href="/en/books/8" class="book-card block rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" aria-label="Book 8">
              <img src="https://covers.openlibrary.org/b/id/8739155-L.jpg" alt="Book 8 cover" loading="lazy" />
            </a>
          </div>

        </div>

        <div class="swiper-pagination" aria-hidden="true"></div>
      </div>

    </div>
  </section>
  <!-- ══════════════════════════════════════════════
     END BOOK SECTION
══════════════════════════════════════════════ -->


  <!-- Demo page fill -->
  <main>


  </main>


  <footer class="bg-zinc-950 text-zinc-400 mt-4" aria-label="Site footer">

    <!-- Main Footer Body -->
    <div class="holder py-12 lg:py-15">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">

        <!-- LEFT — Brand + Description + Social -->
        <div class="flex flex-col items-center lg:items-start gap-6 text-center lg:text-left">

          <!-- LOGO -->
          <a href="/" class="shrink-0 flex items-center" aria-label="Go to homepage">
            <!-- Desktop logo -->
            <img
              src="/wp-content/themes/golpoLand/_/images/Logo_en.svg"
              alt="Site Logo"
              class="hidden md:block h-10 w-auto" />
            <!-- Mobile logo -->

            <img
              src="/wp-content/themes/golpoLand/_/images/Logo-icon.png"
              alt="Site Logo"
              class="block md:hidden h-9 w-auto" />

          </a>

          <!-- Description -->
          <p class="text-sm leading-relaxed text-zinc-400 max-w-xs">
            A curated platform dedicated to literature, storytelling, and the people who bring books to life across the world.
          </p>

          <!-- Social Links -->
          <div class="flex items-center gap-3" role="list" aria-label="Social media links">

            <!-- Instagram -->
            <a
              href="#"
              role="listitem"
              aria-label="Follow us on Instagram"
              class="w-9 h-9 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-zinc-700 hover:text-white transition-colors duration-200">
              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.266.07 1.646.07 4.851s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 2.014 2.014.673 3.355.157 5.197.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.085 1.855.601 3.697 1.942 5.038 1.341 1.341 3.183 1.857 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.038-1.942 1.341-1.341 1.857-3.183 1.942-5.038.058-1.28.072-1.689.072-4.948 0-3.259-.014-3.668-.072-4.948-.085-1.855-.601-3.697-1.942-5.038C20.645.673 18.803.157 16.948.072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
              </svg>
            </a>

            <!-- X / Twitter -->
            <a
              href="#"
              role="listitem"
              aria-label="Follow us on X (Twitter)"
              class="w-9 h-9 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-zinc-700 hover:text-white transition-colors duration-200">
              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
              </svg>
            </a>

            <!-- Facebook -->
            <a
              href="#"
              role="listitem"
              aria-label="Follow us on Facebook"
              class="w-9 h-9 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-zinc-700 hover:text-white transition-colors duration-200">
              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.532-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
              </svg>
            </a>

          </div>
        </div>

        <!-- RIGHT — Navigation Columns -->
        <nav aria-label="Footer navigation">
          <ul class="grid grid-cols-2 gap-x-8 gap-y-3 sm:grid-cols-2">

            <li><a href="/" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Home</a></li>
            <li><a href="/books" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Books</a></li>
            <li><a href="/series" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Series</a></li>
            <li><a href="/contributors" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Contributors</a></li>
            <li><a href="/funders" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Funders</a></li>
            <li><a href="/about" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">About Us</a></li>
            <li><a href="/donate" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Donate</a></li>
            <li><a href="/privacy-policy" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Privacy Policy</a></li>
            <li><a href="/terms" class="text-sm text-zinc-400 hover:text-white transition-colors duration-150">Terms and Conditions</a></li>

          </ul>
        </nav>

      </div>
    </div>

    <!-- Bottom Copyright Bar -->
    <div class="border-t border-zinc-800">
      <div class="holder py-5 flex flex-col sm:flex-row items-center justify-center sm:justify-between gap-2">
        <p class="text-xs text-zinc-500 text-center sm:text-left">
          Copyright &copy; 2026 Booktime. All rights reserved.
        </p>
      </div>
    </div>

  </footer>


  <script type='text/javascript' src='/wp-includes/js/jquery/jquery.min.js?ver=3.6.0'></script>
  <script type='text/javascript' src='/wp-content/themes/golpoLand/_/js/swiper-bundle.min.js'></script>
  <script type='text/javascript' src='/wp-content/themes/golpoLand/_/js/functions.js?ver=<?php echo uniqid(); ?>'></script>
</body>

</html>
