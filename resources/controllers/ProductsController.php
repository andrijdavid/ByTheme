<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/1/16
 * Time: 12:19 AM
 */
class ProductsController extends BaseController
{
    public function single()
    {
        //Asset::add('flickity', 'js/flickity.pkgd.min.js', false, '1.0', false, 'script');
        //Asset::add('flickityStyle', 'css/flickity.min.css', false, '1.0', false, 'style');
        //Asset::add('imagesloaded', 'js/imagesloaded.pkgd.min.js', false, '1.0', false, 'script');

        return View::make('partials.product.single')->render();
    }

    public function loop()
    {

        Asset::add('masonry', 'js/masonry.pkgd.min.js', false, '1.0', false, 'script');
        Asset::add('imagesloaded', 'js/imagesloaded.pkgd.min.js', false, '1.0', false, 'script');

        return View::make('partials.product.loop', [
            'products' => ProductModel::all()
        ])->render();
    }
}