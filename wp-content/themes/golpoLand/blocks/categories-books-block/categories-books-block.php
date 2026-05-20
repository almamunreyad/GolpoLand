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
      'posts_per_page' => 12,
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
?>

<section class="books-section <?php echo $background == 'white' ? '' : ' bg-[#f2f2f2]' ?> <?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?> aria-label="Books showcase">
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
          <?php get_template_part('svgs/right-arrow'); ?>
        </a>
      <?php endif; ?>
    </div>

    <div class="swiper book-category-swiper overflow-hidden!">
      <div class="swiper-wrapper">
        <?php foreach ($groups as $group) :
          foreach ($group['posts'] as $post_id) :
            $featured_img = has_post_thumbnail($post_id)
              ? get_the_post_thumbnail_url($post_id, 'full')
              : get_template_directory_uri() . '/_/images/placeholder.png';
        ?>
            <div class="swiper-slide">
              <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="book-card" aria-label="<?php echo esc_attr(get_the_title($post_id)); ?>">
                <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>" loading="lazy" />
              </a>
            </div>
        <?php endforeach;
        endforeach; ?>
      </div>

      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>