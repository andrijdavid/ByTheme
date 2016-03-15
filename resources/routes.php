<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */
use Themosis\Facades\Route;
use Themosis\Facades\View;

Route::any('home', 'PagesController@home');

//*****
// The front page
Route::any('front', 'PagesController@front');

//Route::get('page', ['about', 'uses' => 'PagesController@about']);
//Route::get('page', ['contact', 'uses' => 'PagesController@contact']);

Route::get('postTypeArchive', array('post', 'uses' => 'PostController@loop'));
Route::get('singular', array('post', 'uses'=> 'PostController@single'));

Route::get('postTypeArchive', array('galleries', 'uses' => 'GalleriesController@loop'));
Route::get('singular', array('galleries', 'uses' => 'GalleriesController@single'));

Route::get('postTypeArchive', array('products', 'uses' => 'ProductsController@loop'));
Route::get('singular', array('products', 'uses' => 'ProductsController@single'));

Route::get('postTypeArchive', array('faqs', 'uses' => 'FaqsController@loop'));
Route::get('singular', array('faqs', 'uses' => 'FaqsController@single'));
Route::get('tax', array('faq-category', 'uses' => 'FaqsController@loop'));
Route::get('tax', array('faq-tag', 'uses' => 'FaqsController@loop'));


Route::get('page', 'PagesController@page');
Route::get('single', 'PagesController@single');
Route::get('singular', 'PagesController@singular');

//Route::get('attachment', 'PagesController@attachment');
//Route::get('author', 'PagesController@author');
//Route::get('category', 'PagesController@category');

Route::get('day', 'PagesController@day');
Route::get('month', 'PagesController@month');
Route::get('time', 'PagesController@time');
Route::get('year', 'PagesController@year');
Route::get('date', 'PagesController@date');

//Route::get('paged', 'PagesController@paged');
//Route::get('sticky', 'PagesController@sticky');
//
Route::get('tag', 'PagesController@tag');
Route::get('tax', 'PagesController@tax');



Route::get('postTypeArchive', 'PagesController@archive');
Route::get('archive', 'PagesController@archive');

// Search pag
//e
Route::get('search', function()
{
    $s = (string) get_query_var('s', ' ');
    return View::make('partials.search.search', [
        's' => $s
    ])->render();
});

Route::get('404', function(){
    return View::make('error.404')->render();
});
