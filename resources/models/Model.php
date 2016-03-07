<?php

/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/16/16
 * Time: 2:05 PM
 * As: Model.php
 * For: business
 */
abstract class Model
{


    public static function byCategory($type, $categoryId, $except = [])
    {
        if (!is_array($except))
            $except = [$except];
        $query = new Query([
            'post_type' => $type,
            'cat' => $categoryId,
            'post__not_in' => $except,
            'post_status' => 'publish'
        ]);

        return $query->get();
    }

    public static function byCommentCount($type, $except = [])
    {
        $query = new Query([
            'post_type' => $type,
            // Order by comment count.
            'orderby' => 'comment_count',
            'post__not_in' => $except,
            'post_status' => 'publish'
        ]);

        return $query->get();
    }

    public static function aYearAgo($type, $nb = 1)
    {
        $args = array(
            'post_type' => $type,
            // Day (1 - 31).
            'day' => date('j'),
            // Month (1 - 12).
            'monthnum' => date('n'),
            // Year (minus 1).
            'year' => date('Y') - 1,
            // Show only one post.
            'posts_per_page' => $nb
        );

        // Instantiate new query instance.
        $query = new Query($args);
        return $query->get();
    }

    public static function mostViewed($type = 'post', $nb= 5 )
    {
        $query = new Query(array(
            'post_type' => $type,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'posts_per_page' => $nb
        ));

        return $query->get();
    }

    public static function byTag($tag){

    }
}