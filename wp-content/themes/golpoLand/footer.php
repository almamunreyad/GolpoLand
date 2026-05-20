</main>
<!-- ************************* End of main wrapper ************************* -->
<!-- footer banner block -->
<?php require get_template_directory() . '/layout-modules/_footer-banner-block.php'; ?>


<footer class="bg-[#0f1117] text-[#9ca3af] mt-2">
  <div class="holder">
    <div class="grid grid-cols-1 md:grid-cols-[1.2fr_2fr] gap-9 md:gap-[60px] py-12 pb-9">

      <!-- Brand -->
      <div class="flex flex-col gap-4 items-center text-center md:items-start md:text-left">
        <div>
          <a href="<?php echo home_url(); ?>" class="w-[120px] h-auto block">
            <?php
            $logo = get_field('site_logo', 'options');
            if ($logo) : ?>
              <img class="w-full h-full" src="<?php echo esc_url($logo['url']); ?>" alt="<?php bloginfo('name') ?>" />
            <?php endif; ?>
          </a>
        </div>

        <?php
        $footer_content = get_field('footer_content', 'options');
        if ($footer_content) : ?>
          <div class="text-[13px] leading-relaxed text-gray-500 max-w-[240px] space-y-5">
            <?= $footer_content; ?>
          </div>
        <?php endif; ?>

        <div class="flex gap-2">
          <!-- instagram -->
          <?php
          $instagram_url = get_field('instagram_url', 'options'); ?>
          <?php if ($instagram_url) : ?>
            <a href="<?= esc_url($instagram_url); ?>" target="_blank" class="w-[34px] h-[34px] rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white transition">
              <?php get_template_part('svgs/insta'); ?>
            </a>
          <?php endif; ?>

          <!-- x -->
          <?php
          $twitter_url = get_field('twitter_url', 'options'); ?>
          <?php if ($twitter_url) : ?>
            <a href="<?= esc_url($twitter_url); ?>" target="_blank" class="w-[34px] h-[34px] rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white transition">
              <?php get_template_part('svgs/x'); ?>
            </a>
          <?php endif; ?>

          <!-- fb -->
          <?php
          $facebook_url = get_field('facebook_url', 'options'); ?>
          <?php if ($facebook_url) : ?>
            <a href="<?= esc_url($facebook_url); ?>" target="_blank" class="w-[34px] h-[34px] rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white transition">
              <?php get_template_part('svgs/fb'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Nav -->
      <nav>
        <?php
        $menu_class = "grid grid-cols-2 gap-x-5 gap-y-2 text-sm text-gray-500 [&>li>a]:hover:text-white transition";
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => 'ul',
          'menu_class' => $menu_class,
          'menu_id' => 'footer-menu',
        )); ?>
      </nav>

    </div>
  </div>

  <!-- bottom -->
  <div class="border-t border-gray-800">
    <div class="holder py-4 flex justify-center">
      <p class="text-xs text-gray-600">
        Copyright &copy; <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?>. All rights reserved.
      </p>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

</body>

</html>