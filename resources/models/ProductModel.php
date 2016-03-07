<?php

class ProductModel
{
    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public static function all()
    {
        $query = new Query([
            'post_type'         => 'product',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ]);

        return $query->get();
    }
} 