<?php

/******************************************************************************************/
/*   Bootstrap 3 Widget Filters                                                           */
/******************************************************************************************/
//*
function wop_bootstrap_widget_output_filters( $widget_output, $widget_type, $widget_id, $sidebar_id ) {

    switch( $widget_type ) {

        case 'categories' :
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item cat-item cat-item-', $widget_output);
            $widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
            $widget_output = str_replace(')', ' </span>', $widget_output);
            break;
        case 'calendar' :
            $widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
            $widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
            break;
        case 'tag_cloud' :
            $regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/"; //clean up
            $replace_with = "$1><span class='label label-primary'>$3</span>$4";
            $widget_output = preg_replace( $regex , $replace_with , $widget_output );
            break;
        case 'archives' :
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
            $widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
            $widget_output = str_replace(')', ' </span>', $widget_output);
            break;
        case 'meta' :
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
            break;
        case 'recent-posts' :
//            $widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
            $widget_output = str_replace('class="post-date"', 'class="post-date text-muted small"', $widget_output);
            break;
        case 'recent-comments' :
            $widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group">', $widget_output);
            $widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item">', $widget_output);
            break;
        case 'pages' :
            $widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
            break;
        case 'nav_menu' :
            $widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
            break;
        default:
            $widget_output = $widget_output; // not sure if this is needed
    }
    return $widget_output;
}
//add_filter( 'widget_output', 'wop_bootstrap_widget_output_filters', 10, 4 ); // not sure if this should be hooked into an action... maybe init or widgets_init
//
/**
 *
 *
 * This is alternate markpup options for current setup. Replace these in the main plugin if you want them


    // recent-posts  (change from list group with small date to list group with label date)
    $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
    $widget_output = str_replace('<li>', '<li class="list-group-item recent-posts-list-group-item">', $widget_output);
    $widget_output = str_replace('class="post-date"', 'class="post-date label label-primary"', $widget_output);

     * These are alternate options for the footer with future setup (when new paramater is added for sidebar filtering).
     * Read blog for more details - https://philipnewcomer.net/2014/06/filter-output-wordpress-widget/#comment-77098
     * Support - https://wordpress.org/support/topic/add-option-for-sidebar-paramater?replies=2

    // categories  (list unstyled with badge)
    $widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
    $widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
    $widget_output = str_replace(')', ' </span>', $widget_output);
    // meta  (list unstyled)
    $widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
    // nav_menu  (list unstyled)
    $widget_output = str_replace(' class="menu"', 'class="menu list-unstyled"', $widget_output);
    // recent-posts  (list unstyled)
    $widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
    // recent-comments (list-unstyled)
    $widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-unstyled">', $widget_output);
    // pages (list-unstyled)
    $widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
 */

/******************************************************************************************/
/*   Search Form - Using native in wordpress filter                                       */
/******************************************************************************************/
//*
//add_filter( 'get_search_form', 'wop_bootstrap_search_form', 100);
function wop_bootstrap_search_form() {
    $value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';
    $label = 'Search';
    $search_text = 'Search this website...';
    $button_text = 'Search';
    $form = '<form method="get" class="search-form form-inline" action="'.home_url( '/' ).'" role="search">
    <div class="form-group">
        <label class="sr-only sr-only-focusable" for="bsg-search-form">'.esc_html( $label ).'</label>
        <div class="input-group">
            <input type="search" class="search-field form-control" id="search" name="s" '.$value_or_placeholder.'="'.esc_attr( $search_text ).'">
            <span class="input-group-btn">
                <button type="submit" class="search-submit btn btn-default">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <span class="sr-only">'.esc_attr( $button_text ).'</span>
                </button>
            </span>
        </div>
    </div>
</form>';
    return $form;
}
/*******************/

