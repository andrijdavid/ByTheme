<?php
use Themosis\Facades\View;

/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/16/16
 * Time: 1:54 PM
 * As: filter.php
 * For: business
 */

function add_last_nav_item($items, $args) {
//    dd($args);
    if($args->theme_location == 'header')
    {
        $p = View::make('partials.header.search')->render();
        $items =$items . $p;
    }
    return $items;

}
add_filter('wp_nav_menu_items','add_last_nav_item', 10, 2);