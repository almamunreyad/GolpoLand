<?php
// Register REST API endpoint for case study load more
function custom_posts_endpoint()
{
    register_rest_route('custom/v1', '/product-grids', array(
        'methods' => 'GET',
        'callback' => 'get_product_posts',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'custom_posts_endpoint');



// callback function for products grid block
function get_product_posts(WP_REST_Request $request)
{
    $page = $request->get_param('page') ? intval($request->get_param('page')) : 1;
    $technology = $request->get_param('technology');
    $engineer = $request->get_param('engineer');
    $product_type = $request->get_param('product_type');

    $args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'paged'          => $page,
        'posts_per_page' => 16,
        'order'          => 'ASC',
        'orderby'        => "title",
    ];

    $tax_query = [];

    // Filter by product type
    if (!empty($product_type)) {
        $tax_query[] = [
            'taxonomy' => 'product-type',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($product_type),
        ];
    }

    // Filter by technology
    if (!empty($technology)) {
        $tax_query[] = [
            'taxonomy' => 'technology',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($technology),
        ];
    }

    // Filter by engineer
    if (!empty($engineer)) {
        $tax_query[] = [
            'taxonomy' => 'engineer',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($engineer),
        ];
    }

    // Add tax_query if we have filters
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
        $args['tax_query']['relation'] = 'AND';
    }

    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ob_start();
            require get_template_directory() . '/layout-modules/_product-list-item.php';
            $html .= ob_get_clean();
        }
    } else {
        $html = '<div class="col-span-full text-center py-8"><p class="text-Pearl text-lg">No products found.</p></div>';
    }

    wp_reset_postdata();

    // Calculate current showing count
    $posts_shown = ($page - 1) * 16 + $query->post_count;

    return new WP_REST_Response([
        'html'        => $html,
        'count'       => $query->post_count,
        'total_posts' => $query->found_posts,
        'posts_shown' => $posts_shown,
        'current_page' => $page,
    ], 200);
}
