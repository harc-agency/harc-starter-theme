<?php

use BoxyBird\Inertia\Inertia;



if (is_front_page()) {
    $data = [
        'post' => transform_get_post(),
        'menu' => transform_wp_get_nav_menu_items('main-menu'),
        'fields' => get_fields(),
    ];
    // dd($data);

    return Inertia::render('Homepage', $data);
}

if (is_home()) {
    $data = [
        // 'post' => get_post(),
        'menu' => transform_wp_get_nav_menu_items('main-menu'),
        'posts' => get_posts(), //transform_posts_data(get_posts()),
        'fields' => get_fields(),
    ];
    // dd($data);

    return Inertia::render('Index', $data);
}

if (is_single()) {

    $data = [
        'menu' => transform_wp_get_nav_menu_items('main-menu'),
        'post' => transform_get_post(),
    ];
    // dd($data);

    return Inertia::render('Single', $data);
}

if (is_page()) {
    $data = [
        'menu' => transform_wp_get_nav_menu_items('main-menu'),
        'post' => get_post(),
    ];
    // dd($data);

    return Inertia::render('Page', $data);
}

if (is_404()) {
    $data = [
        'content' => '404 - Not Found',
    ];
    // dd($data);

    return Inertia::render('404', $data);
}
