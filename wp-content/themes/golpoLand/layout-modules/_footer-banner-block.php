<section class="footer-banner relative py-10">
    <div class="holder">
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- LEFT: Text Content -->
            <div class="flex-1 min-w-0 z-10">
                <?php
                $footer_banner_title = get_field('footer_banner_title', 'option');
                if ($footer_banner_title): ?>
                    <h2 class="text-3xl font-black text-gray-900 mb-3" style="font-family:'Nunito',sans-serif;">
                        <?php echo esc_html($footer_banner_title); ?>
                    </h2>
                <?php endif; ?>

                <?php
                $footer_banner_description = get_field('footer_banner_description', 'option');
                if ($footer_banner_description): ?>
                    <div class="text-gray-700 text-base leading-relaxed max-w-md mb-7 space-y-5">
                        <?php echo $footer_banner_description; ?>
                    </div>
                <?php endif; ?>

                <!-- QR + Store Buttons Row -->
                <div class="flex items-center gap-5">
                    <!-- QR Code placeholder -->
                    <div class="bg-white rounded-xl p-2 shadow-sm">
                        <?php get_template_part('svgs/qr'); ?>
                    </div>

                    <!-- Store Buttons -->
                    <div class="flex flex-col gap-2.5">
                        <!-- Apple link -->
                        <?php
                        $app_store_url = get_field('app_store', 'options'); ?>
                        <?php if ($app_store_url) : ?>
                            <a href="<?php echo esc_url($app_store_url); ?>" target="_blank" class="store-btn">
                                <?php get_template_part('svgs/apple'); ?>

                                <div>
                                    <div class="text-[9px] opacity-80">Download on the</div>
                                    <div class="text-[15px] font-bold">App Store</div>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Play Store link -->
                        <?php
                        $play_store_url = get_field('play_store', 'options'); ?>
                        <?php if ($play_store_url) : ?>
                            <a href="<?php echo esc_url($play_store_url); ?>" target="_blank" class="store-btn">
                                <?php get_template_part('svgs/playstore'); ?>

                                <div>
                                    <div class="text-[9px] opacity-80">GET IT ON</div>
                                    <div class="text-[15px] font-bold">Google Play</div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Device Mockups -->
            <?php
            $footer_banner_image = get_field('footer_banner_image', 'options');
            if ($footer_banner_image) : ?>
                <div class="relative flex-shrink-0 max-w-[450px] w-full h-[320px] flex items-center justify-center">
                    <img class="w-full h-full object-cover" src="<?php echo esc_url($footer_banner_image['url']); ?>" alt="<?php bloginfo('name') ?>" />
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>