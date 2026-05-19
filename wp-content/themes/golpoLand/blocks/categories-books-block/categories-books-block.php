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

$block_title  = get_field('block_title');
$show_slider  = !empty(get_field('show_slider'));
$background   = get_field('background') ?: 'white';
$cta_link     = get_field('cta_link');
$source       = get_field('book_source') ?: 'manual';

$class_name .= ' bg-' . $background;
?>

<section class="<?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?>>
  <div class="holder">

    <?php if ($block_title) : ?>
      <h2 class="block-title"><?php echo esc_html($block_title); ?></h2>
    <?php endif; ?>

    <?php if ($source === 'manual') :
      $posts = get_field('manual_books') ?: [];
    ?>

      <?php if (!empty($posts)) : ?>

        <?php if ($show_slider) : ?>
          <div class="swiper categories-books-swiper">
            <div class="swiper-wrapper">
              <?php foreach ($posts as $post) :
                $post_id   = is_object($post) ? $post->ID : $post;
                $permalink = get_permalink($post_id);
                $title     = get_the_title($post_id);
                $thumb_id  = get_post_thumbnail_id($post_id);
                $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'medium') : '';
              ?>
                <div class="swiper-slide">
                  <div class="book-item">
                    <a class="bookCover" href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>">
                      <?php if ($thumb_url) : ?>
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                      <?php endif; ?>
                    </a>
                    <h4 class="book-title">
                      <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
                    </h4>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="swiper-pagination"></div>
          </div>

        <?php else : ?>
          <div class="books-grid">
            <?php foreach ($posts as $post) :
              $post_id   = is_object($post) ? $post->ID : $post;
              $permalink = get_permalink($post_id);
              $title     = get_the_title($post_id);
              $thumb_id  = get_post_thumbnail_id($post_id);
              $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'medium') : '';
            ?>
              <div class="book-item">
                <a class="bookCover" href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>">
                  <?php if ($thumb_url) : ?>
                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                  <?php endif; ?>
                </a>
                <h4 class="book-title">
                  <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
                </h4>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>

    <?php else :
      $category_ids = get_field('book_categories') ?: [];
    ?>

      <?php if (!empty($category_ids)) : ?>
        <?php foreach ($category_ids as $cat_id) :
          $category = get_term($cat_id, 'category');
          if (!$category || is_wp_error($category)) continue;

          $books = get_posts([
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'tax_query'      => [[
              'taxonomy' => 'category',
              'field'    => 'term_id',
              'terms'    => $cat_id,
            ]],
          ]);

          if (empty($books)) continue;
        ?>
          <div class="category-group">
            <h3 class="category-title"><?php echo esc_html($category->name); ?></h3>

            <?php if ($show_slider) : ?>
              <div class="swiper categories-books-swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($books as $book) : ?>
                    <div class="swiper-slide">
                      <div class="book-item">
                        <?php if (has_post_thumbnail($book->ID)) : ?>
                          <a class="bookCover" href="<?php echo esc_url(get_permalink($book->ID)); ?>">
                            <?php echo get_the_post_thumbnail($book->ID, 'medium'); ?>
                          </a>
                        <?php endif; ?>
                        <h4 class="book-title">
                          <a href="<?php echo esc_url(get_permalink($book->ID)); ?>"><?php echo esc_html($book->post_title); ?></a>
                        </h4>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
              </div>

            <?php else : ?>
              <div class="books-grid">
                <?php foreach ($books as $book) : ?>
                  <div class="book-item">
                    <?php if (has_post_thumbnail($book->ID)) : ?>
                      <a href="<?php echo esc_url(get_permalink($book->ID)); ?>">
                        <?php echo get_the_post_thumbnail($book->ID, 'medium'); ?>
                      </a>
                    <?php endif; ?>
                    <h4 class="book-title">
                      <a href="<?php echo esc_url(get_permalink($book->ID)); ?>"><?php echo esc_html($book->post_title); ?></a>
                    </h4>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="view-all-link">
              View All <?php echo esc_html($category->name); ?>
            </a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    <?php endif; ?>

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