<?php

use Themosis\Facades\Field;
use Themosis\Facades\Metabox;
use Themosis\Facades\PostType;
use Themosis\Facades\Taxonomy;

$cat = Taxonomy::make('product-category', 'products', __('Product Categories', THEME_TEXT_DOMAIN), __('Product Category',THEME_TEXT_DOMAIN))->set([
	'public'             => true,
	'show_in_nav_menus'  => true,
	'hierarchical'       => true,
	'show_tagcloud'      => true,
	'show_in_quick_edit' => true
]);

$tag = Taxonomy::make('product-tag', 'products', __('Product Tags', THEME_TEXT_DOMAIN), __('Product Tag', THEME_TEXT_DOMAIN) )->set([
	'public'             => true,
	'show_in_nav_menus'  => true,
	'hierarchical'       => true,
	'show_tagcloud'      => true,
	'show_in_quick_edit' => true
]);


$products = PostType::make('products', __('Products', THEME_TEXT_DOMAIN), __('Product',THEME_TEXT_DOMAIN))->set([
	'public'    => true,
	'show_in_nav_menus' => true,
	'show_ui'             => TRUE,
	'show_in_menu'        => TRUE,
	'publicly_queryable'  => TRUE,
	'query_var'           => 'products',
	'rewrite'             => array ( 'slug' => 'products' ),
	'labels'       => [
		'add_item' => __('Add', THEME_TEXT_DOMAIN)
	],

	'supports'  => array('title', 'excerpt', 'thumbnail', 'revisions'),
	'taxonomies' => array('product-category', 'product-tag')
]);

$infos = Metabox::make('Informations', $products->getSlug())->set(array(

	Field::textarea('description'),
	Field::collection('images', [
		'type' => 'images'
	]),

	Field::infinite('info', [
		Field::text('title'),
		Field::textarea('value'),
	])
));

/*-----------------------------------------------------------------------*/
// Book info validation
/*-----------------------------------------------------------------------*/
$infos->validate(array(
//    'author'    => array('textfield', 'min:5')
));