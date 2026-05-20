<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Booktime — Stories for Every Child</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="/wp-content/themes/golpoLand/_/css/websure.min.css?var=<?php echo uniqid(); ?>" rel="stylesheet">

  <style>
    :root {
      --brand: #16a34a;
      --brand-dark: #15803d;
      --brand-light: #dcfce7;
      --brand-xlight: #f0fdf4;
      --accent: #f59e0b;
      --accent-dark: #d97706;
      --accent-light: #fef3c7;

      --ink: #0f172a;
      --muted: #64748b;
      --border: #e2e8f0;
      --surface: #ffffff;
      --bg: #fafaf9;

      --radius: 16px;
      --radius-sm: 10px;
      --radius-xl: 24px;
      --shadow: 0 4px 24px rgba(15, 23, 42, .08);
      --shadow-lg: 0 12px 40px rgba(15, 23, 42, .13);

      --font-display: 'Fraunces', Georgia, serif;
      --font-body: 'DM Sans', system-ui, sans-serif;

      --header-h: 95px;
      --nav-h: 50px;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: var(--font-body);
      background: var(--bg);
      color: var(--ink);
      -webkit-font-smoothing: antialiased;
    }


    a {
      text-decoration: none;
      color: inherit;
    }

    .holder {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* ── HEADER ───────────────────────────────── */
    .site-header {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255, 255, 255, .95);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--border);
    }

    .header-top {
      height: var(--header-h);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }

    .logo-text {
      font-family: var(--font-display);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--ink);
      letter-spacing: -0.02em;
    }

    .logo-text span {
      color: var(--brand);
    }

    .header-actions {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .search-form {
      position: relative;
      display: none;
    }

    @media (min-width: 768px) {
      .search-form {
        display: flex;
      }
    }

    .search-input {
      width: 200px;
      padding: 7px 12px 7px 34px;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: #f8fafc;
      font-size: 0.8125rem;
      font-family: var(--font-body);
      color: var(--ink);
      transition: border-color .2s, box-shadow .2s;
      outline: none;
    }

    .search-input:focus {
      border-color: var(--brand);
      box-shadow: 0 0 0 3px rgba(22, 163, 74, .12);
    }

    .search-icon {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
      width: 14px;
      height: 14px;
    }

    /* Language dropdown */
    .lang-wrap {
      position: relative;
    }

    .lang-btn {
      display: flex;
      align-items: center;
      gap: 4px;
      padding: 7px 10px;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: transparent;
      font-size: 0.8125rem;
      font-family: var(--font-body);
      color: var(--muted);
      cursor: pointer;
      transition: background .15s, border-color .15s;
    }

    .lang-btn:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      color: var(--ink);
    }

    .lang-menu {
      position: absolute;
      top: calc(100% + 6px);
      right: 0;
      width: 200px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      box-shadow: var(--shadow-lg);
      padding: 6px;
      display: none;
      z-index: 200;
    }

    .lang-menu.open {
      display: block;
    }

    .lang-menu a {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 7px 10px;
      border-radius: 6px;
      font-size: 0.8125rem;
      color: var(--muted);
      transition: background .12s, color .12s;
    }

    .lang-menu a:hover {
      background: var(--brand-xlight);
      color: var(--brand-dark);
    }

    .lang-menu a.active {
      background: var(--brand-light);
      color: var(--brand);
      font-weight: 600;
    }

    .lang-count {
      font-size: .7rem;
      color: #94a3b8;
    }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      border: none;
      cursor: pointer;
      font-family: var(--font-body);
      font-weight: 600;
      border-radius: 8px;
      transition: all .18s;
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-sm {
      padding: 7px 14px;
      font-size: .8125rem;
    }

    .btn-md {
      padding: 10px 20px;
      font-size: .875rem;
    }

    .btn-lg {
      padding: 13px 28px;
      font-size: .9375rem;
    }

    .btn-ghost {
      background: transparent;
      color: var(--muted);
      border: 1px solid var(--border);
    }

    .btn-ghost:hover {
      border-color: var(--brand);
      color: var(--brand);
      background: var(--brand-xlight);
    }

    .btn-primary {
      background: var(--brand);
      color: #fff;
      box-shadow: 0 2px 8px rgba(22, 163, 74, .25);
    }

    .btn-primary:hover {
      background: var(--brand-dark);
      box-shadow: 0 4px 16px rgba(22, 163, 74, .35);
      transform: translateY(-1px);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .btn-outline {
      background: transparent;
      color: var(--brand);
      border: 2px solid var(--brand);
    }

    .btn-outline:hover {
      background: var(--brand-xlight);
      transform: translateY(-1px);
    }

    .btn-accent {
      background: var(--accent);
      color: #fff;
      box-shadow: 0 2px 8px rgba(245, 158, 11, .25);
    }

    .btn-accent:hover {
      background: var(--accent-dark);
      transform: translateY(-1px);
    }

    .icon-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 8px;
      background: transparent;
      border: none;
      color: var(--muted);
      cursor: pointer;
      transition: background .15s, color .15s;
    }

    .icon-btn:hover {
      background: #f1f5f9;
      color: var(--ink);
    }

    .btn-hidden-sm {
      display: none;
    }

    @media (min-width: 768px) {
      .btn-hidden-sm {
        display: inline-flex;
      }
    }

    .btn-show-sm {
      display: inline-flex;
    }

    @media (min-width: 768px) {
      .btn-show-sm {
        display: none;
      }
    }

    /* NAV */
    .site-nav {
      border-top: 1px solid var(--border);
      display: none;
    }

    @media (min-width: 768px) {
      .site-nav {
        display: block;
      }
    }

    .nav-inner {
      height: var(--nav-h);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 2px;
      list-style: none;
    }

    .nav-link {
      display: inline-flex;
      align-items: center;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: .875rem;
      font-weight: 500;
      color: var(--muted);
      transition: background .12s, color .12s;
    }

    .nav-link:hover {
      background: #f1f5f9;
      color: var(--ink);
    }

    .nav-link.active {
      background: var(--brand-light);
      color: var(--brand);
      font-weight: 600;
    }

    /* MOBILE DRAWER */
    .mobile-drawer {
      display: none;
      border-top: 1px solid var(--border);
      background: var(--surface);
      padding: 12px 20px 16px;
      animation: slideDown .22s ease;
    }

    .mobile-drawer.open {
      display: block;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .drawer-auth {
      display: flex;
      gap: 8px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 8px;
    }

    .drawer-auth .btn {
      flex: 1;
    }

    .drawer-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .drawer-links a {
      display: flex;
      align-items: center;
      padding: 9px 12px;
      border-radius: 8px;
      font-size: .875rem;
      font-weight: 500;
      color: #475569;
      transition: background .12s, color .12s;
    }

    .drawer-links a:hover {
      background: #f1f5f9;
      color: var(--ink);
    }

    .drawer-links a.active {
      background: var(--brand-light);
      color: var(--brand);
      font-weight: 600;
    }

    .drawer-donate {
      margin-top: 12px;
      padding-top: 12px;
      border-top: 1px solid var(--border);
    }

    .drawer-donate .btn {
      width: 100%;
    }

    /* ── HERO ─────────────────────────────────── */
    .hero {
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 40%, #fefce8 100%);
      padding: 28px 0 20px;
    }

    .hero-blob-1 {
      position: absolute;
      top: -80px;
      right: -60px;
      width: 380px;
      height: 380px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(110, 231, 183, .35), rgba(52, 211, 153, .15));
      filter: blur(60px);
      pointer-events: none;
    }

    .hero-blob-2 {
      position: absolute;
      bottom: -60px;
      left: -40px;
      width: 280px;
      height: 280px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(253, 230, 138, .35), rgba(251, 191, 36, .15));
      filter: blur(50px);
      pointer-events: none;
    }

    .hero-grid {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      align-items: center;
    }

    @media (min-width: 768px) {
      .hero-grid {
        grid-template-columns: 1fr 1fr;
        gap: 32px;
      }
    }

    .hero-copy {
      display: flex;
      flex-direction: column;
      gap: 14px;
      text-align: center;
    }

    @media (min-width: 768px) {
      .hero-copy {
        text-align: left;
      }
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      padding: 5px 12px;
      border-radius: 100px;
      background: var(--brand-light);
      color: var(--brand-dark);
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .05em;
      text-transform: uppercase;
      width: fit-content;
      margin: 0 auto;
    }

    @media (min-width: 768px) {
      .eyebrow {
        margin: 0;
      }
    }

    .hero-title {
      font-family: var(--font-display);
      font-size: clamp(2.2rem, 5.5vw, 3.6rem);
      font-weight: 700;
      line-height: 1.08;
      letter-spacing: -0.03em;
      color: var(--ink);
    }

    .hero-title span {
      color: var(--brand);
    }

    .hero-desc {
      font-size: clamp(.875rem, 1.5vw, 1rem);
      line-height: 1.65;
      color: var(--muted);
      max-width: 420px;
      margin: 0 auto;
    }

    @media (min-width: 768px) {
      .hero-desc {
        margin: 0;
      }
    }

    .hero-ctas {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
    }

    @media (min-width: 768px) {
      .hero-ctas {
        justify-content: flex-start;
      }
    }

    .hero-social-proof {
      font-size: .75rem;
      color: var(--muted);
      opacity: .75;
    }

    /* Hero image side */
    .hero-visual {
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .hero-ring {
      position: absolute;
      width: 280px;
      height: 280px;
      border-radius: 50%;
      background: radial-gradient(circle at 40% 40%, rgba(187, 247, 208, .6), rgba(209, 250, 229, .3), transparent 70%);
    }

    @media (min-width: 768px) {
      .hero-ring {
        width: 320px;
        height: 320px;
      }
    }

    .hero-badge {
      position: absolute;
      top: 0;
      right: 8px;
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 6px 12px;
      background: var(--accent);
      color: #fff;
      border-radius: 12px;
      font-size: .75rem;
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(245, 158, 11, .3);
      z-index: 2;
    }

    .hero-img-wrap {
      position: relative;
      z-index: 1;
      animation: float 4s ease-in-out infinite;
    }

    .hero-img-placeholder {
      width: 240px;
      height: 220px;
      background: linear-gradient(135deg, #bbf7d0 0%, #86efac 50%, #4ade80 100%);
      border-radius: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 80px;
      box-shadow: 0 20px 50px rgba(22, 163, 74, .2);
    }

    @media (min-width: 768px) {
      .hero-img-placeholder {
        width: 280px;
        height: 260px;
      }
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
      .hero-img-wrap {
        animation: none;
      }

      .btn-primary:hover,
      .btn-outline:hover,
      .btn-accent:hover {
        transform: none;
      }
    }

    /* ── BOOKS SECTION ────────────────────────── */
    .books-section {
      padding: 20px 0 28px;
      background: var(--surface);
    }

    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .section-title {
      font-family: var(--font-display);
      font-size: clamp(1.1rem, 2.5vw, 1.4rem);
      font-weight: 700;
      color: var(--ink);
      letter-spacing: -0.02em;
    }

    .book-swiper {
      overflow: hidden;
    }

    .swiper-slide {
      height: auto;
    }

    .book-card {
      display: block;
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: box-shadow .25s, transform .25s;
      background: var(--surface);
      aspect-ratio: 3/4;
    }

    .book-card:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow: var(--shadow-lg);
    }

    .book-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .book-card:focus-visible {
      outline: 2px solid var(--brand);
      outline-offset: 3px;
    }

    .swiper-pagination-bullet {
      background: var(--brand) !important;
      opacity: .3;
    }

    .swiper-pagination-bullet-active {
      opacity: 1 !important;
    }

    .swiper-pagination {
      margin-top: 12px !important;
      position: relative !important;
      bottom: auto !important;
    }

    /* ── FOOTER ───────────────────────────────── */
    .site-footer {
      background: #0f1117;
      color: #9ca3af;
      margin-top: 8px;
    }

    .footer-body {
      padding: 48px 0 36px;
      display: grid;
      grid-template-columns: 1fr;
      gap: 36px;
    }

    @media (min-width: 768px) {
      .footer-body {
        grid-template-columns: 1.2fr 2fr;
        gap: 60px;
      }
    }

    .footer-brand {
      display: flex;
      flex-direction: column;
      gap: 16px;
      align-items: center;
      text-align: center;
    }

    @media (min-width: 768px) {
      .footer-brand {
        align-items: flex-start;
        text-align: left;
      }
    }

    .footer-logo {
      font-family: var(--font-display);
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.02em;
    }

    .footer-logo span {
      color: #4ade80;
    }

    .footer-desc {
      font-size: .8125rem;
      line-height: 1.6;
      color: #6b7280;
      max-width: 240px;
    }

    .social-links {
      display: flex;
      gap: 8px;
    }

    .social-link {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #1f2937;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #9ca3af;
      transition: background .15s, color .15s;
    }

    .social-link:hover {
      background: #374151;
      color: #fff;
    }

    .social-link svg {
      width: 15px;
      height: 15px;
    }

    .footer-nav {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px 20px;
      align-content: start;
    }

    .footer-nav a {
      font-size: .8125rem;
      color: #6b7280;
      transition: color .12s;
      padding: 4px 0;
    }

    .footer-nav a:hover {
      color: #fff;
    }

    .footer-bottom {
      border-top: 1px solid #1f2937;
      padding: 16px 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .footer-copy {
      font-size: .75rem;
      color: #4b5563;
    }

    /* ── FADE-UP ANIMATIONS ───────────────────── */
    .fade-up {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity .5s ease, transform .5s ease;
    }

    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .fade-up-1 {
      transition-delay: .05s;
    }

    .fade-up-2 {
      transition-delay: .12s;
    }

    .fade-up-3 {
      transition-delay: .2s;
    }

    .fade-up-4 {
      transition-delay: .28s;
    }

    @media (prefers-reduced-motion: reduce) {
      .fade-up {
        opacity: 1;
        transform: none;
        transition: none;
      }
    }
  </style>
</head>

<body>

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


  <!-- ══════════════════════════════════════════
   HERO SECTION
══════════════════════════════════════════ -->
  <section class="hero" aria-labelledby="hero-heading">
    <div class="hero-blob-1" aria-hidden="true"></div>
    <div class="hero-blob-2" aria-hidden="true"></div>

    <div class="holder">
      <div class="hero-grid">

        <!-- Left: Copy -->
        <div class="hero-copy">
          <div class="fade-up fade-up-1 eyebrow" aria-label="For young readers">
            <svg width="12" height="12" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
            </svg>
            For Young Readers
          </div>

          <h1 id="hero-heading" class="hero-title fade-up fade-up-2">
            Book<span>time</span>
          </h1>

          <p class="hero-desc fade-up fade-up-3">
            Your child's gateway to knowledge and imagination. Explore hundreds of stories in 10 languages — free, forever.
          </p>

          <div class="hero-ctas fade-up fade-up-4">
            <a href="/signup" class="btn btn-primary btn-lg">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              Sign Up Free
            </a>
            <a href="/books" class="btn btn-outline btn-lg">
              Browse Books
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>
          </div>

          <p class="hero-social-proof fade-up fade-up-4">
            Free forever · No credit card required · 10 languages
          </p>
        </div>

        <!-- Right: Visual -->
        <div class="hero-visual" aria-hidden="true">
          <div class="hero-ring"></div>
          <div class="hero-badge">
            <svg width="12" height="12" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            500+ Books
          </div>
          <div class="hero-img-wrap">
            <div class="hero-img-placeholder" role="img" aria-label="Children exploring colourful books">
              📚
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ══════════════════════════════════════════
   END HERO
══════════════════════════════════════════ -->


  <!-- ══════════════════════════════════════════
   BOOKS SECTION
══════════════════════════════════════════ -->
  <section class="books-section" aria-label="Books showcase">
    <div class="holder">
      <div class="section-header">
        <h2 class="section-title">New Arrivals</h2>
        <a href="/books" class="btn btn-ghost btn-sm">
          View all
          <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </a>
      </div>

      <div class="swiper book-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="/en/books/1" class="book-card" aria-label="Book 1">
              <img src="https://covers.openlibrary.org/b/id/8739161-L.jpg" alt="Book cover 1" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/2" class="book-card" aria-label="Book 2">
              <img src="https://covers.openlibrary.org/b/id/8228691-L.jpg" alt="Book cover 2" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/3" class="book-card" aria-label="Book 3">
              <img src="https://covers.openlibrary.org/b/id/10909258-L.jpg" alt="Book cover 3" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/4" class="book-card" aria-label="Book 4">
              <img src="https://covers.openlibrary.org/b/id/12006469-L.jpg" alt="Book cover 4" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/5" class="book-card" aria-label="Book 5">
              <img src="https://covers.openlibrary.org/b/id/8739175-L.jpg" alt="Book cover 5" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/6" class="book-card" aria-label="Book 6">
              <img src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="Book cover 6" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/7" class="book-card" aria-label="Book 7">
              <img src="https://covers.openlibrary.org/b/id/10527843-L.jpg" alt="Book cover 7" loading="lazy" />
            </a>
          </div>
          <div class="swiper-slide">
            <a href="/en/books/8" class="book-card" aria-label="Book 8">
              <img src="https://covers.openlibrary.org/b/id/8739155-L.jpg" alt="Book cover 8" loading="lazy" />
            </a>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- ══════════════════════════════════════════
   END BOOKS
══════════════════════════════════════════ -->


  <main></main>


  <!-- ══════════════════════════════════════════
   FOOTER
══════════════════════════════════════════ -->
  <footer class="site-footer" aria-label="Site footer">
    <div class="holder">
      <div class="footer-body">

        <!-- Brand -->
        <div class="footer-brand">
          <a href="/" class="footer-logo" aria-label="Booktime homepage">
            Book<span>time</span>
          </a>
          <p class="footer-desc">
            A curated platform dedicated to stories, learning, and the people who bring books to life across the world.
          </p>
          <div class="social-links" role="list" aria-label="Social media links">
            <a href="#" class="social-link" role="listitem" aria-label="Instagram">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.266.07 1.646.07 4.851s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 2.014 2.014.673 3.355.157 5.197.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.085 1.855.601 3.697 1.942 5.038 1.341 1.341 3.183 1.857 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.038-1.942 1.341-1.341 1.857-3.183 1.942-5.038.058-1.28.072-1.689.072-4.948 0-3.259-.014-3.668-.072-4.948-.085-1.855-.601-3.697-1.942-5.038C20.645.673 18.803.157 16.948.072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
              </svg>
            </a>
            <a href="#" class="social-link" role="listitem" aria-label="X (Twitter)">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
              </svg>
            </a>
            <a href="#" class="social-link" role="listitem" aria-label="Facebook">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.532-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Nav -->
        <nav aria-label="Footer navigation">
          <div class="footer-nav">
            <a href="/">Home</a>
            <a href="/books">Books</a>
            <a href="/series">Series</a>
            <a href="/contributors">Contributors</a>
            <a href="/funders">Funders</a>
            <a href="/about">About Us</a>
            <a href="/donate">Donate</a>
            <a href="/privacy-policy">Privacy Policy</a>
            <a href="/terms">Terms &amp; Conditions</a>
          </div>
        </nav>

      </div>
    </div>

    <div style="border-top:1px solid #1f2937;">
      <div class="holder footer-bottom">
        <p class="footer-copy">Copyright &copy; 2026 Booktime. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <!-- ══════════════════════════════════════════
   END FOOTER
══════════════════════════════════════════ -->


  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    // ── Swiper init ──────────────────────────────
    new Swiper('.book-swiper', {
      slidesPerView: 2,
      spaceBetween: 14,
      grabCursor: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 16
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 18
        },
      },
      a11y: {
        prevSlideMessage: 'Previous book',
        nextSlideMessage: 'Next book'
      },
    });

    // ── Mobile menu ──────────────────────────────
    const menuBtn = document.getElementById('mobile-menu-btn');
    const drawer = document.getElementById('mobile-drawer');
    const hamIcon = document.getElementById('icon-ham');
    const closeIcon = document.getElementById('icon-close');

    function toggleMenu(open) {
      const isOpen = open !== undefined ? open : !drawer.classList.contains('open');
      drawer.classList.toggle('open', isOpen);
      menuBtn.setAttribute('aria-expanded', isOpen);
      hamIcon.style.display = isOpen ? 'none' : '';
      closeIcon.style.display = isOpen ? '' : 'none';
    }

    menuBtn.addEventListener('click', () => toggleMenu());

    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') toggleMenu(false);
    });

    document.addEventListener('click', e => {
      if (!menuBtn.contains(e.target) && !drawer.contains(e.target)) {
        toggleMenu(false);
      }
    });

    // ── Language dropdown ────────────────────────
    const langBtn = document.getElementById('lang-btn');
    const langMenu = document.getElementById('lang-menu');

    langBtn.addEventListener('click', e => {
      e.stopPropagation();
      const isOpen = langMenu.classList.toggle('open');
      langBtn.setAttribute('aria-expanded', isOpen);
    });

    document.addEventListener('click', e => {
      if (!langBtn.contains(e.target) && !langMenu.contains(e.target)) {
        langMenu.classList.remove('open');
        langBtn.setAttribute('aria-expanded', 'false');
      }
    });

    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        langMenu.classList.remove('open');
        langBtn.setAttribute('aria-expanded', 'false');
      }
    });

    // ── Fade-up entrance animations ──────────────
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  </script>

</body>

</html>
