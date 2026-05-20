<?php
$anchor = !empty($block['anchor']) ? ' id="' . esc_attr($block['anchor']) . '"' : ' id="' . $block['id'] . '"';

$class_name = 'categories-books-block';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

$preview_name = explode('/', $block['name']);
if (!empty($is_preview)) {
  echo '<img src="' . get_template_directory_uri() . '/preview-block-img/' . $preview_name[1] . '.png" />';
  return;
}

$block_title = get_field('block_title');
$show_cta    = !empty(get_field('show_slider'));
$background  = get_field('background') ?: 'white';
$source      = get_field('book_source') ?: 'manual';

$class_name .= ' bg-' . $background;

// Normalize data into groups regardless of source
$groups = [];

if ($source === 'manual') {
  $raw      = get_field('manual_books') ?: [];
  $post_ids = array_map(fn($p) => is_object($p) ? $p->ID : $p, $raw);
  if (!empty($post_ids)) {
    $groups[] = ['posts' => $post_ids, 'cat' => null, 'cat_id' => null];
  }
} else {
  foreach (get_field('book_categories') ?: [] as $cat_id) {
    $category = get_term($cat_id, 'category');
    if (!$category || is_wp_error($category)) continue;
    $books = get_posts([
      'post_type'      => 'post',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'fields'         => 'ids',
      'tax_query'      => [[
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $cat_id,
      ]],
    ]);
    if (!empty($books)) {
      $groups[] = ['posts' => $books, 'cat' => $category, 'cat_id' => $cat_id];
    }
  }
}

// Class names differ by mode — markup stays the same
$container_class = $show_cta ? 'swiper categories-books-swiper' : 'books-grid';
$item_class      = $show_cta ? 'swiper-slide book-item' : 'book-item';
?>

<section class="books-section <?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?> aria-label="Books showcase">
  <div class="holder">
    <div class="section-header">
      <?php if ($block_title) : ?>
        <h2 class="section-title"><?php echo esc_html($block_title); ?></h2>
      <?php endif; ?>

      <?php if ($show_cta) :
        $cat_link = ($source === 'from_category' && !empty($groups))
          ? get_term_link($groups[0]['cat_id'], 'category')
          : '#'; ?>
        <a href="<?php echo esc_url($cat_link); ?>" class="btn btn-ghost btn-sm">
          View all
          <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </a>
      <?php endif; ?>
    </div>

    <div class="swiper book-category-swiper">
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