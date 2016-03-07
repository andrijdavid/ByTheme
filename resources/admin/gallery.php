<?php

$cat = Taxonomy::make('gallery-category', 'galleries', __('Gallery Categories', THEME_TEXT_DOMAIN), __('Gallery Category',THEME_TEXT_DOMAIN))->set([
    'public'             => true,
    'show_in_nav_menus'  => true,
    'hierarchical'       => true,
    'show_tagcloud'      => true,
    'show_in_quick_edit' => true
]);

$tag = Taxonomy::make('gallery-tag', 'galleries', __('Gallery Tags', THEME_TEXT_DOMAIN), __('Gallery Tag', THEME_TEXT_DOMAIN) )->set([
    'public'             => true,
    'show_in_nav_menus'  => true,
    'hierarchical'       => true,
    'show_tagcloud'      => true,
    'show_in_quick_edit' => true
]);

$galleries = PostType::make('galleries', __('Galleries', THEME_TEXT_DOMAIN), __('Gallery', THEME_TEXT_DOMAIN))->set([
    'public'    => true,
	'show_in_nav_menus' => true,
	'show_ui'             => TRUE,
	'show_in_menu'        => TRUE,
	'publicly_queryable'  => TRUE,
	'query_var'           => 'galleries',
	'rewrite'             => array ( 'slug' => 'galleries' ),
    'labels'       => [
        'add_item' => __('Add', THEMOSIS_TEXTDOMAIN)
    ],
    'supports'  => array('title', 'excerpt', 'thumbnail', 'revisions'),
    'taxonomies' => ['gallery-category', 'gallery-tag']
]);

$infos = Metabox::make('Informations', $galleries->getSlug())->set(array(

	Field::collection('images', [
		'type' => 'images'
	])

));


/*-----------------------------------------------------------------------*/
// Book info validation
/*-----------------------------------------------------------------------*/
//$infos->validate(array(
//    'title'    => array('textfield', 'min:5')
//));