<?php

/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 3/12/16
 * Time: 4:22 PM
 * As: FaqModel.php
 * For: business
 */
class FaqModel
{
    public static function all(){
        $query = new Query([
            'post_type'         => 'faqs',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ]);

        return $query->get();
    }
}