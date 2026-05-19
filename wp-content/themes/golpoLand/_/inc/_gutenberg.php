<?php

/**
 * Add support for Gutenberg features
 */
// function skylarks_setup_theme_supported_features()
// {
//     add_theme_support('align-wide');

//     //add_theme_support( 'disable-custom-colors' ); // removes color options completely
//     add_theme_support('disable-custom-font-sizes');
// }

// add_action('after_setup_theme', 'skylarks_setup_theme_supported_features');

// ----------------

/**
 * Enqueue editor styles for Gutenberg
 */
function skylarks_editor_styles()
{
    wp_enqueue_style(
        'custom-block-styles',
        get_theme_file_uri('/_/css/block-editor.css'),
        array('wp-edit-blocks'),
        filemtime(get_theme_file_path('/_/css/block-editor.css'))
    );
}
add_action('enqueue_block_editor_assets', 'skylarks_editor_styles');

// ----------------
// Colour palette - add basic darks and white and leave rest to colour picker

function skylarks_gutenberg_color_palette()
{
    add_theme_support(
        'editor-color-palette',
        array(
            // ----------------
            array(
                'name' => esc_html__('Black', 'skylarks'),
                'slug' => 'black',
                'color' => '#2a2a2a',
            ),

            array(
                'name' => esc_html__('White', 'skylarks'),
                'slug' => 'white',
                'color' => '#FFFFFF',
            )

            // ----------------
        )
    );
}

add_action('after_setup_theme', 'skylarks_gutenberg_color_palette');

add_filter('allowed_block_types_all', 'skylarks_allowed_block_types_all', 10, 2);

function skylarks_allowed_block_types_all($allowed_blocks, $post)
{

    $allowed_blocks = array(
        // -- Common
        'core/paragraph',
        'core/image',
        'core/heading',
        //(Deprecated) core/subhead — Subheading
        // 'core/gallery',
        'core/list',
        'core/list-item',
        'core/quote',
        //'core/audio',
        // 'core/cover',
        'core/file',
        'core/video',
        // -- Formatting
        'core/table',
        //  'core/verse',
        'core/code',
        //'core/freeform', // Classic
        // 'core/html', // Custom HTML

        // -- Layout
        //  'core/button',
        // 'core/columns', // Columns
        // 'core/media-text', // Media and Text
        // 'core/more',
        //core/nextpage — Page break
        'core/separator',
        'core/spacer',

        // -- Embeds
        'core/embed', // Disabled becuase HTML block can cover other embeds, this only asks for URL
        'core-embed/twitter',
        'core-embed/youtube',

        'core-embed/vimeo',

        // --- Reusable
        'core/block',
        'core/template',
        'gravityforms/form',


        // --- Custom/ACF
        'acf/featured-books-block',




    );


    return $allowed_blocks;
}



// Until we can remove or disable the Drop cap feature, the best we can do is stop it rendering on the templates
// add_filter('render_block', function ($block_content, $block) {
//     // only affect the Core Paragraph block
//     if ('core/paragraph' === $block['blockName']) {
//         // remove the class that creates the drop cap
//         $block_content = str_replace('class="has-drop-cap"', '', $block_content);
//     } elseif ('gravityforms/form' === $block['blockName']) {
//         // remove the class that creates the drop cap
//         $block_content = '<div class="form-container"><div class="holder holder--alt">' . $block_content . '</div></div>';
//     }

//     // always return the content, whether we changed it or not
//     return $block_content;
// }, 10, 2);

// ----------------
// Add custom fonts to admin

function gb_custom_admin_css()
{

    get_template_part('page-templates/_meta-fonts');
}

add_action('admin_head', 'gb_custom_admin_css');


function acf_load_blocks()
{
    $blocks = get_blocks();
    foreach ($blocks as $block) {
        if (file_exists(get_template_directory() . '/blocks/' . $block . '/block.json')) {
            register_block_type(get_template_directory() . '/blocks/' . $block . '/block.json');
        }
    }
}
add_action('init', 'acf_load_blocks', 5);
/**
 * Get Blocks
 */
function get_blocks()
{
    $blocks = scandir(get_template_directory() . '/blocks/');
    $blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')));
    return $blocks;
}

// ACF Options

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'     => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
