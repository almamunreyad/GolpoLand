<?php
$show_banner = get_field('show_banner');
$banner_type = get_field('banner_type');
$floating_header = get_field('floating_header');

if ($show_banner && ($banner_type == 'full_banner' && $floating_header)) :
  require(get_template_directory() . '/layout-modules/_full-banner-float.php');

elseif ($show_banner && ($banner_type == 'full_banner' && !$floating_header)) :
  require(get_template_directory() . '/layout-modules/_normal-banner.php');

elseif ($show_banner && ($banner_type == 'no_banner')) :
  require(get_template_directory() . '/layout-modules/_no-banner.php');

elseif (is_singular() && !is_page()):
  require(get_template_directory() . '/layout-modules/_single-banner.php');

endif;
