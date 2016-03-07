<?php
/*
 * Add layout metabox for all post type
 */

foreach ( get_post_types( ['public' => true], 'names' ) as $post_type ) {
    Metabox::make(__('Layouts', THEME_TEXT_DOMAIN), $post_type)->set([
        \Themosis\Facades\Field::select('layout', [
            [
                'layouts.rightsidebar' => __('Right Sidebar', THEME_TEXT_DOMAIN),
                'layouts.leftsidebar' => __('Left Sidebar', THEME_TEXT_DOMAIN),
                'layouts.default' => __('Full width', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Choose a layout:', THEME_TEXT_DOMAIN),
            'value' => 2
        ])
    ])->validate([
        'layout'
    ]);

}

foreach ( get_post_types( ['public' => true], 'names' ) as $post_type ) {
    Metabox::make('loopType', $post_type)->set([
        \Themosis\Facades\Field::select('loopType', [
            [
                'partials.unique.unique1' => __('Right Sidebar', THEME_TEXT_DOMAIN),
                'partials.unique.unique2' => __('Left Sidebar', THEME_TEXT_DOMAIN),
                'partials.unique.unique3' => __('Full width', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Choose a loop type:', THEME_TEXT_DOMAIN),
            'value' => 1
        ])
    ])->validate([
        'loopType'
    ]);

}

function get_post_view($ID){
    $count =  Meta::get($ID, 'post_views_count');
    if(empty($count))
    {
        $count = 0;
        add_post_meta($ID, 'post_views_count',0);
    }
    return $count;
}

function set_post_view($ID){
    $count = Meta::get($ID, 'post_views_count');
    if(empty($count))
        add_post_meta($ID, 'post_views_count',1);
    else
        update_post_meta($ID, 'post_views_count', $count++);
}