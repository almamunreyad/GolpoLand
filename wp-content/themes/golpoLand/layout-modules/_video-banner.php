<?php
$banner_video_mobile = get_field('banner_video_mobile');
$video_type = get_field('video_type');
$upload_video = get_field('upload_video');
$iframe = get_field('vimeo_youtube');


if ($video_type == 'own-hosted' && ($upload_video || $banner_video_mobile)) : ?>

    <?php if (wp_is_mobile() && $banner_video_mobile) : ?>
        <video id="bannerOHVideo" autoplay playsinline loop muted class="md:absolute md:inset-0 w-full max-md:max-h-89.5 md:h-full object-cover">
            <source src="<?php echo esc_url($banner_video_mobile['url']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php elseif ($upload_video) : ?>
        <video id="bannerOHVideo" autoplay playsinline loop muted class="md:absolute md:inset-0 w-full max-md:max-h-89.5 md:h-full object-cover">
            <source src="<?php echo esc_url($upload_video['url']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>

<?php elseif ($video_type == 'vimeo-youtube' && $iframe) :
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1] ?? ''; // Handle cases where no match is found

    $params = array(
        'autoplay'    => 1,
        'mute'        => 1, // Use 'mute' instead of 'muted' for YouTube
        'loop'        => 1,
        'controls'    => 0,
        'playsinline' => 1,
        'hd'          => 1,
        'background'  => 1,
        'byline'      => 0,
        'title'       => 0,
        'rel'         => 0, // Disable related videos at the end
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe); ?>
    <div class="w-full h-full absolute left-0 top-0 z-0 embed-container [&>*]:h-full [&>*]:w-full [&>*]:object-cover">
        <?php echo $iframe; ?>
    </div>

<?php endif; ?>