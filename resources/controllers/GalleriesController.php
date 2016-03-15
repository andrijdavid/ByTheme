<?php
use Themosis\Facades\Asset;
use Themosis\Facades\View;


/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/1/16
 * Time: 12:19 AM
 */
class GalleriesController extends BaseController
{
    public function single(){
		Asset::add('galleryScript', 'js/gallery.js', false, '0.13', false, 'script');
		Asset::add('imagesloaded', 'js/imagesloaded.pkgd.min.js', false, '1.0', false, 'script');

		Asset::add('galleryStyle', 'css/gallery.css', false, '0.13', false, 'style');
        return View::make('partials.gallery.single')->render();
    }

    public function loop(){

    	Asset::add('masonry', 'js/masonry.pkgd.min.js', false, '1.0', false, 'script');
		Asset::add('imagesloaded', 'js/imagesloaded.pkgd.min.js', false, '1.0', false, 'script');
		
    	return View::make('partials.gallery.loop', [
    		'galleries' => GalleryModel::all()
    	])->render();
    }
}