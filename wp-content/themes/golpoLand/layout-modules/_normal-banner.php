<?php
// $banner_type = get_field('banner_type');
$media_type = get_field('media_type');
$banner_image = get_field('banner_image');
$image_url = $banner_image ? esc_url($banner_image) : esc_url(get_template_directory_uri() . '/_/images/placeholder.png');

$banner_mobile = get_field('banner_image_mobile');
$banner_mobile_url = $banner_mobile ? esc_url($banner_mobile) : ''; ?>


<section class="lg:min-h-[calc(100vh-98px)] normalBanner max-md:pt-10">
  <div class="holder">
    <div class="flex max-lg:flex-col-reverse max-lg:justify-end lg:items-end  relative lg:h-[calc(100vh-98px)] w-full lg:after:content-[''] lg:after:absolute lg:after:inset-0 lg:after:bg-[linear-gradient(180deg,rgba(0,0,0,0.00)_13.99%,rgba(0,0,0,0.90)_100%)] lg:after:pointer-events-none">
      <?php if ($media_type == 'banner_video') :
        require get_template_directory() . '/layout-modules/_video-banner.php';

      elseif ($media_type == 'banner_image') :
        if (wp_is_mobile() && $banner_mobile_url) : ?>
          <img class="lg:absolute lg:inset-0 w-full max-lg:max-h-89.5 lg:h-full object-cover" src="<?php echo $banner_mobile_url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">

        <?php elseif ($image_url) : ?>
          <img class="lg:absolute lg:inset-0 w-full max-lg:max-h-89.5 lg:h-full object-cover min-[1512px]:object-top" src="<?php echo $image_url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
      <?php endif;
      endif; ?>

      <div class="flex max-lg:flex-col lg:items-end relative w-full z-10 lg:pl-11">
        <?php if ($banner_title = get_field('banner_title')) : ?>
          <<?php echo is_front_page() ? 'h2' : 'h1'; ?> class="pb-5 textGradient font-normal text-[44px] lg:text-70 max-w-[392px] leading-none! lg:leading-[1.05]!">
            <?php echo esc_html($banner_title); ?>
          </<?php echo is_front_page() ? 'h2' : 'h1'; ?>>
        <?php endif; ?>

        <div class="lg:bg-Kraken min-h-39.5 lg:ml-auto w-full lg:max-w-210 xl:max-w-232 flex max-lg:flex-col items-end max-lg:mt-5">
          <div class="flex max-lg:flex-col items-start justify-between w-full lg:pb-5 lg:pl-10 lg:pr-7 max-lg:space-y-5">
            <?php if ($banner_tagline = get_field('banner_tagline')) : ?>
              <h3 class="text-Alloy text-13 font-monospace leading-[1.23] lg:leading-[1.48] tracking-[1.3px] bordered-title"><?php echo esc_html($banner_tagline); ?></h3>
            <?php endif; ?>

            <?php if ($description = get_field('description')) : ?>
              <div class="lg:ml-auto w-full max-w-97.5 [&>p]:text-sm [&>p]:font-roboto">
                <?php echo wpautop($description); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>