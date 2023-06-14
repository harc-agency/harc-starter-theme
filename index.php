<?php

use BoxyBird\Inertia\Inertia;

if (is_front_page()) {


    $data = [
        // 'post' => get_post(),
        'post' => transform_post_data(get_post()),
        'fields' => get_fields(),
    ];
    // dd($data);

    return Inertia::render('Homepage', $data);
}

if (is_home()) {
    return Inertia::render('Index', [
        'posts' => get_posts(),
    ]);
}

if (is_single()) {
    return Inertia::render('Single', [
        'post' => get_post(),
        'fields' => get_fields(),
    ]);
}

if (is_page()) {
    return Inertia::render('Page', [
        'page' => get_post(),
    ]);
}

if (is_404()) {
    return Inertia::render('404', [
        'content' => '404 - Not Found',
    ]);
}
