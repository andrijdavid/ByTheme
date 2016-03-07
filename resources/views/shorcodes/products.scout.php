<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 3/5/16
 * Time: 8:11 AM
 * As: galleries.scout.php
 * For: business
 */
$b = 'partials.unique.unique';
$tmp = $b . '1';
if (isset($atts) && array_key_exists($atts, 'template')) {
    $tmp = $b . $atts['template'];
}
?>
<div class="container">
    @foreach(ProductModel::all() as $product)
        @include(empty(Meta::get($product->id(), 'loopType')) ? 'partials.unique.unique1' : Meta::get($product->id(), 'loopType'),[
            'title' => $product->title(),
            'link' => $product->link(),
            'category' => $product->terms('product-category'),
            'tags' => $product->terms('product-tags'),
            'excerpt' => $product->excerpt(),
            'thumbnail' => $product->thumbnailUrl(empty(Meta::get($product->id(), 'loopType')) ? 'partials.unique.unique1' : Meta::get($product->id(), 'loopType')),
            'date' => $product->date(),
            'year' => $product->date('Y'),
            'month' => $product->date('m'),
            'day' => $product->date('d'),
            'description' => Meta::get($product->id(), 'description'),
        ])
    @endforeach
</div>