<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/1/16
 * Time: 12:11 PM
 */
class GalleryModel
{
    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public static function all()
    {
        $query = new Query([
            'post_type'         => 'galleries',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ]);

        return $query->get();
    }
}