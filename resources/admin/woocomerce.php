<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/16/16
 * Time: 11:28 AM
 * As: woocomerce.php
 * For: business
 */

add_filter('themosisRouteConditions', function ($conds) {
    $conds['product']          = 'is_product';
    $conds['shop']             = 'is_shop';
    $conds['cart']             = 'is_cart';
    $conds['checkout']         = 'is_checkout';
    $conds['account']          = 'is_account_page';
    $conds['product_category'] = 'is_product_category';

    return $conds;
} );