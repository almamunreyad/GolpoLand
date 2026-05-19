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
$source = get_field('book_source') ?: 'manual';
$posts  = [];

if ($source === 'manual') {

  $posts = get_field('manual_books') ?: [];
} else {

  $category_ids = get_field('book_categories') ?: [];

  if (!empty($category_ids)) {
    $posts = get_posts(array(
      'post_type'      => 'post',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'tax_query'      => array(
        array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => $category_ids,
        ),
      ),
    ));
  }
}
?>

<section class="<?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?>>
  <div class="holder">

    <?php if (!empty($posts)) : ?>
      <div class="swiper featured-books-swiper">
        <div class="swiper-wrapper">

          <?php foreach ($posts as $post) :
            $post_id    = is_object($post) ? $post->ID : $post;
            $permalink  = get_permalink($post_id);
            $title      = get_the_title($post_id);
            $thumb_id   = get_post_thumbnail_id($post_id);
            $thumb_url  = $thumb_id
              ? wp_get_attachment_image_url($thumb_id, 'large')
              : '';
          ?>
            <div class="swiper-slide">
              <a class="bookCover" href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>">
                <?php if ($thumb_url) : ?>
                  <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
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