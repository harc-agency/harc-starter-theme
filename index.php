<?php
require_once __DIR__ . '/helpers/logs.php';

use BoxyBird\Inertia\Inertia;



if (is_front_page()) {
    $data = [
        'post' => transform_get_post(),
        'fields' => get_fields(),
    ];

    // dd($data);

    return Inertia::render('Homepage', $data);
}

// woo commerce product page
if (is_product()) {

    $product = json_decode(wc_get_product(get_the_ID()));

    $data = [
        'product' => $product,
        'wc_product' => do_shortcode('[product_page id="' . get_the_ID() . '"]'),
    ];
    // dd($data);

    return Inertia::render('Woocommerce/Product', $data);
}

// woo commerce cart
if (is_shop()) {

    $data = [
        'products' => do_shortcode('[products]'),
    ];
    // dd($data);

    return Inertia::render('Woocommerce/Shop', $data);
}

// woo commerce cart
if (is_cart()) {
    $data = [
        'woocommerce_cart' => do_shortcode('[woocommerce_cart]'),
    ];
    // dd($data);

    return Inertia::render('Woocommerce/Cart', $data);
}

// woo commerce checkout
if (is_checkout()) {
    $data = [
        'woocommerce_checkout' => do_shortcode('[woocommerce_checkout]'),
    ];
    // dd($data);

    return Inertia::render('Woocommerce/Checkout', $data);
}

// is_single post
if (is_single()) {

    $data = [
        'post' => transform_get_post(),
    ];
    // dd($data);

    return Inertia::render('Single', $data);
}

// is page
if (is_page()) {
    $data = [
        'post' => get_post(),
        'fields' => get_fields(),
    ];
    // dd($data);

    return Inertia::render('Page', $data);
}

// is 404
if (is_404()) {
    $data = [
        'code' => 404,
        'message' => 'Page Not Found',
    ];
    // dd($data);

    return Inertia::render('404', $data);
}

// blog page, archive page, category page, 
if (is_home()) {
    $data = [

        // 'post' => get_post(),
        'posts' => get_posts(), //transform_posts_data(get_posts()),
        'fields' => get_fields(),
    ];
    // dd($data);

    return Inertia::render('Index', $data);
}
