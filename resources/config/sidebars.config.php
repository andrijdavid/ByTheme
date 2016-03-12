<?php

return [

	/*
	* Edit this file to add widget sidebars to your theme. 
	* Place WordPress default settings for sidebars.
	* Add as many as you want, watch-out your commas!
	*/

	[
		'name'			=> __('Footer first sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'footer-first-sidebar',
		'description'	=> __('Area of first sidebar on footer', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Footer second sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'footer-second-sidebar',
		'description'	=> __('Area of second sidebar on footer', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Footer third sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'footer-third-sidebar',
		'description'	=> __('Area of third sidebar on footer', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Footer fourth sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'footer-fourth-sidebar',
		'description'	=> __('Area of fourth sidebar on footer', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Single post sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'single-post-sidebar',
		'description'	=> __('Area of sidebar on single post', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Single product sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'single-product-sidebar',
		'description'	=> __('Area of sidebar on single post', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	],
	[
		'name'			=> __('Single gallery sidebar', THEME_TEXT_DOMAIN),
		'id'			=> 'single-gallery-sidebar',
		'description'	=> __('Area of sidebar on gallery', THEME_TEXT_DOMAIN),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s" ><div class="widget-wrap">',
		'after_widget'	=> '</div></section>',
		//'before_title'	=> '<header class="section">',
		//'after_title'	=> '</header>'
	]
];