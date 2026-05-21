<?php

if (have_posts()) : while (have_posts()) : the_post();

    // ── Reader view ──────────────────────────────────────────────────────────────
    if (isset($_GET['reader'])) :
      $pages = get_field('book_pages') ?: [];
      $title = get_the_title();
?>
      <!doctype html>
      <html <?php language_attributes(); ?>>

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo esc_html($title); ?> — Read</title>
        <?php wp_head(); ?>
        <style>
          * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
          }

          body {
            background: #1a1a2e;
            color: #e2e8f0;
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
          }

          .reader-header {
            background: rgba(26, 26, 46, .95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
          }

          .reader-header-title {
            font-size: 15px;
            font-weight: 600;
            color: #e2e8f0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 60vw;
          }

          .reader-progress-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #94a3b8;
          }

          .reader-progress-bar {
            width: 120px;
            height: 4px;
            background: rgba(255, 255, 255, .12);
            border-radius: 2px;
            overflow: hidden;
          }

          .reader-progress-fill {
            height: 100%;
            background: #7c3aed;
            border-radius: 2px;
            transition: width .3s ease;
          }

          .reader-close {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, .15);
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
          }

          .reader-close:hover {
            border-color: rgba(255, 255, 255, .3);
            color: #e2e8f0;
          }

          .reader-header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
          }

          .audio-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, .15);
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            position: relative;
          }

          .audio-btn:hover {
            border-color: rgba(255, 255, 255, .3);
            color: #e2e8f0;
          }

          .audio-btn.speaking {
            border-color: #7c3aed;
            color: #a78bfa;
          }

          .audio-btn.speaking::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px solid #7c3aed;
            opacity: .5;
            animation: pulse-ring 1.4s ease-out infinite;
          }

          @keyframes pulse-ring {
            0% {
              transform: scale(1);
              opacity: .5;
            }

            100% {
              transform: scale(1.5);
              opacity: 0;
            }
          }

          .reader-stage {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
          }

          .reader-page {
            display: none;
            width: 100%;
            max-width: 820px;
            animation: fadeIn .35s ease;
          }

          .reader-page.active {
            display: flex;
            flex-direction: column;
            gap: 28px;
          }

          @media (min-width: 640px) {
            .reader-page.active {
              flex-direction: row;
              align-items: flex-start;
              gap: 40px;
            }
          }

          .reader-img-wrap {
            flex-shrink: 0;
            width: 100%;
            max-width: 340px;
            margin: 0 auto;
          }

          @media (min-width: 640px) {
            .reader-img-wrap {
              width: 45%;
              margin: 0;
            }
          }

          .reader-img-wrap img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .5);
          }

          .reader-text-wrap {
            flex: 1;
            display: flex;
            align-items: center;
          }

          .reader-text {
            font-size: clamp(16px, 2.2vw, 22px);
            line-height: 1.8;
            color: #e2e8f0;
            font-weight: 400;
            white-space: pre-wrap;
          }

          .reader-cover {
            width: 100%;
            max-width: 820px;
            text-align: center;
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 20px;
          }

          .reader-cover.active {
            display: flex;
          }

          .reader-cover img {
            max-width: 240px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .5);
          }

          .reader-cover h1 {
            font-size: clamp(22px, 4vw, 36px);
            font-weight: 800;
            color: #f1f5f9;
            line-height: 1.15;
          }

          .reader-cover-start {
            margin-top: 8px;
            padding: 10px 28px;
            background: #7c3aed;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
          }

          .reader-cover-start:hover {
            background: #6d28d9;
          }

          .reader-nav {
            background: rgba(26, 26, 46, .95);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, .08);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
          }

          .reader-btn {
            display: inline-flex;
            align-items: center;
            gap-8px;
            gap: 8px;
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            border: 1px solid rgba(255, 255, 255, .15);
            background: transparent;
            color: #94a3b8;
          }

          .reader-btn:hover:not(:disabled) {
            border-color: rgba(255, 255, 255, .3);
            color: #e2e8f0;
          }

          .reader-btn:disabled {
            opacity: 0;
            pointer-events: none;
          }

          .reader-btn-next {
            background: #7c3aed;
            border-color: #7c3aed;
            color: #fff;
          }

          .reader-btn-next:hover:not(:disabled) {
            background: #6d28d9;
            border-color: #6d28d9;
            color: #fff;
          }

          .reader-page-num {
            font-size: 13px;
            color: #64748b;
          }

          @keyframes fadeIn {
            from {
              opacity: 0;
              transform: translateY(8px);
            }

            to {
              opacity: 1;
              transform: translateY(0);
            }
          }
        </style>
      </head>

      <body>

        <!-- Header -->
        <header class="reader-header">
          <span class="reader-header-title"><?php echo esc_html($title); ?></span>
          <div class="reader-progress-wrap">
            <div class="reader-progress-bar">
              <div class="reader-progress-fill" id="progressFill" style="width:0%"></div>
            </div>
            <span id="progressLabel">Cover</span>
          </div>
          <div class="reader-header-actions">
            <!-- Audio toggle -->
            <button class="audio-btn" id="audioBtn" aria-label="Toggle audio">
              <svg id="iconSpeak" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5" />
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07" />
                <path d="M19.07 4.93a10 10 0 0 1 0 14.14" />
              </svg>
              <svg id="iconMute" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5" />
                <line x1="23" y1="9" x2="17" y2="15" />
                <line x1="17" y1="9" x2="23" y2="15" />
              </svg>
            </button>
            <!-- Close -->
            <button class="reader-close" onclick="window.speechSynthesis.cancel();window.close()" aria-label="Close reader">
              <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path d="M18 6L6 18M6 6l12 12" />
              </svg>
            </button>
          </div>
        </header>

        <!-- Stage -->
        <main class="reader-stage" id="readerStage">

          <!-- Cover slide -->
          <div class="reader-cover active" id="slide-0">
            <?php $cover = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <?php if ($cover) : ?>
              <img src="<?php echo esc_url($cover); ?>" alt="<?php echo esc_attr($title); ?>" />
            <?php endif; ?>
            <h1><?php echo esc_html($title); ?></h1>
            <?php if (!empty($pages)) : ?>
              <button class="reader-cover-start" id="startBtn">Start Reading &rarr;</button>
            <?php else : ?>
              <p style="color:#64748b;font-size:14px;">No pages added yet.</p>
            <?php endif; ?>
          </div>

          <!-- Book pages -->
          <?php if (!empty($pages)) : ?>
            <?php foreach ($pages as $i => $page) :
              $img  = $page['page_image'];
              $text = $page['page_text'];
            ?>
              <div class="reader-page" id="slide-<?php echo $i + 1; ?>">
                <?php if ($img) : ?>
                  <div class="reader-img-wrap">
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?: 'Page ' . ($i + 1)); ?>" />
                  </div>
                <?php endif; ?>

                <?php if ($text) : ?>
                  <div class="reader-text-wrap">
                    <p class="reader-text"><?php echo esc_html($text); ?></p>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </main>

        <!-- Nav -->
        <nav class="reader-nav" aria-label="Page navigation">
          <button class="reader-btn reader-btn-prev" id="prevBtn" disabled>
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path d="M15 18l-6-6 6-6" />
            </svg>
            Previous
          </button>
          <span class="reader-page-num" id="pageNum"></span>
          <button class="reader-btn reader-btn-next" id="nextBtn">
            Next
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path d="M9 18l6-6-6-6" />
            </svg>
          </button>
        </nav>

        <script>
          (function() {
            const total  = <?php echo count($pages); ?>;
            const texts  = <?php
              $texts = array_map(fn($p) => $p['page_text'] ?? '', $pages);
              echo json_encode(array_values($texts), JSON_UNESCAPED_UNICODE);
            ?>;
            const slides = document.querySelectorAll('[id^="slide-"]');
            let current  = 0;
            let audioOn  = true;

            const prevBtn       = document.getElementById('prevBtn');
            const nextBtn       = document.getElementById('nextBtn');
            const startBtn      = document.getElementById('startBtn');
            const pageNum       = document.getElementById('pageNum');
            const progressFill  = document.getElementById('progressFill');
            const progressLabel = document.getElementById('progressLabel');
            const audioBtn      = document.getElementById('audioBtn');
            const iconSpeak     = document.getElementById('iconSpeak');
            const iconMute      = document.getElementById('iconMute');

            // ── TTS ────────────────────────────────────────────────────
            const synth = window.speechSynthesis;

            function speak(text) {
              if (!synth || !audioOn || !text) return;
              synth.cancel();
              const utt  = new SpeechSynthesisUtterance(text);
              utt.lang   = document.documentElement.lang || 'en-US';
              utt.rate   = 0.92;
              utt.pitch  = 1;
              utt.onstart = () => audioBtn.classList.add('speaking');
              utt.onend   = () => {
                audioBtn.classList.remove('speaking');
                if (current < total) goTo(current + 1);
              };
              utt.onerror = () => audioBtn.classList.remove('speaking');
              synth.speak(utt);
            }

            function stopSpeech() {
              if (synth) synth.cancel();
              audioBtn.classList.remove('speaking');
            }

            // ── Audio toggle ───────────────────────────────────────────
            audioBtn.addEventListener('click', function() {
              audioOn = !audioOn;
              iconSpeak.style.display = audioOn  ? '' : 'none';
              iconMute.style.display  = !audioOn ? '' : 'none';
              if (!audioOn) {
                stopSpeech();
              } else if (current > 0) {
                speak(texts[current - 1]);
              }
            });

            // ── Navigation ─────────────────────────────────────────────
            function goTo(index) {
              slides[current].classList.remove('active');
              current = index;
              slides[current].classList.add('active');

              prevBtn.disabled = current === 0;
              nextBtn.disabled = current === total;

              if (current === 0) {
                pageNum.textContent = '';
                progressFill.style.width = '0%';
                progressLabel.textContent = 'Cover';
                stopSpeech();
              } else {
                pageNum.textContent = 'Page ' + current + ' of ' + total;
                const pct = Math.round((current / total) * 100);
                progressFill.style.width = pct + '%';
                progressLabel.textContent = pct + '%';
                speak(texts[current - 1]);
              }

              window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            if (startBtn) startBtn.addEventListener('click', () => goTo(1));
            prevBtn.addEventListener('click', () => { if (current > 0) goTo(current - 1); });
            nextBtn.addEventListener('click', () => { if (current < total) goTo(current + 1); });

            document.addEventListener('keydown', function(e) {
              if (e.key === 'ArrowRight' || e.key === 'ArrowDown') { if (current < total) goTo(current + 1); }
              if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')   { if (current > 0)     goTo(current - 1); }
            });

            window.addEventListener('beforeunload', stopSpeech);

            goTo(0);
          })();
        </script>

        <?php wp_footer(); ?>
      </body>

      </html>

    <?php
      // Stop here — don't render the normal page layout
      return;
    endif;

    // ── Normal book-detail view ──────────────────────────────────────────────────
    get_header();

    $book_pages = get_field('book_pages') ?: [];
    $all_text   = implode(' ', array_map(fn($p) => $p['page_text'] ?? '', $book_pages));
    $word_count = $all_text ? str_word_count(strip_tags($all_text)) : 0;
    $image_count = count(array_filter($book_pages, fn($p) => !empty($p['page_image'])));
    $written_by     = get_field('written_by');
    $illustrated_by = get_field('illustrated_by');
    $categories     = get_the_category();
    $featured_img   = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $excerpt        = get_the_excerpt();
    $reader_url     = add_query_arg('reader', '1', get_permalink());
    ?>

    <section class="py-10 md:py-16" aria-label="Book detail">
      <div class="holder">
        <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-8 md:gap-12 items-start">

          <!-- ── Left: Book Cover ── -->
          <?php if ($featured_img) : ?>
            <div class="flex justify-center md:justify-start">
              <div class="w-[200px] md:w-[260px] shrink-0">
                <img
                  src="<?php echo esc_url($featured_img); ?>"
                  alt="<?php echo esc_attr(get_the_title()); ?>"
                  class="w-full h-auto rounded-[10px] shadow-[0_12px_40px_rgba(0,0,0,.18)]" />
              </div>
            </div>
          <?php endif; ?>

          <!-- ── Right: Book Info ── -->
          <div class="flex flex-col gap-4">

            <!-- Title -->
            <h1 class="font-display font-extrabold text-slate-900 text-[1.9rem] md:text-[2.4rem] leading-[1.1] tracking-[-0.03em]">
              <?php the_title(); ?>
            </h1>

            <!-- Category -->
            <?php if (!empty($categories)) : ?>
              <div class="flex flex-wrap gap-2">
                <?php foreach ($categories as $cat) : ?>
                  <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="text-[15px] font-semibold text-[#7c3aed] hover:text-[#6d28d9] transition-colors">
                    <?php echo esc_html($cat->name); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Stats + Actions row -->
            <div class="flex flex-wrap items-center gap-3">

              <!-- Stats badges -->
              <div class="flex items-center gap-2">
                <?php if ($word_count) : ?>
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-100 border border-slate-200 text-[13px] font-medium text-slate-600">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <circle cx="12" cy="12" r="10" />
                      <polyline points="12 6 12 12 16 14" />
                    </svg>
                    <?php echo number_format($word_count); ?> words
                  </span>
                <?php endif; ?>

                <?php if ($image_count) : ?>
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-100 border border-slate-200 text-[13px] font-medium text-slate-600">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <rect x="3" y="3" width="18" height="18" rx="2" />
                      <circle cx="8.5" cy="8.5" r="1.5" />
                      <polyline points="21 15 16 10 5 21" />
                    </svg>
                    <?php echo intval($image_count); ?> images
                  </span>
                <?php endif; ?>
              </div>

              <!-- Action buttons -->
              <div class="flex items-center gap-2 ml-auto">
                <!-- Share -->
                <button
                  type="button"
                  class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:border-slate-300 hover:text-slate-700 transition"
                  aria-label="Share this book"
                  onclick="if(navigator.share){navigator.share({title:'<?php echo esc_js(get_the_title()); ?>',url:window.location.href})}else{navigator.clipboard.writeText(window.location.href)}">
                  <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="18" cy="5" r="3" />
                    <circle cx="6" cy="12" r="3" />
                    <circle cx="18" cy="19" r="3" />
                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />
                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" />
                  </svg>
                </button>

                <!-- Like -->
                <button
                  type="button"
                  class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:border-rose-300 hover:text-rose-500 transition"
                  aria-label="Like this book">
                  <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                  </svg>
                </button>

                <!-- Read -->
                <a href="<?php echo esc_url($reader_url); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-5 py-2 rounded-lg bg-[#7c3aed] hover:bg-[#6d28d9] text-white font-semibold text-[14px] transition-colors">
                  Read
                </a>
              </div>
            </div>

            <!-- Divider -->
            <hr class="border-slate-200 my-1" />

            <!-- Description -->
            <?php if ($excerpt) : ?>
              <div class="text-[15px] leading-[1.75] text-slate-600 max-w-[600px]">
                <?php echo wp_kses_post($excerpt); ?>
              </div>
            <?php endif; ?>

            <!-- Author / Illustrator -->
            <div class="flex flex-col gap-3 pt-1">
              <?php if ($written_by) : ?>
                <div>
                  <p class="text-[13px] text-slate-400 font-medium mb-0.5">Written by</p>
                  <p class="text-[15px] font-semibold text-[#7c3aed]"><?php echo esc_html($written_by); ?></p>
                </div>
              <?php endif; ?>

              <?php if ($illustrated_by) : ?>
                <div>
                  <p class="text-[13px] text-slate-400 font-medium mb-0.5">Illustrated by</p>
                  <p class="text-[15px] font-semibold text-[#7c3aed]"><?php echo esc_html($illustrated_by); ?></p>
                </div>
              <?php endif; ?>
            </div>

          </div>
          <!-- End Right -->

        </div>
      </div>
    </section>

<?php
    get_footer();

  endwhile;
endif;
