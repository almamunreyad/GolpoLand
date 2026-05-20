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
$show_slider = !empty(get_field('show_slider'));
$background  = get_field('background') ?: 'white';
$cta_link    = get_field('cta_link');
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
$container_class = $show_slider ? 'swiper categories-books-swiper' : 'books-grid';
$item_class      = $show_slider ? 'swiper-slide book-item' : 'book-item';
?>

<section class="<?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?>>
  <div class="holder">

    <?php if ($block_title) : ?>
      <h2 class="block-title"><?php echo esc_html($block_title); ?></h2>
    <?php endif; ?>

    <?php foreach ($groups as $group) : ?>

      <?php if ($group['cat']) : ?>
        <div class="category-group">
          <h3 class="category-title"><?php echo esc_html($group['cat']->name); ?></h3>
        <?php endif; ?>

        <div class="<?php echo esc_attr($container_class); ?>">
          <?php if ($show_slider) : ?><div class="swiper-wrapper"><?php endif; ?>

            <?php foreach ($group['posts'] as $post_id) :
              $permalink = get_permalink($post_id);
              $title     = get_the_title($post_id);
            ?>
              <div class="<?php echo esc_attr($item_class); ?>">
                <?php if (has_post_thumbnail($post_id)) : ?>
                  <a class="bookCover" href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>">
                    <?php echo get_the_post_thumbnail($post_id, 'medium'); ?>
                  </a>
                <?php endif; ?>
                <h4 class="book-title">
                  <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
                </h4>
              </div>
            <?php endforeach; ?>

            <?php if ($show_slider) : ?>
            </div>
            <div class="swiper-pagination"></div><?php endif; ?>
        </div>

        <?php if ($group['cat']) : ?>
          <a href="<?php echo esc_url(get_category_link($group['cat_id'])); ?>" class="view-all-link">
            View All <?php echo esc_html($group['cat']->name); ?>
          </a>
        </div>
      <?php endif; ?>

    <?php endforeach; ?>

    <?php if ($cta_link) : ?>
      <div class="cta-wrap">
        <a href="<?php echo esc_url($cta_link['url']); ?>"
          class="cta-link"
          <?php if (!empty($cta_link['target'])) echo 'target="' . esc_attr($cta_link['target']) . '"'; ?>>
          <?php echo esc_html($cta_link['title']); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>