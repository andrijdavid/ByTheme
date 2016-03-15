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
$b ='partials.unique.unique';
$tmp = $b . '1';
if(isset($atts) && array_key_exists($atts, 'template')){
    $tmp = $b. $atts['template'];
}
 ?>
<div class="container">
@foreach(GalleryModel::all() as $gallery)
    @include($tmp), [
        'title' => $gallery->title(),
        'link' => $gallery->link(),
        'category' => $gallery->terms('gallery-category'),
        'tags' => $gallery->terms('gallery-tags'),
        'excerpt' => $gallery->excerpt(),
        'thumbnail' => $gallery->thumbnailUrl(empty(\Themosis\MetaBox\Meta::get($gallery->id(), 'loopType')) ? 'partials.unique.unique1' :\Themosis\MetaBox\Meta::get($gallery->id(), 'loopType')),
        'date' => $gallery->date(),
        'year' => $gallery->date('Y'),
        'month' => $gallery->date('m'),
        'day' => $gallery->date('d'),
        'description' =>\Themosis\MetaBox\Meta::get($gallery->id(), 'description'),
    ])
@endforeach
</div>
