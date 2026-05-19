<?php
// Anchor and class setup...
$anchor = !empty($block['anchor']) ? ' id="' . esc_attr($block['anchor']) . '"' : ' id="' . $block['id'] . '"';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

// preview image for block editor
$preview_name = explode("/", $block['name']);
if (!empty($is_preview)) {
  echo '<img src="' . get_template_directory_uri() . '/preview-block-img/' . $preview_name[1] . '.png" />';
  return;
}

$show_products = get_field('show_products'); ?>




<section class="pb-[50px] md:py-22.25 <?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?>>
  <div class="holder holder-alt">
    <div class="max-w-[675px]" data-scroll="">
      <?php if ($block_title = get_field('block_title')) : ?>
        <h2 class="textGradient text-38 md:text-54 leading-[1.05] md:leading-[1.11] slide-up"><?php echo esc_html($block_title); ?></h2>
      <?php endif; ?>

      <?php if ($description = get_field('description')) : ?>
        <div class="mt-3 md:mt-5 slide-up <?php ksa('[&>p]:text-22 [&>p]:leading-[1.54] [&>p]:md:text-2xl [&>p]:md:leading-[1.5]') ?>">
          <?php echo wpautop($description); ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if (have_rows('accordion_items')) : ?>
      <div class="mt-12 accordion-wrapper">
        <div class="accordion">
          <?php while (have_rows('accordion_items')) : the_row(); ?>
            <div class="accordion-item BordercornerShape slide-up" data-scroll="">
              <?php if ($accordion_title = get_sub_field('accordion_title')) : ?>
                <button class="accordion-toggle">
                  <span><?php echo esc_html($accordion_title); ?></span>

                  <?php get_template_part('svgs/plus-border') ?>
                  <?php get_template_part('svgs/minus-border') ?>
                </button>
              <?php endif; ?>

              <div class="accordion-content <?php echo $show_products ? 'accordion-product' : '' ?>">
                <div class="flex md:items-center <?php echo $show_products ? 'gap-16' : 'flex-col gap-12' ?>">
                  <?php if ($show_products) : ?>
                    <?php if ($accordion_details = get_sub_field('accordion_details')) : ?>
                      <div class="<?php ksa("max-w-150.25 space-y-7 [&_h6]:text-base [&_h6]:text-Alloy [&_p]:leading-[1.7]! [&_strong]:text-sm md:[&_strong]:text-base [&_strong]:leading-[28px] [&_strong]:text-Alloy [&_strong]:block [&_ul]:space-y-2 [&_ul_li]:text-sm md:[&_ul_li]:text-base [&_ul_li]:marker:content-['>_'] [&_ul_li]:marker:text-Alloy [&_ul_li]:marker:text-base [&_ul]:list-inside") ?>">
                        <?php echo $accordion_details; ?>
                      </div>
                    <?php endif; ?>

                    <div class="product-item">
                      <?php if ($product_tagline = get_sub_field('product_tagline')) : ?>
                        <p><?php echo esc_html($product_tagline); ?></p>
                      <?php endif; ?>

                      <?php
                      global $post;
                      $posts = get_sub_field('select_products');
                      if ($posts) : ?>
                        <ul>
                          <?php foreach ($posts as $post) :
                            setup_postdata($post); ?>
                            <li>
                              <span class="text-Alloy text-base leading-[175%]">></span>
                              <a href="<?php the_permalink() ?>" class="text-base text-Pearl leading-[28px] underline"><?php the_title() ?></a>
                            </li>
                          <?php endforeach;
                          wp_reset_postdata(); ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  <?php else: ?>

                    <?php if ($accordion_details = get_sub_field('accordion_details')) : ?>
                      <div class="<?php ksa("md:columns-2 [&_h6]:text-base [&_h6]:text-Alloy [&_p]:leading-[1.7]! md:pr-25 md:gap-[108px] space-y-7 [&_strong]:text-sm md:[&_strong]:text-base [&_strong]:leading-[28px] [&_strong]:text-Alloy [&_ul]:space-y-2 [&_strong]:block [&_ul_li]:text-sm md:[&_ul_li]:text-base [&_ul_li]:marker:content-['>_'] [&_ul_li]:marker:text-Alloy [&_ul_li]:marker:text-base [&_ul]:list-inside [&_a]:underline [&_a:hover]:no-underline") ?>">
                        <?php echo $accordion_details; ?>
                      </div>
                    <?php endif; ?>

                    <?php
                    $link = get_sub_field('cta_button');
                    if ($link) :
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';  ?>
                      <div class="md:ml-auto">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn group inline-block">
                          <span class="inline-block relative overflow-hidden">
                            <span class="relative inline-block group-hover:-translate-y-full transition-all duration-300"><?php echo esc_html($link_title); ?></span>
                            <span class="absolute group-hover:bottom-0 left-0 -bottom-full transition-all duration-300"><?php echo esc_html($link_title); ?></span>
                          </span>
                        </a>
                      </div>
                    <?php endif; ?>

                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>