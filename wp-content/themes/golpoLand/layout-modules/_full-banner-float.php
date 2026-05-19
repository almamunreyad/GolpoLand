<?php
// $banner_type = get_field('banner_type');
$media_type = get_field('media_type');
$banner_image = get_field('banner_image');
$image_url = $banner_image ? esc_url($banner_image) : esc_url(get_template_directory_uri() . '/_/images/placeholder.png');

$banner_mobile = get_field('banner_image_mobile');
$banner_mobile_url = $banner_mobile ? esc_url($banner_mobile) : ''; ?>



<section class="relative flex  justify-between items-end pb-4 md:py-21 min-h-[100svh] parallaxImage">
  <div class="absolute inset-0 flex items-center justify-center ">
    <?php if ($media_type == 'banner_video') :
      require get_template_directory() . '/layout-modules/_video-banner.php';

    elseif ($media_type == 'banner_image') : ?>
      <div class="showcase-img w-full h-full absolute left-0 top-0 flex items-center justify-center">
        <?php if (wp_is_mobile() && $banner_mobile_url) : ?>
          <img class="max-w-113 lg:max-w-218.75 w-full h-full object-contain" src="<?php echo $banner_mobile_url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">

        <?php elseif ($image_url) : ?>
          <img class="max-w-113 lg:max-w-218.75 w-full h-full object-contain max-md:-mt-25" src="<?php echo $image_url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($banner_title = get_field('banner_title')) : ?>
    <div class="absolute inset-0 flex items-center justify-center max-md:pb-25">
      <<?php echo is_front_page() ? 'h2' : 'h1'; ?> class="textGradient text-70 lg:text-108 leading-[0.9]! md:leading-[1.08]! text-center">
        <?php echo esc_html($banner_title); ?>
      </<?php echo is_front_page() ? 'h2' : 'h1'; ?>>
    </div>
  <?php endif; ?>

  <div class="holder relative z-20">
    <div class="flex justify-between items-end">
      <div class=" space-y-5 lg:space-y-4">
        <?php if ($banner_tagline = get_field('banner_tagline')) : ?>
          <h3 class="max-w-[242px] lg:max-w-117.25 text-Alloy text-13 font-monospace leading-[1.23] lg:leading-[1.48] tracking-[1.3px] bordered-title"><?php echo esc_html($banner_tagline); ?></h3>
        <?php endif; ?>


        <?php if ($description = get_field('description')) : ?>
          <div class="max-w-[360px] lg:max-w-117.25 [&>p]:text-sm [&>p]:leading-[1.57]">
            <?php echo wpautop($description); ?>
          </div>
        <?php endif; ?>
      </div>

      <span class="flex items-center pb-0.75 gap-3 text-13 font-monospace leading-[1.48] tracking-[1.3px] [&>svg]:animate-[floatUpDown_2s_ease-in-out_infinite]">
        <span class="hidden lg:flex">SCROLL TO EXPLORE </span>

        <?php get_template_part('svgs/bottom-arrow') ?>
      </span>
    </div>
  </div>
</section>