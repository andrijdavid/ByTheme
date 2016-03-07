<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 3/5/16
 * Time: 7:51 AM
 * As: polylang.php
 * For: business
 */

add_filter('pll_get_taxonomies', 'add_tax_to_pll', 10, 2);
function add_tax_to_pll($taxonomies, $hide) {
//    if ($hide)
//        unset($taxonomies['my_tax']);
//    else
//    {
//
//    }
    $taxonomies['galleries'] = 'galleries';
    $taxonomies['products'] = 'products';
    return $taxonomies;
}