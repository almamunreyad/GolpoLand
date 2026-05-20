<?php

// Gutenberg ACF custom blocks
require(get_template_directory() . '/_/inc/_gutenberg.php');
require(get_template_directory() . '/_/inc/_custom-acf-code-snippets.php');
require(get_template_directory() . '/_/inc/_register-navs.php');
require(get_template_directory() . '/_/inc/_custom-wpadmin.php');
// require(get_template_directory() . '/_/inc/_breadcrumb.php');
require(get_template_directory() . '/_/inc/_404-acf.php');
require(get_template_directory() . '/_/inc/_disable-comment.php');

require(get_template_directory() . '/_/inc/_register-rest-api.php');



//* Add logo to admin page
function my_login_logo()
{ ?>
  <style type="text/css">
    #login h1 a,
    .login h1 a {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/_/images/logo.svg');
      background-size: contain;
      height: 70px;
      width: 250px;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');



/**
 * Custom admin login header link alt text
 */
function custom_login_title()
{
  return get_option('blogname');
}
add_filter('login_headertext', 'custom_login_title');



function site_styles_scripts()
{
  $theme_url  = get_template_directory_uri();

  // style

  wp_enqueue_style('select2-min', $theme_url . '/_/css/select2.min.css', array(), '');
  wp_enqueue_style('magnific-popup', $theme_url . '/_/css/magnific-popup.css', array(), filemtime(get_template_directory() . '/_/css/swiper-bundle.min.css'));
  wp_enqueue_style('swiper-bundle-style', $theme_url . '/_/css/swiper-bundle.min.css', array(), '');
  wp_enqueue_style('splide-bundle-style', $theme_url . '/_/css/splide.min.css', array(), '');

  wp_enqueue_style('theme-style', $theme_url . '/_/css/websure.min.css', array(), filemtime(get_template_directory() . '/_/css/websure.min.css'));




  // script
  //----------------       

  wp_enqueue_script('select-2-script', $theme_url . '/_/js/select2.min.js', array('jquery'), null, true);
  wp_enqueue_script('swiper-bundle-script', $theme_url . '/_/js/swiper-bundle.min.js', array('jquery'), null, false);
  wp_enqueue_script('magnefic-pop-script', $theme_url . '/_/js/magnific-popup.min.js', array(), null, true);

  wp_enqueue_script('gsap-script', $theme_url . '/_/js/gsap.min.js', array(), null, true);
  wp_enqueue_script('ScrollTrigger-script', $theme_url . '/_/js/ScrollTrigger.min.js', array(), null, true);
  wp_enqueue_script('lenis-script', $theme_url . '/_/js/lenis.min.js', array(), null, true);

  wp_enqueue_script('splide-script', $theme_url . '/_/js/splide.min.js', array(), null, true);
  wp_enqueue_script('splide-autoscroll-script', $theme_url . '/_/js/splide-autoscroll.min.js', array(), null, true);

  wp_enqueue_script('custom-script', $theme_url . '/_/js/functions.js', array(), filemtime(get_template_directory() . '/_/js/functions.js'), true);
}
add_action('wp_enqueue_scripts', 'site_styles_scripts');



//ksa
function ksa($cont)
{
  echo wp_kses($cont, '');
}


// Gravity Forms custom submit button for all forms (or you can target a specific form)
// add_filter('gform_submit_button', 'form_submit_button', 10, 2);
// function form_submit_button($button, $form)
// {
//   return "<button 
//                 type='submit' 
//                 class='btn gfrom_custom_btn' 
//                 id='gform_submit_button_{$form['id']}' 
//                 onclick='if(window.gform && window.gform.submission) { window.gform.submission.handleButtonClick(this); }'
//             >
//                 <span>{$form['button']['text']}</span>
//                 <img class='!transition-all !duration-300' src='/wp-content/themes/websureFertility/_/images/arrow.svg'>
//             </button>";
// }
