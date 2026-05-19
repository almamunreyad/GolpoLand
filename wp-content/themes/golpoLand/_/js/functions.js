// Conflict bug solution — ensure $ refers to jQuery
var $ = jQuery.noConflict();

$(function () {



  /* ─────────────────────────────────────────────
   * Featured Books Swiper
   * ───────────────────────────────────────────── */
  document.querySelectorAll('.featured-books-swiper').forEach(function (el) {
    new Swiper(el, {
      slidesPerView: 2,
      spaceBetween: 10,
      pagination: {
        el: el.querySelector('.swiper-pagination'),
        clickable: true,
      },
      breakpoints: {
        768: { slidesPerView: 3, spaceBetween: 20 },
        1024: { slidesPerView: 4, spaceBetween: 20 },
      },
    });
  });


  /* ─────────────────────────────────────────────
   * Categories Books Swiper
   * ───────────────────────────────────────────── */
  document.querySelectorAll('.categories-books-swiper').forEach(function (el) {
    new Swiper(el, {
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: {
        el: el.querySelector('.swiper-pagination'),
        clickable: true,
      },
      breakpoints: {
        768: { slidesPerView: 4, spaceBetween: 20 },
        1024: { slidesPerView: 6, spaceBetween: 20 },
      },
    });
  });


  /* ─────────────────────────────────────────────
   * 19. GSAP + Lenis smooth scroll
   * ───────────────────────────────────────────── */
  gsap.registerPlugin(ScrollTrigger);
  var lenis = new Lenis();
  lenis.on("scroll", ScrollTrigger.update);
  gsap.ticker.add(function (t) {
    lenis.raf(t * 1000);
  });
  gsap.ticker.lagSmoothing(0);
}); // end DOM ready


