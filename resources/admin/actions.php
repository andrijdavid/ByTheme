<?php

/**
 * Define your WordPress actions for your project.
 *
 * Based on the WordPress action hooks.
 * https://developer.wordpress.org/reference/hooks/
 *
 */

Action::add('the_content', function ($content) {

    if(empty($content))
        return $content;
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML(utf8_decode($content));

    $imgs = $document->getElementsByTagName('img');

    foreach ($imgs as $img) {
        $existing_class = $img->getAttribute('class');
        $img->setAttribute('class','img-responsive '. $existing_class);

    }

    $html = $document->saveHTML();
    return $html;
});

Action::add('wp_head', function($post_id) {
    if(is_single())
    {
        if(empty($post_id))
            set_post_view($post_id);
        else
        {
            global $post;
            set_post_view($post->ID);
        }
    }
});

/*
 * Load translation
 * */
Action::add('after_setup_theme', function (){
    load_theme_textdomain(THEMOSIS_TEXTDOMAIN, themosis_path("theme") . 'languages' );
});

