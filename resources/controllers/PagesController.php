<?php

class PagesController extends BaseController {

	public function page(){
		return  View::make('pages.page')->render();
	}

	public function home(){
		return View::make('home')->render();
		//return View::make('welcome');
	}

	public function archive(){
		return View::make('pages.archive')->render();
	}

	public function attachment(){
		return View::make('pages.attachment')->render();
	}

	public function category(){
		return View::make('pages.category')->render();
	}
	public function date(){
		return View::make('pages.date')->render();
	}

	public function time(){
		return View::make('pages.time')->render();
	}

	public function day(){
		return View::make('pages.day')->render();
	}

	public function month(){
		return View::make('pages.month')->render();
	}

	public function paged(){
		return View::make('pages.paged')->render();
	}

	public function single(){
		return View::make('pages.single')->render();
	}

	public function singular(){
		return View::make('pages.singular')->render();
	}

	public function sticky(){
		return View::make('pages.sticky')->render();
	}

	public function subpage(){
		return View::make('pages.subpage')->render();
	}

	public function tax(){
		return View::make('pages.tax')->render();
	}

	public function tag(){
		return View::make('pages.tag')->render();
	}

	public function template(){
		return View::make('pages.template')->render();
	}

	public function year(){
		return View::make('pages.year')->render();
	}


}
