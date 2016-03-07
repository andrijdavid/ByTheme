<?php
use Themosis\Asset\Asset;
use Themosis\Facades\View;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/1/16
 * Time: 12:19 AM
 */
class PostController extends BaseController
{
    public function single(){
        return View::make('partials.posts.single')->render();
    }

    public function loop(){

        Asset::add('masonry', 'js/masonry.pkgd.min.js', false, '1.0', false, 'script');
        return View::make('partials.product.loop', [
            'posts' => PostModel::all()
        ])->render();
    }
}