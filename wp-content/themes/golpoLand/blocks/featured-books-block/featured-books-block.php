<?php
$anchor = !empty($block['anchor']) ? ' id="' . esc_attr($block['anchor']) . '"' : ' id="' . $block['id'] . '"';

$class_name = 'featured-books-block';
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

// ── Resolve which posts to show ──────────────────────────────────
global $post;
$source = get_field('book_source') ?: 'manual';
$posts  = [];

if ($source === 'manual') {

  $posts = get_field('manual_books') ?: [];
} elseif ($source === 'automatic') {

  $posts = get_posts(array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ));
}
?>

<section class="books-section <?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?> aria-label="Books showcase">
  <div class="holder">

    <?php if (!empty($posts)) : ?>
      <div class="swiper book-swiper">
        <div class="swiper-wrapper">

          <?php foreach ($posts as $post) :
            $featured_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/_/images/placeholder.png'; ?>
            <div class="swiper-slide">
              <a href="<?php the_permalink(); ?>" class="book-card" aria-label="<?php echo esc_attr(the_title()); ?>">
                <?php if ($featured_img) : ?>
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                <?php endif; ?>
              </a>
            </div>
          <?php endforeach; ?>

        </div>

        <div class="swiper-pagination"></div>
      </div>
    <?php endif; ?>

  </div>
</section>