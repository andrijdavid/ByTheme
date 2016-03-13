<?php

$cat = Taxonomy::make('faq-category', 'faqs', __('Faq Categories', THEME_TEXT_DOMAIN), __('Faq Category',THEME_TEXT_DOMAIN))->set([
    'public'             => true,
    'show_in_nav_menus'  => true,
    'hierarchical'       => true,
    'show_tagcloud'      => true,
    'show_in_quick_edit' => true
]);

$tag = Taxonomy::make('faq-tag', 'faqs', __('Faq Tags', THEME_TEXT_DOMAIN), __('Faq Tag', THEME_TEXT_DOMAIN) )->set([
    'public'             => true,
    'show_in_nav_menus'  => true,
    'hierarchical'       => true,
    'show_tagcloud'      => true,
    'show_in_quick_edit' => true
]);

$faqs = PostType::make('faqs', __('Faqs', THEME_TEXT_DOMAIN), __('Faq', THEME_TEXT_DOMAIN))->set([
    'public'    => true,
    'show_in_nav_menus' => true,
    'show_ui'             => TRUE,
    'show_in_menu'        => TRUE,
    'publicly_queryable'  => TRUE,
    'query_var'           => 'faqs',
    'rewrite'             => array ( 'slug' => 'faqs' ),
    'labels'       => [
        'add_item' => __('Add', THEMOSIS_TEXTDOMAIN)
    ],
    'supports'  => array('title', 'revisions'),
    'taxonomies' => ['faq-category', 'faq-tag']
]);

$infos = Metabox::make('Answer', $faqs->getSlug())->set(array(
    Field::editor('answer')
));

