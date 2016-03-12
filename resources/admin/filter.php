<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/16/16
 * Time: 1:54 PM
 * As: filter.php
 * For: business
 */

/**
 * Add Source Name and URL fields to media uploader
 */

function add_last_nav_item($items) {
    $p = View::make('partials.header.search')->render();
    return $items . $p;
}
add_filter('wp_nav_menu_items','add_last_nav_item');