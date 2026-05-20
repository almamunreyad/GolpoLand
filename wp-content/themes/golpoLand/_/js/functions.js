// Conflict bug solution — ensure $ refers to jQuery
var $ = jQuery.noConflict();

$(function () {
  /* ─────────────────────────────────────────────
   * 1. HEADER — Sticky + Show on Scroll Up
   * ───────────────────────────────────────────── */
  var lastScrollTop = 0;
  var $headerWrapper = $(".header-wrapper");
  var $header = $("header");

  $(".staticHeader").css("height", $header.outerHeight() + "px");

  /* ─────────────────────────────────────────────
   * 2. SCROLL EVENTS — merged into one rAF-throttled handler
   *    (header sticky + countUp + scroll-progress)
   * ───────────────────────────────────────────── */
  var scrollRAF = null;

  $(window).on("scroll.global", function () {
    if (scrollRAF) return;
    scrollRAF = requestAnimationFrame(function () {
      scrollRAF = null;
      var winTop = $(window).scrollTop();

      // — Header sticky logic
      if (winTop >= 40) {
        $headerWrapper.addClass("header-sticky");
      } else {
        $headerWrapper.removeClass("header-sticky header-show");
      }

      if ($headerWrapper.hasClass("header-sticky")) {
        if (winTop < lastScrollTop) {
          $headerWrapper.addClass("header-show");
        } else {
          $headerWrapper.removeClass("header-show");
          if (window.innerWidth > 786) {
            $("body").removeClass("nav-expanded");
            $(".toggleMenu").removeClass("showNav");
            $(".navWrapper").removeClass("open-nav");
          }
        }
      }
      lastScrollTop = winTop;

      // — Animate counters when in view
      countUp();

      // — Update scroll progress bar width
      var docHeight = $(document).height() - $(window).height();
      $("#scroll-progress").css(
        "width",
        docHeight > 0 ? (winTop / docHeight) * 100 + "%" : "0%",
      );
    });
  });

  /* ─────────────────────────────────────────────
   * 3. MAIN NAV — Hamburger toggle
   * ───────────────────────────────────────────── */
  $(".toggleMenu").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("body").toggleClass("nav-expanded");
    $(this).toggleClass("showNav");
    $(".navWrapper").toggleClass("open-nav");
  });

  /* ─────────────────────────────────────────────
   * 4. MEGA MENU — Hover (desktop) / Click (mobile)
   * ───────────────────────────────────────────── */
  var BREAKPOINT = 768;
  var $megaItems = $(".megaMenu > .menu-item-has-children");
  var isMobile = function () {
    return window.innerWidth < BREAKPOINT;
  };

  $megaItems.children(".sub-menu").hide();

  $megaItems.on("mouseenter mouseleave", function (e) {
    if (isMobile()) return;
    $(this)
      .children(".sub-menu")
      .stop(true, true)
      .slideToggle(e.type === "mouseenter" ? 200 : 150);
  });

  $megaItems.children("a").on("click", function (e) {
    if (!isMobile()) return;
    e.preventDefault();
    var $current = $(this).parent();
    $megaItems
      .not($current)
      .removeClass("active")
      .children(".sub-menu")
      .stop(true, true)
      .slideUp(200);
    $current
      .toggleClass("active")
      .children(".sub-menu")
      .stop(true, true)
      .slideToggle(200);
  });

  $(window).on("resize.megaMenu", function () {
    if (!isMobile()) {
      $megaItems.removeClass("active").children(".sub-menu").hide();
    }
  });

  /* ─────────────────────────────────────────────
   * 5. FOOTER MENU — Mobile accordion
   * ───────────────────────────────────────────── */
  $(".footer-menu > li").each(function () {
    $(this).children("a").addClass("footerMenuToggler");
    $(this).children("ul").addClass("footerSubMenu");
  });

  $(document).on("click", ".footerMenuToggler", function (e) {
    e.preventDefault();
    if (window.innerWidth >= 786) return;
    var $this = $(this);
    $this
      .toggleClass("active")
      .parent()
      .siblings()
      .find(".footerMenuToggler")
      .removeClass("active")
      .end()
      .find(".footerSubMenu:visible")
      .slideUp();
    $this.next(".footerSubMenu").stop(true, true).slideToggle();
  });

  /* ─────────────────────────────────────────────
   * 6. INTERSECTION OBSERVERS
   * ───────────────────────────────────────────── */
  // data-scroll → adds "in-view" class when element enters viewport
  var scrollObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add("in-view");
        scrollObserver.unobserve(entry.target);
      }
    });
  });
  document.querySelectorAll("[data-scroll]").forEach(function (el) {
    scrollObserver.observe(el);
  });

  // data-animation → adds "circle-in" class when element is mid-screen
  var animObserver = new IntersectionObserver(
    function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("circle-in");
          obs.unobserve(entry.target);
        }
      });
    },
    { root: null, rootMargin: "-40% 0px -60% 0px" },
  );

  document.querySelectorAll("[data-animation]").forEach(function (el) {
    animObserver.observe(el);
  });

  /* ─────────────────────────────────────────────
   * 7. LEADERSHIP — Mobile click expand
   * ───────────────────────────────────────────── */
  if ($(window).width() <= 768) {
    $(".leaderShip").on("click", function () {
      var isActive = $(this).hasClass("active");
      $(".leaderShip").removeClass("active");
      if (!isActive) $(this).addClass("active");
    });
  }

  /* ─────────────────────────────────────────────
   * 8. CLIPBOARD COPY
   * ───────────────────────────────────────────── */
  function showCopySuccess(button) {
    var textNode = button.childNodes[button.childNodes.length - 1];
    var original = textNode.textContent;
    textNode.textContent = " Copied!";
    setTimeout(function () {
      textNode.textContent = original;
    }, 2000);
  }

  function copyText(text, button) {
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard
        .writeText(text)
        .then(function () {
          showCopySuccess(button);
        })
        .catch(function () {
          fallbackCopy(text, button);
        });
    } else {
      fallbackCopy(text, button);
    }
  }

  // Fallback for HTTP or older browsers using execCommand
  function fallbackCopy(text, button) {
    var ta = document.createElement("textarea");
    ta.value = text;
    Object.assign(ta.style, {
      position: "fixed",
      left: "-999999px",
      top: "-999999px",
    });
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try {
      document.execCommand("copy") && showCopySuccess(button);
    } catch (err) {
      console.error("Fallback copy failed:", err);
    } finally {
      document.body.removeChild(ta);
    }
  }

  document.querySelectorAll(".copy-text").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var bio = this.closest(".leaderShip-bio-block").querySelector(
        ".leaderShip-bio",
      );
      if (bio) {
        var text = bio.innerText.trim();
        if (text) copyText(text, this);
      }
    });
  });

  /* ─────────────────────────────────────────────
   * 9. SPLIDE — Auto-scroll slider + custom cursor
   * ───────────────────────────────────────────── */
  if ($(".splide").length) {
    var $cursor = $(".custom-cursor");
    var lastMouseX = 0;

    var featuredSlider = new Splide(".splide", {
      type: "loop",
      autoWidth: true,
      height: "auto",
      pagination: false,
      drag: "free",
      arrows: false,
      autoScroll: false,
      speed: 500,
    }).mount(window.splide.Extensions);

    $(".splide")
      .on("mouseenter", function () {
        $cursor.addClass("active");
        featuredSlider.Components.AutoScroll.pause();
      })
      .on("mouseleave", function () {
        $cursor.removeClass("active");
        featuredSlider.Components.AutoScroll.play();
      })
      .on("mousedown", function () {
        $cursor.addClass("clickedSlide");
      })
      .on("mousemove", function (e) {
        $cursor.css({ left: e.clientX + "px", top: e.clientY + "px" });
        var delta = e.clientX - lastMouseX;
        if (Math.abs(delta) > 3) {
          $cursor
            .toggleClass("right", delta > 0)
            .toggleClass("left", delta <= 0);
          lastMouseX = e.clientX;
        }
      });

    $(document).on("mouseup", function () {
      $cursor.removeClass("clickedSlide");
    });
  }

  /* ─────────────────────────────────────────────
   * 10. SMOOTH SCROLL — #hash links
   * ───────────────────────────────────────────── */
  $("a[href^='#']").on("click", function (e) {
    var $target = $(this.hash);
    if (!$target.length) return;
    e.preventDefault();
    $("html, body").animate(
      { scrollTop: $target.offset().top - 70 },
      700,
      "swing",
    );
  });

  /* ─────────────────────────────────────────────
   * 11. FILTER SCROLL — horizontal scroll text sync
   * ───────────────────────────────────────────── */
  var $filterScroll = $(".filter-scroll");
  var $scrollText = $(".scroll-text");

  if ($filterScroll.length && $scrollText.length) {
    $filterScroll.on("scroll", function () {
      $scrollText.css(
        "transform",
        "translateX(" + $(this).scrollLeft() + "px)",
      );
    });
  }

  /* ─────────────────────────────────────────────
   * 12. SELECT2 — Custom dropdowns
   * ───────────────────────────────────────────── */
  var SELECT2_OPTS = { minimumResultsForSearch: Infinity };
  var ARROW_SVG = `<svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
    <path d="M1.07275 0.499999L12.7837 0.5L6.92822 7.47363L1.07275 0.499999Z" stroke="#E0E0E0"/>
  </svg>`;
  // Set dropdown width to match parent container on open
  function fixSelect2Width() {
    var selectWidth = $(".select2.select2-container")
      .parent(".ginput_container")
      .width();
    $(".select2.select2-container").css("width", selectWidth);
  }

  $(".selectFilter")
    .select2(SELECT2_OPTS)
    .on("select2:open", function () {
      $(".select2-results").attr("data-lenis-prevent", "");
      fixSelect2Width();
    });
  $(".select2-selection__arrow").attr("data-lenis-prevent", "").html(ARROW_SVG);

  var MOBILE_BREAKPOINT = 768;

  function initGFSelect2(ctx) {
    $(ctx)
      .find(".gfield_select")
      .each(function () {
        var $s = $(this);
        if ($s.hasClass("select2-hidden-accessible")) return;
        $s.select2(SELECT2_OPTS).on("select2:open", function () {
          $(".select2-results").attr("data-lenis-prevent", "");
          fixSelect2Width();
        });
      });
  }

  if (window.innerWidth > MOBILE_BREAKPOINT) {
    initGFSelect2(document);

    // Re-init select2 after Gravity Forms AJAX re-render
    $(document).on("gform_post_render", function () {
      initGFSelect2(document);
    });
  }

  /* ─────────────────────────────────────────────
   * 13. ACCORDION
   * ───────────────────────────────────────────── */
  $(".accordion-toggle").on("click", function (e) {
    e.preventDefault();
    var $item = $(this).closest(".accordion-item");
    var $content = $item.find(".accordion-content");

    if ($item.hasClass("active")) {
      $content.css("max-height", "0");
      setTimeout(function () {
        $item.removeClass("active");
      }, 500);
      return;
    }

    // Close all other open accordion items
    $(".accordion-item.active").each(function () {
      var $other = $(this);
      $other.find(".accordion-content").css("max-height", "0");
      setTimeout(function () {
        $other.removeClass("active");
      }, 500);
    });

    $item.addClass("active");
    $content.css("max-height", $content.prop("scrollHeight") + "px");
  });

  /* ─────────────────────────────────────────────
   * 14. COUNTER — animate numbers when scrolled into view
   * ───────────────────────────────────────────── */
  var $counters = $(".counter");

  function isInView(elem) {
    var docTop = $(window).scrollTop();
    var docBottom = docTop + $(window).height();
    var top = elem.offset().top;
    return top + elem.height() <= docBottom && top >= docTop;
  }

  function countUp() {
    $counters.each(function () {
      var $this = $(this);
      if ($this.attr("ended") === "true" || !isInView($this)) return;
      $this.attr("ended", "true");
      $({ n: 0 }).animate(
        { n: +$this.attr("data-count") },
        {
          duration: 2500,
          easing: "swing",
          step: function () {
            $this.text(Math.floor(this.n));
          },
          complete: function () {
            $this.text(this.n);
          },
        },
      );
    });
  }

  countUp(); // Run once on page load in case counters are already in view

  /* ─────────────────────────────────────────────
   * 15. SOCIAL SHARE — open in popup window
   * ───────────────────────────────────────────── */
  $(".social-share a").on("click", function (e) {
    e.preventDefault();
    var w = 600,
      h = 500;
    window.open(
      $(this).attr("href"),
      "shareWindow",
      "width=" +
      w +
      ",height=" +
      h +
      ",top=" +
      (screen.height / 2 - h / 2) +
      ",left=" +
      (screen.width / 2 - w / 2) +
      ",toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1",
    );
  });

  /* ─────────────────────────────────────────────
   * 16. TABS — switch panels + lazy counter trigger
   * ───────────────────────────────────────────── */
  var $tabButtons = $(".tab-wrapper ul li");
  var $tabContents = $(".tabWrapper");

  // Animate counters inside a newly visible tab panel
  function triggerNewCounters($container) {
    $container.find('.counter:not([ended="true"])').each(function () {
      var $this = $(this);
      $this.attr("ended", "true");
      $({ n: 0 }).animate(
        { n: +$this.attr("data-count") },
        {
          duration: 2500,
          easing: "swing",
          step: function () {
            $this.text(Math.floor(this.n));
          },
          complete: function () {
            $this.text(this.n);
          },
        },
      );
    });
  }

  $tabButtons.on("click", function () {
    var idx = $(this).index();
    $tabButtons.removeClass("active");
    $tabContents.removeClass("active").addClass("hidden");
    $(this).addClass("active");
    var $active = $tabContents.eq(idx).addClass("active").removeClass("hidden");
    setTimeout(function () {
      triggerNewCounters($active);
    }, 100);
  });

  /* ─────────────────────────────────────────────
   * 17. SWIPER — Timeline & Case Study sliders
   * ───────────────────────────────────────────── */
  if ($(".timelineSlider").length) {
    new Swiper(".timelineSlider", {
      effect: "fade",
      fadeEffect: { crossFade: true },
      speed: 600,
      pagination: {
        el: ".timeline-pagination",
        clickable: true,
        renderBullet: function (i, cls) {
          var n = i + 1;
          return (
            '<span class="' + cls + '">' + (n < 10 ? "0" + n : n) + "</span>"
          );
        },
      },
      navigation: {
        nextEl: ".timelineSlider-next",
        prevEl: ".timelineSlider-prev",
      },
    });
  }

  if ($(".caseStudySwiper").length) {
    new Swiper(".caseStudySwiper", {
      loop: true,
      effect: "fade",
      fadeEffect: { crossFade: true },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: { el: ".swiper-pagination", clickable: true },
    });
  }

  /* ─────────────────────────────────────────────
   * 18. PARALLAX — cursor-driven image movement
   *     Requires: .parallaxImage (wrapper), .showcase-img (target)
   * ───────────────────────────────────────────── */
  if ($(".parallaxImage").length) {
    // Move child .showcase-img based on cursor offset from container center
    function parallaxIt($wrapper, $target, movement) {
      var rect = $wrapper[0].getBoundingClientRect();
      var mouseX = 0,
        mouseY = 0;

      // Get cursor position relative to wrapper center
      mouseX = parseFloat($wrapper.data("mouseX")) || 0;
      mouseY = parseFloat($wrapper.data("mouseY")) || 0;

      gsap.to($target, {
        duration: 0.5,
        ease: "power2.out",
        x: ((mouseX - (rect.left + rect.width / 2)) / rect.width) * movement,
        y: ((mouseY - (rect.top + rect.height / 2)) / rect.height) * movement,
      });
    }

    $(".parallaxImage").on("mousemove", function (e) {
      // Store mouse position on the wrapper element itself
      $(this).data("mouseX", e.clientX);
      $(this).data("mouseY", e.clientY);
      parallaxIt($(this), $(this).find(".showcase-img"), -30);
    });

    // Reset image position smoothly when cursor leaves
    $(".parallaxImage").on("mouseleave", function () {
      gsap.to($(this).find(".showcase-img"), {
        duration: 0.5,
        ease: "power2.out",
        x: 0,
        y: 0,
      });
    });
  }

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

/* ─────────────────────────────────────────────
 * 20. OUTSIDE DOM READY — GSAP / Swiper responsive
 * ───────────────────────────────────────────── */
if (window.innerWidth > 786) {
  // Staggered vertical parallax on work items during scroll
  gsap.utils.toArray(".work-item").forEach(function (item, i) {
    var offset = (i + 1) * 100;
    gsap.fromTo(
      item,
      { y: offset },
      {
        y: 0,
        ease: "none",
        scrollTrigger: {
          trigger: ".work-section",
          start: "top 60%", // start animation slightly later
          end: "center center", // lock when section center meets screen center
          scrub: true,
        },
      },
    );
  });
} else {
  // Mobile fallback — image gallery as auto-playing swiper
  if (document.querySelector(".imageGallerySlider")) {
    new Swiper(".imageGallerySlider", {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 8,
      speed: 500,
      centeredSlides: true,
      autoplay: { delay: 2000, disableOnInteraction: false },
    });
  }
}
