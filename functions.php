<?php

use BoxyBird\Inertia\Inertia;

require_once __DIR__ . '/vendor/autoload.php';



// transform_post_data function
if (!function_exists('transform_post_data')) {
    function transform_post_data($post)
    {
        // Create an empty array to store the transformed data
        $transformed_data = [];

        $transformed_data['ID'] = $post->ID;
        $transformed_data['post_title'] = $post->post_title;
        $transformed_data['post_type'] = $post->post_type;
        $transformed_data['post_content'] = $post->post_content;
        $transformed_data['post_date'] = $post->post_date;
        $transformed_data['post_author'] = get_the_author_meta('display_name', $post->post_author);
        $transformed_data['post_link'] = get_permalink($post->ID);

        return $transformed_data;
    }
}


//dd function
if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        echo json_encode($data, true);
        echo '</pre>';
        die();
    }
}


// Enqueue scripts.
add_action('wp_enqueue_scripts', function () {
    $version = md5_file(get_stylesheet_directory() . '/dist/mix-manifest.json');

    wp_enqueue_script('bb_theme', get_stylesheet_directory_uri() . '/dist/app.js', [], $version, true);
});

// Share globally with Inertia views
add_action('after_setup_theme', function () {
    Inertia::share([
        'site' => [
            'name'        => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
        ],
    ]);
});

// Add Inertia version. Helps with cache busting
add_action('after_setup_theme', function () {
    $version = md5_file(get_stylesheet_directory() . '/dist/mix-manifest.json');

    Inertia::version($version);
});
