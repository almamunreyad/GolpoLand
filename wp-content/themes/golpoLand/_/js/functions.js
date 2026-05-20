// Conflict bug solution — ensure $ refers to jQuery
var $ = jQuery.noConflict();

$(function () {

  /* ─────────────────────────────────────────────
   * Book Swiper
   * ───────────────────────────────────────────── */
  $('.book-swiper').each(function () {
    new Swiper(this, {
      slidesPerView: 2,
      spaceBetween: 14,
      grabCursor: true,

      pagination: {
        el: $(this).find('.swiper-pagination')[0],
        clickable: true,
      },

      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 16,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 18,
        },
      },

      a11y: {
        prevSlideMessage: 'Previous book',
        nextSlideMessage: 'Next book',
      },
    });
  });


  /* ─────────────────────────────────────────────
   * Mobile Menu
   * ───────────────────────────────────────────── */
  const $menuBtn = $('#mobile-menu-btn');
  const $drawer = $('#mobile-drawer');
  const $hamIcon = $('#icon-ham');
  const $closeIcon = $('#icon-close');

  function toggleMenu(open) {
    const isOpen = open !== undefined
      ? open
      : !$drawer.hasClass('open');

    $drawer.toggleClass('open', isOpen);
    $menuBtn.attr('aria-expanded', isOpen);

    $hamIcon.css('display', isOpen ? 'none' : '');
    $closeIcon.css('display', isOpen ? '' : 'none');
  }

  $menuBtn.on('click', function () {
    toggleMenu();
  });

  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      toggleMenu(false);
    }
  });

  $(document).on('click', function (e) {
    if (
      !$menuBtn.is(e.target) &&
      $menuBtn.has(e.target).length === 0 &&
      !$drawer.is(e.target) &&
      $drawer.has(e.target).length === 0
    ) {
      toggleMenu(false);
    }
  });


  /* ─────────────────────────────────────────────
   * Language Dropdown
   * ───────────────────────────────────────────── */
  const $langBtn = $('#lang-btn');
  const $langMenu = $('#lang-menu');

  $langBtn.on('click', function (e) {
    e.stopPropagation();

    const isOpen = !$langMenu.hasClass('open');

    $langMenu.toggleClass('open', isOpen);
    $langBtn.attr('aria-expanded', isOpen);
  });

  $(document).on('click', function (e) {
    if (
      !$langBtn.is(e.target) &&
      $langBtn.has(e.target).length === 0 &&
      !$langMenu.is(e.target) &&
      $langMenu.has(e.target).length === 0
    ) {
      $langMenu.removeClass('open');
      $langBtn.attr('aria-expanded', 'false');
    }
  });

  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      $langMenu.removeClass('open');
      $langBtn.attr('aria-expanded', 'false');
    }
  });


  /* ─────────────────────────────────────────────
   * Fade-up Entrance Animation
   * ───────────────────────────────────────────── */
  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {

      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }

    });
  }, {
    threshold: 0.1,
  });

  $('.fade-up').each(function () {
    observer.observe(this);
  });


  /* ─────────────────────────────────────────────
   * Featured Books Swiper
   * ───────────────────────────────────────────── */
  $('.featured-books-swiper').each(function () {

    new Swiper(this, {
      slidesPerView: 2,
      spaceBetween: 10,

      pagination: {
        el: $(this).find('.swiper-pagination')[0],
        clickable: true,
      },

      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },

        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    });

  });


  /* ─────────────────────────────────────────────
   * Categories Books Swiper
   * ───────────────────────────────────────────── */
  $('.categories-books-swiper').each(function () {

    new Swiper(this, {
      slidesPerView: 3,
      spaceBetween: 10,

      pagination: {
        el: $(this).find('.swiper-pagination')[0],
        clickable: true,
      },

      breakpoints: {
        768: {
          slidesPerView: 4,
          spaceBetween: 20,
        },

        1024: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
      },
    });

  });


  /* ─────────────────────────────────────────────
   * GSAP + Lenis Smooth Scroll
   * ───────────────────────────────────────────── */
  gsap.registerPlugin(ScrollTrigger);

  var lenis = new Lenis();

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add(function (time) {
    lenis.raf(time * 1000);
  });

  gsap.ticker.lagSmoothing(0);

}); // End DOM Ready
