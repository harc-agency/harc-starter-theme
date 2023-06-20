<?php
// transform_get_post function
if (!function_exists('transform_get_post')) {
    function transform_get_post()
    {
        $post = get_post();
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


function add_children_to_parent($menu_items, $parent_id)
{
    $children = [];

    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == $parent_id) {
            $children[] = [
                'ID' => $menu_item->ID,
                'title' => $menu_item->title,
                'url' => $menu_item->url,
                'children' => add_children_to_parent($menu_items, $menu_item->ID),
            ];
        }
    }

    return $children;
}

//use add_children_to_parent function to add children to the parent
//transform wp_get_nav_menu_items
if (!function_exists('transform_wp_get_nav_menu_items')) {
    function transform_wp_get_nav_menu_items($menu_items)
    {
        $menu_items = wp_get_nav_menu_items($menu_items);
        // dd($menu_items);

        // Create an empty array to store the transformed data
        $transformed_data = [];

        //for each menu item it will either be a parent or a child or both
        // it will have menu_item_parent = 0 if it is a parent
        // it will have menu_item_parent != 0 if it is a child

        // loop through the menu items and create a new array with the parent items

        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == 0) {
                $transformed_data[] = [
                    'ID' => $menu_item->ID,
                    'title' => $menu_item->title,
                    'url' => $menu_item->url,
                    'children' => add_children_to_parent($menu_items, $menu_item->ID),
                ];
            }
        }

        return $transformed_data;
    }
}
