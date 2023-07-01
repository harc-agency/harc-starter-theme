<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/helpers/logs.php';
require_once __DIR__ . '/helpers/transformers.php';

use BoxyBird\Inertia\Inertia;


//after theme setup
add_action('after_setup_theme', function () {
    (new \Symfony\Component\Dotenv\Dotenv())->load(__DIR__ . '/.env');
    // dd($_ENV['WORDPRESS_ENV']);
});


// Enqueue scripts.
add_action('wp_enqueue_scripts', function () {
    $version = md5_file(get_stylesheet_directory() . '/dist/mix-manifest.json');
    wp_enqueue_script('bb_theme', get_stylesheet_directory_uri() . '/dist/app.js', [], $version, true);
});



// Add Inertia version. Helps with cache busting
add_action('after_setup_theme', function () {
    $version = md5_file(get_stylesheet_directory() . '/dist/mix-manifest.json');
    Inertia::version($version);
});

// INERTIA SHARE
add_action('init', function ($data) {

    // Multiple values
    Inertia::share([
        'menu' => transform_wp_get_nav_menu_items('main-menu'),
        // Synchronously
        'site' => [
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
        ],

        // Lazily
        'auth' => function () {
            if (is_user_logged_in()) {
                return [
                    'user' => wp_get_current_user()
                ];
            }
        },


    ]);
});
